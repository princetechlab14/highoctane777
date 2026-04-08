@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Platform</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('platform', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#platform-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Platform
                            </button>
                        @endif
                        @if (hasPermission('platform', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Platform"
                                data-table='platform' data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Platform
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="platform_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">Name</th>
                                                @if (hasPermission('platform', 'can_edit') || hasPermission('platform', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
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
                                                    <td>{{ $val->name }}</td>
                                                    @if (hasPermission('platform', 'can_edit') || hasPermission('platform', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('platform', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editplatform-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $val->id }}" title="Edit">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('platform', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='platform' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $val->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Platform">
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
            <div class="modal fade" id="platform-modal" tabindex="-1" aria-labelledby="platform-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Platform
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/platform" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="platformform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="slug">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Platform Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Platform Name" id="name">
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
            <div class="modal fade" id="editplatform-modal" tabindex="-1" aria-labelledby="editplatform-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Platform
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/platform" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editplatform_form">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" name="slug" class="slug">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Platform Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Platform Name" id="editplatform_name">
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
            $('#platform-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            datatable = $('#platform_table').DataTable({
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

            $('body').on('change', '#name', function() {
                let url = $(this).val()
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '_') // replace one or more non-alphanumeric with _
                    .replace(/^_+|_+$/g, ''); // remove leading/trailing underscores if any
                $('#platformform input[name="slug"]').val(url);
            });

            $('body').on('change', '#editplatform_name', function() {
                let url = $(this).val()
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z0-9]+/g, '_')
                    .replace(/^_+|_+$/g, '');
                $('#editplatform_form input[name="slug"]').val(url);
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
            $('#platformform, #editplatform_form').each(function() {
                $(this).validate({
                    rules: {
                        name: {
                            required: true
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter platform name"
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
                    url: "{{ url('/admin/platform') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editplatform_form input[name="name"]').val(response
                            .name);
                        $('#editplatform_form input[name="slug"]').val(response
                            .slug);
                        var formAction = "{{ url('/admin/platform') }}/" + id;
                        $('#editplatform_form').attr('action', formAction);
                    }
                });
            });
        });
    </script>
@endsection
