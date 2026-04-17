<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    @php
        $websetting = DB::table('websetting')->where('id', 1)->first();
        $emailinfo = DB::table('emailinfo')->get();
        $contactinfo = DB::table('contactinfo')->get();
        $socialmedia = DB::table('socialmedia')->get();
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots"
        content="{{ isset($websetting) && $websetting->indexing == 1 ? 'index, follow' : 'noindex, nofollow' }}" />
    <title>{{ isset($meta) && $meta->meta_title != '' ? $meta->meta_title : 'High Octane' }}</title>
    <meta name="description"
        content="{{ isset($meta) && $meta->meta_description != '' ? $meta->meta_description : 'High Octane' }}" />
    <meta name="keywords"
        content="{{ isset($meta) && $meta->meta_keywords != '' ? $meta->meta_keywords : 'High Octane' }}" />
    <meta name="author" content="" />
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <!-- 👇 Added OG + Twitter Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $meta->meta_title ?? 'High Octane' }}">
    <meta property="og:description" content="{{ $meta->meta_description ?? 'High Octane' }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="High Octane">
    <meta property="og:image" content="{{ $meta->og_image ?? asset('assets/logo.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $meta->meta_title ?? 'High Octane' }}">
    <meta name="twitter:description" content="{{ $meta->meta_description ?? 'High Octane' }}">
    <meta name="twitter:image" content="{{ $meta->og_image ?? asset('assets/logo.png') }}">
    <meta name="twitter:url" content="{{ url()->current() }}">
    <!-- 👍 OG & Twitter Added -->

    <link rel="canonical"
        href="{{ isset($page->canonical_url) && $page->canonical_url != '' ? $page->canonical_url : url()->current() }}" />

    @php
        echo $websetting->g_webconsol;
    @endphp
    @php
        echo $websetting->g_analytics;
    @endphp
    @php
        echo $websetting->facebook_pixel;
    @endphp

    <!-- Schema JSON-LD -->
    @if (isset($meta->schema) && !empty($meta->schema))
        <script type="application/ld+json">
            {!! $meta->schema !!}
        </script>
    @endif

    <link rel="icon" href="{{ asset('assets') }}/favicon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="{{ asset('assets/user') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/user') }}/css/plugin.css">
    <link rel="stylesheet" href="{{ asset('assets/user') }}/css/components.css">
    <link rel="stylesheet" href="{{ asset('assets/user') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/user') }}/css/custom.css" />
    <link rel="stylesheet" href="{{ asset('assets/user') }}/css/toastr.min.css" />
    <!-- intlTelInput -->
    <link rel="stylesheet" href="{{ asset('assets') }}/admin/css/intlTelInput.css">

</head>

<body>
    <!-- Header Start Here -->
    <header class="header-area ">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo" title="Logo" loading="lazy">
                    </a>
                </div>
                <div class="main-menu">
                    <ul>
                        <li><a href="{{ url('/') }}/#hero">Home</a></li>
                        <li><a href="{{ url('/') }}/#about">About</a></li>
                        <li><a href="{{ url('/') }}/#store">Store</a></li>
                        <li><a href="{{ url('/') }}/#gallery">Gallery</a></li>
                        <li><a href="{{ url('/') }}/#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="header-right">
                    <div class="menu-icon d-block d-xl-none">
                        <button class="humburger">
                            <svg width="100" height="100" viewbox="0 0 100 100">
                                <path class="line line1"
                                    d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058">
                                </path>
                                <path class="line line2" d="M 20,50 H 80"></path>
                                <path class="line line3"
                                    d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End Here -->
