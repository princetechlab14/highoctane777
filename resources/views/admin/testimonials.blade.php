@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Testimonials</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('testimonials', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#testimonials-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Testimonial
                            </button>
                        @endif
                        @if (hasPermission('testimonials', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Testimonials"
                                data-table='testimonials' data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Testimonials
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="testimonials_table"
                                        class="table table-striped table-bordered align-middle mb-0" style="width:100%">
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
                                                <th class="all">Client Image</th>
                                                <th class="all">Client Name</th>
                                                <th class="none">Message</th>
                                                <th class="all">Client Position</th>
                                                <th class="all">Date</th>
                                                @if (hasPermission('testimonials', 'can_edit') || hasPermission('testimonials', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($testimonials as $key => $value)
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
                                                    <td>
                                                        <a target='_blank'
                                                            href="{{ $value->client_image != '' ? asset('public/Assets/Admin/images/testimonials/' . $value->client_image) : asset('public/Assets/Admin/images/testimonials/noimage.webp') }}">
                                                            <img src="{{ asset('public/Assets') }}/Admin/images/testimonials/thumbnails/{{ $value->client_image != '' ? $value->client_image : 'noimage.webp' }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->client_image != '' ? $value->client_image : 'noimage.webp')) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->client_image != '' ? $value->client_image : 'noimage.webp')) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
                                                    <td>{{ $value->client_name ?? '-' }}</td>
                                                    <td>{{ $value->message ?? '-' }}</td>
                                                    <td>{{ $value->client_position ?? '-' }}</td>
                                                    <td>{{ $value->date ?? '-' }}</td>
                                                    @if (hasPermission('testimonials', 'can_edit') || hasPermission('testimonials', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('testimonials', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#edittestimonials-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $value->id }}" title="Edit Testimonial">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('testimonials', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='testimonials' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $value->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Testimonial">
                                                                    <i class="fs-5 ti ti-trash"></i>
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

            {{-- add modal  --}}
            <div class="modal fade" id="testimonials-modal" tabindex="-1" aria-labelledby="testimonials-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Testimonials
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/testimonials" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="testimonialsform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Client Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="client_name" class="form-control"
                                                        placeholder="Client Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Client Position</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="client_position" class="form-control "
                                                        placeholder="Client Position">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="text" name="date" class="form-control mydatepicker"
                                                    placeholder="Date" value="{{ date('m/d/Y') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <label class="form-label col-lg-12">Client Image</label>
                                            <div class="fileinput fileinput-new image-error-msg"
                                                data-provides="fileinput">
                                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;"> </div>
                                                <div class="timage-error-msg">
                                                    <span class="btn btn-outline-primary btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="client_image"
                                                            accept="image/png, image/webp, image/jpeg">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Messages</label>
                                                <div class="col-md-12">
                                                    <textarea name="message" class="form-control" placeholder="Message" rows="3"></textarea>
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

            {{-- edit modal --}}
            <div class="modal fade" id="edittestimonials-modal" tabindex="-1" aria-labelledby="testimonials-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Testimonials
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/testimonialsupdate') }}" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="edittestimonialsform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Client Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="client_name" class="form-control "
                                                        placeholder="Client Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Client Position</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="client_position" class="form-control "
                                                        placeholder="Client Position">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="text" name="date" class="form-control mydatepicker"
                                                    placeholder="Date" value="{{ date('m/d/Y') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                        <input type="hidden" name="testimonials_id" class="testimonials_id">
                                        <div class="text-center">
                                            <label class="form-label col-lg-12">Client Image</label>
                                            <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">
                                                    <img src="" class="clientimage" height="100px">
                                                </div>
                                                <div class="edittimage-error-msg">
                                                    <span class="btn btn-outline-primary btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="client_image"
                                                            accept="image/png, image/webp, image/jpeg">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Messages</label>
                                                <div class="col-md-12">
                                                    <textarea name="message" class="form-control " placeholder="Message"></textarea>
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
            var datatable;
            $('#testimonials-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // datatable
            datatable = $('#testimonials_table').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: "pdf",
                        orientation: 'landscape',
                        pageSize: 'A4',
                        filename: "Testimonial Data",
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
                            columns: [0, 2, 3, 4, 5, 6],
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Testimonial Data",
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
                            columns: [0, 2, 3, 4, 5, 6],
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

            // add validation 
            $.validator.addMethod("checkImage", function(value, element, params) {
                var file = element.files[0];
                var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                $('.timage-error-msg .error-message').html('');

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
            $('#testimonialsform').validate({
                rules: {
                    'client_image': {
                        required: false,
                        checkImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                    'client_name': {
                        required: true
                    },
                    'message': {
                        required: true
                    },
                },
                messages: {
                    'client_name': {
                        required: "Please enter client name"
                    },
                    'message': {
                        required: "Please enter message"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "client_image") {
                        error.insertAfter($(".timage-error-msg"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    $(form).find(':submit').prop('disabled', true).text('Submitting...');
                    form.submit();
                }
            });

            // edit validation 
            $.validator.addMethod("checkImage", function(value, element, params) {
                var file = element.files[0];
                var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                $('.edittimage-error-msg .error-message').html('');

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
            $('#edittestimonialsform').validate({
                rules: {
                    'client_image': {
                        required: false,
                        checkImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                    'client_name': {
                        required: true
                    },
                    'message': {
                        required: true
                    },
                },
                messages: {
                    'client_name': {
                        required: "Please enter client name"
                    },
                    'message': {
                        required: "Please enter message"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "client_image") {
                        error.insertAfter($(".edittimage-error-msg"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    $(form).find(':submit').prop('disabled', true).text('Submitting...');
                    form.submit();
                }
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

        // delete testimonials 
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
                                $('#testimonials_table').DataTable().row(rownumber)
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

        // get old data
        $('body').on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $('.testimonials_id').val(id);

            $.ajax({
                url: "{{ url('admin/gettestimonialdata') }}/" + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    let imageUrl = response.client_image && response.client_image !== '' ?
                        "{{ asset('public/Assets') }}/Admin/images/testimonials/" + response
                        .client_image :
                        "{{ asset('public/Assets') }}/Admin/images/testimonials/noimage.webp";
                    $('.clientimage').attr('src', imageUrl);

                    $('#edittestimonialsform input[name="client_name"]').val(response.client_name);
                    $('#edittestimonialsform textarea[name="message"]').val(response.message);
                    $('#edittestimonialsform input[name="client_position"]').val(response
                        .client_position);
                    $('#edittestimonialsform input[name="date"]').val(response.date);
                }
            });
        });
    </script>
@endsection
