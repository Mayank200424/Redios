<!doctype html>
<html lang="zxx">


<!-- Mirrored from html.themexriver.com/radios/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:17:13 GMT -->

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Customer</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />

    <!-- css include -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
</head>

<body>

    <div class="body_wrap">

        @include('customer.header')
        <main>

            <!-- breadcrumb start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="radios-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center">
                            <li class="radiosbcrumb-item radiosbcrumb-begin">
                                <a href="{{route('customer.index')}}"><span>{{ __('message.home') }}</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>{{ __('message.checkout') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- start checkout-section -->
            <section class="checkout-section py-5 bg-light">
                <div class="container">
                    <form action="{{ route('customer.placeorder') }}" method="post">
                        @csrf
                        <div class="row g-4">

                            <!-- LEFT SIDE - SHIPPING DETAILS -->
                            <div class="col-lg-7">
                                <div class="card shadow border-0 rounded-4">
                                    <div class="card-body p-4">
                                        <h4 class="mb-4 fw-bold">{{ __('message.shipping_details') }}</h4>
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">{{ __('message.full_name') }} *</label>
                                                <input type="text" class="form-control rounded-3" name="name"
                                                    value="{{ Auth()->user()->name }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('message.email') }} *</label>
                                                <input type="email" class="form-control rounded-3" name="email"
                                                    value="{{ Auth()->user()->email }}">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">{{ __('message.phone') }} *</label>
                                                <input type="tel" class="form-control rounded-3" name="phone"
                                                    placeholder="Enter Phone">
                                                <div>
                                                    <span
                                                        style="color: red;">@error('phone'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">{{ __('message.address') }} *</label>
                                                <textarea class="form-control rounded-3" name="address" rows="3"
                                                    placeholder="Enter Address"></textarea>
                                                <div>
                                                    <span
                                                        style="color: red;">@error('address'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('message.city') }} *</label>
                                                <input type="text" class="form-control rounded-3" name="city"
                                                    placeholder="Enter City">
                                                <div>
                                                    <span
                                                        style="color: red;">@error('city'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('message.state') }} *</label>
                                                <input type="text" class="form-control rounded-3" name="state"
                                                    placeholder="Enter State">
                                                <div>
                                                    <span
                                                        style="color: red;">@error('state'){{ $message }}@enderror</span>
                                                </div>
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label">{{ __('message.pin_code') }} *</label>
                                                <input type="text" class="form-control rounded-3" name="pincode"
                                                    placeholder="Enter PIN Code">
                                                <div>
                                                    <span
                                                        style="color: red;">@error('pincode'){{ $message }}@enderror</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- RIGHT SIDE - ORDER SUMMARY -->
                            <div class="col-lg-5">
                                <div class="card shadow border-0 rounded-4">
                                    <div class="card-body p-4">

                                        <h4 class="mb-4 fw-bold">{{ __('message.cart_summary') }}</h4>

                                        <!-- Product List -->
                                        @foreach ($carts as $cart)
                                            <div class="border rounded-3 p-3 mb-3 bg-light">

                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold">{{ __('message.product_name') }} :</div>
                                                    <div class="col-7 text-end">
                                                        {{ $cart->product->name }}
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-5 fw-semibold">{{ __('message.product_price') }} :</div>
                                                    <div class="col-7 text-end">

                                                        @if($cart->product->discount && $cart->product->discount->status == 'active')

                                                            <!-- Old Price -->
                                                            <span
                                                                style="text-decoration: line-through; color:#888; font-size:0.85em; display:block;">
                                                                ₹{{ number_format($cart->product->price, 2) }}
                                                            </span>

                                                            <!-- Discounted Price -->
                                                            <span style="color:red; font-weight:bold;">
                                                                ₹{{ number_format($cart->product->final_price, 2) }}
                                                            </span>

                                                            <!-- Discount % -->
                                                            <span style="color:green; font-size:0.8em;">
                                                                ({{ $cart->product->discount->discount_value }}% OFF)
                                                            </span>

                                                        @else

                                                            <span style="font-weight:bold;">
                                                                ₹{{ number_format($cart->product->price, 2) }}
                                                            </span>

                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-5 fw-semibold">{{ __('message.qty') }} :</div>
                                                    <div class="col-7 text-end">
                                                        {{ $cart->quantity }}
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach

                                        <!-- Price Summary -->
                                        <div class="d-flex justify-content-between">
                                            <span>{{ __('message.subtotal') }}</span>
                                            <span>₹ {{ $subtotal }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <span>{{ __('message.gst (18%)') }}</span>
                                            <span>₹ {{ $gst }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <span>{{ __('message.delivery_charge') }}</span>
                                            <span>₹ {{ $deliveryCharge }}</span>
                                        </div>

                                        <hr>

                                        <div class="d-flex justify-content-between fw-bold fs-5">
                                            <span>{{ __('message.total') }}</span>
                                            <span class="text-success">₹ {{ $total }}</span>
                                        </div>

                                        <!-- Payment Method -->
                                        <hr class="my-4">

                                        <h5 class="fw-bold mb-3">{{ __('message.payment_method') }}</h5>

                                        <div class="border rounded-3 p-3 mb-3">

                                            <!-- COD -->
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="cod" value="cod" checked>
                                                <label class="form-check-label fw-semibold" for="cod">
                                                    {{ __('message.cod') }}
                                                </label>
                                            </div>

                                            <!-- UPI -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                    id="upi" value="upi">
                                                <label class="form-check-label fw-semibold" for="upi">
                                                    {{ __('message.upi_payment') }}
                                                </label>
                                            </div>

                                        </div>

                                        <!-- Place Order Button -->
                                        <button type="submit" class="btn w-100 mt-3 py-3 rounded-3 fw-bold text-white"
                                            style="background-color:#FF8717;">
                                            {{ __('message.place_order') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- end checkout-section -->

        </main>

        @include('customer.footer')

        <!-- jquery include -->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/slick.js') }}"></script>
        <script src="{{ asset('assets/js/backToTop.js') }}"></script>
        <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
        <script src="{{ asset('assets/js/resize-sensor.min.js') }}"></script>
        <script src="{{ asset('assets/js/theia-sticky-sidebar.min.js') }}"></script>
        <script src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script src="{{ asset('assets/js/jqueryui.js') }}"></script>
        <script src="{{ asset('assets/js/touchspin.js') }}"></script>
        <script src="{{ asset('assets/js/countdown.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
</body>


<!-- Mirrored from html.themexriver.com/radios/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:17:13 GMT -->

</html>