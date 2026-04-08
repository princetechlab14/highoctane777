@php
    $user = session()->get('admin');
    $websetting = \DB::table('websetting')->where('id', 1)->first();
    $leads = \DB::table('leads')->where('notification_status', 0)->get();
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>High Octane Admin</title>

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png"
        href="{{ asset('public/Assets') }}/{{ isset($websetting->favicon) && $websetting->favicon != '' ? $websetting->favicon : '' }}" />
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/css/styles.css" />
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/css/custom.css" />
    <!-- datatable CSS -->
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/libs/datatable/css/datatables.min.css">
    <!-- datepicker  -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('public/Assets') }}/Admin/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/libs/daterangepicker/daterangepicker.css">
    <!-- fileinput  -->
    <link href="{{ asset('public/Assets') }}/Admin/libs/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet"
        type="text/css" />
    <!-- sweetalert  -->
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/libs/sweetalert2/dist/sweetalert2.min.css">
    <!-- select2  -->
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/libs/select2/css/select2.min.css" />
    <!-- intlTelInput -->
    <link rel="stylesheet" href="{{ asset('public/Assets') }}/Admin/css/intlTelInput.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ isset($websetting->favicon) && $websetting->favicon != '' ? asset('public/Assets/' . $websetting->favicon) : '' }}"
            alt="{{ isset($websetting->favicon) && $websetting->favicon != '' ? str_replace('_', '-', substr($websetting->favicon, 0, strpos($websetting->favicon, '.'))) : '' }}"
            title="{{ isset($websetting->favicon) && $websetting->favicon != '' ? str_replace('_', '-', substr($websetting->favicon, 0, strpos($websetting->favicon, '.'))) : '' }}"
            class="lds-ripple img-fluid" />
    </div>

    <div id="main-wrapper">
        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>
                {{-- logo  --}}
                <div class="brand-logo d-flex align-items-center justify-content-center">
                    <a href="{{ url('/admin') }}" class="text-nowrap logo-img">
                        <img src="{{ asset('public/Assets') }}/{{ $websetting->hlogo ?? '' }}"
                            alt="{{ isset($websetting->hlogo) && $websetting->hlogo != '' ? str_replace('_', '-', substr($websetting->hlogo, 0, strpos($websetting->hlogo, '.'))) : '' }}"
                            title="{{ isset($websetting->hlogo) && $websetting->hlogo != '' ? str_replace('_', '-', substr($websetting->hlogo, 0, strpos($websetting->hlogo, '.'))) : '' }}"
                            class="w-100">
                    </a>
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-x"></i>
                    </a>
                </div>

                {{-- all sidebar menu  --}}
                <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                    <ul id="sidebarnav" class="mt-4 mb-5">
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ url('admin/dashboard') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-home"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if (session()->get('admin.user_type') == 'super_admin')
                            @if (hasPermission('features', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/features') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-settings"></i>
                                        </span>
                                        <span class="hide-menu">Features</span>
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('roles', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/roles') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-user"></i>
                                        </span>
                                        <span class="hide-menu">Roles</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if (hasPermission('platform', 'can_view'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('admin/platform') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-puzzle"></i>
                                    </span>
                                    <span class="hide-menu">Platform</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('stores', 'can_view'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('admin/stores') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-building"></i>
                                    </span>
                                    <span class="hide-menu">Stores</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('staff', 'can_view'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('admin/staff') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-users"></i>
                                    </span>
                                    <span class="hide-menu">Staff</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('transactions', 'can_view'))
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ url('admin/transactions') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-book"></i>
                                    </span>
                                    <span class="hide-menu">Transactions</span>
                                </a>
                            </li>
                        @endif
                        @if (hasPermission('reports', 'can_view'))
                            <li class="sidebar-item">
                                <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <span class="d-flex">
                                        <i class="ti ti-report"></i>
                                    </span>
                                    <span class="hide-menu">Reports</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="{{ url('admin/reports') }}"
                                            aria-expanded="false">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Transaction Reports</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a class="sidebar-link" href="{{ url('admin/shiftreports') }}"
                                            aria-expanded="false">
                                            <div class="round-16 d-flex align-items-center justify-content-center">
                                                <i class="ti ti-circle"></i>
                                            </div>
                                            <span class="hide-menu">Shift Reports</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (session()->get('admin.user_type') == 'super_admin')
                            @if (hasPermission('withdrawals', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/withdrawals') }}"
                                        aria-expanded="false">
                                        <span>
                                            <i class="ti ti-wallet"></i>
                                        </span>
                                        <span class="hide-menu">Withdrawals</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                        @if (session()->get('admin.user_type') == 'super_admin')
                            @if (hasPermission('leads', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/leads') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-trending-up"></i>
                                        </span>
                                        <span class="hide-menu">Leads</span>
                                    </a>
                                </li>
                            @endif
                            {{-- @if (hasPermission('category', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/category') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-server"></i>
                                        </span>
                                        <span class="hide-menu">Category</span>
                                    </a>
                                </li>
                            @endif --}}
                            @if (hasPermission('page', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/page') }}" aria-expanded="false">
                                        <span>
                                            <i class="ti ti-file"></i>
                                        </span>
                                        <span class="hide-menu">Page</span>
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('gallery', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link" href="{{ url('admin/gallery') }}" aria-expanded="false">
                                        <span>
                                            <i class="fa fa-images"></i>
                                        </span>
                                        <span class="hide-menu">Gallery</span>
                                    </a>
                                </li>
                            @endif
                            @if (hasPermission('seo_settings', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                        aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="ti ti-settings-2"></i>
                                        </span>
                                        <span class="hide-menu">SEO Settings</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/sitemap') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Sitemap</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/robots') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Robots.txt</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            {{-- @if (hasPermission('email_marketing', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                        aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="ti ti-mail"></i>
                                        </span>
                                        <span class="hide-menu">Email Marketing</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/emailtemplate') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Email Template</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/emailmarketing') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Email Marketing</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @endif --}}
                            @if (hasPermission('general_settings', 'can_view'))
                                <li class="sidebar-item">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)"
                                        aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="ti ti-settings"></i>
                                        </span>
                                        <span class="hide-menu">General Settings</span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level">
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/websetting') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Website Setting</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/socialmedia') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">Social Media</span>
                                            </a>
                                        </li>
                                        {{-- <li class="sidebar-item">
                                            <a href="{{ url('/admin/userheader') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">User Header Setting</span>
                                            </a>
                                        </li>
                                        <li class="sidebar-item">
                                            <a href="{{ url('/admin/userfooter') }}" class="sidebar-link">
                                                <div class="round-16 d-flex align-items-center justify-content-center">
                                                    <i class="ti ti-circle"></i>
                                                </div>
                                                <span class="hide-menu">User Footer Setting</span>
                                            </a>
                                        </li> --}}
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                </nav>
            </div>
        </aside>
        <!--  Sidebar End -->

        <div class="page-wrapper">
            <!--  Header Start -->
            <header class="topbar">
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="d-block d-lg-none py-4">
                            <a href="{{ url('/admin') }}" class="text-nowrap logo-img">
                                <img src="{{ asset('public/Assets') }}/{{ $websetting->hlogo ?? '' }}"
                                    alt="{{ isset($websetting->hlogo) && $websetting->hlogo != '' ? str_replace('_', '-', substr($websetting->hlogo, 0, strpos($websetting->hlogo, '.'))) : '' }}"
                                    title="{{ isset($websetting->hlogo) && $websetting->hlogo != '' ? str_replace('_', '-', substr($websetting->hlogo, 0, strpos($websetting->hlogo, '.'))) : '' }}"
                                    class="w-100">
                            </a>
                        </div>
                        <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0"
                            href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ti ti-dots fs-7"></i>
                        </a>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                            <div class="d-flex align-items-center justify-content-between">

                                {{-- profile dropdown  --}}
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
                                        <a class="nav-link position-relative" href="javascript:void(0)"
                                            id="drop2" aria-expanded="false">
                                            <i class="ti ti-bell-ringing"></i>
                                            <div class="notification bg-primary rounded-circle"></div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop2">
                                            <div class="d-flex align-items-center justify-content-between py-3 px-7">
                                                <h5 class="mb-0 fs-5 fw-semibold">Notifications</h5>
                                                <span
                                                    class="badge text-bg-primary updatecounter rounded-4 px-3 py-1 lh-sm">{{ count($leads) }}
                                                    new</span>
                                            </div>
                                            <div class="message-body notification-message-body" data-simplebar>
                                                @if (isset($leads) && count($leads) > 0)
                                                    @foreach ($leads as $val)
                                                        <a href="javascript:void(0)"
                                                            class="py-6 px-7 d-flex align-items-center dropdown-item">
                                                            <span class="me-3">
                                                                <img src="{{ asset('public/Assets') }}/Admin/images/trend.png"
                                                                    alt="New Lead" title="New Lead" />
                                                            </span>
                                                            <div class="w-100">
                                                                <h6 class="mb-1 fw-semibold lh-base">
                                                                    {{ $val->name }}
                                                                </h6>
                                                                <span
                                                                    class="fs-2 d-block text-body-secondary">{{ date('d F,Y', strtotime($val->date)) }}</span>
                                                            </div>
                                                            <button
                                                                class="badge text-bg-primary border-0 lead_notification"
                                                                data-id="{{ $val->id }}">
                                                                <i class="fa fa-check"></i>
                                                            </button>
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <a href="javascript:void(0)"
                                                        class="py-6 px-7 d-flex align-items-center dropdown-item no-notification">
                                                        <div class="w-100">
                                                            <h6 class="mb-1 lh-base text-center">No Notifications
                                                            </h6>
                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                            @if (isset($leads) && count($leads) > 0)
                                                <div class="py-6 px-7 mb-1 read-all-btn">
                                                    <button class="btn btn-outline-primary w-100 read-all-btn">Read All
                                                        Notifications</button>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="{{ asset('public/Assets') }}/Admin/images/profile/{{ $user->p_image ? $user->p_image : 'user.webp' }}"
                                                        class="rounded-circle" width="35" height="35"
                                                        alt="Profile" title="Profile">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar="">
                                                <div class="py-3 px-7 pb-0">
                                                    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                                </div>
                                                <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                    <img src="{{ asset('public/Assets') }}/Admin/images/profile/{{ $user->p_image ? $user->p_image : 'user.webp' }}"
                                                        class="rounded-circle" width="80" height="80"
                                                        alt="Profile" title="Profile">
                                                    <div class="ms-3">
                                                        <h5 class="mb-1 fs-3">{{ $user->name }}</h5>
                                                        <span class="mb-1 d-block"><i
                                                                class="ti ti-phone fs-4"></i>{{ $user->mobile }}</span>
                                                        <p class="mb-0 d-flex align-items-center gap-2">
                                                            <i class="ti ti-mail fs-4"></i> {{ $user->email }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="message-body">
                                                    <a href="{{ url('admin/profile') }}"
                                                        class="py-8 px-7 mt-8 d-flex align-items-center">
                                                        <span
                                                            class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
                                                            <img src="{{ asset('public/Assets') }}/Admin/images/svgs/icon-account.svg"
                                                                alt="Account" title="Account" width="24"
                                                                height="24">
                                                        </span>
                                                        <div class="w-100 ps-3">
                                                            <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
                                                            <span class="fs-2 d-block text-body-secondary">Account
                                                                Settings</span>
                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="d-grid py-4 px-7 pt-8">
                                                    @if ($user->user_type != 'staff')
                                                        <a href="{{ url('admin/logout') }}"
                                                            class="btn btn-outline-primary">Log Out</a>
                                                    @else
                                                        <a href="javascript:void(0)" id="logoutBtn"
                                                            class="btn btn-outline-primary">Log Out</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!--  Mobilenavbar -->
                    <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
                        aria-labelledby="offcanvasWithBothOptionsLabel">
                        <nav class="sidebar-nav scroll-sidebar">
                            <div class="offcanvas-header justify-content-between">
                                <img src="{{ isset($websetting->favicon) && $websetting->favicon != '' ? asset('public/Assets/' . $websetting->favicon) : '' }}"
                                    alt="{{ isset($websetting->favicon) && $websetting->favicon != '' ? str_replace('_', '-', substr($websetting->favicon, 0, strpos($websetting->favicon, '.'))) : '' }}"
                                    title="{{ isset($websetting->favicon) && $websetting->favicon != '' ? str_replace('_', '-', substr($websetting->favicon, 0, strpos($websetting->favicon, '.'))) : '' }}"
                                    class="img-fluid" />
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
                                <ul id="sidebarnav">

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </header>
            <!--  Header End -->
