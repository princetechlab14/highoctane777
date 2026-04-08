@extends('admin.app')
@section('body')
    <style>
        .error {
            color: red;
        }
    </style>
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="card">
                <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                            id="pills-personal-info-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-info"
                            type="button" role="tab" aria-controls="pills-personal-info" aria-selected="true">
                            <i class="ti ti-user-circle me-2 fs-6"></i>
                            <span class="d-none d-md-block">Personal Info</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3"
                            id="pills-changepassword-tab" data-bs-toggle="pill" data-bs-target="#pills-changepassword"
                            type="button" role="tab" aria-controls="pills-changepassword" aria-selected="false">
                            <i class="ti ti-key me-2 fs-6"></i>
                            <span class="d-none d-md-block">Change Password</span>
                        </button>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-personal-info" role="tabpanel"
                            aria-labelledby="pills-personal-info-tab" tabindex="0">
                            <div class="col-12">
                                <div class="card w-100 border position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Personal Details</h4>
                                        <p class="card-subtitle mb-4">To change your personal detail , edit and save from
                                            here</p>
                                        <form action="{{ url('admin/profile') }}" method="post" id="profileform"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" placeholder="User Name"
                                                            name="name" value="{{ $userdata->name }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Email Address" name="email"
                                                            value="{{ $userdata->email != '' ? $userdata->email : '' }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input type="text" class="form-control phone_validate"
                                                            id="addintl_mobile" placeholder="Mobile Number" name="mobile"
                                                            value="{{ $userdata->mobile != '' ? $userdata->mobile : '' }}">
                                                        <input type="hidden" name="addcountry_code" id="addcountry_code"
                                                            value="{{ $userdata->country_code }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <label class="form-label col-lg-12">Change Profile</label>
                                                        <div class="fileinput fileinput-new image-error-msg"
                                                            data-provides="fileinput">
                                                            <div class="fileinput-preview img-thumbnail"
                                                                data-trigger="fileinput"
                                                                style="width: 200px; height: 150px;">
                                                                <img src="{{ asset('public/Assets') }}/Admin/images/profile/{{ $userdata->p_image ? $userdata->p_image : 'user.webp' }}"
                                                                    alt="Profile" title="Profile"
                                                                    class="img-fluid rounded-circle" width="120"
                                                                    height="120">
                                                            </div>
                                                            <div class="pimage-error-msg">
                                                                <span class="btn btn-outline-primary btn-file">
                                                                    <span class="fileinput-new">Upload</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="p_image"
                                                                        accept="image/png, image/webp, image/jpeg">
                                                                </span>
                                                                <a href="#"
                                                                    class="btn btn-outline-danger fileinput-exists"
                                                                    data-dismiss="fileinput">Reset</a>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Allowed JPEG, PNG or WEBP. Max size of 3MB</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                                        <button class="btn btn-primary" id="submitprofile"
                                                            type="submit">Save</button>
                                                        <button class="btn bg-danger-subtle text-danger"
                                                            type="reset">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-changepassword" role="tabpanel"
                            aria-labelledby="pills-changepassword-tab" tabindex="0">
                            <div class="row justify-content-center">
                                <div class="col-lg-12">
                                    <div class="card border shadow-none">
                                        <div class="card-body p-4">
                                            <h4 class="card-title">Change Password</h4>
                                            <p class="card-subtitle mb-4">To change your password please confirm here</p>
                                            <form action="javascript:void(0);" method="post" id="password">
                                                @csrf
                                                <div class="row">
                                                    <div class="mb-3">
                                                        <label class="form-label">Current Password</label>
                                                        <div class="password-group">
                                                            <input type="password" class="form-control password"
                                                                name="oldpassword" placeholder="Current Password"
                                                                id="oldpassword">
                                                            <span class="fa fa-eye toggle-password"
                                                                toggle="#oldpassword"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <div class="password-group">
                                                            <input type="password" class="form-control password"
                                                                name="n_password" placeholder="New Password"
                                                                id="n_password">
                                                            <span class="fa fa-eye toggle-password"
                                                                toggle="#n_password"></span>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm Password</label>
                                                        <div class="password-group">
                                                            <input type="password" class="form-control password"
                                                                name="c_password" placeholder="Retype New Password"
                                                                id="c_password">
                                                            <span class="fa fa-eye toggle-password"
                                                                toggle="#c_password"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div
                                                            class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                                            <button class="btn btn-primary" id="submit">Change
                                                                Password</button>
                                                            <button
                                                                class="btn bg-danger-subtle text-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            if ($("#password").length > 0) {
                $('#password').validate({
                    rules: {
                        oldpassword: {
                            required: true,
                        },
                        n_password: {
                            required: true,
                        },
                        c_password: {
                            required: true,
                            equalTo: "#n_password",
                        },
                    },
                    messages: {
                        oldpassword: {
                            required: "Please enter old password",
                        },
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
                        $('#submit').html('Please Wait...');
                        $("#submit").attr("disabled", true);
                        $.ajax({
                            url: "{{ url('admin/changepassword') }}",
                            type: "POST",
                            dataType: "json",
                            data: $('#password').serialize(),
                            success: function(response) {
                                $('#submit').html('Change Password');
                                $("#submit").attr("disabled", false);
                                if (response.success) {
                                    window.location.href = response.redirect_url;
                                    document.getElementById("changepassword").reset();
                                } else {
                                    toastr.error(response.message);
                                }
                            }
                        });
                    }
                });
            }

            const input = document.querySelector("#addintl_mobile");
            const countryCodeInput = document.querySelector("#addcountry_code");
            const oldCountryCode = "{{ $userdata->country_code }}";
            const userPhoneNumber = "{{ $userdata->mobile }}";

            if (input && countryCodeInput) {
                const iti = window.intlTelInput(input, {
                    utilsScript: "{{ asset('public/Assets') }}/Admin/js/forms/utils.js",
                    initialCountry: "auto", // Automatically set the initial country based on user's location
                    separateDialCode: true,
                    geoIpLookup: function(callback) {
                        fetch("https://ipapi.co/json")
                            .then(function(res) {
                                return res.json();
                            })
                            .then(function(data) {
                                callback(data.country_code);
                            })
                            .catch(function() {
                                callback("us"); // Default to US if there is an error
                            });
                    },
                    showSelectedDialCode: true,
                });
                const fullMobile = `+${oldCountryCode}${userPhoneNumber}`;
                if (iti) {
                    iti.setNumber(
                        fullMobile
                    );
                }
                input.addEventListener('countrychange', function() {
                    countryCodeInput.value = iti.getSelectedCountryData().dialCode;
                });
                countryCodeInput.value = iti.getSelectedCountryData().dialCode;

                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^\d]/g, '');
                });

                input.addEventListener('keydown', function(event) {
                    if (event.key === ' ') {
                        event.preventDefault();
                    }
                });

                // register form validation 
                $.validator.addMethod("CheckCountryCode", function(value, element) {
                    var isValidNumber = iti.isValidNumber();
                    return isValidNumber;
                }, "Please enter valid mobile number");
                $.validator.addMethod("customemail", function(value, element) {
                    if (/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value)) {
                        return true; // Valid email format
                    } else {
                        return false;
                    }
                }, "Please enter a valid email or mobile number");
                $.validator.addMethod("checkImage", function(value, element, params) {
                    var file = element.files[0];
                    var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                    var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                    $('.pimage-error-msg .error-message').html('');

                    if (!file) {
                        return true;
                    }

                    var typeError = false;
                    var sizeError = false;

                    // Check for valid file type
                    if ($.inArray(file.type, allowedTypes) === -1) {
                        typeError = true;
                    }

                    // Check for file size limit
                    if (file.size > maxFileSize) {
                        sizeError = true;
                    }

                    if (typeError && sizeError) {
                        $.validator.messages.checkImage =
                            "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
                    } else if (typeError) {
                        $.validator.messages.checkImage =
                            "Please select a valid image file (JPEG, PNG, or WEBP).";
                    } else if (sizeError) {
                        $.validator.messages.checkImage = "Please upload an image smaller than 3 MB.";
                    }

                    return !typeError && !sizeError;
                }, "Invalid image file.");

                $('#profileform').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        email: {
                            required: true,
                            customemail: true,
                        },
                        mobile: {
                            required: true,
                            CheckCountryCode: true,
                        },
                        p_image: {
                            required: false,
                            checkImage: {
                                allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                                maxFileSize: 3 * 1024 * 1024
                            }
                        }
                    },
                    messages: {
                        name: {
                            required: "Please enter name",
                        },
                        email: {
                            required: "Please enter email",
                            customemail: "Please enter a valid email",
                        },
                        mobile: {
                            required: "Please enter mobile number",
                            CheckCountryCode: "Please enter a valid mobile number",
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") === "p_image") {
                            error.insertAfter($(".pimage-error-msg"));
                        } else if (element.attr("name") === "mobile") {
                            error.insertAfter($("#addcountry_code"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form) {
                        if ($(form).valid()) {
                            $(form).find('button[type="submit"]').attr('disabled',
                                true);
                            $(form).find('button[type="submit"]').html('Please Wait...');
                            form.submit();
                        } else {
                            return false;
                        }
                    }
                });
            }
        });
    </script>
@endsection
