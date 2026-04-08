@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Category</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('category', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#category-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Category
                            </button>
                        @endif
                        @if (hasPermission('category', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deleteallcategorydata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Category"
                                data-table='category' data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Categorys
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="category_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">Category Name</th>
                                                <th class="all">Parent Category</th>
                                                <th class="all">Image</th>
                                                <th class="none">Image Title</th>
                                                <th class="none">Image Alt</th>
                                                <th class="none">Content</th>
                                                <th class="none">Meta Title</th>
                                                <th class="none">Meta Description</th>
                                                @if (hasPermission('category', 'can_edit') || hasPermission('category', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($category as $key => $value)
                                                @php
                                                    $val = \DB::table('category')->where('id', $value->p_c_id)->first();
                                                @endphp
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input alldatachecks_999"
                                                                type="checkbox" id="flexCheckDefault" name="alldatachecks"
                                                                data-rownumber = "{{ $key }}"
                                                                value="{{ $value->id }}">
                                                        </div>
                                                    </td>
                                                    <td>{{ $value->category_name }}</td>
                                                    <td>
                                                        @if ($value->p_c_id != '' && $value->p_c_id != 0)
                                                            {{ $val ? $val->category_name : '-' }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a target='_blank'
                                                            href="{{ $value->category_image != '' ? asset('public/Assets/Admin/images/category/' . $value->category_image) : asset('public/Assets/Admin/images/category/noimage.webp') }}">
                                                            <img src="{{ asset('public/Assets') }}/Admin/images/category/thumbnails/{{ $value->category_image != '' ? $value->category_image : 'noimage.webp' }}"
                                                                alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->category_image != '' ? $value->category_image : 'noimage.webp')) }}"
                                                                title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $value->category_image != '' ? $value->category_image : 'noimage.webp')) }}"
                                                                height="80px" loading="lazy">
                                                        </a>
                                                    </td>
                                                    <td>{!! $value->content ?? '-' !!}</td>
                                                    <td>{{ $value->category_image_title ?? '-' }}</td>
                                                    <td>{{ $value->category_image_alt ?? '-' }}</td>
                                                    <td>{{ $value->meta_title ?? '-' }}</td>
                                                    <td>{{ $value->meta_description ?? '-' }}</td>
                                                    @if (hasPermission('category', 'can_edit') || hasPermission('category', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('category', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editcategory-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $value->id }}" title="Edit">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('category', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletecategorydata'
                                                                    data-table='category' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $value->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Category">
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
        </div>
    </div>

    {{-- add modal  --}}
    <div class="modal fade" id="category-modal" tabindex="-1" aria-labelledby="category-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Add New Category
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin') }}/category" role="form" class="form-horizontal" method="post"
                    enctype="multipart/form-data" id="categoryform">
                    @csrf
                    <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <div class="row">
                            <input type="hidden" name="category_url" class="curl">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="cname" name="category_name"
                                        placeholder="Category Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Parent Category</label>
                                    <select class="form-select" name="p_c_id" id="p_c_id">
                                        <option value="">Select</option>
                                        @foreach ($category->filter(function ($value) {
            return $value->p_c_id == 0;
        }) as $value)
                                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Category URL</label>
                                    <input type="text" class="form-control curl" name="category_url"
                                        placeholder="Category Name" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label col-lg-12">Category Image</label>
                                    <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                            style="width: 200px; height: 150px;">
                                        </div>
                                        <div class="cimage-error-msg">
                                            <span class="btn btn-outline-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="category_image"
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
                                            name="category_image_title" placeholder="Image Title">
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Image Alt</label>
                                        <input type="text" class="form-control" id="img_alt"
                                            name="category_image_alt" placeholder="Image Alt">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" class="ckeditor"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="Meta Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" placeholder="Meta Description"></textarea>
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
    <div class="modal fade" id="editcategory-modal" tabindex="-1" aria-labelledby="category-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Category
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/categoryupdate') }}" role="form" class="form-horizontal" method="post"
                    enctype="multipart/form-data" id="editcategoryform">
                    @csrf
                    <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="hidden" name="category_id" class="category_id">
                                <input type="hidden" name="category_url" class="editcurl">
                                <div class="mb-3">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="editcname" name="category_name"
                                        placeholder="Category Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Parent Category</label>
                                    <select class="form-control" name="p_c_id" id="editp_c_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach ($category->filter(function ($value) {
            return $value->p_c_id == 0;
        }) as $value)
                                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Category URL</label>
                                    <input type="text" class="form-control editcurl" name="category_url"
                                        placeholder="Category Name" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label col-lg-12">Category Image</label>
                                    <div class="fileinput fileinput-new error-msg" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                            style="width: 200px; height: 150px;">
                                            <img src="" class="categoryimage" height="100px">
                                        </div>
                                        <div class="editcimage-error-msg">
                                            <span class="btn btn-outline-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="category_image"
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
                                            name="category_image_title" placeholder="Image Title">
                                    </div>

                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label class="form-label">Image Alt</label>
                                        <input type="text" class="form-control" id="img_alt"
                                            name="category_image_alt" placeholder="Image Alt">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Content</label>
                                    <textarea name="content" class="ckeditor" id="content"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        placeholder="Meta Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" placeholder="Meta Description"></textarea>
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
@endsection

@section('script')
    <script>
        $('#category-modal').on('shown.bs.modal', function() {
            $('#p_c_id').select2({
                dropdownParent: $('#category-modal'),
                placeholder: 'Select Parent Category',
                allowClear: true
            });
        });
        $('#editcategory-modal').on('shown.bs.modal', function() {
            $('#editp_c_id').select2({
                dropdownParent: $('#editcategory-modal'),
                placeholder: 'Select Parent Category',
                allowClear: true
            });
        });
    </script>
    <script>
        // add
        function generateUrl() {
            var category = $('#p_c_id option:selected').text().trim().replace(/[^A-Za-z0-9]/g, "-")
                .toLowerCase();
            var cname = $('#cname').val().trim().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();

            var url = '';
            if ($('#p_c_id').val() != '0' && $('#p_c_id').val() != '') {
                url = category + '-';
            }
            url += cname;

            $('.curl').val(url);
        };
        $('#cname').on('keyup change', function() {
            generateUrl();
        });
        $('#p_c_id').on('change', function() {
            generateUrl();
        });

        // edit
        function editgenerateUrl() {
            var category = $('#editp_c_id option:selected').text().trim().replace(/[^A-Za-z0-9]/g, "-")
                .toLowerCase();
            var editcname = $('#editcname').val().trim().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();

            var url = '';
            if ($('#editp_c_id').val() && $('#editp_c_id').val() != '0') {
                url = category + '-';
            }
            url += editcname;

            $('.editcurl').val(url);
        };
        $('#editcname').on('keyup change', function() {
            editgenerateUrl();
        });
        $('#editp_c_id').on('change', function() {
            editgenerateUrl();
        });
    </script>
    <script>
        $(document).ready(function() {
            var datatable;
            $('#category-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // table
            datatable = $('#category_table').DataTable({
                dom: 'Blfrtip',
                // buttons: [
                //     'print', 'pdf', 'csv'
                // ],
                buttons: [{
                        extend: "pdf",
                        filename: "Category Data",
                        exportOptions: {
                            format: {
                                body: function(data, row, column, node) {
                                    if (row === 3) {
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
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                        orientation: 'portrait',
                        pageSize: 'A4',
                        customize: function(doc) {
                            doc.layout = 'lightHorizotalLines';

                            var tblBody = doc.content[1].table.body;
                            // Styling the table borders
                            doc.content[1].layout = {
                                hLineWidth: function(i, node) {
                                    return (i === node.table.body.length) ? 1 : 1;
                                },
                                vLineWidth: function(i, node) {
                                    return (i === node.table.widths.length) ? 1 : 1;
                                },
                                hLineColor: function(i, node) {
                                    return (i === node.table.body.length) ? 'black' :
                                        'gray';
                                },
                                vLineColor: function(i, node) {
                                    return (i === node.table.widths.length) ? 'black' :
                                        'gray';
                                }
                            };
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Category Data",
                        exportOptions: {
                            format: {
                                body: function(data, row, column, node) {
                                    if (row === 3) {
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
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9],
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

                $('.cimage-error-msg .error-message').html('');

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
            $('#categoryform').validate({
                rules: {
                    category_name: {
                        required: true
                    },
                    category_image: {
                        required: false,
                        checkImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                },
                messages: {
                    category_name: {
                        required: "Please enter category name"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "category_image") {
                        error.insertAfter($(".cimage-error-msg"));
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

                $('.editcimage-error-msg .error-message').html('');

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
            $('#editcategoryform').validate({
                rules: {
                    category_name: {
                        required: true,
                    },
                    category_image: {
                        required: false,
                        editcheckImage: {
                            allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                            maxFileSize: 3 * 1024 * 1024
                        }
                    },
                },
                messages: {
                    category_name: {
                        required: "Please enter category name"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "category_image") {
                        error.insertAfter($(".editcimage-error-msg"));
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
            $('body').on('click', '.deleteallcategorydata', function() {
                deleteSelecteCategorydRows(datatable, this);
            });
        });

        function deleteSelecteCategorydRows(datatable, button) {
            var dataarr = [];
            $('input:checkbox[name=alldatachecks]:checked').each(function() {
                dataarr.push($(this).val());
            });

            if (dataarr.length > 0) {
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
                        var table = $(button).attr('data-table');
                        var field = $(button).attr('data-field');

                        $.ajax({
                            method: "POST",
                            url: "{{ url('admin/deleteallcategorydata') }}",
                            data: {
                                _token: "{{ csrf_token() }}",
                                dataarr: dataarr,
                                table: table,
                                field: field,
                            },
                            success: function(response) {
                                if (response.status == 1) {
                                    Swal.fire({
                                        title: 'Deleted!',
                                        text: 'The selected categories have been deleted successfully.',
                                        icon: 'success'
                                    });

                                    // Remove the deleted rows from DataTable
                                    dataarr.forEach(function(id) {
                                        datatable.row($('input:checkbox[value="' +
                                                id + '"]').closest('tr')).remove()
                                            .draw(false);
                                    });
                                } else if (response.status == 2) {
                                    Swal.fire({
                                        icon: 'warning',
                                        text: response.message,
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        text: response.message,
                                        icon: 'error'
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
            } else {
                Swal.fire({
                    text: "Please select at least one item to delete.",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
            }
        }

        // delete category 
        $('body').on('click', '.deletecategorydata', function() {
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
                        url: "{{ url('/admin/deletecategorydata') }}",
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
                                $('#category_table').DataTable().row(rownumber)
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

        // get old value
        $('body').on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $('.category_id').val(id);

            $.ajax({
                url: "{{ url('admin/getcateorydata') }}/" + id,
                method: 'GET',
                success: function(response) {
                    let imageUrl = response.category_image && response.category_image !== '' ?
                        "{{ asset('public/Assets') }}/Admin/images/category/" + response
                        .category_image :
                        "{{ asset('public/Assets') }}/Admin/images/category/noimage.webp";
                    $('.categoryimage').attr('src', imageUrl);
                    $('#editp_c_id').val(response.p_c_id).trigger('change');
                    $('#editcategoryform input[name="category_name"]').val(response.category_name);
                    $('#editcategoryform input[name="category_url"]').val(response.category_url);
                    $('#editcategoryform input[name="category_image_title"]').val(response
                        .category_image_title);
                    $('#editcategoryform input[name="category_image_alt"]').val(response
                        .category_image_alt);
                    $('#editcategoryform input[name="meta_title"]').val(response.meta_title);
                    $('#editcategoryform input[name="meta_description"]').val(response
                        .meta_description);
                    $('#editcategoryform input[name="content"]').val(response.content);
                    CKEDITOR.instances.content.setData(response.content);
                }
            });
        });
    </script>
@endsection
