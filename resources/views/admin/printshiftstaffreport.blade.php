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

        html,
        body {
            height: auto;
            /* width: 226.77px; */
            margin: 0 auto;
        }

        .receipt {
            padding: 5px;
            /* width: 226.77px; */
            margin: 0 auto;
            text-align: center;
            /* display: inline-block; */
        }

        body {
            font-family: monospace;
            /* width: 226.77px; */
        }

        h4 {
            text-align: center;
            margin: 10px 0;
            font-size: 18px;
        }

        p {
            margin: 10px 0;
            font-size: 16px;
            line-height: 16px;
            word-break: break-word;
        }

        .center {
            text-align: center;
        }

        hr {
            border: none;
            border-top: 1px dashed black;
            margin: 15px 0;
        }

        @media print {
            @page {
                size: 80mm auto;
                margin: 0;
            }

            html,
            body {
                width: 80mm;
                margin: 0 auto;
                font-family: monospace;
                /* zoom: 1.0; */
            }

            .receipt {
                width: 80mm;
                margin: 0 auto;
                padding: 10px;
            }

            h4 {
                font-size: 20px;
                font-weight: bold;
            }

            p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="receipt">

        <h4>{{ $store_name ?? 'Game Parlour' }}</h4>

        <hr>

        <p><b>Staff:</b> {{ $staff_name }}</p>
        <p><b>Login:</b> {{ date('Y-m-d', strtotime($login_at)) }} {{ date('H:i:s', strtotime($login_at)) }}</p>
        <p><b>Logout:</b> {{ date('Y-m-d', strtotime($logout_at)) }} {{ date('H:i:s', strtotime($logout_at)) }}</p>
        {{-- <p><b>Txn:</b> {{ $r->total_transactions }}</p> --}}
        {{-- <p><b>Amount:</b> ${{ number_format($total_amount, 2) }}</p> --}}
        <hr>

        <h4>Total ${{ $total_amount }}</h4>

        <hr>
        <p style="text-align: center; margin-top: 25px;">*** THANK YOU ***</p>

    </div>


</body>

</html>
