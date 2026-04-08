@extends('admin.app')
@section('body')
    <div class="body-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-3 d-flex flex-column flex-sm-row align-items-center justify-content-between">
                    <h4 class="text-dark mb-0 text-center text-sm-start">City</h4>
                    <div class="mt-2 mt-sm-0 d-flex flex-column flex-sm-row gap-2">
                        <button type="button" class="btn btn-rounded btn-primary px-4 fs-4 " data-bs-toggle="modal"
                            data-bs-target="#city-modal">
                            <i class="ti ti-plus fs-4 me-2"></i> Add City
                        </button>
                        <button type="button" class="btn btn-rounded btn-danger px-4 fs-4 deletealldata"
                            data-bs-toggle="tooltip" data-bs-placement="top" title="Delete City" data-table='city'
                            data-field='id'>
                            <i class="ti ti-trash fs-4 me-2"></i> Delete City
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="form-label">Select Country</label>
                                    <select name="country_id" id="filter_country_id" class="form-select select2">
                                        <option value="">Select Country</option>
                                        @foreach ($country as $item)
                                            <option value="{{ $item->id }}">{{ $item->country_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">Select State</label>
                                    <select name="state_id" id="filter_state_id" class="form-select select2">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Search</label>
                                    <input type="text" class="form-control" placeholder="Search all data" name="search"
                                        id="search">
                                </div>
                                <div class="col-md-1 d-flex justify-content-center align-items-end">
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
                                    <table id="city_table" class="table table-striped table-bordered align-middle">
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
                                                <th class="all">Country</th>
                                                <th class="all">State</th>
                                                <th class="all">City Name</th>
                                                <th class="all"></th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- add modal  --}}
            <div class="modal fade" id="city-modal" tabindex="-1" aria-labelledby="city-modal" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Add New City
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/city" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="cityform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select Country</label>
                                            <select name="country_id" id="country_id" class="form-select select2">
                                                <option value="">Select Country</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}">{{ $item->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select State</label>
                                            <select name="state_id" id="state_id" class="form-select select2">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">City Name</label>
                                            <input type="text" class="form-control" name="city_name"
                                                placeholder="City Name">
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
            <div class="modal fade" id="editcity-modal" tabindex="-1" aria-labelledby="editcity-modal"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex align-items-center">
                            <h4 class="modal-title" id="myLargeModalLabel">
                                Edit City
                            </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ url('admin') }}/city" role="form" class="form-horizontal" method="post"
                            enctype="multipart/form-data" id="editcityform">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select Country</label>
                                            <select name="country_id" id="edit_country_id" class="form-select select2">
                                                <option value="">Select Country</option>
                                                @foreach ($country as $item)
                                                    <option value="{{ $item->id }}">{{ $item->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">Select State</label>
                                            <select name="state_id" id="edit_state_id" class="form-select select2">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label class="form-label">City Name</label>
                                            <input type="text" class="form-control" name="city_name"
                                                placeholder="City Name">
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
            $('#filter_country_id').select2({
                placeholder: 'Select Country',
            });

            $('#filter_state_id').select2({
                placeholder: 'Select State',
            });

            $('#city-modal').on('shown.bs.modal', function() {
                $('#state_id').select2({
                    dropdownParent: $('#city-modal'),
                    placeholder: 'Select State',
                    allowClear: true
                });
                $('#country_id').select2({
                    dropdownParent: $('#city-modal'),
                    placeholder: 'Select Country',
                    allowClear: true
                });
            });

            $('#editcity-modal').on('shown.bs.modal', function() {
                $('#edit_country_id').trigger('change');
                $('#edit_state_id').select2({
                    dropdownParent: $('#editcity-modal'),
                    placeholder: 'Select State',
                    allowClear: true
                });
                $('#edit_country_id').select2({
                    dropdownParent: $('#editcity-modal'),
                    placeholder: 'Select Country',
                    allowClear: true
                });
            });

            //country wise state
            $('body').on('change', '#country_id, #edit_country_id, #filter_country_id', function() {
                var countryId = $(this).val();
                var targetCountryId;
                if ($(this).attr('id') === 'country_id') {
                    targetCountryId = '#state_id';
                } else if ($(this).attr('id') === 'edit_country_id') {
                    targetCountryId = '#edit_state_id';
                } else {
                    targetCountryId = '#filter_state_id';
                }
                if (countryId) {
                    $.ajax({
                        url: "{{ url('admin/getstates') }}/" + countryId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $(targetCountryId).empty();
                            $(targetCountryId).append(
                                '<option value="">Select State</option>');
                            $.each(data, function(key, value) {
                                $(targetCountryId).append('<option value="' +
                                    value.id + '">' + value.state_name +
                                    '</option>');
                            });
                        },
                        error: function() {
                            toastr.error('Failed to retrieve states');
                        }
                    });
                } else {
                    // Clear subcategories if no category is selected
                    $(targetCountryId).empty();
                    $(targetCountryId).append('<option value="">Select State</option>');
                }
            });

            $('body').on('click', '.edit-btn', function() {
                var id = $(this).data('id');

                $.ajax({
                    url: "{{ url('/admin/city') }}/" + id,
                    method: 'GET',
                    success: function(response) {
                        $('#editcityform input[name="city_name"]').val(response.city_name);
                        $('#editcityform select[name="country_id"]').val(response.country_id);
                        setTimeout(() => {
                            $.ajax({
                                url: "{{ url('admin/getstates') }}/" +
                                    response
                                    .country_id,
                                type: 'GET',
                                dataType: 'json',
                                success: function(states) {
                                    $('#edit_state_id').empty();
                                    $('#edit_state_id').append(
                                        '<option value="">Select State</option>'
                                    );
                                    $.each(states, function(key, value) {
                                        $('#edit_state_id').append(
                                            '<option value="' +
                                            value.id +
                                            '">' + value
                                            .state_name +
                                            '</option>');
                                    });
                                    // Set the state based on the response
                                    $('#edit_state_id').val(response
                                        .state_id);
                                },
                                error: function() {
                                    toastr.error(
                                        'Failed to retrieve states');
                                }
                            });
                        }, 500);
                        var formAction = "{{ url('/admin/city') }}/" + id;
                        $('#editcityform').attr('action', formAction);
                    }
                });
            });

            // validation 
            $('#cityform, #editcityform').each(function() {
                $(this).validate({
                    rules: {
                        city_name: {
                            required: true
                        },
                        country_id: {
                            required: true
                        },
                        state_id: {
                            required: true
                        }
                    },
                    messages: {
                        city_name: {
                            required: "Please enter city name"
                        },
                        state_id: {
                            required: "Please select state"
                        },
                        country_id: {
                            required: "Please select country"
                        },
                    },
                    onfocusout: function(element) {
                        $(element).val($.trim($(element).val()));
                        this.element(element);
                    },
                    errorPlacement: function(error, element) {
                        var select2Container = element.next('.select2-container');
                        if (element.attr("name") === "state_id" || element.attr("name") ===
                            "country_id") {
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

            $('#city-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            ajaxcitydata();

            function ajaxcitydata() {
                if ($.fn.DataTable.isDataTable('#city_table')) {
                    $('#city_table').DataTable().destroy();
                }
                datatable = $('#city_table').DataTable({
                    dom: 'Blfrtip',
                    buttons: [{
                            extend: "pdf",
                            pageSize: 'A4',
                            filename: "City Data",
                            exportOptions: {
                                columns: [0, 2, 3, 4],
                            }
                        },
                        {
                            extend: "csv",
                            filename: "City Data",
                            exportOptions: {
                                columns: [0, 2, 3, 4],
                            }
                        },
                    ],
                    responsive: true,
                    lengthMenu: [
                        [15, 50, 100, 500, -1],
                        [15, 50, 100, 500, "All"],
                    ],
                    "columnDefs": [{
                        "orderable": false,
                        "targets": [1, -1]
                    }],
                    "ajax": {
                        url: "{{ url('admin/cityajaxdata') }}",
                        type: 'GET',
                        data: function(d) {
                            d._token = "{{ csrf_token() }}";
                            d.country_id = $('#filter_country_id').val();
                            d.state_id = $('#filter_state_id').val();
                            d.search = $('#search').val();
                        }
                    },
                });
            }

            $('body').on('click', '.clear', function() {
                var filter_country_id = $('#filter_country_id').val();
                var filter_state_id = $('#filter_state_id').val();
                var search = $('#search').val();
                if (filter_country_id === '' && search === '' && filter_state_id === '') {
                    return;
                }

                $('#filter_country_id').val('').trigger('change');
                $('#filter_state_id').val('').trigger('change');
                $('#search').val('');
                ajaxcitydata();
            });

            $('#filter_country_id,#filter_state_id').on('change', function() {
                ajaxcitydata();
            });

            $('#search').on('keyup', function() {
                ajaxcitydata();
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

            // delete City 
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
        });
    </script>
@endsection
