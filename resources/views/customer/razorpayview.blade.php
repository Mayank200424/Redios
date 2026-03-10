{{--<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
</head>
<body>

<h3>Processing Payment...</h3>

<form action="{{ route('razorpay.verify') }}" method="POST">
    @csrf

    <input type="hidden" name="order_id" value="{{ $order->id }}">

    <script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{ env('RAZORPAY_KEY') }}"
        data-amount="{{ $amount * 100 }}"
        data-currency="INR"
        data-order_id="{{ $razorpayOrderId }}"
        data-buttontext="Pay Now"
        data-name="Radios"
        data-description="Order Payment"
        data-prefill.name="{{ Auth()->user()->name }}"
        data-prefill.email="{{ Auth()->user()->email }}"
        data-theme.color="#FF8717">
    </script>
</form>

</body>
</html>--}}

<!DOCTYPE html>
<html>
<head>
    <title>Razorpay Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>

<h3>Redirecting to Payment...</h3>

<form name="razorpayForm" action="{{ route('razorpay.verify') }}" method="POST">
    @csrf
    <input type="hidden" name="order_id" value="{{ $order->id }}">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>

<script>
    var options = {
        "key": "{{ env('RAZORPAY_KEY') }}",
        "amount": "{{ $amount * 100 }}",
        "currency": "INR",
        "name": "Radios",
        "description": "Order Payment",
        "order_id": "{{ $razorpayOrderId }}",
        "handler": function (response){
            
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
            document.getElementById('razorpay_signature').value = response.razorpay_signature;

            document.razorpayForm.submit();
        },
        "prefill": {
            "name": "{{ Auth()->user()->name }}",
            "email": "{{ Auth()->user()->email }}"
        },
        "theme": {
            "color": "#FF8717"
        }
    };

    var rzp = new Razorpay(options);
    rzp.open(); 
</script>

</body>
</html>