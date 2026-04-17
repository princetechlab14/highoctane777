@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Email Template</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                            data-bs-target="#emailtemplate-modal">
                            <i class="ti ti-plus fs-4 me-2"></i> Add Email Template
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="datatables">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="emailtemplate_table"
                                        class="table table-striped table-bordered align-middle w-100">
                                        <thead>
                                            <tr>
                                                <th class="all">No.</th>
                                                <th class="all">Title</th>
                                                <th class="none">Template</th>
                                                <td class="none">Attachments</td>
                                                <th class="all"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 1;
                                            @endphp
                                            @foreach ($emailtemplate as $key => $val)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $val->title }}</td>
                                                    <td>{!! $val->template !!}</td>
                                                    <td>
                                                        @if ($val->attachments && count($val->attachments) > 0)
                                                            <div
                                                                class="d-flex justify-content-center align-items-center flex-wrap">
                                                                @foreach ($val->attachments as $attachment)
                                                                    <a target='_blank'
                                                                        href="{{ asset('assets/admin/images/emailattachment/' . $attachment->attachment) }}">
                                                                        <img src="{{ asset('assets') }}/admin/images/emailattachment/{{ $attachment->attachment }}"
                                                                            width="80" class="pe-2"
                                                                            alt="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $attachment->attachment)) }}"
                                                                            title="{{ str_replace('-', ' ', preg_replace('/-[a-zA-Z0-9]{10}\.webp$/', '', $attachment->attachment)) }}"
                                                                            loading="lazy">
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            No attachments Found
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editemailtemplate-modal"
                                                            class="btn mb-1 btn-info btn-sm d-inline-flex align-items-center justify-content-center edit-btn"
                                                            data-id="{{ $val->id }}" title="Edit">
                                                            <i class="fs-5 ti ti-edit"></i>
                                                        </button>
                                                        @if ($val->is_delete != 1)
                                                            <button type='button'
                                                                class='btn mb-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata'
                                                                data-table='emailtemplate' data-field='id'
                                                                data-rownumber="{{ $key }}"
                                                                data-value="{{ $val->id }}" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" title="Delete Email Template">
                                                                <i class="fs-5 ti ti-trash"></i>
                                                            </button>
                                                        @endif
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
        </div>
    </div>

    {{-- add modal  --}}
    <div class="modal fade" id="emailtemplate-modal" tabindex="-1" aria-labelledby="emailtemplate-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Add New Email Template
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin') }}/emailtemplate" role="form" class="form-horizontal" method="post"
                    enctype="multipart/form-data" id="emailtemplateform">
                    @csrf
                    <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Email Template Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Email Template Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Template</label>
                                    <textarea name="template" class="ckeditor"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label col-lg-12">Attachment</label>
                                    <div class="fileinput fileinput-new rerror-msg" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                            style="width: 200px; height: 150px;"></div>
                                        <div>
                                            <span class="btn btn-outline-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="attachment[]" multiple>
                                            </span>
                                            <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
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
    {{-- edit modal  --}}
    <div class="modal fade" id="editemailtemplate-modal" tabindex="-1" aria-labelledby="emailtemplate-modal"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Edit Email Template
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin') }}/emailtemplate" role="form" class="form-horizontal"
                    method="post" enctype="multipart/form-data" id="editemailtemplateform">
                    @csrf
                    <div class="modal-body" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label class="form-label">Email Template Title</label>
                                    <input type="text" class="form-control" name="title"
                                        placeholder="Email Template Title">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email Template</label>
                                    <textarea name="template" class="ckeditor" id="template"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label col-lg-12">Attachment</label>
                                    <div id="existing-attachments">

                                    </div>
                                    <div class="fileinput fileinput-new rerror-msg" data-provides="fileinput">
                                        <div class="fileinput-preview img-thumbnail" data-trigger="fileinput"
                                            style="width: 200px; height: 150px;">

                                        </div>
                                        <div>
                                            <span class="btn btn-outline-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="attachment[]" multiple>
                                            </span>
                                            <a href="#" class="btn btn-outline-danger fileinput-exists"
                                                data-dismiss="fileinput">Remove</a>
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
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            var datatable;

            $('#emailtemplate-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            datatable = $('#emailtemplate_table').DataTable({
                responsive: true,
                lengthMenu: [
                    [25, 50, 100, 500, -1],
                    [25, 50, 100, 500, "All"],
                ],
                "columnDefs": [{
                    "orderable": false,
                    "targets": -1
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

            // delete emailtemplate 
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

            $('#emailtemplateform,#editemailtemplateform').each(function() {
                $(this).validate({
                    rules: {
                        title: {
                            required: true
                        },
                        template: {
                            required: true
                        },
                        // 'attachment[]': {
                        //     checkExtension: ['webp', 'png', 'jpg', 'jpeg', 'gif'],
                        //     depends: function(element) {
                        //         return $(element).get(0).files.length > 0;
                        //     }
                        // }
                    },
                    messages: {
                        title: {
                            required: "Please enter template title"
                        },
                        template: {
                            required: "Please enter template content",
                        },
                        // 'attachment[]': {
                        //     checkExtension: "Only webp, png, jpg, jpeg, and gif files are allowed."
                        // }
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        if (element.attr("name") === "attachment[]") {
                            error.insertAfter($(".rerror-msg"));
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

            // get old value
            $('body').on('click', '.edit-btn', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/admin/emailtemplate') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editemailtemplateform input[name="title"]').val(response.edit
                            .title);
                        CKEDITOR.instances.template.setData(response.edit.template);

                        // Clear previous attachments
                        $('#existing-attachments').empty();

                        // Check if there are attachments
                        if (response.attachment && response.attachment.length > 0) {
                            response.attachment.forEach(function(attachment) {
                                var attachmentLink = `
                                    <div class="py-1 alert customize-alert alert-dismissible text-info alert-light-info bg-info-subtle fade show remove-close-icon" role="alert" id="attachment_${attachment.id}">
                                        <span class="side-line bg-info"></span>
                                        <div class="d-flex align-items-center">
                                            <span class="text-truncate">${attachment.attachment}</span>
                                            <div class="ms-auto d-flex justify-content-end">
                                                <a href="javascript:void(0)" class="px-2 btn attachment" aria-label="Close" data="${attachment.id}">
                                                    <i class="ti ti-trash fs-5 text-info"></i>
                                                </a>
                                                <a href="{{ asset('assets/admin/images/emailattachment') }}/${attachment.attachment}" target="_blank" class="px-2 btn">
                                                    <i class="ti ti-eye fs-5 text-info"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>`;
                                $('#existing-attachments').append(attachmentLink);
                            });
                        }


                        var formAction = "{{ url('/admin/emailtemplate') }}/" + id;
                        $('#editemailtemplateform').attr('action', formAction);
                    }
                });
            });

            // delete attachment
            $('body').on('click', '.attachment', function() {
                id = $(this).attr('data');
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
                            url: "{{ url('admin/deleteemailattachment') }}/" + id,
                            success: function(response) {
                                if (response.status == true) {
                                    $('#attachment_' + id).remove();
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: 'Your record has been deleted.',
                                    });

                                } else {
                                    Swal.fire({
                                        title: 'Cancelled',
                                        text: response.message,
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
