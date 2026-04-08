{{-- <!DOCTYPE html>
<html>

<head>
    <title>Shift Report</title>
    <style>
        .receipt {
            background: #fff;
            font-family: 'Courier New', Courier, monospace;
            line-height: 1.55;
        }

        .store-name {
            text-align: center;
            font-size: 15px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 2px;
        }

        .store-sub {
            text-align: center;
            font-size: 10px;
            margin-bottom: 3px;
        }

        /* ── Section heading (e.g. DRAWER REPORT) ── */
        .sec-head {
            text-align: center;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-top: 2px dotted #000;
            border-bottom: 2px dotted #000;
            padding: 3px 0;
            margin: 5px 0;
        }

        /* ── Dot separator ──────────────────────── */
        .dots {
            border: none;
            border-top: 2px dotted #000;
            margin: 5px 0;
        }

        .sep {
            border: none;
            border-top: 2px dotted #000;
            margin: 4px 0;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            border: none;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .info-table td {
            padding: 1px 0;
            vertical-align: top;
            border: none;
            background: none;
        }

        /* Left column: label */
        .info-table td.lbl {
            width: 55%;
            text-align: left;
            padding-right: 4px;
        }

        /* Right column: value — RIGHT ALIGNED (matches image) */
        .info-table td.val {
            width: 45%;
            text-align: right;
            font-weight: normal;
        }

        /* Bold label rows */
        .info-table tr.bold td {
            font-weight: bold;
        }

        /* ── Balance (highlight) ──────────────────────────── */
        .info-table tr.balance td {
            font-weight: bold;
            padding-top: 3px;
            margin-top: 3px;
        }

        /* ── Footer ───────────────────────────────────────── */
        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 8px;
            line-height: 1.7;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="receipt">

        <div class="store-name">{{ $store_name ?? 'Game Parlour' }}</div>

        <div class="sec-head">Shift Report</div>

        <table class="info-table">
            <tr>
                <td class="lbl">Shift Account:</td>
                <td class="val">{{ $staff_name }}</td>
            </tr>
            <tr>
                <td class="lbl">Shift Start Time:</td>
                <td class="val">{{ date('Y-m-d', strtotime($login_at)) }}</td>
            </tr>
            <tr class="sub">
                <td class="lbl"></td>
                <td class="val">{{ date('H:i:s', strtotime($login_at)) }}</td>
            </tr>
            <tr>
                <td class="lbl">Shift End Time:</td>
                <td class="val">{{ date('Y-m-d', strtotime($logout_at)) }}</td>
            </tr>
            <tr class="sub">
                <td class="lbl"></td>
                <td class="val">{{ date('H:i:s', strtotime($logout_at)) }}</td>
            </tr>
        </table>

        <hr class="dots">

        <table class="info-table">
            <tr>
                <td class="lbl">Initial Amount:</td>
                <td class="val">${{ number_format($total_amount ?? 0, 2) }}</td>
            </tr>
            <tr>
                <td class="lbl">Total Redeem:</td>
                <td class="val">${{ number_format($total_redeem ?? 0, 2) }}</td>
            </tr>
        </table>

        <hr class="dots">

        <table class="info-table">
            <tr class="balance">
                <td class="lbl">Balance:</td>
                <td class="val">
                    ${{ number_format($total_amount - ($total_redeem ?? 0), 2) }}</td>
            </tr>
        </table>

        <div class="footer">
            Datetime: {{ date('Y-m-d H:i:s', strtotime($logout_at)) }}
        </div>

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

        html,
        body {
            height: auto;
            /* width: 226.77px; */
        }

        .receipt {
            /* width: 226.77px; */
            padding: 5px;
            /* display: inline-block; */
        }

        body {
            font-family: monospace;
            /* width: 226.77px; */
            /* exact 80mm */
        }

        h4 {
            text-align: center;
            margin: 10px 0;
            font-size: 15px;
        }

        p {
            margin: 10px 0;
            font-size: 15px;
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

            body {
                width: 80mm;
            }

            .receipt {
                width: 80mm;
                padding: 10px;
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
