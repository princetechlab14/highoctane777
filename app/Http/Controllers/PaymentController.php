<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stripe\Checkout\Session as StripeSession;
use App\Services\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Stripe\Payout as StripePayout;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Stripe\Webhook;
use Carbon\Carbon;
use Exception;
use DB;

use App\Models\stores;
use App\Models\transactions;
use App\Models\users;
use App\Models\websetting;
use App\Models\payouts;
use App\Models\staff_sessions;
use App\Models\platform;

class PaymentController extends Controller
{
    public function flashmessage($msg, $status = 1)
    {
        $toastr = '';
        if ($status == 0) {
            $toastr = "toastr.success('$msg');";
        } else {
            $toastr = "toastr.error('$msg');";
        }
        \Session::flash('message', $toastr);
    }

    // ✅ Add this helper to your controller if not already present
    private function isValidTimezone(string $tz): bool
    {
        \Log::info('tz'. $tz);
        try { new \DateTimeZone($tz); return true; }
        catch (\Exception $e) { return false; }
    }

    // Show payment form
    public function showPaymentForm($storeId)
    {
        $store = stores::findOrFail($storeId);
        $platforms = platform::all(); // fetch all platforms
        return view('payment', compact('store', 'platforms'));
    }

    private function getActiveStaff($storeId)
    {
        return staff_sessions::where('store_id', $storeId)
            ->whereNull('logout_at')
            ->latest('login_at')
            ->first();
    }

    // =========================================== stripe ================================================================
    // Create Stripe Checkout
    public function createCheckoutSession(Request $request)
    {
        $data = $request->all();
        if ($request->payment_method === 'paypal') {
            return $this->createPayPalOrder($request);
        }

        $validator = Validator::make($data, [
            'store_id' => 'required|exists:stores,id',
            'amount' => 'required|numeric|min:1|max:1000000',
            'customer_name' => 'nullable|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_mobile' => $data['store_type'] !== 'online' ? 'required' : 'nullable',
            'customer_mobileid' => 'nullable|string|max:50',
            'customer_username' => $data['store_type'] !== 'online' ? 'required|string|max:50' : 'nullable|string|max:50',
            'platform_id' => $data['store_type'] !== 'online' ? 'required' : 'nullable',
        ]);
        if ($validator->fails()) {
            $message = collect($validator->errors()->all())->first();
            $this->flashmessage($message, 1);
            return redirect()->back()->withInput();
        }

        $STRIPE_SECRET = websetting::find(1);
        if (!$STRIPE_SECRET || empty($STRIPE_SECRET->stripe_secret)) {
            return redirect('/');
        }

        Stripe::setApiKey($STRIPE_SECRET->stripe_secret);

        $store = stores::findOrFail($request->store_id);
        $platform = null;
        if ($request->store_type !== 'online' && $request->platform_id) {
            $platform = platform::findOrFail($request->platform_id);
        }
        $activeStaff = $this->getActiveStaff($store->id);

        $formattedAmount = number_format((float)$request->amount, 2, '.', '');  // Format to 2 decimal
        $amount = (int) round($formattedAmount * 100);  // Convert to paisa/cents

        try {
            $session = StripeSession::create([
                // 'payment_method_types' => ['card'],
                // 'payment_method_types' => ['card', 'acss_debit', 'affirm', 'afterpay_clearpay', 'alipay', 'au_becs_debit', 'bacs_debit', 'bancontact', 'blik', 'boleto', 'cashapp', 'crypto', 'customer_balance', 'eps', 'fpx', 'giropay', 'grabpay', 'ideal', 'klarna', 'konbini', 'link', 'mb_way', 'multibanco', 'oxxo', 'p24', 'pay_by_bank', 'paynow', 'paypal', 'payto', 'pix', 'promptpay', 'sepa_debit', 'sofort', 'swish', 'us_bank_account', 'wechat_pay', 'revolut_pay', 'mobilepay', 'zip', 'amazon_pay', 'alma', 'twint', 'kr_card', 'naver_pay', 'kakao_pay', 'payco', 'nz_bank_account', 'samsung_pay', 'billie', 'paypay'],
                // 'automatic_payment_methods' => [
                //     'enabled' => true,
                // ],
                'payment_method_types' => [
                    'card',
                    'link',
                    'afterpay_clearpay',
                    'bancontact',
                    'cashapp',
                    'crypto',
                    'eps',
                    'klarna',
                    'pix',
                    'amazon_pay',
                ],
                'line_items' => [[
                    'price_data' => [
                        'currency' => '' . env('CURRENCY', 'USD'),
                        'product_data' => [
                            'name' => $store->name . ' Store Payment',
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                // 'phone_number_collection' => [
                //     'enabled' => true,
                // ],
                'mode' => 'payment',
                'allow_promotion_codes' => true,
                'payment_intent_data' => [
                    'metadata' => [
                        'store_id' => $store->id,
                        'staff_id'  => $activeStaff->user_id ?? null,
                        'platform_id' => $request->platform_id,
                        'platform_name' => $platform->name ?? null,
                        'store_name' => $store->name,
                        'customer_name' => $request->customer_name,
                        'customer_email' => $request->customer_email,
                        'customer_countrycode' => $request->customer_countrycode,
                        'customer_mobile' => $request->full_mobile,
                        'customer_mobileid' => $request->customer_mobileid,
                        'customer_username' => $request->customer_username,
                        'timezone' => $request->timezone ?? config('app.timezone'),
                    ],
                ],
                // ✅ Optional Email (Stripe will still ask if empty)
                'customer_email' => $request->customer_email ?? null,
                'customer_creation' => 'always',
                // 'customer_creation' => 'if_required',
                // 'customer' => null,
                'success_url' => url('/payment-success?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => url('/payment-cancel'),
                'metadata' => [
                    'store_id' => $store->id,
                    'staff_id' => $activeStaff->user_id ?? null,
                    'platform_id' => $request->platform_id ?? null,
                    'platform_name' => $platform->name ?? null,
                    'store_name' => $store->name,
                    'customer_name' => $request->customer_name,
                    'customer_email' => $request->customer_email,
                    'customer_countrycode' => $request->customer_countrycode,
                    'customer_mobile' => $request->full_mobile ?? null,
                    'customer_mobileid' => $request->customer_mobileid,
                    'customer_username' => $request->customer_username,
                    'timezone' => $request->timezone ?? config('app.timezone'),
                ],
            ]);
    
            return redirect($session->url);

        } catch (\Throwable $th) {
            \Log::error('Stripe Session Error: ' . $th->getMessage());
            $this->flashmessage('Unable to initiate Stripe payment. Please try again.', 1);
            return redirect()->back()->withInput();
        }
    }
    // Stripe Success
    public function success(Request $request)
    {
        $STRIPE_SECRET = websetting::find(1);
        if (!$STRIPE_SECRET || empty($STRIPE_SECRET->stripe_secret)) {
            return redirect('/');
        }

        Stripe::setApiKey($STRIPE_SECRET->stripe_secret);

        $sessionId = $request->session_id;
        if (!$sessionId) {
            return redirect('/');
        }

        try {
            $session = StripeSession::retrieve($sessionId);
            \Log::info('session'. $session);

            // if ($session->payment_status == 'paid') {
            //     $transaction = transactions::with('stores')->where(
            //         'transaction_id',
            //         $session->payment_intent
            //     )->first();

            //     if (!$transaction) {
            //         \Log::warning('Transaction not found for session: '.$session->id);
            //         return view('payment-success')->with('transaction', null);
            //     }
            //     return view('payment-success', compact('transaction'));
            // }

            // // Ensure transaction exists in DB immediately
            $timezone = $session->metadata->timezone ?? config('app.timezone');
            if (!$this->isValidTimezone($timezone)) $timezone = config('app.timezone');
            // Set runtime timezone
            date_default_timezone_set($timezone);
            config(['app.timezone' => $timezone]);
    
            $transaction = transactions::firstOrCreate(
                ['transaction_id' => $session->payment_intent],
                [
                    'store_id' => $session->metadata->store_id ?? null,
                    'user_id' =>  $session->metadata->staff_id ?? null,
                    'platform_id' => $session->metadata->platform_id ?? null,
                    'amount' => $session->amount_total / 100,
                    'currency' => strtoupper($session->currency ?? 'usd'),
                    'payment_method' => 'stripe',
                    'status' => $session->payment_status == 'paid' ? 'success' : 'pending',
                    'timezone' => $timezone,
                    'transaction_at' => Carbon::now(),
                    'payment_response' => json_encode($session),
                    'customer_name' => $session->customer_details->name ?? $session->metadata->customer_name ?? null,
                    'customer_email' => $session->customer_details->email ?? $session->metadata->customer_email ?? null,
                    'customer_countrycode' => $session->customer_details->customer_countrycode ?? $session->metadata->customer_countrycode ?? null,
                    'customer_mobile' => $session->customer_details->phone ?? $session->metadata->customer_mobile ?? null,
                    'customer_mobileid' => $session->customer_details->customer_mobileid ?? $session->metadata->customer_mobileid ?? null,
                    'customer_username' => $session->customer_details->customer_username ?? $session->metadata->customer_username ?? null,
                    'date' => Carbon::now()->format('d-m-Y'),
                ]
            );

            return view('payment-success', compact('transaction'));
        } catch (Exception $e) {
            \Log::error('Success Error: ' . $e->getMessage());
            return redirect('/');
        }

        return redirect('/');
    }
    // Webhook
    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\Exception $e) {
            \Log::error('Stripe Webhook Error: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        try {
            // ✅ SUCCESS PAYMENT
            if ($event->type == 'checkout.session.completed') {
                $session = $event->data->object;

                if (!$session->payment_intent) {
                    return response()->json(['status'=>'ignored'],200);
                }

                $transactionId = $session->payment_intent;

                // Prevent duplicate insert
                $timezone = $session->metadata->timezone ?? config('app.timezone');
                if (!$this->isValidTimezone($timezone)) $timezone = config('app.timezone');
                // Set runtime timezone
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);

                // if (!transactions::where('transaction_id', $transactionId)->exists()) {
                    transactions::updateOrCreate(
                        ['transaction_id' => $transactionId],
                        [
                            'store_id' => $session->metadata->store_id,
                            'user_id' => $session->metadata->staff_id ?? null, // guest payment
                            'platform_id' => $session->metadata->platform_id ?? null,
                            'amount' => $session->amount_total / 100,
                            'currency' => strtoupper($session->currency ?? 'usd'),
                            'payment_method' => 'stripe',
                            'status' => 'success',
                            'timezone' => $timezone,
                            'transaction_at' => Carbon::now(),
                            'payment_response' => json_encode($session),
                            'customer_name'  => $session->customer_details->name ?? null,
                            'customer_email' => $session->customer_details->email ?? null,
                            'customer_countrycode' => $session->customer_details->customer_countrycode ?? $session->metadata->customer_countrycode ?? null,
                            'customer_mobile' => $session->customer_details->phone ?? $session->metadata->customer_mobile ?? null,
                            'customer_mobileid' => $session->customer_details->customer_mobileid ?? $session->metadata->customer_mobileid ?? null,
                            'customer_username' => $session->customer_details->customer_username ?? $session->metadata->customer_username ?? null,
                            'date' =>  Carbon::now()->format('d-m-Y'),
                            // 'customer_name' => $session->metadata->customer_name ?? null,
                            // 'customer_email' => $session->metadata->customer_email ?? null,
                            // 'customer_mobile' => $session->metadata->customer_mobile ?? null,
                        ]
                    );
                // }
            }

            // ❌ FAILED PAYMENT
            if ($event->type == 'payment_intent.payment_failed') {
                $intent = $event->data->object;

                // Prevent duplicate insert
                $timezone = $intent->metadata->timezone ?? config('app.timezone');
                if (!$this->isValidTimezone($timezone)) $timezone = config('app.timezone');
                // Set runtime timezone
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);

                $existing = transactions::where('transaction_id', $intent->id)->first();

                // ✅ Skip if already success — don't downgrade it
                if ($existing && $existing->status === 'success') {
                    return response()->json(['status' => 'ignored'], 200);
                }

                if (!$existing) {
                    transactions::create(
                        [
                            'transaction_id' => $intent->id,
                            'store_id' => $intent->metadata->store_id ?? null,
                            'user_id' => $intent->metadata->staff_id ?? null,
                            'platform_id' => $intent->metadata->platform_id ?? null,
                            'amount' => $intent->amount / 100,
                            'currency' => strtoupper($intent->currency ?? 'usd'),
                            'payment_method' => 'stripe',
                            'status' => 'failed',
                            'transaction_at' => Carbon::now(),
                            'payment_response' => json_encode($intent),
                            'customer_name' => null,
                            'customer_email' => null,
                            'customer_countrycode' => $intent->metadata->customer_countrycode ?? null,
                            'customer_mobile' => $intent->metadata->customer_mobile ?? null,
                            'customer_mobileid' => $intent->metadata->customer_mobileid ?? null,
                            'customer_username' => $intent->metadata->customer_username ?? null,
                            'date' => Carbon::now()->format('d-m-Y'),
                        ]
                    );
                }
            }

            // ❌ SESSION EXPIRED / ABANDONED
            if ($event->type == 'checkout.session.expired') {
                $session = $event->data->object;
                // ignore expired session without payment intent
                if (!$session->payment_intent) {
                    return response()->json(['status'=>'ignored'],200);
                }
                
                $transactionId = $session->payment_intent ?? $session->id;

                $existing = transactions::where('transaction_id', $transactionId)->first();

                // 🔥 Do not override success
                if ($existing && $existing->status === 'success') {
                    return response()->json(['status' => 'ignored'], 200);
                }

                // Prevent duplicate insert
                $timezone = $session->metadata->timezone ?? config('app.timezone');
                if (!$this->isValidTimezone($timezone)) $timezone = config('app.timezone');
                // Set runtime timezone
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);
                
                if (!$existing) {
                    transactions::create(
                        [
                            'transaction_id' => $transactionId,
                            'store_id' => $session->metadata->store_id ?? null,
                            'user_id' => $session->metadata->staff_id ?? null,
                            'platform_id' => $session->metadata->platform_id ?? null,
                            'amount' => $session->amount_total / 100,
                            'currency' => strtoupper($session->currency ?? 'usd'),
                            'payment_method' => 'stripe',
                            'status' => 'expired',
                            'transaction_at' => Carbon::now(),
                            'payment_response' => json_encode($session),
                            'customer_name' => null,
                            'customer_email' => null,
                            'customer_countrycode' => $session->metadata->customer_countrycode ?? null,
                            'customer_mobile' => $session->metadata->customer_mobile ?? null,
                            'customer_mobileid' => $session->metadata->customer_mobileid ?? null,
                            'customer_username' => $session->metadata->customer_username ?? null,
                            'date' => Carbon::now()->format('d-m-Y'),
                        ]
                    );
                }
            }

        } catch (\Exception $e) {
            \Log::error('Stripe Webhook DB Error: ' . $e->getMessage());
            return response()->json(['error' => 'Database error'], 500);
        }

        // ✅ Always return 200 for Stripe
        return response()->json(['status' => 'success'], 200);
    }
    // Stripe cancel
    public function cancel()
    {        
        return view('payment-cancel');
    }

    // =========================================== paypal ================================================================
    // public function createPaypalOrder(Request $request)
    // {
    //     $data = $request->all();
    //     $validator =  Validator::make($data, [
    //         'store_id' => 'required|exists:stores,id',
    //         'amount' => 'required|numeric|min:1|max:1000000',
    //         'customer_name' => 'nullable|string|max:255',
    //         'customer_email' => 'nullable|email|max:255',
    //         'customer_mobile' => 'required',
    //         'customer_mobileid' => 'nullable|string|max:50',
    //         'customer_username' => 'required|string|max:50',
    //     ]);
    //     if ($validator->fails()) {
    //         $message = collect($validator->errors()->all())->first();
    //         $this->flashmessage($message, 1);
    //         return redirect()->back()->withInput();
    //     }

    //     $store = stores::findOrFail($request->store_id);
    //     $activeStaff = $this->getActiveStaff($store->id);
    //     $amount = number_format($request->amount, 2, '.', '');

    //     session([
    //         'paypal_store_id' => $store->id,
    //         'paypal_staff_id' => $activeStaff->user_id ?? null,
    //         'paypal_customer_name' => $request->customer_name,
    //         'paypal_customer_email' => $request->customer_email,
    //         'paypal_customer_countrycode' => $request->customer_countrycode,
    //         'paypal_customer_mobile' => $request->full_mobile,
    //         'paypal_customer_mobileid' => $request->customer_mobileid,
    //         'paypal_customer_username' => $request->customer_username,
    //     ]);

    //     $paypalClient = PayPalClient::client();

    //     $orderRequest = new OrdersCreateRequest();
    //     $orderRequest->prefer('return=representation');
    //     $orderRequest->body = [
    //         'intent' => 'CAPTURE',
    //         'purchase_units' => [[
    //             'amount' => [
    //                 'currency_code' => env('CURRENCY', 'USD'),
    //                 'value' => $amount,
    //             ],
    //             'description' => $store->name . ' Store Payment',
    //             'custom_id' => (string) $store->id,
    //         ]],
    //         'application_context' => [
    //             'brand_name'          => $store->name,
    //             'locale'              => 'en-US',
    //             'landing_page'        => 'NO_PREFERENCE', // shows PayPal + Venmo tabs
    //             'shipping_preference' => 'NO_SHIPPING',
    //             'user_action'         => 'PAY_NOW',       // "Pay Now" button on PayPal
    //             'cancel_url' => url('/payment-cancel'),
    //             'return_url' => url('/paypal-success'),
    //         ]
    //         // 'application_context' => [
    //         //     'brand_name'          => $store->name,
    //         //     'locale'              => 'en-US',
    //         //     'landing_page'        => 'LOGIN', // IMPORTANT
    //         //     'shipping_preference' => 'NO_SHIPPING',
    //         //     'user_action'         => 'PAY_NOW',
    //         //     'cancel_url' => url('/payment-cancel'),
    //         //     'return_url' => url('/paypal-success'),
    //         // ],
    //     ];

    //     try {
    //         $response = $paypalClient->execute($orderRequest);
    //         $approvalUrl = collect($response->result->links)
    //             ->firstWhere('rel', 'approve')->href;

    //         // Save order ID in session to verify after payment
    //         session(['paypal_order_id' => $response->result->id]);

    //         return redirect($approvalUrl);

    //     } catch (\Exception $e) {
    //         \Log::error('PayPal Create Order Error: '.$e->getMessage());
    //         return redirect()->back()->withErrors('Unable to initiate PayPal payment.');
    //     }
    // }
    // // Paypal Success
    // public function paypalSuccess(Request $request)
    // {
    //     $paypalClient = PayPalClient::client();

    //     $orderId = $request->get('token') ?? session('paypal_order_id');
    //     if (!$orderId) {
    //         return redirect('/payment-cancel')->withErrors('Invalid PayPal order.');
    //     }

    //     // ✅ STEP 1: Check if already saved
    //     $existingTransaction = transactions::where('transaction_id', $orderId)->first();

    //     if ($existingTransaction) {
    //         // ✅ Already captured → just show success
    //         return view('payment-success', ['transaction' => $existingTransaction]);
    //     }

    //     // ✅ STEP 2: Capture ONLY if not already captured
    //     $captureRequest = new OrdersCaptureRequest($orderId);
    //     $captureRequest->prefer('return=representation');

    //     try {
    //         $response = $paypalClient->execute($captureRequest);
    //         $order = $response->result;
    //         \Log::info('order: ' . json_encode($order));

    //         // Check payment status
    //         if ($order->status == 'COMPLETED') {
    //             // Extract captured payment details
    //             $capture  = $order->purchase_units[0]->payments->captures[0];
    //             $amount   = $capture->amount->value;
    //             $currency = $capture->amount->currency_code;

    //             // Retrieve customer data saved before the redirect
    //             $storeId = session('paypal_store_id') ?? null;
    //             $staffId = session('paypal_staff_id') ?? null;
    //             $customerName  = ($order->payer->name->given_name ?? '') . ' ' . ($order->payer->name->surname ?? '');
    //             // $customerEmail = $order->payer->email_address ?? '';
    //             // $customerMobile = $order->payer->phone->phone_number->national_number ?? '';
    //             $customerEmail = session('paypal_customer_email') ?? null;
    //             $customerCountryCode = session('paypal_customer_countrycode') ?? null;
    //             $customerMobile = session('paypal_customer_mobile') ?? null;
    //             $customerMobileId = session('paypal_customer_mobileid') ?? null;
    //             $customerUsername = session('paypal_customer_username') ?? null;

    //             $transaction = transactions::updateOrCreate(
    //                 ['transaction_id' => $order->id],
    //                 [
    //                     'store_id'          => $storeId,
    //                     'user_id'           => $staffId,
    //                     'amount'            => $amount,
    //                     'currency'          => $currency,
    //                     'payment_method'    => 'paypal',
    //                     'status'            => 'success',
    //                     'transaction_at'    => Carbon::now(),
    //                     'payment_response'  => json_encode($order),
    //                     'customer_name'     => $customerName,
    //                     'customer_email'    => $customerEmail,
    //                     'customer_countrycode' => $customerCountryCode,
    //                     'customer_mobile'   => $customerMobile,
    //                     'customer_mobileid' => $customerMobileId,
    //                     'customer_username' => $customerUsername,
    //                     'date'              => Carbon::now()->format('d-m-Y'),
    //                 ]
    //             );

    //             // Clean up session keys
    //             session()->forget([
    //                 'paypal_order_id', 'paypal_store_id', 'paypal_staff_id',
    //                 'paypal_customer_name', 'paypal_customer_email', 'paypal_customer_countrycode',
    //                 'paypal_customer_mobile', 'paypal_customer_mobileid',
    //                 'paypal_customer_username',
    //             ]);

    //             return view('payment-success', compact('transaction'));
    //         } else {
    //             return redirect('/payment-cancel')->withErrors('Payment not completed.');
    //         }

    //     } catch (\Exception $e) {
    //         // ✅ HANDLE already captured case safely
    //         if (str_contains($e->getMessage(), 'ORDER_ALREADY_CAPTURED')) {

    //             $transaction = transactions::where('transaction_id', $orderId)->first();

    //             if ($transaction) {
    //                 return view('payment-success', compact('transaction'));
    //             }
    //         }
    //         \Log::error('PayPal Capture Error: '.$e->getMessage());
    //         return redirect('/payment-cancel')->withErrors('Payment capture failed.');
    //     }
    // }
    public function capturePaypal(Request $request)
    {
        $data = $request->all();

        // ✅ Validation
        $validator = Validator::make($data, [
            'store_id' => 'required|exists:stores,id',
            'amount' => 'required|numeric|min:1|max:1000000',
            'customer_name' => 'nullable|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_mobile' => $data['store_type'] !== 'online' ? 'required' : 'nullable',
            'customer_mobileid' => 'nullable|string|max:50',
            'customer_username' => $data['store_type'] !== 'online' ? 'required|string|max:50' : 'nullable|string|max:50',
            'platform_id' => $data['store_type'] !== 'online' ? 'required' : 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()->all()
            ]);
        }

        $paypalClient = PayPalClient::client();
        $orderId = $request->orderID;
        if (!$orderId) {
            return response()->json(['success' => false, 'message' => 'Missing order ID'], 422);
        }
 
        // ✅ Guard: already captured (duplicate callback protection)
        $existing = transactions::where('transaction_id', $orderId)->first();
        if ($existing) {
            return response()->json([
                'success'  => true,
                'redirect' => url('/payment-success') . '?token=' . $existing->id,
            ]);
        }
        
        try {
            // 1️⃣ First, get the order details
            $getOrderRequest = new OrdersGetRequest($orderId);
            $orderResponse = $paypalClient->execute($getOrderRequest);
            $order = $orderResponse->result;

            // 2️⃣ If order already COMPLETED, just save transaction if not exists
            if ($order->status === 'COMPLETED') {
                $capture = $order->purchase_units[0]->payments->captures[0] ?? null;

                // Get store & active staff
                $store = stores::findOrFail($request->store_id);
                $platform = null;
                if ($request->store_type !== 'online' && $request->platform_id) {
                    $platform = platform::findOrFail($request->platform_id);
                }
                $activeStaff = $this->getActiveStaff($store->id); 
                $staffId = $activeStaff->user_id ?? null;

                // Customer details
                $customerName = $request->customer_name ?? (($order->payer->name->given_name ?? '') . ' ' . ($order->payer->name->surname ?? ''));
                $customerEmail = $request->customer_email ?? null;
                $customerCountryCode = $request->customer_countrycode ?? null;
                $customerMobile = $request->full_mobile ?? null;
                $customerMobileId = $request->customer_mobileid ?? null;
                $customerUsername = $request->customer_username ?? null;
                $timezone = $request->timezone ?? config('app.timezone');
                if (!$this->isValidTimezone($timezone)) $timezone = config('app.timezone');
                // Set runtime timezone
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);

                // Save transaction if not exists
                $transaction = transactions::firstOrCreate(
                    ['transaction_id' => $orderId],
                    [
                        'store_id' => $store->id,
                        'user_id' => $staffId ?? null,
                        'platform_id' => $request->platform_id ?? null,
                        'amount' => $capture->amount->value ?? $request->amount,
                        'currency' => $capture->amount->currency_code ?? 'USD',
                        'payment_method' => 'paypal',
                        'status' => 'success',
                        'timezone' => $timezone,
                        'transaction_at' => Carbon::now(),
                        'payment_response' => json_encode($order),
                        'customer_name' => $customerName,
                        'customer_email' => $customerEmail,
                        'customer_countrycode' => $customerCountryCode,
                        'customer_mobile' => $customerMobile,
                        'customer_mobileid' => $customerMobileId,
                        'customer_username' => $customerUsername,
                        'date' => Carbon::now()->format('d-m-Y'),
                    ]
                );

                return response()->json([
                    'status' => 'success',
                    'redirect' => url('paypal-success', ['token' => $orderId])
                ]);
            }

            // 3️⃣ If not completed, attempt capture
            $captureRequest = new OrdersCaptureRequest($orderId);
            $captureRequest->prefer('return=representation');
            $captureResponse = $paypalClient->execute($captureRequest);
            $order = $captureResponse->result;

            if ($order->status === 'COMPLETED') {
                $capture = $order->purchase_units[0]->payments->captures[0];

                $store = stores::findOrFail($request->store_id);
                $platform = null;
                if ($request->store_type !== 'online' && $request->platform_id) {
                    $platform = platform::findOrFail($request->platform_id);
                }
                $activeStaff = $this->getActiveStaff($store->id); 
                $staffId = $activeStaff->user_id ?? null;

                $customerName = $request->customer_name ?? (($order->payer->name->given_name ?? '') . ' ' . ($order->payer->name->surname ?? ''));
                $customerEmail = $request->customer_email ?? null;
                $customerCountryCode = $request->customer_countrycode ?? null;
                $customerMobile = $request->full_mobile ?? null;
                $customerMobileId = $request->customer_mobileid ?? null;
                $customerUsername = $request->customer_username ?? null;
                $timezone = $request->timezone ?? config('app.timezone');
                if (!$this->isValidTimezone($timezone)) $timezone = config('app.timezone');
                // Set runtime timezone
                config(['app.timezone' => $timezone]);
                date_default_timezone_set($timezone);

                $transaction = transactions::updateOrCreate(
                    ['transaction_id' => $orderId],
                    [
                        'store_id' => $store->id,
                        'user_id' => $staffId ?? null,
                        'platform_id' => $request->platform_id ?? null,
                        'amount' => $capture->amount->value,
                        'currency' => $capture->amount->currency_code,
                        'payment_method' => 'paypal',
                        'status' => 'success',
                        'timezone' => $timezone,
                        'transaction_at' => Carbon::now(),
                        'payment_response' => json_encode($order),
                        'customer_name' => $customerName,
                        'customer_email' => $customerEmail,
                        'customer_countrycode' => $customerCountryCode,
                        'customer_mobile' => $customerMobile,
                        'customer_mobileid' => $customerMobileId,
                        'customer_username' => $customerUsername,
                        'date' => Carbon::now()->format('d-m-Y'),
                    ]
                );

                // Get current site base URL dynamically
                $baseUrl = url('/');

                // Append the success path
                $redirectUrl = $baseUrl . '/payment-success?token=' . $orderId;

                return response()->json([
                    'status' => 'success',
                    'redirect' => $redirectUrl
                ]);
            }

            return response()->json([
                'status' => 'failed',
                'message' => 'Payment not completed.'
            ]);

        } catch (\Exception $e) {
            \Log::error('PayPal Capture Error: '.$e->getMessage());

            // Extra safety: try to fetch transaction if already captured
            $transaction = transactions::where('transaction_id', $orderId)->first();
            if ($transaction) {
                $baseUrl = url('/');
                $redirectUrl = $baseUrl . '/payment-success?token=' . $orderId;

                return response()->json([
                    'status' => 'success',
                    'redirect' => $redirectUrl
                ]);
            }

            return response()->json([
                'status' => 'error',
                'message' => 'Payment capture failed.'
            ]);
        }
    }
    // Paypal Success
    public function paypalSuccess($token)
    {
        $transaction = transactions::where('transaction_id', $token)->first();

        if (!$transaction) {
            return redirect('/payment-cancel')->withErrors('Transaction not found.');
        }
        return view('payment-success',['transaction'=>$transaction]);
    }
    // Paypal Cancel
    public function paypalcancel(Request $request)
    {
        $reason = $request->get('reason', '');
        return view('payment-cancel', compact('reason'));
    }

    public function payouts(Request $request)
    {
        $sessionAdmin = session('admin');

        if (!$sessionAdmin) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ]);
        }

        DB::beginTransaction();

        try {

            // ✅ ALWAYS GET FRESH ADMIN DATA
            $admin = users::where('id', $sessionAdmin->id)
                ->lockForUpdate()
                ->first();

            if ($admin->user_type === 'staff') {
                return response()->json([
                    'status' => false,
                    'message' => 'Staff cannot payout'
                ]);
            }

            $request->validate([
                'transaction_id' => 'required|exists:transactions,transaction_id',
                'amount' => 'required|numeric|min:1'
            ]);

            // ✅ LOCK TRANSACTION
            $transaction = transactions::where('transaction_id', $request->transaction_id)
                ->lockForUpdate()
                ->first();

            if (!$transaction) {
                return response()->json([
                    'status' => false,
                    'message' => 'Transaction not found'
                ]);
            }

            // ✅ CORRECT LIMIT CHECK
            if ($admin->user_type === 'sub_admin') {

                $remainingLimit = $admin->max_payout_limit - $admin->used_payout_amount;

                if ($remainingLimit <= 0) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Your payout limit is exhausted'
                    ]);
                }

                if ($request->amount > $remainingLimit) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Limit exceeded! Remaining limit: $' . number_format($remainingLimit, 2)
                    ]);
                }
            }

            // ✅ CREATE PAYOUT
            payouts::create([
                'user_id'        => $transaction->user_id,
                'created_by'     => $admin->id,
                'transaction_id' => $transaction->transaction_id,
                'amount'         => $request->amount,
                'reason'         => $request->reason ?? 'Direct Payment Payout',
                'status'         => 'paid',
                'source'         => 'system',
                'date'           => now()->format('d-m-Y'),
            ]);

            // ✅ UPDATE ADMIN LIMIT
            if ($admin->user_type === 'sub_admin') {
                $admin->increment('used_payout_amount', $request->amount);
            }

            // ✅ UPDATE TRANSACTION
            $totalPaid = payouts::where('transaction_id', $transaction->transaction_id)
                ->where('status', 'paid')
                ->sum('amount');

            $transaction->update([
                'paid_amount'   => $totalPaid,
                'payout_status' => $totalPaid >= $transaction->amount ? 'paid' : 'partial'
            ]);

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Payout successful'
            ]);

        } catch (\Exception $e) {

            DB::rollBack();
            \Log::error('Payout Error: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Something went wrong'
            ]);
        }
    }
    
}
