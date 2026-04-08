@extends('admin.app')
@section('body')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        /* #shiftreport_table.table-striped>tbody>tr:nth-of-type(odd)>* { */
        #shiftreport_table.table.dataTable.table-striped>tbody>tr:nth-of-type(2n+1)>* {
            box-shadow: none;
        }

        .row-green td {
            background-color: #d4edda !important;
        }

        .row-red td {
            background-color: #f8d7da !important;
        }
    </style>
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex align-items-center justify-content-between">
                    <h4 class="text-dark mb-0">Shift Wise Report</h4>
                    @if (session('admin')->user_type === 'super_admin')
                        <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 printreport" st="1">
                                <i class="ti ti-download fs-4 me-2"></i> Print Report
                            </button>
                        </div>
                    @endif
                </div>
                <!-- ================= FILTER SECTION ================= -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                @if (in_array($user->user_type, ['super_admin', 'sub_admin']))
                                    <div class="col-md-3">
                                        <label class="form-label">Select Store</label>
                                        <select name="store_id" id="filter_store_id" class="form-select select2">
                                            <option value="">Select Store</option>
                                            @foreach ($stores as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label class="form-label">Select Staff</label>
                                        <select name="user_id" id="filter_user_id" class="form-select select2">
                                            <option value="">All Staff</option>
                                            @foreach ($staffs as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                                <div class="col-md-3">
                                    <label>From Date & Time</label>
                                    <input class="form-control" id="from_datetime" placeholder="From Date & Time" />
                                </div>

                                <div class="col-md-3">
                                    <label>To Date & Time</label>
                                    <input class="form-control" id="to_datetime" placeholder="To Date & Time" />
                                </div>

                                <div class="col-sm-1">
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
                                <table id="shiftreport_table" class="table table-striped table-bordered align-middle m-0"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="all">No.</th>
                                            <th class="all">Store</th>
                                            <th class="none">Staff</th>
                                            <th class="none">Staff Email</th>
                                            <th class="none">Staff Mobile</th>
                                            <th class="all">Login</th>
                                            <th class="all">Logout</th>
                                            <th class="all">Working Hours</th>
                                            <th class="all">Transaction Range</th>
                                            <th class="all">Total Tnx.</th>
                                            <th class="all">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tfoot>
                                        <td colspan="7"></td>
                                        <td id="ptotal"></td>
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
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js">
    </script>
    <script>
        $(document).ready(function() {
            ajaxreportdata();

            $('#from_datetime').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD HH:mm',
            });

            $('#to_datetime').bootstrapMaterialDatePicker({
                format: 'YYYY-MM-DD HH:mm',
            });

            // function ajaxreportdata() {
            //     if ($.fn.DataTable.isDataTable('#shiftreport_table')) {
            //         $('#shiftreport_table').DataTable().destroy();
            //     }

            //     $('#shiftreport_table').DataTable({
            //         processing: true,
            //         responsive: true,
            //         dom: 'Blfrtip',
            //         buttons: [
            //             'print', 'pdf', 'csv'
            //         ],
            //         lengthMenu: [
            //             [25, 50, 100, 500, -1],
            //             [25, 50, 100, 500, "All"],
            //         ],
            //         pageLength: 25,
            //         orderCellsTop: true,
            //         fixedHeader: true,
            //         destroy: true,
            //         "ajax": {
            //             url: "{{ url('admin/getallshiftreportdata') }}",
            //             type: 'POST',
            //             data: function(d) {
            //                 d._token = "{{ csrf_token() }}";
            //                 d.from_datetime = $('#from_datetime').val();
            //                 d.to_datetime = $('#to_datetime').val();
            //                 d.store_id = $('#filter_store_id').val();
            //                 d.user_id = $('#filter_user_id').val();
            //             }
            //         },
            //         "createdRow": function(row, data, dataIndex) {

            //             if (data.DT_RowClass) {
            //                 $(row).addClass(data.DT_RowClass);
            //             }

            //         },
            //         "footerCallback": function(row, data, start, end, display) {
            //             var api = this.api();
            //             var total = api
            //                 .column(10, {
            //                     page: 'current'
            //                 })
            //                 .data()
            //                 .reduce(function(a, b) {
            //                     // Remove commas if present and convert to float
            //                     var x = parseFloat(a.toString().replace(/,/g, '')) || 0;
            //                     var y = parseFloat(b.toString().replace(/,/g, '')) || 0;
            //                     return x + y;
            //                 }, 0);

            //             // Format like PHP number_format(..., 2)
            //             var formattedTotal = total.toLocaleString(undefined, {
            //                 minimumFractionDigits: 2,
            //                 maximumFractionDigits: 2
            //             });

            //             $('#ptotal').html('<b>' + formattedTotal + '</b>');
            //         }
            //     });
            // }
            function ajaxreportdata() {
                if ($.fn.DataTable.isDataTable('#shiftreport_table')) {
                    $('#shiftreport_table').DataTable().destroy();
                }

                $('#shiftreport_table').DataTable({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    pageLength: 25,
                    orderCellsTop: true,
                    fixedHeader: true,
                    destroy: true,
                    lengthMenu: [
                        [25, 50, 100, -1],
                        [25, 50, 100, "All"]
                    ],
                    ajax: {
                        url: "{{ url('admin/getallshiftreportdata') }}",
                        type: 'POST',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.from_datetime = $('#from_datetime').val();
                            d.to_datetime = $('#to_datetime').val();
                            d.store_id = $('#filter_store_id').val();
                            d.user_id = $('#filter_user_id').val();
                        }
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'store'
                        },
                        {
                            data: 'staff'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'mobile'
                        },
                        {
                            data: 'login'
                        },
                        {
                            data: 'logout'
                        },
                        {
                            data: 'working_hours'
                        },
                        {
                            data: 'transaction_range'
                        },
                        {
                            data: 'total_tnx'
                        },
                        {
                            data: 'total_amount'
                        }
                    ],
                    rowCallback: function(row, data) {
                        // Add background class from server
                        if (data.DT_RowClass) {
                            $(row).addClass(data.DT_RowClass);
                        }
                    },
                    columnDefs: [{
                        targets: 10, // Amount column
                        render: function(data, type, row) {
                            return '$' + parseFloat(data).toLocaleString(undefined, {
                                minimumFractionDigits: 2,
                                maximumFractionDigits: 2
                            });
                        }
                    }],
                    footerCallback: function(row, data) {
                        var api = this.api();
                        var total = api.column(10, {
                                page: 'current'
                            }).data()
                            .reduce(function(a, b) {
                                return parseFloat(a.toString().replace(/,/g, '')) + parseFloat(b
                                    .toString().replace(/,/g, ''));
                            }, 0);
                        $('#ptotal').html('<b> $' + total.toLocaleString(undefined, {
                            minimumFractionDigits: 2,
                            maximumFractionDigits: 2
                        }) + '</b>');
                    },
                });
            }

            $('body').on('click', '.clear', function() {
                var filter_user_id = $('#filter_user_id').val();
                var filter_store_id = $('#filter_store_id').val();
                if (filter_user_id !== '' || filter_store_id !== '' || $('#from_datetime').val() !== '' || $('#to_datetime').val() !== '') {
                    $('#from_datetime').val('');
                    $('#to_datetime').val('');
                    $('#filter_store_id').val('').trigger('change');
                    ajaxreportdata();
                }
            });

            $('#filter_store_id, #from_datetime, #to_datetime, #filter_user_id').on('change', function() {
                ajaxreportdata();
            });

            $('.printreport').click(function() {
                var user_id = $('#filter_user_id').val();
                var store_id = $('#filter_store_id').val();
                var status = $(this).attr('st');
                $.ajax({
                    url: "{{ url('admin/printshiftreport') }}",
                    type: "POST",
                    cache: false,
                    // dataType: "json",
                    data: {
                        _token: "{{ csrf_token() }}",
                        user_id: user_id,
                        store_id: store_id,
                        status: status,
                        from_datetime: $('#from_datetime').val(),
                        to_datetime: $('#to_datetime').val()
                    },
                    success: function(result) {
                        // if (status == 0) {
                            var a = document.createElement("a");
                            a.href = result.url;
                            a.setAttribute("target", '_blank');
                            a.click();
                        // } else {
                        //     var a = document.createElement("a");
                        //     a.href = result.url;
                        //     a.setAttribute("download", result.filename);
                        //     a.click();
                        // }

                        // var iframe = document.createElement('iframe');
                        // iframe.style.display = 'none';
                        // iframe.src = result.url;
                        // document.body.appendChild(iframe);
                        // iframe.onload = function() {
                        //     iframe.contentWindow.focus();
                        //     iframe.contentWindow.print();
                        // };

                        // var printWindow = window.open('', '_blank');
                        // // printWindow.document.write(result);
                        // // printWindow.document.close();
                        // printWindow.document.open();
                        // printWindow.document.write(result);

                        // setTimeout(function() {
                        //     printWindow.print();
                        // }, 500);
                    }

                });
            });
        });
    </script>
@endsection
