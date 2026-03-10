<!doctype html>
<html lang="zxx">

<head>
    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Customer</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="images/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
    <link rel="stylesheet" href="{{ asset('assets/css/other.css') }}">


</head>

<body>
    <div class="body_wrap">

        @include('customer.header')

        <!-- breadcrumb start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="radios-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center">
                            <li class="radiosbcrumb-item radiosbcrumb-begin">
                                <a href="{{ route('customer.index') }}"><span>{{ __('message.home') }}</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>{{ __('message.wishlist') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

        <main>
            <div class="container my-5">
                <div class="row">
                    {!! toastMessage() !!}
                    @foreach ($wishlists as $wishlist)
                        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                            <div class="card h-100 text-center position-relative">
                                <form action="{{ route('customer.removeWishlist', $wishlist->id) }}" method="POST"
                                    style="position:absolute; top:10px; right:10px;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border:none; background:none;">
                                        <i class="fas fa-times" style="color: #FF8717; font-size:13px;"></i>
                                    </button>
                                </form>

                                <li class="product">
                                    <div class="product-holder">
                                        <a href="{{ route('shop.show', $wishlist->product->id) }}">
                                            <img src="{{ asset('storage/' . $wishlist->product->image) }}"
                                                style="width:80%; height:80%; object-fit:cover;">
                                        </a>
                                    </div>

                                    <div class="product-info">
                                        <h2 class="product__title">
                                            {{ $wishlist->product->name }}
                                        </h2>

                                        <h4 class="product__price">
                                            <span class="new" style="color:red;">
                                                ₹{{ $wishlist->product->price }}
                                            </span>
                                        </h4>

                                        <div class="mt-3 d-flex justify-content-center align-items-center gap-3">
                                            <button
                                                class="btn btn-sm custom-btn d-flex align-items-center gap-2 add-to-cart-btn"
                                                data-id="{{ $wishlist->product->id }}"
                                                style="background-color: #FF8717; color: white; box-shadow: none;">
                                                <i class="fas fa-shopping-cart"></i>
                                                <span style="color: white;">{{ __('message.add_to_cart') }}</span>
                                            </button>
                                        </div>
                                        <br>
                                    </div>
                                </li>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- <div class="row">

                    <!-- Product 1 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 text-center">
                            <img src="{{ asset('assets/img/product1.jpg') }}" class="card-img-top" alt="Product 1">
                            <div class="card-body">
                                <h5 class="card-title">Product 1</h5>
                                <p class="card-text">₹499</p>
                                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 text-center">
                            <img src="{{ asset('assets/img/product2.jpg') }}" class="card-img-top" alt="Product 2">
                            <div class="card-body">
                                <h5 class="card-title">Product 2</h5>
                                <p class="card-text">₹799</p>
                                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 text-center">
                            <img src="{{ asset('assets/img/product3.jpg') }}" class="card-img-top" alt="Product 3">
                            <div class="card-body">
                                <h5 class="card-title">Product 3</h5>
                                <p class="card-text">₹999</p>
                                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card h-100 text-center">
                            <img src="{{ asset('assets/img/product4.jpg') }}" class="card-img-top" alt="Product 4">
                            <div class="card-body">
                                <h5 class="card-title">Product 4</h5>
                                <p class="card-text">₹599</p>
                                <a href="#" class="btn btn-primary btn-sm">Add to Cart</a>
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>

        </main>

        @include('customer.footer')
    </div>

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

</html>