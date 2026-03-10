<!doctype html>
<html lang="zxx">


<!-- Mirrored from html.themexriver.com/radios/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:38 GMT -->
<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Customer</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon"/>

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
                                <a href="index.html"><span>{{ __('message.home') }}</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>{{ __('message.contact') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- contact info start -->
            <section class="contact-info">
                <div class="container">
                    <div class="row justify-content-center mt-none-30">
                        <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                            <div class="contact-info__item d-flex">
                                <span class="icon"><img src="{{ asset('assets/img/icon/mail.html') }}" alt=""></span>
                                <div class="content">
                                    <h3>Mail address</h3>
                                    <a href="mailto:radios.info@gmail.com">radios.info@gmail.com</a>
                                    <a href="tel:998757478492">+998757478492</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                            <div class="contact-info__item active d-flex">
                                <span class="icon"><img src="{{ asset('assets/img/icon/location.html') }}" alt=""></span>
                                <div class="content">
                                    <h3>Office Location</h3>
                                    <p>4517 Washington Ave. Manch <br> ester, Kentucky 39495</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                            <div class="contact-info__item d-flex">
                                <span class="icon"><img src="{{ asset('assets/img/icon/call-2.html') }}" alt=""></span>
                                <div class="content">
                                    <h3>Phone Number</h3>
                                    <a href="tel:404555012834">+405 - 555 - 0128 - 34</a>
                                    <a href="tel:404555012863">+405 - 555 - 0128 - 63</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 mt-30">
                            <div class="contact-info__item d-flex">
                                <span class="icon"><img src="{{ asset('assets/img/icon/c_us.html') }}" alt=""></span>
                                <div class="content">
                                    <h3>Connect Us</h3>
                                    <a href="mailto:radios.info@gmail.com">radios.info@gmail.com</a>
                                    <a href="mailto:radios.support@gmail.com">radios.support@gmail.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact info end -->

            <!-- contact start -->
            <section class="contact pt-90">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="contact-img pos-rel">
                                <img src="{{ asset('assets/img/contact/img_01.html') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="contact-from__wrap pl-55">
                                <form class="contact-from" action="#">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="contact-from__field">
                                                <input type="text" placeholder="Enter your name*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from__field">
                                                <input type="email" placeholder="Enter your mail*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from__field">
                                                <input type="number" placeholder="Enter your number*">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="contact-from__field">
                                                <input type="text" placeholder="Weabsite Link*">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="contact-from__field">
                                                <textarea name="message" id="message" cols="30" rows="10" placeholder="Enter your Massage*"></textarea>
                                            </div>
                                        </div>
                                        <div class="contact-from__chekbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="checkbox">
                                            <label for="checkbox">Save my name, email, and website in this browser for the next time I comment.</label>
                                        </div>
                                        <div class="contact-from__btn mt-35">
                                            <button class="thm-btn thm-btn__2">
                                                <span class="btn-wrap">
                                                    <span>Send Messege</span>
                                                    <span>Send Messege</span>
                                                </span>
                                                <i class="far fa-long-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact end -->

            
            
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


<!-- Mirrored from html.themexriver.com/radios/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:41 GMT -->
</html>
