@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Roles</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('roles', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#roles-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Role
                            </button>
                        @endif
                        @if (hasPermission('roles', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Roles" data-table='roles'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Roles
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="roles_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">Role</th>
                                                @if (hasPermission('roles', 'can_edit') || hasPermission('roles', 'can_delete'))
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
                                                    @if (hasPermission('roles', 'can_edit') || hasPermission('roles', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('roles', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editroles-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $val->id }}" title="Edit">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif

                                                            @if ($val->is_delete == 1 && hasPermission('roles', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='roles' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $val->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete Role">
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
            <div class="modal fade" id="roles-modal" tabindex="-1" aria-labelledby="roles-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Role
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/roles" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="rolesform"
                            style="max-height: calc(100vh - 200px); overflow-y: auto;">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Role Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Role Name" id="name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">User Type</label>
                                            <select name="user_type" class="form-control">
                                                <option value="">Select User Type</option>
                                                <option value="super_admin">Super Admin</option>
                                                <option value="sub_admin">Sub Admin</option>
                                                <option value="staff">Staff</option>
                                                <option value="customer">Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
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
                                                <tbody>
                                                    @foreach ($features as $feature)
                                                        <tr>
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
                                    <button type="button"
                                        class="btn bg-danger-subtle text-danger  waves-effect text-start"
                                        data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- edit modal  --}}
            <div class="modal fade" id="editroles-modal" tabindex="-1" aria-labelledby="editroles-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Role
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/roles" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="editrolesform">
                            @csrf
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Role Name</label>
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Role Name" id="editroles_name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">User Type</label>
                                            <select name="user_type" class="form-control">
                                                <option value="">Select User Type</option>
                                                <option value="super_admin">Super Admin</option>
                                                <option value="sub_admin">Sub Admin</option>
                                                <option value="staff">Staff</option>
                                                <option value="customer">Customer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Permissions</label>
                                            <table class="table table-bordered" id="editPermissionsTable">
                                                <thead>
                                                    <tr>
                                                        <th>Feature</th>
                                                        <th>View</th>
                                                        <th>Create</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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
            $('#roles-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            datatable = $('#roles_table').DataTable({
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
            $('#rolesform, #editrolesform').each(function() {
                $(this).validate({
                    rules: {
                        name: {
                            required: true
                        },
                        user_type: {
                            required: true
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter role name"
                        },
                        user_type: {
                            required: "Please select user type"
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
                    url: "{{ url('/admin/roles') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editrolesform input[name="name"]').val(response.roles.name);
                        $('#editrolesform select[name="user_type"]').val(response.roles
                            .user_type);

                        let html = '';
                        response.features.forEach(feature => {
                            let perms = response.permissions[feature.id] || {};
                            html += `<tr>
                        <td>${feature.name}</td>
                        <td><input type="checkbox" name="permissions[${feature.id}][view]" ${perms.can_view ? 'checked' : ''}></td>
                        <td><input type="checkbox" name="permissions[${feature.id}][create]" ${perms.can_create ? 'checked' : ''}></td>
                        <td><input type="checkbox" name="permissions[${feature.id}][edit]" ${perms.can_edit ? 'checked' : ''}></td>
                        <td><input type="checkbox" name="permissions[${feature.id}][delete]" ${perms.can_delete ? 'checked' : ''}></td>
                    </tr>`;
                        });
                        $('#editPermissionsTable tbody').html(html);

                        var formAction = "{{ url('/admin/roles') }}/" + id;
                        $('#editrolesform').attr('action', formAction);
                    }
                });
            });
        });
    </script>
@endsection
