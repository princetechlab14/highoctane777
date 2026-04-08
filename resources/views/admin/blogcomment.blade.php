@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Blog Comment</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Blog Comments" data-table='comment'
                            data-field='id'>
                            <i class="ti ti-trash fs-4 me-2"></i> Delete Blog Comments
                        </button>
                    </div>
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
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="blogcomment_table" class="table table-striped table-bordered align-middle">
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
                                                <th class="all">Email</th>
                                                <th class="none">Website</th>
                                                <th class="none">Comment</th>
                                                <th class="none">Reply</th>
                                                <th class="all">Status</th>
                                                <th class="all"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- add modal  --}}
                <div class="modal fade" id="addcommentreply" tabindex="-1" aria-labelledby="addcommentreply"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header d-flex align-items-center">
                                <h4 class="modal-title" id="myLargeModalLabel">
                                    Add Reply
                                </h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ url('admin') }}/comment" role="form" class="form-horizontal"
                                method="post" enctype="multipart/form-data" id="blogcommentform">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="comment_id" id="comment_id">
                                        <div class="col-lg-12">
                                            <div class="mb-4">
                                                <label class="form-label">Reply</label>
                                                <textarea name="reply" rows="5" class="form-control" placeholder="Reply Message"></textarea>
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
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var datatable;
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
                if ($.fn.DataTable.isDataTable('#blogcomment_table')) {
                    $('#blogcomment_table').DataTable().destroy();
                }

                datatable =  $('#blogcomment_table').DataTable({
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
                        url: "{{ url('admin/commentajaxdata') }}",
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

            //datatable all checkbox select
            $('body').on('click', '.allvaluecheck', function() {
                var key = $(this).attr('data');
                var s = $(".alldatachecks_" + key + ":enabled").prop("checked", $(this).prop("checked"));
            });

            // delete multiple data 
            $('body').on('click', '.deletealldata', function() {
                deleteSelectedRows(datatable, this);
            });

            // delete blog comment  
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

            // change blog comment status
            $('body').on('change', '.selectcommentstatus', function() {
                status = $(this).val();
                commentid = $(this).attr('data');
                rownumber = $(this).attr('data-rownumber');

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
                            url: "{{ url('/admin/blogcommentstatus') }}",
                            method: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                status: status,
                                commentid: commentid,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success == true) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Updated!',
                                        text: 'Blog Comment status has been updated.',
                                    });
                                    $('#blogcomment_table').DataTable().row(rownumber)
                                        .ajax
                                        .reload(null,
                                            false);
                                } else {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: 'Failed to update blog comment status.',
                                    });
                                    $('#blogcomment_table').DataTable().row(rownumber)
                                        .ajax
                                        .reload(null, false);
                                }
                            },
                            error: function() {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: 'An error occurred while updating blog comment status.',
                                });
                                $('#blogcomment_table').DataTable().row(rownumber).ajax
                                    .reload(null, false);
                            }
                        });

                    } else {
                        $('#blogcomment_table').DataTable().row(rownumber).ajax.reload(null, false);
                    }
                });
            });

            $('body').on('click', '.reply', function() {
                var id = $(this).attr('data');
                $('#comment_id').val(id);
                $('#addcommentreply').modal('show');
            });

             // validation 
             $('#blogcommentform').each(function() {
                $(this).validate({
                    rules: {
                        reply: {
                            required: true
                        },
                    },
                    messages: {
                        reply: {
                            required: "Please enter reply"
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
        });
    </script>
@endsection
