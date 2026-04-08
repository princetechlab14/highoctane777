@extends('app')
@section('body')
    <section class="s-py-100 store-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 policy-dtls-content">
                    <h1 class="mb-4">Privacy Policy</h1>
                    <p><strong>Effective Date:</strong> {{ date('F d, Y') }}</p>
                    {!! $page->content !!}

                    {{-- <p>
                    Welcome to our website. Your privacy is important to us. This Privacy Policy explains how we collect,
                    use, and protect your information when you visit our website, make online payments, or visit our physical stores.
                </p>

                <h3>1. Information We Collect</h3>
                <p>We may collect the following types of information:</p>
                <ul>
                    <li><strong>Personal Information:</strong> Name, mobile number, email address, and payment details.</li>
                    <li><strong>Booking Information:</strong> Game preferences, visit date, and store selection.</li>
                    <li><strong>Technical Information:</strong> IP address, browser type, device information, and cookies.</li>
                </ul>

                <h3>2. How We Use Your Information</h3>
                <ul>
                    <li>To process game bookings and payments.</li>
                    <li>To confirm your store visit or online booking.</li>
                    <li>To provide customer support.</li>
                    <li>To improve our services and website experience.</li>
                    <li>To send promotional offers (only if you opt in).</li>
                </ul>

                <h3>3. Online Payments</h3>
                <p>
                    All online payments are processed securely through trusted third-party payment gateways.
                    We do not store your debit/credit card information on our servers.
                </p>

                <h3>4. Physical Store Visits</h3>
                <p>
                    When you visit our physical stores, we may collect your name and contact details for booking confirmation,
                    identification, and safety purposes.
                </p>

                <h3>5. Data Protection</h3>
                <p>
                    We implement reasonable security measures to protect your personal information from unauthorized access,
                    misuse, or disclosure. However, no method of transmission over the internet is 100% secure.
                </p>

                <h3>6. Cookies</h3>
                <p>
                    Our website may use cookies to enhance user experience and analyze website traffic.
                    You can disable cookies through your browser settings if you prefer.
                </p>

                <h3>7. Sharing of Information</h3>
                <p>
                    We do not sell or rent your personal information. We may share information only with:
                </p>
                <ul>
                    <li>Payment processing partners for transaction purposes.</li>
                    <li>Legal authorities if required by law.</li>
                </ul>

                <h3>8. Children’s Privacy</h3>
                <p>
                    Our services are not intended for children under 13 without parental supervision.
                </p>

                <h3>9. Your Rights</h3>
                <p>
                    You have the right to request access, correction, or deletion of your personal data.
                    For such requests, please contact us using the details below.
                </p>

                <h3>10. Contact Us</h3>
                <p>
                    If you have any questions about this Privacy Policy, please contact us at:
                </p>
                <p>
                    <strong>Email:</strong> info@yourwebsite.com <br>
                    <strong>Phone:</strong> +91-XXXXXXXXXX
                </p>

                <h3>11. Updates to This Policy</h3>
                <p>
                    We may update this Privacy Policy from time to time. Changes will be posted on this page
                    with an updated effective date.
                </p> --}}

                </div>
            </div>
        </div>
    </section>
@endsection
