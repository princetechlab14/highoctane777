@extends('app')
@section('body')
    <section class="s-py-100 store-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 policy-dtls-content">
                    <h1 class="mb-4">Terms & Conditions</h1>

                    <p><strong>Effective Date:</strong> {{ date('F d, Y') }}</p>

                    {!! $page->content !!}
                    {{--                     
                    <p>
                        Welcome to <strong>[Your Game Parlour Name]</strong>. By using our website, visiting any of our
                        physical locations, or making payments online, you agree to be bound by the following Terms &
                        Conditions:
                    </p>

                    <h3>1. Acceptance of Terms</h3>
                    <p>
                        By accessing or using our website, services, or visiting any of our stores, you acknowledge that you
                        have read, understood, and agreed to these Terms & Conditions.
                    </p>

                    <h3>2. Services</h3>
                    <ul>
                        <li>We operate multiple game parlour locations. Services, game schedules, and availability may vary
                            by location.</li>
                        <li>All services, including gameplay, online bookings, and promotions, are subject to availability.
                        </li>
                        <li>We reserve the right to modify, suspend, or discontinue any service at any time without prior
                            notice.</li>
                    </ul>

                    <h3>3. User Eligibility</h3>
                    <ul>
                        <li>Users must be at least 13 years old to access our website or use our services without parental
                            supervision.</li>
                        <li>Minors must be accompanied by a parent or guardian at all times when visiting our physical
                            locations.</li>
                    </ul>

                    <h3>4. Account and Access</h3>
                    <ul>
                        <li>Some services require a user account. You are responsible for maintaining the confidentiality of
                            your account credentials.</li>
                        <li>Any activity under your account is your responsibility. Unauthorized use should be reported
                            immediately.</li>
                        <li>We reserve the right to suspend or terminate accounts for violation of these Terms & Conditions.
                        </li>
                    </ul>

                    <h3>5. Payment and Refund Policy</h3>
                    <ul>
                        <li>All payments, whether made online via Stripe (including QR-based payments) or at our physical
                            stores, are <strong>final, non-refundable, and non-disputable</strong>.</li>
                        <li>Users must ensure correct payment details before completing a transaction.</li>
                        <li>We are not responsible for any failed or delayed transactions caused by third-party payment
                            gateways.</li>
                        <li>By making a payment, you acknowledge and accept that the payment is final.</li>
                    </ul>

                    <h3>6. User Conduct</h3>
                    <ul>
                        <li>Users must comply with all rules, instructions, and safety guidelines while using our services.
                        </li>
                        <li>Misconduct, disruptive behavior, or damage to property may result in removal from premises
                            without a refund.</li>
                        <li>Users are responsible for their personal belongings and safety during gameplay.</li>
                    </ul>

                    <h3>7. Intellectual Property</h3>
                    <ul>
                        <li>All content, graphics, logos, and materials on the website are the property of <strong>[Your
                                Game Parlour Name]</strong> or its licensors.</li>
                        <li>Unauthorized use, reproduction, or distribution of any content is strictly prohibited.</li>
                    </ul>

                    <h3>8. Limitation of Liability</h3>
                    <p>
                        <strong>[Your Game Parlour Name]</strong> shall not be liable for any direct, indirect, incidental,
                        or consequential damages arising out of:
                    </p>
                    <ul>
                        <li>Use of our website or physical parlour services</li>
                        <li>Online or in-store payments (<strong>payments are final, non-refundable, and
                                non-disputable</strong>)</li>
                        <li>QR code transactions or Stripe payment processing</li>
                        <li>Any injuries, loss, or damage incurred during gameplay</li>
                    </ul>

                    <h3>9. Changes to Terms & Conditions</h3>
                    <p>
                        We reserve the right to update or modify these Terms & Conditions at any time without prior notice.
                        All changes will be posted on this page with the updated effective date.
                    </p>

                    <h3>10. Governing Law</h3>
                    <p>
                        These Terms & Conditions shall be governed by and interpreted under the laws of [Your
                        Country/State].
                        Any disputes arising from these Terms shall be subject to the exclusive jurisdiction of the courts
                        in [Your City/State].
                    </p>

                    <h3>11. Contact Information</h3>
                    <p>
                        If you have any questions regarding these Terms & Conditions, please contact us at:</p>
                    <p>
                        <strong>Email:</strong> info@yourwebsite.com <br>
                        <strong>Phone:</strong> +91-XXXXXXXXXX
                    </p>

                    <p>
                        <strong>
                            By using our website, visiting our parlours, or making payments, you acknowledge that you have
                            read, understood, and agreed to these Terms & Conditions.
                        </strong>
                    </p> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
