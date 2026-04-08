@extends('app')
@section('body')
    <style>
        table {
            border-collapse: collapse;
            width: 50% !important;
            border-spacing: 0;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <!-- ========================== Payment Success Section ========================== -->
    <section class="store-section s-py-100-50">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8 p-5 rounded-4 shadow-lg">

                    <!-- Success Icon -->
                    <div class="mb-4">
                        <i class="icofont-check-circled text-success" style="font-size:80px;"></i>
                    </div>

                    <!-- Success Message -->
                    <h2 class="mb-3">🎉 Payment Successful!</h2>
                    <p class="mb-4">Thank you for your payment. Your game session is confirmed.</p>

                    <!-- Transaction Details -->
                    @if (isset($transaction))
                        <table class="table table-bordered mx-auto">
                            <tbody>
                                <tr>
                                    <th>Transaction ID:</th>
                                    <td>{{ $transaction->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>
                                        {{ $transaction->customer_email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No:</th>
                                    <td>{{ $transaction->customer_mobile ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile Id:</th>
                                    <td>{{ $transaction->customer_mobileid ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Username:</th>
                                    <td>{{ $transaction->customer_username ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Store:</th>
                                    <td>{{ $transaction->stores->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Platform:</th>
                                    <td>{{ $transaction->platform->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td>{{ $transaction->currency }}
                                        {{ number_format($transaction->amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td><span class="badge bg-success">{{ ucfirst($transaction->status) }}</span></td>
                                </tr>
                                </thead>
                        </table>
                    @else
                        <p class="text-success">Your payment is being processed. Please wait a few moments.</p>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mt-5">
                        <a href="{{ url('/') }}" class="btn btn-primary me-2">Go Home</a>
                        <a href="{{ url('/') }}#store" class="btn btn-outline-light">View Stores</a>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ========================== End Payment Success Section ========================== -->
@endsection
