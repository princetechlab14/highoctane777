@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Staff</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('staff', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#staff-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Staff
                            </button>
                        @endif
                        @if (hasPermission('staff', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Staffs" data-table='user'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Staffs
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Select Role</label>
                                    <select name="role_id" id="filter_role_id" class="form-select select2">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Select Store</label>
                                    <select name="store_id" id="filter_store_id" class="form-select select2">
                                        <option value="">Select Store</option>
                                        @foreach ($stores as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 d-flex justify-content-center align-items-end">
                                    <input type="button" class="btn bg-danger-subtle text-danger text-start clear"
                                        value="Clear" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Clear Filter">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="staff_table" class="table table-striped table-bordered align-middle mb-0"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="all">No.</th>
                                                <th class="all">
                                                    <div class="form-check">
                                                        <input class="form-check-input alldatachecks allvaluecheck"
                                                            type="checkbox" id="flexCheckDefault" name="allcheck"
                                                            data="999">
                                                    </div>
                                                </th>
                                                <th class="all">Username</th>
                                                <th class="all">Name</th>
                                                <th class="all">Email</th>
                                                <th class="all">Mobile</th>
                                                <th class="none">Profile Image</th>
                                                <th class="none">Address</th>
                                                <th class="all">Role</th>
                                                <th class="all">Store</th>
                                                <th class="all">Date</th>
                                                <th class="all">Status</th>
                                                @if (hasPermission('staff', 'can_edit') || hasPermission('staff', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        {{-- <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($list as $key => $value)
                                                <tr>
                                                    <td> {{ $i++ }} </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input alldatachecks_999"
                                                                type="checkbox" id="flexCheckDefault" name="alldatachecks"
                                                                data-rownumber = "{{ $key }}"
                                                                value="{{ $value->id }}">
                                                        </div>
                                                    </td>
                                                    <td>{{ $value->username ?? '-' }}</td>
                                                    <td>{{ $value->name ?? '-' }}</td>
                                                    <td>{{ $value->email ?? '-' }}</td>
                                                    <td>{{ $value->mobile ?? '-' }}</td>
                                                    <td>
                                                        <a target='_blank'
                                                            href="{{ asset('public/Assets/Admin/images/profile/' . $value->p_image) }}">
                                                            <img src="{{ asset('public/Assets') }}/Admin/images/profile/{{ $value->p_image }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->p_image)) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->p_image)) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
                                                    <td>{{ $value->address ?? '-' }}</td>
                                                    <td>{{ $value->roles->name ?? '-' }}</td>
                                                    <td>{{ $value->shops->name ?? '-' }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                                                    <td>
                                                        <select class="select2 form-select form-control selstatus"
                                                            data-id="{{ $value->id }}"
                                                            data-current="{{ $value->is_active }}">
                                                            <option value="1"
                                                                {{ $value->is_active == 1 ? 'selected' : '' }}>Active
                                                            </option>
                                                            <option value="0"
                                                                {{ $value->is_active == 0 ? 'selected' : '' }}>Inactive
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        @if (hasPermission('staff', 'can_edit'))
                                                            <button type="button" data-bs-toggle="modal"
                                                                data-bs-target="#editstaff-modal"
                                                                class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                data-id="{{ $value->id }}" title="Edit Staff">
                                                                <i class="fs-5 ti ti-edit"></i>
                                                            </button>
                                                        @endif

                                                        @if (hasPermission('staff', 'can_delete'))
                                                            <button type='button'
                                                                class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                data-table='user' data-field='id'
                                                                data-rownumber="{{ $key }}"
                                                                data-value="{{ $value->id }}" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="Delete Staff">
                                                                <i class="fs-5 ti ti-trash"></i>
                                                            </button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody> --}}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add modal  --}}
            <div class="modal fade" id="staff-modal" tabindex="-1" aria-labelledby="staff-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Staff
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/staff" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="staffform"
                            style="max-height: calc(100vh - 200px); overflow-y: auto;">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <select name="role_id" id="role_id" class="form-select select2">
                                                    <option value="">Select Role</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}"
                                                            data-user-type="{{ $item->user_type }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control username" id="username"
                                                    name="username" placeholder="Username">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="email" class="form-control email"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group d-none">
                                            <div class="mb-3">
                                                <label class="form-label">Payout Limit (For Sub Admin)</label>
                                                <div class="col-md-12">
                                                    <input type="number" step="0.01" name="max_payout_limit"
                                                        id="max_payout_limit" class="form-control"
                                                        placeholder="Enter payout limit">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control name" id="name"
                                                    name="name" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Store</label>
                                                <select name="store_id" id="store_id" class="form-select select2">
                                                    <option value="">Select Store</option>
                                                    @foreach ($stores as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input type="text" class="form-control" id="password"
                                                    name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" name="address" class="form-control" rows="4" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">

                                        <div class="mb-3">
                                            {{-- <div class="form-group">
                                                <label class="form-label">Mobile No</label>
                                                <input type="text" class="form-control" id="mobile" name="mobile"
                                                    placeholder="Mobile No">
                                            </div> --}}
                                            <div class="form-group mb-4">
                                                <label class="form-label">Mobile Number</label>
                                                <input name="mobile" id="mobile" type="text"
                                                    class="form-control phone_validate piintl_mobile"
                                                    placeholder="Mobile Number" required>
                                                <input type="hidden" name="country_code" id="picountry_code">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label col-lg-12">Profile Image</label>
                                                <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                    </div>
                                                    <div class="pimage-error-msg">
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="p_image"
                                                                accept="image/png, image/webp, image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Permissions Table --}}
                                    <div class="col-lg-12">
                                        <label class="form-label">Permissions</label>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Feature</th>
                                                    <th>View</th>
                                                    <th>Create</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="permissionTable">
                                                @foreach ($features as $feature)
                                                    <tr data-feature-id="{{ $feature->id }}">
                                                        <td>{{ $feature->name }}</td>
                                                        <td><input type="checkbox"
                                                                name="permissions[{{ $feature->id }}][view]"></td>
                                                        <td><input type="checkbox"
                                                                name="permissions[{{ $feature->id }}][create]"></td>
                                                        <td><input type="checkbox"
                                                                name="permissions[{{ $feature->id }}][edit]"></td>
                                                        <td><input type="checkbox"
                                                                name="permissions[{{ $feature->id }}][delete]"></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                                </button>
                                <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- edit modal --}}
            <div class="modal fade" id="editstaff-modal" tabindex="-1" aria-labelledby="staff-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Staff
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/staffupdate') }}" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editstaffform">
                            @csrf
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <input type="hidden" name="staff_id" class="staff_id">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Role</label>
                                                <select name="role_id" id="editrole_id" class="form-select select2">
                                                    <option value="">Select Role</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{ $item->id }}"
                                                            data-user-type="{{ $item->user_type }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control name" id="editname"
                                                    name="name" placeholder="Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4" id="storeWrapper">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Store</label>
                                                <select name="store_id" id="store_id" class="form-select select2">
                                                    <option value="">Select Store</option>
                                                    @foreach ($stores as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control username" id="editusername"
                                                    name="username" placeholder="Username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Mobile No</label>
                                                {{-- <input type="text" class="form-control" id="mobile" name="mobile"
                                                    placeholder="Mobile No"> --}}
                                                <input type="text" class="form-control phone_validate" name="mobile"
                                                    placeholder="Mobile Number" id="editintl_mobile">
                                                <input type="hidden" name="country_code" id="editcountry_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Email</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="email" class="form-control email"
                                                        id="editemail" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 payout-wrapper d-none">
                                        <div class="mb-3">
                                            <label class="form-label">Payout Limit (For Sub Admin)</label>
                                            <input type="number" step="0.01" name="max_payout_limit"
                                                id="edit_max_payout_limit" class="form-control"
                                                placeholder="Enter payout limit">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Address</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" name="address" class="form-control" rows="4" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label col-lg-12">Profile Image</label>
                                                <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                        <img src="" class="profileimage" height="100px">
                                                    </div>
                                                    <div class="editpimage-error-msg">
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="p_image"
                                                                accept="image/png, image/webp, image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Permissions Table --}}
                                    <div class="col-lg-12">
                                        <label class="form-label">Permissions</label>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Feature</th>
                                                    <th>View</th>
                                                    <th>Create</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="editPermissionTable"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                                </button>
                                <button type="button" class="btn bg-danger-subtle text-danger  waves-effect text-start"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let eiti;
            // --------------------- add staff ----------------------
            const staffinput = document.querySelector(".piintl_mobile");
            const staffcountryCodeInput = document.querySelector("#picountry_code");

            if (staffinput && staffcountryCodeInput) {
                const popupiti = window.intlTelInput(staffinput, {
                    utilsScript: "{{ asset('public/Assets') }}/Admin/js/forms/utils.js",
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

                staffinput.addEventListener('keydown', function(event) {
                    if (event.key === ' ') {
                        event.preventDefault();
                    }
                });

                staffinput.addEventListener('input', function(event) {
                    this.value = this.value.replace(/\s+/g, '');
                });

                // add validation 
                $.validator.addMethod('pCheckCountryCode', function(value, element) {
                    return popupiti.isValidNumber();
                }, "Please enter valid mobile number");
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

                // Username check
                $.validator.addMethod("checkUsernameAjax", function(value, element) {
                    var isValid = false;
                    var userId = $('#editstaffform input[name="staff_id"]').val() || 0;

                    $.ajax({
                        url: "{{ url('admin/check-username') }}",
                        type: "POST",
                        async: false, // IMPORTANT
                        data: {
                            _token: "{{ csrf_token() }}",
                            username: value,
                            user_id: userId
                        },
                        success: function(response) {
                            isValid = !response.exists;
                        }
                    });

                    return isValid;
                }, "Username already exists");
                // Email check
                $.validator.addMethod("checkEmailAjax", function(value, element) {
                    var isValid = false;
                    var userId = $('#editstaffform input[name="staff_id"]').val() || 0;

                    $.ajax({
                        url: "{{ url('admin/check-email') }}",
                        type: "POST",
                        async: false,
                        data: {
                            _token: "{{ csrf_token() }}",
                            email: value,
                            user_id: userId
                        },
                        success: function(response) {
                            isValid = !response.exists;
                        }
                    });

                    return isValid;
                }, "Email already exists");

                $('#staffform').validate({
                    rules: {
                        username: {
                            required: true,
                            minlength: 3,
                            checkUsernameAjax: true,
                        },
                        name: {
                            required: true,
                        },
                        role_id: {
                            required: true,
                        },
                        store_id: {
                            required: function() {
                                let userType = $("#role_id option:selected").data("user-type");
                                return userType === "staff";
                            }
                        },
                        max_payout_limit: {
                            required: function() {
                                let userType = $("#role_id option:selected").data("user-type");
                                return userType === "sub_admin";
                            }
                        },
                        mobile: {
                            required: true,
                            pCheckCountryCode: true,
                        },
                        email: {
                            required: true,
                            email: true,
                            checkEmailAjax: true,
                        },
                        password: {
                            required: true,
                        },
                        p_image: {
                            required: false,
                            checkImage: {
                                allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                                maxFileSize: 3 * 1024 * 1024
                            }
                        },
                    },
                    messages: {
                        username: {
                            required: "Please enter username",
                            checkUsernameAjax: "Username already exists"
                        },
                        name: {
                            required: "Please enter name"
                        },
                        role_id: {
                            required: "Please select role"
                        },
                        store_id: {
                            required: "Please select store"
                        },
                        max_payout_limit: {
                            required: "Please enter payout amount"
                        },
                        mobile: {
                            required: "Please enter mobile number",
                            pCheckCountryCode: "Please enter valid mobile number",
                        },
                        email: {
                            required: "Please enter email address",
                            email: "Please enter a valid email address",
                            checkEmailAjax: "Email already exists"
                        },
                        password: {
                            required: "Please enter password",
                        },
                        p_image: {
                            checkImage: "Please upload a valid image file (JPEG, PNG, or WEBP) smaller than 3 MB."
                        }
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") === "mobile") {
                            error.insertAfter("#picountry_code");
                        } else if (element.attr("name") === "p_image") {
                            error.insertAfter($(".pimage-error-msg"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form) {
                        if ($(form).valid()) {
                            $(form).find(':submit').prop('disabled', true).text('Submitting...');
                            form.submit();
                        } else {
                            return false;
                        }
                    }
                });
            }

            // -------------------  edit staff modal ---------------------------------
            const einput = document.querySelector("#editintl_mobile");
            const ecountryCodeInput = document.querySelector("#editcountry_code");
            if (einput && ecountryCodeInput) {
                eiti = window.intlTelInput(einput, {
                    utilsScript: "{{ asset('public/Assets') }}/Admin/js/forms/utils.js",
                    initialCountry: "auto",
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
                                callback("us");
                            });
                    },
                    showSelectedDialCode: true,
                });
                einput.addEventListener('countrychange', function() {
                    ecountryCodeInput.value = eiti.getSelectedCountryData().dialCode;
                });
                // Set the country code input value when the modal is opened
                $('#editstaff-modal').on('shown.bs.modal', function() {
                    console.log(eiti.getSelectedCountryData().dialCode)
                    ecountryCodeInput.value = eiti.getSelectedCountryData().dialCode;
                });

                einput.addEventListener('keydown', function(event) {
                    if (event.key === ' ') {
                        event.preventDefault();
                    }
                });

                // Remove spaces in real-time as user types
                einput.addEventListener('input', function(event) {
                    this.value = this.value.replace(/\s+/g, '');
                });

                // staff form validation 
                $.validator.addMethod("EditCheckCountryCode", function(value, element) {
                    var isValidNumber = eiti.isValidNumber();
                    return isValidNumber;
                }, "Please enter valid mobile number");
                $.validator.addMethod("editcheckImage", function(value, element, params) {
                    var file = element.files[0];
                    var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                    var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                    $('.editpimage-error-msg .error-message').html('');

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
                        $.validator.messages.editcheckImage =
                            "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
                    } else if (typeError) {
                        $.validator.messages.editcheckImage =
                            "Please select a valid image file (JPEG, PNG, or WEBP).";
                    } else if (sizeError) {
                        $.validator.messages.editcheckImage = "Please upload an image smaller than 3 MB.";
                    }

                    return !typeError && !sizeError;
                }, "Invalid image file.");
                $('#editstaffform').validate({
                    rules: {
                        username: {
                            required: true,
                            minlength: 3,
                            checkUsernameAjax: true,
                        },
                        name: {
                            required: true,
                        },
                        role_id: {
                            required: true,
                        },
                        store_id: {
                            required: function() {
                                let userType = $("#editrole_id option:selected").data("user-type");
                                return userType === "staff";
                            }
                        },
                        max_payout_limit: {
                            required: function() {
                                let userType = $("#editrole_id option:selected").data("user-type");
                                return userType === "sub_admin";
                            }
                        },
                        mobile: {
                            required: true,
                            EditCheckCountryCode: true,
                        },
                        email: {
                            required: true,
                            email: true,
                            checkEmailAjax: true,
                        },
                        password: {
                            required: true,
                        },
                        p_image: {
                            required: false,
                            editcheckImage: {
                                allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                                maxFileSize: 3 * 1024 * 1024
                            }
                        },
                    },
                    messages: {
                        username: {
                            required: "Please enter username",
                            checkUsernameAjax: "Username already exists"
                        },
                        name: {
                            required: "Please enter name"
                        },
                        role_id: {
                            required: "Please select role"
                        },
                        store_id: {
                            required: "Please select store"
                        },
                        max_payout_limit: {
                            required: "Please enter payout limit"
                        },
                        mobile: {
                            required: "Please enter mobile number",
                            EditCheckCountryCode: "Please enter valid mobile number",
                        },
                        email: {
                            required: "Please enter your email",
                            email: "Please enter valid email",
                            checkEmailAjax: "Email already exists"
                        },
                        password: {
                            required: "Please enter password"
                        },
                        p_image: {
                            editcheckImage: "Please upload a valid image file (JPEG, PNG, or WEBP) smaller than 3 MB."
                        }
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") == "mobile") {
                            error.insertAfter($("#editcountry_code"));
                        } else if (element.attr("name") === "p_image") {
                            error.insertAfter($(".pimage-error-msg"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form) {
                        if ($(form).valid()) {
                            $(form).find(':submit').prop('disabled', true).text('Submitting...');
                            form.submit();
                        } else {
                            return false;
                        }
                    }
                });
            }

            function toggleStoreField(formSelector) {
                let form = $(formSelector);
                let userType = form.find('select[name="role_id"] option:selected').data('user-type');

                let storeField = form.find('select[name="store_id"]').closest('.form-group, .mb-3');
                let payoutField = form.find('input[name="max_payout_limit"]').closest('.form-group');

                if (userType === "staff") {
                    storeField.show();
                    payoutField.addClass('d-none');
                } else if (userType === "sub_admin") {
                    form.find('select[name="store_id"]').val('').trigger('change');
                    storeField.hide();
                    payoutField.removeClass('d-none');
                } else {
                    form.find('select[name="store_id"]').val('').trigger('change');
                    storeField.hide();
                    payoutField.addClass('d-none');
                }
            }

            // Add form
            $('#staffform select[name="role_id"]').on('change', function() {
                toggleStoreField('#staffform');
            });

            // Edit form
            $('#editstaffform select[name="role_id"]').on('change', function() {
                toggleStoreField('#editstaffform');
            });

            // Function to show/hide store dropdown based on role
            function toggleFields(roleId) {
                let storeWrapper = $('#storeWrapper');
                let payoutWrapper = $('.payout-wrapper');
                if (roleId == 3) {
                    // STAFF
                    storeWrapper.removeClass('d-none');
                    payoutWrapper.addClass('d-none');
                } else if (roleId == 2) {
                    // SUB ADMIN
                    storeWrapper.addClass('d-none');
                    payoutWrapper.removeClass('d-none'); // 👈 SHOW THIS
                } else {
                    // SUPER ADMIN or others
                    storeWrapper.addClass('d-none');
                    payoutWrapper.addClass('d-none');
                }
            }

            $('body').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $('.staff_id').val(id);

                $.ajax({
                    url: "{{ url('admin/getstaffdata') }}/" + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        let user = response.user;
                        let permissions = response.permissions;
                        let features = response.features;

                        $('#editstaffform select[name="role_id"]').val(user.role_id);
                        $('#editstaffform select[name="store_id"]').val(user.store_id);
                        $('#editstaffform input[name="name"]').val(user.name);
                        $('#editstaffform input[name="username"]').val(user.username);
                        $('#editstaffform input[name="mobile"]').val(user.mobile);
                        $('#editstaffform input[name="email"]').val(user.email);
                        $('#editstaffform input[name="max_payout_limit"]').val(user
                            .max_payout_limit);
                        // $('#editstaffform input[name="password"]').val(user.password);
                        $('#editstaffform textarea[name="address"]').val(user.address);
                        var fullMobile = '+' + user.country_code + user.mobile;
                        // Set the mobile number without dial code in the input
                        if (eiti) {
                            eiti.setNumber(
                                fullMobile
                            );
                        }

                        // Hide/show store & payout based on role
                        toggleFields(user.role_id);

                        let imageUrl = user.p_image && user.p_image !== '' && user.p_image !==
                            null ?
                            "{{ asset('public/Assets') }}/Admin/images/profile/" + user
                            .p_image :
                            "{{ asset('public/Assets') }}/Admin/images/profile/user.webp";
                        $('.profileimage').attr('src', imageUrl);

                        // Build permission table
                        let html = '';

                        features.forEach(function(feature) {
                            let perms = permissions[feature.id] || {};

                            html += `<tr>
                        <td>${feature.name}</td>
                        <td><input type="checkbox" name="permissions[${feature.id}][view]" ${perms.can_view ? 'checked' : ''}></td>
                        <td><input type="checkbox" name="permissions[${feature.id}][create]" ${perms.can_create ? 'checked' : ''}></td>
                        <td><input type="checkbox" name="permissions[${feature.id}][edit]" ${perms.can_edit ? 'checked' : ''}></td>
                        <td><input type="checkbox" name="permissions[${feature.id}][delete]" ${perms.can_delete ? 'checked' : ''}></td>
                    </tr>`;
                        });

                        $('#editPermissionTable').html(html);
                    }
                });
            });

            $(".phone_validate").on("input", function(event) {
                $(this).val($(this).val().replace(/[^\d\s]/g, ""));
            });

            $('#filter_role_id').select2({
                placeholder: 'Select Role',
            });

            var datatable;
            $('#staff-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // datatable 
            ajaxstatedata();

            function ajaxstatedata() {
                if ($.fn.DataTable.isDataTable('#staff_table')) {
                    $('#staff_table').DataTable().destroy();
                }
                datatable = $('#staff_table').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: "pdf",
                            orientation: 'landscape',
                            pageSize: 'A4',
                            filename: "Stores Data",
                            exportOptions: {
                                format: {
                                    body: function(data, row, column, node) {
                                        if (typeof data !== 'string') {
                                            data = String(
                                                data);
                                        }
                                        if (row === 1) {
                                            const srcMatch = data.match(
                                                /src="([^"]+)"/);

                                            if (srcMatch) {
                                                return srcMatch[1]; // Return the image link
                                            } else {
                                                return '';
                                            }
                                        }

                                        return data.replace(/(<([^>]+)>)/ig,
                                            '');
                                    }
                                },
                                columns: [0, 2, 3, 4, 5, 6, 7],
                            }
                        },
                        {
                            extend: "csv",
                            filename: "Stores Data",
                            exportOptions: {
                                format: {
                                    body: function(data, row, column, node) {
                                        if (typeof data !== 'string') {
                                            data = String(
                                                data);
                                        }
                                        if (row === 1) {
                                            const srcMatch = data.match(
                                                /src="([^"]+)"/);

                                            if (srcMatch) {
                                                return srcMatch[1]; // Return the image link
                                            } else {
                                                return '';
                                            }
                                        }

                                        return data.replace(/(<([^>]+)>)/ig,
                                            '');
                                    }
                                },
                                columns: [0, 2, 3, 4, 5, 6, 7],
                            }
                        },
                    ],
                    responsive: true,
                    lengthMenu: [
                        [25, 50, 100, 500, -1],
                        [25, 50, 100, 500, "All"],
                    ],
                    "columnDefs": [{
                        "orderable": false,
                        "targets": [1, -1]
                    }],
                    "ajax": {
                        url: "{{ url('admin/staffajaxdata') }}",
                        type: 'GET',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.role_id = $('#filter_role_id').val();
                            d.store_id = $('#filter_store_id').val();
                        }
                    },
                });
            }
            $('body').on('click', '.clear', function() {
                var filter_role_id = $('#filter_role_id').val();
                var filter_store_id = $('#filter_store_id').val();
                if (filter_role_id === '' && filter_store_id === '') {
                    return;
                }

                $('#filter_role_id').val('').trigger('change');
                $('#filter_store_id').val('').trigger('change');
                ajaxstatedata();
            });

            $('#filter_role_id, #filter_store_id').on('change', function() {
                ajaxstatedata();
            });

            // // add validation 
            // $.validator.addMethod("checkImage", function(value, element, params) {
            //     var file = element.files[0];
            //     var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
            //     var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

            //     $('.pimage-error-msg .error-message').html('');

            //     if (!file) {
            //         return true;
            //     }

            //     var typeError = false;
            //     var sizeError = false;

            //     // Check for valid file type
            //     if ($.inArray(file.type, allowedTypes) === -1) {
            //         typeError = true;
            //     }

            //     // Check for file size limit
            //     if (file.size > maxFileSize) {
            //         sizeError = true;
            //     }

            //     if (typeError && sizeError) {
            //         $.validator.messages.checkImage =
            //             "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
            //     } else if (typeError) {
            //         $.validator.messages.checkImage =
            //             "Please select a valid image file (JPEG, PNG, or WEBP).";
            //     } else if (sizeError) {
            //         $.validator.messages.checkImage = "Please upload an image smaller than 3 MB.";
            //     }

            //     return !typeError && !sizeError;
            // }, "Invalid image file.");
            // $('#staffform').validate({
            //     rules: {
            //         username: {
            //             required: true,
            //         },
            //         name: {
            //             required: true,
            //         },
            //         role_id: {
            //             required: true,
            //         },
            //         shop_id: {
            //             required: true,
            //         },
            //         mobile: {
            //             required: true,
            //         },
            //         email: {
            //             required: true,
            //         },
            //         password: {
            //             required: true,
            //         },
            //         p_image: {
            //             required: false,
            //             checkImage: {
            //                 allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
            //                 maxFileSize: 3 * 1024 * 1024
            //             }
            //         },
            //     },
            //     messages: {
            //         username: {
            //             required: "Please enter username"
            //         },
            //         name: {
            //             required: "Please enter name"
            //         },
            //         role_id: {
            //             required: "Please select role"
            //         },
            //         shop_id: {
            //             required: "Please select shop"
            //         },
            //         mobile: {
            //             required: "Please enter mobile no."
            //         },
            //         email: {
            //             required: "Please enter email"
            //         },
            //         password: {
            //             required: "Please enter password"
            //         },
            //         p_image: {
            //             checkImage: "Please upload a valid image file (JPEG, PNG, or WEBP) smaller than 3 MB."
            //         }
            //     },
            //     onfocusout: function(element) {
            //         $(element).val($.trim($(element).val()));
            //         this.element(element);
            //     },
            //     errorPlacement: function(error, element) {
            //         if (element.attr("name") === "p_image") {
            //             error.insertAfter($(".pimage-error-msg"));
            //         } else {
            //             error.insertAfter(element);
            //         }
            //     },
            //     submitHandler: function(form) {
            //         if ($(form).valid()) {
            //             $(form).find(':submit').prop('disabled', true).text('Submitting...');
            //             form.submit();
            //         } else {
            //             return false;
            //         }
            //     }
            // });

            // $.validator.addMethod("editcheckImage", function(value, element, params) {
            //     var file = element.files[0];
            //     var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
            //     var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

            //     $('.editpimage-error-msg .error-message').html('');

            //     if (!file) {
            //         return true;
            //     }

            //     var typeError = false;
            //     var sizeError = false;

            //     // Check for valid file type
            //     if ($.inArray(file.type, allowedTypes) === -1) {
            //         typeError = true;
            //     }

            //     // Check for file size limit
            //     if (file.size > maxFileSize) {
            //         sizeError = true;
            //     }

            //     if (typeError && sizeError) {
            //         $.validator.messages.editcheckImage =
            //             "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
            //     } else if (typeError) {
            //         $.validator.messages.editcheckImage =
            //             "Please select a valid image file (JPEG, PNG, or WEBP).";
            //     } else if (sizeError) {
            //         $.validator.messages.editcheckImage = "Please upload an image smaller than 3 MB.";
            //     }

            //     return !typeError && !sizeError;
            // }, "Invalid image file.");
            // $('#editstaffform').validate({
            //     rules: {
            //         username: {
            //             required: true,
            //         },
            //         name: {
            //             required: true,
            //         },
            //         role_id: {
            //             required: true,
            //         },
            //         shop_id: {
            //             required: true,
            //         },
            //         mobile: {
            //             required: true,
            //         },
            //         email: {
            //             required: true,
            //         },
            //         password: {
            //             required: true,
            //         },
            //         p_image: {
            //             required: false,
            //             editcheckImage: {
            //                 allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
            //                 maxFileSize: 3 * 1024 * 1024
            //             }
            //         },
            //     },
            //     messages: {
            //         username: {
            //             required: "Please enter username"
            //         },
            //         name: {
            //             required: "Please enter name"
            //         },
            //         role_id: {
            //             required: "Please select role"
            //         },
            //         shop_id: {
            //             required: "Please select shop"
            //         },
            //         mobile: {
            //             required: "Please enter mobile no."
            //         },
            //         email: {
            //             required: "Please enter email"
            //         },
            //         password: {
            //             required: "Please enter password"
            //         },
            //         p_image: {
            //             editcheckImage: "Please upload a valid image file (JPEG, PNG, or WEBP) smaller than 3 MB."
            //         }
            //     },
            //     onfocusout: function(element) {
            //         $(element).val($.trim($(element).val()));
            //         this.element(element);
            //     },
            //     errorPlacement: function(error, element) {
            //         if (element.attr("name") === "p_image") {
            //             error.insertAfter($(".editpimage-error-msg"));
            //         } else {
            //             error.insertAfter(element);
            //         }
            //     },
            //     submitHandler: function(form) {
            //         if ($(form).valid()) {
            //             $(form).find(':submit').prop('disabled', true).text('Submitting...');
            //             form.submit();
            //         } else {
            //             return false;
            //         }
            //     }
            // });

            //datatable all checkbox select
            $('body').on('click', '.allvaluecheck', function() {
                var key = $(this).attr('data');
                var s = $(".alldatachecks_" + key + ":enabled").prop("checked", $(this).prop("checked"));
            });

            // delete multiple data 
            $('body').on('click', '.deletealldata', function() {
                deleteSelectedRows(datatable, this);
            });

            // When a role is selected, fetch default role permissions
            $('body').on('change', '#role_id', function() {
                var roleId = $(this).val();

                if (roleId) {
                    $.ajax({
                        url: "{{ url('admin/getrolepermissions') }}/" + roleId,
                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            $('#permissionTable tr').each(function() {
                                var featureId = $(this).data('feature-id');
                                var perms = response[featureId] || {};

                                $(this).find('input[name$="[view]"]').prop('checked',
                                    perms.can_view == 1);
                                $(this).find('input[name$="[create]"]').prop('checked',
                                    perms.can_create == 1);
                                $(this).find('input[name$="[edit]"]').prop('checked',
                                    perms.can_edit == 1);
                                $(this).find('input[name$="[delete]"]').prop('checked',
                                    perms.can_delete == 1);
                            });
                        }
                    });
                } else {
                    // Clear checkboxes if no role
                    $('#permissionTable input[type=checkbox]').prop('checked', false);
                }
            });

            $('body').on('blur', '#name', function() {
                let name = $(this).val().trim();
                let username = '';
                if (name.length > 0) {
                    username = name.toLowerCase().replace(/\s+/g, '').replace(/[^a-z0-9]/g, '');
                }
                let usernameInput = $('#username'); // jQuery object
                usernameInput.val(username);

                checkUsernameAvailability(usernameInput); // ✅ PASS jQuery OBJECT
            });

            // When leaving field
            $('body').on('blur', '#username, #editusername', function() {
                let input = $(this);
                let userId = $('#editstaffform input[name="staff_id"]').val() || 0;
                checkUsernameAvailability(input, userId);
            });

            function checkUsernameAvailability(input, userId = 0, callback = null) {
                let username = input.val().trim();

                if (username.length < 3) {
                    input.removeClass('is-valid is-invalid');
                    if (callback) callback(false);
                    return;
                }

                $.ajax({
                    url: "{{ url('admin/check-username') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        username: username,
                        user_id: userId // send user ID to backend
                    },
                    success: function(response) {
                        if (response.exists) {
                            input.addClass('is-invalid').removeClass('is-valid');
                        } else {
                            input.addClass('is-valid').removeClass('is-invalid');
                        }
                        if (callback) callback(response.exists);
                    },
                    error: function() {
                        console.error("AJAX error checking username");
                        if (callback) callback(false);
                    }
                });
            }

            // Live email validation
            $('body').on('blur', 'input[name="email"]', function() {
                let input = $(this);
                let email = input.val().trim();
                let form = input.closest('form');
                let userId = form.find('input[name="staff_id"]').val() || 0; // 0 for add, id for edit

                if (email.length < 5) {
                    input.removeClass('is-valid is-invalid');
                    return;
                }

                $.ajax({
                    url: "{{ url('admin/check-email') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        email: email,
                        user_id: userId // send current user id to ignore
                    },
                    success: function(response) {
                        if (response.exists) {
                            input.addClass('is-invalid').removeClass('is-valid');
                        } else {
                            input.addClass('is-valid').removeClass('is-invalid');
                        }
                    },
                    error: function() {
                        console.error("AJAX error checking email");
                        input.removeClass('is-valid is-invalid');
                    }
                });
            });
        });

        $('body').on('change', '#editrole_id', function() {
            var roleId = $(this).val();

            if (roleId) {
                $.ajax({
                    url: "{{ url('admin/getrolepermissions') }}/" + roleId,
                    method: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('#editPermissionTable tr').each(function() {
                            var featureId = $(this).find('input[type="checkbox"]').first().attr(
                                    'name')
                                .match(/\d+/)[0];

                            var perms = response[featureId] || {};

                            $(this).find('input[name$="[view]"]').prop('checked', perms
                                .can_view == 1);
                            $(this).find('input[name$="[create]"]').prop('checked', perms
                                .can_create == 1);
                            $(this).find('input[name$="[edit]"]').prop('checked', perms
                                .can_edit == 1);
                            $(this).find('input[name$="[delete]"]').prop('checked', perms
                                .can_delete == 1);
                        });

                    }
                });
            } else {
                $('#editPermissionTable input[type=checkbox]').prop('checked', false);
            }
        });

        // change staff status
        $('body').on('change', '.selstatus', function() {
            let selectBox = $(this);
            let status = selectBox.val();
            let id = selectBox.data('id');
            let oldValue = selectBox.data('current');

            Swal.fire({
                title: 'Are you sure?',
                text: "",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Confirm",
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/staffstatus') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: status,
                            id: id,
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated!',
                                    text: 'Staff status has been updated.',
                                });
                                selectBox.data('current', status);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to update staff status.',
                                });
                                selectBox.val(oldValue);
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while updating staff status.',
                            });
                            selectBox.val(oldValue);
                        }
                    });

                } else {
                    selectBox.val(oldValue);
                }
            });
        });

        // delete staff 
        $('body').on('click', '.deletedata', function() {
            var table = $(this).attr('data-table');
            var field = $(this).attr('data-field');
            var id = $(this).attr('data-value');
            rownumber = $(this).attr('data-rownumber');

            Swal.fire({
                title: "Are you sure you want to delete this?",
                text: "This action is irreversible and will permanently remove the selected item.",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('/admin/deletedata') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            table: table,
                            field: field,
                            id: id
                        },
                        success: function(result) {
                            if (result.status == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your record has been deleted.',
                                });
                                $('#staff_table').DataTable().row(rownumber)
                                    .remove().draw();
                            } else if (result.status == 2) {
                                Swal.fire({
                                    icon: 'warning',
                                    text: result.message,
                                });
                            } else {
                                Swal.fire({
                                    title: 'Cancelled',
                                    text: 'Something went wrong!',
                                    icon: 'error',
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                title: 'Cancelled',
                                text: 'Something went wrong!',
                                icon: 'error',
                            });
                        }
                    });
                }
            });
        });
    </script>
@endsection
