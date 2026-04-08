@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Blog Category</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                            data-bs-target="#blogcategory-modal">
                            <i class="ti ti-plus fs-4 me-2"></i> Add Blog Category
                        </button>
                        <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Blog Category"
                            data-table='blogcategory' data-field='id'>
                            <i class="ti ti-trash fs-4 me-2"></i> Delete Blog Category
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="blogcategory_table" class="table table-striped table-bordered align-middle">
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
                                                <th class="all">Blog Category Name</th>
                                                <th class="all"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($list as $key => $val)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input alldatachecks_999"
                                                                type="checkbox" id="flexCheckDefault" name="alldatachecks"
                                                                data-rownumber = "{{ $key }}"
                                                                value="{{ $val->id }}">
                                                        </div>
                                                    </td>
                                                    <td>{{ $val->blog_category_name }}</td>
                                                    <td>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editblogcategory-modal"
                                                            class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                            data-id="{{ $val->id }}" title="Edit">
                                                            <i class="fs-5 ti ti-edit"></i>
                                                        </button>

                                                        <button type='button'
                                                            class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                            data-table='blogcategory' data-field='id'
                                                            data-rownumber="{{ $key }}"
                                                            data-value="{{ $val->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Blog Category">
                                                            <i class="fs-5 ti ti-trash"></i>
                                                        </button>
                                                    </td>
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
            <div class="modal fade" id="blogcategory-modal" tabindex="-1" aria-labelledby="blogcategory-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Blog Category
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/blogcategory" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="blogcategoryform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="blog_category_url">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Blog Category Name</label>
                                            <input type="text" class="form-control" name="blog_category_name"
                                                placeholder="Blog Category Name" id="blog_category_name">
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
            <div class="modal fade" id="editblogcategory-modal" tabindex="-1" aria-labelledby="editblogcategory-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Blog Category
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/blogcategory" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editblogcategoryform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="blog_category_url" class="blog_category_url">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Blog Category Name</label>
                                            <input type="text" class="form-control" name="blog_category_name"
                                                placeholder="Blog Category Name" id="editblog_category_name">
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
            $('#blogcategory-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            datatable = $('#blogcategory_table').DataTable({
                dom: 'Blfrtip',
                buttons: [
                    'print', 'pdf', 'csv'
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

            $('body').on('change', '#blog_category_name', function() {
                url = $('#blog_category_name').val().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();
                $('#blogcategoryform input[name="blog_category_url"]').val(url);
            });
            $('body').on('change', '#editblog_category_name', function() {
                url = $('#editblog_category_name').val().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();
                $('#editblogcategoryform input[name="blog_category_url"]').val(url);
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

            // delete socialmedia 
            $('body').on('click', '.deletedata', function() {
                var table = $(this).attr('data-table');
                var field = $(this).attr('data-field');
                var id = $(this).attr('data-value');
                var row = $(this).closest('tr');
                el = this;

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
                                    datatable.row(row).remove().draw();
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

            // validation 
            $('#blogcategoryform, #editblogcategoryform').each(function() {
                $(this).validate({
                    rules: {
                        blog_category_name: {
                            required: true
                        },
                    },
                    messages: {
                        blog_category_name: {
                            required: "Please enter blog category name"
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    submitHandler: function(form) {
                        $(form).find(':submit').prop('disabled', true).text('Submitting...');
                        form.submit();
                    }
                });
            });

            $('body').on('click', '.edit-btn', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/admin/blogcategory') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editblogcategoryform input[name="blog_category_name"]').val(response
                            .blog_category_name);
                        $('#editblogcategoryform input[name="blog_category_url"]').val(response
                            .blog_category_url);
                        var formAction = "{{ url('/admin/blogcategory') }}/" + id;
                        $('#editblogcategoryform').attr('action', formAction);
                    }
                });
            });
        });
    </script>
@endsection
