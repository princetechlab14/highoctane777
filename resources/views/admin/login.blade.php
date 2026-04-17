@php
    $websetting = \DB::table('websetting')->where('id', 1)->first();
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('assets') }}/{{ isset($websetting->favicon) && $websetting->favicon != '' ? $websetting->favicon : '' }}">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/styles-1.css">
    <title>Admin Panel Login</title>
    <style>
        .error {
            color: red;
        }

        .password-group {
            position: relative;
        }

        .password-group .toggle-password {
            position: absolute;
            right: 15px;
            top: 13px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets') }}/{{ $websetting->hlogo ?? '' }}" alt="loader"
            class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper" class="auth-customizer-none">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                    <img src="{{ asset('assets') }}/{{ $websetting->hlogo ?? '' }}"
                                        class="dark-logo w-100" alt="Logo-Dark">
                                    <img src="{{ asset('assets') }}/{{ $websetting->hlogo ?? '' }}"
                                        class="light-logo w-100" alt="Logo-light">
                                </a>
                                <form action="javascript:void(0);" method="post" id="login"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="timezone" id="timezone">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email or Username</label>
                                        <input type="text" class="form-control" placeholder="Email or Username"
                                            name="email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Password</label>
                                        <div class="password-group">
                                            <input type="password" class="form-control password" name="password"
                                                placeholder="Enter Password" id="password">
                                            <span class="fa fa-eye toggle-password" toggle="#password"></span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <a class="text-primary fw-medium"
                                            href="{{ url('admin/forgotpassword') }}">Forgot
                                            Password ?</a>
                                    </div>
                                    <button type="submit" id="submit"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Import Js Files -->
        <script src="{{ asset('assets') }}/admin/js/vendor.min.js"></script>
        <script src="{{ asset('assets') }}/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets') }}/admin/libs/simplebar/dist/simplebar.min.js"></script>
        <script src="{{ asset('assets') }}/admin/js/theme/app.init.js"></script>
        <script src="{{ asset('assets') }}/admin/js/theme/theme.js"></script>
        <script src="{{ asset('assets') }}/admin/js/theme/app.min.js"></script>
        <script src="{{ asset('assets') }}/admin/js/plugins/toastr-init.js"></script>
        <script src="{{ asset('assets') }}/admin/libs/jquery-validation/dist/jquery.validate.min.js"></script>

        <script>
            toastr.options = {
                'closeButton': true,
            };
            @if (Session::has('message'))
                {!! Session::get('message') !!}
            @endif
        </script>
        <script>
            $(document).ready(function() {
                // document.getElementById('timezone').value = Intl.DateTimeFormat().resolvedOptions().timeZone
                document.getElementById('timezone').value = 'America/Chicago'; // Set a default timezone for testing

                $('body').on('click', '.toggle-password', function() {
                    $(this).toggleClass("fa-eye fa-eye-slash"); // Toggle between eye and eye-slash icons
                    var input = $($(this).attr("toggle")); // Select the associated input field
                    if (input.attr("type") == "password") {
                        input.attr("type", "text"); // Show the password
                    } else {
                        input.attr("type", "password"); // Hide the password
                    }
                });
            });
        </script>
        <script>
            $(document).ready(function() {

                // $.validator.addMethod("customemail", function(value, element) {
                //     if (/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value)) {
                //         return true; // Valid email format
                //     } else if (/^[0-9]{10}$/.test(value)) {
                //         return true; // Valid 10 tp 13 digit mobile number format
                //     } else {
                //         return false;
                //     }
                // }, "Please enter a valid email or mobile number");
                $.validator.addMethod("emailOrUsername", function(value, element) {
                    var emailPattern = /^\w+([-.+']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
                    var usernamePattern = /^[a-zA-Z0-9_.-]{3,20}$/;

                    return emailPattern.test(value) || usernamePattern.test(value);
                }, "Please enter a valid email or username");

                $('#login').validate({
                    rules: {
                        email: {
                            required: true,
                            emailOrUsername: true,
                        },
                        password: {
                            required: true,
                        },
                    },
                    messages: {
                        email: {
                            required: "Please enter email or username",
                            emailOrUsername: "Please enter a valid email or username",
                        },
                        password: {
                            required: "Please enter password",
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    submitHandler: function(form) {
                        $('#submit').html('Please wait...');
                        $("#submit").attr("disabled", true);

                        $.ajax({
                            url: "{{ url('/admin/logincheck') }}",
                            type: "POST",
                            dataType: "json",
                            data: $('#login').serialize(),
                            success: function(response) {
                                $('#submit').html('Login');
                                $("#submit").attr("disabled", false);
                                if (response.success) {
                                    window.location.href = response.redirect_url;
                                    document.getElementById("dashboard").reset();
                                } else {
                                    toastr.error(response.message);
                                }
                            }
                        });
                    }
                });
            });
        </script>
    </div>

</body>

</html>
