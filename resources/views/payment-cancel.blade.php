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
            background-color: #f8d7da;
        }

        .text-failed {
            color: #dc3545;
            font-weight: bold;
        }

        .reason-text {
            font-size: 1.1rem;
            color: #721c24;
            margin-top: 15px;
        }
    </style>

    <!-- ========================== Payment Cancel / Failed Section ========================== -->
    <section class="store-section s-py-100-50">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-lg-8 p-5 rounded-4 shadow-lg">

                    <!-- Failed Icon -->
                    <div class="mb-4">
                        <i class="icofont-close-circled text-failed" style="font-size:80px;"></i>
                    </div>

                    <!-- Failed Message -->
                    <h2 class="mb-3 text-failed">⚠️ Payment Failed!</h2>
                    <p class="mb-4">Unfortunately, your payment could not be processed.</p>

                    <!-- Display Error Reason -->
                    @if (isset($reason) && !empty($reason))
                        <p class="reason-text">Reason: <strong>{{ ucfirst($reason) }}</strong></p>
                    @endif

                    <!-- Optional Transaction Details (if available) -->
                    @if (isset($transaction))
                        <table class="table table-bordered mx-auto">
                            <tbody>
                                <tr>
                                    <th>Transaction ID:</th>
                                    <td>{{ $transaction->transaction_id }}</td>
                                </tr>
                                <tr>
                                    <th>Store:</th>
                                    <td>{{ $transaction->stores->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th>Amount:</th>
                                    <td>{{ $transaction->currency }} {{ number_format($transaction->amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th>Status:</th>
                                    <td><span class="badge bg-danger">{{ ucfirst($transaction->status) }}</span></td>
                                </tr>
                            </tbody>
                        </table>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mt-5">
                        <a href="{{ url('/') }}" class="btn btn-primary me-2">Go Home</a>
                        <a href="{{ url('/') }}#store" class="btn btn-outline-danger">View Stores</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ========================== End Payment Cancel Section ========================== -->
@endsection
