@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex align-items-center justify-content-between">
                    <h4 class="text-dark mb-0">Subscribe</h4>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <label class="form-label col-form-label">Search Date</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="bs-rangepicker-basic"
                                        placeholder="Select Date" name="date">
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
                                <table id="subscribe_table"
                                    class="table table-striped table-bordered align-middle">
                                    <thead>
                                        <tr>
                                            <th class="all">No.</th>
                                            <th class="all">Email</th>
                                            <th class="all">Date</th>
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            ajaxleaddata();

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

            function ajaxleaddata() {
                if ($.fn.DataTable.isDataTable('#subscribe_table')) {
                    $('#subscribe_table').DataTable().destroy();
                }

                $('#subscribe_table').DataTable({
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
                        url: "{{ url('admin/subscribeajaxdata') }}",
                        type: 'POST',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.daterange = $('#bs-rangepicker-basic').val();
                        }
                    },
                });
            }

            $('body').on('click', '.clear', function() {
                var searchValue = $('#bs-rangepicker-basic').val();
                if (searchValue !== '') {
                    $('#bs-rangepicker-basic').val('');
                    ajaxleaddata();
                }
            });

            $('#bs-rangepicker-basic').on('apply.daterangepicker', function(ev, picker) {
                ajaxleaddata();
            });

        });
    </script>
@endsection
