@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Withdrawals</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('withdrawals', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#withdrawal-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Withdrawal
                            </button>
                        @endif
                        {{-- @if (hasPermission('withdrawals', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Withdrawals"
                                data-table='user' data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Withdrawals
                            </button>
                        @endif --}}
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-label">Select Store</label>
                                    <select name="store_id" id="filter_store_id" class="form-select select2">
                                        <option value="">Select Store</option>
                                        @foreach ($stores as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
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
                                    <table id="withdrawal_table"
                                        class="table table-striped table-bordered align-middle mb-0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="all">No.</th>
                                                {{-- <th class="all">
                                                    <div class="form-check">
                                                        <input class="form-check-input alldatachecks allvaluecheck"
                                                            type="checkbox" id="flexCheckDefault" name="allcheck"
                                                            data="999">
                                                    </div>
                                                </th> --}}
                                                <th class="all">Store</th>
                                                <th class="all">User</th>
                                                <th class="all">Amount</th>
                                                {{-- <th class="all">Payment Method</th> --}}
                                                <th class="none">Date</th>
                                                <th class="all">Withdrawal Date</th>
                                                <th class="all">Notes</th>
                                                @if (hasPermission('withdrawals', 'can_edit') || hasPermission('withdrawals', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="3" style="text-align:right">Total:</th>
                                                <th id="total-amount"></th>
                                                <th colspan="4"></th>
                                            </tr>
                                        </tfoot>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add modal  --}}
            <div class="modal fade" id="withdrawal-modal" tabindex="-1" aria-labelledby="withdrawal-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New Withdrawal
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/withdrawals" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="withdrawalform"
                            style="max-height: calc(100vh - 200px); overflow-y: auto;">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Store</label>
                                        <select name="store_id" class="form-control" required>
                                            <option value="">Select Store</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" step="0.01" name="amount" class="form-control" required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Withdrawal Date</label>
                                        <input type="date" name="withdrawal_date" class="form-control" required>
                                    </div>

                                    {{-- <div class="col-md-12 mb-3">
                                        <label class="form-label">Payment Method</label>
                                        <select name="payment_method" class="form-control">
                                            <option value="cash">Cash</option>
                                            <option value="bank_transfer">Bank Transfer</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                                </button>
                                <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start"
                                    data-bs-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- edit modal --}}
            <div class="modal fade" id="editwithdrawal-modal" tabindex="-1" aria-labelledby="staff-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit Withdrawal
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/withdrawals') }}" role="form" class="form-horizontal"
                            method="post" enctype="multipart/form-data" id="editwithdrawalform">
                            @csrf
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <input type="hidden" name="withdrawal_id" class="withdrawal_id">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Store</label>
                                        <select name="store_id" class="form-control" required>
                                            <option value="">Select Store</option>
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Amount</label>
                                        <input type="number" step="0.01" name="amount" class="form-control"
                                            required>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Withdrawal Date</label>
                                        <input type="date" name="withdrawal_date" class="form-control" required>
                                    </div>

                                    {{-- <div class="col-md-12 mb-3">
                                        <label class="form-label">Payment Method</label>
                                        <select name="payment_method" class="form-control">
                                            <option value="cash">Cash</option>
                                            <option value="bank_transfer">Bank Transfer</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div> --}}

                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2"></textarea>
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

            $('#withdrawal-modal ,#editwithdrawal-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            // datatable 
            ajaxwithdrawal();

            function ajaxwithdrawal() {
                if ($.fn.DataTable.isDataTable('#withdrawal_table')) {
                    $('#withdrawal_table').DataTable().destroy();
                }
                datatable = $('#withdrawal_table').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: 'excel',
                            text: '<i class="ti ti-file-x fs-4"></i>',
                            titleAttr: 'Export to Excel',
                            className: 'btn bg-success-subtle text-success border-0',
                            exportOptions: {
                                columns: ':not(:last-child):not(:nth-child(2))'
                            }
                        },
                        {
                            extend: 'pdf',
                            text: '<i class="ti ti-file fs-4"></i>',
                            titleAttr: 'Export to PDF',
                            className: 'btn bg-danger-subtle text-danger border-0',
                            exportOptions: {
                                columns: ':not(:last-child):not(:nth-child(2))'
                            }
                        },
                        {
                            extend: 'print',
                            text: '<i class="ti ti-printer fs-4"></i>',
                            titleAttr: 'Print',
                            className: 'btn bg-primary-subtle text-primary border-0',
                            exportOptions: {
                                columns: ':not(:last-child):not(:nth-child(2))'
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
                    }],
                    "ajax": {
                        url: "{{ url('admin/withdrawalsajaxdata') }}",
                        type: 'GET',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.store_id = $('#filter_store_id').val();
                        }
                    },
                    footerCallback: function(row, data, start, end, display) {
                        var api = this.api();

                        var total = api
                            .column(3, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                var x = parseFloat(a.toString().replace(/,/g, '')) || 0;
                                var y = parseFloat(b.toString().replace(/,/g, '')) || 0;
                                return x + y;
                            }, 0);

                        var formattedTotal = total.toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });

                        $('#total-amount').html('<b> $' + formattedTotal + '</b>');
                    }
                });
            }

            $('body').on('click', '.clear', function() {
                var filter_store_id = $('#filter_store_id').val();
                if (filter_store_id === '') {
                    return;
                }

                $('#filter_store_id').val('').trigger('change');
                ajaxwithdrawal();
            });

            $('#filter_store_id').on('change', function() {
                ajaxwithdrawal();
            });

            // add validation 
            $('#withdrawalform').validate({
                rules: {
                    store_id: {
                        required: true,
                    },
                    amount: {
                        required: true,
                        number: true,
                    },
                    withdrawal_date: {
                        required: true,
                        date: true,
                    },
                },
                messages: {
                    store_id: {
                        required: "Please select store"
                    },
                    amount: {
                        required: "Please enter amount",
                        number: "Please enter a valid number"
                    },
                    withdrawal_date: {
                        required: "Please select withdrawal date",
                        date: "Please enter a valid date"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
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

            $('#editwithdrawalform').validate({
                rules: {
                    store_id: {
                        required: true,
                    },
                    amount: {
                        required: true,
                        number: true,
                    },
                    withdrawal_date: {
                        required: true,
                        date: true,
                    },
                },
                messages: {
                    store_id: {
                        required: "Please select store"
                    },
                    amount: {
                        required: "Please enter amount",
                        number: "Please enter a valid number"
                    },
                    withdrawal_date: {
                        required: "Please select withdrawal date",
                        date: "Please enter a valid date"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
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

        $('body').on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $('.withdrawal_id').val(id);

            $.ajax({
                url: "{{ url('admin/getwithdrawdata') }}/" + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#editwithdrawalform select[name="store_id"]').val(response.store_id);
                    $('#editwithdrawalform input[name="name"]').val(response.name);
                    $('#editwithdrawalform input[name="amount"]').val(response.amount);
                    $('#editwithdrawalform textarea[name="notes"]').val(response.notes);
                    $('#editwithdrawalform input[name="withdrawal_date"]').val(
                        moment(response.withdrawal_date).format('YYYY-MM-DD')
                    );
                    $('#editwithdrawalform select[name="payment_method"]').val(response.payment_method);

                    var formAction = "{{ url('/admin/withdrawals') }}/" + id;
                    $('#editwithdrawalform').attr('action', formAction);
                },
            });
        });

        // change staff status
        $('body').on('change', '.selstatus', function() {
            let selectBox = $(this);
            let status = selectBox.val();
            let id = selectBox.data('id');
            let oldValue = selectBox.data('current');

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
                        url: "{{ url('/admin/staffstatus') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status: status,
                            id: id,
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success == true) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Updated!',
                                    text: 'Staff status has been updated.',
                                });
                                selectBox.data('current', status);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'Failed to update staff status.',
                                });
                                selectBox.val(oldValue);
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'An error occurred while updating staff status.',
                            });
                            selectBox.val(oldValue);
                        }
                    });

                } else {
                    selectBox.val(oldValue);
                }
            });
        });

        // delete staff 
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
                        url: "{{ url('/admin/deletewithdrawaldata') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(result) {
                            if (result.status == 1) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Deleted!',
                                    text: 'Your record has been deleted.',
                                });
                                $('#withdrawal_table').DataTable().row(rownumber)
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
    </script>
@endsection
