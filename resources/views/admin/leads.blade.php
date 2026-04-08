@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Leads</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('leads', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#leads-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add Lead
                            </button>
                        @endif
                        @if (hasPermission('leads', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Lead" data-table='leads'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete Leads
                            </button>
                        @endif
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Search Date</label>
                                    <input type="text" class="form-control" id="bs-rangepicker-basic"
                                        placeholder="Select Date">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Select Source</label>
                                    <select name="source" class="form-select select2" id="source">
                                        <option value="">Select Source</option>
                                        <option value="0">Offline</option>
                                        <option value="1">Website</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Select Status</label>
                                    <select name="status" class="form-select select2" id="status">
                                        <option value="">Select Status</option>
                                        <option value="0">New</option>
                                        <option value="1">Processing</option>
                                        <option value="2">Confirm</option>
                                        <option value="3">Cancel</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <label class="form-label">Search</label>
                                    <input type="text" class="form-control" placeholder="Search all data" name="search"
                                        id="search">
                                </div>
                                <div class="col-md-3 d-flex justify-content-start align-items-end">
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
                                    <table id="l_table" class="table table-striped table-bordered align-middle mb-0"
                                        style="width:100%">
                                        <thead>
                                            <input type="hidden" name="lead_id" class="lead_id"
                                                value="{{ $id }}">
                                            <tr class="th">
                                                <th class="all">No. </th>
                                                <th class="all">
                                                    <div class="form-check">
                                                        <input class="form-check-input alldatachecks allvaluecheck"
                                                            type="checkbox" id="flexCheckDefault" name="allcheck"
                                                            data="999">
                                                    </div>
                                                </th>
                                                <th class="all">Name</th>
                                                <th class="all">Mobile No.</th>
                                                <th class="all">Email</th>
                                                <th class="all">Source</th>
                                                <th class="all">Date</th>
                                                <th class="none">Subject</th>
                                                <th class="none">Comment</th>
                                                <th class="all">Status</th>
                                                <th class="all"> </th>
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
    </div>

    {{-- add modal --}}
    <div class="modal fade" id="leads-modal" tabindex="-1" aria-labelledby="leads-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Add New Lead
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin') }}/leads" role="form" class="form-horizontal leadform" method="post"
                    enctype="multipart/form-data" id="leadform">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control phone_validate" name="mobile"
                                        placeholder="Mobile Number" id="addintl_mobile">
                                    <input type="hidden" name="country_code" id="addcountry_code">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="text" name="date" class="form-control mydatepicker"
                                        placeholder="Date" value="{{ date('m/d/Y') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputsubject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" type="message"class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        <button type="button" class="btn bg-danger-subtle text-danger text-start"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- edit modal --}}
    <div class="modal fade" id="editleads-modal" tabindex="-1" aria-labelledby="editleads-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Lead
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin') }}/leads" role="form" class="form-horizontal" method="post"
                    enctype="multipart/form-data" id="editleadform">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control phone_validate" name="mobile"
                                        placeholder="Mobile Number" id="editintl_mobile">
                                    <input type="hidden" name="country_code" id="editcountry_code">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Date</label>
                                    <input type="text" name="date" class="form-control mydatepicker"
                                        placeholder="Date" value="{{ date('m/d/Y') }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputsubject" class="form-label">Subject</label>
                                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" type="message"class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        <button type="button" class="btn bg-danger-subtle text-danger text-start"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- lead followup  --}}
    <div class="modal fade" id="followup-modal" tabindex="-1" aria-labelledby="followup-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Add Follow up Reminder
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" method="post" action="{{ url('admin/leadfollowup') }}" id="followupform">
                    @csrf
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" name="l_id" class="l_id">
                                <div class="mb-3">
                                    <label class="form-label">Next Follow Up Date</label>
                                    <input type="datetime-local" name="n_f_date" class="form-control"
                                        placeholder="Next Follow Up Date" value="{{ date('d-m-Y') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Comment / Message</label>
                                    <textarea name="comment" rows="5" class="form-control" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary submitfollowup" id="submit">
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
    {{-- lead cancel reason  --}}
    <div class="modal fade" id="leadcancel-modal" tabindex="-1" aria-labelledby="leadcancel-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Add Lead Cancel Reason
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" method="post" action="{{ url('admin/leadcancel') }}" id="leadcancelform">
                    @csrf
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" id="leadcancel_id" name="leadcancel_id" class="leadcancel_id">
                                <div class="mb-3">
                                    <label class="form-label">Reason</label>
                                    <textarea name="cancel_reason" rows="5" class="form-control" placeholder="Cancel Reason"></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary submitcancelreason" id="submit">
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
    {{-- lead mail  --}}
    <div class="modal fade" id="leadsmail-modal" tabindex="-1" aria-labelledby="leadsmail-modal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Send Mail
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form role="form" method="post" action="{{ url('admin/leadmail') }}" id="leadmailform">
                    @csrf
                    <div class="modal-body">
                        <div class="form-body">
                            <div class="row">
                                <input type="hidden" id="leadmail_id" name="leadmail_id" class="leadmail_id">
                                <div class="mb-3 emailtemp">
                                    <label class="form-label">Email Template</label>
                                    <select class="form-control form-select" name="e_id" id="e_id">
                                        <option value="">Select Email Template</option>
                                        @foreach ($emailtemplate as $value)
                                            <option value="{{ $value->id }}"> {{ $value->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary submitmail" id="submit">
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
    {{-- Lead detail  --}}
    <div class="modal fade" id="history-modal" tabindex="-1" aria-labelledby="history-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Lead Details
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-with-tabs">
                        <div class="card">
                            <ul class="nav nav-pills user-profile-tab border-bottom d-flex justify-content-center"
                                id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                        id="pills-lead-info-tab" data-bs-toggle="pill" data-bs-target="#pills-lead-info"
                                        type="button" role="tab" aria-controls="pills-lead-info"
                                        aria-selected="true">
                                        Lead Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button
                                        class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-6 fw-bold"
                                        id="pills-followup-tab" data-bs-toggle="pill" data-bs-target="#pills-followup"
                                        type="button" role="tab" aria-controls="pills-followup"
                                        aria-selected="false">
                                        Lead Follow Up History
                                    </button>
                                </li>
                            </ul>
                            <div>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-lead-info" role="tabpanel"
                                        aria-labelledby="pills-lead-info-tab" tabindex="0">
                                        <form class="form-horizontal">
                                            <div class="form-body">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">Status:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadstatus"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">Source:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadsource"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">
                                                                    Name:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadname"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">Date:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leaddate"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">Mobile:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadmobile"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="form-label text-end col-md-3">Subject:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadsubject"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">Email:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leademail"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="form-label text-end col-md-3">Message:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadmessage"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row d-none" id="cancelReasonRow">
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label class="form-label text-end col-md-3">Reason:</label>
                                                                <div class="col-md-9">
                                                                    <p id="leadcancelreason"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="pills-followup" role="tabpanel"
                                        aria-labelledby="pills-followup-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex align-items-stretch">
                                                <div class="w-100">
                                                    <div class="card-body">
                                                        <div class="accordion" id="followuphistory">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger  waves-effect text-start"
                        data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#source').select2({
                placeholder: 'Select Source',
            });

            $('#status').select2({
                placeholder: 'Select Status',
            });

            $('#leadsmail-modal').on('shown.bs.modal', function() {
                $('#e_id').select2({
                    dropdownParent: $('#leadsmail-modal'),
                    placeholder: 'Select Email Template',
                    allowClear: true
                });
            });

            var datatable;
            var leadid = $('.lead_id').val();
            ajaxleaddata(leadid);

            $('#leads-modal, #followup-modal, #leadsmail-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });
    </script>
    <script>
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

        // lead ajax datatable
        function ajaxleaddata(leadid) {
            datatable = $('#l_table').DataTable({
                responsive: true,
                processing: false,
                serverSide: true,
                searching: false,
                dom: 'Blfrtip',
                buttons: [{
                        extend: "pdf",
                        pageSize: 'A3',
                        filename: "Lead Data",
                        exportOptions: {
                            format: {
                                body: function(data, row, column, node) {
                                    if (typeof data !== 'string') {
                                        data = String(
                                            data);
                                    }

                                    if (row === 8) {
                                        if (data.includes('<select')) {
                                            var match = data.match(
                                                /<option[^>]*selected[^>]*>([^<]+)<\/option>/
                                            );
                                            if (match && match[1]) {
                                                return match[1]
                                                    .trim(); // Return the selected option text (Active/Inactive)
                                            }
                                        } else {
                                            // If the status is just a number or text, check the value directly
                                            if (data == '0') {
                                                return 'New';
                                            } else if (data == '1') {
                                                return 'Processing';
                                            } else if (data == '2') {
                                                return 'Confirm';
                                            } else if (data == '3') {
                                                return 'Cancel';
                                            }
                                        }
                                    }

                                    return data.replace(/(<([^>]+)>)/ig,
                                        '');
                                }
                            },
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9],
                        },
                        orientation: 'portrait',
                        pageSize: 'A4',
                        customize: function(doc) {
                            doc.layout = 'lightHorizotalLines;'
                            doc.pageMargins = [5, 0, 5, 0];
                            doc.defaultStyle.fontSize = 7;
                            doc.styles.tableHeader.fontSize = 7;
                            doc.styles.title.fontSize = 7;

                            var tblBody = doc.content[1].table.body;
                            doc.content[1].layout = {
                                hLineWidth: function(i, node) {
                                    return (i === node.table.body.length) ? 1 : 1;
                                },
                                vLineWidth: function(i, node) {
                                    return (i === node.table.widths.length) ? 1 : 1;
                                },
                                hLineColor: function(i, node) {
                                    return (i === node.table.body.length) ? 'black' :
                                        'gray';
                                },
                                vLineColor: function(i, node) {
                                    return (i === node.table.widths.length) ? 'black' :
                                        'gray';
                                }
                            };
                        }
                    },
                    {
                        extend: "csv",
                        filename: "Lead Data",
                        exportOptions: {
                            format: {
                                body: function(data, row, column, node) {
                                    if (typeof data !== 'string') {
                                        data = String(
                                            data);
                                    }

                                    // If the column is status (assuming column index 11)
                                    if (row === 8) {
                                        if (data.includes('<select')) {
                                            var match = data.match(
                                                /<option[^>]*selected[^>]*>([^<]+)<\/option>/
                                            );
                                            if (match && match[1]) {
                                                return match[1]
                                                    .trim(); // Return the selected option text (Active/Inactive)
                                            }
                                        } else {
                                            // If the status is just a number or text, check the value directly
                                            if (data == '0') {
                                                return 'New';
                                            } else if (data == '1') {
                                                return 'Processing';
                                            } else if (data == '2') {
                                                return 'Confirm';
                                            } else if (data == '3') {
                                                return 'Cancel';
                                            }
                                        }
                                    }

                                    return data.replace(/(<([^>]+)>)/ig,
                                        '');
                                }
                            },
                            columns: [0, 2, 3, 4, 5, 6, 7, 8, 9],
                        }
                    },
                ],
                lengthMenu: [
                    [25, 50, 100, 500, -1],
                    [25, 50, 100, 500, "All"],
                ],
                pageLength: 25,
                destroy: true,
                order: [
                    [0, 'desc']
                ],
                "ajax": {
                    url: "{{ url('/admin/leadajaxdata') }}",
                    type: 'POST',
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.leadid = leadid;
                        d.source = $('#source').val();
                        d.status = $('#status').val();
                        d.search = $('#search').val();
                        d.daterange = $('#bs-rangepicker-basic').val();
                    }
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: '',
                        orderable: false
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'mobile'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'source'
                    },
                    {
                        data: 'date'
                    },
                    {
                        data: 'subject'
                    },
                    {
                        data: 'message'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action',
                        orderable: false
                    },
                ],
            });
        }

        $(document).ready(function() {
            let eiti;
            // -------------------  add lead modal ---------------------------------
            const input = document.querySelector("#addintl_mobile");
            const countryCodeInput = document.querySelector("#addcountry_code");
            if (input && countryCodeInput) {
                const iti = window.intlTelInput(input, {
                    utilsScript: "{{ asset('public/Assets') }}/Admin/js/forms/utils.js",
                    initialCountry: "auto",
                    separateDialCode: true,
                    geoIpLookup: function(callback) {
                        fetch("https://ipapi.co/json")
                            .then(function(res) {
                                return res.json();
                            })
                            .then(function(data) {
                                callback(data.country_code);
                            })
                            .catch(function() {
                                callback("us");
                            });
                    },
                    showSelectedDialCode: true,
                });
                input.addEventListener('countrychange', function() {
                    countryCodeInput.value = iti.getSelectedCountryData().dialCode;
                });
                countryCodeInput.value = iti.getSelectedCountryData().dialCode;

                input.addEventListener('keydown', function(event) {
                    if (event.key === ' ') {
                        event.preventDefault();
                    }
                });

                // Remove spaces in real-time as user types
                input.addEventListener('input', function(event) {
                    this.value = this.value.replace(/\s+/g, '');
                });

                // lead form validation 
                $.validator.addMethod("CheckCountryCode", function(value, element) {
                    var isValidNumber = iti.isValidNumber();
                    return isValidNumber;
                }, "Please enter valid mobile number");
                $('#leadform').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                            CheckCountryCode: true,
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter name",
                        },
                        mobile: {
                            required: "Please enter mobile number",
                            CheckCountryCode: "Please enter valid mobile number",
                        },
                        email: {
                            required: "Please enter your email",
                            email: "Please enter valid email",
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") == "mobile") {
                            error.insertAfter($("#addcountry_code"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form) {
                        $(form).find(':submit').prop('disabled', true).text('Submitting...');
                        form.submit();
                    }
                });
            }

            // -------------------  edit lead modal ---------------------------------
            const einput = document.querySelector("#editintl_mobile");
            const ecountryCodeInput = document.querySelector("#editcountry_code");
            if (einput && ecountryCodeInput) {
                eiti = window.intlTelInput(einput, {
                    utilsScript: "{{ asset('public/Assets') }}/Admin/js/forms/utils.js",
                    initialCountry: "auto",
                    separateDialCode: true,
                    geoIpLookup: function(callback) {
                        fetch("https://ipapi.co/json")
                            .then(function(res) {
                                return res.json();
                            })
                            .then(function(data) {
                                callback(data.country_code);
                            })
                            .catch(function() {
                                callback("us");
                            });
                    },
                    showSelectedDialCode: true,
                });
                einput.addEventListener('countrychange', function() {
                    ecountryCodeInput.value = eiti.getSelectedCountryData().dialCode;
                });
                // Set the country code input value when the modal is opened
                $('#editleads-modal').on('shown.bs.modal', function() {
                    ecountryCodeInput.value = eiti.getSelectedCountryData().dialCode;
                });

                einput.addEventListener('keydown', function(event) {
                    if (event.key === ' ') {
                        event.preventDefault();
                    }
                });

                // Remove spaces in real-time as user types
                einput.addEventListener('input', function(event) {
                    this.value = this.value.replace(/\s+/g, '');
                });

                // lead form validation 
                $.validator.addMethod("EditCheckCountryCode", function(value, element) {
                    var isValidNumber = eiti.isValidNumber();
                    return isValidNumber;
                }, "Please enter valid mobile number");
                $('#editleadform').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        mobile: {
                            required: true,
                            EditCheckCountryCode: true,
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter name",
                        },
                        mobile: {
                            required: "Please enter mobile number",
                            EditCheckCountryCode: "Please enter valid mobile number",
                        },
                        email: {
                            required: "Please enter your email",
                            email: "Please enter valid email",
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") == "mobile") {
                            error.insertAfter($("#editcountry_code"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler: function(form) {
                        $(form).find(':submit').prop('disabled', true).text('Submitting...');
                        form.submit();
                    }
                });
            }

            // get old data
            $('body').on('click', '.edit-btn', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/admin/leads') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editleadform input[name="name"]').val(response.name);
                        $('#editleadform input[name="mobile"]').val(response.mobile);
                        $('#editleadform input[name="email"]').val(response.email);
                        $('#editleadform input[name="date"]').val(response.date);
                        $('#editleadform input[name="subject"]').val(response.subject);
                        $('#editleadform textarea[name="message"]').val(response.message);

                        var fullMobile = '+' + response.country_code + response.mobile;
                        // Set the mobile number without dial code in the input
                        if (eiti) {
                            eiti.setNumber(
                                fullMobile
                            );
                        }

                        var formAction = "{{ url('/admin/leads') }}/" + id;
                        $('#editleadform').attr('action', formAction);
                    }
                });
            });

        });

        // delete lead 
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
                                $('#l_table').DataTable().row(rownumber).ajax
                                    .reload(null,
                                        false);
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

        // followup
        $('body').on('click', '.followup', function() {
            var id = $(this).attr('data');
            $('.l_id').val(id);
        });
        $('#followupform').validate({
            rules: {
                n_f_date: {
                    required: true,
                },
                comment: {
                    required: true,
                },
            },
            messages: {
                n_f_date: {
                    required: "Please enter next followup date",
                },
                comment: {
                    required: "Please enter comment",
                },
            },
            submitHandler: function(form) {
                $(form).find(':submit').prop('disabled', true).text('Submitting...');
                form.submit();
            }
        });

        // lead history 
        $('body').on('click', '.history', function() {
            var id = $(this).attr('data');
            $.ajax({
                url: "{{ url('/admin/leadhistory') }}/" + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#leadname').html(response.name);
                    $('#leadmobile').html(response.mobile);
                    $('#leademail').html(response.email);
                    $('#leadsource').html(response.source);
                    $('#leaddate').html(response.date);
                    $('#leadmessage').html(response.message != '' ? response.message : '-');
                    $('#leadstatus').html(response.status);
                    $('#leadsubject').html(response.subject != '' ? response.subject : '-');
                    if (response.followup != '') {
                        $('#followuphistory').html(response.followup);
                    } else {
                        $('#followuphistory').html("No Lead Follow Up");
                    }

                    if (response.leadstatus == 3) {
                        $('#cancelReasonRow').removeClass('d-none');
                        $('#leadcancelreason').html(response.cancelreason);
                    } else {
                        $('#cancelReasonRow').addClass('d-none');
                        $('#leadcancelreason').html('');
                    }
                }
            });
        });

        // change lead status
        $('body').on('change', '.selstatus', function() {
            status = $(this).val();
            leadid = $(this).attr('data');
            rownumber = $(this).attr('data-rownumber');
            $('#leadcancel_id').val(leadid);

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
                    if (status == 3) {
                        $('#leadcancel-modal').modal('show');
                    } else {
                        $.ajax({
                            url: "{{ url('/admin/leadstatus') }}",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                status: status,
                                leadid: leadid,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success == true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Updated!',
                                        text: 'Lead status has been updated.',
                                    });
                                    $('#l_table').DataTable().row(rownumber).ajax
                                        .reload(null,
                                            false);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Failed to update lead status.',
                                    });
                                    $('#l_table').DataTable().row(rownumber).ajax
                                        .reload(null, false);
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while updating lead status.',
                                });
                                $('#l_table').DataTable().row(rownumber).ajax
                                    .reload(null, false);
                            }
                        });
                    }
                } else {
                    $('#l_table').DataTable().row(rownumber).ajax.reload(null, false);
                }
            });
        });

        // lead cancel reason
        $('#leadcancelform').validate({
            rules: {
                cancel_reason: {
                    required: true,
                },
            },
            messages: {
                cancel_reason: {
                    required: "Please enter reason",
                },
            },
            submitHandler: function(form) {
                $(form).find(':submit').prop('disabled', true).text('Submitting...');
                form.submit();
            }
        });

        // sendmail
        $('body').on('click', '.sendmail', function() {
            var id = $(this).attr('data-id');
            $('#leadmail_id').val(id);
        });
        $.validator.addMethod('ValidMail', function(value) {
            e_id = $('#e_id').val();
            if (e_id != 0) return true;
            else return false;
        });
        $('#leadmailform').validate({
            rules: {
                e_id: {
                    ValidMail: true,
                },
            },
            messages: {
                e_id: {
                    ValidMail: "Please select email template",
                },
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "e_id") {
                    error.insertAfter($(".emailtemp .select2-container"));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                $(form).find(':submit').prop('disabled', true).text('Submitting...');
                form.submit();
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

        $('body').on('click', '.clear', function() {
            var source = $('#source').val();
            var status = $('#status').val();
            var search = $('#search').val();
            var date = $('#bs-rangepicker-basic').val();
            if (source === '' && status === '' && search === '' && date === '') {
                return;
            }

            $('#source').val('').trigger('change');
            $('#status').val('').trigger('change');
            $('#search').val('');
            $('#bs-rangepicker-basic').val('');
            var id = $('.lead_id').val();
            ajaxleaddata(id);
        });
        $('#source,#status').on('change', function() {
            var id = $('.lead_id').val();
            ajaxleaddata(id);
        });
        $('#bs-rangepicker-basic').on('apply.daterangepicker', function(ev, picker) {
            var id = $('.lead_id').val();
            ajaxleaddata(id);
        });
        $('#search').on('keyup', function() {
            var id = $('.lead_id').val();
            ajaxleaddata(id);
        });
    </script>
@endsection
