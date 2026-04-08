@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Blog Posts
                    </h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('blog', 'can_create'))
                            <a href="{{ url('admin/addupdateblog') }}" class="btn btn-rounded btn-primary px-4 fs-4">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Blog
                            </a>
                        @endif
                        @if (hasPermission('blog', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Blogs" data-table='pages'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Blogs
                            </button>
                        @endif
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Search Date</label>
                                    <input type="text" class="form-control" id="bs-rangepicker-basic"
                                        placeholder="Select Date">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Select Blog Category</label>
                                    <select name="category_id" id="category_id" class="form-select select2">
                                        <option value="">Select Blog Category</option>
                                        @foreach ($blogcategory as $item)
                                            <option value="{{ $item->id }}">{{ $item->blog_category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Select Status</label>
                                    <select name="status" class="form-select select2" id="status">
                                        <option value="">Select Status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
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
                                    <table id="blog_table" class="table table-striped table-bordered align-middle mb-0" style="width:100%">
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
                                                <th class="all">Blog Title</th>
                                                <th class="none">Blog Url</th>
                                                <th class="all">Image</th>
                                                <th class="all">Blog Category</th>
                                                <th class="none">Image Title</th>
                                                <th class="none">Image Alt</th>
                                                <th class="none">Meta Title</th>
                                                <th class="none">Meta Desc</th>
                                                <th class="none">Schema</th>
                                                <th class="none">Keywords</th>
                                                <th class="none">Canonical Url</th>
                                                <th class="all">Date</th>
                                                <th class="all">Status</th>
                                                <th class="all"></th>
                                            </tr>
                                        </thead>
                                    </table>
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
            $('#category_id').select2({
                placeholder: 'Select Blog Category',
            });

            $('#status').select2({
                placeholder: 'Select Status',
            });

            var datatable;
            ajaxblogdata();
        });

        var bsRangePickerBasic = $('#bs-rangepicker-basic')
        if (bsRangePickerBasic.length) {
            bsRangePickerBasic.daterangepicker({
                autoUpdateInput: false,
            });

            bsRangePickerBasic.on('apply.daterangepicker', function(ev, picker) {
                // When a date is selected, update the input field
                $(this).val(picker.startDate.format('DD-MM-YYYY') + ' to ' + picker.endDate.format(
                    'DD-MM-YYYY'));
            });

            bsRangePickerBasic.on('cancel.daterangepicker', function(ev, picker) {
                // Clear the input field when the user cancels the selection
                $(this).val('');
            });
        }

        function ajaxblogdata() {
            datatable = $('#blog_table').DataTable({
                responsive: true,
                processing: false,
                serverSide: true,
                searching: true,
                dom: 'Blfrtip',
                buttons: [{
                        extend: "pdf",
                        orientation: 'landscape',
                        pageSize: 'A4',
                        filename: "Blog Data",
                        exportOptions: {
                            format: {
                                body: function(data, row, column, node) {
                                    if (typeof data !== 'string') {
                                        data = String(
                                            data);
                                    }

                                    if (row === 12) {
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
                                    if (row === 3) {
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
                            columns: [0, 2, 3, 4, 6, 7, 8, 9, 10, 11, 12, 13],
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Blog Data",
                        exportOptions: {
                            format: {
                                body: function(data, row, column, node) {
                                    if (typeof data !== 'string') {
                                        data = String(
                                            data);
                                    }

                                    if (row === 12) {
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
                                    if (row === 3) {
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
                            columns: [0, 2, 3, 4, 6, 7, 8, 9, 10, 11, 12, 13],
                        }
                    },
                ],
                lengthMenu: [
                    [25, 50, 100, 500, -1],
                    [25, 50, 100, 500, "All"],
                ],
                pageLength: 25,
                destroy: true,
                "ajax": {
                    url: "{{ url('/admin/blogajaxdata') }}",
                    type: 'POST',
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.category_id = $('#category_id').val();
                        d.status = $('#status').val();
                        d.daterange = $('#bs-rangepicker-basic').val();
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: '',
                        orderable: false
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'url'
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'category_id'
                    },
                    {
                        data: 'thumbnail_title'
                    },
                    {
                        data: 'thumbnail_alt'
                    },
                    {
                        data: 'meta_title'
                    },
                    {
                        data: 'meta_description'
                    },
                    {
                        data: 'schema'
                    },
                    {
                        data: 'keywords'
                    },
                    {
                        data: 'canonical_url'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ],
            });
        }

        //datatable all checkbox select
        $('body').on('click', '.allvaluecheck', function() {
            var key = $(this).attr('data');
            var s = $(".alldatachecks_" + key + ":enabled").prop("checked", $(this).prop("checked"));
        });

        // delete multiple data 
        $('body').on('click', '.deletealldata', function() {
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
                        var table = $(this).attr('data-table');
                        var field = $(this).attr('data-field');

                        $.ajax({
                            method: "POST",
                            url: "{{ url('admin/deleteallpagedata') }}",
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
                                        text: 'The selected records have been deleted successfully.',
                                        icon: 'success'
                                    });

                                    // Remove the deleted rows from DataTable
                                    dataarr.forEach(function(id) {
                                        datatable
                                            .row($('input:checkbox[value="' + id + '"]')
                                                .closest('tr'))
                                            .remove()
                                            .draw(
                                                false);
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
        });

        $('body').on('click', '.clear', function() {
            var status = $('#status').val();
            var category_id = $('#category_id').val();
            var date = $('#bs-rangepicker-basic').val();
            if (category_id === '' && status === '' && date === '') {
                return;
            }
            $('#category_id').val('').trigger('change');
            $('#status').val('').trigger('change');
            $('#bs-rangepicker-basic').val('');
            ajaxblogdata();
        });

        $('#category_id,#status').on('change', function() {
            ajaxblogdata();
        });

        $('#bs-rangepicker-basic').on('apply.daterangepicker', function(ev, picker) {
            ajaxblogdata();
        });

        // change blog status
        $('body').on('change', '.selstatus', function() {
            status = $(this).val();
            blogid = $(this).attr('data');
            rownumber = $(this).attr('data-rownumber');

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
                        url: "{{ url('/admin/blogstatus') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: status,
                            blogid: blogid,
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated!',
                                    text: 'Blog status has been updated.',
                                });
                                $('#blog_table').DataTable().row(rownumber).ajax
                                    .reload(null,
                                        false);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to update blog status.',
                                });
                                $('#blog_table').DataTable().row(rownumber).ajax
                                    .reload(null, false);
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while updating blog status.',
                            });
                            $('#blog_table').DataTable().row(rownumber).ajax
                                .reload(null, false);
                        }
                    });

                } else {
                    $('#blog_table').DataTable().row(rownumber).ajax.reload(null, false);
                }
            });
        });

        // delete category 
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
                        url: "{{ url('/admin/deletepagedata') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            table: table,
                            field: field,
                            id: id
                        },
                        success: function(result) {
                            if (result.status == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your record has been deleted.',
                                });
                                $('#blog_table').DataTable().row(rownumber)
                                    .remove().draw();
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
