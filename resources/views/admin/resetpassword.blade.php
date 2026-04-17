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
    <title>Reset Password</title>
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
                                <form action="{{ url('admin/forgotpassword') }}/{{ $token }}" method="post"
                                    id="resetpasswordform" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="n_password" class="form-label">New Password</label>
                                        <div class="password-group">
                                            <input type="text" class="form-control password"
                                                placeholder="Enter New Password" name="n_password" id="n_password">
                                            <span class="fa fa-eye toggle-password" toggle="#n_password"></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <div class="password-group">
                                            <input type="password" class="form-control password" name="c_password"
                                                placeholder="Retype New Password" id="c_password">
                                            <span class="fa fa-eye toggle-password" toggle="#c_password"></span>
                                        </div>
                                    </div>
                                    <button type="submit" id="submit"
                                        class="btn btn-primary w-100 py-8 mb-4 rounded-2">Reset</button>
                                </form>
                            </div>
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
            $('#resetpasswordform').validate({
                rules: {
                    n_password: {
                        required: true,
                    },
                    c_password: {
                        required: true,
                        equalTo: "#n_password",
                    },
                },
                messages: {
                    n_password: {
                        required: "Please enter new password",
                    },
                    c_password: {
                        required: "Please enter confirm password",
                        equalTo: "Password and new password does not match",
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                submitHandler: function(form) {
                    $(form).find(':submit').prop('disabled', true).text('Submitting...');
                    form.submit();
                }
            });
        });
    </script>

</body>

</html>
