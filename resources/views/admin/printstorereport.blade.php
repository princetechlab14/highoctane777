<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">

        tr {
            margin: 0 !important;
            padding: 0;
        }

        table {
            border-spacing: 0px !important;
            border: 1px solid #000;
            border-collapse: collapse;
            width: 100%;
            table-layout: fixed;
        }

        th,
        td {
            border: 1px solid #000;
            font-size: 12px;
            margin: 0 !important;
            padding: 0 5px;
            text-align: center;
            word-break: break-word;
            word-wrap: break-word;
        }

        th {
            background: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="row">
        <table>
            <thead>
                <tr>
                    <th class="all" width="5%">No.</th>
                    <th class="all">Transaction Id</th>
                    <th class="all">MobileId</th>
                    <th class="all">Store</th>
                    <th class="all">Amount</th>
                    <th class="all">Payment</th>
                    <th class="all">Status</th>
                    <th class="all">Customer Name</th>
                    <th class="all">Customer Email</th>
                    <th class="all">Customer Mobile</th>
                    <th class="all">Username</th>
                    <th class="all">Platform</th>
                    <th class="all">Date</th>
                </tr>
            </thead>
            @php
                $totalAmt = 0;
            @endphp
            <tbody>
                @if (count($transactions) > 0)
                    @foreach ($transactions as $k => $value)
                        @php
                            $totalAmt = $totalAmt + $value->amount;
                        @endphp
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td style="word-break: break-all;">{{ $value->transaction_id }}</td>
                            <td>{{ $value->customer_mobileid }}</td>
                            <td>{{ $value->stores ? $value->stores->name : '-' }}</td>
                            <td>{{ number_format($value->amount, 2) }}</td>
                            <td>{{ ucfirst($value->payment_method) }}</td>
                            <td>{{ ucfirst($value->status) }}</td>
                            <td>{{ $value->customer_name }}</td>
                            <td style="word-break: break-all;">{{ $value->customer_email }}</td>
                            <td>{{ $value->customer_mobile }}</td>
                            <td>{{ $value->customer_username }}</td>
                            <td>{{ $value->platform ? $value->platform->name : '-', }}</td>
                            <td>{{ $value->created_at ? date('d-m-Y H:i a', strtotime($value->created_at)) : '-' }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" style="float: right">Total</th>
                        <th>{{ number_format($totalAmt, 2) }}</th>
                        <th colspan="8"></th>
                    </tr>
                @else
                    <tr>
                        <th colspan="13">No data found</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
