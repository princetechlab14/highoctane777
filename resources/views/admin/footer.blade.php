</div>

<script src="{{ asset('public/Assets') }}/Admin/js/vendor.min.js"></script>
<!-- Import Js Files -->
<script src="{{ asset('public/Assets') }}/Admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/libs/simplebar/dist/simplebar.min.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/js/theme/app.init.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/js/theme/theme.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/js/theme/app.min.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/js/theme/sidebarmenu.js"></script>
<!-- solar icons -->
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/js/theme/app.horizontal.init.js"></script>
<!-- datatable JS  -->
<script src="{{ asset('public/Assets') }}/Admin/libs/datatable/js/datatables.min.js"></script>
<!-- date picker  -->
<script src="{{ asset('public/Assets') }}/Admin/js/extra-libs/moment/moment.min.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
</script>
<script src="{{ asset('public/Assets') }}/Admin/js/forms/datepicker-init.js"></script>
<script src="{{ asset('public/Assets') }}/Admin/libs/daterangepicker/daterangepicker.js"></script>
<!-- jquery-validation -->
<script src="{{ asset('public/Assets') }}/Admin/libs/jquery-validation/dist/jquery.validate.min.js"></script>
<!-- toastr  -->
<script src="{{ asset('public/Assets') }}/Admin/js/plugins/toastr-init.js"></script>
<!-- fileinput  -->
<script src="{{ asset('public/Assets') }}/Admin/libs/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- sweetalert -->
<script src="{{ asset('public/Assets') }}/Admin/libs/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- CKeditor -->
<script src="{{ asset('public/Assets') }}/Admin/libs/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- Form-wizard -->
<script src="{{ asset('public/Assets') }}/Admin/libs/jquery-steps/build/jquery.steps.min.js"></script>
<!-- form repeater -->
<script src="{{ asset('public/Assets') }}/Admin/libs/jquery.repeater/jquery.repeater.min.js"></script>
<!-- select2  -->
<script src="{{ asset('public/Assets') }}/Admin/libs/select2/js/select2.min.js"></script>
<!-- intlTelInput -->
<script src="{{ asset('public/Assets') }}/Admin/js/forms/intlTelInput.min.js"></script>

<script>
    toastr.options = {
        'closeButton': true,
    };
    @if (Session::has('message'))
        {!! Session::get('message') !!}
    @endif
</script>

<script>
    $(document).ready(function() {
        $('body').on('click', '.toggle-password', function() {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });

        $(".phone_validate").on("input", function(event) {
            $(this).val($(this).val().replace(/[^\d\s]/g, ""));
        });
    });
</script>
<script>
    //multiple delete all record
    function deleteSelectedRows(datatable, button) {
        var dataarr = [];
        $('input:checkbox[name=alldatachecks]:checked').each(function() {
            dataarr.push($(this).val());
        });

        if (dataarr.length > 0) {
            Swal.fire({
                title: "Are you sure you want to delete this?",
                text: "This action is irreversible and will permanently remove the selected items.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    var table = $(button).attr('data-table');
                    var field = $(button).attr('data-field');

                    $.ajax({
                        method: "POST",
                        url: "{{ url('admin/deletealldata') }}",
                        data: {
                            _token: "{{ csrf_token() }}",
                            dataarr: dataarr,
                            table: table,
                            field: field,
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'The selected records have been deleted successfully.',
                                    icon: 'success'
                                });

                                // Remove the deleted rows from DataTable
                                dataarr.forEach(function(id) {
                                    datatable
                                        .row($('input:checkbox[value="' + id + '"]')
                                            .closest('tr'))
                                        .remove()
                                        .draw(
                                            false);
                                });
                            } else if (response.status == 2) {
                                Swal.fire({
                                    icon: 'warning',
                                    text: response.message,
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error',
                                    text: response.message,
                                    icon: 'error'
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
        } else {
            Swal.fire({
                text: "Please select at least one item to delete.",
                icon: "warning",
                confirmButtonText: "OK"
            });
        }
    }
</script>
<script>
    function sendmail(getmaildata) {
        $.ajax({
            url: "{{ url('sendmail') }}",
            type: "POST",
            cache: false,
            data: {
                _token: "{{ csrf_token() }}",
                msg: getmaildata.msg,
                title: getmaildata.title,
                attachment: getmaildata.attachment,
                email: getmaildata.email,
            },
            success: function(result) {
                console.log('success');
            }
        });
    }
</script>
<script>
    $('body').on('click', '.lead_notification', function() {
        var leadid = $(this).attr('data-id');
        var notificationElement = $(this).closest('a');
        var notificationCountElement = $('.updatecounter');

        $.ajax({
            type: "GET",
            url: "{{ url('admin/readnotification') }}/" + leadid,
            dataType: "json",
            success: function(response) {
                if (response.success == true) {
                    toastr.success('Notification has been read.');
                    notificationElement.remove();
                    var currentCount = parseInt(notificationCountElement.text()) || 0;
                    notificationCountElement.text(currentCount - 1 + ' new');

                    if ($('.notification-message-body a.dropdown-item').length === 0) {
                        $('.notification-message-body').empty().append(`
                            <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item no-notification">
                                <div class="w-100">
                                    <h6 class="mb-1 lh-base text-center">No Notifications</h6>
                                </div>
                            </a>
                        `);
                        $('.read-all-btn').hide();
                    }
                } else {
                    toastr.error('Something went wrong..!');
                }
            },
            error: function() {
                toastr.error('Failed to mark notification as read.');
            }
        });
    });

    // Mark all notifications as read
    $('body').on('click', '.read-all-btn', function() {
        var notificationCountElement = $('.updatecounter');

        $.ajax({
            type: "GET",
            url: "{{ url('admin/readallnotifications') }}",
            dataType: "json",
            success: function(response) {
                if (response.success == true) {
                    toastr.success('All notifications have been read.');
                    $('.notification-message-body a.dropdown-item').not('.read-all-btn').remove();
                    notificationCountElement.text('0 new');
                    $('.notification-message-body').html(`
                        <a href="javascript:void(0)" class="py-6 px-7 d-flex align-items-center dropdown-item no-notification">
                            <div class="w-100">
                                <h6 class="mb-1 lh-base text-center">No Notifications</h6>
                            </div>
                        </a>
                    `);
                    $('.read-all-btn').hide();
                } else {
                    toastr.error('Something went wrong..!');
                }
            },
            error: function() {
                toastr.error('Failed to mark all notifications as read.');
            }
        });
    });

    // $('#logoutBtn').click(function(e) {
    //     e.preventDefault(); // prevent default link action

    //     Swal.fire({
    //         title: 'Do you want to print shift report before logout?',
    //         icon: 'question',
    //         showCancelButton: true,
    //         confirmButtonText: 'Print & Logout',
    //         cancelButtonText: 'Cancel',
    //         reverseButtons: true,
    //         allowOutsideClick: false, // ❌ Prevent closing on outside click
    //         allowEscapeKey: false, // ❌ Prevent ESC key closing
    //         allowEnterKey: true
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             // ✅ Print first
    //             $.post("{{ url('admin/printshiftstaffreport') }}", {
    //                 _token: "{{ csrf_token() }}"
    //             }, function(res) {
    //                 // window.open(res.url, '_blank');

    //                 // var a = document.createElement("a");
    //                 // a.href = res.url;
    //                 // a.setAttribute("download", res.filename);
    //                 // a.click();

    //                 // // After printing → logout
    //                 // setTimeout(() => {
    //                 //     window.location.href = "{{ url('admin/logout') }}";
    //                 // }, 1000);


    //                 // var printWindow = window.open(res.url);
    //                 // // wait until PDF fully loads
    //                 // var timer = setInterval(function() {
    //                 //     try {
    //                 //         if (printWindow.document.readyState === 'complete') {
    //                 //             clearInterval(timer);

    //                 //             printWindow.focus();
    //                 //             printWindow.print(); // ✅ AUTO PRINT

    //                 //             // // logout after print
    //                 //             // setTimeout(() => {
    //                 //             //     window.location.href = "{{ url('admin/logout') }}";
    //                 //             // }, 1000);
    //                 //         }
    //                 //     } catch (e) {
    //                 //         // ignore cross-origin errors while loading PDF
    //                 //     }
    //                 // }, 500);


    //                 // var iframe = document.createElement('iframe');
    //                 // iframe.style.display = 'none';
    //                 // iframe.src = res.url;
    //                 // document.body.appendChild(iframe);
    //                 // iframe.onload = function() {
    //                 //     iframe.contentWindow.focus();
    //                 //     iframe.contentWindow.print(); // ✅ print in same tab

    //                 //     // logout after print
    //                 //     setTimeout(() => {
    //                 //             window.location.href = "{{ url('admin/logout') }}";
    //                 //         },
    //                 //         15000
    //                 //     ); // 15000 = 15s (to ensure print dialog is closed before logout, adjust as needed)
    //                 // };


    //                 // Create hidden iframe for same-tab printing
    //                 var iframe = document.createElement('iframe');
    //                 iframe.style.position = 'fixed';
    //                 iframe.style.right = '0';
    //                 iframe.style.bottom = '0';
    //                 iframe.style.width = '0';
    //                 iframe.style.height = '0';
    //                 iframe.style.border = 'none';
    //                 iframe.src = res.url;
    //                 document.body.appendChild(iframe);

    //                 iframe.onload = function() {
    //                     try {
    //                         iframe.contentWindow.focus();
    //                         iframe.contentWindow.print(); // ✅ Trigger print dialog

    //                         // Polling to detect when print dialog closed
    //                         let poll = setInterval(function() {
    //                             // if iframe unloaded (user closed print), logout
    //                             if (iframe.contentWindow.closed || document
    //                                 .hidden) {
    //                                 clearInterval(poll);
    //                                 document.body.removeChild(iframe);
    //                                 window.location.href =
    //                                     "{{ url('admin/logout') }}";
    //                             }
    //                         }, 500);

    //                         // Fallback: force logout after 30s if print dialog event not detected
    //                         setTimeout(() => {
    //                             clearInterval(poll);
    //                             if (document.body.contains(iframe)) {
    //                                 document.body.removeChild(iframe);
    //                             }
    //                             window.location.href = "{{ url('admin/logout') }}";
    //                         }, 5000); // 5000 = 5s

    //                     } catch (e) {
    //                         Swal.fire('Error', 'Unable to print the report.', 'error');
    //                     }
    //                 };

    //             }).fail(function() {
    //                 Swal.fire('Error', 'Failed to generate report PDF.', 'error');
    //             });

    //         } else if (result.dismiss === Swal.DismissReason.cancel) {
    //             // ✅ Direct logout without printing
    //             window.location.href = "{{ url('admin/logout') }}";
    //         }
    //     });
    // });

    $('#logoutBtn').click(function(e) {
        e.preventDefault();

        Swal.fire({
            title: 'Do you want to print shift report before logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Print & Logout',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Generating report...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.post("{{ url('admin/printshiftstaffreport') }}", {
                    _token: "{{ csrf_token() }}"
                }, function(res) {
                    Swal.close();

                    // Show report with options
                    Swal.fire({
                        title: 'Shift Report',
                        html: `
                        <div style="text-align: left; max-height: 400px; overflow: auto; padding: 10px; border: 1px solid #ddd; margin-bottom: 15px;">
                            ${res.html}
                        </div>
                        <button class="btn btn-primary" id="printAndLogoutBtn" style="width: 100%; margin-top: 10px;">
                            🖨️ Print Report & Logout
                        </button>
                    `,
                        width: '550px',
                        showCancelButton: true,
                        confirmButtonText: 'Logout Without Printing',
                        cancelButtonText: 'Stay Logged In',
                        allowOutsideClick: false,
                        didOpen: () => {
                            const printBtn = document.getElementById(
                                'printAndLogoutBtn');
                            if (printBtn) {
                                printBtn.onclick = () => {
                                    // Create iframe for printing
                                    const printFrame = document.createElement(
                                        'iframe');
                                    printFrame.style.position = 'absolute';
                                    printFrame.style.width = '0';
                                    printFrame.style.height = '0';
                                    printFrame.style.border = 'none';
                                    document.body.appendChild(printFrame);

                                    printFrame.contentDocument.write(res.html);
                                    printFrame.contentDocument.close();
                                    printFrame.contentWindow.focus();
                                    printFrame.contentWindow.print();

                                    // Close modal and logout after print dialog closes
                                    const checkPrintDone = setInterval(() => {
                                        try {
                                            if (printFrame.contentWindow
                                                .document.hidden !==
                                                undefined) {
                                                // Print dialog likely closed
                                                clearInterval(
                                                    checkPrintDone);
                                                Swal.close();
                                                Swal.fire({
                                                    title: 'Printing Complete',
                                                    text: 'Logging out now...',
                                                    icon: 'success',
                                                    timer: 1500,
                                                    showConfirmButton: false
                                                }).then(() => {
                                                    window
                                                        .location
                                                        .href =
                                                        "{{ url('admin/logout') }}";
                                                });

                                                setTimeout(() => {
                                                    if (document
                                                        .body
                                                        .contains(
                                                            printFrame
                                                        )) {
                                                        document
                                                            .body
                                                            .removeChild(
                                                                printFrame
                                                            );
                                                    }
                                                }, 2000);
                                            }
                                        } catch (e) {
                                            // Cross-origin error, assume print dialog closed
                                            clearInterval(
                                                checkPrintDone);
                                            setTimeout(() => {
                                                Swal.close();
                                                window.location
                                                    .href =
                                                    "{{ url('admin/logout') }}";
                                            }, 3000);
                                        }
                                    }, 1000);

                                    // Fallback logout after 30 seconds
                                    setTimeout(() => {
                                        clearInterval(checkPrintDone);
                                        if (!window.location.href
                                            .includes('logout')) {
                                            // window.location.href =
                                            //     "{{ url('admin/logout') }}";
                                        }
                                    }, 30000);
                                };
                            }
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Logout Without Printing
                            window.location.href = "{{ url('admin/logout') }}";
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            // Stay Logged In - NO LOGOUT
                            Swal.fire({
                                title: 'Stay Logged In',
                                text: 'You are still logged in',
                                icon: 'info',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }
                    });

                }).fail(function() {
                    Swal.fire('Error', 'Failed to generate report.', 'error');
                });

            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Cancel on first dialog - DIRECT LOGOUT
                window.location.href = "{{ url('admin/logout') }}";
            }
        });
    });
</script>

</body>

</html>
