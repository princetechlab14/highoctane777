@extends('app')
@section('body')
    <!-- Contact Area Start Here -->
    <section class="contact-area s-py-100 position-relative">
        <div class="bg background-img">
            <img class="left-right" src="{{ asset('public/Assets') }}/Admin/images/page/{{ $page->image ?? 'noimage.webp' }}"
                alt="Contact Us" title="Contact Us" loading="lazy">
        </div>
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
                    <h1>{{ $page->title }}</h1>
                    <div class="span-group span-group-right">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                @if (isset($page->content) && $page->content != '')
                    {!! $page->content !!}
                @endif
            </div>
            <div class="contact-wrapper">
                <div class="contact-info">
                    <div class="contact-title" data-aos="fade-down" data-aos-delay="200">
                        <h3>Contact Information</h3>
                    </div>
                    <div class="contact-items" data-aos="fade-down">
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
                            <a href="javascript:void(0)"><i class="icofont-location-pin"></i>{{ $websetting->address }}</a>
                        @endif
                    </div>
                </div>
                <div class="contact-shape">
                    <img src="{{ asset('public/Assets/User') }}/img/shape/line-shape.png" alt="shape" title="shape" loading="lazy">
                </div>
                <div class="get-in-touch">
                    <div class="contact-title" data-aos="fade-up">
                        <h3>Send Us a Message</h3>
                    </div>
                    <form class="getintouch" action="javascript:void(0)" method="post" id="contact-form">
                        @csrf
                        <input type="hidden" name="subject" value="{{ isset($page) ? $page->title : '' }}">
                        <input type="hidden" name="page_id" value="{{ isset($page) ? $page->id : '' }}">
                        <input type="text" name="flag" class="d-none">
                        <input type="hidden" name="form_type" value="0">

                        <div class="get-in-touch-from">
                            <div class="form" data-aos="fade-up" data-aos-delay="200">
                                <label class="visually-hidden">Name</label>
                                <input type="text" placeholder="Enter your Name" name="name" class="form-control">
                            </div>
                            <div class="form" data-aos="fade-up" data-aos-delay="400">
                                <label class="visually-hidden">Mobile Number</label>
                                <input name="mobile" id="mobile" type="text" class="form-control phone_validate "
                                    placeholder="Mobile Number">
                            </div>
                            <div class="form" data-aos="fade-up" data-aos-delay="600">
                                <label class="visually-hidden">Email</label>
                                <input type="email" placeholder="Enter your mail" name="email" class="form-control">
                            </div>
                            <div class="form" data-aos="fade-up" data-aos-delay="800">
                                <label class="visually-hidden">Subject</label>
                                <input type="text" placeholder="Enter your Subject" name="subject" class="form-control">
                            </div>
                            <div class="form" data-aos="fade-up" data-aos-delay="1000">
                                <label class="visually-hidden">Message</label>
                                <textarea placeholder="Type your text here" name="message" class="form-control"></textarea>
                            </div>
                            <div class="button" data-aos="fade-up" data-aos-delay="1400">
                                <button class="btn btn-lg br-5 submit-btn" type="submit">Submit Query</button>
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
