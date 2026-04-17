<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\websetting;
use App\Models\leads;
use App\Models\leadfollow;
use App\Models\socialmedia;
use App\Models\emailtemplate;
use App\Models\email_attachment;
use App\Models\gallery;
use App\Models\slider;
use App\Models\category;
use App\Models\testimonials;
use App\Models\subscribe;
use App\Models\contactinfo;
use App\Models\emailinfo;
use App\Models\pages;
use App\Models\page_section;
use App\Models\page_content;
use App\Models\faq;
use App\Models\country;
use App\Models\state;
use App\Models\city;
use App\Models\roles;
use App\Models\features;
use App\Models\stores;
use App\Models\role_feature_permission;
use App\Models\user_permission;
use App\Models\transactions;
use App\Models\staff_sessions;
use App\Models\payouts;
use App\Models\platform;
use App\Models\withdrawals;

use GuzzleHttp\Client;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\PaymentIntent;

use Carbon\Carbon;
use Session;
use DB;
use Image;
use Config;
use Mail;
use PDF;

class AdminController extends Controller
{
    private function checkPermission($feature, $action)
    {
        if (!hasPermission($feature, $action)) {
            $this->flashmessage('You do not have permission to perform this action.', 1);
            return redirect('/admin/dashboard');
        }

        return true;
    }

    // Helper method — add this to your controller
    private function isValidTimezone(string $tz): bool
    {
        try { new \DateTimeZone($tz); return true; }
        catch (\Exception $e) { return false; }
    }
    
    // login & logout
    public function login()
    {
        return view('admin.login');
    }
    public function logincheck(Request $request)
    {
        $data = $request->all();
        if (isset($data) && !empty($data['email']) && !empty($data['password'])) {
            $user = users::where([['username', $data['email']], ['password', md5($data['password'])]])
                ->orwhere([['email', $data['email']], ['password', md5($data['password'])]])->first();
            if (isset($user)) {
                $activeSession = DB::table('staff_sessions')->where('user_id', $user->id)->whereNull('logout_at')->first();
                if ($activeSession) {
                    return response()->json([
                        'success' => false,
                        'message' => 'User already logged in on another device'
                    ]);
                }

                session()->put('admin', $user);
                // session()->put('admin', $user->id);

                // ✅ Save browser timezone to session — used by middleware on every request
                $timezone = $request->input('timezone', config('app.timezone'));
                if ($this->isValidTimezone($timezone)) {
                    session()->put('admin_timezone', $timezone);
                }
    
                // ✅ Apply it immediately for this request too
                date_default_timezone_set(session('admin_timezone'));
                Config::set('app.timezone', session('admin_timezone'));

                if ($user->user_type == 'staff') {
                    // DB::table('staff_sessions')
                    //     ->where('user_id', $user->id)
                    //     ->whereNull('logout_at')
                    //     ->update([
                    //         'logout_at' => Carbon::now(),
                    //         'status' => 'auto_closed'
                    //     ]);
                        
                    staff_sessions::create([
                        'user_id'   => $user->id,
                        'store_id' => $user->store_id,
                        'login_at'  => Carbon::now(),
                        'date' => Carbon::now(),
                        'timezone' => session('admin_timezone'),
                    ]);
                }

                $response = array(
                    'success' => true,
                    'redirect_url' => url('/admin/dashboard'),
                );
                $toastr = "toastr.success('Login Successfully..!');";
                Session::flash('message', $toastr);
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Invalid Username and Password..!',
                );
            }
        } else {
            $response = array(
                'success' => false,
                'message' => 'User something Went Wrong..!',
            );
        }
        return response()->json($response);
    }
    public function logout()
    {
        $user = session('admin');
        if ($user && $user->user_type == 'staff') {
            // ✅ Get timezone from session BEFORE forgetting it
            $timezone = session('admin_timezone', config('app.timezone'));

            // ✅ Ensure timezone is applied for this request
            // (middleware should have done this already, but be safe)
            if ($this->isValidTimezone($timezone)) {
                date_default_timezone_set($timezone);
                Config::set('app.timezone', $timezone);
            }
            
           // Get latest open session
            $session = DB::table('staff_sessions')
                ->where('user_id', $user->id)
                ->whereNull('logout_at')
                ->orderBy('id', 'desc')
                ->first();

            // Update only that record
            if ($session) {
                DB::table('staff_sessions')
                    ->where('id', $session->id)
                    ->update([
                        'logout_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
            }
        }

        session()->pull('admin');
        session()->forget('admin_timezone');
        return redirect('/admin/login');
    }

    //forgotpassword
    public function forgotpassword(Request $request, $token = 0)
    {
        $data = $request->input();
        if (count($data) > 0 && $token == 0) {
            $email = $data['email'];
            $user = users::where('email', $data['email'])->first();
            if ($user != '') {
                $websetting = websetting::first();
                $data['token'] = rand(111111, 999999);
                users::where('email', $data['email'])->update(array('ftoken' => $data['token']));
                $template = emailtemplate::where('id', 2)->first();
                $attach = email_attachment::where('e_id', 2)->get();
                $attachment = array();
                foreach ($attach as $v) {
                    array_push($attachment, public_path('assets/admin/images/emailattachment/' . $v->url));
                }
                $msg = $template['template'];
                $msg = str_replace("{:name:}", $user->name, $msg);
                $msg = str_replace("{:link:}", url('admin/forgotpassword/' . $data['token']), $msg);

                if (isset($websetting->receive_inquiry_email) && !empty($websetting->receive_inquiry_email) && !empty($websetting->smtp_host) && !empty($websetting->smtp_port) && !empty($websetting->smtp_user) && !empty($websetting->smtp_password) && !empty($websetting->from)) 
                {
                    $this->emailsend($email, $template['title'], $msg);
                    $this->flashmessage('Please Check Your Email', 0);
                    return redirect('/admin/login');
                } else{
                    $this->flashmessage('SMTP Crendential Invalid', 1);
                    return redirect()->back();
                }
                
            } else {
                $this->flashmessage('This Email Is Not Registered', 1);
                return redirect('admin/forgotpassword');
            }
        } elseif (count($data) > 0 && $token != 0) {
            $check = users::where('ftoken', $token)->first();
            if ($check != '') {
                if ($data['n_password'] == $data['c_password']) {
                    users::where('ftoken', $token)->update(['password' => md5($data['n_password'])]);
                    $this->flashmessage('Your New Password Generated Succesfully', 0);
                    return redirect('/admin/login');
                } else {
                    $this->flashmessage('Password Mismatched', 1);
                    return redirect('admin/forgotpassword/' . $token);
                }
            } else {
                $this->flashmessage('Something Went Wrong!!', 1);
                return redirect('admin/forgotpassword/' . $token);
            }
        } elseif ($token != 0) {
            $data['token'] = $token;
            return view('admin.resetpassword', $data);
        } else {
            return view('admin.forgotpassword');
        }
    }

    // change password
    public function changepassword(Request $request)
    {
        $data = $request->all();
        if (isset($data) && !empty($data)) {
            $request->validate([
                'oldpassword' => 'required',
                'n_password' => 'required',
                'c_password' => 'required|same:n_password',
            ]);
            $id = session()->get('admin.id');
            $user = users::where([['id', $id], ['password', md5($data['oldpassword'])]])->first();
            if (isset($user) && $user != '') {
                users::where('id', $user->id)->update(['password' => md5($data['n_password'])]);
                $response = array(
                    'success' => true,
                    'redirect_url' => url('/admin'),
                );
                $toastr = "toastr.success('Password Changed Successfully! Now Login..!');";
                Session::flash('message', $toastr);
                session()->pull('user');
            } else {
                $response = array(
                    'success' => false,
                    'message' => 'Old Password Is Wrong..!',
                );
            }
            return response()->json($response);
        }
    }

    // update & get profile
    public function profile(Request $request)
    {
        $id = session()->get('admin.id');
        if (!$id) {
            $this->flashmessage('Session expired. Please log in again.');
            return redirect('/admin/login');
        }
        $data = $request->all();
        $user = users::findOrFail($id);
        if (isset($data) && !empty($data)) {
            $update = array(
                'name' => $data['name'],
                'email' => $data['email'],
                'country_code' => $data['addcountry_code'],
                'mobile' => str_replace(' ', '', $data['mobile'])
            );
            if ($request->hasFile('p_image')) {
                if (!empty($user->p_image)) {
                    $oldImagePath = public_path('/assets/admin/images/profile/' . $user->p_image);
                    $oldThumbnailPath = public_path('/assets/admin/images/profile/thumbnails/' . $user->p_image);

                    // Delete old images if they exist
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }
                $pimage = $this->images($request, 'p_image', 'images/profile', 1);
                if (isset($pimage[0])) {
                    $update['p_image'] = $pimage[0];
                }
            }
            $user->update($update);
            $this->flashmessage('Profile Updated Successfully', 0);
            return redirect('/admin/profile');
        }
        return view('admin.profile', ['userdata' => $user]);
    }

    // dashboard
    // public function dashboard()
    // {
    //     $data['newlead'] = $this->totalleads(0);
    //     $data['processlead'] = $this->totalleads(1);
    //     $data['confrimlead'] = $this->totalleads(2);
    //     $data['cancellead'] = $this->totalleads(3);
    //     $data['tnewlead'] = $this->todaysleads(0);
    //     $data['tprocessinglead'] = $this->todaysleads(1);
    //     $data['tconfirmclead'] = $this->todaysleads(2);
    //     $data['tcancellead'] = $this->todaysleads(3);

    //     $user = session('admin');
    //     if (!$user) {
    //         return response()->json(['data' => []]);
    //     }

    //     // Staff dashboard: only their assigned store
    //     if ($user->user_type === 'staff') {
    //         $storeId = $user->store_id;

    //         $transactions = transactions::where('store_id', $storeId)->where('status', 'success')->get();
    //         // Today's transactions
    //         $todayTransactions = transactions::where('store_id', $storeId)
    //                                         ->where('status', 'success')
    //                                         ->whereRaw("STR_TO_DATE(date, '%d-%m-%Y') = CURDATE()")
    //                                         ->get();
    //     } else {
    //         // For super admin: show all stores
    //         $transactions = transactions::where('status', 'success')->get();
    //         $todayTransactions = transactions::where('status', 'success')
    //                                         ->whereRaw("STR_TO_DATE(date, '%d-%m-%Y') = CURDATE()")
    //                                         ->get();
                                
    //         // ✅ all withdrawals
    //         $withdrawals = withdrawals::where('is_deleted', 0)->get();
    //         $todayWithdrawals = withdrawals::where('is_deleted', 0)
    //                                         ->whereRaw("STR_TO_DATE(processed_at, '%Y-%m-%d') = CURDATE()")
    //                                         ->get();
    //     }
    //     $data['totalRevenue'] = $transactions->sum('amount');          // Total revenue for assigned store
    //     $data['totalTransactions'] = $transactions->count();          // Total transactions for assigned store
    //     $data['totalCustomers'] = $transactions->where('customer_email', '!=' ,'')->groupBy('customer_email')->count(); // Unique customers

    //     $data['todayRevenue'] = $todayTransactions->sum('amount');
    //     $data['todayTransactionCount'] = $todayTransactions->count();

    //     // ✅ NEW: total withdrawals & net revenue
    //     $data['totalWithdrawals'] = ($user->user_type !== 'staff') ? $withdrawals->sum('amount') : 0;
    //     $data['todayWithdrawals'] = ($user->user_type !== 'staff') ? $todayWithdrawals->sum('amount') : 0;
    //     $data['netRevenue'] = ($user->user_type !== 'staff')
    //         ? $data['totalRevenue'] - $data['totalWithdrawals']
    //         : $data['totalRevenue']; // staff sees only revenue

    //     $data['user'] = $user;
    //     if ($user->user_type !== 'staff') {
    //         $stores = stores::all();
    //         $data['shopRevenue'] = [];
    //         foreach ($stores as $store) {
    //             $storeTransactions = $transactions->where('store_id', $store->id);
    //             $storeWithdrawals = $withdrawals->where('store_id', $store->id);

    //             $totalTransactionAmount = $storeTransactions->sum('amount');
    //             $totalWithdrawalAmount = $storeWithdrawals->sum('amount');

    //             $data['shopRevenue'][] = [
    //                 'store_name' => $store->name,
    //                 // existing
    //                 'revenue' => $totalTransactionAmount,
    //                 'transactions' => $storeTransactions->count(),
    //                 'customers' => $storeTransactions->where('customer_email', '!=', '')
    //                     ->groupBy('customer_email')->count(),

    //                 // ✅ NEW FIELDS
    //                 'withdrawals' => $totalWithdrawalAmount,
    //                 'net_revenue' => $totalTransactionAmount - $totalWithdrawalAmount,
    //             ];
    //         }
    //     }

    //     return view('admin.dashboard', $data);
    // }
     public function dashboard()
    {
        $data['newlead'] = $this->totalleads(0);
        $data['processlead'] = $this->totalleads(1);
        $data['confrimlead'] = $this->totalleads(2);
        $data['cancellead'] = $this->totalleads(3);
        $data['tnewlead'] = $this->todaysleads(0);
        $data['tprocessinglead'] = $this->todaysleads(1);
        $data['tconfirmclead'] = $this->todaysleads(2);
        $data['tcancellead'] = $this->todaysleads(3);

        $user = session('admin');
        if (!$user) {
            return response()->json(['data' => []]);
        }

        // ✅ Get timezone from session
        $timezone = session('admin_timezone', config('app.timezone'));

        // ✅ Since your DB stores date as d-m-Y string
        $today = \Carbon\Carbon::now($timezone)->format('d-m-Y');

        // Staff dashboard: only their assigned store
        if ($user->user_type === 'staff') {
            $storeId = $user->store_id;

            $transactions = transactions::where('store_id', $storeId)->where('status', 'success')->get();
            // Today's transactions
            $todayTransactions = transactions::where('store_id', $storeId)
                                            ->where('status', 'success')
                                            // ->whereRaw("STR_TO_DATE(date, '%d-%m-%Y') = CURDATE()")
                                            ->where('date', $today)
                                            ->get();
        } else {
            // For super admin: show all stores
            $transactions = transactions::where('status', 'success')->get();
            $todayTransactions = transactions::where('status', 'success')
                                            // ->whereRaw("STR_TO_DATE(date, '%d-%m-%Y') = CURDATE()")
                                            ->where('date', $today)
                                            ->get();
                                
            // ✅ all withdrawals
            $withdrawals = withdrawals::where('is_deleted', 0)->get();
            $todayWithdrawals = withdrawals::where('is_deleted', 0)
                                            // ->whereRaw("STR_TO_DATE(processed_at, '%Y-%m-%d') = CURDATE()")
                                             ->whereDate('processed_at', \Carbon\Carbon::now($timezone)->toDateString())
                                            ->get();
        }
        $data['totalRevenue'] = $transactions->sum('amount');          // Total revenue for assigned store
        $data['totalTransactions'] = $transactions->count();          // Total transactions for assigned store
        $data['totalCustomers'] = $transactions->where('customer_email', '!=' ,'')->groupBy('customer_email')->count(); // Unique customers

        $data['todayRevenue'] = $todayTransactions->sum('amount');
        $data['todayTransactionCount'] = $todayTransactions->count();

        // ✅ NEW: total withdrawals & net revenue
        $data['totalWithdrawals'] = ($user->user_type !== 'staff') ? $withdrawals->sum('amount') : 0;
        $data['todayWithdrawals'] = ($user->user_type !== 'staff') ? $todayWithdrawals->sum('amount') : 0;
        $data['netRevenue'] = ($user->user_type !== 'staff')
            ? $data['totalRevenue'] - $data['totalWithdrawals']
            : $data['totalRevenue']; // staff sees only revenue

        $data['user'] = $user;
        if ($user->user_type !== 'staff') {
            $stores = stores::all();
            $data['shopRevenue'] = [];
            foreach ($stores as $store) {
                $storeTransactions = $transactions->where('store_id', $store->id);
                $storeWithdrawals = $withdrawals->where('store_id', $store->id);

                $totalTransactionAmount = $storeTransactions->sum('amount');
                $totalWithdrawalAmount = $storeWithdrawals->sum('amount');

                $data['shopRevenue'][] = [
                    'store_name' => $store->name,
                    // existing
                    'revenue' => $totalTransactionAmount,
                    'transactions' => $storeTransactions->count(),
                    'customers' => $storeTransactions->where('customer_email', '!=', '')
                        ->groupBy('customer_email')->count(),

                    // ✅ NEW FIELDS
                    'withdrawals' => $totalWithdrawalAmount,
                    'net_revenue' => $totalTransactionAmount - $totalWithdrawalAmount,
                ];
            }
        }

        return view('admin.dashboard', $data);
    }
    public function todaysleads($id)
    {
        return \DB::table('leads')
            ->where('status', $id)
            ->whereRaw("STR_TO_DATE(date, '%d-%m-%Y') = CURDATE()")
            ->count();
        // return \DB::select("SELECT * FROM `lead` where status=" . $id . " AND STR_TO_DATE(date, '%d-%m-%Y')=CURRENT_DATE()");
    }
    public function totalleads($id)
    {
        return leads::where('status', $id)->count();
    }

    // ------------------------------------------------------- general setting ------------------------------------------------------
    // websetting
    public function websetting(Request $request, $id = 0)
    {
        if ($id == 0) {
            return view('admin.websetting', [
                'websetting' => websetting::find(1),
                'contactinfo' => contactinfo::get(),
                'emailinfo' => emailinfo::get()
            ]);
        }

        $update = [];

        switch ($id) {
            case 1:
                $update = $this->handleFileUploads($request, [
                    'hlogo' => 'logo.png',
                    'flogo' => 'flogo.png',
                    'favicon' => 'favicon.png'
                ]);
                break;

            case 2:
                $update = $request->only(['call_mobileno', 'whatsapp_mobileno', 'address', 'location']);

                $repeaterGroup = $request->input('repeater-group', []);

                foreach ($repeaterGroup as $item) {
                    $mobileNumber = $item['mobileno'] ?? null;
                    $cleanMobile = preg_replace('/[^0-9]/', '', $mobileNumber ?? '');
                    $countryCode = $item['country_code'] ?? null;
                    $contactId = $item['contact_id'] ?? null;

                    if ($mobileNumber) {
                        if ($contactId) {
                            contactinfo::where('id', $contactId)->update([
                                'country_code' => $countryCode,
                                'mobile_no' => $cleanMobile,
                            ]);
                        } else {
                            contactinfo::create([
                                'country_code' => $countryCode,
                                'mobile_no' => $cleanMobile,
                            ]);
                        }
                    }

                    $email = $item['email'] ?? null;
                    $emailId = $item['email_id'] ?? null;

                    if ($email) {
                        if ($emailId) {
                            emailinfo::where('id', $emailId)->update([
                                'email' => $email,
                            ]);
                        } else {
                            emailinfo::create([
                                'email' => $email,
                            ]);
                        }
                    }
                }

                break;

            case 3:
                $update = $request->only([
                    'smtp_port',
                    'smtp_host',
                    'smtp_user',
                    'smtp_password',
                    'smtp_crypto',
                    'from',
                    'cc',
                    'receive_inquiry_email'
                ]);
                break;

            case 4:
                $update = $request->only(['g_webconsol', 'g_analytics', 'facebook_pixel']);
                $update['indexing'] = $request->has('indexing') ? 1 : 0;
                break;

            case 5:
                $update = $request->only(['tawk_content', 'footer_content']);
                break;

            case 6:
                $update = $request->only(['stripe_key', 'stripe_secret','stripe_webhook_secret','currency']);
                break;
        }

        if (!empty($update)) {
            websetting::where('id', 1)->update($update);
            $this->flashmessage('Websetting Updated Successfully', 0);
        }

        return redirect()->back();
    }

    public function deletecontactinfo($id)
    {
        contactinfo::where('id', $id)->delete();
        return response()->json(["success" => true]);
    }
    public function deleteemailinfo($id)
    {
        emailinfo::where('id', $id)->delete();
        return response()->json(["success" => true]);
    }
    private function handleFileUploads(Request $request, array $files)
    {
        $update = [];
        foreach ($files as $field => $filename) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $path = public_path('/assets/');
                $file->move($path, $filename);
                $update[$field] = $filename;
            }
        }
        return $update;
    }
    // social media
    public function socialmedia(Request $request, $id = 0)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            $fontdata = DB::table('font_awesome_icons')->where('id', $data['font_id'])->first();
            $ins = [
                'name' => $fontdata->title,
                'icon' => $fontdata->class_name,
                'link' => $data['link'],
                'icon_id' => $data['font_id'],
            ];
            if (!$id) {
                socialmedia::create($ins);
                $this->flashmessage('Social Media Inserted Successfully', 0);
            } else {
                socialmedia::where('id', $id)->update($ins);
                $this->flashmessage('Social Media Updated Successfully', 0);
            }

            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(socialmedia::find($id));
        }

        $data['list'] = socialmedia::orderBy('id', 'DESC')->get();
        $data['icons'] = DB::table('font_awesome_icons')->orderBy('sequence_order', 'ASC')->get();
        return view('admin.socialmedia', $data);
    }
    // user header & footer
    public function userheader(Request $request)
    {
        $data = $request->input();
        if (isset($data['newheader'])) {
            $myFile = resource_path('views/header.blade.php');
            $fh = fopen($myFile, 'w');
            fwrite($fh, $data['newheader']);
            fclose($fh);
            $this->flashmessage("Header Updated Successfully.", 0);
            return redirect()->back();
        }
        $data['header'] = file_get_contents(resource_path('views/header.blade.php'));
        return view('admin.userheader', $data);
    }
    public function userfooter(Request $request)
    {
        $data = $request->input();
        if (isset($data['newfooter'])) {
            $myFile = resource_path('views/footer.blade.php');
            $fh = fopen($myFile, 'w');
            fwrite($fh, $data['newfooter']);
            fclose($fh);
            $this->flashmessage("Footer Updated Successfully.", 0);
            return redirect()->back();
        }
        $data['footer'] = file_get_contents(resource_path('views/footer.blade.php'));
        return view('admin.userfooter', $data);
    }
    // email template
    public function emailtemplate(Request $request, $id = 0)
    {
        $data = $request->input();

        if (!empty($data)) {
            $insert = [
                'title' => $data['title'],
                'template' => $data['template'] ?? null,
            ];

            if ($id == 0) {
                // Insert new email template
                $id = emailtemplate::create($insert)->id;
                $this->flashmessage('Email Template Inserted Successfully', 0);
            } else {
                // Update existing email template
                emailtemplate::where('id', $id)->update($insert);
                $this->flashmessage('Email Template Updated Successfully', 0);
            }

            if ($request->hasFile('attachment')) {
                $attachments = $this->images($request, 'attachment', 'images/emailattachment');
                if (!empty($attachments)) {
                    foreach ($attachments as $attachment) {
                        $attachmentData = [
                            'e_id' => $id,
                            'attachment' => $attachment
                        ];
                        email_attachment::create($attachmentData);
                    }
                }
            }

            return redirect('/admin/emailtemplate');
        }

        if ($id != 0) {
            $data['edit'] = emailtemplate::find($id);
            $data['attachment'] = email_attachment::where('e_id', $id)->get();
            return response()->json($data);
        }
        $data['emailtemplate'] = emailtemplate::with('attachments')->get();
        return view('admin.emailtemplate', $data);
    }
    public function deleteemailattachment($id)
    {
        $attachment = email_attachment::find($id);
        if ($attachment) {
            if (!empty($attachment->attachment)) {
                $filePath = public_path('assets/admin/images/emailattachment/' . $attachment->attachment);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            $attachment->delete();
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false, 'message' => 'Attachment not found'], 404);
    }

    // -------------------------------- lead module -------------------------------------------------------------------
    public function leads(Request $request, $id = '')
    {
        if ($request->isMethod('post')) {
            $action = $id == 0 ? 'can_create' : 'can_edit';
            if (($check = $this->checkPermission('leads', $action)) !== true) {
                return $check; // return redirect or error response
            }

            $data = $request->input();
            $tz = session('admin_timezone', config('app.timezone'));
            $ins = [
                'name' => $data['name'],
                'country_code' => $data['country_code'],
                'mobile' => $data['mobile'],
                'email' => $data['email'],
                'date' => isset($data['date']) ? Carbon::parse($data['date'], $tz) : Carbon::now($tz),
                'source' => 0,
                'subject' => $data['subject'] ?? '',
                'message' => $data['message'] ?? '',
            ];
            if (!$id) {
                $ins['status'] = 0;
                leads::create($ins);
                $this->flashmessage('Lead Inserted Successfully', 0);
            } else {
                leads::where('id', $id)->update($ins);
                $this->flashmessage('Lead Updated Successfully', 0);
            }

            return redirect()->back();
        }
        $emailtemplate = emailtemplate::where('is_delete', 0)->get();
        if ($id != 0) {
            if (($check = $this->checkPermission('leads', 'can_view')) !== true) {
                return $check;
            }
            $lead = leads::find($id);
            if ($request->ajax()) {
                return response()->json($lead);
            }
            return view('admin.leads', ['lead' => $lead, 'id' => $id, 'emailtemplate' => $emailtemplate]);
        }
        if($request->isMethod('get') && $id == 0){
            if (($check = $this->checkPermission('leads', 'can_view')) !== true) {
                return $check;
            }
            return view('admin.leads', ['id' => $id, 'emailtemplate' => $emailtemplate]);
        }
    }
    public function leadajaxdata(Request $request)
    {
        $data = $request->input();
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowPerPage = $request->get("length");
        $orderArray = $request->get('order', []);
        $columnNameArray = $request->get('columns', []);
        $searchArray = $request->get('search', []);
        $columnIndex = isset($orderArray[0]['column']) ? $orderArray[0]['column'] : 0;
        $columnName = isset($columnNameArray[$columnIndex]['data']) ? $columnNameArray[$columnIndex]['data'] : 'id';
        $columnSortOrder = isset($orderArray[0]['dir']) ? $orderArray[0]['dir'] : 'desc';
        $searchValue = isset($searchArray['value']) ? $searchArray['value'] : '';

        $query = leads::query();

        if ($data['leadid'] != '') {
            $query->where('status', $data['leadid']);
        }

        if ($request->filled('source') && $request->source != '') {
            $query->where('source', $request->source);
        }

        if ($request->filled('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('subject', 'like', '%' . $search . '%')
                    ->orWhere('message', 'like', '%' . $search . '%');
            });
        }

        $daterange = $request->daterange;

        if (!empty($daterange)) {
            $dates = explode(' to ', $daterange);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(DB::raw("STR_TO_DATE(leads.date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        $totalRecords = $query->count();
        // Apply sorting and pagination if rowPerPage is not -1
        if ($rowPerPage != -1) {
            $results = $query->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowPerPage)
                ->get();
        } else {
            $results = $query->orderBy($columnName, $columnSortOrder)
                ->get();
        }

        $user = session('admin'); // Or use auth()->user() if preferred
        $isAdmin = $user && in_array($user->user_type, ['super_admin', 'sub_admin']);

        $newarr = [];
        if ($results->isNotEmpty()) {
            $i = 1;
            foreach ($results as $k => $value) {
                $isAdmin = in_array($user->user_type, ['super_admin', 'sub_admin']);
                $checkbox = '<th>
                               <div class="form-check">
                                    <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $k . '" value="' . $value->id . '">
                                </div> 
                            </th>';

                $action = '<div>';
                // Check if user is Super Admin or Sub Admin
                 if ($isAdmin) {
                    $action .= '<button data-id="' . $value->id . '" class="btn mb-1 me-1 btn-primary btn-sm d-inline-flex align-items-center justify-content-center edit-btn" title="Edit Lead" data-bs-toggle="modal" data-bs-target="#editleads-modal">
                                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                                </button>';
                    $action .= '<button data-id="' . $value->id . '" data-rownumber = "' . $i . '" class="btn mb-1 me-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata" data-table="leads" data-field="id" data-rownumber="' . $k . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Lead">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>';
                    if ($value->status != 3 && $value->status != 2) {
                        $action .= '<button data="' . $value->id . '" class="btn mb-1 me-1 btn-secondary btn-sm d-inline-flex align-items-center justify-content-center followup" title="Lead Followup" data-bs-toggle="modal" data-bs-target="#followup-modal">
                                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                    </button>';
                    }

                    $action .= '<button data-id="' . $value->id . '" class="btn mb-1 me-1 btn-dark btn-sm d-inline-flex align-items-center justify-content-center sendmail" title="Send Mail" data-bs-toggle="modal" data-bs-target="#leadsmail-modal">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </button>';
                }
                $action .= '</div>';

                $history = '<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#history-modal" data=' . $value->id . ' title="Lead History" class="history link-primary link-offset-2">' . $value->name . '</a>';

                $status = '';
                $status .= '<select class="select2 form-control form-select selstatus" data="' . $value->id . '" data-rownumber = "' . $i . '" ' . (!$isAdmin ? 'disabled' : '') . '>
                              <option value="0" ' . ($value->status == 0 ? 'selected' : '') . ' >New</option>
                              <option value="1" ' . ($value->status == 1 ? 'selected' : '') . ' >Processing</option>
                              <option value="2" ' . ($value->status == 2 ? 'selected' : '') . ' >Confirm</option>
                              <option value="3" ' . ($value->status == 3 ? 'selected' : '') . ' >Cancel</option>
                            </select>';

                $source = '';
                switch ($value->source) {
                    case 0:
                        $source .= '<span class="badge bg-danger-subtle text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                    <i class="ti ti-clock-hour-4 fs-3"></i>Offline
                                </span>';
                        break;
                    case 1:
                        $source .= ' <span class="badge bg-success-subtle text-success fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                        <i class="ti ti-circle fs-3"></i>Website
                                    </span>';
                        break;
                    default:
                        $source .= '';
                        break;
                }

                $newarr[] = array(
                    'id' => $i++,
                    '' => $checkbox,
                    'name' => $history,
                    'mobile' => '+' . $value->country_code . ' ' . $value->mobile,
                    'email' => $value->email,
                    'source' => $source,
                    'date' => $value->date,
                    'subject' => $value->subject,
                    'message' => $value->message,
                    'status' => $status,
                    'action' => $action,
                );
            }
        }
        // Get filtered count
        $totalFiltered = $totalRecords;

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => $newarr,
        );

        return response()->json($response);
    }
    public function leadfollowup(Request $request)
    {
        $tz = session('admin_timezone', config('app.timezone'));
        leadfollow::create([
            'l_id' => $request->input('l_id'),
            'date' => Carbon::now($tz),
            'comment' => $request->input('comment'),
            'n_f_date' => Carbon::parse($request->input('n_f_date'), $tz),
        ]);

        leads::where('id', $request->input('l_id'))->update(['status' => 1]);

        $this->flashmessage('Lead Followed successfully', 0);
        return redirect()->back();
    }
    public function leadcancel(Request $request)
    {
        $data = $request->input();
        $leadId = $data['leadcancel_id'];
        $cancelReason = $data['cancel_reason'];

        $lead = leads::find($leadId);
        if ($lead) {
            $lead->status = 3;
            $lead->cancel_reason = $cancelReason;
            $lead->save();
        } else {
            return response()->json(['success' => false, 'message' => 'Lead not found'], 404);
        }

        $this->flashmessage('Lead Cancelled successfully', 0);
        return redirect()->back();
    }
    public function leadmail(Request $request)
    {
        $data = $request->input();
        $lead = leads::find($data['leadmail_id']);
        $template = emailtemplate::find($data['e_id']);

        if (!$lead || !$template) {
            $this->flashmessage('Lead or Email Template not found.', 1);
            return redirect()->back();
        }

        $attach = email_attachment::where('e_id', $data['e_id'])->get();
        $attachment = array();
        foreach ($attach as $v) {
            array_push($attachment, public_path('assets/admin/images/emailattachment/' . $v->url));
        }
        $msg = $template->template;
        $msg = str_replace("{:name:}", $lead->name, $msg);
        $msg = str_replace("{:email:}", $lead->email, $msg);
        $msg = str_replace("{:number:}", $lead->mobile, $msg);

        $websetting = websetting::first();
        if (isset($websetting->receive_inquiry_email) && !empty($websetting->receive_inquiry_email) && !empty($websetting->smtp_host) && !empty($websetting->smtp_port) && !empty($websetting->smtp_user) && !empty($websetting->smtp_password) && !empty($websetting->from)) 
        {
            $this->emailsend($lead['email'], $template->title, $msg, $attachment);
            $this->flashmessage('Mail Send Successfully', 0);
            return redirect()->back();
        } else{
            $this->flashmessage('SMTP Crendential Invalid', 1);
            return redirect()->back();
        }
    }
    public function leadhistory($id)
    {
        $lead = leads::with('leadfollow')->find($id);
        if (!$lead) {
            return response()->json(['error' => 'Lead not found'], 404);
        }

        $flead = '';
        if ($lead->leadfollow->isNotEmpty()) {
            foreach ($lead->leadfollow as $key => $followup) {
                $flead .= '<div class="accordion-item">
                                <h2 class="accordion-header" id="flush-heading' . $followup->id . '">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse' . $followup->id . '"  aria-expanded="false" aria-controls="flush-collapse' . $followup->id . '">
                                        ' . $lead->name . '  (' . $followup->date . ')
                                    </button>
                                </h2>
                                <div id="flush-collapse' . $followup->id . '" class="accordion-collapse collapse" aria-labelledby="flush-heading' . $followup->id . '" data-bs-parent="#accordionFlushExample"> 
                                    <div class="accordion-body" id="n_f_date">
                                        <div>
                                            <label class="form-label text-left col-md-3"> Next Followup Date:</label> 
                                            <div class="col-md-12">
                                                <p class="mb-0">' . $followup->n_f_date . '</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <label class="form-label text-left col-md-3"> Comment:</label> 
                                            <div class="col-md-12">
                                                <p class="mb-0">' . $followup->comment . '</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
        }

        $status = '';
        switch ($lead->status) {
            case 0:
                $status .= '<span class="mb-1 badge text-bg-primary">Pending</span>';
                break;
            case 1:
                $status .= '<span class="mb-1 badge text-bg-warning">Processing</span>';
                break;
            case 2:
                $status .= '<span class="mb-1 badge text-bg-success">Confirmed</span>';
                break;
            case 3:
                $status .= '<span class="mb-1 badge text-bg-danger">Cancelled</span>';
                break;
            default:
                $status .= '';
                break;
        }

        $source = '';
        switch ($lead->source) {
            case 0:
                $source .= '<span class="badge bg-danger-subtle text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                            <i class="ti ti-clock-hour-4 fs-3"></i>Offline
                        </span>';
                break;
            case 1:
                $source .= ' <span class="badge bg-success-subtle text-success fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                                <i class="ti ti-circle fs-3"></i>Website
                            </span>';
                break;
            default:
                $source .= '';
                break;
        }

        $history = [
            'name' => $lead->name,
            'mobile' => '+' . $lead->country_code . ' ' . $lead->mobile,
            'email' => $lead->email,
            'source' => $source,
            'date' => $lead->date,
            'message' => $lead->message,
            'status' => $status,
            'leadstatus' => $lead->status,
            'subject' => $lead->subject,
            'followup' => $flead,
            'cancelreason' => $lead->cancel_reason,
        ];
        echo json_encode($history);
    }
    public function leadstatus(Request $request)
    {
        $data = $request->all();
        $user = session('admin');
        if (!$user || !in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have permission to update status.'
            ], 400);
        }
        $lead = leads::find($data['leadid']);
        if ($lead) {
            $lead->status = $data['status'];
            $lead->cancel_reason = null;
            $lead->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
    public function readnotification($id)
    {
        leads::where('id', $id)->update(['notification_status' => 1]);
        return response()->json(['success' => true]);
    }
    public function readallnotifications()
    {
        try {
            leads::where('notification_status', 0)->update(['notification_status' => 1]);
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // -------------------------------- end lead module -------------------------------------------------------------------

    // -------------------------------- seo module -------------------------------------------------------------------
    public function sitemap(Request $request)
    {
        $data = $request->input();
        if (isset($data['sitemap'])) {
            $myFile = base_path('sitemap.xml');
            $fh = fopen($myFile, 'w');
            fwrite($fh, $data['sitemap']);
            fclose($fh);
            $this->flashmessage("<strong>Success!</strong> Sitemap XML Updated Successfully!!!", 0);
            return redirect('/admin/sitemap');
        }
        $data['sitemapdata'] = file_get_contents(base_path('sitemap.xml'));
        return view('admin.sitemap', $data);
    }
    public function robots(Request $request, $id = 0)
    {
        $data = $request->input();
        if (isset($data['newcontent'])) {
            $myFile = base_path('robots.txt');
            $fh = fopen($myFile, 'w');
            fwrite($fh, $data['newcontent']);
            fclose($fh);
            $this->flashmessage("<strong>Success!</strong> Robots Updated!!!", 0);
            return redirect('/admin/robots');
        }
        $data['content'] = file_get_contents(base_path('robots.txt'));
        return view('admin.robots', $data);
    }
    public function generatexml()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/')
                ->setLastModificationDate(now())
                ->setChangeFrequency('daily')
                ->setPriority(1.0));

        // Add categories
        $categories = category::all();
        foreach ($categories as $category) {
            $sitemap->add(Url::create($category->category_url)
                ->setLastModificationDate($category->updated_at)
                ->setChangeFrequency('monthly')
                ->setPriority(0.6));
        }

        // Add pages and blogs
        $pages = pages::where([['type', 0],['url' ,'!=', 'index']])->get();
        foreach ($pages as $page) {
            $sitemap->add(Url::create($page->url)
                ->setLastModificationDate($page->updated_at)
                ->setChangeFrequency('monthly')
                ->setPriority(0.7));
        }
        $blog = pages::where('type', 1)->get();
        foreach ($blog as $blog) {
            $sitemap->add(Url::create($blog->url)
                ->setLastModificationDate($blog->updated_at)
                ->setChangeFrequency('weekly')
                ->setPriority(0.5));
        }

        $sitemap->writeToFile(base_path('sitemap.xml'));
        $this->flashmessage('Sitemap generated successfully!', 0);
        return redirect()->back();
    }
    // -------------------------------- end seo module -------------------------------------------------------------------

    // -------------------------------------  page & blog ---------------------------------------------------------------
    public function deletesection($id)
    {
        DB::transaction(function () use ($id) {
            $contents = DB::table('page_content')->where('s_id', $id)->get();
            foreach ($contents as $content) {
                if ($content->content_image) {
                    $eventimagePath = public_path('/assets/admin/images/event/' . $content->content_image);
                    $blogimagePath = public_path('/assets/admin/images/blog/' . $content->content_image);
                    $pageImagePath = public_path('/assets/admin/images/page/' . $content->content_image);

                    // Check if the file exists and delete it
                    if (file_exists($pageImagePath)) {
                        unlink($pageImagePath);
                    }
                    if (file_exists($blogimagePath)) {
                        unlink($blogimagePath);
                    }
                    if (file_exists($eventimagePath)) {
                        unlink($eventimagePath);
                    }
                }
            }

            DB::table('page_content')->where('s_id', $id)->delete();
            DB::table('page_section')->where('id', $id)->delete();
            Cache::forget('latest_blogs');
            Cache::forget('latest_events');
        });
    }
    public function deletecontent($id)
    {
        DB::transaction(function () use ($id) {
            $content = DB::table('page_content')->where('id', $id)->first();

            if ($content && $content->content_image) {
                $eventimagePath = public_path('/assets/admin/images/event/' . $content->content_image);
                $blogimagePath = public_path('/assets/admin/images/blog/' . $content->content_image);
                $pageImagePath = public_path('/assets/admin/images/page/' . $content->content_image);

                // Check if the file exists and delete it
                if (file_exists($pageImagePath)) {
                    unlink($pageImagePath);
                }

                if (file_exists($blogimagePath)) {
                    unlink($blogimagePath);
                }

                if (file_exists($eventimagePath)) {
                    unlink($eventimagePath);
                }
            }

            DB::table('page_content')->where('id', $id)->delete();
            Cache::forget('latest_blogs');
            Cache::forget('latest_events');
        });
    }
    public function deletepagedata(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];

        $pathMappings = [
            'blog' => [
                'root' => '/assets/admin/images/blog/',
                'thumbnails' => '/assets/admin/images/blog/thumbnails/'
            ],
            'event' => [
                'root' => '/assets/admin/images/event/',
                'thumbnails' => '/assets/admin/images/event/thumbnails/'
            ],
            'page' => [
                'root' => '/assets/admin/images/page/',
                'thumbnails' => '/assets/admin/images/page/thumbnails/'
            ],
        ];

        try {
            DB::beginTransaction();

            $page = pages::with('page_section.page_content')->find($id);

            if ($page) {
                $type = '';
                if ($page->type == 1) {
                    $type = 'blog';
                    $comments = comment::where('page_id', $id)->get();
                    foreach ($comments as $comment) {
                        $comment->delete();
                    }
                } elseif ($page->type == 2) {
                    $type = 'event';
                } else {
                    $type = 'page'; // Default type for other pages
                }

                $rootPath = $pathMappings[$type]['root'];
                $thumbnailPath = $pathMappings[$type]['thumbnails'];

                foreach ($page->page_section as $section) {
                    foreach ($section->page_content as $content) {
                        if (!empty($content->content_image)) {
                            $contentImagePath = public_path($rootPath . $content->content_image);
                            if (file_exists($contentImagePath)) {
                                unlink($contentImagePath);
                            }
                        }

                        // Delete the content record
                        $content->delete();
                    }
                    // Delete the section record
                    $section->delete();
                }

                // Unlink the page image if it exists
                if (isset($page->image) && !empty($page->image)) {
                    $pageImagePath = public_path($rootPath . $page->image);
                    $pagethumbanilsImagePath = public_path($thumbnailPath . $page->image);
                    if (file_exists($pageImagePath)) {
                        unlink($pageImagePath);
                    }
                    if (file_exists($pagethumbanilsImagePath)) {
                        unlink($pagethumbanilsImagePath);
                    }
                }
                $page->delete();
            }
            Cache::forget('latest_blogs');
            Cache::forget('latest_events');
            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Something went wrong! ' . $e->getMessage()]);
        }
    }
    public function deleteallpagedata(Request $request)
    {
        $dataarr = $request->input('dataarr', []);
        if (empty($dataarr)) {
            return response()->json(['status' => false, 'message' => 'No records selected.']);
        }

        $pathMappings = [
            'blog' => [
                'root' => '/assets/admin/images/blog/',
                'thumbnails' => '/assets/admin/images/blog/thumbnails/'
            ],
            'event' => [
                'root' => '/assets/admin/images/event/',
                'thumbnails' => '/assets/admin/images/event/thumbnails/'
            ],
            'page' => [
                'root' => '/assets/admin/images/page/',
                'thumbnails' => '/assets/admin/images/page/thumbnails/'
            ],
        ];

        try {
            DB::beginTransaction();

            foreach ($dataarr as $id) {
                $page = pages::with('page_section.page_content')->find($id);

                if ($page) {
                    $type = '';
                    if ($page->type == 1) {
                        $type = 'blog';
                        $comments = comment::where('page_id', $id)->get();
                        foreach ($comments as $comment) {
                            $comment->delete();
                        }
                    } elseif ($page->type == 2) {
                        $type = 'event';
                    } else {
                        $type = 'page'; // Default type for other pages
                    }

                    $rootPath = $pathMappings[$type]['root'];
                    $thumbnailPath = $pathMappings[$type]['thumbnails'];

                    foreach ($page->page_section as $section) {
                        foreach ($section->page_content as $content) {
                            if (!empty($content->content_image)) {
                                $contentImagePath = public_path($rootPath . $content->content_image);
                                if (file_exists($contentImagePath)) {
                                    unlink($contentImagePath);
                                }
                            }

                            // Delete the content record
                            $content->delete();
                        }
                        // Delete the section record
                        $section->delete();
                    }

                    // Unlink the page image if it exists
                    if (isset($page->image) && !empty($page->image)) {
                        $pageImagePath = public_path($rootPath . $page->image);
                        $pagethumbanilsImagePath = public_path($thumbnailPath . $page->image);
                        if (file_exists($pageImagePath)) {
                            unlink($pageImagePath);
                        }
                        if (file_exists($pagethumbanilsImagePath)) {
                            unlink($pagethumbanilsImagePath);
                        }
                    }
                    $page->delete();
                }

            }

            DB::commit();
            return response()->json(['status' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Something went wrong! ' . $e->getMessage()]);
        }
    }
    // ------------------------------------- end page & blog ---------------------------------------------------------------

    // --------------------------------  gallery module -------------------------------------------------------------------
    public function gallery(Request $request, $id = 0)
    {
        $data = $request->all();
        if (count($data) > 0 && $id == 0) {
             // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('gallery', 'can_create')) !== true) {
                return $check;
            }
            $gallery = $this->images($request, 'g_image', 'images/gallery', 1);
            if (isset($gallery) && is_array($gallery)) {
                foreach ($gallery as $val) {
                    $ins['g_image'] = $val;
                    gallery::create($ins);
                }
            }
            $this->flashmessage('Gallery Inserted Successfully', 0);
            return redirect()->back();
        }
        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('gallery', 'can_view')) !== true) {
                return $check;
            }
            $data['gallery'] = gallery::orderBy('id', 'DESC')->get();
            return view('admin.gallery', $data);
        }
    }
    public function getgallerydata($id)
    {
        $data = gallery::find($id);
        return response()->json($data);
    }
    public function galleryupdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['g_id'])) {
                $this->flashmessage('Gallery ID is missing.');
            }

            $galleryRecord = gallery::find($data['g_id']);
            if (!$galleryRecord) {
                $this->flashmessage('Gallery record not found.');
            }

            $gallery = $this->images($request, 'g_image', 'images/gallery', 1);

            if (isset($gallery[0])) {
                $newImage = $gallery[0];
                if (!empty($galleryRecord->g_image)) {
                    $oldImagePath = public_path('/assets/admin/images/gallery/' . $galleryRecord->g_image);
                    $oldThumbnailPath = public_path('/assets/admin/images/gallery/thumbnails/' . $galleryRecord->g_image);

                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }

                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }

                $galleryRecord->g_image = $newImage;
                $galleryRecord->save();
            }

            DB::commit();
            $this->flashmessage('Gallery Updated Successfully', 0);
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->flashmessage('Error: ' . $e->getMessage(), 1);
            return redirect()->back();
        }
    }
    // -------------------------------- end gallery module -------------------------------------------------------------------

    // --------------------------------  slider module -------------------------------------------------------------------
    public function slider(Request $request, $id = 0)
    {
        $data = $request->all();
        if (count($data) > 0 && $id == 0) {
            // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('slider', 'can_create')) !== true) {
                return $check;
            }
            $insert = array(
                'image_alt' => $data['image_alt'] ?? null,
                'image_title' => $data['image_title'] ?? null,
                'heading' => $data['heading'] ?? null,
                'sub_heading' => $data['sub_heading'] ?? null,
                'button_text' => $data['button_text'] ?? null,
                'button_link' => $data['button_link'] ?? null,
            );
            $banner_image = $this->images($request, 'banner_image', 'images/slider', 1);
            if (isset($banner_image[0])) {
                $insert['banner_image'] = $banner_image[0];
            }
            slider::create($insert);
            Cache::forget('sliders');
            $this->flashmessage('Slider Inserted Successfully', 0);
            return redirect('/admin/slider');
        }
        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('slider', 'can_view')) !== true) {
                return $check;
            }
            $data['slider'] = slider::orderBy('id', 'DESC')->get();
            return view('admin.slider', $data);
        }
    }
    public function getsliderdata($id)
    {
        $data = slider::find($id);
        return response()->json($data);
    }
    public function sliderupdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['slider_id'])) {
                $this->flashmessage('Slider ID is missing.');
            }

            $sliderRecord = slider::find($data['slider_id']);
            if (!$sliderRecord) {
                $this->flashmessage('Slider record not found.');
            }

            $updateData = [
                'image_alt' => $data['image_alt'] ?? null,
                'image_title' => $data['image_title'] ?? null,
                'heading' => $data['heading'] ?? null,
                'sub_heading' => $data['sub_heading'] ?? null,
                'button_text' => $data['button_text'] ?? null,
                'button_link' => $data['button_link'] ?? null,
            ];
            $slider = $this->images($request, 'banner_image', 'images/slider', 1);

            if (isset($slider[0])) {
                $newImage = $slider[0];
                if (!empty($sliderRecord->banner_image)) {
                    $oldImagePath = public_path('/assets/admin/images/slider/' . $sliderRecord->banner_image);
                    $oldThumbnailPath = public_path('/assets/admin/images/slider/thumbnails/' . $sliderRecord->banner_image);

                    // Delete old images if they exist
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }

                $updateData['banner_image'] = $newImage;
            }
            $sliderRecord->update($updateData);
            Cache::forget('sliders');

            DB::commit();
            $this->flashmessage('Slider Updated Successfully', 0);
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->flashmessage('Failed to update slider: ' . $e->getMessage(), 1);
            return redirect()->back();
        }
    }
    // -------------------------------- end slider module -------------------------------------------------------------------

    // -------------------------------- category module -------------------------------------------------------------------
    public function category(Request $request, $id = 0)
    {
        $data = $request->all();
        if (isset($data) && count($data) > 0 && $id == 0) {
            // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('category', 'can_create')) !== true) {
                return $check;
            }
            $insert = array(
                'category_name' => $data['category_name'],
                'category_url' => $data['category_url'],
                'category_image_alt' => $data['category_image_alt'] ?? null,
                'category_image_title' => $data['category_image_title'] ?? null,
                'meta_title' => $data['meta_title'] ?? null,
                'meta_description' => $data['meta_description'] ?? null,
                'content' => $data['content'] ?? null,
                'p_c_id' => isset($data['p_c_id']) ? $data['p_c_id'] : 0,
            );
            $category_image = $this->images($request, 'category_image', 'images/category', 1);
            if (isset($category_image[0])) {
                $insert['category_image'] = $category_image[0];
            }
            category::create($insert);
            $this->flashmessage('Category inserted successfully', 0);
            return redirect('/admin/category');
        }
        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('category', 'can_view')) !== true) {
                return $check;
            }
            $data['category'] = category::orderBy('id', 'DESC')->get();
            return view('admin.category', $data);
        }
    }
    public function getcateorydata($id)
    {
        $data = category::find($id);
        return response()->json($data);
    }
    public function categoryupdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['category_id'])) {
                $this->flashmessage('Category ID is missing.');
            }
            $categoryRecord = category::find($data['category_id']);
            if (!$categoryRecord) {
                $this->flashmessage('Category record not found.');
            }
            $updateData = [
                'category_name' => $data['category_name'],
                'category_url' => $data['category_url'],
                'category_image_alt' => $data['category_image_alt'] ?? null,
                'category_image_title' => $data['category_image_title'] ?? null,
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'] ?? null,
                'content' => $data['content'] ?? null,
                'p_c_id' => isset($data['p_c_id']) ? $data['p_c_id'] : 0,
            ];
            $category = $this->images($request, 'category_image', 'images/category', 1);

            if (isset($category[0])) {
                $newImage = $category[0];
                if (!empty($categoryRecord->category_image)) {
                    $oldImagePath = public_path('/assets/admin/images/category/' . $categoryRecord->category_image);
                    $oldThumbnailPath = public_path('/assets/admin/images/category/thumbnails/' . $categoryRecord->category_image);

                    // Delete old images if they exist
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }

                $updateData['category_image'] = $newImage;
            }

            $categoryRecord->update($updateData);
            DB::commit();
            $this->flashmessage('Category Updated Successfully', 0);
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->flashmessage('Failed to update category: ' . $e->getMessage(), 1);
            return redirect()->back();
        }
    }
    public function deletecategorydata(Request $request)
    {
        $data = $request->all();

        $categoryId = $data['id'];
        $subCategories = category::where('p_c_id', $categoryId)->count();

        if ($subCategories > 0) {
            return response()->json([
                'status' => 2,
                'message' => 'You cannot delete this category because it has subcategories.'
            ]);
        }

        $isCategoryUsedInPages = pages::where('category_id', $categoryId)->orWhere('subcategory_id', $categoryId)->exists();
        if ($isCategoryUsedInPages) {
            return response()->json([
                'status' => 2,
                'message' => 'You cannot delete this category because it is associated with pages.'
            ]);
        }

        // If no subcategories, proceed with deletion
        $category = category::find($categoryId);
        if ($category) {
            if (!empty($category->category_image) && file_exists(public_path('assets/admin/images/category/' . $category->category_image))) {
                unlink(public_path('assets/admin/images/category/' . $category->category_image));
            }
            if (!empty($category->category_image) && file_exists(public_path('assets/admin/images/category/thumbnails/' . $category->category_image))) {
                unlink(public_path('assets/admin/images/category/thumbnails/' . $category->category_image));
            }
            $category->delete();

            return response()->json([
                'status' => 1,
                'message' => 'Category deleted successfully.'
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Category not found.'
            ]);
        }
    }
    public function deleteallcategorydata(Request $request)
    {
        $data = $request->all();
        $categoryIds = $data['dataarr'];

        foreach ($categoryIds as $categoryId) {
            $subCategories = category::where('p_c_id', $categoryId)->count();
            if ($subCategories > 0) {
                return response()->json([
                    'status' => 2,
                    'message' => 'You cannot delete one or more selected categories because they have subcategories.'
                ]);
            }

            $isCategoryUsedInPages = pages::where('category_id', $categoryId)->orWhere('subcategory_id', $categoryId)->exists();
            if ($isCategoryUsedInPages) {
                return response()->json([
                    'status' => 2,
                    'message' => 'You cannot delete this category because it is associated with pages.'
                ]);
            }
        }

        foreach ($categoryIds as $categoryId) {
            $category = category::find($categoryId);
            if ($category) {
                if (!empty($category->category_image) && file_exists(public_path('assets/admin/images/category/' . $category->category_image))) {
                    unlink(public_path('assets/admin/images/category/' . $category->category_image));
                }

                if (!empty($category->category_image) && file_exists(public_path('assets/admin/images/category/thumbnails/' . $category->category_image))) {
                    unlink(public_path('assets/admin/images/category/thumbnails/' . $category->category_image));
                }

                $category->delete();
            }
        }

        return response()->json([
            'status' => 1,
            'message' => 'Selected categories deleted successfully.'
        ]);
    }
    // ------------------------------------------- end category module ---------------------------------------------------------

    // -------------------------------------------  FAQ module ---------------------------------------------------------
    public function faq(Request $request, $id = 0)
    {
        $data = $request->only(['faq_question', 'faq_answer']);

        if ($request->isMethod('post')) {
            $action = $id == 0 ? 'can_create' : 'can_edit';
            // 🔥 Check permission
            if (($check = $this->checkPermission('faq', $action)) !== true) {
                return $check;
            }
            $message = $id ? 'FAQ Updated Successfully' : 'FAQ Inserted Successfully';

            faq::updateOrCreate(
                ['id' => $id],
                $data
            );

            Cache::forget('faq');
            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(faq::find($id));
        }

        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('faq', 'can_view')) !== true) {
                return $check;
            }
            $data['list'] = faq::orderBy('id', 'DESC')->get();
            return view('admin.faq', $data);
        }
    }
    // -------------------------------------------  FAQ module end ---------------------------------------------------------

    // -------------------------------------------  testimonial module ---------------------------------------------------------
    public function testimonials(Request $request, $id = 0)
    {
        $data = $request->all();
        if (count($data) > 0 && $id == 0) {
             // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('testimonials', 'can_create')) !== true) {
                return $check;
            }
            $insert = array(
                'client_name' => $data['client_name'] ?? null,
                'message' => $data['message'] ?? null,
                'client_position' => $data['client_position'] ?? null,
                'date' => isset($data['date']) ? date("d-m-Y", strtotime($data['date'])) : date("d-m-Y"),
            );
            $client_image = $this->images($request, 'client_image', 'images/testimonials', 1);
            if (isset($client_image[0])) {
                $insert['client_image'] = $client_image[0];
            }
            testimonials::create($insert);
            Cache::forget('testimonials');
            $this->flashmessage('Testimonials Inserted Successfully', 0);
            return redirect('/admin/testimonials');
        }
        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('testimonials', 'can_view')) !== true) {
                return $check;
            }
            $data['testimonials'] = testimonials::orderBy('id', 'DESC')->get();
            return view('admin.testimonials', $data);
        }
    }
    public function gettestimonialdata($id)
    {
        $data = testimonials::find($id);
        return response()->json($data);
    }
    public function testimonialsupdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['testimonials_id'])) {
                $this->flashmessage('Testimonials ID is missing.');
            }
            $testimonialsRecord = testimonials::find($data['testimonials_id']);
            if (!$testimonialsRecord) {
                $this->flashmessage('Testimonials record not found.');
            }
            $updateData = [
                'client_name' => $data['client_name'],
                'message' => $data['message'],
                'client_position' => $data['client_position'] ?? null,
                'date' => isset($data['date']) ? date("d-m-Y", strtotime($data['date'])) : date("d-m-Y"),
            ];
            $testimonials = $this->images($request, 'client_image', 'images/testimonials', 1);
            if (isset($testimonials[0])) {
                $newImage = $testimonials[0];
                if (!empty($testimonialsRecord->client_image)) {
                    $oldImagePath = public_path('assets/admin/images/testimonials/' . $testimonialsRecord->client_image);
                    $oldThumbnailPath = public_path('assets/admin/images/testimonials/thumbnails/' . $testimonialsRecord->client_image);

                    // Delete old images if they exist
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }
                $updateData['client_image'] = $newImage;
            }
            $testimonialsRecord->update($updateData);
            Cache::forget('testimonials');
            DB::commit();
            $this->flashmessage('Testimonials Updated Successfully', 0);
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->flashmessage('Failed to update testimonials: ' . $e->getMessage(), 1);
            return redirect()->back();
        }
    }
    // ------------------------------------------- end testimonial function ---------------------------------------------------------

    // ------------------------------------------- subscribe function ---------------------------------------------------------
    public function subscribe(Request $request, $id = 0)
    {
        $data['subscribe'] = subscribe::orderBy('id', 'DESC')->get();
        return view('admin.subscribe', $data);
    }
    public function subscribeajaxdata(Request $request)
    {
        $query = subscribe::orderBy('id', 'DESC');

        if ($request->filled('daterange')) {
            $dates = explode(' to ', $request->daterange);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(DB::raw("STR_TO_DATE(date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        $subscribes = $query->get();

        $data = [];
        $i = 1;
        foreach ($subscribes as $value) {
            $data[] = [
                $i++,
                $value->email,
                date('d-m-Y', strtotime($value->date)),
            ];
        }

        // Return the result as JSON for DataTable
        return response()->json(['data' => $data]);
    }
    // ------------------------------------------- end subscribe function ---------------------------------------------------------

    // ------------------------------------------- Location add -------------------------------------------------------------
    public function country(Request $request, $id = 0)
    {
        $data = $request->only(['country_name']);

        if ($request->isMethod('post')) {
            $message = $id ? 'Country Updated Successfully' : 'Country Inserted Successfully';

            country::updateOrCreate(
                ['id' => $id],
                $data
            );

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(country::find($id));
        }

        $data['list'] = country::orderBy('id', 'DESC')->get();
        return view('admin.country', $data);
    }
    public function countryajaxdata(Request $request)
    {
        $states = country::orderBy('id', 'DESC')->get();
        $data = [];
        $i = 1;
        foreach ($states as $key => $value) {
            $action = '<button type="button" data-bs-toggle="modal" data-bs-target="#editcountry-modal" class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn" data-id="' . $value->id . '" title="Edit">
                            <i class="fs-5 ti ti-edit"></i>
                        </button>
                        <button type="button" class="btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata"
                        data-table="country" data-field="id" data-rownumber="' . $key . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Country">
                            <i class="fs-5 ti ti-trash"></i>
                        </button>';
            $checkbox = '<div class="form-check">
                            <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $key . '" value="' . $value->id . '">
                        </div>';
            $data[] = [
                $i++,
                $checkbox,
                $value->country_name,
                $action,
            ];
        }

        // Return the result as JSON for DataTable
        return response()->json(['data' => $data]);
    }
    public function state(Request $request, $id = 0)
    {
        $data = $request->only(['state_name', 'country_id']);

        if ($request->isMethod('post')) {
            $message = $id ? 'State Updated Successfully' : 'State Inserted Successfully';

            state::updateOrCreate(
                ['id' => $id],
                $data
            );

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(state::find($id));
        }
        $data['country'] = country::orderBy('country_name', 'ASC')->get();
        return view('admin.state', $data);
    }
    public function stateajaxdata(Request $request)
    {
        $query = state::with('country');
        if ($request->filled('country_id') && $request->country_id != '') {
            $query->where('country_id', $request->country_id);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('state_name', 'like', '%' . $search . '%');
            });
        }
        $states = $query->orderBy('id', 'DESC')->get();

        $data = [];
        $i = 1;
        foreach ($states as $key => $value) {
            $action = '<button type="button" data-bs-toggle="modal" data-bs-target="#editstate-modal" class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn" data-id="' . $value->id . '" title="Edit">
                            <i class="fs-5 ti ti-edit"></i>
                        </button>
                        <button type="button" class="btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata"
                        data-table="state" data-field="id" data-rownumber="' . $key . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete State">
                            <i class="fs-5 ti ti-trash"></i>
                        </button>';
            $checkbox = '<div class="form-check">
                            <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $key . '" value="' . $value->id . '">
                        </div>';
            $data[] = [
                $i++,
                $checkbox,
                $value->country->country_name,
                $value->state_name,
                $action,
            ];
        }

        // Return the result as JSON for DataTable
        return response()->json(['data' => $data]);
    }
    public function city(Request $request, $id = 0)
    {
        $data = $request->only(['city_name', 'state_id', 'country_id']);

        if ($request->isMethod('post')) {
            $message = $id ? 'City Updated Successfully' : 'City Inserted Successfully';

            city::updateOrCreate(
                ['id' => $id],
                $data
            );

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(city::find($id));
        }

        $data['list'] = city::orderBy('id', 'DESC')->get();
        $data['country'] = country::orderBy('country_name', 'ASC')->get();
        $data['state'] = state::orderBy('state_name', 'ASC')->get();
        return view('admin.city', $data);
    }
    public function cityajaxdata(Request $request)
    {
        $query = city::with(['country', 'state']);
        if ($request->filled('country_id') && $request->country_id != '') {
            $query->where('country_id', $request->country_id);
        }
        if ($request->filled('state_id') && $request->state_id != '') {
            $query->where('state_id', $request->state_id);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('city_name', 'like', '%' . $search . '%');
            });
        }
        $city = $query->orderBy('id', 'DESC')->get();

        $data = [];
        $i = 1;
        foreach ($city as $key => $value) {
            $action = '<button type="button" data-bs-toggle="modal" data-bs-target="#editcity-modal" class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn" data-id="' . $value->id . '" title="Edit">
                            <i class="fs-5 ti ti-edit"></i>
                        </button>
                        <button type="button" class="btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata"
                        data-table="city" data-field="id" data-rownumber="' . $key . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete City">
                            <i class="fs-5 ti ti-trash"></i>
                        </button>';
            $checkbox = '<div class="form-check">
                            <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $key . '" value="' . $value->id . '">
                        </div>';
            $data[] = [
                $i++,
                $checkbox,
                $value->country->country_name,
                $value->state->state_name,
                $value->city_name,
                $action,
            ];
        }

        // Return the result as JSON for DataTable
        return response()->json(['data' => $data]);
    }
    public function getstates($id)
    {
        $states = state::where('country_id', $id)->get();
        return response()->json($states);
    }
    // ------------------------------------------- end State function ---------------------------------------------------------

    // -------------------------------- roles module -------------------------------------------------------------------
    public function roles(Request $request, $id = 0)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {
            $action = $id == 0 ? 'can_create' : 'can_edit';

            if (($check = $this->checkPermission('roles', $action)) !== true) {
                return $check; // return redirect or error response
            }

            $validator = Validator::make($data, [
                'name' => 'required|string|max:255|unique:roles,name' . ($id ? ',' . $id : ''),
                'user_type' => 'required|in:super_admin,sub_admin,staff,customer',
            ]);

            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            // $name = strtolower(str_replace(' ', '_', $request->name));
            $name = $request->name;
            $userType = $request->user_type;
            if ($id == 0) {
                // ✅ INSERT
                $role = roles::create([
                    'name' => $name,
                    'user_type' => $userType,
                    'is_delete' => 1
                ]);

                $message = 'Role Inserted Successfully';
            } else {
                // ✅ UPDATE (do NOT change is_delete)
                $role = roles::findOrFail($id);
                $role->update([
                    'name' => $name,
                    'user_type' => $userType,
                ]);

                $message = 'Role Updated Successfully';
            }

            // ✅ Delete old permissions when updating
            role_feature_permission::where('role_id', $role->id)->delete();

            // insert default permissions for all features
            $features = features::all();
            foreach ($features as $feature) {
                $perm = $request->permissions[$feature->id] ?? [];
                role_feature_permission::create([
                    'role_id' => $role->id,
                    'feature_id' => $feature->id,
                    'can_view' => isset($perm['view']),
                    'can_create' => isset($perm['create']),
                    'can_edit' => isset($perm['edit']),
                    'can_delete' => isset($perm['delete']),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            $data['roles'] = roles::find($id);
            $data['features'] = features::all();
            $data['permissions'] = role_feature_permission::where('role_id', $id)->get()->groupBy('feature_id')->map(function ($item) {
                return [
                    'can_view' => $item->first()->can_view,
                    'can_create' => $item->first()->can_create,
                    'can_edit' => $item->first()->can_edit,
                    'can_delete' => $item->first()->can_delete,
                ];
            });
            return response()->json($data);
        }

        // 🔥 Check VIEW permission
        if ($request->isMethod('get') && $id == 0) {
            if (($check = $this->checkPermission('roles', 'can_view')) !== true) {
                return $check;
            }
            $data['features'] = features::all();
            $data['list'] = roles::orderBy('id', 'DESC')->get();
            return view('admin.roles', $data);
        }
    }
    // -------------------------------- end roles module ------------------------------------------------------------------

    // -------------------------------- features module -------------------------------------------------------------------
    public function features(Request $request, $id = 0)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {
            $action = $id == 0 ? 'can_create' : 'can_edit';

            if (($check = $this->checkPermission('features', $action)) !== true) {
                return $check; // return redirect or error response
            }

            // Validation
            $validator = Validator::make($data, [
                'name' => 'required|string|max:255|unique:features,name' . ($id ? ',' . $id : ''),
                'slug' => 'nullable|string|max:255|unique:features,slug' . ($id ? ',' . $id : ''),
            ]);

            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            $name = $request->input('name');
            $slug = $request->input('slug');

            // Generate slug if not provided
            if (!$slug) {
                $slug = Str::slug($name, '_'); // e.g. 'Web Setting' => 'web_setting'
            }

            $message = $id ? 'Feature Updated Successfully' : 'Feature Added Successfully';

            features::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $name,
                    'slug' => $slug,
                ]
            );

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(features::find($id));
        }

        // 🔥 Check VIEW permission
        if ($request->isMethod('get') && $id == 0) {
            if (($check = $this->checkPermission('features', 'can_view')) !== true) {
                return $check;
            }
            $data['list'] = features::orderBy('id', 'DESC')->get();
            return view('admin.features', $data);
        }
    }
    // -------------------------------- end features module ------------------------------------------------------------------

    // -------------------------------- platform module -------------------------------------------------------------------
    public function platform(Request $request, $id = 0)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {
            $action = $id == 0 ? 'can_create' : 'can_edit';

            if (($check = $this->checkPermission('platform', $action)) !== true) {
                return $check; // return redirect or error response
            }

            // Validation
            $validator = Validator::make($data, [
                'name' => 'required|string|max:255|unique:platform,name' . ($id ? ',' . $id : ''),
                'slug' => 'nullable|string|max:255|unique:platform,slug' . ($id ? ',' . $id : ''),
            ]);

            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            $name = $request->input('name');
            $slug = $request->input('slug');

            // Generate slug if not provided
            if (!$slug) {
                $slug = Str::slug($name, '_'); // e.g. 'Web Setting' => 'web_setting'
            }

            $message = $id ? 'Platform Updated Successfully' : 'Platform Added Successfully';

            platform::updateOrCreate(
                ['id' => $id],
                [
                    'name' => $name,
                    'slug' => $slug,
                ]
            );

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(platform::find($id));
        }

        // 🔥 Check VIEW permission
        if ($request->isMethod('get') && $id == 0) {
            if (($check = $this->checkPermission('platform', 'can_view')) !== true) {
                return $check;
            }
            $data['list'] = platform::orderBy('id', 'DESC')->get();
            return view('admin.platform', $data);
        }
    }
    // -------------------------------- end platform module ------------------------------------------------------------------

    // -------------------------------- stores module -------------------------------------------------------------------
    public function stores(Request $request, $id = 0)
    {
        $data = $request->all();
        if ($request->isMethod('post')) {
            // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('stores', 'can_create')) !== true) {
                return $check;
            }
            $validator = Validator::make($data, [
                'store_type' => 'required',
                'name' => 'required|string|max:255',
                'mobile' => 'required',
                'email' => 'nullable|email|unique:stores,email,' . $id,
                'location' => [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) use ($request, $id) {

                        $exists = stores::where('name', $request->name)
                            ->where('location', $value)
                            ->when($id, function ($query) use ($id) {
                                return $query->where('id', '!=', $id);
                            })
                            ->exists();

                        if ($exists) {
                            $fail('Store name already exists for this location.');
                        }
                    }
                ]
            ]);

            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            // Save store first
            $store = stores::create([
                'store_type' => $request->store_type,
                'name' => $request->name,
                'country_code' => $request->country_code ?? null,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'location' => $request->location,
                'is_active' => 1
            ]);
            $stores = $this->images($request, 'store_image', 'images/store', 1);
            if (isset($stores[0])) {
                $store->update([
                    'store_image' => $stores[0]
                ]);
            }

            // Generate slug
            $slug = strtolower(preg_replace('/[^A-Za-z0-9]+/', '_', $request->name));
            $fileName = $slug . '_' . $store->id . '.png';

            // $qrPath = public_path('assets/admin/images/qrcode/');
            // if (!File::exists($qrPath)) {
            //     File::makeDirectory($qrPath, 0755, true);
            // }
            // // Build QR (NO IMAGICK REQUIRED)
            // $result = Builder::create()
            //     ->writer(new PngWriter())
            //     ->data("Store ID: {$store->id}")
            //     ->size(300)
            //     ->margin(10)
            //     ->build();
            // $result->saveToFile($qrPath . $fileName);

            $qrPath = public_path('assets/admin/images/qrcode/');
            if (!File::exists($qrPath)) {
                File::makeDirectory($qrPath, 0755, true);
            }

            $paymentUrl = url('/pay/' . $store->id);
            $result = Builder::create()
                ->writer(new PngWriter())
                ->data($paymentUrl) // 🔥 Payment URL inside QR
                ->size(300)
                ->margin(10)
                ->build();

            $result->saveToFile($qrPath . $fileName);

            // Update store with QR filename
            $store->update([
                'qr_code' => $fileName,
                'payment_url' => $paymentUrl
            ]);

            return redirect()->back()->with('success', 'Store added successfully!');
        }
        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('stores', 'can_view')) !== true) {
                return $check;
            }
            $user = session('admin');
            if ($user && !in_array($user->user_type, ['super_admin', 'sub_admin'])) {
                // Staff → show ONLY their store
                $data['list'] = stores::where('id', $user->store_id)->get();
            } else {
                // Admin → show all stores
                $data['list'] = stores::orderBy('id', 'DESC')->get();
            }

            return view('admin.stores', $data);
        }
    }
    public function getstoresdata($id)
    {
        $data = stores::find($id);
        return response()->json($data);
    }
    public function storesupdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            if (!isset($data['stores_id'])) {
                $this->flashmessage('Store ID is missing.');
            }

            $storesRecord = stores::findOrFail($data['stores_id']);
            if (!$storesRecord) {
                $this->flashmessage('Store record not found.');
            }
            $id= $data['stores_id'];

            // Validation
            $validator = Validator::make($data, [
                'store_type' => 'required',
                'name' => 'required|string|max:100',
                'mobile' => 'required',
                'email' => 'nullable|email|unique:stores,email,' . $id,
                'location' => [
                    'required',
                    'string',
                    function ($attribute, $value, $fail) use ($request, $id) {

                        $exists = stores::where('name', $request->name)
                            ->where('location', $value)
                            ->where('id', '!=', $id)
                            ->exists();

                        if ($exists) {
                            $fail('Store name already exists for this location.');
                        }
                    }
                ]
            ]);
            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            $oldName = $storesRecord->name;

            // Update store basic data
            $storesRecord->update([
                'name' => $request->name,
                'country_code' => $request->country_code ?? null,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'location' => $request->location,
                'store_type' => $request->store_type,
            ]);
            $store = $this->images($request, 'store_image', 'images/store', 1);
            if (isset($store[0])) {
                $newImage = $store[0];
                if (!empty($storesRecord->store_image)) {
                    $oldImagePath = public_path('/assets/admin/images/store/' . $storesRecord->store_image);
                    $oldThumbnailPath = public_path('/assets/admin/images/store/thumbnails/' . $storesRecord->store_image);

                    // Delete old images if they exist
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }

                $storesRecord->update([
                    'store_image' => $store[0]
                ]);
            }

            /*
            ===================================================
            🔥 Regenerate QR ONLY if name changed
            ===================================================
            */
            if ($oldName !== $request->name) {
                $qrPath = public_path('assets/admin/images/qrcode/');

                // Delete old QR
                if ($storesRecord->qr_code && file_exists($qrPath . $storesRecord->qr_code)) {
                    unlink($qrPath . $storesRecord->qr_code);
                }

                // Generate new slug
                $slug = strtolower(preg_replace('/[^A-Za-z0-9]+/', '_', $request->name));
                $fileName = $slug . '_' . $storesRecord->id . '.png';

                // // Generate QR
                // $result = Builder::create()
                //     ->writer(new PngWriter())
                //     ->data("Store ID: {$storesRecord->id}")
                //     ->size(300)
                //     ->margin(10)
                //     ->build();

                $paymentUrl = url('/pay/' . $storesRecord->id);
                $result = Builder::create()
                    ->writer(new PngWriter())
                    ->data($paymentUrl) // 🔥 Payment URL inside QR
                    ->size(300)
                    ->margin(10)
                    ->build();

                $result->saveToFile($qrPath . $fileName);

                // Update qr_code field
                $storesRecord->update([
                    'qr_code' => $fileName,
                    'payment_url' => $paymentUrl
                ]);
            }

            DB::commit();
            $this->flashmessage('Store Updated Successfully', 0);
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->flashmessage('Failed to update Store: ' . $e->getMessage(), 1);
            return redirect()->back();
        }
    }
    public function storestatus(Request $request)
    {
        $data = $request->all();
        $store = stores::find($data['id']);
        if ($store) {
            $store->is_active = $data['status'];
            $store->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
    public function storeDetails($id)
    {
        $store = stores::with(['users', 'transactions'])->findOrFail($id);

        return response()->json([
            'id' => $store->id,
            'store_name' => $store->name,
            'totalRevenue' => $store->transactions->sum('amount'),
            'totalCustomers' => $store->transactions->where('customer_email', '!=' ,'')->groupBy('customer_email')->count(),
            'staff' => $store->users->map(function($s){ 
                return [
                    'id' => $s->id,
                    'username'=> $s->username,
                    'name'=> $s->name,
                    'email'=> $s->email,
                    'mobile'=> $s->mobile,
                    'user_type'=> $s->user_type,
                    'role_id'=> $s->role_id,
                ]; 
            }),
            'transactions' => $store->transactions->map(function($tx){
                return [
                    'id'=> $tx->id,
                    'customer_email'=> $tx->customer_email,
                    'amount'=> $tx->amount,
                    'date'=> date('d-m-Y', strtotime($tx->date)) 
                ];
            }),
        ]);
    }

    // -------------------------------- end stores module ------------------------------------------------------------------

    // -------------------------------- staff module -------------------------------------------------------------------
    public function staff(Request $request, $id = 0)
    {
        $data = $request->all();
        if (count($data) > 0 && $id == 0) {
            // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('staff', 'can_create')) !== true) {
                return $check;
            }
            $validator = Validator::make($data, [
                'username' => 'required|unique:user,username',
                'email' => 'required|email|unique:user,email',
                'name' => 'required',
                'role_id' => 'required',
                'mobile' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            $role = roles::find($data['role_id']);
            if (!$role) {
                $this->flashmessage('Invalid Role Selected', 1);
                return redirect()->back()->withInput();
            }
            $userType = $role->user_type;
            $storeId = null;
            if ($userType === 'staff') {
                if (empty($data['store_id'])) {
                    $this->flashmessage('Please select store for staff', 1);
                    return redirect()->back()->withInput();
                }

                $storeId = $data['store_id'];
            }


            $cleanMobile = preg_replace('/[^0-9]/', '', $data['mobile'] ?? '');
            $tz = session('admin_timezone', config('app.timezone'));
            $insert = array(
                'username' => $data['username'] ?? null,
                'name' => $data['name'] ?? null,
                'email' => $data['email'] ?? null,
                'country_code' => $data['country_code'] ?? null,
                'mobile' => $cleanMobile, // 👈 cleaned number
                'password' => md5($data['password']) ?? null,
                'address' => $data['address'] ?? null,
                'role_id' => $data['role_id'] ?? null,
                'store_id' => $storeId ?? null,
                'max_payout_limit' => $data['max_payout_limit'] ?? 0,
                'user_type' => $userType,
                'date' => Carbon::now($tz),
                'is_active' => 1,
            );
            $profile = $this->images($request, 'p_image', 'images/profile', 1);
            if (isset($profile[0])) {
                $insert['p_image'] = $profile[0];
            }
            $user = users::create($insert)->id;
            if (isset($data['permissions']) && is_array($data['permissions'])) {
                foreach ($data['permissions'] as $featureId => $perm) {
                    user_permission::create([
                        'user_id' => $user,
                        'feature_id' => $featureId,
                        'can_view' => isset($perm['view']) ? 1 : 0,
                        'can_create' => isset($perm['create']) ? 1 : 0,
                        'can_edit' => isset($perm['edit']) ? 1 : 0,
                        'can_delete' => isset($perm['delete']) ? 1 : 0,
                    ]);
                }
            }

            $this->flashmessage('Staff Inserted Successfully', 0);
            return redirect('/admin/staff');
        }
        
        $user = session('admin');
        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('staff', 'can_view')) !== true) {
                return $check;
            }
            $data['features'] = features::all();
            if (in_array($user->user_type, ['super_admin', 'sub_admin'])) {
                $data['stores'] = stores::orderBy('id', 'DESC')->get();
            } else {
                $data['stores'] = stores::where('id', $user->store_id)->get();
            }

            if ($user->user_type == 'super_admin') {
                $data['roles'] = roles::whereIn('user_type', ['sub_admin', 'staff'])
                    ->orderBy('id', 'DESC')
                    ->get();
            } elseif ($user->user_type === 'sub_admin') { // Sub Admin → only Staff
                $data['roles'] = roles::where('user_type', 'staff')
                    ->orderBy('id', 'DESC')
                    ->get();
            } else {
                $data['roles'] = roles::where('id', $user->role_id)->get();
            }
            
            // $data['list'] = users::with(['roles', 'stores'])->where('user_type', 'staff')->orderBy('id', 'DESC')->get();
            return view('admin.staff', $data);
        }
    }
    public function staffajaxdata(Request $request)
    {
        $user = session('admin');
        $query = users::with('roles', 'stores');

        // Super Admin sees everyone except super_admin
        if ($user->user_type === 'super_admin') {
            $query->where('user_type', '!=', 'super_admin')
                ->where('id', '!=', $user->id);
        } 
        // Sub admin sees all users except super_admin, other sub_admins, and self
        elseif ($user->user_type === 'sub_admin') {
            $query->where('user_type', '!=', 'super_admin')
                ->where('user_type', '!=', 'sub_admin')
                ->where('id', '!=', $user->id);
        }
        // Staff sees only users from their store, excluding super_admin and self
        elseif ($user->user_type === 'staff') {
            $query->where('store_id', $user->store_id)
                ->where('user_type', '!=', 'super_admin')
                ->where('user_type', '!=', 'sub_admin')
                ->where('id', '!=', $user->id);
        }
        
        if ($request->filled('store_id') && $request->store_id != '') {
            $query->where('store_id', $request->store_id);
        }
        if ($request->filled('role_id') && $request->role_id != '') {
            $query->where('role_id', $request->role_id);
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('mobile', 'like', '%' . $search . '%');
            });
        }
        $staff = $query->orderBy('id', 'DESC')->get();

        $data = [];
        $i = 1;
        foreach ($staff as $key => $value) {
            // if ($value->user_type != 'staff') {
            //     continue; // Skip non-staff users
            // }
            if(haspermission('staff', 'can_edit') || haspermission('staff', 'can_delete')){
                $action = '';
                if(haspermission('staff', 'can_edit')){
                    $action .= '<button type="button" data-bs-toggle="modal" data-bs-target="#editstaff-modal" class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn" data-id="' . $value->id . '" title="Edit">
                                    <i class="fs-5 ti ti-edit"></i>
                                </button>';
                }
                if(haspermission('staff', 'can_delete')){
                    $action .= '<button type="button" class="btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata"
                            data-table="user" data-field="id" data-rownumber="' . $key . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Staff">
                                <i class="fs-5 ti ti-trash"></i>
                            </button>';
                }
            } else {
                $action = '-';
            }
            $checkbox = '<div class="form-check">
                            <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $key . '" value="' . $value->id . '">
                        </div>';
            $data[] = [
                $i++,
                $checkbox,
                $value->username ?? '',
                $value->name ?? '',
                $value->email ?? '',
                '+'. $value->country_code . ' ' . $value->mobile ?? '-',
                $value->p_image ? '<img src="' . asset('assets/admin/images/profile/' . $value->p_image) . '" alt="Profile Image" height="50px">' : '-',
                $value->address ?? '-',
                $value->roles->name ?? '-',
                $value->stores->name ?? '-',
                date('d-m-Y', strtotime($value->date)),
                '<select class="form-select form-control selstatus" data-id="' . $value->id . '" data-field="is_active">
                    <option value="1" ' . ($value->is_active == 1 ? 'selected' : '') . '>Active</option>
                    <option value="0" ' . ($value->is_active == 0 ? 'selected' : '') . '>Inactive</option>
                </select>',
                $action,
            ];
        }

        // Return the result as JSON for DataTable
        return response()->json(['data' => $data]);
    }
    public function getrolepermissions($role_id, $user_id = 0)
    {
        $rolePerms = role_feature_permission::where('role_id', $role_id)->get()->keyBy('feature_id')->toArray();

        if ($user_id) {
            $userPerms = user_permission::where('user_id', $user_id)->get()->keyBy('feature_id')->toArray();
            foreach ($userPerms as $feature_id => $perm) {
                $rolePerms[$feature_id] = $perm;
            }
        }

        return response()->json($rolePerms);
    }
    public function checkUsername(Request $request)
    {
        $query = users::where('username', $request->username);

        if ($request->has('user_id') && $request->user_id) {
            $query->where('id', '!=', $request->user_id);
        }

        $exists = $query->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
    public function checkEmail(Request $request)
    {
        $query = users::where('email', $request->email);

        if ($request->has('user_id') && $request->user_id) {
            $query->where('id', '!=', $request->user_id);
        }

        $exists = $query->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
    public function getstaffdata($id)
    {
        $data['user'] = users::findOrFail($id);
        $data['permissions'] = user_permission::where('user_id', $id)->get()->keyBy('feature_id');
        $data['features'] = features::all();
        return response()->json($data);
    }
    public function staffupdate(Request $request)
    {
        $data = $request->all();
        $userId = $data['staff_id'] ?? 0;

        if (!$userId) {
            $this->flashmessage('Staff ID is missing', 1);
            return redirect()->back();
        }

        $validator = Validator::make($data, [
            'username' => 'required|unique:user,username,' . $userId,
            'email' => 'required|email|unique:user,email,' . $userId,
            'name' => 'required',
            'role_id' => 'required',
            'mobile' => 'required',
        ]);

        if ($validator->fails()) {
            $message = collect($validator->errors()->all())->first();
            $this->flashmessage($message, 1);
            return redirect()->back()->withInput();
        }

        DB::beginTransaction();
        try {
            // Update basic user info
            $user = users::findOrFail($userId);

            // 🔥 Get role & user_type
            $role = roles::find($data['role_id']);
            if (!$role) {
                $this->flashmessage('Invalid Role Selected', 1);
                return redirect()->back()->withInput();
            }

            $userType = $role->user_type;
            $storeId = null;

            // 🔥 If staff → store required
            if ($userType === 'staff') {
                if (empty($data['store_id'])) {
                    $this->flashmessage('Please select store for staff', 1);
                    return redirect()->back()->withInput();
                }
                $storeId = $data['store_id'];
            }

            $cleanMobile = preg_replace('/[^0-9]/', '', $data['mobile'] ?? '');
            $user->update([
                'store_id' => $storeId ?? null,
                'user_type' => $userType,
                'role_id' => $data['role_id'] ?? $user->role_id,
                'username' => $data['username'] ?? $user->username,
                'name' => $data['name'] ?? $user->name,
                'email' => $data['email'] ?? $user->email,
                'mobile' => $data['mobile'] ?? $user->mobile,
                'country_code' => $data['country_code'] ?? $user->country_code,
                'mobile' => $cleanMobile, // 👈 cleaned number
                'address' => $data['address'] ?? $user->address,
                'max_payout_limit' => $data['max_payout_limit'] ?? 0,
                // 'password' => !empty($data['password']) ? md5($data['password']) : $user->password,
            ]);
            $profile = $this->images($request, 'p_image', 'images/profile', 1);
            if (isset($profile[0])) {
                $newImage = $profile[0];
                if (!empty($user->p_image)) {
                    $oldImagePath = public_path('/assets/admin/images/profile/' . $user->p_image);
                    $oldThumbnailPath = public_path('/assets/admin/images/profile/thumbnails/' . $user->p_image);

                    // Delete old images if they exist
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                    if (file_exists($oldThumbnailPath)) {
                        unlink($oldThumbnailPath);
                    }
                }

                $user->update([
                    'p_image' => $profile[0]
                ]);
            }

            // Delete existing user permissions
            user_permission::where('user_id', $userId)->delete();

            // Insert updated permissions
            if (isset($data['permissions']) && is_array($data['permissions'])) {
                foreach ($data['permissions'] as $featureId => $perm) {
                    user_permission::create([
                        'user_id' => $userId,
                        'feature_id' => $featureId,
                        'can_view' => isset($perm['view']) ? 1 : 0,
                        'can_create' => isset($perm['create']) ? 1 : 0,
                        'can_edit' => isset($perm['edit']) ? 1 : 0,
                        'can_delete' => isset($perm['delete']) ? 1 : 0,
                    ]);
                }
            }

            DB::commit();
            $this->flashmessage('Staff Updated Successfully', 0);
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->flashmessage('Failed to update Staff: ' . $e->getMessage(), 1);
            return redirect()->back();
        }
    }
    public function staffstatus(Request $request)
    {
        $data = $request->all();
        $staff = users::find($data['id']);
        if ($staff) {
            $staff->is_active = $data['status'];
            $staff->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
    // -------------------------------- end staff module -------------------------------------------------------------------

    // -------------------------------- Transactions module -------------------------------------------------------------------
    public function transactions(Request $request)
    {
        if (($check = $this->checkPermission('transactions', 'can_view')) !== true) {
            return $check;
        }
        $data['user'] = session('admin');

        if (in_array($data['user']->user_type, ['super_admin', 'sub_admin'])) {
            $data['stores'] = stores::orderBy('id', 'DESC')->get();
        } else {
            $userStore = $data['user']->store_id ? stores::find($data['user']->store_id) : null;
            if (!$userStore) {
                $data['stores'] = collect();
            }

            if ($userStore->store_type === 'physical') {
                // Staff belongs to physical store → show all physical stores
                $data['stores'] = stores::where('store_type', 'physical')->orderBy('id', 'DESC')->get();
            } else {
                // Staff belongs to online store → show only their own store
                $data['stores'] = stores::where('id', $data['user']->store_id)->orderBy('id', 'DESC')->get();
            }
        }
        $data['platform'] = platform::orderBy('id', 'DESC')->get();
        return view('admin.transactions', $data);
    }
    public function transactionsajaxdata(Request $request)
    {
        $user = session('admin');
        if (!$user) {
            return response()->json(['data' => []]);
        }

        $query = transactions::with('stores','platform')->orderBy('id', 'DESC');

        // // Admin role filtering
        // if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
        //     if (!$user->store_id) {
        //         return response()->json(['data' => []]);
        //     }
        //     $query->where('store_id', $user->store_id);
        // }

        // ✅ Role-based store filtering
        if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            // Get logged-in user's store type
            $userStore = $user->store_id ? stores::find($user->store_id) : null;
            if (!$userStore) {
                return response()->json(['data' => []]);
            }

            if ($userStore->store_type === 'physical') {
                // Staff belongs to physical store → show all physical stores
                $query->whereHas('stores', function($q) {
                    $q->where('store_type', 'physical');
                });
            } else {
                // Staff belongs to online store → show only their own store
                $query->where('store_id', $user->store_id);
            }
        }

        // Filters
        if ($request->filled('status_id')) {
            $query->where('status', $request->status_id);
        }

        if ($request->filled('filter_payment_method')) {
            $query->where('payment_method', $request->filter_payment_method);
        }

        if ($request->filled('filter_platform_id')) {
            $query->where('platform_id', $request->filter_platform_id);
        }

        if ($request->filled('store_id')) {
            $query->where('store_id', $request->store_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('transaction_id', 'like', "%$search%")
                ->orWhere('customer_name', 'like', "%$search%")
                ->orWhere('customer_email', 'like', "%$search%")
                ->orWhere('customer_mobile', 'like', "%$search%")
                ->orWhere('customer_mobileid', 'like', "%$search%")
                ->orWhere('customer_username', 'like', "%$search%");
            });
        }

        if ($request->filled('daterange')) {
            $dates = explode(' to ', $request->daterange);
            if (count($dates) == 2) {
                $startDate = date('Y-m-d', strtotime($dates[0]));
                $endDate   = date('Y-m-d', strtotime($dates[1]));
                $query->whereBetween(DB::raw("STR_TO_DATE(date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        $transactions = $query->get();

        $data = [];
        $i = 1;

        foreach ($transactions as $transaction) {
            $transferBtn = '';
            if (in_array($user->user_type, ['super_admin', 'sub_admin'])) {
                if (!$transaction->is_transferred) {
                    $transferBtn = '<button class="btn btn-info btn-sm transferBtn d-inline-flex align-items-center justify-content-center"
                        data-id="'.$transaction->id.'"
                        data-store="'.$transaction->store_id.'">
                        Transfer Store
                    </button>';
                } else {
                    $transferBtn = '<span class="badge bg-secondary">Transferred</span>';
                }
                
                if ($transaction->payout_status === 'paid') {
                    $actionBtn = '<span class="badge bg-success">Paid</span>';
                } elseif ($transaction->payout_status === 'partial') {
                    $actionBtn = '<button class="btn btn-warning btn-sm payoutBtn d-inline-flex align-items-center justify-content-center" 
                        data-id="'.$transaction->transaction_id.'"
                        data-amount="'.($transaction->amount - $transaction->paid_amount).'">
                        Pay Remaining
                    </button>';
                } else {
                    $actionBtn = '<button class="btn btn-success btn-sm payoutBtn d-inline-flex align-items-center justify-content-center" 
                        data-id="'.$transaction->transaction_id.'"
                        data-amount="'.$transaction->amount.'">
                        Payout
                    </button>';
                }
            } else {
                $actionBtn = '';
            }

            $data[] = [
                $i++,
                $transaction->transaction_id ?? '-',
                $transaction->customer_mobileid ?? '-',
                $transaction->stores ? $transaction->stores->name : '-',
                '$' . number_format($transaction->amount, 2),
                ucfirst($transaction->payment_method),
                ucfirst($transaction->status),
                $transaction->customer_name,
                $transaction->customer_email,
                $transaction->customer_mobile,
                $transaction->customer_username,
                $transaction->platform ? $transaction->platform->name : '-',
                $transaction->updated_at ? date('d-m-Y H:i a', strtotime($transaction->updated_at)) : "-",
                // $actionBtn . ' ' . $transferBtn,
            ];
        }

        return response()->json(['data' => $data]);
    }
    public function transferStoretransaction(Request $request)
    {
        $user = session('admin');

        if(!in_array($user->user_type,['super_admin','sub_admin'])){
            return response()->json(['status' => false]);
        }

        $transaction = transactions::find($request->transaction_id);
        if(!$transaction){
            return response()->json(['status'=>false]);
        }

        $timezone = $user->timezone ?? session('admin_timezone') ?? config('app.timezone');

        DB::transaction(function() use($transaction,$request,$user,$timezone){
            $transaction->transferred_from_store_id = $transaction->store_id;
            $transaction->store_id = $request->store;
            $transaction->transferred_by = $user->id;
            $transaction->is_transferred = 1;
            $transaction->transferred_at = Carbon::now($timezone)->format('Y-m-d H:i:s');
            $transaction->save();
        });

        return response()->json(['status'=>true]);
    }

    // -------------------------------- end Transactions module -------------------------------------------------------------------

    // -------------------------------- reports module -------------------------------------------------------------------
    public function reports(Request $request)
    {
        if (($check = $this->checkPermission('reports', 'can_view')) !== true) {
            return $check;
        }
        $data['user'] = session('admin');
        if (in_array($data['user']->user_type, ['super_admin', 'sub_admin'])) {
            $data['stores'] = stores::orderBy('id', 'DESC')->get();
        } else {
            $data['stores'] = stores::where('id', $data['user']->store_id)->get();
        }
        $data['platform'] = platform::orderBy('id', 'DESC')->get();
        return view('admin.reports', $data);
    }
    public function getallreportdata(Request $request)
    {
        $user = session('admin');
        if (!$user) {
            return response()->json(['data' => []]);
        }
        $query = transactions::with('stores','platform')->orderBy('id', 'DESC');
    
        // Store restriction
        if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            if (!$user->store_id) {
                return response()->json(['data' => []]);
            }
            $query->where('store_id', $user->store_id);
        }

        if ($request->filled('store_id') && $request->store_id != '') {
            $query->where('store_id', $request->store_id);
        }
        if ($request->filled('filter_payment_method')) {
            $query->where('payment_method', $request->filter_payment_method);
        }
        if ($request->filled('filter_platform_id')) {
            $query->where('platform_id', $request->filter_platform_id);
        }
        if ($request->filled('status_id')) {
            $query->where('status', $request->status_id);
        }
        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('transaction_id', 'like', '%' . $search . '%')
                    ->orWhere('customer_name', 'like', '%' . $search . '%')
                    ->orWhere('customer_email', 'like', '%' . $search . '%')
                    ->orWhere('customer_mobile', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%')
                    ->orWhere('customer_mobileid', 'like', "%$search%")
                    ->orWhere('customer_username', 'like', "%$search%");
            });
        }
        if ($request->filled('daterange')) {
            $dates = explode(' to ', $request->daterange);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(DB::raw("STR_TO_DATE(date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        $transactions = $query->get();

        $data = [];
        $i = 1;
        foreach ($transactions as $value) {
            $data[] = [
                $i++,
                $value->transaction_id ?? '-',
                $value->customer_mobileid ?? '-',
                $value->stores ? $value->stores->name : '-',
                number_format($value->amount, 2),
                ucfirst($value->payment_method),
                ucfirst($value->status),
                $value->customer_name,
                $value->customer_email,
                $value->customer_mobile,
                $value->customer_username,
                $value->platform ? $value->platform->name : '-',
                $value->created_at ? date('d-m-Y H:i a', strtotime($value->created_at)) : "-",
            ];
        }

        // Return the result as JSON for DataTable
        return response()->json(['data' => $data]);
    }
    public function printstorereport(Request $request)
    {
        $data = $request->input();
        $user = session('admin');

        if (!$user) {
            return response()->json(['data' => []]);
        }

        $query = transactions::with('stores','platform')->orderBy('id', 'DESC');

        // Store restriction
        if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            if (!$user->store_id) {
                return response()->json(['data' => []]);
            }
            $query->where('store_id', $user->store_id);
        }

        if (!empty($data['store_id'])) {
            $query->where('store_id', $data['store_id']);
        }

        if (!empty($data['filter_payment_method'])) {
            $query->where('payment_method', $data['filter_payment_method']);
        }

        if (!empty($data['filter_platform_id'])) {
            $query->where('platform_id', $data['filter_platform_id']);
        }

        if (!empty($data['status_id'])) {
            $query->where('status', !empty($data['status_id']));
        }

        if (!empty($data['search'])) {
            $search = $data['search'];
            $query->where(function ($q) use ($search) {
                $q->where('transaction_id', 'like', "%$search%")
                ->orWhere('customer_name', 'like', "%$search%")
                ->orWhere('customer_email', 'like', "%$search%")
                ->orWhere('customer_mobile', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%")
                ->orWhere('customer_mobileid', 'like', "%$search%")
                ->orWhere('customer_username', 'like', "%$search%");
            });
        }

        if (!empty($data['daterange'])) {
            $dates = explode(' to ', $data['daterange']);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(
                    DB::raw("STR_TO_DATE(date, '%d-%m-%Y')"),
                    [$startDate, $endDate]
                );
            }
        }

        // ✅ FIXED HERE
        $data['transactions'] = $query->get();

        $pdf = PDF::loadView('admin.printstorereport', $data)
                ->setPaper('a4', 'landscape');

        $path = public_path('assets/user/report');
        $fileName = 'Store Report.pdf';

        $pdf->save($path . '/' . $fileName);

        $output['url'] = asset('assets/user/report') . '/' . $fileName;
        $output['filename'] = $fileName;

        return response()->json($output);
    }
    // -------------------------------- end reports module -------------------------------------------------------------------
   
    // -------------------------------- shift reports module -------------------------------------------------------------------
    public function shiftreports(Request $request)
    {
        if (($check = $this->checkPermission('reports', 'can_view')) !== true) {
            return $check;
        }
        $data['user'] = session('admin');
        if ($data['user']->user_type === 'super_admin' || $data['user']->user_type === 'sub_admin') {
            $data['stores'] = stores::orderBy('id', 'DESC')->get();
            $data['staffs'] = users::where('user_type', 'staff')
                ->orderBy('name')
                ->get();
        }
        else {
            $data['stores'] = stores::where('id', $data['user']->store_id)->get();
            $data['staffs'] = users::where('id', $data['user']->id)->get();
        }

        return view('admin.shift_report', $data);
    }
    // public function getallshiftreportdata(Request $request)
    // {
    //     $user = session('admin');
    //     if (!$user) {
    //         return response()->json([
    //             "draw" => intval($request->get('draw')),
    //             "recordsTotal" => 0,
    //             "recordsFiltered" => 0,
    //             "data" => []
    //         ]);
    //     }

    //     $timezone = $user->timezone ?? session('admin_timezone');
    //     $now = Carbon::now($timezone)->format('Y-m-d H:i:s');

    //     // DataTables server-side params
    //     $draw = intval($request->get('draw'));
    //     $start = intval($request->get("start", 0));
    //     $rowPerPage = intval($request->get("length", 25));
    //     $orderArray = $request->get('order', []);
    //     $columnNameArray = $request->get('columns', []);
    //     $searchArray = $request->get('search', []);
    //     $columnIndex = isset($orderArray[0]['column']) ? $orderArray[0]['column'] : 0;
    //     $columnName = isset($columnNameArray[$columnIndex]['data']) ? $columnNameArray[$columnIndex]['data'] : 'login_at';
    //     $columnSortOrder = isset($orderArray[0]['dir']) ? $orderArray[0]['dir'] : 'desc';
    //     $searchValue = isset($searchArray['value']) ? $searchArray['value'] : '';

    //     // Base query
    //     $sessions = DB::table('staff_sessions')
    //         ->select(
    //             'staff_sessions.*',
    //             DB::raw("(
    //                 SELECT MAX(ss.logout_at)
    //                 FROM staff_sessions ss
    //                 WHERE ss.store_id = staff_sessions.store_id
    //                 AND ss.logout_at < staff_sessions.login_at
    //             ) as prev_logout")
    //         );

    //     $query = DB::table(DB::raw("({$sessions->toSql()}) as staff_sessions"))
    //         ->mergeBindings($sessions)
    //         ->join('user', 'user.id', '=', 'staff_sessions.user_id')
    //         ->join('stores', 'stores.id', '=', 'staff_sessions.store_id')
    //         ->leftJoin('transactions', function($join) use ($now) {
    //             $join->on('transactions.store_id', '=', 'staff_sessions.store_id')
    //                 ->whereRaw("(staff_sessions.prev_logout IS NULL OR transactions.transaction_at >= staff_sessions.prev_logout)")
    //                 ->whereRaw("transactions.transaction_at <= COALESCE(staff_sessions.logout_at, '{$now}')");
    //         });

    //     // Filters
    //     $todayStart = Carbon::now($timezone)->startOfDay()->toDateTimeString();
    //     $todayEnd   = Carbon::now($timezone)->endOfDay()->toDateTimeString();

    //     if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
    //         $query->where('staff_sessions.store_id', $user->store_id)
    //             ->where('staff_sessions.user_id', $user->id)
    //             ->where(function($q) use ($todayStart, $todayEnd) {
    //                 $q->whereNull('staff_sessions.logout_at')
    //                     ->orWhere(function($q2) use ($todayStart) {
    //                         $q2->where('staff_sessions.login_at', '<', $todayStart)
    //                         ->where('staff_sessions.logout_at', '>=', $todayStart);
    //                     })
    //                     ->orWhereBetween('staff_sessions.login_at', [$todayStart, $todayEnd]);
    //             });
    //     } else {
    //         if ($request->filled('store_id')) $query->where('staff_sessions.store_id', $request->store_id);
    //         if ($request->filled('user_id')) $query->where('staff_sessions.user_id', $request->user_id);
    //     }

    //     // Date filters
    //     if ($request->filled('from_datetime') && $request->filled('to_datetime')) {
    //         $from = Carbon::parse($request->from_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $to = Carbon::parse($request->to_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $query->whereBetween('staff_sessions.login_at', [$from, $to]);
    //     } elseif ($request->filled('from_datetime')) {
    //         $from = Carbon::parse($request->from_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $query->where('staff_sessions.login_at', '>=', $from);
    //     } elseif ($request->filled('to_datetime')) {
    //         $to = Carbon::parse($request->to_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $query->where('staff_sessions.login_at', '<=', $to);
    //     }

    //     // Search filter
    //     if (!empty($searchValue)) {
    //         $query->where(function($q) use ($searchValue) {
    //             $q->where('user.name', 'like', "%{$searchValue}%")
    //             ->orWhere('stores.name', 'like', "%{$searchValue}%")
    //             ->orWhere('user.email', 'like', "%{$searchValue}%")
    //             ->orWhere('user.mobile', 'like', "%{$searchValue}%");
    //         });
    //     }

    //     // Get total records
    //     $recordsTotal = DB::table('staff_sessions')->count();
    //     $recordsFiltered = $query->count(DB::raw('distinct staff_sessions.id'));

    //     // Fetch paginated data
    //     $report = $query->select(
    //         'staff_sessions.id',
    //         'staff_sessions.timezone',
    //         'staff_sessions.prev_logout',
    //         'user.name as staff_name',
    //         'user.email as staff_email',
    //         'user.mobile as staff_mobile',
    //         'stores.name as store_name',
    //         'staff_sessions.login_at',
    //         'staff_sessions.logout_at',
    //         DB::raw('COUNT(transactions.id) as total_transactions'),
    //         DB::raw('COALESCE(SUM(transactions.amount),0) as total_amount'),
    //         DB::raw("TIMESTAMPDIFF(SECOND, staff_sessions.login_at, COALESCE(staff_sessions.logout_at,'{$now}')) as working_seconds")
    //     )
    //     ->groupBy(
    //         'staff_sessions.id',
    //         'staff_sessions.prev_logout',
    //         'user.name',
    //         'user.email',
    //         'user.mobile',
    //         'stores.name',
    //         'staff_sessions.login_at',
    //         'staff_sessions.logout_at'
    //     );
    //     // ->orderBy($columnName, $columnSortOrder)
    //     // ->orderBy('staff_sessions.login_at', 'DESC')
    //     // ->skip($start)
    //     // ->take($rowPerPage)
    //     // ->get();

    //     $columnMap = [
    //         'store' => 'stores.name',
    //         'staff' => 'user.name',
    //         'email' => 'user.email',
    //         'mobile' => 'user.mobile',
    //         'login' => 'staff_sessions.login_at',
    //         'logout' => 'staff_sessions.logout_at'
    //     ];

    //     if (isset($columnMap[$columnName])) {
    //         $query->orderBy($columnMap[$columnName], $columnSortOrder);
    //     } else {
    //         $query->orderBy('staff_sessions.login_at', 'desc');
    //     }

    //     /*
    //     |--------------------------------------------------------------------------
    //     | PAGINATION
    //     |--------------------------------------------------------------------------
    //     */
    //     if ($rowPerPage != -1) {
    //         $query->offset($start)->limit($rowPerPage);
    //     }

    //     $report = $query->get();

    //     // Format data
    //     $data = [];
    //     $i = $start + 1;
    //     foreach ($report as $row) {
    //         $tz = $row->timezone ?? $timezone;
    //         $startTime = $row->prev_logout ?? $row->login_at;
    //         $endTime = $row->logout_at
    //             ? Carbon::parse($row->logout_at)
    //             : Carbon::now($tz);
    //         $hours = floor($row->working_seconds / 3600);
    //         $minutes = floor(($row->working_seconds % 3600) / 60);
    //         $range = Carbon::parse($startTime)->format('H:i:s') . ' → ' . Carbon::parse($endTime)->format('H:i:s');

    //         $data[] = [
    //             'DT_RowClass' => $row->logout_at ? 'row-red' : 'row-green',
    //             'id' => $i++,
    //             'store' => $row->store_name,
    //             'staff' => $row->staff_name,
    //             'email' => $row->staff_email,
    //             'mobile' => $row->staff_mobile,
    //             'login' => Carbon::parse($row->login_at, $tz)->format('d-m-Y H:i:s'),
    //             'logout' => $row->logout_at ? Carbon::parse($row->logout_at, $tz)->format('d-m-Y H:i:s') : '<span>Active</span>',
    //             'working_hours' => $hours.'h '.$minutes.'m',
    //             'transaction_range' => $range,
    //             'total_tnx' => $row->total_transactions,
    //             'total_amount' => number_format($row->total_amount, 2)
    //         ];
    //     }

    //     // Return JSON in DataTables server-side format
    //     return response()->json([
    //         "draw" => $draw,
    //         "recordsTotal" => $recordsTotal,
    //         "recordsFiltered" => $recordsFiltered,
    //         "data" => $data
    //     ]);
    // }
    public function getallshiftreportdata(Request $request)
    {
        $user = session('admin');

        if (!$user) {
            return response()->json([
                "draw" => intval($request->get('draw')),
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => []
            ]);
        }

        $timezone = $user->timezone ?? session('admin_timezone') ?? config('app.timezone');
        $now = Carbon::now($timezone)->format('Y-m-d H:i:s');

        /*
        |--------------------------------------------------------------------------
        | DATATABLE PARAMS
        |--------------------------------------------------------------------------
        */
        $draw = intval($request->get('draw'));
        $start = intval($request->get("start", 0));
        $rowPerPage = intval($request->get("length", 25));

        $orderArray = $request->get('order', []);
        $columnNameArray = $request->get('columns', []);
        $searchArray = $request->get('search', []);

        $columnIndex = $orderArray[0]['column'] ?? 0;
        $columnName = $columnNameArray[$columnIndex]['data'] ?? 'login_at';
        $columnSortOrder = $orderArray[0]['dir'] ?? 'desc';
        $searchValue = $searchArray['value'] ?? '';

        /*
        |--------------------------------------------------------------------------
        | DATE FILTER
        |--------------------------------------------------------------------------
        */
        $from = $request->filled('from_datetime')
            ? Carbon::parse($request->from_datetime, $timezone)->format('Y-m-d H:i:s')
            : null;

        $to = $request->filled('to_datetime')
            ? Carbon::parse($request->to_datetime, $timezone)->format('Y-m-d H:i:s')
            : null;

        /*
        |--------------------------------------------------------------------------
        | BASE SESSION QUERY
        |--------------------------------------------------------------------------
        */
        // $sessions = DB::table('staff_sessions')
        //     ->select(
        //         'staff_sessions.*',
        //         DB::raw("(SELECT MAX(ss.logout_at)
        //             FROM staff_sessions ss
        //             WHERE ss.store_id = staff_sessions.store_id
        //             AND ss.logout_at < staff_sessions.login_at
        //         ) as prev_logout")
        //     );
        $sessions = DB::table('staff_sessions')
            ->select(
                'staff_sessions.*',

                DB::raw("(SELECT ss.logout_at
                        FROM staff_sessions ss
                        WHERE ss.store_id = staff_sessions.store_id
                        AND ss.id < staff_sessions.id
                        AND ss.logout_at IS NOT NULL
                        ORDER BY ss.id DESC
                        LIMIT 1
                    ) as prev_logout")
            );

        $query = DB::table(DB::raw("({$sessions->toSql()}) as staff_sessions"))
            ->mergeBindings($sessions)
            ->join('user', 'user.id', '=', 'staff_sessions.user_id')
            ->join('stores', 'stores.id', '=', 'staff_sessions.store_id')

            /*
            |--------------------------------------------------------------------------
            | TRANSACTION JOIN (FILTERED)
            |--------------------------------------------------------------------------
            */
            ->leftJoin('transactions', function ($join) use ($now, $from, $to) {

                $join->on('transactions.store_id', '=', 'staff_sessions.store_id');

                // ✅ ONLY SUCCESS
                $join->where('transactions.status', 'success');

                // $join->whereRaw("
                //     (staff_sessions.prev_logout IS NULL
                //     OR transactions.transaction_at >= staff_sessions.prev_logout)
                // ");
                // $join->whereRaw("
                //     transactions.transaction_at >= staff_sessions.login_at
                // ");
                // $join->whereRaw("
                //     transactions.transaction_at >= COALESCE(
                //         staff_sessions.prev_logout,
                //         staff_sessions.login_at
                //     )
                // ");
                // $join->whereRaw("
                //     transactions.transaction_at >= COALESCE(
                //         staff_sessions.prev_logout,
                //         staff_sessions.login_at
                //     )
                // ");
                $join->whereRaw("
                    transactions.transaction_at >= GREATEST(
                        COALESCE(staff_sessions.prev_logout, staff_sessions.login_at),
                        staff_sessions.login_at
                    )
                ");

                $join->whereRaw("
                    transactions.transaction_at <= COALESCE(staff_sessions.logout_at, '{$now}')
                ");

                // ✅ FILTER TRANSACTIONS ALSO
                if ($from && $to) {
                    $join->whereBetween('transactions.transaction_at', [$from, $to]);
                } elseif ($from) {
                    $join->where('transactions.transaction_at', '>=', $from);
                } elseif ($to) {
                    $join->where('transactions.transaction_at', '<=', $to);
                }
            });

        /*
        |--------------------------------------------------------------------------
        | USER FILTER
        |--------------------------------------------------------------------------
        */
        if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            $query->where('staff_sessions.store_id', $user->store_id)
                ->where('staff_sessions.user_id', $user->id);
        } else {
            if ($request->filled('store_id')) {
                $query->where('staff_sessions.store_id', $request->store_id);
            }
            if ($request->filled('user_id')) {
                $query->where('staff_sessions.user_id', $request->user_id);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | SESSION DATE FILTER (OVERLAP)
        |--------------------------------------------------------------------------
        */
        if ($from && $to) {
            $query->where(function ($q) use ($from, $to) {
                $q->where('staff_sessions.login_at', '<=', $to)
                ->where(function ($q2) use ($from) {
                    $q2->where('staff_sessions.logout_at', '>=', $from)
                        ->orWhereNull('staff_sessions.logout_at');
                });
            });
        } elseif ($from) {
            $query->where('staff_sessions.login_at', '>=', $from);
        } elseif ($to) {
            $query->where('staff_sessions.login_at', '<=', $to);
        } else {
            if(!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
                // ✅ ONLY TODAY IF NO FILTER
                $todayStart = Carbon::now($timezone)->startOfDay()->format('Y-m-d H:i:s');
                $todayEnd   = Carbon::now($timezone)->endOfDay()->format('Y-m-d H:i:s');

                $query->where(function ($q) use ($todayStart, $todayEnd) {
                    $q->whereNull('staff_sessions.logout_at')
                    ->orWhere(function ($q2) use ($todayStart) {
                        $q2->where('staff_sessions.login_at', '<', $todayStart)
                            ->where('staff_sessions.logout_at', '>=', $todayStart);
                    })
                    ->orWhereBetween('staff_sessions.login_at', [$todayStart, $todayEnd]);
                });
                
            }
        }
        // \Log::info($query->toSql(), $query->getBindings());

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('user.name', 'like', "%{$searchValue}%")
                ->orWhere('stores.name', 'like', "%{$searchValue}%")
                ->orWhere('user.email', 'like', "%{$searchValue}%")
                ->orWhere('user.mobile', 'like', "%{$searchValue}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | COUNT FIX 🔥
        |--------------------------------------------------------------------------
        */
        $recordsTotal = (clone $query)->distinct('staff_sessions.id')->count('staff_sessions.id');
        $recordsFiltered = $recordsTotal; // same because already filtered

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */
        $query->select(
            'staff_sessions.id',
            'staff_sessions.timezone',
            'staff_sessions.prev_logout',
            'user.name as staff_name',
            'user.email as staff_email',
            'user.mobile as staff_mobile',
            'stores.name as store_name',
            'staff_sessions.login_at',
            'staff_sessions.logout_at',
            DB::raw('COUNT(transactions.id) as total_transactions'),
            DB::raw('COALESCE(SUM(transactions.amount),0) as total_amount'),
            DB::raw("TIMESTAMPDIFF(SECOND, staff_sessions.login_at, COALESCE(staff_sessions.logout_at,'{$now}')) as working_seconds")
        )
        ->groupBy(
            'staff_sessions.id',
            'staff_sessions.prev_logout',
            'user.name',
            'user.email',
            'user.mobile',
            'stores.name',
            'staff_sessions.login_at',
            'staff_sessions.logout_at'
        );

        /*
        |--------------------------------------------------------------------------
        | ORDER
        |--------------------------------------------------------------------------
        */
        $columnMap = [
            'store' => 'stores.name',
            'staff' => 'user.name',
            'login' => 'staff_sessions.login_at',
            'logout' => 'staff_sessions.logout_at'
        ];

        if (isset($columnMap[$columnName])) {
            $query->orderBy($columnMap[$columnName], $columnSortOrder);
        } else {
            $query->orderBy('staff_sessions.login_at', 'desc');
        }

        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */
        if ($rowPerPage != -1) {
            $query->offset($start)->limit($rowPerPage);
        }

        // \Log::info($query->toSql(), $query->getBindings());
        $rows = $query->get();

        /*
        |--------------------------------------------------------------------------
        | FORMAT
        |--------------------------------------------------------------------------
        */
        $data = [];
        $i = $start + 1;

        foreach ($rows as $row) {
            $startTime = $row->prev_logout ?? $row->login_at;
            $endTime = $row->logout_at
                    ? Carbon::parse($row->logout_at)
                    : Carbon::now($row->timezone ?? $timezone);

            $hours = floor($row->working_seconds / 3600);
            $minutes = floor(($row->working_seconds % 3600) / 60);
            $range = Carbon::parse($startTime)->format('H:i:s') . ' → ' . Carbon::parse($endTime)->format('H:i:s');

            $data[] = [
                'DT_RowClass' => $row->logout_at ? 'row-red' : 'row-green',
                'id' => $i++,
                'store' => $row->store_name,
                'staff' => $row->staff_name,
                'email' => $row->staff_email,
                'mobile' => $row->staff_mobile,
                'login' => Carbon::parse($row->login_at)->format('d-m-Y H:i:s'),
                'logout' => $row->logout_at
                    ? Carbon::parse($row->logout_at)->format('d-m-Y H:i:s')
                    : 'Active',
                'working_hours' => $hours . 'h ' . $minutes . 'm',
                'transaction_range' => $range,
                'total_tnx' => $row->total_transactions,
                'total_amount' => $row->total_amount,
            ];
        }

        return response()->json([
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        ]);
    }

    // ======================================= print shift report =====================================
    // public function printshiftreport(Request $request)
    // {
    //     $data = $request->input();
    //     $user = session('admin');

    //     if (!$user) {
    //         return response()->json(['data' => []]);
    //     }

    //     $timezone = $user->timezone ?? session('admin_timezone');
    //     $now = Carbon::now($timezone)->format('Y-m-d H:i:s');

    //     $sessions = DB::table('staff_sessions')
    //         ->select(
    //             'staff_sessions.*',
    //             DB::raw("
    //                 (
    //                     SELECT MAX(ss.logout_at)
    //                     FROM staff_sessions ss
    //                     WHERE ss.store_id = staff_sessions.store_id
    //                     AND ss.logout_at < staff_sessions.login_at
    //                 ) as prev_logout
    //             ")
    //         );

    //     $query = DB::table(DB::raw("({$sessions->toSql()}) as staff_sessions"))
    //         ->mergeBindings($sessions)
    //         ->join('user','user.id','=','staff_sessions.user_id')
    //         ->join('stores','stores.id','=','staff_sessions.store_id')
    //         ->leftJoin('transactions', function ($join) use ($now) {
    //             $join->on('transactions.store_id', '=', 'staff_sessions.store_id')
    //             ->whereRaw("
    //                 (
    //                     staff_sessions.prev_logout IS NULL
    //                     OR transactions.transaction_at >= staff_sessions.prev_logout
    //                 )
    //             ")
    //             ->whereRaw("
    //                 transactions.transaction_at <= COALESCE(staff_sessions.logout_at, '{$now}')
    //             ");
    //         });

    //     // Filters
    //     $todayStart = Carbon::now($timezone)->startOfDay()->toDateTimeString();
    //     $todayEnd   = Carbon::now($timezone)->endOfDay()->toDateTimeString();

    //     if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
    //         $query->where('staff_sessions.store_id', $user->store_id)
    //             ->where('staff_sessions.user_id', $user->id)
    //             ->where(function($q) use ($todayStart, $todayEnd) {
    //                 $q->whereNull('staff_sessions.logout_at')
    //                     ->orWhere(function($q2) use ($todayStart) {
    //                         $q2->where('staff_sessions.login_at', '<', $todayStart)
    //                         ->where('staff_sessions.logout_at', '>=', $todayStart);
    //                     })
    //                     ->orWhereBetween('staff_sessions.login_at', [$todayStart, $todayEnd]);
    //             });
    //     } else {
    //         if ($request->filled('store_id')) $query->where('staff_sessions.store_id', $request->store_id);
    //         if ($request->filled('user_id')) $query->where('staff_sessions.user_id', $request->user_id);
    //     }

    //     if (!empty($data['search'])) {
    //         $search = $data['search'];
    //         $query->where(function ($q) use ($search) {
    //             $q->where('user.name', 'like', '%' . $search . '%')
    //                 ->orWhere('stores.name', 'like', '%' . $search . '%')
    //                 ->orWhere('user.email', 'like', '%' . $search . '%')
    //                 ->orWhere('user.mobile', 'like', '%' . $search . '%');
    //         });
    //     }

    //     if ($request->filled('from_datetime') && $request->filled('to_datetime')) {
    //         $from = Carbon::parse($request->from_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $to   = Carbon::parse($request->to_datetime, $timezone)->format('Y-m-d H:i:s');
    //         // $from = date('Y-m-d H:i', strtotime($request->from_datetime));
    //         // $to   = date('Y-m-d H:i', strtotime($request->to_datetime));

    //         $query->where(function ($q) use ($from, $to) {
    //             $q->where('staff_sessions.login_at', '<=', $to)
    //             ->where(function ($q2) use ($from) {
    //                 $q2->where('staff_sessions.logout_at', '>=', $from)
    //                     ->orWhereNull('staff_sessions.logout_at');
    //             });
    //         });
    //     } elseif ($request->filled('from_datetime')) {
    //         $from = Carbon::parse($request->from_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $query->where('staff_sessions.login_at', '>=', $from);
    //     } elseif ($request->filled('to_datetime')) {
    //         $to = Carbon::parse($request->to_datetime, $timezone)->format('Y-m-d H:i:s');
    //         $query->where('staff_sessions.login_at', '<=', $to);
    //     }

    //     $data['transactions'] = $query->select(
    //             'staff_sessions.id',
    //             'staff_sessions.timezone',
    //             'staff_sessions.prev_logout',
    //             'user.name as staff_name',
    //             'user.email as staff_email',
    //             'user.mobile as staff_mobile',
    //             'stores.name as store_name',
    //             'stores.store_type',
    //             'staff_sessions.login_at',
    //             'staff_sessions.logout_at',
    //             DB::raw('COUNT(transactions.id) as total_transactions'),
    //             DB::raw('COALESCE(SUM(transactions.amount),0) as total_amount'),
    //             DB::raw("
    //                 TIMESTAMPDIFF(SECOND,
    //                     staff_sessions.login_at,
    //                     COALESCE(staff_sessions.logout_at, NOW())
    //                 ) as working_seconds
    //             ")
    //         )
    //         ->groupBy(
    //             'staff_sessions.id',
    //             'staff_sessions.prev_logout',
    //             'user.name',
    //             'user.email',
    //             'user.mobile',
    //             'stores.name',
    //             'stores.store_type',
    //             'staff_sessions.login_at',
    //             'staff_sessions.logout_at'
    //         )
    //         ->orderBy('staff_sessions.login_at', 'DESC')
    //         ->get();

    //     // $pdf = PDF::loadView('admin.printshiftreport', $data)
    //     //         ->setPaper('a4', 'potrait');

    //     $customPaper = [0, 0, 226.77, 2000]; // 80mm width, long height
    //     $pdf = PDF::loadView('admin.printshiftreport', $data)
    //             ->setPaper($customPaper, 'portrait');

    //     // ✅ REMOVE ALL MARGINS (VERY IMPORTANT)
    //     $pdf->setOptions([
    //         'page-width' => '80mm',
    //         'page-height' => '2000mm',
    //         'margin-top' => 0,
    //         'margin-bottom' => 0,
    //         'margin-left' => 0,
    //         'margin-right' => 0,
    //     ]);

    //     $path = public_path('assets/user/report');
    //     $fileName = 'Staff_Report_' . $user->id . '_' . date('Ymd_His') . '.pdf';

    //     $pdf->save($path . '/' . $fileName);

    //     $output['url'] = asset('/assetsuser/report') . '/' . $fileName;
    //     $output['filename'] = $fileName;

    //     return response()->json($output);
    // }
    public function printshiftreport(Request $request)
    {
        $data = $request->input();
        $user = session('admin');

        if (!$user) {
            return response()->json(['data' => []]);
        }

        $timezone = $user->timezone ?? session('admin_timezone');
        $now = Carbon::now($timezone)->format('Y-m-d H:i:s');

        /*
        |------------------------------------------------------------------
        | DATE FILTER (IMPORTANT)
        |------------------------------------------------------------------
        */
        $from = $request->filled('from_datetime')
            ? Carbon::parse($request->from_datetime, $timezone)->format('Y-m-d H:i:s')
            : null;

        $to = $request->filled('to_datetime')
            ? Carbon::parse($request->to_datetime, $timezone)->format('Y-m-d H:i:s')
            : null;

        /*
        |------------------------------------------------------------------
        | BASE SESSION QUERY
        |------------------------------------------------------------------
        */
        // $sessions = DB::table('staff_sessions')
        //     ->select(
        //         'staff_sessions.*',
        //         DB::raw("(SELECT MAX(ss.logout_at)
        //             FROM staff_sessions ss
        //             WHERE ss.store_id = staff_sessions.store_id
        //             AND ss.logout_at < staff_sessions.login_at
        //         ) as prev_logout")
        //     );
        $sessions = DB::table('staff_sessions')
            ->select(
                'staff_sessions.*',

                DB::raw("(SELECT ss.logout_at
                        FROM staff_sessions ss
                        WHERE ss.store_id = staff_sessions.store_id
                        AND ss.id < staff_sessions.id
                        AND ss.logout_at IS NOT NULL
                        ORDER BY ss.id DESC
                        LIMIT 1
                    ) as prev_logout")
            );

        $query = DB::table(DB::raw("({$sessions->toSql()}) as staff_sessions"))
            ->mergeBindings($sessions)
            ->join('user', 'user.id', '=', 'staff_sessions.user_id')
            ->join('stores', 'stores.id', '=', 'staff_sessions.store_id')

            /*
            |------------------------------------------------------------------
            | 🔥 FIX: TRANSACTION FILTER ALSO APPLY HERE
            |------------------------------------------------------------------
            */
            ->leftJoin('transactions', function ($join) use ($now, $from, $to) {

                $join->on('transactions.store_id', '=', 'staff_sessions.store_id');

                // ✅ ONLY SUCCESS
                $join->where('transactions.status', 'success');

                // $join->whereRaw("
                //     (staff_sessions.prev_logout IS NULL
                //     OR transactions.transaction_at >= staff_sessions.prev_logout)
                // ");
                $join->whereRaw("
                    transactions.transaction_at >= GREATEST(
                        COALESCE(staff_sessions.prev_logout, staff_sessions.login_at),
                        staff_sessions.login_at
                    )
                ");

                $join->whereRaw("
                    transactions.transaction_at <= COALESCE(staff_sessions.logout_at, '{$now}')
                ");

                // ✅ THIS WAS MISSING (MAIN BUG)
                if ($from && $to) {
                    $join->whereBetween('transactions.transaction_at', [$from, $to]);
                } elseif ($from) {
                    $join->where('transactions.transaction_at', '>=', $from);
                } elseif ($to) {
                    $join->where('transactions.transaction_at', '<=', $to);
                }
            });

        /*
        |------------------------------------------------------------------
        | USER FILTER
        |------------------------------------------------------------------
        */
        if (!in_array($user->user_type, ['super_admin', 'sub_admin'])) {
            $query->where('staff_sessions.store_id', $user->store_id)
                ->where('staff_sessions.user_id', $user->id);
        } else {
            if ($request->filled('store_id')) {
                $query->where('staff_sessions.store_id', $request->store_id);
            }
            if ($request->filled('user_id')) {
                $query->where('staff_sessions.user_id', $request->user_id);
            }
        }

        if (!empty($data['search'])) {
             $search = $data['search'];
             $query->where(function ($q) use ($search) {
                 $q->where('user.name', 'like', '%' . $search . '%')
                     ->orWhere('stores.name', 'like', '%' . $search . '%')
                     ->orWhere('user.email', 'like', '%' . $search . '%')
                     ->orWhere('user.mobile', 'like', '%' . $search . '%');
             });
        }
        /*
        |------------------------------------------------------------------
        | SESSION FILTER (OVERLAP LOGIC)
        |------------------------------------------------------------------
        */
        if ($from && $to) {
            $query->where(function ($q) use ($from, $to) {
                $q->where('staff_sessions.login_at', '<=', $to)
                ->where(function ($q2) use ($from) {
                    $q2->where('staff_sessions.logout_at', '>=', $from)
                        ->orWhereNull('staff_sessions.logout_at');
                });
            });
        } elseif ($from) {
            $query->where('staff_sessions.login_at', '>=', $from);
        } elseif ($to) {
            $query->where('staff_sessions.login_at', '<=', $to);
        }

        /*
        |------------------------------------------------------------------
        | FINAL DATA
        |------------------------------------------------------------------
        */
        $data['transactions'] = $query->select(
                'staff_sessions.id',
                'staff_sessions.timezone',
                'staff_sessions.prev_logout',
                'user.name as staff_name',
                'user.email as staff_email',
                'user.mobile as staff_mobile',
                'stores.name as store_name',
                'stores.store_type',
                'staff_sessions.login_at',
                'staff_sessions.logout_at',
                DB::raw('COUNT(transactions.id) as total_transactions'),
                DB::raw('COALESCE(SUM(transactions.amount),0) as total_amount'),
                DB::raw("
                    TIMESTAMPDIFF(SECOND,
                        staff_sessions.login_at,
                        COALESCE(staff_sessions.logout_at, '{$now}')
                    ) as working_seconds
                ")
            )
            ->groupBy(
                'staff_sessions.id',
                'staff_sessions.prev_logout',
                'user.name',
                'user.email',
                'user.mobile',
                'stores.name',
                'stores.store_type',
                'staff_sessions.login_at',
                'staff_sessions.logout_at'
            )
            ->orderBy('staff_sessions.login_at', 'DESC')
            ->get();

        /*
        |------------------------------------------------------------------
        | PDF
        |------------------------------------------------------------------
        */
        $customPaper = [0, 0, 226.77, 2000];

        $pdf = PDF::loadView('admin.printshiftreport', $data)
            ->setPaper($customPaper, 'portrait');

        $pdf->setOptions([
            'margin-top' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
            'margin-right' => 0,
        ]);

        $path = public_path('assets/user/report');
        $fileName = 'Staff_Report_' . $user->id . '_' . date('Ymd_His') . '.pdf';

        $pdf->save($path . '/' . $fileName);

        return response()->json([
            'url' => asset('assets/user/report') . '/' . $fileName,
            'filename' => $fileName
        ]);
    }

    // ========================================== print shift staff report =====================================
    // public function printshiftstaffreport()
    // {
    //     $user = session('admin');
    //     if (!$user) {
    //         return response()->json(['data' => []]);
    //     }

    //     $timezone = $user->timezone ?? session('admin_timezone') ?? config('app.timezone');

    //     $session = DB::table('staff_sessions')
    //         ->select(
    //             'staff_sessions.*',
    //             DB::raw("(
    //                 SELECT MAX(ss.logout_at)
    //                 FROM staff_sessions ss
    //                 WHERE ss.store_id = staff_sessions.store_id
    //                 AND ss.logout_at < staff_sessions.login_at
    //             ) as prev_logout")
    //         )
    //         ->where('staff_sessions.user_id', $user->id)
    //         ->orderBy('staff_sessions.id', 'desc')
    //         ->first();

    //     if (!$session) {
    //         return response()->json(['data'=>[]]);
    //     }

    //     // determine start time
    //     if ($session->prev_logout) {
    //         $startUTC = Carbon::parse($session->prev_logout);
    //     } else {
    //         $firstTransaction = DB::table('transactions')
    //             ->where('store_id', $session->store_id)
    //             ->min('transaction_at');

    //         $startUTC = $firstTransaction
    //             ? Carbon::parse($firstTransaction)
    //             : Carbon::parse($session->login_at);
    //     }

    //     $endUTC = $session->logout_at
    //         ? Carbon::parse($session->logout_at)
    //         : Carbon::now($timezone);

    //     $transactions = transactions::where('transactions.store_id', $session->store_id)
    //         ->where('transactions.status', 'success')
    //         ->whereBetween('transactions.transaction_at', [
    //             $startUTC->toDateTimeString(),
    //             $endUTC->toDateTimeString()
    //         ])
    //         ->get();

    //     // $startUTC = $session->prev_logout
    //     //     ? Carbon::parse($session->prev_logout, $timezone)
    //     //     : Carbon::parse($session->login_at, $timezone);

    //     // $endUTC = $session->logout_at
    //     //     ? Carbon::parse($session->logout_at, $timezone)
    //     //     : Carbon::now($timezone);

    //     // // Fetch transactions only for this staff during their session
    //     // $transactions = DB::table('transactions')
    //     //     ->where('store_id', $session->store_id)
    //     //     ->where('user_id', $user->id) // ✅ Only this staff
    //     //     ->whereBetween('transaction_at', [
    //     //         $startUTC->toDateTimeString(),
    //     //         $endUTC->toDateTimeString()
    //     //     ])
    //     //     ->get();

    //     $totalTransactions = $transactions->count();
    //     $totalAmount = $transactions->sum('amount');
    //     $storeName = stores::where('id', $session->store_id)->value('name');

    //     $data = [
    //         'staff_name' => $user->name,
    //         'store_name' => $storeName,
    //         'login_at' => $startUTC,
    //         'logout_at' => $endUTC,
    //         'total_transactions' => $totalTransactions,
    //         'total_amount' => $totalAmount,
    //     ];

    //     // $pdf = PDF::loadView('admin.printshiftstaffreport', $data)
    //     //     ->setPaper('a4', 'portrait');

    //     // $customPaper = [0, 0, 226.77, 200]; // 80mm width, long height
    //     // $pdf = PDF::loadView('admin.printshiftstaffreport', $data)
    //     //         ->setPaper($customPaper, 'landscape');

    //     // // ✅ REMOVE ALL MARGINS (VERY IMPORTANT)
    //     // $pdf->setOptions([
    //     //     'page-width' => '80mm',
    //     //     'page-height' => '100mm',
    //     //     'margin-top' => 0,
    //     //     'margin-bottom' => 0,
    //     //     'margin-left' => 5,
    //     //     'margin-right' => 5,
    //     // ]);

    //     $customPaper = [0, 0, 226.77, 155]; // width=80mm, height=fit content
    //     $pdf = PDF::loadView('admin.printshiftstaffreport', $data)
    //         ->setPaper($customPaper, 'landscape');

    //     $pdf->setOptions([
    //         'page-width' => '80mm',
    //         'page-height' => '100mm',
    //         'margin-top'    => 0,
    //         'margin-bottom' => 0,
    //         'margin-left'   => 5,
    //         'margin-right'  => 5,
    //     ]);

    //     $path = public_path('assets/user/staff_shift_report');
    //     $fileName = 'Staff_Shift_Report_' . $user->id . '_' . date('Y-m-d_His') . '.pdf';

    //     $pdf->save($path . '/' . $fileName);

    //     return response()->json([
    //         'url' => asset('/assets/user/staff_shift_report/'.$fileName),
    //         'filename' => $fileName
    //     ]);
    // }
    public function printshiftstaffreport()
    {
        $user = session('admin');
        if (!$user) {
            return response()->json(['data' => []]);
        }

        $timezone = $user->timezone ?? session('admin_timezone') ?? config('app.timezone');

        // $session = DB::table('staff_sessions')
        //     ->select(
        //         'staff_sessions.*',
        //         DB::raw("(
        //             SELECT MAX(ss.logout_at)
        //             FROM staff_sessions ss
        //             WHERE ss.store_id = staff_sessions.store_id
        //             AND ss.logout_at < staff_sessions.login_at
        //         ) as prev_logout")
        //     )
        //     ->where('staff_sessions.user_id', $user->id)
        //     ->orderBy('staff_sessions.id', 'desc')
        //     ->first();
        $session = DB::table('staff_sessions')
            ->select(
                'staff_sessions.*',

                DB::raw("(SELECT ss.logout_at
                        FROM staff_sessions ss
                        WHERE ss.store_id = staff_sessions.store_id
                        AND ss.id < staff_sessions.id
                        AND ss.logout_at IS NOT NULL
                        ORDER BY ss.id DESC
                        LIMIT 1
                    ) as prev_logout")
            )
            ->where('staff_sessions.user_id', $user->id)
            ->orderBy('staff_sessions.id', 'desc')
            ->first();

        if (!$session) {
            return response()->json(['data'=>[]]);
        }

        // determine start time
        if ($session->prev_logout) {
            $startUTC = Carbon::parse($session->prev_logout);
        } else {
            $firstTransaction = DB::table('transactions')
                ->where('store_id', $session->store_id)
                ->min('transaction_at');

            $startUTC = $firstTransaction
                ? Carbon::parse($firstTransaction)
                : Carbon::parse($session->login_at);
        }

        $endUTC = $session->logout_at
            ? Carbon::parse($session->logout_at)
            : Carbon::now($timezone);

        $transactions = transactions::where('transactions.store_id', $session->store_id)
            ->where('transactions.status', 'success')
            ->whereBetween('transactions.transaction_at', [
                $startUTC->toDateTimeString(),
                $endUTC->toDateTimeString()
            ])
            ->get();

        $totalTransactions = $transactions->count();
        $totalAmount = $transactions->sum('amount');
        $storeName = stores::where('id', $session->store_id)->value('name');

        $data = [
            'staff_name' => $user->name,
            'store_name' => $storeName,
            'login_at' => $startUTC,
            'logout_at' => $endUTC,
            'total_transactions' => $totalTransactions,
            'total_amount' => $totalAmount,
        ];

        // Return HTML instead of PDF
        $html = view('admin.printshiftstaffreport', $data)->render();
        
        return response()->json([
            'html' => $html
        ]);
    }
    // -------------------------------- end shift reports module -------------------------------------------------------------------

    // -------------------------------- withdrawals module -------------------------------------------------------------------
    public function withdrawals(Request $request, $id = 0)
    {
        $user = session('admin');
        if (!$user) {
            return redirect('/admin/login');
        }

        if ($request->isMethod('post')) {
            $action = $id == 0 ? 'can_create' : 'can_edit';
            // 🔥 Check permission
            if (($check = $this->checkPermission('withdrawals', $action)) !== true) {
                return $check;
            }
            $data = $request->all();
            $validator = Validator::make($data, [
                'store_id' => 'required|exists:stores,id',
                'amount' => 'required|numeric|min:1',
                'payment_method' => 'nullable|in:cash,bank_transfer',
                'note' => 'nullable|string|max:500',
                'withdrawal_date' => 'required|date',
            ]);

            if ($validator->fails()) {
                $message = collect($validator->errors()->all())->first();
                $this->flashmessage($message, 1);
                return redirect()->back()->withInput();
            }

            $dbUser = users::find($user->id);
            $tz = session('admin_timezone', config('app.timezone'));

            $insert = array(
                'store_id' => $data['store_id'],
                'user_id' => session('admin')->id,
                'amount' => $data['amount'],
                'payment_method' => $data['payment_method'] ?? null,
                'notes' => $data['notes'] ?? null,
                'processed_at' => Carbon::now($tz)->format('Y-m-d H:i:s'),
                'withdrawal_date' => Carbon::parse($data['withdrawal_date'])->format('Y-m-d'),
            );
            if ($id != 0) {
                $old = withdrawals::find($id);

                if (!$old) {
                    $this->flashmessage('Record not found', 1);
                    return redirect()->back();
                }

                // 🔥 Prevent sub admin editing others data
                if ($user->user_type != 'super_admin' && $old->user_id != $user->id) {
                    $this->flashmessage('Unauthorized action', 1);
                    return redirect()->back();
                }

                // $difference = $data['amount'] - $old->amount;
                // if ($user->user_type != 'super_admin') {
                //     $remainingLimit = $dbUser->max_payout_limit - $dbUser->used_payout_amount;

                //     if ($difference > $remainingLimit) {
                //         $this->flashmessage('Limit exceeded on update. Remaining: ' . $remainingLimit, 1);
                //         return redirect()->back()->withInput();
                //     }

                //     // ✅ Adjust used amount
                //     users::where('id', $user->id)->increment('used_payout_amount', $difference);
                // }
                
                withdrawals::where('id', $id)->update($insert);
                $this->flashmessage('Withdrawal Updated Successfully', 0);
            } else {
                // // ✅ Limit check for sub admin
                // if ($user->user_type != 'super_admin') {
                //     $remainingLimit = $dbUser->max_payout_limit - $dbUser->used_payout_amount;

                //     if ($data['amount'] > $remainingLimit) {
                //         $this->flashmessage('Withdrawal limit exceeded. Remaining limit: ' . $remainingLimit, 1);
                //         return redirect()->back()->withInput();
                //     }
                // }
                
                withdrawals::create($insert);

                // // ✅ Update used amount
                // if ($user->user_type != 'super_admin') {
                //     users::where('id', $user->id)->increment('used_payout_amount', $data['amount']);
                // }

                $this->flashmessage('Withdrawal Inserted Successfully', 0);
            }
            return redirect('/admin/withdrawals');
        }
        if($request->isMethod('get') && $id == 0){
            if (($check = $this->checkPermission('withdrawals', 'can_view')) !== true) {
                return $check;
            }
            $data['stores'] = stores::orderBy('id', 'desc')->get();
            return view('admin.withdrawals', $data);
        }
    }
    public function withdrawalsajaxdata(Request $request)
    {
        $user = session('admin');
        $query = withdrawals::with('stores', 'user')->where('is_deleted', 0);

        // 🔥 Role-based filtering
        if ($user->user_type != 'super_admin') {
            $query->where('user_id', $user->id);
        }

        if ($request->filled('store_id') && $request->store_id != '') {
            $query->where('store_id', $request->store_id);
        }

        $withdrawals = $query->orderBy('id', 'DESC')->get();

        $data = [];
        $i = 1;
        foreach ($withdrawals as $key => $value) {
            if(haspermission('withdrawals', 'can_edit') || haspermission('withdrawals', 'can_delete')){
                $action = '';
                if(haspermission('withdrawals', 'can_edit')){
                    $action .= '<button type="button" data-bs-toggle="modal" data-bs-target="#editwithdrawal-modal" class="btn mb-1 me-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn" data-id="' . $value->id . '" title="Edit">
                                    <i class="fs-5 ti ti-edit"></i>
                                </button>';
                }
                if(haspermission('withdrawals', 'can_delete')){
                    $action .= '<button type="button" class="btn mb-1 me-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata"
                            data-table="user" data-field="id" data-rownumber="' . $key . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Withdrawal">
                                <i class="fs-5 ti ti-trash"></i>
                            </button>';
                }
            } else {
                $action = '-';
            }

            $data[] = [
                $i++,
                // '<div class="form-check"><input class="form-check-input" type="checkbox" name="selected_ids[]" value="' . $value->id . '"></div>',
                $value->stores->name,
                $value->user->name,
                number_format($value->amount, 2),
                //  ucfirst(str_replace('_', ' ', $value->payment_method)),
                Carbon::parse($value->processed_at)->format('d-m-Y H:i a'),
                Carbon::parse($value->withdrawal_date)->format('d-m-Y'),
                $value->notes,
                $action
            ];
        }
        return response()->json(['data' => $data]);
    }
    public function getwithdrawdata($id)
    {
        $data = withdrawals::find($id);
        return response()->json($data);
    }
    public function deletewithdrawaldata(Request $request)
    {
        $id = $request->id;
        withdrawals::where('id', $id)->update([
            'is_deleted' => 1
        ]);
        return response()->json(['status' => 1]);
    }
    // --------------------------------- end withdrawals module -------------------------------------------------------------------

    // -------------------------------- emailmarketing module ----------------------------------------------------------------------
    public function emailmarketing()
    {
        $data['emailtemplate'] = emailtemplate::all();
        return view('admin.emailmarketing', $data);
    }
    public function emailmarketingcampaign(Request $request)
    {
        // Get the uploaded CSV file
        $file = $request->file('email_list');

        // Read email addresses from the CSV
        $emails = [];
        if (($handle = fopen($file->getPathname(), 'r')) !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $emails[] = $data[0]; // Assuming the email addresses are in the first column
            }
            fclose($handle);
        }

        // Fetch the selected email template
        $template = emailtemplate::find($request->input('email_template'));

        // Retrieve any attachments associated with the template
        $template_attachments = email_attachment::where('e_id', $request->input('email_template'))->get();

        // Prepare the attachment file paths
        $attachments = [];
        foreach ($template_attachments as $attval) {
            $attachments[] = asset('assets/admin/images/emailattachment/' . $attval->attachment);
        }

        // Loop through each email and use the emailsend function
        foreach ($emails as $email) {
            $this->emailsend($email, $template->title, $template->template, $attachments);
        }

        $this->flashmessage('Emails have been sent successfully.', 0);
        return redirect()->back();
    }
    // -------------------------------- end emailmarketing module ------------------------------------------------------------------

    // ------------------------------------------- comman function ---------------------------------------------------------
    // public function deletedata(Request $request)
    // {
    //     $data = $request->all();
    //     $table = $data['table'];
    //     $field = $data['field'];
    //     $id = $data['id'];

    //     $pathMappings = [
    //         'email_attachment' => [
    //             'root' => '/assets/admin/images/emailattachment/',
    //             'thumbnails' => '/assets/admin/images/emailattachment/thumbnails/'
    //         ],
    //         'gallery' => [
    //             'root' => '/assets/admin/images/gallery/',
    //             'thumbnails' => '/assets/admin/images/gallery/thumbnails/'
    //         ],
    //         'slider' => [
    //             'root' => '/assets/admin/images/slider/',
    //             'thumbnails' => '/assets/admin/images/slider/thumbnails/'
    //         ],
    //         'testimonials' => [
    //             'root' => '/assets/admin/images/testimonials/',
    //             'thumbnails' => '/assets/admin/images/testimonials/thumbnails/'
    //         ],
    //     ];

    //     // Define column mappings for specific tables
    //     $columnMappings = [
    //         'email_attachment' => ['attachment'],
    //         'gallery' => ['g_image'],
    //         'slider' => ['banner_image'],
    //         'testimonials' => ['client_image'],
    //     ];

    //     // Example: Define relationships to check for in other tables
    //     $relations = [
    //         'emailtemplate' => [
    //             ['table' => 'email_attachment', 'field' => 'e_id', 'pathField' => 'attachment'],
    //             // Add other related tables here
    //         ],
    //         'leads' => [
    //             ['table' => 'leadfollow', 'field' => 'l_id'],
    //         ],
    //         'blogcategory' => [
    //             ['table' => 'pages', 'field' => 'category_id'],
    //         ],
    //         'country' => [
    //             ['table' => 'state', 'field' => 'country_id'],
    //         ],
    //         'state' => [
    //             ['table' => 'city', 'field' => 'state_id'],
    //         ],
    //         // Add other modules and their related tables here
    //     ];

    //     try {
    //         DB::beginTransaction();

    //         // Check if the record is referenced in the related table
    //         if (array_key_exists($table, $relations)) {
    //             foreach ($relations[$table] as $relation) {
    //                 if ($table == 'leads') {
    //                     DB::table('leadfollow')->where('l_id', $id)->delete();
    //                 } else if ($table == 'emailtemplate') {
    //                     $relatedallData = DB::table($relation['table'])->where($relation['field'], $id)->get();
    //                     $basePath = isset($pathMappings[$relation['table']]) ? $pathMappings[$relation['table']] : [];
    //                     foreach ($relatedallData as $record) {
    //                         if (isset($record->{$relation['pathField']})) {
    //                             $filePath = public_path($basePath['root'] . $record->{$relation['pathField']});
    //                             if (file_exists($filePath)) {
    //                                 unlink($filePath);
    //                             }
    //                             if (isset($basePath['thumbnails'])) {
    //                                 $thumbnailPath = public_path($basePath['thumbnails'] . $record->{$relation['pathField']});
    //                                 if (file_exists($thumbnailPath)) {
    //                                     unlink($thumbnailPath);
    //                                 }
    //                             }
    //                         }
    //                     }
    //                     DB::table($relation['table'])->where($relation['field'], $id)->delete();
    //                 } else {
    //                     $relatedRecords = DB::table($relation['table'])->where($relation['field'], $id)->count();
    //                     if ($relatedRecords > 0) {
    //                         return response()->json([
    //                             'status' => 2,
    //                             'message' => 'Data cannot be deleted since it is being used in other places.'
    //                         ]);
    //                     }
    //                 }
    //             }
    //         }

    //         // Handle unlinking for the main table directly
    //         if (array_key_exists($table, $pathMappings)) {
    //             $record = DB::table($table)->where($field, $id)->first();

    //             $basePath = $pathMappings[$table];
    //             $columns = isset($columnMappings[$table]) ? $columnMappings[$table] : [];

    //             if ($record) {
    //                 // Unlink files if they exist
    //                 foreach ($columns as $column) {
    //                     if (isset($record->{$column})) {
    //                         $filePath = public_path($basePath['root'] . $record->{$column});
    //                         if (file_exists($filePath)) {
    //                             unlink($filePath);
    //                         }

    //                         // Handle thumbnail unlinking if available
    //                         if (isset($basePath['thumbnails'])) {
    //                             $thumbnailPath = public_path($basePath['thumbnails'] . $record->{$column});
    //                             if (file_exists($thumbnailPath)) {
    //                                 unlink($thumbnailPath);
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }

    //         // Finally, delete the record from the main table
    //         DB::table($table)->where($field, $id)->delete();

    //         Cache::forget('sliders');
    //         Cache::forget('faq');
    //         Cache::forget('testimonials');

    //         DB::commit();
    //         return response()->json(['status' => 1]);
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
    //     }
    // }
    public function deletedata(Request $request)
    {
        $data = $request->all();
        $table = $data['table'];
        $field = $data['field'];
        $id = $data['id'];

        // $allowedTables = [
        //     'roles',
        //     'stores',
        //     'features',
        //     'user',
        //     'emailtemplate',
        //     'gallery',
        //     'slider',
        //     'testimonials',
        //     'leads',
        //     'blogcategory',
        //     'country',
        //     'state'
        // ];

        // if (!in_array($table, $allowedTables)) {
        //     return response()->json([
        //         'status' => 0,
        //         'message' => 'Invalid table access.'
        //     ]);
        // }
        
        $pathMappings = [
            'email_attachment' => [
                'root' => '/assets/admin/images/emailattachment/',
                'thumbnails' => '/assets/admin/images/emailattachment/thumbnails/'
            ],
            'gallery' => [
                'root' => '/assets/admin/images/gallery/',
                'thumbnails' => '/assets/admin/images/gallery/thumbnails/'
            ],
            'slider' => [
                'root' => '/assets/admin/images/slider/',
                'thumbnails' => '/assets/admin/images/slider/thumbnails/'
            ],
            'testimonials' => [
                'root' => '/assets/admin/images/testimonials/',
                'thumbnails' => '/assets/admin/images/testimonials/thumbnails/'
            ],
            'user' => [
                'root' => '/assets/admin/images/profile/',
                'thumbnails' => '/assets/admin/images/profile/thumbnails/'
            ],
            'stores' => [
                'root' => '/assets/admin/images/store/',
                'thumbnails' => '/assets/admin/images/store/thumbnails/'
            ],
        ];

        // Define column mappings for specific tables
        $columnMappings = [
            'email_attachment' => ['attachment'],
            'gallery' => ['g_image'],
            'slider' => ['banner_image'],
            'testimonials' => ['client_image'],
            'user' => ['p_image'],
            'stores' => ['store_image'],
        ];

        // Example: Define relationships to check for in other tables
        $relations = [
            'emailtemplate' => [
                ['table' => 'email_attachment', 'field' => 'e_id', 'pathField' => 'attachment'],
                // Add other related tables here
            ],
            'leads' => [
                ['table' => 'leadfollow', 'field' => 'l_id'],
            ],
            'blogcategory' => [
                ['table' => 'pages', 'field' => 'category_id'],
            ],
            'country' => [
                ['table' => 'state', 'field' => 'country_id'],
            ],
            'state' => [
                ['table' => 'city', 'field' => 'state_id'],
            ],
            // Add other modules and their related tables here
        ];

        try {
            DB::beginTransaction();

            // 🔥 PREVENT DELETE ROLE IF STAFF EXISTS
            if ($table == 'roles') {
                $staffExists = DB::table('user')->where('role_id', $id)->exists();
                if ($staffExists) {
                    DB::rollBack();
                    return response()->json([
                        'status' => 2,
                        'message' => 'Role cannot be deleted. Staff are assigned to this role.'
                    ]);
                }

                // delete role feature permissions
                DB::table('role_feature_permission')->where('role_id', $id)->delete();
            }

            // 🔥 PREVENT DELETE STORE IF STAFF EXISTS
            if ($table == 'stores') {
                $staffExists = DB::table('user')->where('store_id', $id)->exists();
                if ($staffExists) {
                    DB::rollBack();
                    return response()->json([
                        'status' => 2,
                        'message' => 'Store cannot be deleted. Staff are assigned to this store.'
                    ]);
                }

                // Unlink QR code image if exists
                $store = DB::table('stores')->where('id', $id)->first();
                if ($store && !empty($store->qr_code)) {
                    $qrPath = public_path('assets/admin/images/qrcode/' . $store->qr_code);
                    if (file_exists($qrPath)) {
                        unlink($qrPath);
                    }
                }
            }

            // 🔥 PREVENT DELETE FEATURE IF USED
            if ($table == 'features') {
                $used = DB::table('role_feature_permission')->where('feature_id', $id)->exists();
                if ($used) {
                    DB::rollBack();
                    return response()->json([
                        'status' => 2,
                        'message' => 'Feature cannot be deleted. It is assigned to roles.'
                    ]);
                }
            }

            // 🔥 DELETE USER PERMISSIONS IF USER DELETED
            if ($table == 'user') {
                DB::table('user_permission')->where('user_id', $id)->delete();
            }

            // Check if the record is referenced in the related table
            if (array_key_exists($table, $relations)) {
                foreach ($relations[$table] as $relation) {
                    if ($table == 'leads') {
                        DB::table('leadfollow')->where('l_id', $id)->delete();
                    } else if ($table == 'emailtemplate') {
                        $relatedallData = DB::table($relation['table'])->where($relation['field'], $id)->get();
                        $basePath = isset($pathMappings[$relation['table']]) ? $pathMappings[$relation['table']] : [];
                        foreach ($relatedallData as $record) {
                            if (isset($record->{$relation['pathField']})) {
                                $filePath = public_path($basePath['root'] . $record->{$relation['pathField']});
                                if (file_exists($filePath)) {
                                    unlink($filePath);
                                }
                                if (isset($basePath['thumbnails'])) {
                                    $thumbnailPath = public_path($basePath['thumbnails'] . $record->{$relation['pathField']});
                                    if (file_exists($thumbnailPath)) {
                                        unlink($thumbnailPath);
                                    }
                                }
                            }
                        }
                        DB::table($relation['table'])->where($relation['field'], $id)->delete();
                    } else {
                        $relatedRecords = DB::table($relation['table'])->where($relation['field'], $id)->count();
                        if ($relatedRecords > 0) {
                            DB::rollBack();
                            return response()->json([
                                'status' => 2,
                                'message' => 'Data cannot be deleted since it is being used in other places.'
                            ]);
                        }
                    }
                }
            }

            // Handle unlinking for the main table directly
            if (array_key_exists($table, $pathMappings)) {
                $record = DB::table($table)->where($field, $id)->first();

                $basePath = $pathMappings[$table];
                $columns = isset($columnMappings[$table]) ? $columnMappings[$table] : [];

                if ($record) {
                    // Unlink files if they exist
                    foreach ($columns as $column) {
                        if (isset($record->{$column})) {
                            $filePath = public_path($basePath['root'] . $record->{$column});
                            if (file_exists($filePath)) {
                                unlink($filePath);
                            }

                            // Handle thumbnail unlinking if available
                            if (isset($basePath['thumbnails'])) {
                                $thumbnailPath = public_path($basePath['thumbnails'] . $record->{$column});
                                if (file_exists($thumbnailPath)) {
                                    unlink($thumbnailPath);
                                }
                            }
                        }
                    }
                }
            }

            // Finally, delete the record from the main table
            DB::table($table)->where($field, $id)->delete();

            Cache::forget('sliders');
            Cache::forget('faq');
            Cache::forget('testimonials');

            DB::commit();
            return response()->json(['status' => 1]);
        } catch (\Exception $e) {
            // DB::rollback();
            // return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
            DB::rollBack();
            return response()->json([
                'status' => 0,
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);
        }
    }
    public function deletealldata(Request $request)
    {
        $dataarr = $request->input('dataarr', []);

        if (empty($dataarr)) {
            return response()->json(['status' => false, 'message' => 'No records selected.']);
        }

        $pathMappings = [
            'email_attachment' => [
                'root' => '/assets/admin/images/emailattachment/',
                'thumbnails' => '/assets/admin/images/emailattachment/thumbnails/'
            ],
            'gallery' => [
                'root' => '/assets/admin/images/gallery/',
                'thumbnails' => '/assets/admin/images/gallery/thumbnails/'
            ],
            'slider' => [
                'root' => '/assets/admin/images/slider/',
                'thumbnails' => '/assets/admin/images/slider/thumbnails/'
            ],
            'testimonials' => [
                'root' => '/assets/admin/images/testimonials/',
                'thumbnails' => '/assets/admin/images/testimonials/thumbnails/'
            ],
            'user' => [
                'root' => '/assets/admin/images/profile/',
                'thumbnails' => '/assets/admin/images/profile/thumbnails/'
            ],
            'stores' => [
                'root' => '/assets/admin/images/store/',
                'thumbnails' => '/assets/admin/images/store/thumbnails/'
            ],
        ];

        $columnMappings = [
            'email_attachment' => ['attachment'],
            'gallery' => ['g_image'],
            'slider' => ['banner_image'],
            'category' => ['category_image'],
            'testimonials' => ['client_image'],
            'user' => ['p_image'],
            'stores' => ['store_image'],
        ];

        // Define relationships for each table
        $relations = [
            'emailtemplate' => [
                ['table' => 'email_attachment', 'field' => 'e_id', 'pathField' => 'attachment'],
            ],
            'leads' => [
                ['table' => 'leadfollow', 'field' => 'l_id'],
            ],
            'blogcategory' => [
                ['table' => 'pages', 'field' => 'category_id'],
            ],
            'country' => [
                ['table' => 'state', 'field' => 'country_id'],
            ],
            'state' => [
                ['table' => 'city', 'field' => 'state_id'],
            ],
        ];

        try {
            DB::beginTransaction();

            foreach ($dataarr as $id) {
                $table = $request->input('table');

                //leads
                if ($table === 'leads') {
                    DB::table('leadfollow')->where('l_id', $id)->delete();
                    DB::table($table)->where('id', $id)->delete();
                    continue;
                }

                if (isset($relations[$table])) {
                    foreach ($relations[$table] as $relation) {
                        $relatedRecords = DB::table($relation['table'])
                            ->where($relation['field'], $id)
                            ->count();

                        if ($relatedRecords > 0) {
                            return response()->json([
                                'status' => 2,
                                'message' => 'Data cannot be deleted since it is being used in other places.'
                            ]);
                        }
                    }
                }

                if($table === 'roles') {
                    $staffExists = DB::table('user')->where('role_id', $id)->exists();
                    if ($staffExists) {
                        DB::rollBack();
                        return response()->json([
                            'status' => 2,
                            'message' => 'Role cannot be deleted. Staff are assigned to this role.'
                        ]);
                    }
                    DB::table('role_feature_permission')->where('role_id', $id)->delete();
                }

                if ($table === 'stores') {
                    $staffExists = DB::table('user')->where('store_id', $id)->exists();
                    if ($staffExists) {
                        DB::rollBack();
                        return response()->json([
                            'status' => 2,
                            'message' => 'Store cannot be deleted. Staff are assigned to this store.'
                        ]);
                    }
                    // Unlink QR code image if exists
                    $store = DB::table('stores')->where('id', $id)->first();
                    if ($store && !empty($store->qr_code)) {
                        $qrPath = public_path('assets/admin/images/qrcode/' . $store->qr_code);
                        if (file_exists($qrPath)) {
                            unlink($qrPath);
                        }
                    }
                }

                if ($table === 'features') {
                    $used = DB::table('role_feature_permission')->where('feature_id', $id)->exists();
                    if ($used) {
                        DB::rollBack();
                        return response()->json([
                            'status' => 2,
                            'message' => 'Feature cannot be deleted. It is assigned to roles.'
                        ]);
                    }
                }

                if ($table === 'user') {
                    DB::table('user_permission')->where('user_id', $id)->delete();
                }

                // Handle unlinking for the main table
                if (array_key_exists($table, $pathMappings)) {
                    $record = DB::table($table)->where('id', $id)->first();
                    $basePath = $pathMappings[$table];
                    $columns = isset($columnMappings[$table]) ? $columnMappings[$table] : [];

                    if ($record) {
                        foreach ($columns as $column) {
                            if (isset($record->{$column})) {
                                $filePath = public_path($basePath['root'] . $record->{$column});
                                if (file_exists($filePath)) {
                                    unlink($filePath);
                                }

                                if (isset($basePath['thumbnails'])) {
                                    $thumbnailPath = public_path($basePath['thumbnails'] . $record->{$column});
                                    if (file_exists($thumbnailPath)) {
                                        unlink($thumbnailPath);
                                    }
                                }
                            }
                        }
                    }
                }

                // Delete the record from the main table
                DB::table($table)->where('id', $id)->delete();

                Cache::forget('sliders');
                Cache::forget('successpillars');
                Cache::forget('faq');
                Cache::forget('testimonials');
            }

            DB::commit();
            return response()->json(['status' => 1]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
        }
    }
    // public function deletealldata(Request $request)
    // {
    //     $dataarr = $request->input('dataarr', []);

    //     if (empty($dataarr)) {
    //         return response()->json(['status' => false, 'message' => 'No records selected.']);
    //     }

    //     $pathMappings = [
    //         'email_attachment' => [
    //             'root' => '/assets/admin/images/emailattachment/',
    //             'thumbnails' => '/assets/admin/images/emailattachment/thumbnails/'
    //         ],
    //         'gallery' => [
    //             'root' => '/assets/admin/images/gallery/',
    //             'thumbnails' => '/assets/admin/images/gallery/thumbnails/'
    //         ],
    //         'slider' => [
    //             'root' => '/assets/admin/images/slider/',
    //             'thumbnails' => '/assets/admin/images/slider/thumbnails/'
    //         ],
    //         'testimonials' => [
    //             'root' => '/assets/admin/images/testimonials/',
    //             'thumbnails' => '/assets/admin/images/testimonials/thumbnails/'
    //         ],
    //     ];

    //     $columnMappings = [
    //         'email_attachment' => ['attachment'],
    //         'gallery' => ['g_image'],
    //         'slider' => ['banner_image'],
    //         'category' => ['category_image'],
    //         'testimonials' => ['client_image'],
    //     ];

    //     // Define relationships for each table
    //     $relations = [
    //         'emailtemplate' => [
    //             ['table' => 'email_attachment', 'field' => 'e_id', 'pathField' => 'attachment'],
    //         ],
    //         'leads' => [
    //             ['table' => 'leadfollow', 'field' => 'l_id'],
    //         ],
    //         'blogcategory' => [
    //             ['table' => 'pages', 'field' => 'category_id'],
    //         ],
    //         'country' => [
    //             ['table' => 'state', 'field' => 'country_id'],
    //         ],
    //         'state' => [
    //             ['table' => 'city', 'field' => 'state_id'],
    //         ],
    //     ];

    //     try {
    //         DB::beginTransaction();

    //         foreach ($dataarr as $id) {
    //             $table = $request->input('table');

    //             //leads
    //             if ($table === 'leads') {
    //                 DB::table('leadfollow')->where('l_id', $id)->delete();
    //                 DB::table($table)->where('id', $id)->delete();
    //                 continue;
    //             }

    //             if (isset($relations[$table])) {
    //                 foreach ($relations[$table] as $relation) {
    //                     $relatedRecords = DB::table($relation['table'])
    //                         ->where($relation['field'], $id)
    //                         ->count();

    //                     if ($relatedRecords > 0) {
    //                         return response()->json([
    //                             'status' => 2,
    //                             'message' => 'Data cannot be deleted since it is being used in other places.'
    //                         ]);
    //                     }
    //                 }
    //             }

    //             // Handle unlinking for the main table
    //             $table = $request->input('table');
    //             if (array_key_exists($table, $pathMappings)) {
    //                 $record = DB::table($table)->where('id', $id)->first();
    //                 $basePath = $pathMappings[$table];
    //                 $columns = isset($columnMappings[$table]) ? $columnMappings[$table] : [];

    //                 if ($record) {
    //                     foreach ($columns as $column) {
    //                         if (isset($record->{$column})) {
    //                             $filePath = public_path($basePath['root'] . $record->{$column});
    //                             if (file_exists($filePath)) {
    //                                 unlink($filePath);
    //                             }

    //                             if (isset($basePath['thumbnails'])) {
    //                                 $thumbnailPath = public_path($basePath['thumbnails'] . $record->{$column});
    //                                 if (file_exists($thumbnailPath)) {
    //                                     unlink($thumbnailPath);
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }

    //             // Delete the record from the main table
    //             DB::table($table)->where('id', $id)->delete();

    //             Cache::forget('sliders');
    //             Cache::forget('successpillars');
    //             Cache::forget('faq');
    //             Cache::forget('testimonials');
    //         }

    //         DB::commit();
    //         return response()->json(['status' => 1]);
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return response()->json(['status' => 0, 'message' => 'Something went wrong!']);
    //     }
    // }
    public function images(Request $request, $name, $path, $thumbnail = 0)
    {
        $randString = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
        ini_set('memory_limit', '2048M');
        if ($thumbnail == 1) {
            if ($request->hasFile($name)) {
                $img = $request->file($name);
                $destinationPath = public_path('/assets/admin/' . $path . '/thumbnails');
                if (is_array($img)) {
                    foreach ($img as $key => $val1) {
                        if (is_array($val1) && count($val1) > 0) {
                            foreach ($val1 as $vk => $v1) {
                                $image_name = pathinfo($v1->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                                $image_name = preg_replace('/[^a-z0-9\.]/i', "-", $image_name);
                                $resize_image = Image::make($v1->getRealPath());
                                $resize_image->resize(150, 150, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->encode('webp')->save($destinationPath . '/' . $image_name);
                            }
                        } else {
                            $image_name = pathinfo($val1->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                            $image_name = preg_replace('/[^a-z0-9\.]/i', "-", $image_name);
                            $resize_image = Image::make($val1->getRealPath());
                            $resize_image->resize(150, 150, function ($constraint) {
                                $constraint->aspectRatio();
                            })->encode('webp')->save($destinationPath . '/' . $image_name);
                        }
                    }
                } else {
                    $image_name = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                    $image_name = preg_replace('/[^a-z0-9\.]/i', "-", $image_name);
                    $resize_image = Image::make($img->getRealPath());
                    $resize_image->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('webp')->save($destinationPath . '/' . $image_name);
                }
            }
        }
        if ($request->hasFile($name)) {
            $file = [];
            $image = $request->file($name);
            if (is_array($image)) {
                $path = public_path('/assets/admin/' . $path);
                foreach ($image as $key => $val) {
                    if (is_array($val) && count($val) > 0) {
                        foreach ($val as $vk => $vv) {
                            $filename = pathinfo($vv->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                            $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                            $filename = str_replace(' ', '-', $filename);
                            $vv->move($path, $filename);
                            $file[$key][] = $filename;
                        }
                    } else {
                        $filename = pathinfo($val->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                        $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                        $filename = str_replace(' ', '-', $filename);
                        $val->move($path, $filename);
                        $file[] = $filename;
                    }
                }
            } else {
                $path = public_path('/assets/admin/' . $path);
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                $filename = str_replace(' ', '-', $filename);
                $image->move($path, $filename);
                $file[] = $filename;
            }
        }
        if (isset($file) && count($file) > 0) {
            return $file;
        } else {
            return 0;
        }
    }
    public function flashmessage($msg, $status = 1)
    {
        $toastr = '';
        if ($status == 0) {
            $toastr = "toastr.success('$msg');";
        } else {
            $toastr = "toastr.error('$msg');";
        }
        Session::flash('message', $toastr);
    }
    public function emailsend($sendemail, $title, $msg, $attachment = '')
    {
        $websetting = websetting::first();
        $config = array(
            'driver' => 'smtp',
            'host' => $websetting->smtp_host,
            'port' => $websetting->smtp_port,
            'from' => array('address' => $websetting->from, 'name' => '${APP_NAME}'),
            'encryption' => $websetting->smtp_crypto,
            'username' => $websetting->smtp_user,
            'password' => $websetting->smtp_password,
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        );
        Config::set('mail', $config);

        $msgre = $msg;
        Mail::html($msgre, function ($message) use ($sendemail, $title, $attachment, $websetting) {
            $message->from($websetting->from);
            $message->to($sendemail)->subject($title);

            // Attach files if there are any
            if (!empty($attachment)) {
                foreach ($attachment as $file) {
                    $message->attach($file);
                }
            }
        });

        return redirect()->back();
    }
    public function fetchAndStoreCountries()
    {
        $client = new Client([
            'verify' => false,
        ]);

        $response = $client->get('https://countriesnow.space/api/v0.1/countries/positions', [
            'headers' => [
                'Content-Type' => 'application/json',  // Use 'application/json' for JSON APIs
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            $errorDetails = $response->getBody()->getContents();
            return response()->json([
                'error' => 'Failed to fetch data from the API.',
                'status_code' => $response->getStatusCode(),
                'details' => $errorDetails,
            ], 500);
        }

        $responseJson = json_decode($response->getBody()->getContents(), true);
        $countriesData = $responseJson['data'];

        foreach ($countriesData as $val) {
            country::firstOrCreate(
                ['country_name' => $val['name']], // Check if state exists
                ['country_name' => $val['name']]  // Create if it doesn't exist
            );
        }

        return response()->json(['success' => 'Data successfully inserted into the database.']);
    }
    public function fetchAndStoreStates($restart = false)
    {
        set_time_limit(300); // Time in seconds
        $client = new Client([
            'verify' => false, // Disables SSL verification (optional)
        ]);

        $limit = 10; // Number of states to process per batch

        // If the restart flag is passed, clear the cache and reset the offset
        if ($restart) {
            Cache::forget('fetch_states_offset'); // Clear the cached offset
            $currentOffset = 0; // Start from the beginning
        } else {
            // Retrieve the current offset from the cache or start from 0
            $currentOffset = Cache::get('fetch_states_offset', 0);
        }

        // Fetch a chunk of states using the current offset and limit
        $countryChunk = country::skip($currentOffset)->take($limit)->get();

        // Check if there are any states left to process
        if ($countryChunk->isEmpty()) {
            return response()->json(['message' => 'No more country to process'], 200);
        }

        // Create an array to track the countries successfully processed
        $successfulCountries = [];
        $failedCountries = [];

        foreach ($countryChunk as $key => $value) {
            try {
                $response = $client->post('https://countriesnow.space/api/v0.1/countries/states', [
                    'form_params' => ['country' => $value->country_name],
                    'headers' => ['Content-Type' => 'application/x-www-form-urlencoded'],
                ]);

                // Check if the response status code is 200
                if ($response->getStatusCode() !== 200) {
                    $errorDetails = $response->getBody()->getContents();
                    \Log::error('Failed to fetch data from API for country: ' . $value->country_name . ' - ' . $errorDetails);
                    $failedCountries[] = $value->country_name; // Track failed states
                    continue; // Skip to the next state
                }

                // Decode the JSON response
                $responseJson = json_decode($response->getBody()->getContents(), true);

                // Check if the API response contains state data
                if (isset($responseJson['data']) && is_array($responseJson['data'])) {
                    $statesData = $responseJson['data']['states'];

                    // Loop through the state data and insert into the database
                    foreach ($statesData as $stateName) {
                        state::firstOrCreate(
                            [
                                'state_name' => $stateName['name'],
                                'country_id' => $value->id, // Use dynamic state ID
                            ]
                        );
                    }

                    $successfulCountries[] = $value->country_name; // Track successful states
                } else {
                    \Log::error('Invalid data format from API for country: ' . $value->country_name);
                    $failedCountries[] = $value->country_name;
                    continue; // Skip to the next state
                }
            } catch (\Exception $e) {
                \Log::error('An error occurred while fetching state for countries: ' . $value->country_name . ' - ' . $e->getMessage());
                $failedCountries[] = $value->country_name;
                continue; // Skip to the next state
            }
        }

        // Log the results after processing all countries
        \Log::info('Successfully processed countries: ' . implode(', ', $successfulCountries));
        \Log::info('Failed to process countries: ' . implode(', ', $failedCountries));

        // Update the offset for the next batch
        $newOffset = $currentOffset + $limit;
        Cache::put('fetch_cities_offset', $newOffset);

        // Return success or failure message after all states are processed
        return response()->json([
            'success' => 'Countries successfully inserted into the database for all states.',
            'successful_countries' => $successfulCountries,
            'failed_countries' => $failedCountries,
            'next_offset' => $newOffset,
        ]);
    }
    public function fetchAndStoreCities($restart = false)
    {
        set_time_limit(300); // Time in seconds

        $client = new Client([
            'verify' => false, // Disables SSL verification (optional)
        ]);

        $limit = 100; // Number of states to process per batch

        // If the restart flag is passed, clear the cache and reset the offset
        if ($restart) {
            Cache::forget('fetch_cities_offset'); // Clear the cached offset
            $currentOffset = 0; // Start from the beginning
        } else {
            // Retrieve the current offset from the cache or start from 0
            $currentOffset = Cache::get('fetch_cities_offset', 0);
        }

        // Fetch a chunk of states using the current offset and limit
        $stateChunk = state::with('country')->skip($currentOffset)->take($limit)->get();

        // Check if there are any states left to process
        if ($stateChunk->isEmpty()) {
            return response()->json(['message' => 'No more states to process'], 200);
        }

        // Arrays to track the states successfully processed and failed
        $successfulStates = [];
        $failedStates = [];

        foreach ($stateChunk as $value) {
            try {
                $response = $client->post('https://countriesnow.space/api/v0.1/countries/state/cities', [
                    'form_params' => [
                        'country' => $value->country->country_name, // Dynamic country name
                        'state' => $value->state_name, // Dynamic state name
                    ],
                    'headers' => [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                    ],
                ]);

                // Check if the response status code is 200
                if ($response->getStatusCode() !== 200) {
                    $errorDetails = $response->getBody()->getContents();
                    \Log::error('Failed to fetch data from API for state: ' . $value->state_name . ' - ' . $errorDetails);
                    $failedStates[] = $value->state_name; // Track failed states
                    continue; // Skip to the next state
                }

                // Decode the JSON response
                $responseJson = json_decode($response->getBody()->getContents(), true);

                // Check if the API response contains city data
                if (isset($responseJson['data']) && is_array($responseJson['data'])) {
                    $citiesData = $responseJson['data'];

                    // Loop through the city data and insert into the database
                    foreach ($citiesData as $cityName) {
                        city::firstOrCreate(
                            [
                                'city_name' => $cityName,
                                'state_id' => $value->id, // Dynamic state ID
                                'country_id' => $value->country_id, // Dynamic country ID
                            ]
                        );
                    }

                    $successfulStates[] = $value->state_name; // Track successful states
                } else {
                    \Log::error('Invalid data format from API for state: ' . $value->state_name);
                    $failedStates[] = $value->state_name;
                    continue; // Skip to the next state
                }
            } catch (\Exception $e) {
                \Log::error('An error occurred while fetching cities for state: ' . $value->state_name . ' - ' . $e->getMessage());
                $failedStates[] = $value->state_name;
                continue; // Skip to the next state
            }
        }

        // Log the result for this batch
        \Log::info('Successfully processed states: ' . implode(', ', $successfulStates));
        \Log::info('Failed to process states: ' . implode(', ', $failedStates));

        // Update the offset for the next batch
        $newOffset = $currentOffset + $limit;
        Cache::put('fetch_cities_offset', $newOffset);

        // Return success or failure message for the processed batch
        return response()->json([
            'success' => 'Cities successfully inserted into the database for this batch.',
            'successful_states' => $successfulStates,
            'failed_states' => $failedStates,
            'next_offset' => $newOffset, // Provide the next offset for reference
        ]);
    }
}
