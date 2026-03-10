<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer</title>
</head>

<body>
    <h2>Order Cancellation & Refund Confirmation</h2>

    <p>Hello {{ $order->users->name ?? 'Customer' }},</p>

    <p>Your order <strong>{{ $order->order->order_number }}</strong> has been successfully cancelled.</p>

    <hr>

    <h4>Refund Details:</h4>

    <p><strong>Order Amount:</strong> ₹{{ $order->total_amount }}</p>
    <p><strong>Refund Amount:</strong> ₹{{ $order->total_amount }}</p>
    <p><strong>Payment Method:</strong> {{ $order->payment_mode }}</p>
    <p><strong>Status:</strong> Refund Initiated</p>

    <hr>

    @if($order->payment_method != 'cod')
        <p>Your refund will be credited within 5-7 business days to your original payment method.</p>
    @else
        <p>This was a Cash on Delivery order. No refund is required.</p>
    @endif

    <p>If you have any questions, please contact our support team.</p>

    <p>Thank you for shopping with us.</p>
</body>

</html>