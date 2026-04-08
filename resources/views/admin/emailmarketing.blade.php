@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Email Marketing Campaign</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <a href="{{ asset('public/Assets') }}/Admin/images/email_list.csv" class="btn btn-rounded btn-primary px-4 fs-4"
                            download>
                            <i class="ti ti-download fs-4 me-2"></i>Download CSV Formate
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('admin/emailmarketingcampaign') }}" method="POST"
                                enctype="multipart/form-data" id="emailmarketingform">
                                @csrf
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label col-sm-3 col-form-label">Upload Email List .csv File</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" type="file" name="email_list" accept=".csv">
                                    </div>
                                </div>
                                <div class="mb-4 row align-items-center">
                                    <label class="form-label col-sm-3 col-form-label">Select Email Template</label>
                                    <div class="col-sm-9">
                                        <select name="email_template" id="email_template" class="form-select select2">
                                            <option value="">Select Email Template</option>
                                            @foreach ($emailtemplate as $val)
                                                <option value="{{ $val->id }}">{{ $val->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>
                            <p class="m-0"><strong>Note : </strong>Create your email list in CSV first, then upload it.</p>
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
            $('#email_template').select2({
                placeholder: 'Select Email Template',
            });

            $.validator.addMethod("csvFile", function(value, element) {
                // Check if the file extension is .csv
                return this.optional(element) || /\.(csv)$/i.test(value);
            }, "Only CSV files are allowed");

            $('#emailmarketingform').validate({
                rules: {
                    email_list: {
                        required: true,
                        csvFile: true
                    },
                    email_template: {
                        required: true
                    },
                },
                messages: {
                    email_list: {
                        required: "Please upload CSV file",
                        csvFile: "Only CSV files are allowed"
                    },
                    email_template: {
                        required: "Please select email template"
                    },
                },
                onfocusout: function(element) {
                    $(element).val($.trim($(element).val()));
                    this.element(element);
                },
                errorPlacement: function(error, element) {
                    var select2Container = element.next('.select2-container');
                    if (element.attr("name") === "email_template") {
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
    </script>
@endsection
