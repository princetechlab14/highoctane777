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

    <title>Forgot Password</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets') }}/{{ isset($websetting->favicon) && $websetting->favicon != '' ? $websetting->favicon : '' }}"
            alt="loader" class="lds-ripple img-fluid">
    </div>
    <div id="main-wrapper" class="auth-customizer-none">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                        <div class="card mb-0">
                            <div class="card-body pt-5">
                                <a href="index-1.html" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                                    <img src="{{ asset('assets') }}/{{ $websetting->hlogo ?? '' }}"
                                        class="dark-logo w-100" alt="Logo-Dark">
                                    <img src="{{ asset('assets') }}/{{ $websetting->hlogo ?? '' }}"
                                        class="light-logo w-100" alt="Logo-light">
                                </a>
                                <div class="mb-5 text-center">
                                    <p class="mb-0 ">
                                        Please enter the email address associated with your account and We will email
                                        you a link to reset
                                        your password.
                                    </p>
                                </div>
                                <form action="{{ url('/admin/forgotpassword') }}" method="POST"
                                    id="forgotpasswordform">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 mb-3 submitforgotpassword">Send
                                        Reset Link</button>
                                    <a href="{{ url('admin/login') }}"
                                        class="btn bg-primary-subtle text-primary w-100 py-8">Back to
                                        Login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Import Js Files -->
    <script src="{{ asset('assets') }}/admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/admin/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/admin/js/theme/app.init.js"></script>
    <script src="{{ asset('assets') }}/admin/js/theme/theme.js"></script>
    <script src="{{ asset('assets') }}/admin/js/theme/app.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- jquery-validation -->
    <script src="{{ asset('assets') }}/admin/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <!-- toastr  -->
    <script src="{{ asset('assets') }}/admin/js/plugins/toastr-init.js"></script>
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
            $("#forgotpasswordform").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email"
                    }
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element); // Trigger validation after trimming spaces
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
