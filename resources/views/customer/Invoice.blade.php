<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tax Invoice</title>

<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 14px;
        color: #333;
    }

    .container {
        width: 100%;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 5px;
    }

    /* Section Titles */
    .section-title {
        background: #f2f2f2;
        padding: 8px;
        font-weight: bold;
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    table, th, td {
        border: 1px solid #ddd;
    }

    th {
        background: #f8f8f8;
        padding: 8px;
        text-align: left;
    }

    td {
        padding: 8px;
    }

    .text-right {
        text-align: right;
    }

    .no-border td {
        border: none;
    }

    /* Order Summary Title */
    .small-title {
        width: 40%;
        float: right;
        background: #f2f2f2;
        font-size: 14px;
        font-weight: bold;
        margin-top: 40px;
        padding: 8px;
        border: 1px solid #ddd;
        border-bottom: none;
        clear: left;
        box-sizing: border-box;
    }

    /* Order Summary Table */
    .summary-table {
        width: 40%;
        float: left;
        border-collapse: collapse;
        margin-top: 0;
        clear: left;
        box-sizing: border-box;
    }

    .summary-table td {
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
        border-top: none;
    }

    .total-row td {
        font-weight: bold;
        background: #f8f8f8;
    }

    .footer {
        clear: both;
        margin-top: 60px;
        text-align: center;
        font-size: 12px;
        color: #777;
    }

</style>
</head>

<body>
<div class="container">

    <!-- ================= INVOICE HEADER ================= -->
    <h1>INVOICE</h1>

    <table class="no-border">
        <tr>
            <td>
                <strong>Invoice No:</strong> {{ $invoice->order->order_number }} <br>
                <strong>Invoice Date:</strong> {{ $invoice->created_at->format('d-m-Y') }}
            </td>
            <td class="text-right">
                <strong>Payment Mode:</strong> {{ ucfirst($invoice->payment_mode) }}
            </td>
        </tr>
    </table>

    <!-- ================= CUSTOMER DETAILS ================= -->
    <div class="section-title">Customer Details</div>

    <table>
        <tr>
            <td>
                <strong>Name:</strong> {{ $invoice->users->name }}<br>
                <strong>Email:</strong> {{ $invoice->users->email }}<br>
                <strong>Phone:</strong> {{ $invoice->order->address->phone }}
            </td>
        </tr>
    </table>

    <!-- ================= SHIPPING ADDRESS ================= -->
    <div class="section-title">Shipping Address</div>

    <table>
        <tr>
            <td>
                <strong>Address:</strong> {{ $invoice->order->address->address }}<br>
                <strong>City:</strong> {{ $invoice->order->address->city }}<br>
                <strong>State:</strong> {{ $invoice->order->address->state }}<br>
                <strong>PinCode:</strong> {{ $invoice->order->address->pincode }}
            </td>
        </tr>
    </table>

    <!-- ================= PRODUCT DETAILS ================= -->
    <div class="section-title">Product Details</div>

    @php
        $quantity = $invoice->quantity ?? 1;
        $rate = $invoice->product->price;
        $amount = $rate * $quantity;
    @endphp

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Category</th>
                <th class="text-right">Qty</th>
                <th class="text-right">Price (₹)</th>
                <th class="text-right">Amount (₹)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td align="center">1</td>
                <td>{{ $invoice->product->name }}</td>
                <td>{{ $invoice->product->category->name }}</td>
                <td class="text-right">{{ $quantity }}</td>
                <td class="text-right">{{ number_format($rate,2) }}</td>
                <td class="text-right">{{ number_format($amount,2) }}</td>
            </tr>
        </tbody>
    </table>
    <br>

    <!-- ================= ORDER SUMMARY ================= -->
    @php
        $subtotal = $amount;
        $cgst = $subtotal * 2.5 / 100;
        $sgst = $subtotal * 2.5 / 100;
        $delivery = 50;
        $grandTotal = $subtotal + $cgst + $sgst + $delivery;
    @endphp

    <table class="summary-table">
        <tr>
            <td>Subtotal</td>
            <td class="text-right">₹{{ number_format($subtotal,2) }}</td>
        </tr>
        <tr>
            <td>CGST (9%)</td>
            <td class="text-right">₹{{ number_format($cgst,2) }}</td>
        </tr>
        <tr>
            <td>SGST (9%)</td>
            <td class="text-right">₹{{ number_format($sgst,2) }}</td>
        </tr>
        <tr>
            <td>Delivery Charge</td>
            <td class="text-right">₹{{ number_format($delivery,2) }}</td>
        </tr>
        <tr class="total-row">
            <td>Grand Total</td>
            <td class="text-right">₹{{ number_format($grandTotal,2) }}</td>
        </tr>
    </table>

    <div style="clear: both;"></div>

    <!-- ================= FOOTER ================= -->
    <div class="footer">
        Thank you for your business.<br>
    </div>

</div>
</body>
</html>