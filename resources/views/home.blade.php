@extends('app')
@section('body')
    <!-- Hero Area Start Here -->
    <section class="home-v1-hero-area position-relative" id="hero">
        <div class="bg">
            <img src="{{ asset('assets/admin') }}/images/page/{{ $page->image ?? '' }}" alt="Hero" title="Hero"
                loading="eager" fetchpriority="high">
        </div>
        <div class="container">
            <div class="home-v1-hero-wrapper owl-carousel">
                <div class="single-home-v1-hero">
                    <span>WELCOME TO OUR STORE</span>
                    <h2>PLAY. <span>WIN.</span> ENJOY.</h2>
                    <p> Visit any of our stores, scan the QR code, make the payment, and play your favorite games.
                    </p>
                </div>
                <div class="single-home-v1-hero">
                    <span>IN-STORE & ONLINE</span>
                    <h2>PLAY. <span>ANYWHERE.</span></h2>
                    <p>
                        We have two physical stores and one online store.
                        Scan the QR at your location and start playing instantly.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Area End Here -->

    <!-- About Area Start Here -->
    @if (isset($page->page_section[0]))
        <section class="home-v1-about-area s-py-100" id="about">
            <div class="shape">
                <img src="{{ asset('assets/user') }}/img/shape/line-shape.png" alt="shape" title="shape"
                    loading="lazy">
            </div>
            <div class="container">
                <div class="about-hero-wrapper">
                    <div class="about-hero-thumb">
                        @if (isset($page->page_section[0]->page_content[1]) && !empty($page->page_section[0]->page_content[1]->content_image))
                            @php
                                $img = $page->page_section[0]->page_content[1]->content_image ?? null;
                                $imgPath = $img
                                    ? asset('assets/admin/images/page/' . $img)
                                    : asset('assets/user/img/thumb/about-hero.jpg');
                            @endphp
                            <img src="{{ $imgPath }}" alt="About Our Store" title="About Our Store" loading="lazy">
                        @endif
                    </div>
                    <div class="about-hero-content">
                        <div class="title">
                            <span>About Our Store</span>
                            @if (isset($page->page_section[0]->heading) && !empty($page->page_section[0]->heading))
                                <h1>{{ $page->page_section[0]->heading }}</h1>
                            @endif
                        </div>
                        {{-- <div class="content">
                        <h4>Why Choose Our Store?</h4>

                        <p>
                            We provide an easy and convenient way to enjoy games at our physical stores
                            and online. Just scan the QR code, start playing instantly, and pay after
                            you finish. No complicated process — just simple entertainment.
                        </p>

                        <ul>
                            <li>
                                <i class="icofont-long-arrow-right"></i> 2 Physical Stores with QR Access
                            </li>
                            <li>
                                <i class="icofont-long-arrow-right"></i> 1 Online Play Option
                            </li>
                            <li>
                                <i class="icofont-long-arrow-right"></i> Pay After You Play System
                            </li>
                            <li>
                                <i class="icofont-long-arrow-right"></i> Fast, Easy & User Friendly
                            </li>
                        </ul>
                    </div> --}}
                        @if (isset($page->page_section[0]->page_content[0]) && !empty($page->page_section[0]->page_content[0]->content))
                            {!! $page->page_section[0]->page_content[0]->content !!}
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- About Area End Here -->

    <!-- Store Section -->
    {{-- @if (isset($stores) && count($stores) > 0)
        <section class="store-section s-py-100-50" id="store">
            <div class="container">
                <div class="section-title">
                    <div class="star-group">
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                    </div>
                    <div class="title">
                        <div class="span-group">
                            <span></span>
                            <span></span>
                        </div>
                        <h2>Our Store</h2>
                        <div class="span-group span-group-right">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <p>Scan the QR code, play in store, and complete payment after your session.</p>
                </div>
            </div>
            <div class="s-py-50 relative">
                <div class="container">
                    @foreach ($stores as $index => $store)
                        <div class="store-card mb-5 p-4 rounded-4 shadow-sm">
                            <div
                                class="row gy-4 mb-5 align-items-center {{ $index % 2 == 1 ? 'flex-lg-row-reverse flex-md-row-reverse' : '' }}">

                                <!-- LEFT SIDE : QR + BUTTON -->
                                <div class="col-md-6 col-lg-5 text-center">
                                    @if ($store->qr_code)
                                        <img src="{{ asset('assets/admin/images/qrcode/' . $store->qr_code) }}"
                                            alt="{{ $store->name }} QR Code" class="img-fluid rounded" loading="lazy">

                                        <p class="fw-semibold mb-2">Scan QR Code</p>
                                        <div class="or-text my-3">OR</div>
                                    @endif

                                    @if ($store->payment_url && !empty($store->payment_url))
                                        <a href="{{ $store->payment_url }}" class="btn btn-danger px-4 py-2 rounded-pill"
                                            target="_blank">
                                            <i class="icofont-link"></i>&nbsp;Click Pay Now
                                        </a>
                                    @else
                                        <a href="{{ url('/pay/' . $store->id) }}"
                                            class="btn btn-danger px-4 py-2 rounded-pill" target="_blank">
                                            <i class="icofont-link"></i>&nbsp;Click Pay Now
                                        </a>
                                    @endif
                                </div>

                                <!-- RIGHT SIDE : STORE DETAILS -->
                                <div class="col-md-6 col-lg-6">
                                    <div class="store-content {{ $index % 2 == 1 ? 'float-end' : '' }}">
                                        <h3 class="mb-3">{{ $store->name }} – {{ ucfirst($store->store_type) }} Store
                                        </h3>
                                        <p class="mb-4">
                                            Visit our {{ $store->name }} store at {{ $store->location }}, scan the QR
                                            code,
                                            enjoy the game, and complete your payment after playing.
                                        </p>

                                        <ul class="list-unstyled">
                                            @if ($store->mobile)
                                                <li class="mb-2">
                                                    <i class="icofont-ui-call"></i>
                                                    <strong> Mobile:</strong> {{ '+' . $store->country_code }}
                                                    {{ $store->mobile }}
                                                </li>
                                            @endif
                                            @if ($store->email)
                                                <li class="mb-2">
                                                    <i class="icofont-ui-message"></i>
                                                    <strong> Email:</strong> {{ $store->email }}
                                                </li>
                                            @endif
                                            @if ($store->location)
                                                <li class="mb-2">
                                                    <i class="icofont-location-pin"></i>
                                                    <strong> Address:</strong> {{ $store->location }}
                                                </li>
                                            @endif
                                        </ul>

                                        <div class="alert alert-light mt-3 mb-0 ps-0">
                                            <strong>Secure & Fast Payment via QR or Direct Link</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Payment Notice CTA -->
        <section class="cta-area s-py-50 text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="mb-20">
                            When your payment is done, please call on the below number
                            for further details. Thank you!
                        </h5>
                        <h4><i class="icofont-ui-call"></i> Call Now: {{ $websetting->call_mobileno ?? '-' }}</h4>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

    {{-- @if (isset($stores) && count($stores) > 0)
        <section class="store-section s-py-100-50" id="store">
            <div class="container">
                <div class="section-title">
                    <div class="star-group">
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                    </div>
                    <div class="title">
                        <div class="span-group">
                            <span></span>
                            <span></span>
                        </div>
                        <h2>Our Store</h2>
                        <div class="span-group span-group-right">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <p>Come to any of our stores, scan the QR code, pay, and enjoy your favorite games.</p>
                </div>
                <div class="s-py-50 relative">
                    <div class="container">
                        @foreach ($stores as $store)
                            <div class="store-card mb-5 p-4 rounded-4 shadow-sm">
                                <div class="row mb-5 align-items-center gy-4">
                                    <!-- STORE IMAGE -->
                                    <div class="col-lg-4 col-md-12 text-center">
                                        @if ($store->store_image)
                                            <img src="{{ asset('assets/admin/images/store/' . $store->store_image) }}"
                                                class="img-fluid rounded-3 mb-3" alt="{{ $store->name }}" loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/user/img/default-store.jpg') }}"
                                                class="img-fluid rounded-3 mb-3" alt="Store Image" loading="lazy">
                                        @endif
                                    </div>

                                    <div class="col-lg-3 col-md-6 text-center">
                                        @if ($store->qr_code)
                                            <img src="{{ asset('assets/admin/images/qrcode/' . $store->qr_code) }}"
                                                class="img-fluid rounded mb-2" alt="{{ $store->name }} QR" loading="lazy">

                                            <p class="fw-semibold">Scan QR</p>
                                            <div class="or-text my-2">OR</div>
                                        @endif

                                        @if ($store->payment_url && !empty($store->payment_url))
                                            <a href="{{ $store->payment_url }}"
                                                class="btn btn-danger rounded-pill px-4 py-2" target="_blank">
                                                <i class="icofont-link"></i>&nbsp;Pay Now
                                            </a>
                                        @else
                                            <a href="{{ url('/pay/' . $store->id) }}"
                                                class="btn btn-danger rounded-pill px-4 py-2" target="_blank">
                                                <i class="icofont-link"></i>&nbsp;Pay Now
                                            </a>
                                        @endif
                                    </div>

                                    <div class="col-lg-5 col-md-6">
                                        <div class="store-content">
                                            <h3 class="mb-3">
                                                {{ $store->name }} – {{ ucfirst($store->store_type) }} Store
                                            </h3>
                                            <p class="mb-4">
                                                Visit our {{ $store->name }} store and enjoy the best gaming experience.
                                                Scan the QR code, pay, and enjoy the ultimate gaming experience.
                                            </p>

                                            <ul class="list-unstyled">
                                                @if ($store->mobile)
                                                    <li class="mb-2">
                                                        <i class="icofont-ui-call"></i>
                                                        <strong>Mobile:</strong>
                                                        +{{ $store->country_code }} {{ $store->mobile }}
                                                    </li>
                                                @endif
                                                @if ($store->email)
                                                    <li class="mb-2">
                                                        <i class="icofont-ui-message"></i>
                                                        <strong>Email:</strong>
                                                        {{ $store->email }}
                                                    </li>
                                                @endif
                                                @if ($store->location)
                                                    <li class="mb-2">
                                                        <i class="icofont-location-pin"></i>
                                                        <strong>Address:</strong>
                                                        {{ $store->location }}
                                                    </li>
                                                @endif
                                            </ul>

                                            <div class="alert alert-light mt-3 mb-0 ps-0">
                                                <strong>Secure & Fast Payment via QR or Direct Link</strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Payment Notice CTA -->
        <section class="cta-area s-py-50 text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="mb-20">
                            When your payment is done, please call on the below number
                            for further details. Thank you!
                        </h5>
                        <h4><i class="icofont-ui-call"></i> Call Now: {{ $websetting->call_mobileno ?? '-' }}</h4>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

    {{-- @if (isset($stores) && count($stores) > 0)
        <section class="store-section s-py-100-50" id="store">
            <div class="container">
                <div class="section-title">
                    <div class="star-group">
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                    </div>
                    <div class="title">
                        <div class="span-group">
                            <span></span>
                            <span></span>
                        </div>
                        <h2>Our Store</h2>
                        <div class="span-group span-group-right">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <p>Scan the QR code, play in store, and complete payment after your session.</p>
                </div>
                <div class="s-py-50 relative">
                    <div class="container">
                        @foreach ($stores as $index => $store)
                            <div
                                class="row gy-4 align-items-center mb-5 {{ $index % 2 ? 'flex-lg-row-reverse flex-md-row-reverse' : '' }}">

                                <!-- STORE IMAGE -->
                                <div class="col-lg-6 text-center">
                                    <div class="store-image">
                                        @if ($store->store_image)
                                            <img src="{{ asset('assets/admin/images/store/' . $store->store_image) }}"
                                                class="img-fluid rounded" alt="{{ $store->name }}" loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/user/img/default-store.jpg') }}"
                                                class="img-fluid rounded" alt="Store Image" loading="lazy">
                                        @endif
                                    </div>
                                </div>

                                <!-- STORE DETAILS -->
                                <div class="col-lg-6">
                                    <div class="store-content {{ $index % 2 == 1 ? 'float-end' : '' }}">
                                        <h3 class="mb-3">
                                            {{ $store->name }} – {{ ucfirst($store->store_type) }} Store
                                        </h3>
                                        <p class="mb-4">
                                            Visit our {{ $store->name }} store and enjoy the best gaming experience.
                                            Scan the QR code and pay easily after your session.
                                        </p>
                                        <ul class="list-unstyled">
                                            @if ($store->mobile)
                                                <li class="mb-2">
                                                    <i class="icofont-ui-call"></i>
                                                    <strong>Mobile:</strong>
                                                    +{{ $store->country_code }} {{ $store->mobile }}
                                                </li>
                                            @endif
                                            @if ($store->email)
                                                <li class="mb-2">
                                                    <i class="icofont-ui-message"></i>
                                                    <strong> Email:</strong> {{ $store->email }}
                                                </li>
                                            @endif
                                            @if ($store->location)
                                                <li class="mb-2">
                                                    <i class="icofont-location-pin"></i>
                                                    <strong>Address:</strong>
                                                    {{ $store->location }}
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="alert alert-light mt-3 mb-0 ps-0">
                                            <strong>Secure & Fast Payment via QR or Direct Link</strong>
                                        </div>

                                        <!-- QR + PAY -->
                                        <div class="store-payment d-lg-flex align-items-lg-center d-md-flex align-items-md-center gap-4 text-center">
                                            @if ($store->qr_code)
                                                <img src="{{ asset('assets/admin/images/qrcode/' . $store->qr_code) }}"
                                                    class="qr-img" alt="QR Code" loading="lazy">
                                            @endif

                                            <div>
                                                <p class="fw-semibold mb-2">Scan QR Code</p>
                                                <div class="or-text my-3">OR</div>

                                                @if ($store->payment_url && !empty($store->payment_url))
                                                    <a href="{{ $store->payment_url }}"
                                                        class="btn btn-danger rounded-pill px-4 py-2" target="_blank">
                                                        <i class="icofont-link"></i>&nbsp;Pay Now
                                                    </a>
                                                @else
                                                    <a href="{{ url('/pay/' . $store->id) }}"
                                                        class="btn btn-danger rounded-pill px-4 py-2" target="_blank">
                                                        <i class="icofont-link"></i>&nbsp;Pay Now
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

    @if (isset($stores) && count($stores) > 0)
        <section class="store-section s-py-100-50" id="store">
            <div class="container">

                <!-- SECTION TITLE -->
                <div class="section-title">
                    <div class="star-group">
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                        <i class="icofont-game-controller"></i>
                    </div>
                    <div class="title">
                        <div class="span-group">
                            <span></span>
                            <span></span>
                        </div>
                        <h2>Our Store</h2>
                        <div class="span-group span-group-right">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <p>Come to any of our stores, scan the QR code, pay, and enjoy your favorite games.</p>
                </div>

                <!-- ✅ STORE DROPDOWN -->
                {{-- <div class="text-center mb-4">
                    <select id="storeFilter" class="form-select w-auto d-inline-block ">
                        @foreach ($stores as $index => $store)
                            <option value="{{ $store->id }}" {{ $index == 0 ? 'selected' : '' }}>
                                {{ $store->name }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="store-dropdown-wrapper text-center mb-4">
                    <label class="dropdown-label">Select Your Store</label>
                    <div class="custom-dropdown" id="storeDropdown">
                        <div class="dropdown-selected" id="selectedStore">
                            <span class="selected-text">
                                {{ $stores[0]->name ?? 'Select Store' }}
                            </span>
                            <span class="dropdown-icon">&#9662;</span> <!-- ▼ arrow -->
                        </div>
                        <div class="dropdown-options">
                            @foreach ($stores as $index => $store)
                                <div class="dropdown-item {{ $index == 0 ? 'active' : '' }}" data-id="{{ $store->id }}">
                                    {{ $store->name }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- STORE LIST -->
                <div class="s-py-50 relative">
                    <div class="container">

                        @foreach ($stores as $store)
                            <div class="store-card mb-5 p-4 rounded-4 shadow-sm store-item"
                                data-store-id="{{ $store->id }}">

                                <div class="row mb-5 align-items-center gy-4">

                                    <!-- STORE IMAGE -->
                                    <div class="col-lg-4 col-md-12 text-center">
                                        @if ($store->store_image)
                                            <img src="{{ asset('assets/admin/images/store/' . $store->store_image) }}"
                                                class="img-fluid rounded-3 mb-3" alt="{{ $store->name }}" loading="lazy">
                                        @else
                                            <img src="{{ asset('assets/user/img/default-store.jpg') }}"
                                                class="img-fluid rounded-3 mb-3" alt="Store Image" loading="lazy">
                                        @endif
                                    </div>

                                    <!-- QR CODE -->
                                    <div class="col-lg-3 col-md-6 text-center">
                                        @if ($store->qr_code)
                                            <img src="{{ asset('assets/admin/images/qrcode/' . $store->qr_code) }}"
                                                class="img-fluid rounded mb-2" alt="{{ $store->name }} QR" loading="lazy">

                                            <p class="fw-semibold">Scan QR</p>
                                            <div class="or-text my-2">OR</div>
                                        @endif

                                        @if ($store->payment_url && !empty($store->payment_url))
                                            <a href="{{ $store->payment_url }}"
                                                class="btn btn-danger rounded-pill px-4 py-2" target="_blank">
                                                <i class="icofont-link"></i>&nbsp;Pay Now
                                            </a>
                                        @else
                                            <a href="{{ url('/pay/' . $store->id) }}"
                                                class="btn btn-danger rounded-pill px-4 py-2" target="_blank">
                                                <i class="icofont-link"></i>&nbsp;Pay Now
                                            </a>
                                        @endif
                                    </div>

                                    <!-- STORE DETAILS -->
                                    <div class="col-lg-5 col-md-6">
                                        <div class="store-content">
                                            <h3 class="mb-3">
                                                {{ $store->name }} – {{ ucfirst($store->store_type) }} Store
                                            </h3>

                                            <p class="mb-4">
                                                Visit our {{ $store->name }} store and enjoy the best gaming experience.
                                                Scan the QR code, pay, and enjoy the ultimate gaming experience.
                                            </p>

                                            <ul class="list-unstyled">
                                                @if ($store->mobile)
                                                    <li class="mb-2">
                                                        <i class="icofont-ui-call"></i>
                                                        <strong>Mobile:</strong>
                                                        +{{ $store->country_code }} {{ $store->mobile }}
                                                    </li>
                                                @endif

                                                @if ($store->email)
                                                    <li class="mb-2">
                                                        <i class="icofont-ui-message"></i>
                                                        <strong>Email:</strong>
                                                        {{ $store->email }}
                                                    </li>
                                                @endif

                                                @if ($store->location)
                                                    <li class="mb-2">
                                                        <i class="icofont-location-pin"></i>
                                                        <strong>Address:</strong>
                                                        {{ $store->location }}
                                                    </li>
                                                @endif
                                            </ul>

                                            <div class="alert alert-light mt-3 mb-0 ps-0">
                                                <strong>Secure & Fast Payment via QR or Direct Link</strong>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="cta-area s-py-50 text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h5 class="mb-20">
                            When your payment is done, please call on the below number
                            for further details. Thank you!
                        </h5>
                        <h4>
                            <i class="icofont-ui-call"></i>
                            Call Now: {{ $websetting->call_mobileno ?? '-' }}
                        </h4>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- Store Section End -->

    @if (isset($gallery) && count($gallery) > 0)
        <section class="contact-area s-py-100-50" id="gallery">
            <div class="container">
                <div class="section-title">
                    <div class="star-group">
                        <i class="icofont-game-console"></i>
                        <i class="icofont-game-console"></i>
                        <i class="icofont-game-console"></i>
                    </div>
                    <div class="title">
                        <div class="span-group">
                            <span></span>
                            <span></span>
                        </div>
                        <h2>Gallery</h2>
                        <div class="span-group span-group-right">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
                <div class="gamelist-active">
                    <div class="gamelist-grid-sizer"></div>
                    @foreach ($gallery as $item)
                        <div class="gamelist-item">
                            <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                                <div class="">
                                    <img src="{{ asset('assets/admin/images/gallery/' . ($item->g_image ?? 'noimage.webp')) }}"
                                        alt="gamelist">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (2).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div>
                <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (1).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div>
                <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (1).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div>
                <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (1).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div>
                <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (1).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div>
                <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (1).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div>
                <div class="gamelist-item">
                    <div class="gamelist-single-item mb-50 mb-md-30 mb-xs-20">
                        <div class="">
                            <img src="{{ asset('assets/user/img/gallery/WhatsApp Image 2026-03-11 at 4.00.10 PM (1).jpeg') }}"
                                alt="gamelist">
                        </div>
                    </div>
                </div> --}}

                </div>
            </div>
        </section>
    @endif

    <!-- Contact Area Start Here -->
    <section class="contact-area s-py-100" id="contact">
        <div class="container">
            <div class="section-title">
                <div class="star-group">
                    <i class="icofont-game-pad"></i>
                    <i class="icofont-game-pad"></i>
                    <i class="icofont-game-pad"></i>
                </div>
                <div class="title">
                    <div class="span-group">
                        <span></span>
                        <span></span>
                    </div>
                    <h2>Get in Touch with Us</h2>
                    <div class="span-group span-group-right">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="contact-wrapper">
                <div class="contact-info">
                    <div class="contact-title">
                        <h3>Contact Information</h3>
                    </div>
                    <div class="contact-items homecontact-items">
                        @if (isset($contactinfo) && count($contactinfo) > 0)
                            @foreach ($contactinfo as $contact)
                                <a href="tel:{{ '+' . $contact->country_code }}{{ $contact->mobile_no }}"><i
                                        class="icofont-ui-call"></i>{{ '+' . $contact->country_code }}
                                    {{ $contact->mobile_no }}</a>
                            @endforeach
                        @endif
                        @if (isset($emailinfo) && count($emailinfo) > 0)
                            @foreach ($emailinfo as $email)
                                <a href="mailto:{{ $email->email }}"><i
                                        class="icofont-ui-message"></i>{{ $email->email }}</a>
                            @endforeach
                        @endif
                        @if (isset($websetting->address) && !empty($websetting->address))
                            <a href="javascript:void(0)"><i
                                    class="icofont-location-pin"></i>{{ $websetting->address }}</a>
                        @endif
                    </div>
                </div>
                <div class="contact-shape">
                    <img src="{{ asset('assets/user') }}/img/shape/line-shape.png" alt="shape" title="shape"
                        loading="lazy">
                </div>
                <div class="get-in-touch">
                    <div class="contact-title">
                        <h3>Send Us a Message</h3>
                    </div>
                    <form class="getintouch" action="javascript:void(0)" method="post" id="contact-form">
                        @csrf
                        <input type="hidden" name="subject" value="{{ isset($page) ? $page->title : '' }}">
                        <input type="hidden" name="page_id" value="{{ isset($page) ? $page->id : '' }}">
                        <input type="text" name="flag" class="d-none">
                        <input type="hidden" name="form_type" value="0">
                        <input type="hidden" name="timezone" id="contacttimezone">

                        <div class="row">
                            <div class="col-md-12 homecontact-form">
                                <div class="form-group col mb-3">
                                    <div class="form">
                                        <label class="visually-hidden">Name</label>
                                        <input type="text" placeholder="Enter your Name" name="name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col mb-3">
                                    <div class="form">
                                        <label class="visually-hidden">Mobile Number</label>
                                        <input name="mobile" id="mobile" type="text"
                                            class="form-control phone_validate " placeholder="Mobile Number">
                                    </div>
                                </div>
                                <div class="form-group col mb-3">
                                    <div class="form">
                                        <label class="visually-hidden">Email</label>
                                        <input type="email" placeholder="Enter your mail" name="email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col mb-3">
                                    <div class="form">
                                        <label class="visually-hidden">Subject</label>
                                        <input type="text" placeholder="Enter your Subject" name="subject"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group col mb-3">
                                    <div class="form">
                                        <label class="visually-hidden">Message</label>
                                        <textarea placeholder="Type your text here" name="message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="button">
                                    <button class="btn btn-lg br-5 submit-btn" type="submit">Submit Query</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div class="w-100">
        @php
            echo $websetting->location;
        @endphp
    </div>
    <!-- Contact Area End Here -->
@endsection
@section('script')
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     let dropdown = document.getElementById("storeFilter");

        //     function filterStores() {
        //         let selectedId = dropdown.value;

        //         document.querySelectorAll(".store-item").forEach(function(card) {
        //             if (card.getAttribute("data-store-id") === selectedId) {
        //                 card.style.display = "block";
        //             } else {
        //                 card.style.display = "none";
        //             }
        //         });
        //     }
        //     // Default load (first store)
        //     filterStores();
        //     // On change
        //     dropdown.addEventListener("change", filterStores);
        // });

        // $(document).ready(function() {

        //     // ✅ Destroy niceSelect if already applied
        //     if ($('#storeFilter').next('.nice-select').length) {
        //         $('#storeFilter').next('.nice-select').remove(); // remove fake dropdown
        //         $('#storeFilter').show(); // show original select
        //     }

        //     let dropdown = $('#storeFilter');

        //     function filterStores() {
        //         let selectedId = dropdown.val();

        //         $('.store-item').each(function() {
        //             if ($(this).data('store-id') == selectedId) {
        //                 $(this).show();
        //             } else {
        //                 $(this).hide();
        //             }
        //         });
        //     }

        //     // ✅ Default first store
        //     filterStores();

        //     // ✅ Change event
        //     dropdown.on('change', function() {
        //         filterStores();
        //     });

        // });

        document.addEventListener("DOMContentLoaded", function() {

            let dropdown = document.getElementById("storeDropdown");
            let selected = document.getElementById("selectedStore");
            let selectedText = document.querySelector(".selected-text");
            let items = document.querySelectorAll(".dropdown-item");

            let selectedId = items[0]?.getAttribute("data-id");

            selected.addEventListener("click", function() {
                dropdown.classList.toggle("open");
            });

            items.forEach(function(item) {
                item.addEventListener("click", function() {

                    items.forEach(i => i.classList.remove("active"));
                    this.classList.add("active");

                    selectedText.innerText = this.innerText;
                    selectedId = this.getAttribute("data-id");

                    dropdown.classList.remove("open");

                    filterStores();
                });
            });

            function filterStores() {
                document.querySelectorAll(".store-item").forEach(function(card) {
                    if (card.getAttribute("data-store-id") == selectedId) {
                        card.style.display = "block";
                    } else {
                        card.style.display = "none";
                    }
                });
            }

            filterStores();

            document.addEventListener("click", function(e) {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove("open");
                }
            });

        });
    </script>
@endsection
