@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">
                        {{ isset($id) && $id != 0 && $id != '' ? 'Edit' : 'Add' }} New Blog
                    </h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <a href="{{ url('admin/blog') }}" class="btn btn-rounded btn-dark px-4 fs-4">
                            <i class="ti ti-arrow-left fs-4 me-1"></i>Back
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body wizard-content">
                            @if (!empty($fetchblogdata))
                                <form action="{{ url('/admin/addupdateblog') }}/{{ $fetchblogdata->id }}"
                                    class="edittab-wizard wizard-circle" id="editblogform" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Step 1 -->
                                    <h6>Blog Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Blog Title</label>
                                                        <input type="text" class="form-control" placeholder="Blog Title"
                                                            name="title" value="{{ $fetchblogdata->title ?? '' }}"
                                                            id="blog_title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Blog Category</label>
                                                        <select name="category_id" id="category_id"
                                                            class="form-select select2">
                                                            <option value="">Select Blog Category</option>
                                                            @foreach ($blogcategory as $item)
                                                                <option value="{{ $item->id }}"
                                                                    {{ $item->id == $fetchblogdata->category_id ? 'selected' : '' }}>
                                                                    {{ $item->blog_category_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">URL</label>
                                                        <input type="text" class="form-control" placeholder="URL"
                                                            name="url" value="{{ $fetchblogdata->url ?? '' }}"
                                                            id="blog_url">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date</label>
                                                        <input type="date" class="form-control" placeholder="Date"
                                                            name="date" id="blog_date"
                                                            value="{{ date('Y-m-d', strtotime($fetchblogdata->date)) }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label col-lg-12">Blog Image</label>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview img-thumbnail"
                                                                data-trigger="fileinput"
                                                                style="width: 200px; height: 150px;">
                                                                @if (isset($fetchblogdata))
                                                                    <img
                                                                        src="{{ asset('public/Assets') }}/Admin/images/blog/{{ $fetchblogdata->image != '' ? $fetchblogdata->image : 'noimage.webp' }}">
                                                                @endif
                                                            </div>
                                                            <div class="editblogimg-error-msg">
                                                                <span class="btn btn-outline-primary btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="image"
                                                                        accept="image/png, image/webp, image/jpeg">
                                                                </span>
                                                                <a href="#"
                                                                    class="btn btn-outline-danger fileinput-exists"
                                                                    data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Image Title</label>
                                                        <input type="text" class="form-control" id="img_title"
                                                            name="thumbnail_title" placeholder="Image Title"
                                                            value="{{ $fetchblogdata->thumbnail_title }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Image Alt</label>
                                                        <input type="text" class="form-control" id="img_alt"
                                                            name="thumbnail_alt" placeholder="Image Alt"
                                                            value="{{ $fetchblogdata->thumbnail_alt }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Short Description</label>
                                                <textarea name="shortcontent" class="ckeditor">{{ $fetchblogdata->content ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>SEO Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" placeholder="Meta Title"
                                                        name="meta_title" value="{{ $fetchblogdata->meta_title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Canonical URL</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Canonical URL" name="canonical_url"
                                                        value="{{ $fetchblogdata->canonical_url }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea name="meta_description" class="form-control" rows="4" placeholder="Meta Description">{{ $fetchblogdata->meta_description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Schema</label>
                                                    <textarea name="schema" class="form-control" rows="4" placeholder="Schema">{{ $fetchblogdata->schema }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Keywords</label>
                                                    <textarea name="keywords" class="form-control" rows="4" placeholder="Keywords">{{ $fetchblogdata->keywords }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Blog Content</h6>
                                    <section>
                                        <div class="column" id="Extracontactperson">
                                            @foreach ($fetchblogdata->page_section as $v)
                                                <div class="portlet box blue-hoki" id="{{ $v->id }}">
                                                    <div class="portlet-title px-2">
                                                        <div class="caption">
                                                            <i class="ti ti-arrows-move"></i>
                                                            <span
                                                                id="title_{{ $v->id }}">{{ $v->heading }}</span>
                                                        </div>
                                                        <div class="action_btn">
                                                            <span aria-expanded="true" data-toggle="collapse"
                                                                data-target="#{{ $v->id }}sec"
                                                                class="minimizetogg btn btn-dark btn-sm">
                                                                <i class="fa fa-angle-up"></i>
                                                            </span>
                                                            <a class="btn btn-dark btn-sm"
                                                                onclick="secdelete({{ $v->id }})">
                                                                <i class="ti ti-x" style="color:white"></i>
                                                                Remove
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body sectionbody collapse in"
                                                        id="{{ $v->id }}sec">
                                                        <div class="scroller" data-rail-visible="1"
                                                            data-rail-color="yellow" data-handle-color="#a1b2bd">
                                                            <strong>
                                                                <input type="hidden" id="edits{{ $v->id }}"
                                                                    name="s_id[{{ $v->id }}]"
                                                                    value="{{ $v->id }}">
                                                                <input type="text" class="form-control"
                                                                    placeholder="Section Title"
                                                                    name="secname[{{ $v->id }}]"
                                                                    id="secname[{{ $v->id }}]"
                                                                    value="{{ $v->heading }}">
                                                            </strong>
                                                            <br>

                                                            <div class="columni" id="l{{ $v->id }}">

                                                                @foreach ($v->page_content as $cv)
                                                                    <div class="portlet box green"
                                                                        id="lec{{ $v->id }}_{{ $cv->id }}">
                                                                        <div class="portlet-title px-2">
                                                                            <div class="caption">
                                                                                <i class="ti ti-arrows-move"></i>
                                                                                <span
                                                                                    id="little_{{ $v->id }}_{{ $cv->id }}">
                                                                                    {{ $cv->content_image != '' ? 'Image' : 'Content' }}
                                                                                </span>
                                                                            </div>
                                                                            <div class="action_btn">
                                                                                <span aria-expanded="true"
                                                                                    data-toggle="collapse"
                                                                                    data-target="#{{ $cv->id }}lectt"
                                                                                    class="minimizetogg btn btn-dark btn-sm">
                                                                                    <i class="fa fa-angle-up"></i>
                                                                                </span>
                                                                                <a id="anc{{ $v->id }}_{{ $cv->id }}"
                                                                                    class="btn btn-dark btn-sm"
                                                                                    onclick="lecdelete('{{ $v->id }}_{{ $cv->id }}')">
                                                                                    <i class="ti ti-x"
                                                                                        style="color:white"></i>
                                                                                    Remove
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="portlet-body collapse in"
                                                                            id="{{ $cv->id }}lectt">
                                                                            @if ($cv->content_image != '')
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <input type="hidden"
                                                                                            id="editl{{ $v->id }}_{{ $cv->id }}"
                                                                                            name="c_id[{{ $v->id }}][{{ $cv->id }}]"
                                                                                            value="{{ $cv->id }}">
                                                                                        <label class="form-label w-100">
                                                                                            Image
                                                                                        </label>
                                                                                        <div class="fileinput fileinput-new"
                                                                                            data-provides="fileinput">
                                                                                            <div class="fileinput-preview img-thumbnail"
                                                                                                data-trigger="fileinput"
                                                                                                style="width: 200px; height: 150px;">
                                                                                                <img
                                                                                                    src="{{ asset('public/Assets/Admin/images/blog/' . ($cv->content_image != '' ? $cv->content_image : 'noimage.webp')) }}">

                                                                                            </div>
                                                                                            <div>
                                                                                                <span
                                                                                                    class="btn btn-outline-primary btn-file">
                                                                                                    <span
                                                                                                        class="fileinput-new">Select
                                                                                                        image</span>
                                                                                                    <span
                                                                                                        class="fileinput-exists">Change</span>
                                                                                                    <input
                                                                                                        id="image_{{ $v->id }}_{{ $cv->id }}"
                                                                                                        type="file"
                                                                                                        name="content_image[{{ $v->id }}][{{ $cv->id }}]"
                                                                                                        accept="image/png, image/webp, image/jpeg">
                                                                                                </span>
                                                                                                <a href="javascript:;"
                                                                                                    class="btn btn-outline-danger fileinput-exists"
                                                                                                    data-dismiss="fileinput">Remove</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="row">
                                                                                            <div class="col-md-12">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label">Image
                                                                                                        Title</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        placeholder="Image Title"
                                                                                                        name="image_title[{{ $v->id }}][{{ $cv->id }}]"
                                                                                                        value="{{ $cv->image_alt }}">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12">
                                                                                                <div class="mb-3">
                                                                                                    <label
                                                                                                        class="form-label">Image
                                                                                                        Alt</label>
                                                                                                    <input type="text"
                                                                                                        class="form-control"
                                                                                                        placeholder="Image Alt"
                                                                                                        name="image_alt[{{ $v->id }}][{{ $cv->id }}]"
                                                                                                        value="{{ $cv->image_title }}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @else
                                                                                <input type="hidden"
                                                                                    id="editl{{ $v->id }}_{{ $cv->id }}"
                                                                                    name="c_id[{{ $v->id }}][{{ $cv->id }}]"
                                                                                    value="{{ $cv->id }}">
                                                                                <textarea name="content[{{ $v->id }}][{{ $cv->id }}]"
                                                                                    id="content_{{ $v->id }}_{{ $cv->id }}" class="ckeditor" style="display: none;"> {{ $cv->content }}</textarea>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                            <div align="center">
                                                                <a onclick="addimage({{ $v->id }})"
                                                                    class="btn btn-primary"><i class="fa fa-plus"></i> Add
                                                                    Image</a> <a onclick="addcontent({{ $v->id }})"
                                                                    class="btn btn-primary"><i class="fa fa-plus"></i> Add
                                                                    Content</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="text-center mt-3">
                                            <a id="insert" href="javascript:;" class="btn btn-primary">
                                                <i class="fa fa-plus"></i>
                                                <span class="ms-1">Add New Section</span>
                                            </a>
                                        </div>
                                    </section>
                                </form>
                            @else
                                <form action="{{ url('/admin/addupdateblog') }}" class="tab-wizard wizard-circle"
                                    id="blogform" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Step 1 -->
                                    <h6>Blog Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Blog Title</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Blog Title" name="title" id="blog_title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Blog Category</label>
                                                        <select name="category_id" id="category_id"
                                                            class="form-select select2">
                                                            <option value="">Select Blog Category</option>
                                                            @foreach ($blogcategory as $item)
                                                                <option value="{{ $item->id }}">
                                                                    {{ $item->blog_category_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">URL</label>
                                                        <input type="text" class="form-control" placeholder="URL"
                                                            name="url" id="blog_url">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Date</label>
                                                        <input type="date" class="form-control" placeholder="Date"
                                                            name="date" id="blog_date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label col-lg-12">Blog Image</label>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview img-thumbnail"
                                                                data-trigger="fileinput"
                                                                style="width: 200px; height: 150px;">
                                                            </div>
                                                            <div class="blogimg-error-msg">
                                                                <span class="btn btn-outline-primary btn-file">
                                                                    <span class="fileinput-new">Select image</span>
                                                                    <span class="fileinput-exists">Change</span>
                                                                    <input type="file" name="image"
                                                                        accept="image/png, image/webp, image/jpeg">
                                                                </span>
                                                                <a href="#"
                                                                    class="btn btn-outline-danger fileinput-exists"
                                                                    data-dismiss="fileinput">Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Image Title</label>
                                                        <input type="text" class="form-control" id="img_title"
                                                            name="thumbnail_title" placeholder="Image Title">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Image Alt</label>
                                                        <input type="text" class="form-control" id="img_alt"
                                                            name="thumbnail_alt" placeholder="Image Alt">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Short Description</label>
                                                <textarea name="shortcontent" class="ckeditor"></textarea>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6>SEO Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Meta Title</label>
                                                    <input type="text" class="form-control" placeholder="Meta Title"
                                                        name="meta_title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Canonical URL</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Canonical URL" name="canonical_url">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea name="meta_description" class="form-control" rows="4" placeholder="Meta Description"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Schema</label>
                                                    <textarea name="schema" class="form-control" rows="4" placeholder="Schema"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Keywords</label>
                                                    <textarea name="keywords" class="form-control" rows="4" placeholder="Keywords"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Blog Content</h6>
                                    <section>
                                        <div class="column" id="Extracontactperson"></div>
                                        <div class="text-center mt-3">
                                            <a id="insert" href="javascript:;" class="btn btn-primary">
                                                <i class="fa fa-plus"></i>
                                                <span class="ms-1">Add New Section</span>
                                            </a>
                                        </div>
                                    </section>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $('#blog_title').on('keyup change', function() {
                url = $(this).val().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();
                $('#blog_url').val(url);
            });

            $('#category_id').select2({
                placeholder: 'Select Blog Category',
                allowClear: true,
            });
        });

        // add validation 
        $.validator.addMethod("checkImage", function(value, element, params) {
            var file = element.files[0];
            var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
            var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

            $('.blogimg-error-msg .error-message').html('');

            if (!file) {
                return true;
            }

            var typeError = false;
            var sizeError = false;

            // Check for valid file type
            if ($.inArray(file.type, allowedTypes) === -1) {
                typeError = true;
            }

            // Check for file size limit
            if (file.size > maxFileSize) {
                sizeError = true;
            }

            if (typeError && sizeError) {
                $.validator.messages.checkImage =
                    "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
            } else if (typeError) {
                $.validator.messages.checkImage =
                    "Please select a valid image file (JPEG, PNG, or WEBP).";
            } else if (sizeError) {
                $.validator.messages.checkImage = "Please upload an image smaller than 3 MB.";
            }

            return !typeError && !sizeError;
        }, "Invalid image file.");
        $('#blogform').validate({
            rules: {
                title: {
                    required: true
                },
                url: {
                    required: true
                },
                image: {
                    required: true,
                    checkImage: {
                        allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                        maxFileSize: 3 * 1024 * 1024
                    }
                },
                meta_title: {
                    required: true
                },
                meta_description: {
                    required: true
                },
            },
            messages: {
                title: {
                    required: "Please enter blog title"
                },
                url: {
                    required: "Please enter the URL"
                },
                image: {
                    required: "Please upload image"
                },
                meta_title: {
                    required: "Please enter the meta title"
                },
                meta_description: {
                    required: "Please enter the meta description"
                },
            },
            onfocusout: function(element) {
                $(element).val($.trim($(element).val()));
                this.element(element);
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "image") {
                    error.insertAfter($(".blogimg-error-msg"));
                } else if (element.attr("name") === "category_id") {
                    error.insertAfter($(".select2-container"));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                if ($(form).valid()) {
                    form.submit();
                } else {
                    return false;
                }
            }
        });
        $(".tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit",
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (currentIndex < newIndex) {
                    return $("#blogform").valid();
                }
                return true;
            },
            onFinishing: function(event, currentIndex) {
                var finishButton = $("a[href='#finish']");
                finishButton.prop('disabled', true).text('Submitting...');

                finishButton.removeAttr('href').off('click').on('click', function(e) {
                    e.preventDefault();
                });
                return $("#blogform").valid();
            },
            onFinished: function(event, currentIndex) {
                if ($("#blogform").valid()) {
                    $("#blogform").submit();
                } else {
                    swal("Form is incomplete", "Please fill in all required fields.", "error");
                }
            }
        });

        // edit validation 
        $.validator.addMethod("editcheckImage", function(value, element, params) {
            var file = element.files[0];
            var allowedTypes = params.allowedTypes || ['image/jpeg', 'image/png', 'image/webp'];
            var maxFileSize = params.maxFileSize || 3 * 1024 * 1024;

            $('.editblogimg-error-msg .error-message').html('');

            if (!file) {
                return true;
            }

            var typeError = false;
            var sizeError = false;

            // Check for valid file type
            if ($.inArray(file.type, allowedTypes) === -1) {
                typeError = true;
            }

            // Check for file size limit
            if (file.size > maxFileSize) {
                sizeError = true;
            }

            if (typeError && sizeError) {
                $.validator.messages.editcheckImage =
                    "Please select a valid image file (JPEG, PNG, or WEBP) and ensure it's smaller than 3 MB.";
            } else if (typeError) {
                $.validator.messages.editcheckImage =
                    "Please select a valid image file (JPEG, PNG, or WEBP).";
            } else if (sizeError) {
                $.validator.messages.editcheckImage = "Please upload an image smaller than 3 MB.";
            }

            return !typeError && !sizeError;
        }, "Invalid image file.");
        $('#editblogform').validate({
            rules: {
                title: {
                    required: true
                },
                url: {
                    required: true
                },
                image: {
                    required: false,
                    editcheckImage: {
                        allowedTypes: ['image/jpeg', 'image/png', 'image/webp'],
                        maxFileSize: 3 * 1024 * 1024
                    }
                },
                meta_title: {
                    required: true
                },
                meta_description: {
                    required: true
                },
            },
            messages: {
                title: {
                    required: "Please enter blog title"
                },
                url: {
                    required: "Please enter the URL"
                },
                image: {
                    required: "Please upload image"
                },
                meta_title: {
                    required: "Please enter the meta title"
                },
                meta_description: {
                    required: "Please enter the meta description"
                },
            },
            onfocusout: function(element) {
                $(element).val($.trim($(element).val()));
                this.element(element);
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") === "image") {
                    error.insertAfter($(".editblogimg-error-msg"));
                } else if (element.attr("name") === "category_id") {
                    error.insertAfter($(".select2-container"));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(form) {
                if ($(form).valid()) {
                    form.submit();
                } else {
                    return false;
                }
            }
        });
        $(".edittab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit",
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (currentIndex < newIndex) {
                    return $("#editblogform").valid();
                }
                return true;
            },
            onFinishing: function(event, currentIndex) {
                var finishButton = $("a[href='#finish']");
                finishButton.prop('disabled', true).text('Submitting...');

                finishButton.removeAttr('href').off('click').on('click', function(e) {
                    e.preventDefault();
                });
                return $("#editblogform").valid();
            },
            onFinished: function(event, currentIndex) {
                if ($("#editblogform").valid()) {
                    $("#editblogform").submit();
                } else {
                    swal("Form is incomplete", "Please fill in all required fields.", "error");
                }
            }
        });
    </script>

    <script>
        var section = [];
        var lecture = [];
        var seid = 0;
        var lectid = 0;

        @if (isset($fetchblogdata))
            @foreach ($fetchblogdata->page_section as $k => $v)
                var cont = section.length;
                section[cont] = {{ $v->id }};
                if (seid < {{ $v->id + 1 }}) seid = {{ $v->id + 1 }};
                lecture[{{ $v->id }}] = [];

                @foreach ($v->page_content as $ck => $cv)
                    var cont = lecture[{{ $v->id }}].length;
                    lecture[{{ $v->id }}][cont] = {{ $cv->id }};
                    lectid = {{ $cv->id + 1 }};
                @endforeach
            @endforeach
        @endif

        $(document).ready(function() {
            $("#insert").click(function() {
                var cont = section.length;
                section[cont] = seid;
                lecture[seid] = [];

                var code = `
                    <div class="portlet box blue-hoki" id="${seid}">
                        <div class="portlet-title px-2">
                            <div class="caption">
                                <i class="ti ti-arrows-move"></i>
                                <span id="title_${seid}">Section ${section.indexOf(seid) + 1}</span>
                            </div>
                            <div class="action_btn">
                                <span data-target="#${seid}sec" class="minimizetogg btn btn-dark btn-sm">
                                    <i class="fa fa-angle-up"></i>
                                </span>
                                <a class="btn btn-dark btn-sm" onclick="secdelete(${seid})">
                                    <i class="ti ti-x" style="color:white"></i> Remove
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body sectionbody collapse in" id="${seid}sec">
                            <div class="scroller" data-rail-visible="1" data-rail-color="yellow" data-handle-color="#a1b2bd">
                                <strong>
                                    <input type="text" class="form-control" placeholder="Section Title" name="secname[${seid}]" id="secname${seid}" />
                                </strong>
                                <br/>
                                <div class="columni" id="l${seid}"></div>
                                <div align="center">
                                    <a onclick="addimage(${seid})" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Add Image
                                    </a>
                                    <a onclick="addcontent(${seid})" class="btn btn-primary">
                                        <i class="fa fa-plus"></i> Add Content
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>`;

                $('#Extracontactperson').append(code);

                $(".columni").sortable({
                    connectWith: ".columni",
                    handle: ".ti-arrows-move",
                    cancel: ".portlet-toggle",
                    placeholder: "portlet-placeholder ui-corner-all"
                });

                seid++;
            });
        });

        function secdelete(id) {
            Swal.fire({
                title: "Are you sure you want to remove this?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, remove it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#edits' + id).length) {
                        lid = $('#edits' + id).val();
                        $.ajax({
                            url: "{{ url('/admin/deletesection') }}/" + lid,
                            success: function() {
                                Swal.fire(
                                    'Deleted!',
                                    'Section has been deleted.',
                                    'success'
                                );
                            }
                        })
                    }
                    $('#' + id).remove();
                    section.splice(section.indexOf(id), 1);
                    $.each(section, function(index, value) {
                        $('#title_' + value).html('Section ' + (index + 1));
                    });
                }
            });
        }

        function addcontent(sectionid) {
            var cont = lecture[sectionid].length;
            lecture[sectionid][cont] = lectid;

            var lecturebody = `
                <div class="portlet box green" id="lec${sectionid}_${lectid}">
                    <div class="portlet-title px-2">
                        <div class="caption">
                            <i class="ti ti-arrows-move"></i>
                            <span id="little_${sectionid}_${lectid}">Content</span>
                        </div>
                        <div class="action_btn">
                            <span aria-expanded="true" 
                                data-toggle="collapse" 
                                data-target="#${lectid}lectt" 
                                class="minimizetogg btn btn-dark btn-sm">
                                <i class="fa fa-angle-up"></i>
                            </span>
                            <a id="anc${sectionid}.${lectid}" 
                            class="btn btn-dark btn-sm" 
                            onclick="lecdelete('${sectionid}_${lectid}')">
                                <i class="ti ti-x" style="color:white"></i> Remove
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body collapse in" id="${lectid}lectt}">
                        <textarea name="content[${sectionid}][${lectid}]" 
                                id="content_${sectionid}_${lectid}" 
                                class="ckeditor"></textarea>
                    </div>
                </div>`;

            $('#l' + sectionid).append(lecturebody);

            CKEDITOR.replace('content_' + sectionid + '_' + lectid, {
                height: 300
            });

            lectid++;
        }

        function addimage(sectionid) {
            var cont = lecture[sectionid].length;
            lecture[sectionid][cont] = lectid;

            var lecturebody = `
                <div class="portlet box green" id="lec${sectionid}_${lectid}">
                    <div class="portlet-title px-2">
                        <div class="caption">
                            <i class="ti ti-arrows-move"></i>
                            <span id="little_${sectionid}_${lectid}">Image</span>
                        </div>
                        <div class="action_btn">
                            <span aria-expanded="true" data-toggle="collapse" data-target="#${lectid}lectt" 
                                class="minimizetogg btn btn-dark btn-sm">
                                <i class="fa fa-angle-up"></i>
                            </span>
                            <a id="anc${sectionid}.${lectid}" class="btn btn-dark btn-sm ms-1" 
                            onclick="lecdelete('${sectionid}_${lectid}')">
                                <i class="ti ti-x" style="color:white"></i> Remove
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body collapse in" id="${lectid}lectt">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label w-100">Thumbnail
                                    <span class="required"> * </span>
                                </label>
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-preview img-thumbnail" 
                                        data-trigger="fileinput" 
                                        style="width: 200px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-outline-primary btn-file">
                                            <span class="fileinput-new"> Select image </span>
                                            <span class="fileinput-exists"> Change </span>
                                            <input type="file" id="image_${sectionid}_${lectid}" 
                                                name="content_image[${sectionid}][${lectid}]">
                                        </span>
                                        <a href="javascript:;" class="btn btn-outline-danger fileinput-exists" 
                                        data-dismiss="fileinput"> Remove </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Image Title</label>
                                            <input type="text" class="form-control" placeholder="Image Title" 
                                                name="image_title[${sectionid}][${lectid}]">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Image Alt</label>
                                            <input type="text" class="form-control" placeholder="Image Alt" 
                                                name="image_alt[${sectionid}][${lectid}]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;

            $('#l' + sectionid).append(lecturebody);

            lectid++;
        }

        function lecdelete(lectid) {
            Swal.fire({
                title: "Are you sure you want to remove this?",
                text: "",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, remove it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    if ($('#editl' + lectid).length) {
                        lid = $('#editl' + lectid).val();
                        $.ajax({
                            url: "{{ url('/admin/deletecontent') }}/" + lid,
                            success: function() {
                                Swal.fire(
                                    'Deleted!',
                                    'Content has been deleted.',
                                    'success'
                                );
                            }
                        })
                    }
                    $('#lec' + lectid).remove();
                    sectionid = (lectid.split("_"))[0];
                    lid = (lectid.split("_"))[1];

                    index = lecture[sectionid].findIndex(function(lec) {
                        return lec == lid
                    });
                    lecture[sectionid].splice(index, 1);
                }
            });
        }
    </script>

    <script>
        $(function() {
            $(".columni").sortable({
                connectWith: ".columni",
                handle: ".ti-arrows-move",
                cancel: ".portlet-toggle",
                placeholder: "portlet-placeholder ui-corner-all",
                stop: function(event, ui) {
                    sorting();
                }
            });

            $(".column").sortable({
                connectWith: ".column",
                handle: ".ti-arrows-move",
                cancel: ".portlet-toggle",
                placeholder: "portlet-placeholder ui-corner-all",
                stop: function(event, ui) {
                    sorting();
                }
            });
        });

        function sorting() {
            $('#Extracontactperson > .portlet').each(function() {
                sid = $(this).attr('id');
                $("#" + sid).find("input[id^=editl]").each(function() {
                    eleid = $(this).attr('id');
                    cid = (eleid.split("_"))[1];
                    $('#' + eleid).attr('name', 'c_id[' + sid + '][' + cid + ']');
                });

                $("#" + sid).find("textarea[id^=content]").each(function() {
                    eleid = $(this).attr('id');
                    cid = (eleid.split("_"))[2];
                    $('#' + eleid).attr('name', 'content[' + sid + '][' + cid + ']');
                });
                $("#" + sid).find("input[id^=image]").each(function() {
                    eleid = $(this).attr('id');
                    cid = (eleid.split("_"))[2];
                    $('#' + eleid).attr('name', 'content[' + sid + '][' + cid + ']');
                });
            });
        }
        CKEDITOR.on('instanceCreated', function(event) {
            var editor = event.editor,
                element = editor.element;
            if (element.is('textarea')) {
                editor.on('configLoaded', function() {
                    editor.config.allowedContent = true;
                    editor.config.removeFormatAttributes = '';

                });
            }
        });

        $(document).on('click', '.minimizetogg', function() {
            var target = $(this).attr('data-target');
            var $targetElement = $(target);

            if ($targetElement.is(':visible')) {
                $targetElement.slideUp();
                $(this).find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
            } else {
                $targetElement.slideDown();
                $(this).find('i').removeClass('fa-angle-down').addClass('fa-angle-up');
            }
        });
    </script>
@endsection
