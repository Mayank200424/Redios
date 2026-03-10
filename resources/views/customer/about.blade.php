<!doctype html>
<html lang="zxx">


<!-- Mirrored from html.themexriver.com/radios/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:36 GMT -->

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
                                <a href="{{ route('customer.index') }}"><span>{{ __('message.home') }}</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>{{ __('message.about_us') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- About Ecommerce Start -->
            <section class="about pt-80 pb-80">
                <div class="container">

                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <img src="{{ asset('assets/img/latest_electronics_banner.png') }}" class="img-fluid" alt="">
                        </div>

                        <div class="col-lg-6">
                            <h2>Welcome to Our E-Commerce Electronics Store</h2>
                            <p>
                                We are a trusted online electronics marketplace providing the latest
                                smartphones, laptops, tablets, accessories and gadgets at affordable prices.
                                Our mission is to deliver high-quality products with secure payments and fast delivery.
                            </p>

                            <ul class="mt-3">
                                <li>✔ 100% Genuine Products</li>
                                <li>✔ Secure Online Payments</li>
                                <li>✔ GST Billing Available</li>
                                <li>✔ Fast & Reliable Delivery</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Electronic Categories Section -->
            <section class="about-info pt-50 pb-80 bg-light">
                <div class="container">
                    <h2 class="text-center mb-5">Our Electronic Categories</h2>

                    <div class="row text-center">

                        <div class="col-md-3">
                            <h4>📱 Mobile Phones</h4>
                            <p>Latest Android & iOS smartphones from top brands like Samsung, OnePlus and more.</p>
                        </div>

                        <div class="col-md-3">
                            <h4>💻 Laptops</h4>
                            <p>High-performance laptops for students, developers and professionals.</p>
                        </div>

                        <div class="col-md-3">
                            <h4>📟 Tablets</h4>
                            <p>Powerful tablets for entertainment, gaming and productivity.</p>
                        </div>

                        <div class="col-md-3">
                            <h4>🎧 Accessories</h4>
                            <p>Headphones, chargers, smartwatches and other electronic accessories.</p>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Payment & GST Section -->
            <section class="pt-80 pb-80">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-6">
                            <h3>Secure Payment via Razorpay</h3>
                            <p>
                                We use <strong>Razorpay</strong> payment gateway for safe and secure transactions.
                                Customers can pay using:
                            </p>

                            <ul>
                                <li>✔ UPI (Google Pay, PhonePe, Paytm)</li>
                                <li>✔ Credit / Debit Cards</li>
                                <li>✔ Net Banking</li>
                                <li>✔ Wallet Payments</li>
                            </ul>

                            <p>
                                All transactions are encrypted and 100% secure.
                            </p>
                        </div>

                        <div class="col-lg-6">
                            <h3>GST & Delivery Information</h3>

                            <p>
                                ✔ GST Invoice provided with every order.
                                ✔ GST calculated as per Indian Government norms.
                            </p>

                            <p>
                                <strong>Delivery Charges:</strong>
                            </p>

                            <ul>
                                <li>₹0 – Free delivery on orders above ₹999</li>
                                <li>₹50 – Standard delivery below ₹999</li>
                                <li>Express delivery available at extra cost</li>
                            </ul>

                            <p>
                                Delivery time: 3–7 working days across India.
                            </p>
                        </div>
                    </div>

                </div>
            </section>

        </main>

        @include('customer.footer')


    </div>

    <!-- jquery include -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/backToTop.js"></script>
    <script src="assets/js/uikit.min.js"></script>
    <script src="assets/js/resize-sensor.min.js"></script>
    <script src="assets/js/theia-sticky-sidebar.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jqueryui.js"></script>
    <script src="assets/js/touchspin.js"></script>
    <script src="assets/js/countdown.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from html.themexriver.com/radios/about.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:38 GMT -->

</html>