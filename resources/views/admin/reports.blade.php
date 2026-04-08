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
                    <h4 class="text-dark mb-0">Store Wise Report</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 printreport" st="1">
                            <i class="ti ti-download fs-4 me-2"></i> Print Report
                        </button>
                    </div>
                </div>
                <!-- ================= FILTER SECTION ================= -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Select Store</label>
                                    <select name="store_id" id="filter_store_id" class="form-select select2">
                                        <option value="">Select Store</option>
                                        @foreach ($stores as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Search From & Select To Date</label>
                                    <input type="text" class="form-control" id="bs-rangepicker-basic"
                                        placeholder="Select Date" name="date">
                                </div>
                                <div class="col-md-4 mb-3">
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
                                <div class="col-md-3">
                                    <label class="form-label">Select Payment Method</label>
                                    <select name="payment_method" id="filter_payment_method" class="form-select select2">
                                        <option value="">Select Payment Method</option>
                                        <option value="stripe">Stripe</option>
                                        <option value="paypal">Paypal</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
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
                                <table id="report_table" class="table table-striped table-bordered align-middle m-0"
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
                                            <th class="none">Platform</th>
                                            <th class="all">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tfoot>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td id="ptotal"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tfoot>
                                    </tbody>
                                </table>
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
            ajaxreportdata();

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

            function ajaxreportdata() {
                if ($.fn.DataTable.isDataTable('#report_table')) {
                    $('#report_table').DataTable().destroy();
                }

                $('#report_table').DataTable({
                    responsive: true,
                    dom: 'Blfrtip',
                    // scrollX: true,
                    // autoWidth: false,
                    buttons: [
                        'print', 'pdf', 'csv'
                    ],
                    lengthMenu: [
                        [25, 50, 100, 500, -1],
                        [25, 50, 100, 500, "All"],
                    ],
                    pageLength: 25,
                    orderCellsTop: true,
                    fixedHeader: true,
                    destroy: true,
                    "ajax": {
                        url: "{{ url('admin/getallreportdata') }}",
                        type: 'POST',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.daterange = $('#bs-rangepicker-basic').val();
                            d.status_id = $('#filter_status_id').val();
                            d.filter_platform_id = $('#filter_platform_id').val();
                            d.filter_payment_method = $('#filter_payment_method').val();
                            d.store_id = $('#filter_store_id').val();
                        }
                    },
                    "columnDefs": [{
                        targets: 4, // Amount column
                        render: function(data, type, row) {
                            return '$' + parseFloat(data).toLocaleString(undefined, {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        }
                    }],
                    "footerCallback": function(row, data, start, end, display) {
                        var api = this.api();
                        var total = api
                            .column(4, {
                                page: 'current'
                            })
                            .data()
                            .reduce(function(a, b) {
                                // Remove commas if present and convert to float
                                var x = parseFloat(a.toString().replace(/,/g, '')) || 0;
                                var y = parseFloat(b.toString().replace(/,/g, '')) || 0;
                                return x + y;
                            }, 0);

                        // Format like PHP number_format(..., 2)
                        var formattedTotal = total.toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        });

                        $('#ptotal').html('<b> $' + formattedTotal + '</b>');
                    }
                });
            }

            $('body').on('click', '.clear', function() {
                var searchValue = $('#bs-rangepicker-basic').val();
                var filter_payment_method = $('#filter_payment_method').val();
                var filter_store_id = $('#filter_store_id').val();
                var filter_status_id = $('#filter_status_id').val();
                var filter_platform_id = $('#filter_platform_id').val();
                if (searchValue !== '' || filter_status_id !== '' || filter_store_id !== '' ||
                    filter_payment_method != '' || filter_platform_id !== '') {
                    $('#bs-rangepicker-basic').val('');
                    $('#filter_payment_method').val('').trigger('change');
                    $('#filter_store_id').val('').trigger('change');
                    $('#filter_status_id').val('').trigger('change');
                    $('#filter_platform_id').val('').trigger('change');
                    ajaxreportdata();
                }
            });

            $('#filter_store_id, #filter_payment_method, #filter_status_id, #filter_platform_id').on('change',
                function() {
                    ajaxreportdata();
                });

            $('#bs-rangepicker-basic').on('apply.daterangepicker', function(ev, picker) {
                ajaxreportdata();
            });

            $('.printreport').click(function() {
                var daterange = $('#bs-rangepicker-basic').val();
                var store_id = $('#filter_store_id').val();
                var filter_payment_method = $('#filter_payment_method').val();
                var filter_status_id = $('#filter_status_id').val();
                var filter_platform_id = $('#filter_platform_id').val();
                var status = $(this).attr('st');
                $.ajax({
                    url: "{{ url('admin/printstorereport') }}",
                    type: "POST",
                    cache: false,
                    dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        daterange: daterange,
                        store_id: store_id,
                        status: status,
                        filter_payment_method: filter_payment_method,
                    },
                    success: function(result) {
                        console.log(result);
                        if (status == 0) {
                            var a = document.createElement("a");
                            a.href = result.url;
                            a.setAttribute("target", '_blank');
                            a.click();
                        } else {
                            var a = document.createElement("a");
                            a.href = result.url;
                            a.setAttribute("download", result.filename);
                            a.click();
                        }
                    }
                });
            });

        });
    </script>
@endsection
