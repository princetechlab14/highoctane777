@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Stores</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('stores', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#stores-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Store
                            </button>
                        @endif
                        @if (hasPermission('stores', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Stores" data-table='stores'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Stores
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="stores_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">Store Type</th>
                                                <th class="all">Name</th>
                                                <th class="all">Mobile</th>
                                                <th class="all">Email</th>
                                                <th class="all">Location</th>
                                                <th class="all">QR</th>
                                                <th class="none">Store Image</th>
                                                <th class="all">Status</th>
                                                @if (hasPermission('stores', 'can_edit') || hasPermission('stores', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($list as $key => $value)
                                                @php
                                                    $user = session('admin');
                                                    $isAdmin =
                                                        $user &&
                                                        in_array($user->user_type, ['super_admin', 'sub_admin']);
                                                @endphp
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
                                                    <td>{{ ucfirst($value->store_type) ?? '-' }}</td>
                                                    <td>{{ $value->name ?? '-' }}</td>
                                                    <td>{{ '+' . $value->country_code . ' ' . $value->mobile ?? '-' }}</td>
                                                    <td>{{ $value->email ?? '-' }}</td>
                                                    <td>{{ $value->location ?? '-' }}</td>
                                                    <td>
                                                        <a target='_blank'
                                                            href="{{ asset('assets/admin/images/qrcode/' . $value->qr_code) }}">
                                                            <img src="{{ asset('assets') }}/admin/images/qrcode/{{ $value->qr_code }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->qr_code)) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->qr_code)) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a target='_blank'
                                                            href="{{ asset('assets/admin/images/store/' . $value->store_image) }}">
                                                            <img src="{{ asset('assets') }}/admin/images/store/{{ $value->store_image }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->store_image)) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->store_image)) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
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
                                                    @if (hasPermission('stores', 'can_edit') || hasPermission('stores', 'can_delete') || $isAdmin)
                                                        <td>
                                                            @if (hasPermission('stores', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editstores-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $value->id }}" title="Edit Store">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('stores', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='stores' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $value->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Store">
                                                                    <i class="fs-5 ti ti-trash"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('stores', 'can_view'))
                                                                <button type="button"
                                                                    class="btn mb-1 btn-primary btn-sm d-inline-flex align-items-center justify-content-center  view-staff-btn"
                                                                    data-id="{{ $value->id }}" data-bs-toggle="modal"
                                                                    data-bs-target="#viewStaffModal" title="View Staff">
                                                                    <i class="fs-5 ti ti-eye"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="viewStaffModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Staff & Transactions Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <!-- ===== SUMMARY SECTION ===== -->
                            <div class="d-flex justify-content-between align-items-center mb-3 p-2 bg-light rounded">

                                <div>
                                    <strong>Total Revenue: </strong>
                                    <span class="text-info fw-bold" id="totalRevenue">$0</span>
                                </div>

                                <div>
                                    <strong>Total Transactions: </strong>
                                    <span class="text-info fw-bold" id="totalTransactions">0</span>
                                </div>

                                <div>
                                    <strong>Total Customers: </strong>
                                    <span class="text-info fw-bold" id="totalCustomers">0</span>
                                </div>
                            </div>
                            <!-- ===== END SUMMARY ===== -->

                            <div class="card">
                                <div class="card-body" style="max-height: calc(100vh - 250px); overflow-y: auto;">
                                    <div class="table-responsive">
                                        <!-- Staff Table -->
                                        <h5 class="mb-3">Assigned Staff</h5>
                                        <table class="table table-striped table-bordered align-middle"
                                            id="store-staff-list">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>User Type</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>

                                        <h5 class="mb-3">Transactions</h5>
                                        <table class="table table-striped table-bordered align-middle"
                                            id="store-transactions">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Customer</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add modal  --}}
            <div class="modal fade" id="stores-modal" tabindex="-1" aria-labelledby="stores-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Store
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/stores" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="storesform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Store Type</label>
                                                <select name="store_type" class="form-control" required>
                                                    <option value="">Select Type</option>
                                                    <option value="physical">Physical</option>
                                                    <option value="online">Online</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Mobile No</label>
                                                <input name="mobile" id="mobile" type="text"
                                                    class="form-control phone_validate piintl_mobile"
                                                    placeholder="Mobile Number" required>
                                                <input type="hidden" name="country_code" id="picountry_code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="email" class="form-control "
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" name="location" class="form-control " rows="5" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label col-lg-12">Store Image</label>
                                                <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                    </div>
                                                    <div class="pimage-error-msg">
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="store_image"
                                                                accept="image/png, image/webp, image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
            <div class="modal fade" id="editstores-modal" tabindex="-1" aria-labelledby="editstores-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Stores
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/storesupdate') }}" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editstoresform">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" name="stores_id" class="stores_id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Store Type</label>
                                                <select name="store_type" class="form-control" required>
                                                    <option value="physical">Physical</option>
                                                    <option value="online">Online</option>
                                                </select>
                                            </div>
                                        </div>
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
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="email" class="form-control "
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" name="location" class="form-control " rows="5" placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label col-lg-12">Store Image</label>
                                                <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                        <img src="" class="storeimage" height="100px">
                                                    </div>
                                                    <div class="editsimage-error-msg">
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="store_image"
                                                                accept="image/png, image/webp, image/jpeg">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                $('#storesform').validate({
                    rules: {
                        store_type: {
                            required: true,
                        },
                        name: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                            pCheckCountryCode: true,
                        },
                        location: {
                            required: true,
                        }
                    },
                    messages: {
                        store_type: {
                            required: "Please select store type"
                        },
                        name: {
                            required: "Please enter store name"
                        },
                        mobile: {
                            required: "Please enter store mobile no.",
                            pCheckCountryCode: "Please enter valid mobile number",
                        },
                        location: {
                            required: "Please enter store location"
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") === "mobile") {
                            error.insertAfter("#picountry_code");
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
                    utilsScript: "{{ asset('assets') }}/admin/js/forms/utils.js",
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
                $('#editstores-modal').on('shown.bs.modal', function() {
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

                $.validator.addMethod("EditCheckCountryCode", function(value, element) {
                    var isValidNumber = eiti.isValidNumber();
                    return isValidNumber;
                }, "Please enter valid mobile number");
                $('#editstoresform').validate({
                    rules: {
                        store_type: {
                            required: true,
                        },
                        name: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                            EditCheckCountryCode: true,
                        },
                        location: {
                            required: true,
                        }
                    },
                    messages: {
                        store_type: {
                            required: "Please select store type"
                        },
                        name: {
                            required: "Please enter store name"
                        },
                        mobile: {
                            required: "Please enter store mobile no.",
                            EditCheckCountryCode: "Please enter valid mobile number",
                        },
                        location: {
                            required: "Please enter store location"
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") == "mobile") {
                            error.insertAfter($("#editcountry_code"));
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

            $('body').on('click', '.edit-btn', function() {
                var id = $(this).data('id');
                $('.stores_id').val(id);

                $.ajax({
                    url: "{{ url('admin/getstoresdata') }}/" + id,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        var fullMobile = '+' + response.country_code + response.mobile;
                        // Set the mobile number without dial code in the input
                        if (eiti) {
                            eiti.setNumber(
                                fullMobile
                            );
                        }

                        $('#editstoresform select[name="store_type"]').val(response.store_type);
                        $('#editstoresform input[name="name"]').val(response.name);
                        $('#editstoresform input[name="mobile"]').val(response.mobile);
                        $('#editstoresform input[name="email"]').val(response.email);
                        $('#editstoresform textarea[name="location"]').val(response.location);

                        let imageUrl = response.store_image && response.store_image !== '' && response
                            .store_image !==
                            null ?
                            "{{ asset('assets') }}/admin/images/store/" + response
                            .store_image :
                            "{{ asset('assets') }}/admin/images/store/noimage.webp";
                        $('.storeimage').attr('src', imageUrl);
                    }
                });
            });

            var datatable;
            $('#stores-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // datatable 
            datatable = $('#stores_table').DataTable({
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
                                    if (row === 6) {
                                        if (data.includes('<select')) {
                                            var match = data.match(
                                                /<option[^>]*selected[^>]*>([^<]+)<\/option>/
                                            );
                                            if (match && match[1]) {
                                                return match[1]
                                                    .trim(); // Return the selected option text (Active/Inactive)
                                            }
                                        } else {
                                            // If the status is just a number or text, check the value directly
                                            if (data == '0') {
                                                return 'Active';
                                            } else if (data == '1') {
                                                return 'Inactive';
                                            }
                                        }
                                    }
                                    if (row === 5) {
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
                                    if (row === 6) {
                                        if (data.includes('<select')) {
                                            var match = data.match(
                                                /<option[^>]*selected[^>]*>([^<]+)<\/option>/
                                            );
                                            if (match && match[1]) {
                                                return match[1]
                                                    .trim(); // Return the selected option text (Active/Inactive)
                                            }
                                        } else {
                                            // If the status is just a number or text, check the value directly
                                            if (data == '0') {
                                                return 'Active';
                                            } else if (data == '1') {
                                                return 'Inactive';
                                            }
                                        }
                                    }
                                    if (row === 5) {
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
                }]
            });


            //datatable all checkbox select
            $('body').on('click', '.allvaluecheck', function() {
                var key = $(this).attr('data');
                var s = $(".alldatachecks_" + key + ":enabled").prop("checked", $(this).prop("checked"));
            });

            // delete multiple data 
            $('body').on('click', '.deletealldata', function() {
                deleteSelectedRows(datatable, this);
            });
        });

        // change store status
        $('body').on('change', '.selstatus', function() {
            let selectBox = $(this);
            let status = selectBox.val();
            let id = selectBox.data('id');
            let oldValue = selectBox.data('current'); // store old value

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
                        url: "{{ url('/admin/storestatus') }}",
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
                                    text: 'Store status has been updated.',
                                });
                                selectBox.data('current', status);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to update store status.',
                                });
                                selectBox.val(oldValue);
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while updating store status.',
                            });
                            selectBox.val(oldValue);
                        }
                    });

                } else {
                    selectBox.val(oldValue);
                }
            });
        });

        // delete store 
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
                            console.log('result', result)
                            if (result.status == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your record has been deleted.',
                                });
                                $('#stores_table').DataTable().row(rownumber)
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

        $('body').on('click', '.view-staff-btn', function() {
            var storeId = $(this).data('id');

            // Clear old data
            $('#store-staff-list tbody').html('');
            $('#store-transactions tbody').html('');

            $.ajax({
                url: "{{ url('admin/store-details') }}/" + storeId,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    // ================= SUMMARY =================
                    $('#totalRevenue').text('$' + res.totalRevenue);
                    $('#totalTransactions').text(res.transactions.length);
                    $('#totalCustomers').text(res.totalCustomers);

                    /* ================= STAFF TABLE ================= */
                    var staffHtml = '';
                    if (res.staff.length > 0) {
                        res.staff.forEach(function(tx) {
                            staffHtml += `<tr>
                                    <td>${tx.id}</td>
                                    <td>${tx.username}</td>
                                    <td>$${tx.name}</td>
                                    <td>${tx.email}</td>
                                    <td>${tx.mobile}</td>
                                    <td>${tx.user_type}</td>
                                    <td>${tx.role_id}</td>
                            </tr>`;
                        });
                    } else {
                        staffHtml = `<tr><td colspan="7" class="text-center">No Staff Found</td></tr>`;
                    }
                    $('#store-staff-list tbody').html(staffHtml);

                    /* ================= TRANSACTION TABLE ================= */
                    var txHtml = '';
                    if (res.transactions.length > 0) {
                        res.transactions.forEach(function(tx) {
                            txHtml += `<tr>
                            <td>${tx.id}</td>
                            <td>${tx.customer_email}</td>
                            <td>$${tx.amount}</td>
                            <td>${tx.created_at}</td>
                        </tr>`;
                        });
                    } else {
                        txHtml =
                            `<tr><td colspan="4" class="text-center">No Transactions Found</td></tr>`;
                    }
                    $('#store-transactions tbody').html(txHtml);
                }
            });
        });
    </script>
@endsection
