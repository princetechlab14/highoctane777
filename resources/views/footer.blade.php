<!-- Footer Area Start Here -->
@php
    $websetting = DB::table('websetting')->where('id', 1)->first();
    $emailinfo = DB::table('emailinfo')->get();
    $contactinfo = DB::table('contactinfo')->get();
    $socialmedia = DB::table('socialmedia')->get();
@endphp
<footer class="footer-area s-py-100 overlay ">
    <div class="bg background-img">
        <img class="top-bottom" src="{{ asset('public/Assets/User') }}/img/bg/footer-bg.jpg" alt="Footer Img"
            title="Footer Img" loading="lazy">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-12 col-sm-6 footerlogo">
                <div class="footer-intro">
                    <div class="logo">
                        <img src="{{ asset('public/Assets/logo.png') }}" alt="Logo" title="Logo" loading="lazy">
                    </div>
                    @if (isset($websetting->footer_content) && !empty($websetting->footer_content))
                        <p>
                            {{ $websetting->footer_content }}
                        </p>
                    @endif
                    @if (isset($socialmedia) && count($socialmedia) > 0)
                        <h6>Follow Us & stay update</h6>
                        <div class="social-group">
                            @foreach ($socialmedia as $val)
                                <a href="{{ $val->link }}" target="_blank"><i class="{{ $val->icon }}"></i></a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-info">
                    <div class="footer-title">
                        <h5>Useful Links</h5>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="{{ url('/') }}/#hero">Home</a></li>
                            <li><a href="{{ url('/') }}/#about">About</a></li>
                            <li><a href="{{ url('/') }}/#store">Store</a></li>
                            <li><a href="{{ url('/') }}/#gallery">Gallery</a></li>
                            <li><a href="{{ url('/') }}/#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="footer-info">
                    <div class="footer-title">
                        <h5>Our Policies</h5>
                    </div>
                    <div class="footer-list">
                        <ul>
                            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
                            <li><a href="{{ url('/disclaimer') }}">Disclaimer</a></li>
                            <li class="terms"><a href="{{ url('/terms-conditions') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="footer-sitemap">
                    <div class="footer-title">
                        <h5>Contact Us</h5>
                    </div>
                    <div class="footer-list">
                        @if (isset($contactinfo) && count($contactinfo) > 0)
                            <div class="mb-3">
                                <ul>
                                    @foreach ($contactinfo as $val)
                                        <li><i class="icofont-ui-call"></i> {{ '+' . $val->country_code }}
                                            {{ $val->mobile_no }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($emailinfo) && count($emailinfo) > 0)
                            <div class="mb-3">
                                <ul>
                                    @foreach ($emailinfo as $val)
                                        <li><i class="icofont-email"></i> {{ $val->email }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (isset($websetting->address) && !empty($websetting->address))
                            <div>
                                <p><i class="icofont-location-pin"></i> {{ $websetting->address }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
{{-- <footer class="footer-area s-py-50 overlay bg-dark text-white">
    <div class="container">
        <div class="row align-items-center text-center text-lg-start">
            <div class="col-lg-4 col-md-4 col-sm-12 mb-3 mb-lg-0 d-flex justify-content-center">
                <ul class="nav justify-content-center gap-3">
                    <li class="nav-item"><a href="#hero" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link text-white">About</a></li>
                    <li class="nav-item"><a href="#store" class="nav-link text-white">Store</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link text-white">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center mb-3 mb-lg-0 footer-intro  me-0">
                <div class="logo">
                    <img src="{{ asset('public/Assets/User') }}/img/logo/logo.svg" alt="logo">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 d-flex justify-content-center gap-3">
                <a href="#" class="text-white fs-5"><i class="icofont-facebook"></i></a>
                <a href="#" class="text-white fs-5"><i class="icofont-twitter"></i></a>
                <a href="#" class="text-white fs-5"><i class="icofont-instagram"></i></a>
            </div>
        </div>
    </div>
</footer> --}}
<div class="copy-right">
    <p>Copyright &copy; {{ date('Y') }} High Octane. All Rights Reserved.</p>
</div>
<!-- Footer Area End Here -->

<!-- Footer script-->
<script src="{{ asset('public/Assets/User') }}/js/scripts.js"></script>
<script src="{{ asset('public/Assets/User') }}/js/jquery.validate.min.js"></script>
<script src="{{ asset('public/Assets/User') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('public/Assets/User') }}/js/toastr.min.js"></script>
<!-- intlTelInput -->
<script src="{{ asset('public/Assets') }}/Admin/js/forms/intlTelInput.min.js"></script>

<script>
  document.querySelectorAll('.main-menu ul li a').forEach(link => {
    link.addEventListener('click', () => {
      // Assuming 'active' class shows the menu:
      const menu = document.querySelector('.main-menu');
      if (menu.classList.contains('active')) {
        menu.classList.remove('active');
      }
    });
  });
</script>
<script>
    toastr.options = {
        'closeButton': true,
    };
    @if (Session::has('message'))
        {!! Session::get('message') !!}
    @endif
</script>
<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    $(document).ready(function() {
        // document.getElementById("contacttimezone").value = Intl.DateTimeFormat().resolvedOptions().timeZone;
        document.getElementById("contacttimezone").value = 'America/Chicago'; // Set a default timezone for testing

        // Phone number validation
        $(document).on("keypress keyup blur", ".phone_validate", function(event) {
            $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });

        // Apply jQuery validate separately to each form
        $('.getintouch').each(function() {
            $(this).validate({
                rules: {
                    name: {
                        required: true
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 15,
                        number: true,
                    },
                    email: {
                        required: false,
                        email: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please Enter Name"
                    },
                    mobile: {
                        required: "Please Enter Mobile Number",
                        minlength: "Phone number must be of 10 digits",
                        maxlength: "Please enter Phone number less than 15",
                    },
                    email: {
                        required: "Please Enter Email",
                        email: "Email must be a valid email address",
                    },
                },
                submitHandler: function(form) {
                    let submitBtn = $(form).find(".submit-btn"); // correct button
                    let formData = new FormData(form);

                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content")
                        }
                    });

                    // Button loading state
                    submitBtn.html("Please Wait...");
                    submitBtn.prop("disabled", true);

                    $.ajax({
                        url: "{{ url('sendmessage') }}",
                        type: "POST",
                        dataType: "json",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            submitBtn.prop("disabled", false);

                            var formType = form.querySelector(
                                "input[name='form_type']").value;

                            if (formType === "1") {
                                $(submitBtn).html('Contact Us');
                            } else {
                                $(submitBtn).html('Submit Query');
                            }

                            if (response.success) {
                                toastr.success(response.message);
                                $(form).trigger("reset");

                                // Send mail if needed
                                if (response.sendmaildata && Object.keys(
                                        response.sendmaildata).length > 0) {
                                    sendmail(response.sendmaildata);
                                }
                            } else {
                                toastr.error(response.message);
                            }
                        }
                    });
                },
            });
        });
    });

    // Separate email handler
    function sendmail(getmaildata) {
        $.ajax({
            url: "{{ url('sendmail') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                msg: getmaildata.msg,
                title: getmaildata.title,
                attachment: getmaildata.attachment,
                email: getmaildata.email,
            },
            success: function() {
                console.log('Email sent');
            }
        });
    }
</script>
</body>
