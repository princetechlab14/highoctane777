@extends('admin.app')
@section('body')
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/codemirror/codemirror.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/codemirror/darcula.min.css">

    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="card">
                    <div class="border-bottom title-part-padding">
                        <h4 class="card-title mb-0">Edit User Footer</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('admin') }}/userfooter" role="form"
                            class="form-horizontal" enctype="multipart/form-data" id="userheaderform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <textarea id="footercode" name="newfooter">{{ $footer }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary text-center" id="submit">
                                    Submit
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
    <script src="{{ asset('assets') }}/admin/libs/codemirror/codemirror.min.js"></script>
    <script src="{{ asset('assets') }}/admin/libs/codemirror/htmlmixed.min.js"></script>

    <!-- Initialize CodeMirror -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var htmlEditor = CodeMirror.fromTextArea(document.getElementById("footercode"), {
                lineNumbers: true,
                mode: 'htmlmixed',
                theme: 'darcula',
            });
        });
    </script>
@endsection
