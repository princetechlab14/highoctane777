@extends('app')
@section('body')
    <section class="s-py-100 store-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 policy-dtls-content">
                    <h1 class="mb-4">Disclaimer</h1>

                    <p><strong>Effective Date:</strong> {{ date('F d, Y') }}</p>

                    {!! $page->content !!}

                    {{-- <p>
                        Welcome to <strong>[Your Game Parlour Name]</strong>. By using our website, visiting any of our
                        physical locations, or making payments online, you acknowledge and agree to the following terms:
                    </p>

                    <h3>1. Multi-Location Operations</h3>
                    <ul>
                        <li>We operate three different game parlour locations. Availability, pricing, and timing of games
                            may vary across locations.</li>
                        <li>Users are responsible for confirming the specific location, game schedule, and availability
                            before making a payment or visiting the store.</li>
                    </ul>

                    <h3>2. Payment and Transaction Disclaimer</h3>
                    <ul>
                        <li>All payments, whether made online via Stripe (including QR-based payments) or directly at any of
                            our stores, are <strong>final, non-refundable, and non-disputable</strong>.</li>
                        <li>We do not process cancellations, chargebacks, or disputes after a successful payment.</li>
                        <li>Users must ensure that they scan the correct QR code and enter the correct amount before
                            completing any payment.</li>
                        <li>Stripe is used as the payment processor; we are not responsible for technical issues or delays
                            caused by third-party payment gateways.</li>
                    </ul>

                    <h3>3. User Responsibility and Conduct</h3>
                    <ul>
                        <li>All users must follow the rules and instructions provided by our staff during gameplay.</li>
                        <li>Users are responsible for their own safety and the safety of companions while playing games.
                        </li>
                        <li>We are not liable for any personal injuries, loss, or damage to personal belongings during
                            gameplay at any location.</li>
                        <li>Minors must be accompanied by parents or guardians at all times while visiting our parlours.
                        </li>
                    </ul>

                    <h3>4. System Access and Roles</h3>
                    <ul>
                        <li>The system supports multiple roles including Super Admin, Sub Admin, and Staff Members
                            (view-only).</li>
                        <li>Access privileges are assigned based on roles. Users are responsible for maintaining
                            confidentiality of their login credentials.</li>
                        <li>Any misuse of the system, including unauthorized access or manipulation of transactions, is
                            strictly prohibited.</li>
                    </ul>

                    <h3>5. Limitation of Liability</h3>
                    <p>
                        <strong>[Your Game Parlour Name]</strong> and its affiliates shall not be liable for any direct,
                        indirect, incidental, or consequential damages arising out of or in connection with:
                    </p>
                    <ul>
                        <li>Use of our website or physical parlour services</li>
                        <li>Online or in-store payments</li>
                        <li>QR code transactions or Stripe payment processing</li>
                        <li>Any injuries or loss incurred during gameplay</li>
                    </ul>

                    <h3>6. Accuracy of Information</h3>
                    <p>
                        While we strive to provide accurate and up-to-date information about game schedules, locations,
                        pricing, and offers, we do not guarantee completeness or accuracy. Users are advised to verify
                        information before visiting a location or making a payment.
                    </p>

                    <h3>7. Updates to Disclaimer</h3>
                    <p>
                        We reserve the right to update this Disclaimer at any time without prior notice. All changes will be
                        posted on this page with an updated effective date.
                    </p>

                    <h3>8. Contact Us</h3>
                    <p>
                        If you have any questions regarding this Disclaimer, please contact us at:
                    <p>
                        <strong>Email:</strong> info@yourwebsite.com <br>
                        <strong>Phone:</strong> +91-XXXXXXXXXX
                    </p>
                    </p>

                    <p class="mt-4"><strong>By using our website, visiting our parlours, or making any payment, you
                            acknowledge that you have read, understood, and agreed to this Disclaimer.</strong></p> --}}
                </div>
            </div>
        </div>
    </section>
@endsection
