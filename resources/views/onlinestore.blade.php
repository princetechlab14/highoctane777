 @extends('app')
 @section('body')

     <!-- Store Section -->
     @if (isset($stores) && count($stores) > 0)
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
                     <p>Scan the QR, pay, and start playing your favorite games.</p>
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
                                             Visit our {{ $store->name }} store and enjoy the best gaming experience.
                                             Scan the QR code, pay, and enjoy the ultimate gaming experience.
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
     @endif
     <!-- Store Section End -->

     <!-- Contact Area Start Here -->
     <section class="contact-area s-py-100 contactonline" id="contact">
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
                     <div class="contact-items onlinecontact-items">
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
