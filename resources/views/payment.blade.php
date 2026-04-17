@extends('app')
@section('body')
    <style>
        .nice-select {
            float: none;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            height: auto;
        }

        .nice-select .list {
            width: 100%
        }
    </style>
    <section class="s-py-100 store-section">
        <div class="container">
            <div class="section-title">
                <div class="star-group">
                    <i class="icofont-game-pad"></i>
                    <i class="icofont-game-pad"></i>
                    <i class="icofont-game-pad"></i>
                </div>
                <div class="title">
                    <div class="span-group">
                        <span></span>
                        <span></span>
                    </div>
                    <h1>{{ $store->name }} – {{ ucfirst($store->store_type) }} Store</h1>
                    <div class="span-group span-group-right">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <p>Secure Payment Portal</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="game-card p-5 rounded-4 shadow-lg">
                        <form method="POST" action="{{ url('/create-checkout-session') }}" class="paymentform">
                            @csrf

                            <input type="hidden" name="store_type" value="{{ $store->store_type }}">
                            <input type="hidden" name="store_id" value="{{ $store->id }}">
                            <input type="hidden" name="full_mobile" id="full_mobile">
                            <input type="hidden" name="timezone" id="store_timezone">

                            @if (isset($store) && $store->store_type != 'online')
                                <div class="form-group mb-3">
                                    <label class="form-label">Platform Name</label>
                                    <select name="platform_id" class="form-control" id="platform_id" required>
                                        <option value="">-- Choose Platform --</option>
                                        @foreach ($platforms as $platform)
                                            <option value="{{ $platform->id }}">{{ $platform->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif

                            <!-- ✅ MOBILE (REQUIRED) -->
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Mobile No
                                </label>
                                <input type="text" id="mobile" name="customer_mobile"
                                    class="form-control phone_validate piintl_mobile" placeholder="Enter Mobile Number"
                                    required>
                                <input type="hidden" name="customer_countrycode" id="picountry_code">
                            </div>

                            <!-- ✅ EMAIL (OPTIONAL) -->
                            <div class="form-group mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text text-warning border-0">
                                        <i class="icofont-email"></i>
                                    </span>
                                    <input type="email" name="customer_email" class="form-control"
                                        placeholder="Enter email">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label">Name</label>
                                <div class="input-group">
                                    <span class="input-group-text text-warning border-0">
                                        <i class="icofont-user"></i>
                                    </span>
                                    <input type="text" name="customer_username" class="form-control"
                                        placeholder="Enter Name" required>
                                </div>
                            </div>

                            @if (isset($store) && $store->store_type != 'online')
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Mobile Id
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text text-warning border-0">
                                            <i class="icofont-phone"></i>
                                        </span>
                                        <input type="text" name="customer_mobileid" class="form-control"
                                            placeholder="Enter mobile id">
                                    </div>
                                </div>
                            @endif

                            <!-- Amount Field -->
                            <div class="form-group mb-5">
                                <label class="form-label">
                                    Enter Amount
                                </label>

                                <div class="input-group">
                                    <span class="input-group-text text-warning border-0">
                                        $
                                    </span>
                                    <input type="text" name="amount" id="amount" class="form-control border-1"
                                        placeholder="Enter payment amount" required min="10" maxlength="10">
                                </div>
                            </div>

                            <!-- Pay Button -->
                            <div class="text-center mt-3">
                                <button type="submit" name="payment_method" value="stripe"
                                    class="btn btn-lg br-5 w-100 text-center align-items-center justify-content-center">
                                    <i class="icofont-stripe me-2 fs-5"></i>
                                    Pay
                                </button>
                            </div>

                            {{-- ══════════════════════════════════════
                                PAYPAL SECTION
                                Separate from the Stripe form.
                                PayPal JS SDK renders buttons here.
                                Clicking PayPal/Venmo → validates form
                                → opens PayPal modal → captures via AJAX
                                → redirects to success/cancel page
                            ══════════════════════════════════════ --}}
                            {{-- Divider --}}
                            {{-- <div class="d-flex align-items-center my-3 text-muted small">
                                <hr class="flex-grow-1"> <span class="px-2">or</span>
                                <hr class="flex-grow-1">
                            </div> --}}

                            {{-- PayPal SDK renders its own styled buttons inside this div. Do NOT wrap in a <form> — PayPal SDK manages its own flow. --}}
                            {{-- <button type="submit" name="payment_method" value="paypal"
                                class="btn btn-lg br-5 w-100 text-center align-items-center justify-content-center"
                                id="custom-paypal-btn">
                                <i class="icofont-paypal me-2"></i>
                                Pay with PayPal
                            </button> --}}

                            {{-- <div id="paypal-button-container" class="text-center mt-3"></div>
                            <div id="venmo-button" class="text-center mt-3"></div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    {{-- <script
        src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=USD&intent=capture&components=buttons,funding-eligibility&enable-funding=venmo,card&disable-funding=paylater,credit">
    </script> --}}

    <script>
        $(document).ready(function() {
            const BASE_URL = "{{ url('/') }}";

            // -----------------------------
            // 1️⃣ Amount Input Validation
            // -----------------------------
            $('#amount').on('input', function() {
                let val = $(this).val();
                val = val.replace(/[^0-9.]/g, ''); // allow numbers and dot
                if ((val.match(/\./g) || []).length > 1) {
                    val = val.substring(0, val.length - 1);
                }
                $(this).val(val);
            });

            // Custom validation rule for positive decimal
            $.validator.addMethod("positiveDecimal", function(value, element) {
                return this.optional(element) ||
                    (/^\d+(\.\d{1,2})?$/.test(value) && parseFloat(value) > 0);
            }, "Please enter valid amount");

            // -----------------------------
            // 2️⃣ International Phone
            // -----------------------------
            const staffinput = document.querySelector("#mobile");
            const staffcountryCodeInput = document.querySelector("#picountry_code");
            if (staffinput && staffcountryCodeInput) {
                const popupiti = window.intlTelInput(staffinput, {
                    utilsScript: "{{ asset('assets') }}/admin/js/forms/utils.js",
                    initialCountry: "auto",
                    separateDialCode: true,
                    geoIpLookup: function(callback) {
                        fetch("https://ipapi.co/json")
                            .then(response => response.json())
                            .then(data => callback(data.country_code))
                            .catch(() => callback("us"));
                    },
                    showSelectedDialCode: true,
                });
                staffinput.addEventListener('countrychange', function() {
                    staffcountryCodeInput.value = popupiti.getSelectedCountryData().dialCode;
                });
                staffcountryCodeInput.value = popupiti.getSelectedCountryData().dialCode;

                // ALWAYS STORE FULL NUMBER
                function updateFullNumber() {
                    staffcountryCodeInput.value = popupiti.getSelectedCountryData().dialCode;
                    document.querySelector("#full_mobile").value = popupiti.getNumber();
                }

                // update on change
                staffinput.addEventListener("blur", updateFullNumber);

                // optional realtime cleanup
                staffinput.addEventListener("input", function() {
                    this.value = this.value.replace(/[^\d+]/g, '');
                });

                $.validator.addMethod('pCheckCountryCode', function(value, element) {
                    return popupiti.isValidNumber();
                }, "Please enter valid mobile number");

                // document.getElementById("store_timezone").value = Intl.DateTimeFormat().resolvedOptions().timeZone;
                document.getElementById("store_timezone").value = 'America/Chicago'; // Set a default timezone for testing

            }

            // -----------------------------
            // 3️⃣ Form Validation
            // -----------------------------
            let isOnlineStore = "{{ $store->store_type }}" === "online";

            $('#platform_id').on('change', function() {
                $(this).removeClass('error'); // remove error class
                $(this).valid(); // revalidate
            });

            $.validator.addMethod("minAmount", function(value, element) {
                let amount = parseFloat(value);
                return this.optional(element) || (!isNaN(amount) && amount >= 10);
            }, "Minimum amount is $10");

            $('.paymentform').validate({
                ignore: ":hidden:not(#platform_id)",
                rules: {
                    customer_mobile: {
                        required: !isOnlineStore,
                        pCheckCountryCode: !isOnlineStore,
                    },
                    customer_username: {
                        required: !isOnlineStore
                    },
                    customer_email: {
                        email: true
                    },
                    amount: {
                        required: true,
                        positiveDecimal: true,
                        minAmount: true,
                        min: 10
                    },
                    platform_id: {
                        required: !isOnlineStore,
                    }
                },
                messages: {
                    customer_mobile: {
                        required: "Please enter mobile number",
                        pCheckCountryCode: "Please enter valid mobile number",
                    },
                    customer_username: {
                        required: "Enter username"
                    },
                    amount: {
                        required: "Please Enter Amount",
                        minAmount: "Minimum amount is $10",
                        min: "Minimum amount is $10"
                    },
                    platform_id: {
                        required: "Please select a Platform"
                    }
                },
                errorClass: "text-danger",
                errorPlacement: function(error, element) {
                    if (element.attr("name") == "platform_id") {
                        error.insertAfter(element.next('.nice-select'));
                    } else if (element.closest('.input-group').length) {
                        error.insertAfter(element.closest('.input-group'));
                    } else if (element.attr("name") == "customer_mobile") {
                        error.insertAfter($("#picountry_code"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                submitHandler: function(form) {
                    let amount = parseFloat($('#amount').val());

                    if (isNaN(amount) || amount < 10) {
                        alert('Minimum amount is $10');
                        return false;
                    }

                    form.submit();
                }
            });

            // -----------------------------
            // 4️⃣ PayPal Button Integration
            // -----------------------------
            let paypalButtonRendered = false;
            let processing = false;

            const paypalButtons = paypal.Buttons({
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect',
                    label: 'paypal'
                },
                disableFunding: ['paylater', 'credit'],
                createOrder: function(data, actions) {
                    let amount = parseFloat($('#amount').val());

                    if (amount < 10) {
                        alert('Minimum amount is $10');
                        return;
                    }

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: amount.toFixed(2)
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    processing = true;
                    $('#custom-paypal-btn').prop('disabled', true).text('Processing...');

                    return actions.order.capture().then(function(details) {
                        let formData = {
                            orderID: data.orderID,
                            amount: $('#amount').val(),
                            customer_mobile: $('#mobile').val(),
                            full_mobile: $('#full_mobile').val(),
                            customer_countrycode: $('#picountry_code').val(),
                            customer_email: $('[name="customer_email"]').val(),
                            customer_username: $('[name="customer_username"]').val(),
                            customer_mobileid: $('[name="customer_mobileid"]').val(),
                            store_id: $('[name="store_id"]').val(),
                            platform_id: $('[name="platform_id"]').val(),
                            store_type: $('[name="store_type"]').val(),
                            timezone: $('[name="timezone"]').val(),
                            _token: '{{ csrf_token() }}'
                        };

                        return $.ajax({
                            url: "{{ url('/paypal-capture') }}",
                            type: 'POST',
                            data: formData
                        }).done(function(res) {
                            if (res.status === 'success') {
                                window.location.href = res.redirect;
                            } else {
                                alert(res.message || 'Payment save failed');
                                processing = false;
                                $('#custom-paypal-btn').prop('disabled', false).text(
                                    'Pay with PayPal');
                            }
                        }).fail(function() {
                            alert('Server error');
                            processing = false;
                            $('#custom-paypal-btn').prop('disabled', false).text(
                                'Pay with PayPal');
                        });
                    });
                },
                // // ── Customer clicked Cancel inside PayPal modal ───────
                // onCancel: function(data) {
                //     window.location.href = BASE_URL + '/payment-cancel?reason=cancelled';
                // },
                // ── PayPal SDK error ───────────────────────────────────
                onError: function(err) {
                    console.error('PayPal SDK error:', err);
                    processing = false;
                    $('#custom-paypal-btn').prop('disabled', false).text('Pay with PayPal');
                }
            });

            // Hide the SDK container
            $('#paypal-button-container').hide();

            // Custom button click
            $('#custom-paypal-btn').click(function(e) {
                e.preventDefault();

                if (processing) return; // Already processing
                if (!$('.paymentform').valid()) return;

                // Check if the payment was already completed
                $(this).hide();
                // let orderId = $('#custom-paypal-btn').data('order-id');
                // if (orderId) {
                //     // Redirect immediately if already completed
                //     window.location.href = "{{ url('payment-success') }}?token=" + orderId;
                //     return;
                // }

                // Show PayPal button and render only once
                if (!paypalButtonRendered) {
                    $('#paypal-button-container').show();
                    paypalButtons.render('#paypal-button-container');
                    paypalButtonRendered = true;
                }

                // Programmatically click the SDK button
                $('#paypal-button-container .paypal-button').click();
            });

            // ==============================
            // ✅ VENMO INTEGRATION (ADD THIS)
            // ==============================
            const venmoButtons = paypal.Buttons({
                fundingSource: paypal.FUNDING.VENMO,
                style: {
                    layout: 'vertical',
                    color: 'blue',
                    shape: 'rect',
                    label: 'venmo'
                },
                disableFunding: ['paylater', 'credit'],
                createOrder: function(data, actions) {
                    let amount = parseFloat($('#amount').val());

                    if (amount < 10) {
                        alert('Minimum amount is $10');
                        return;
                    }

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: amount.toFixed(2)
                            }
                        }]
                    });
                },
                onApprove: function(data, actions) {
                    processing = true;

                    return actions.order.capture().then(function(details) {

                        let formData = {
                            orderID: data.orderID,
                            amount: $('#amount').val(),
                            customer_mobile: $('#mobile').val(),
                            full_mobile: $('#full_mobile').val(),
                            customer_countrycode: $('#picountry_code').val(),
                            customer_email: $('[name="customer_email"]').val(),
                            customer_username: $('[name="customer_username"]').val(),
                            customer_mobileid: $('[name="customer_mobileid"]').val(),
                            store_id: $('[name="store_id"]').val(),
                            platform_id: $('[name="platform_id"]').val(),
                            store_type: $('[name="store_type"]').val(),
                            timezone: $('[name="timezone"]').val(),
                            _token: '{{ csrf_token() }}'
                        };

                        return $.ajax({
                            url: "{{ url('/paypal-capture') }}",
                            type: 'POST',
                            data: formData
                        }).done(function(res) {
                            if (res.status === 'success') {
                                window.location.href = res.redirect;
                            } else {
                                alert(res.message || 'Payment failed');
                                processing = false;
                                $('#custom-paypal-btn').prop('disabled', false).text(
                                    'Pay with PayPal');
                            }
                        }).fail(function() {
                            alert('Server error');
                            processing = false;
                            $('#custom-paypal-btn').prop('disabled', false).text(
                                'Pay with PayPal');
                        });
                    });
                },
                onError: function(err) {
                    console.error('Venmo error:', err);
                    processing = false;
                    $('#custom-paypal-btn').prop('disabled', false).text('Pay with PayPal');
                }
            });

            // ✅ Only render if eligible
            if (venmoButtons.isEligible()) {
                venmoButtons.render('#venmo-button');
            } else {
                $('#venmo-button').hide();
            }
        });
    </script>
@endsection
