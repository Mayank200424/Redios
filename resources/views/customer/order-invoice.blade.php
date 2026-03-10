<h2>Order Invoice</h2>

<p>Hello {{ $invoice->users->name }},</p>

<p>Your order has been successfully delivered and payment is confirmed.</p>

<p>Please find your invoice attached with this email.</p>

<p>Order Number : {{ $invoice->order->order_number }}</p>

<p>Thank you for shopping with us.</p>