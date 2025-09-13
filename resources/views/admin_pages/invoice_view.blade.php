<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 10px;
            padding: 5px;
        }

        .page {
            width: 100%;
            height: 100%;
            position: relative;
            min-height: 100vh;
        }

        .header {
            text-align: center;
            font-weight: bold;
        }

        .sub-header {
            text-align: center;
            font-size: 12px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }

        .no-border td {
            border: none;
        }

        .content {
            min-height: 400px;
        }

        /* ensures body spacing */
        .footer {
            position: absolute;
            bottom: 30px;
            width: 100%;
        }

        .total {
            text-align: right;
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <div class="page">

        <!-- Header -->
        <div class="header">SAMMRIDDHI ELECTRICALS</div>
        <div class="sub-header">
            ELECTRICAL CONTRACTOR & GENERAL ORDER SUPPLIER<br>
            506 G.T ROAD MANGALDEEP APARTMENT BLOCK- A 3<sup>RD</sup> FLOOR FAZIR BAZAR HOWRAH-1<br>
            OFFICE:- 6, MANGOE LANE KOLKATA- 711101
        </div>

        <table class="no-border">
            <tr>
                <td>Messers’s <b>{{ $invoice->client->name }}</b></td>
            </tr>
            <tr>
                <td>{{ $invoice->address }}</td>
            </tr>
        </table>

        <!-- Items Table -->
        <table>
            <thead>
                <tr>
                    <th style="width:5%">S.N</th>
                    <th style="width:55%">PARTICULARS</th>
                    <th style="width:10%">Qnty.</th>
                    <th style="width:10%">Rate</th>
                    <th style="width:10%">Rs.</th>
                    <th style="width:10%">P.</th>
                </tr>
            </thead>
            <tbody>



                @foreach ($invoice->items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->particulars }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->rate }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->paise }}</td>
                    </tr>
                @endforeach



            </tbody>
        </table>

        <!-- Footer (sticks bottom) -->
        <div class="footer">
            <p><b>Rupees - {{ ucfirst($invoice->total_in_words) }}</b></p>
            <table class="no-border">
                <tr>
                    <td style="width:80%; text-align:right"><b>Total - </b></td>
                    <td style="width:20%; text-align:right">{{ $invoice->total_rs }}</td>
                </tr>
            </table>
            <br>
            <table class="no-border">
                <tr>
                    <td>Bill no {{ $invoice->bill_no }}  Date
                        {{ $invoice->bill_date ? $invoice->bill_date->format('d-m-Y') : $invoice->created_at->format('d-m-Y') }}
                    </td>
                    <td style="text-align:right">For SAMMRIDDHI ELECTRICALS</td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
