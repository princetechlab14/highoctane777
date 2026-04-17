@extends('admin.app')
@section('body')
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/codemirror/codemirror.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/libs/codemirror/darcula.min.css">

    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">Edit Robots File</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <a href="{{ url('admin/generatexml') }}"><button
                                class="btn btn-rounded btn-primary px-4 fs-4"><i
                                    class="ti ti-sitemap fs-4 me-2"></i>Generate Sitemap XML</button></a>
                        <a href="{{ asset('sitemap.xml') }}" target="_blank"><button
                                class="btn btn-rounded btn-dark px-4 fs-4"> <i class="ti ti-eye fs-4 me-2"></i>View
                                Sitemap</button></a>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('admin') }}/robots" role="form"
                                class="form-horizontal" enctype="multipart/form-data" id="sitemapform">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <textarea id="sitemapcode" name="newcontent">{{ $content }}</textarea>
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
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets') }}/admin/libs/codemirror/codemirror.min.js"></script>
    <script src="{{ asset('assets') }}/admin/libs/codemirror/htmlmixed.min.js"></script>

    <!-- Initialize CodeMirror -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var htmlEditor = CodeMirror.fromTextArea(document.getElementById("sitemapcode"), {
                lineNumbers: true,
                mode: 'htmlmixed',
                theme: 'darcula',
            });
        });
    </script>
@endsection
