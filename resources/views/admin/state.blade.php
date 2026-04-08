@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">State</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                            data-bs-target="#state-modal">
                            <i class="ti ti-plus fs-4 me-2"></i> Add State
                        </button>
                        <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete State" data-table='state'
                            data-field='id'>
                            <i class="ti ti-trash fs-4 me-2"></i> Delete State
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Select Country</label>
                                    <select name="country_id" id="filter_country_id" class="form-select select2">
                                        <option value="">Select Country</option>
                                        @foreach ($country as $item)
                                            <option value="{{ $item->id }}">{{ $item->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-7">
                                    <label class="form-label">Search</label>
                                    <input type="text" class="form-control" placeholder="Search all data" name="search"
                                        id="search">
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
                                    <table id="state_table" class="table table-striped table-bordered align-middle">
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
                                                <th class="all">Country</th>
                                                <th class="all">State Name</th>
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

            {{-- add modal  --}}
            <div class="modal fade" id="state-modal" tabindex="-1" aria-labelledby="state-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New State
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/state" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="stateform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select Country</label>
                                            <select name="country_id" id="country_id" class="form-select select2">
                                                <option value="">Select Country</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}">{{ $item->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">State Name</label>
                                            <input type="text" class="form-control" name="state_name"
                                                placeholder="State Name">
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
            <div class="modal fade" id="editstate-modal" tabindex="-1" aria-labelledby="editstate-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit State
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/state" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editstateform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select Country</label>
                                            <select name="country_id" id="edit_country_id" class="form-select select2">
                                                <option value="">Select Country</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}">{{ $item->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">State Name</label>
                                            <input type="text" class="form-control" name="state_name"
                                                placeholder="State Name">
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
            $('#filter_country_id').select2({
                placeholder: 'Select Country',
            });
            $('#state-modal').on('shown.bs.modal', function() {
                $('#country_id').select2({
                    dropdownParent: $('#state-modal'),
                    placeholder: 'Select Country',
                    allowClear: true
                });
            });
            $('#editstate-modal').on('shown.bs.modal', function() {
                $('#edit_country_id').select2({
                    dropdownParent: $('#editstate-modal'),
                    placeholder: 'Select Country',
                    allowClear: true
                });
            });

            ajaxstatedata();
            $('#state-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            function ajaxstatedata() {
                if ($.fn.DataTable.isDataTable('#state_table')) {
                    $('#state_table').DataTable().destroy();
                }

                datatable = $('#state_table').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: "pdf",
                            pageSize: 'A4',
                            filename: "State Data",
                            exportOptions: {
                                columns: [0, 2, 3],
                            }
                        },
                        {
                            extend: "csv",
                            filename: "State Data",
                            exportOptions: {
                                columns: [0, 2, 3],
                            }
                        },
                    ],
                    searching: false,
                    responsive: true,
                    lengthMenu: [
                        [15, 50, 100, 500, -1],
                        [15, 50, 100, 500, "All"],
                    ],
                    "columnDefs": [{
                        "orderable": false,
                        "targets": [1, -1]
                    }],
                    "ajax": {
                        url: "{{ url('admin/stateajaxdata') }}",
                        type: 'GET',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.country_id = $('#filter_country_id').val();
                            d.search = $('#search').val();
                        }
                    },
                });
            }

            $('body').on('click', '.clear', function() {
                var filter_country_id = $('#filter_country_id').val();
                var search = $('#search').val();
                if (filter_country_id === '' && search === '') {
                    return;
                }

                $('#filter_country_id').val('').trigger('change');
                $('#search').val('');
                ajaxstatedata();
            });

            $('#filter_country_id').on('change', function() {
                ajaxstatedata();
            });

            $('#search').on('keyup', function() {
                ajaxstatedata();
            });

            // validation 
            $('#stateform, #editstateform').each(function() {
                $(this).validate({
                    rules: {
                        state_name: {
                            required: true
                        },
                        country_id: {
                            required: true
                        }
                    },
                    messages: {
                        state_name: {
                            required: "Please enter state name"
                        },
                        country_id: {
                            required: "Please select country"
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        var select2Container = element.next('.select2-container');
                        if (element.attr("name") === "country_id") {
                            error.insertAfter(select2Container.length ? select2Container :
                                element);
                        } else {
                            error.insertAfter(element);
                        }
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
                    url: "{{ url('/admin/state') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editstateform input[name="state_name"]').val(response.state_name);
                        $('#editstateform select[name="country_id"]').val(response.country_id);
                        var formAction = "{{ url('/admin/state') }}/" + id;
                        $('#editstateform').attr('action', formAction);
                    }
                });
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

            // delete State 
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
        });
    </script>
@endsection
