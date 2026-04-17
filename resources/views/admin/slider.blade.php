@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Slider</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('slider', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#slider-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Slider
                            </button>
                        @endif
                        @if (hasPermission('slider', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Slider" data-table='slider'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Sliders
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="slider_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">Banner Image</th>
                                                <th class="none">Image Title</th>
                                                <th class="none">Image Alt</th>
                                                <th class="all">Heading</th>
                                                <th class="all">Sub Heading</th>
                                                <th class="all">Button Text</th>
                                                <th class="all">Button Link</th>
                                                @if (hasPermission('slider', 'can_edit') || hasPermission('slider', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($slider as $key => $value)
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
                                                            href="{{ asset('assets/admin/images/slider/' . $value->banner_image) }}">
                                                            <img src="{{ asset('assets') }}/admin/images/slider/thumbnails/{{ $value->banner_image }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->banner_image)) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->banner_image)) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
                                                    <td>{{ $value->image_title ?? '-' }}</td>
                                                    <td>{{ $value->image_alt ?? '-' }}</td>
                                                    <td>{{ $value->heading ?? '-' }}</td>
                                                    <td>{{ $value->sub_heading ?? '-' }}</td>
                                                    <td>{{ $value->button_text ?? '-' }}</td>
                                                    <td>{{ $value->button_link ?? '-' }}</td>
                                                    @if (hasPermission('slider', 'can_edit') || hasPermission('slider', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('slider', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editslider-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $value->id }}" title="Edit Slider">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('slider', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='slider' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $value->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Slider">
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
            <div class="modal fade" id="slider-modal" tabindex="-1" aria-labelledby="slider-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Slider
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/slider" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="sliderform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                        <div class="text-center">
                                            <label class="form-label col-lg-12">Banner Image</label>
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;"> </div>
                                                <div class="slider-error-msg">
                                                    <span class="btn btn-outline-primary btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="banner_image"
                                                            accept="image/png, image/webp, image/jpeg">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Image Title</label>
                                                <input type="text" class="form-control" id="img_title"
                                                    name="image_title" placeholder="Image Title">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Image Alt</label>
                                                <input type="text" class="form-control" id="img_alt"
                                                    name="image_alt" placeholder="Image Alt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Heading</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="heading" class="form-control "
                                                        placeholder="Heading">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Slider Button Text</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="button_text" class="form-control "
                                                        placeholder="Slider Button Text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Sub Heading</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="sub_heading" class="form-control "
                                                        placeholder="Sub Heading">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Button Link</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="button_link" class="form-control "
                                                        placeholder="Button Link">
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
            <div class="modal fade" id="editslider-modal" tabindex="-1" aria-labelledby="slider-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Slider
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/sliderupdate') }}" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editsliderform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                                        <input type="hidden" name="slider_id" class="slider_id">
                                        <div class="text-center">
                                            <label class="form-label col-lg-12">Banner Image</label>
                                            <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                                <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                    style="width: 200px; height: 150px;">
                                                    <img src="" class="bannerimage" height="100px">
                                                </div>
                                                <div class="editslider-error-msg">
                                                    <span class="btn btn-outline-primary btn-file">
                                                        <span class="fileinput-new">Select image</span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="banner_image"
                                                            accept="image/png, image/webp, image/jpeg">
                                                    </span>
                                                    <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Image Title</label>
                                                <input type="text" class="form-control" id="img_title"
                                                    name="image_title" placeholder="Image Title">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label class="form-label">Image Alt</label>
                                                <input type="text" class="form-control" id="img_alt"
                                                    name="image_alt" placeholder="Image Alt">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Heading</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="heading" class="form-control "
                                                        placeholder="Heading">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label ">Sub Heading</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="sub_heading" class="form-control "
                                                        placeholder="Sub Heading">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Slider Button Text</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="button_text" class="form-control "
                                                        placeholder="Slider Button Text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">Button Link</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="button_link" class="form-control "
                                                        placeholder="Button Link">
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
            $('#slider-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // datatable 
            datatable = $('#slider_table').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: "pdf",
                        orientation: 'landscape',
                        pageSize: 'A4',
                        filename: "Slider Data",
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
                            columns: [0, 2, 3, 4, 5, 6, 7, 8],
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Slider Data",
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
                            columns: [0, 2, 3, 4, 5, 6, 7, 8],
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

                $('.slider-error-msg .error-message').html('');

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
            $('#sliderform').validate({
                rules: {
                    banner_image: {
                        required: true,
                        checkImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                },
                messages: {
                    banner_image: {
                        required: "Please upload image"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "banner_image") {
                        error.insertAfter($(".slider-error-msg"));
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

            // edit validation 
            $.validator.addMethod("editcheckImage", function(value, element, params) {
                var file = element.files[0];
                var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                $('.editslider-error-msg .error-message').html('');

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
            $('#editsliderform').validate({
                rules: {
                    banner_image: {
                        required: false,
                        editcheckImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                },
                messages: {
                    banner_image: {
                        required: "Please upload image"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "banner_image") {
                        error.insertAfter($(".editslider-error-msg"));
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

        // delete slider 
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
                                $('#slider_table').DataTable().row(rownumber)
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

        $('body').on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $('.slider_id').val(id);

            $.ajax({
                url: "{{ url('admin/getsliderdata') }}/" + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('.bannerimage').attr('src', "{{ asset('assets') }}/admin/images/slider/" +
                        response.banner_image);
                    $('#editsliderform input[name="image_title"]').val(response.image_title);
                    $('#editsliderform input[name="image_alt"]').val(response.image_alt);
                    $('#editsliderform input[name="heading"]').val(response.heading);
                    $('#editsliderform input[name="sub_heading"]').val(response.sub_heading);
                    $('#editsliderform input[name="button_text"]').val(response.button_text);
                    $('#editsliderform input[name="button_link"]').val(response.button_link);

                }
            });
        });
    </script>
@endsection
