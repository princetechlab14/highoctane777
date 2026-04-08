@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">FAQ</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        @if (hasPermission('faq', 'can_create'))
                            <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                                data-bs-target="#faq-modal">
                                <i class="ti ti-plus fs-4 me-2"></i> Add FAQ
                            </button>
                        @endif
                        @if (hasPermission('faq', 'can_delete'))
                            <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Delete FAQ" data-table='faq'
                                data-field='id'>
                                <i class="ti ti-trash fs-4 me-2"></i> Delete FAQ
                            </button>
                        @endif
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="faq_table" class="table table-striped table-bordered align-middle mb-0"
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
                                                <th class="all">FAQ Question</th>
                                                <th class="none">FAQ Answer</th>
                                                @if (hasPermission('faq', 'can_edit') || hasPermission('faq', 'can_delete'))
                                                    <th class="all"></th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($list as $key => $value)
                                                <tr>
                                                    <td> {{ $i++ }} </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input alldatachecks_999"
                                                                type="checkbox" id="flexCheckDefault" name="alldatachecks"
                                                                data-rownumber = "{{ $key }}"
                                                                value="{{ $value->id }}">
                                                        </div>
                                                    </td>
                                                    <td>{{ $value->faq_question ?? '-' }}</td>
                                                    <td>{{ $value->faq_answer ?? '-' }}</td>
                                                    @if (hasPermission('faq', 'can_edit') || hasPermission('faq', 'can_delete'))
                                                        <td>
                                                            @if (hasPermission('faq', 'can_edit'))
                                                                <button type="button" data-bs-toggle="modal"
                                                                    data-bs-target="#editfaq-modal"
                                                                    class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                                    data-id="{{ $value->id }}" title="Edit FAQ">
                                                                    <i class="fs-5 ti ti-edit"></i>
                                                                </button>
                                                            @endif
                                                            @if (hasPermission('faq', 'can_delete'))
                                                                <button type='button'
                                                                    class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                    data-table='faq' data-field='id'
                                                                    data-rownumber="{{ $key }}"
                                                                    data-value="{{ $value->id }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Delete FAQ">
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
            <div class="modal fade" id="faq-modal" tabindex="-1" aria-labelledby="faq-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New FAQ
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/faq" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="faqform">
                            @csrf
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Question</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="faq_question" class="form-control"
                                                        placeholder="FAQ Question">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Answer</label>
                                                <div class="col-md-12">
                                                    <textarea name="faq_answer" class="ckeditor"></textarea>
                                                </div>
                                            </div>
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

            {{-- edit modal --}}
            <div class="modal fade" id="editfaq-modal" tabindex="-1" aria-labelledby="faq-modal" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit FAQ
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin/faq') }}" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="editfaqform">
                            @csrf
                            <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="faq_id" class="faq_id">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Question</label>
                                                <div class="col-md-12">
                                                    <input type="text" name="faq_question" class="form-control"
                                                        placeholder="FAQ Question">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label class="form-label">FAQ Answer</label>
                                                <div class="col-md-12">
                                                    <textarea name="faq_answer" class="ckeditor" id="answer"></textarea>
                                                </div>
                                            </div>
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
            $('#faq-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            datatable = $('#faq_table').DataTable({
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

            // validation 
            $('#faqform,#editfaqform').each(function() {
                $(this).validate({
                    rules: {
                        'faq_question': {
                            required: true
                        },
                        'faq_answer': {
                            required: true
                        },
                    },
                    messages: {
                        'faq_question': {
                            required: "Please enter faq question"
                        },
                        'faq_answer': {
                            required: "Please enter faq answer"
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    submitHandler: function(form) {
                        if ($(form).valid()) {
                            $(form).find(':submit').prop('disabled', true).text(
                                'Submitting...');
                            form.submit();
                        } else {
                            return false;
                        }
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
        });

        // delete faq 
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
                                $('#faq_table').DataTable().row(rownumber)
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

        // get old data
        $('body').on('click', '.edit-btn', function() {
            var id = $(this).data('id');
            $('.faq_id').val(id);

            $.ajax({
                url: "{{ url('admin/faq') }}/" + id,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    $('#editfaqform input[name="faq_question"]').val(response.faq_question);
                    $('#editfaqform textarea[name="faq_answer"]').val(response.faq_answer);
                    CKEDITOR.instances.answer.setData(response.faq_answer);
                    var formAction = "{{ url('/admin/faq') }}/" + id;
                    $('#editfaqform').attr('action', formAction);
                }
            });
        });
    </script>
@endsection
