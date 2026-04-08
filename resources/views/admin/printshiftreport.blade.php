{{-- <!DOCTYPE html>
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
                    <th class="all">Store</th>
                    <th class="all">Staff</th>
                    <th class="all">Staff Email</th>
                    <th class="all">Staff Mobile</th>
                    <th class="all">Login</th>
                    <th class="all">Logout</th>
                    <th class="all">Working Hours</th>
                    <th class="all">Total Transactions</th>
                    <th class="all">Total Amount</th>
                </tr>
            </thead>
            @php
                $totalAmt = 0;
            @endphp
            <tbody>
                @if (count($transactions) > 0)
                    @foreach ($transactions as $k => $value)
                        @php
                            $hours = floor($value->working_seconds / 3600);
                            $minutes = floor(($value->working_seconds % 3600) / 60);
                            $totalAmt = $totalAmt + $value->total_amount;
                        @endphp
                        <tr>
                            <td>{{ $k + 1 }}</td>
                            <td>{{ $value->store_name ? $value->store_name : '-' }} </td>
                            <td>{{ $value->staff_name }}</td>
                            <td style="word-break: break-all;">{{ $value->staff_email }}</td>
                            <td>{{ $value->staff_mobile }}</td>
                            <td>{{ $value->login_at ? date('d-m-Y H:i:s', strtotime($value->login_at)) : '-' }}</td>
                            <td>{{ $value->logout_at ? date('d-m-Y H:i:s', strtotime($value->logout_at)) : 'Active' }}</td>
                            <td>{{ $hours . 'h ' . $minutes . 'm' }}</td>
                            <td>{{ $value->total_transactions }}</td>
                            <td>{{ number_format($value->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="9" style="float: right">Total</th>
                        <th>{{ number_format($totalAmt, 2) }}</th>
                    </tr>
                @else
                    <tr>
                        <th colspan="12">No data found</th>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Shift Receipt</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: monospace;
            /* width: 226.77px; */
            /* exact 80mm */
        }

        .receipt {
            /* width: 226.77px; */
            padding: 5px;
        }

        h4 {
            text-align: center;
            margin: 5px 0;
            font-size: 13px;
        }

        p {
            margin: 2px 0;
            font-size: 11px;
            line-height: 14px;
            word-break: break-word;
        }

        .center {
            text-align: center;
        }

        hr {
            border: none;
            border-top: 1px dashed black;
            margin: 5px 0;
        }

        @media print {
            @page {
                size: 80mm auto;
                margin: 0;
            }

            body {
                width: 80mm;
            }

            .receipt {
                width: 80mm;
                padding: 5px;
            }
        }
    </style>
</head>

<body>
    <div class="receipt">

        <h4>SHIFT REPORT</h4>

        <hr>

        @php $grandTotal = 0; @endphp

        @foreach ($transactions as $r)
            @php $grandTotal += $r->total_amount; @endphp

            <p><b>Store:</b> {{ $r->store_name }}</p>
            <p><b>Staff:</b> {{ $r->staff_name }}</p>
            <p><b>Login:</b> {{ $r->login_at }}</p>
            <p><b>Logout:</b> {{ $r->logout_at ?? 'Active' }}</p>
            {{-- <p><b>Txn:</b> {{ $r->total_transactions }}</p> --}}
            <p><b>Amount:</b> ${{ number_format($r->total_amount, 2) }}</p>
            <hr>
        @endforeach

        <h4>Total ${{ number_format($grandTotal, 2) }}</h4>

        <hr>

        <p style="text-align: center;">*** THANK YOU ***</p>

    </div>
</body>

</html>
