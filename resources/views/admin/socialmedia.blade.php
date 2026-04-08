@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Social Media</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                            data-bs-target="#socialmedia-modal">
                            <i class="ti ti-plus fs-4 me-2"></i> Add Social Media
                        </button>
                        <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Social Media"
                            data-table='socialmedia' data-field='id'>
                            <i class="ti ti-trash fs-4 me-2"></i> Delete Social Media
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="social_media_table" class="table table-striped table-bordered align-middle">
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
                                                <th class="all">Icon</th>
                                                <th class="all">Social Media</th>
                                                <th class="all">Link</th>
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
                                                    <td class="text-center"><i class="{{ $val->icon }} fs-6"></i></td>
                                                    <td>{{ $val->name }}</td>
                                                    <td>
                                                        <a href=" {{ $val->link }}"> {{ $val->link }} </a>
                                                    </td>
                                                    <td>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editsocialmedia-modal"
                                                            class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                            data-id="{{ $val->id }}" title="Edit">
                                                            <i class="fs-5 ti ti-edit"></i>
                                                        </button>

                                                        <button type='button'
                                                            class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                            data-table='socialmedia' data-field='id'
                                                            data-rownumber="{{ $key }}"
                                                            data-value="{{ $val->id }}" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" title="Delete Social Media">
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
            <div class="modal fade" id="socialmedia-modal" tabindex="-1" aria-labelledby="socialmedia-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Social Media
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/socialmedia" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="socialmediaform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Social Media</label>
                                            <select class="form-control form-select" name="font_id" id="font_id">
                                                <option value="">Select Social Media</option>
                                                @foreach ($icons as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Link</label>
                                            <input type="text" name="link" class="form-control"
                                                placeholder="https://facebook.com/abc">
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
            <div class="modal fade" id="editsocialmedia-modal" tabindex="-1" aria-labelledby="socialmedia-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Social Media
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/socialmedia" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editsocialmediaform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Social Media</label>
                                            <select class="form-control form-select" name="font_id" id="editfont_id">
                                                <option value="">Select Social Media</option>
                                                @foreach ($icons as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Link</label>
                                            <input type="text" name="link" class="form-control"
                                                placeholder="https://facebook.com/abc">
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
            $('#socialmedia-modal').on('shown.bs.modal', function() {
                $('#font_id').select2({
                    dropdownParent: $('#socialmedia-modal'),
                    placeholder: 'Select Social Media',
                    allowClear: true
                });
            });

            $('#editsocialmedia-modal').on('shown.bs.modal', function() {
                $('#editfont_id').select2({
                    dropdownParent: $('#editsocialmedia-modal'),
                    placeholder: 'Select Social Media',
                    allowClear: true
                });
            });

            var datatable;
            $('#socialmedia-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            datatable = $('#social_media_table').DataTable({
                dom: 'Blfrtip',
                buttons: [{
                        extend: "pdf",
                        pageSize: 'A4',
                        filename: "Social Media Data",
                        exportOptions: {
                            columns: [0, 3, 4],
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Social Media Data",
                        exportOptions: {
                            columns: [0, 3, 4],
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
            $('#socialmediaform, #editsocialmediaform').each(function() {
                $(this).validate({
                    rules: {
                        font_id: {
                            required: true
                        },
                        link: {
                            required: true
                        },
                    },
                    messages: {
                        font_id: {
                            required: "Please select social media"
                        },
                        link: {
                            required: "Please enter link"
                        },
                    },
                    errorPlacement: function(error, element) {
                        var select2Container = element.next('.select2-container');
                        if (element.attr("name") === "font_id") {
                            error.insertAfter(select2Container.length ? select2Container :
                                element);
                        } else {
                            error.insertAfter(element);
                        }
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
                    url: "{{ url('/admin/socialmedia') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editsocialmediaform select[name="font_id"]').val(response.icon_id);
                        $('#editsocialmediaform input[name="link"]').val(response.link);
                        var formAction = "{{ url('/admin/socialmedia') }}/" + id;
                        $('#editsocialmediaform').attr('action', formAction);
                    }
                });
            });
        });
    </script>
@endsection
