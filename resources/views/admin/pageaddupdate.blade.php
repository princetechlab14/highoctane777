@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">
                        {{ isset($id) && $id != 0 && $id != '' ? 'Edit' : 'Add New' }} Page
                    </h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <a href="{{ url('admin/page') }}" class="btn btn-rounded btn-dark px-4 fs-4">
                            <i class="ti ti-arrow-left fs-4 me-1"></i>Back
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body wizard-content">
                            @if (!empty($fetchpagedata))
                                <form action="{{ url('/admin/addupdatepage') }}/{{ $fetchpagedata->id }}" method="POST"
                                    id="editPageForm" class="editpage-tab-wizard wizard-circle"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <!-- Step 1 -->
                                    <h6>Page Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Page Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            placeholder="Page Title" id="page_title"
                                                            value="{{ $fetchpagedata->title }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select name="category_id" class="select2 form-control"
                                                            id="category-select">
                                                            <option value="">Select Category</option>
                                                            @foreach ($category as $val)
                                                                <option value="{{ $val->id }}"
                                                                    {{ $val->id == $fetchpagedata->category_id ? 'selected' : '' }}>
                                                                    {{ $val->category_name }}
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
                                                        <input type="text" name="url" class="form-control"
                                                            id="page_url" placeholder="URL"
                                                            value="{{ $fetchpagedata->url }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Sub Category</label>
                                                        <select name="subcategory_id" class="select2 form-control"
                                                            id="subcategory-select">
                                                            <option value="">Select Sub Category</option>
                                                            @foreach ($subcategory as $val)
                                                                <option value="{{ $val->id }}"
                                                                    {{ $val->id == $fetchpagedata->subcategory_id ? 'selected' : '' }}>
                                                                    {{ $val->category_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label col-lg-12">Image</label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview img-thumbnail"
                                                            data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                            @if (isset($fetchpagedata))
                                                                <img
                                                                    src="{{ asset('public/Assets') }}/Admin/images/page/{{ $fetchpagedata->image != '' ? $fetchpagedata->image : 'noimage.webp' }}">
                                                            @endif
                                                        </div>
                                                        <div>
                                                            <span class="btn btn-outline-primary btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="image"
                                                                    accept="image/png, image/webp, image/jpeg, image/gif">
                                                            </span>
                                                            <a href="#"
                                                                class="btn btn-outline-danger fileinput-exists"
                                                                data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Image Title</label>
                                                        <input type="text" class="form-control" id="img_title"
                                                            name="thumbnail_title" placeholder="Image Title"
                                                            value="{{ $fetchpagedata->thumbnail_title }}">
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-group">
                                                        <label class="form-label">Image Alt</label>
                                                        <input type="text" class="form-control" id="img_alt"
                                                            name="thumbnail_alt" placeholder="Image Alt"
                                                            value="{{ $fetchpagedata->thumbnail_alt }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Content</label>
                                                <textarea name="shortcontent" class="ckeditor">{{ $fetchpagedata->content }}</textarea>
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
                                                    <input type="text" name="meta_title" class="form-control"
                                                        placeholder="Meta Title"
                                                        value="{{ $fetchpagedata->meta_title }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Canonical URL</label>
                                                    <input type="text" name="canonical_url" class="form-control"
                                                        placeholder="Canonical URL"
                                                        value="{{ $fetchpagedata->canonical_url }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Meta Description</label>
                                                    <textarea name="meta_description" class="form-control" rows="4" placeholder="Meta Description">{{ $fetchpagedata->meta_description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Schema</label>
                                                    <textarea name="schema" class="form-control" rows="4" placeholder="Schema">{{ $fetchpagedata->schema }}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Keywords</label>
                                                    <textarea name="keywords" class="form-control" rows="4" placeholder="Keywords">{{ $fetchpagedata->keywords }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 3 -->
                                    <h6>Page Content</h6>
                                    <section>
                                        <div class="column" id="Extracontactperson">
                                            @foreach ($fetchpagedata->page_section as $v)
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
                                                                                                    src="{{ asset('public/Assets/Admin/images/page/' . ($cv->content_image != '' ? $cv->content_image : 'noimage.webp')) }}">

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
                                                                                                        accept="image/png, image/webp, image/jpeg, image/gif">
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
                                <form action="{{ url('/admin/addupdatepage') }}" method="POST" id="pageForm"
                                    class="tab-wizard wizard-circle" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Step 1 -->
                                    <h6>Page Detail</h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Page Title</label>
                                                        <input type="text" name="title" class="form-control"
                                                            placeholder="Page Title" id="page_title">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select name="category_id" class="select2 form-control"
                                                            id="category-select">
                                                            <option value="">Select Category</option>
                                                            @foreach ($category as $val)
                                                                <option value="{{ $val->id }}">
                                                                    {{ $val->category_name }}
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
                                                        <input type="text" name="url" class="form-control"
                                                            id="page_url" placeholder="URL">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="mb-3">
                                                        <label class="form-label">Sub Category</label>
                                                        <select name="subcategory_id" class="select2 form-control"
                                                            id="subcategory-select">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label col-lg-12">Image</label>
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-preview img-thumbnail"
                                                            data-trigger="fileinput" style="width: 200px; height: 150px;">
                                                        </div>
                                                        <div class="blogimg-error-msg">
                                                            <span class="btn btn-outline-primary btn-file">
                                                                <span class="fileinput-new">Select image</span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="image"
                                                                    accept="image/png, image/webp, image/jpeg, image/gif">
                                                            </span>
                                                            <a href="#"
                                                                class="btn btn-outline-danger fileinput-exists"
                                                                data-dismiss="fileinput">Remove</a>
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
                                                <label class="form-label">Content</label>
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
                                                    <input type="text" name="meta_title" class="form-control"
                                                        placeholder="Meta Title">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Canonical URL</label>
                                                    <input type="text" name="canonical_url" class="form-control"
                                                        placeholder="Canonical URL">
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
                                    <h6>Page Content</h6>
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
            $('#page_title').on('keyup change', function() {
                url = $(this).val().replace(/[^A-Za-z0-9]/g, "-").toLowerCase();
                $('#page_url').val(url);
            });

            $('#category-select').select2({
                placeholder: 'Select Category',
                allowClear: true,
            });

            $('#subcategory-select').select2({
                placeholder: 'Select Sub Category',
                allowClear: true,
            });
        });

        //category wise subcategory
        $('body').on('change', '#category-select', function() {
            var categoryId = $(this).val();
            if (categoryId) {
                $.ajax({
                    url: "{{ url('admin/getsubcategories') }}/" + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory-select').empty();
                        $('#subcategory-select').append(
                            '<option value="">Select Sub Category</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory-select').append('<option value="' +
                                value.id + '">' + value.category_name +
                                '</option>');
                        });
                    },
                    error: function() {
                        toastr.error('Failed to retrieve subcategories');
                    }
                });
            } else {
                // Clear subcategories if no category is selected
                $('#subcategory-select').empty();
                $('#subcategory-select').append('<option value="">Select Sub Category</option>');
            }
        });

        // add validation & form-wizard
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
                    return $("#pageForm").valid();
                }
                return true;
            },
            onFinishing: function(event, currentIndex) {
                var finishButton = $("a[href='#finish']");
                finishButton.prop('disabled', true).text('Submitting...');

                finishButton.removeAttr('href').off('click').on('click', function(e) {
                    e.preventDefault();
                });
                return $("#pageForm").valid();
            },
            onFinished: function(event, currentIndex) {
                if ($("#pageForm").valid()) {
                    $("#pageForm").submit();
                } else {
                    swal("Form is incomplete", "Please fill in all required fields.", "error");
                }
            }
        });
        $('#pageForm').validate({
            rules: {
                title: {
                    required: true
                },
                url: {
                    required: true
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
                    required: "Please enter page title"
                },
                url: {
                    required: "Please enter the URL"
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
            submitHandler: function(form) {
                if ($(form).valid()) {
                    form.submit();
                } else {
                    return false;
                }
            }
        });

        // edit validation & form-wizard
        $(".editpage-tab-wizard").steps({
            headerTag: "h6",
            bodyTag: "section",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "Submit",
            },
            onStepChanging: function(event, currentIndex, newIndex) {
                if (currentIndex < newIndex) {
                    return $("#editPageForm").valid();
                }
                return true;
            },
            onFinishing: function(event, currentIndex) {
                var finishButton = $("a[href='#finish']");
                finishButton.prop('disabled', true).text('Submitting...');

                finishButton.removeAttr('href').off('click').on('click', function(e) {
                    e.preventDefault();
                });
                return $("#editPageForm").valid();
            },
            onFinished: function(event, currentIndex) {
                if ($("#editPageForm").valid()) {
                    $("#editPageForm").submit();
                } else {
                    swal("Form is incomplete", "Please fill in all required fields.", "error");
                }
            }
        });
        $('#editPageForm').validate({
            rules: {
                title: {
                    required: true
                },
                url: {
                    required: true
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
                    required: "Please enter page title"
                },
                url: {
                    required: "Please enter the URL"
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
            submitHandler: function(form) {
                if ($(form).valid()) {
                    form.submit();
                } else {
                    return false;
                }
            }
        });
    </script>

    <script>
        var section = [];
        var lecture = [];
        var seid = 0;
        var lectid = 0;

        @if (isset($fetchpagedata))
            @foreach ($fetchpagedata->page_section as $k => $v)
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
                                                name="content_image[${sectionid}][${lectid}]" accept="image/png, image/webp, image/jpeg, image/gif">
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
