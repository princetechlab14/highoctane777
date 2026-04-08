@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="form-with-tabs">
                <h4 class="card-title mb-4 text-dark">Website Settings</h4>
                <div class="card">
                    <ul class="nav nav-pills user-profile-tab border-bottom" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                id="pills-logo-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-logo-setting"
                                type="button" role="tab" aria-controls="pills-logo-setting" aria-selected="true">
                                Logo Setting
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                id="pills-personal-info-tab" data-bs-toggle="pill" data-bs-target="#pills-personal-info"
                                type="button" role="tab" aria-controls="pills-personal-info" aria-selected="false">
                                Company Info
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                id="pills-email-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-email-setting"
                                type="button" role="tab" aria-controls="pills-email-setting" aria-selected="false">
                                Email Setting
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                id="pills-seo-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-seo-setting"
                                type="button" role="tab" aria-controls="pills-seo-setting" aria-selected="false">
                                SEO Setting
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                id="pills-footer-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-footer-setting"
                                type="button" role="tab" aria-controls="pills-footer-setting" aria-selected="false">
                                Footer Setting
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                id="pills-stripe-setting-tab" data-bs-toggle="pill" data-bs-target="#pills-stripe-setting"
                                type="button" role="tab" aria-controls="pills-stripe-setting" aria-selected="false">
                                Stripe Setting
                            </button>
                        </li>
                    </ul>
                    <div class="card-body p-4">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-logo-setting" role="tabpanel"
                                aria-labelledby="pills-logo-setting-tab" tabindex="0">
                                <form action="{{ url('admin') }}/websetting/1" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Header Logo</label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                        <img
                                                            src="{{ asset('public/Assets') }}/{{ isset($websetting->hlogo) && $websetting->hlogo != '' ? $websetting->hlogo : 'user.webp' }}">
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="hlogo">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Footer Logo</label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                        <img
                                                            src="{{ asset('public/Assets') }}/{{ isset($websetting->flogo) && $websetting->flogo != '' ? $websetting->flogo : 'user.webp' }}">
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="flogo">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="mb-3">
                                                <label class="form-label">Favicon Logo</label>
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                        style="width: 200px; height: 150px;">
                                                        <img
                                                            src="{{ asset('public/Assets') }}/{{ isset($websetting->favicon) && $websetting->favicon != '' ? $websetting->favicon : 'user.webp' }}">
                                                    </div>
                                                    <div>
                                                        <span class="btn btn-outline-primary btn-file">
                                                            <span class="fileinput-new">Select image</span>
                                                            <span class="fileinput-exists">Change</span>
                                                            <input type="file" name="favicon">
                                                        </span>
                                                        <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                            data-dismiss="fileinput">Remove</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                <button class="btn bg-danger-subtle text-danger"
                                                    type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-personal-info" role="tabpanel"
                                aria-labelledby="pills-personal-info-tab" tabindex="0">
                                <form action="{{ url('admin') }}/websetting/2" method="post"
                                    enctype="multipart/form-data" id="personalinfo">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="call_mobileno" class="form-label">Call No.</label>
                                                <input type="text" class="form-control" id="call_mobileno"
                                                    placeholder="Call No." name="call_mobileno"
                                                    value="{{ $websetting->call_mobileno ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="whastappno" class="form-label">Whatsapp No.</label>
                                                <input type="text" class="form-control" id="whastappno"
                                                    placeholder="Whatsapp No." name="whatsapp_mobileno"
                                                    value="{{ $websetting->whatsapp_mobileno ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Address</label>
                                                <textarea class="form-control" name="address" cols="20" rows="3" placeholder="Address">{{ $websetting->address ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Google Map Location</label>
                                                <textarea class="form-control" name="location" cols="20" rows="3" placeholder="Google Map Location">{{ $websetting->location ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Add Mobile Numbers</label>
                                                <div class="mobile-repeater mb-3">
                                                    <div data-repeater-list="repeater-group">
                                                        @if (!empty($contactinfo))
                                                            @forelse($contactinfo as $contact)
                                                                <div data-repeater-item class="row mb-3">
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                            class="form-control phone_validate intl_mobile"
                                                                            placeholder="Mobile No."
                                                                            name="repeater-group[][mobileno]"
                                                                            value="{{ $contact->mobile_no }}">
                                                                        <input type="hidden"
                                                                            name="repeater-group[][country_code]"
                                                                            class="country_code"
                                                                            value="{{ $contact->country_code }}">
                                                                        <input type="hidden"
                                                                            name="repeater-group[][contact_id]"
                                                                            value="{{ $contact->id ?? '' }}">
                                                                    </div>
                                                                    <div class="col-md-2 mt-3 mt-md-0">
                                                                        <button data-id="{{ $contact->id }}"
                                                                            class="btn bg-danger-subtle text-danger deletecontactinfo"
                                                                            type="button">
                                                                            <i class="ti ti-x fs-5 d-flex"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div data-repeater-item="" class="row mb-3">
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                            class="form-control phone_validate intl_mobile"
                                                                            placeholder="Mobile No."
                                                                            name="repeater-group[][mobileno]">
                                                                        <input type="hidden"
                                                                            name="repeater-group[][country_code]"
                                                                            class="country_code">
                                                                    </div>
                                                                    <div class="col-md-2 mt-3 mt-md-0">
                                                                        <button data-repeater-delete=""
                                                                            class="btn bg-danger-subtle text-danger"
                                                                            type="button">
                                                                            <i class="ti ti-x fs-5 d-flex"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        @endif
                                                    </div>
                                                    <button type="button" data-repeater-create=""
                                                        class="btn bg-primary-subtle text-primary">
                                                        <span class="fs-4 me-1">+</span>
                                                        Add another mobile number
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Add Multiple Email</label>
                                                <div class="email-repeater mb-3">
                                                    <div data-repeater-list="repeater-group">
                                                        @if (!empty($emailinfo))
                                                            @forelse($emailinfo as $email)
                                                                <div data-repeater-item class="row mb-3">
                                                                    <div class="col-md-10">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Email"
                                                                            name="repeater-group[][email] email_field"
                                                                            value="{{ $email->email }}">
                                                                        <input type="hidden"
                                                                            name="repeater-group[][email_id]"
                                                                            value="{{ $email->id }}">
                                                                    </div>
                                                                    <div class="col-md-2 mt-3 mt-md-0">
                                                                        <button data-id="{{ $email->id }}"
                                                                            class="btn bg-danger-subtle text-danger deleteemailinfo"
                                                                            type="button">
                                                                            <i class="ti ti-x fs-5 d-flex"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @empty
                                                                <div data-repeater-item="" class="row mb-3">
                                                                    <div class="col-md-10">
                                                                        <input type="text"
                                                                            class="form-control email_field"
                                                                            placeholder="Email"
                                                                            name="repeater-group[][email]">
                                                                    </div>
                                                                    <div class="col-md-2 mt-3 mt-md-0">
                                                                        <button data-repeater-delete=""
                                                                            class="btn bg-danger-subtle text-danger"
                                                                            type="button">
                                                                            <i class="ti ti-x fs-5 d-flex"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforelse
                                                        @endif
                                                    </div>
                                                    <button type="button" data-repeater-create=""
                                                        class="btn bg-primary-subtle text-primary">
                                                        <span class="fs-4 me-1">+</span>
                                                        Add another Email ID
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 mt-4">
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                <button class="btn bg-danger-subtle text-danger"
                                                    type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-email-setting" role="tabpanel"
                                aria-labelledby="pills-email-setting-tab" tabindex="0">
                                <form action="{{ url('admin') }}/websetting/3" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="smtpport" class="form-label">SMTP Port</label>
                                                <input type="text" class="form-control" id="smtpport"
                                                    placeholder="SMTP Port" name="smtp_port"
                                                    value="{{ $websetting->smtp_port ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="smtpuser" class="form-label">SMTP User</label>
                                                <input type="text" class="form-control" id="smtpuser"
                                                    placeholder="SMTP User" name="smtp_user"
                                                    value="{{ $websetting->smtp_user ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="smtphost" class="form-label">SMTP Host</label>
                                                <input type="text" class="form-control" id="smtphost"
                                                    placeholder="SMTP Host" name="smtp_host"
                                                    value="{{ $websetting->smtp_host ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="smtppassword" class="form-label">SMTP Password</label>
                                                <input type="text" class="form-control" id="smtppassword"
                                                    placeholder="SMTP Password" name="smtp_password"
                                                    value="{{ $websetting->smtp_password ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="smtpcrypto" class="form-label">SMTP Crypto</label>
                                                <input type="text" class="form-control" id="smtpcrypto"
                                                    placeholder="SMTP Crypto" name="smtp_crypto"
                                                    value="{{ $websetting->smtp_crypto ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cc" class="form-label">CC</label>
                                                <input type="text" class="form-control" id="cc"
                                                    placeholder="CC" name="cc" value="{{ $websetting->cc ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="from" class="form-label">From</label>
                                                <input type="text" class="form-control" id="from"
                                                    placeholder="From" name="from"
                                                    value="{{ $websetting->from ?? '' }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="receivemail" class="form-label">Receive Inquiry Email
                                                    Address</label>
                                                <input type="text" class="form-control" id="receivemail"
                                                    placeholder="Receive Website Inquiry Email Address"
                                                    name="receive_inquiry_email"
                                                    value="{{ $websetting->receive_inquiry_email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                <button class="btn bg-danger-subtle text-danger"
                                                    type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-seo-setting" role="tabpanel"
                                aria-labelledby="pills-seo-setting-tab" tabindex="0">
                                <form action="{{ url('admin') }}/websetting/4" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="color-primary"
                                                        value="1" name="indexing"
                                                        {{ $websetting->indexing == 1 ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="color-primary">Indexing
                                                        On</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Google Webconsol</label>
                                                <textarea class="form-control" name="g_webconsol" cols="20" rows="2" placeholder="Google Webconsol">{{ $websetting->g_webconsol ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Google Analytics</label>
                                                <textarea class="form-control" name="g_analytics" cols="20" rows="2" placeholder="Google Analytics">{{ $websetting->g_analytics ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Facebook Pixel</label>
                                                <textarea class="form-control" name="facebook_pixel" cols="20" rows="2" placeholder="Facebook Pixel">{{ $websetting->facebook_pixel ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                <button class="btn bg-danger-subtle text-danger"
                                                    type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-footer-setting" role="tabpanel"
                                aria-labelledby="pills-footer-setting-tab" tabindex="0">
                                <form action="{{ url('admin') }}/websetting/5" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Tawk Content</label>
                                                <textarea class="form-control" name="tawk_content" cols="20" rows="2" placeholder="Tawk Content">{{ $websetting->tawk_content ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Footer Content</label>
                                                <textarea class="form-control" name="footer_content" cols="20" rows="2" placeholder="Footer Content">{{ $websetting->footer_content ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
                                                <button class="btn bg-danger-subtle text-danger"
                                                    type="reset">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-stripe-setting" role="tabpanel"
                                aria-labelledby="pills-stripe-setting-tab" tabindex="0">
                                <form action="{{ url('admin') }}/websetting/6" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Stripe Key</label>
                                                <input class="form-control" name="stripe_key" cols="20"
                                                    rows="2" placeholder="Stripe Key"
                                                    value="{{ $websetting->stripe_key ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Stripe Secret</label>
                                                <input class="form-control" name="stripe_secret" cols="20" rows="2" placeholder="Stripe Secret" value="{{ $websetting->stripe_secret ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Stripe Webhook Secret</label>
                                                <input class="form-control" name="stripe_webhook_secret" cols="20"
                                                    rows="2" placeholder="Stripe Webhook Secret"
                                                    value="{{ $websetting->stripe_webhook_secret ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Currency</label>
                                                <input class="form-control" name="currency" cols="20"
                                                    rows="2" placeholder="Currency"
                                                    value="{{ $websetting->currency ?? '' }}" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex align-items-center justify-content-center gap-3">
                                                <button class="btn btn-primary" type="submit">Submit</button>
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
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Initialize repeaters
        $(".mobile-repeater, .email-repeater").repeater({
            show: function() {
                $(this).slideDown();
            },
            hide: function(remove) {
                var repeaterItems = $(this).closest('[data-repeater-list]').find('[data-repeater-item]');
                if (repeaterItems.length > 1) {
                    $(this).slideUp(remove);
                } else {
                    alert("You cannot remove this item.");
                }
            },
        });

        // Unique ID counters
        let uniqueIdCounter = {
            mobile: 1,
            email: 1
        };

        // Function to handle new item creation with unique IDs
        function createRepeaterItem(repeaterType) {
            const repeaterClass = `.${repeaterType}-repeater`;
            const newField = $(repeaterClass).find('[data-repeater-item]').last();

            const idCounter = uniqueIdCounter[repeaterType]++;
            newField.attr('data-id', `new-${idCounter}`);

            if (repeaterType === 'mobile') {
                newField.find('.intl_mobile').attr('id', `intl_mobile_new_${idCounter}`);
                newField.find('.deletecontactinfo').attr('data-id', 'new');
            } else if (repeaterType === 'email') {
                newField.find('.email_field').attr('id', `email_field_new_${idCounter}`);
                newField.find('.deleteemailinfo').attr('data-id', 'new');
            }
        }

        // Bind new item creation to repeater button click
        $('button[data-repeater-create]').on('click', function() {
            if ($(this).closest('.mobile-repeater').length) {
                createRepeaterItem('mobile');
            } else if ($(this).closest('.email-repeater').length) {
                createRepeaterItem('email');
            }
        });

        // Function to handle item deletion with SweetAlert confirmation
        function handleItemDeletion(deleteButtonClass, apiUrl) {
            $('body').on('click', deleteButtonClass, function() {
                const id = $(this).attr('data-id');

                if (id && id !== 'new') {
                    Swal.fire({
                        title: "Are you sure you want to delete this?",
                        text: "This action is irreversible and will permanently remove the selected items.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "GET",
                                url: `${apiUrl}/${id}`,
                                dataType: "json",
                                success: function(response) {
                                    if (response.success === true) {
                                        Swal.fire({
                                            title: 'Deleted!',
                                            text: 'Records have been deleted successfully.',
                                            icon: 'success'
                                        }).then(() => {
                                            location.reload();
                                        });
                                    }
                                }
                            });
                        }
                    });
                } else {
                    $(this).closest('[data-repeater-item]').slideUp(() => $(this).closest('[data-repeater-item]')
                        .remove());
                }
            });
        }

        // Bind deletion functionality for mobile and email repeaters
        handleItemDeletion('.deletecontactinfo', "{{ url('admin/deletecontactinfo') }}");
        handleItemDeletion('.deleteemailinfo', "{{ url('admin/deleteemailinfo') }}");
    </script>
    <script>
        $(document).ready(function() {
            function initializeIntlTelInput(input) {
                const countryCodeInput = $(input).closest('.row').find('.country_code');

                const iti = window.intlTelInput(input, {
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

                // Store the instance for later use
                $(input).data('intlTelInput', iti);

                // Set the initial number if available
                const mobileNumber = $(input).val().replace(/\s+/g, '');
                $(input).val(mobileNumber);
                const initialCountryCode = countryCodeInput.val();
                if (mobileNumber && initialCountryCode) {
                    iti.setNumber(`+${initialCountryCode}${mobileNumber}`);
                }

                input.addEventListener('countrychange', function() {
                    countryCodeInput.val(iti.getSelectedCountryData().dialCode);
                });
                countryCodeInput.val(iti.getSelectedCountryData().dialCode);

                // Remove spaces in real-time as user types
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^\d]/g, '');
                });

                input.addEventListener('keydown', function(event) {
                    if (event.key === ' ') {
                        event.preventDefault();
                    }
                });
            }

            function applyValidationToMobileInputs() {
                $('.intl_mobile').each(function() {
                    $(this).rules("remove"); // Clear existing rules

                    let mobileNumber = $(this).val().replace(/\s+/g, '');
                    $(this).val(mobileNumber);

                    // Add new validation rules
                    $(this).rules("add", {
                        required: true,
                        CheckCountryCode: true,
                        messages: {
                            required: "Please enter a mobile number",
                            CheckCountryCode: "Please enter a valid mobile number"
                        }
                    });
                });
            }

            $.validator.addMethod("CheckCountryCode", function(value, element) {
                const iti = $(element).data('intlTelInput');
                return iti && iti.isValidNumber();
            }, "Please enter a valid mobile number");


            $('#personalinfo').validate({
                errorPlacement: function(error, element) {
                    error.insertAfter($(element).closest('div.row').find('.country_code'));
                },
                submitHandler: function(form) {
                    $('.intl_mobile').each(function() {
                        this.value = this.value.replace(/\s+/g, '');
                        const iti = $(this).data('intlTelInput');
                    });
                    $(form).find(':submit').prop('disabled', true).text('Submitting...');
                    form.submit(); // Submit the form
                }
            });

            // Initialize existing inputs
            $('.intl_mobile').each(function() {
                this.value = this.value.replace(/\s+/g, '');
                initializeIntlTelInput(this);
            });

            applyValidationToMobileInputs();

            // Reinitialize on repeater create/delete
            $('[data-repeater-create], [data-repeater-delete]').on('click', function() {
                setTimeout(function() {
                    $('.intl_mobile').each(function() {
                        this.value = this.value.replace(/\s+/g, '');
                        initializeIntlTelInput(this);
                    });
                    applyValidationToMobileInputs();
                }, 50);
            });
        });
    </script>
@endsection
