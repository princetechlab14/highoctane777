@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Gallery</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('gallery', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#gallery-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Gallery
                            </button>
                        @endif
                        @if (hasPermission('gallery', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Gallery" data-table='gallery'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Gallerys
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="gallery_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">Image</th>
                                                @if (hasPermission('gallery', 'can_edit') || hasPermission('gallery', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($gallery as $key => $value)
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
                                                            href="{{ asset('assets/admin/images/gallery/' . $value->g_image) }}">
                                                            <img src="{{ asset('assets') }}/admin/images/gallery/thumbnails/{{ $value->g_image }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->g_image)) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->g_image)) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
                                                    @if (hasPermission('gallery', 'can_edit') || hasPermission('gallery', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('gallery', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editgallery-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $value->id }}" title="Edit Gallery">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('gallery', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='gallery' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $value->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Gallery">
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
            <div class="modal fade" id="gallery-modal" tabindex="-1" aria-labelledby="socialmedia-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Gallery
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/gallery" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="galleryform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                style="width: 200px; height: 150px;">

                                            </div>
                                            <div class="image-error-msg">
                                                <span class="btn btn-outline-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="g_image[]"
                                                        accept="image/png, image/webp, image/jpeg" multiple>
                                                </span>
                                                <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
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
            {{-- edit modal  --}}
            <div class="modal fade" id="editgallery-modal" tabindex="-1" aria-labelledby="gallery-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Gallery Image
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/galleryupdate') }}" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editgalleryform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <input type="hidden" name="g_id" class="g_id">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                                style="width: 200px; height: 150px;">
                                                <img src="" class="gimage" height="100px">
                                            </div>
                                            <div class="editimage-error-msg">
                                                <span class="btn btn-outline-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="g_image"
                                                        accept="image/png, image/webp, image/jpeg">
                                                </span>
                                                <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
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
            $('#gallery-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // datatable 
            datatable = $('#gallery_table').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: "pdf",
                        pageSize: 'A4',
                        filename: "Gallery Data",
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

                                    return data;
                                }
                            },
                            columns: [0, 2],
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Gallery Data",
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

                                    return data;
                                }
                            },
                            columns: [0, 2],
                        }
                    },
                ],
                responsive: true,
                destroy: true,
                lengthMenu: [
                    [25, 50, 100, 500, -1],
                    [25, 50, 100, 500, "All"],
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": [1, -1]
                }]
            });

            // add image validation 
            $.validator.addMethod("checkImages", function(value, element, params) {
                var files = element.files;
                var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                $('.image-error-msg .error-message').html('');

                if (files.length === 0) {
                    return false;
                }

                var typeError = false;
                var sizeError = false;

                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    var fileSize = file.size;
                    var fileType = file.type;

                    // Check for valid file type
                    if ($.inArray(fileType, allowedTypes) === -1) {
                        typeError = true;
                    }

                    // Check for file size limit
                    if (fileSize > maxFileSize) {
                        sizeError = true;
                    }
                }

                if (typeError && sizeError) {
                    $.validator.messages.checkImages =
                        "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
                } else if (typeError) {
                    $.validator.messages.checkImages =
                        "Please select a valid image file (JPEG, PNG, or WEBP).";
                } else if (sizeError) {
                    $.validator.messages.checkImages = "Please upload an image smaller than 3 MB.";
                }

                return !typeError && !sizeError;
            }, "Invalid image file.");
            $('#galleryform').validate({
                rules: {
                    'g_image[]': {
                        required: true, // Ensure an image is required
                        checkImages: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                },
                messages: {
                    'g_image[]': {
                        required: "Please upload an image."
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "g_image[]") {
                        error.insertAfter($(".image-error-msg"));
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

            // edit image validation
            $.validator.addMethod("editcheckImage", function(value, element, params) {
                var file = element.files[0];
                var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
                var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

                $('.editimage-error-msg .error-message').html('');

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

                // Return false if any errors exist, otherwise return true
                return !typeError && !sizeError;

            }, "Invalid image file.");
            $('#editgalleryform').validate({
                rules: {
                    g_image: {
                        required: false,
                        editcheckImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                },
                messages: {
                    g_image: {
                        required: "Please upload an image."
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "g_image") {
                        error.insertAfter($(".editimage-error-msg"));
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

        // delete gallery 
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
                                $('#gallery_table').DataTable().row(rownumber).remove().draw();
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
            $('.g_id').val(id);

            $.ajax({
                url: "{{ url('admin/getgallerydata') }}/" + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('.gimage').attr('src', "{{ asset('assets') }}/admin/images/gallery/" +
                        response.g_image);
                }
            });
        });
    </script>
@endsection
