@extends('admin.app')
@section('body')
    <style type="text/css">
        table {
            width: 100%;
            table-layout: fixed;
        }

        th,
        td {
            word-break: break-word;
            word-wrap: break-word;
        }
    </style>
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex align-items-center justify-content-between">
                    <h4 class="text-dark mb-0">Transactions</h4>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Search Date</label>
                                    <input type="text" class="form-control" id="bs-rangepicker-basic"
                                        placeholder="Select Date" name="date">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Select Store</label>
                                    <select name="store_id" id="filter_store_id" class="form-select select2">
                                        <option value="">Select Store</option>
                                        @foreach ($stores as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }} -
                                                {{ ucfirst($item->store_type) }} Store
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Select Status</label>
                                    <select name="status_id" id="filter_status_id" class="form-select select2">
                                        <option value="">Select Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="success">Success</option>
                                        <option value="failed">Failed</option>
                                        <option value="expired">Expired</option>
                                        <option value="canceled">Canceled</option>
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Select Platform</label>
                                    <select name="platform_id" id="filter_platform_id" class="form-select select2">
                                        <option value="">Select Platform</option>
                                        @foreach ($platform as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Select Payment Method</label>
                                    <select name="payment_method" id="filter_payment_method" class="form-select select2">
                                        <option value="">Select Payment Method</option>
                                        <option value="stripe">Stripe</option>
                                        <option value="paypal">Paypal</option>
                                    </select>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <input type="button" class="btn bg-danger-subtle text-danger text-start clear"
                                        value="Clear" data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Clear Filter">
                                </div>
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
                                <table id="transactions_table" class="table table-striped table-bordered align-middle m-0"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="all">No.</th>
                                            <th class="none">Transaction Id</th>
                                            <th class="all">MobileId</th>
                                            <th class="all">Store</th>
                                            <th class="all">Amount</th>
                                            <th class="all">Payment Method</th>
                                            <th class="all">Status</th>
                                            <th class="all">Customer Name</th>
                                            <th class="all">Customer Email</th>
                                            <th class="all">Customer Mobile</th>
                                            <th class="none">Username</th>
                                            <th class="none">Platfom</th>
                                            <th class="all">Date</th>
                                            {{-- @if (in_array($user->user_type, ['super_admin', 'sub_admin']))
                                                <th class="all"></th>
                                            @endif --}}
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="payoutModal" tabindex="-1" aria-labelledby="payout-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Payout Amount
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="payoutForm">
                            <div class="modal-body">
                                <input type="hidden" id="transaction_id">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-group">
                                            <label class="form-label">Winning Payout Amount</label>
                                            <input type="number" id="payout_amount" class="form-control"
                                                placeholder="Enter amount" name="amount">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-label">Reason</label>
                                            <textarea id="payout_reason" class="form-control" placeholder="Enter reason (optional)" name="reason"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="submitPayout" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="transferModal" tabindex="-1" aria-labelledby="transfer-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Transafer Store
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form method="POST" action="javascript:void(0)" id="transferForm">
                            @csrf
                            <input type="hidden" name="transaction_id" id="transfer_transaction_id">

                            <div class="modal-body">
                                <label class="form-label">Store</label>
                                <select name="transfer_store_id" class="form-control" id="transfer_store_id" required>
                                    <option value="">Select Store</option>
                                    @foreach ($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary" id="confirmTransfer">Transfer</button>
                            </div>
                        </form>
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
            $('#filter_store_id').select2({
                placeholder: 'Select Stores',
            });

            ajaxtransactionsdata();

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

            function ajaxtransactionsdata() {
                if ($.fn.DataTable.isDataTable('#transactions_table')) {
                    $('#transactions_table').DataTable().destroy();
                }

                $('#transactions_table').DataTable({
                    responsive: true,
                    dom: 'Blfrtip',
                    buttons: [
                        'print', 'pdf', 'csv'
                    ],
                    lengthMenu: [
                        [25, 50, 100, 500, -1],
                        [25, 50, 100, 500, "All"],
                    ],
                    pageLength: 25,
                    "ajax": {
                        url: "{{ url('admin/transactionsajaxdata') }}",
                        type: 'POST',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.daterange = $('#bs-rangepicker-basic').val();
                            d.status_id = $('#filter_status_id').val();
                            d.filter_payment_method = $('#filter_payment_method').val();
                            d.filter_platform_id = $('#filter_platform_id').val();
                            d.store_id = $('#filter_store_id').val();
                        }
                    },
                });
            }

            $('body').on('click', '.clear', function() {
                var searchValue = $('#bs-rangepicker-basic').val();
                var filter_status_id = $('#filter_status_id').val();
                var filter_payment_method = $('#filter_payment_method').val();
                var filter_platform_id = $('#filter_platform_id').val();
                var filter_store_id = $('#filter_store_id').val();
                if (searchValue !== '' || filter_status_id !== '' || filter_payment_method != '' ||
                    filter_store_id !== '' || filter_platform_id !== '') {
                    $('#bs-rangepicker-basic').val('');
                    $('#filter_status_id').val('').trigger('change');
                    $('#filter_payment_method').val('').trigger('change');
                    $('#filter_platform_id').val('').trigger('change');
                    $('#filter_store_id').val('').trigger('change');
                    ajaxtransactionsdata();
                }
            });

            $('#filter_status_id, #filter_store_id, #filter_payment_method, #filter_platform_id').on('change',
                function() {
                    ajaxtransactionsdata();
                });

            $('#bs-rangepicker-basic').on('apply.daterangepicker', function(ev, picker) {
                ajaxtransactionsdata();
            });

        });
    </script>
    <script>
        $(document).on('click', '.payoutBtn', function() {
            let id = $(this).data('id');
            let amount = $(this).data('amount');

            $('#transaction_id').val(id);
            // $('#payout_amount').val(amount);
            $('#payoutModal').modal('show');
        });

        $('#payoutForm').validate({
            rules: {
                amount: {
                    required: true,
                    number: true,
                    min: 1
                },
            },
            messages: {
                amount: {
                    required: "Please enter amount",
                    number: "Enter a valid number",
                    min: "Amount must be at least 1"
                },
            },
            submitHandler: function(form) {
                let transaction_id = $('#transaction_id').val();
                let amount = $('#payout_amount').val();
                let reason = $('#payout_reason').val();

                // AJAX submission here
                $.ajax({
                    url: "{{ url('admin/payouts') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        transaction_id: transaction_id,
                        amount: amount,
                        reason: reason
                    },
                    beforeSend: function() {
                        $('#submitPayout').prop('disabled', true).text('Processing...');
                    },
                    success: function(res) {
                        if (res.status) {
                            alert(res.message);
                            $('#payoutModal').modal('hide');
                            location.reload();
                        } else {
                            alert(res.message);
                        }
                    },
                    complete: function() {
                        $('#submitPayout').prop('disabled', false).text('Submit');
                    }
                });
            }
        });

        $(document).on('click', '.transferBtn', function() {
            let id = $(this).data('id');
            $('#transfer_transaction_id').val(id);
            $('#transferModal').modal('show');
        });

        $('#transferForm').validate({
            rules: {
                transfer_store_id: {
                    required: true,
                },
            },
            messages: {
                transfer_store_id: {
                    required: "Please select store",
                },
            },
            submitHandler: function(form) {
                let transaction_id = $('#transfer_transaction_id').val();
                let store = $('#transfer_store_id').val();

                // AJAX submission here
                $.ajax({
                    url: "{{ url('admin/transfer-transaction') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        transaction_id: transaction_id,
                        store: store,
                    },
                    beforeSend: function() {
                        $('#confirmTransfer').prop('disabled', true).text('Processing...');
                    },
                    success: function(res) {
                        if (res.status) {
                            $('#transferModal').modal('hide');
                            location.reload();
                            toastr.success("Transfer Successfully");
                        } else {
                            toastr.error("Not Transfer");
                        }
                    },
                    complete: function() {
                        $('#submitPayout').prop('disabled', false).text('Submit');
                    }
                });
            }
        });
    </script>
@endsection
