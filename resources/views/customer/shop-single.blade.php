<!doctype html>
<html lang="zxx">


<!-- Mirrored from html.themexriver.com/radios/shop-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:28 GMT -->

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Customer</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="images/x-icon" />

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
                                <span>{{ __('message.shop_single') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- start shop-single-section -->
            <section class="shop-single-section pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="product-single-wrap mb-30">
                                <div class="product_details_img ">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="pl_thumb">
                                                <img src="{{ asset('storage/' . $product->image) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 product-details-col">
                            <div class="product-details">
                                <h2>{{ $product->name }}</h2>
                                <div class="price">
                                    @if($product->discount && $product->discount->status == 'active')

                                        <!-- Old Price -->
                                        <span style="text-decoration: line-through; color: #888; margin-right:6px;">
                                            ₹{{ number_format($product->price, 2) }}
                                        </span>

                                        <!-- Discounted Price -->
                                        <span style="color: red; font-weight: bold; margin-right:6px;">
                                            ₹{{ number_format($product->final_price, 2) }}
                                        </span>

                                        <!-- Discount Percentage -->
                                        <span style="color: green; font-weight: 600;">
                                            ({{ $product->discount->discount_value }}% OFF)
                                        </span>

                                    @else

                                        <span style="color: red; font-weight: 600;">
                                            ₹{{ number_format($product->price, 2) }}
                                        </span>

                                    @endif
                                </div>

                                <div class="thb-product-meta-before mt-20">
                                    <div class="product_meta">
                                        <span class="posted_in">Categories: <a>{{ $product->category->name }}</a></span>
                                    </div>
                                </div>

                                <div class="thb-product-meta-before mt-20">
                                    <div class="product_meta">
                                        @if($product->stock > 0)
                                            <span class="posted_in">Stock: <a
                                                    style="color:green">{{ $product->stock }}</a></span>
                                        @else
                                            <span class="posted_in"><a style="color:red">Out Of Stock</a></span>
                                        @endif
                                    </div>
                                </div>

                                <p>{{ $product->description }}</p>

                                <div class="product-option">
                                    <div class="product-row">
                                        <div class="mt-4 product-button-row">
                                            @if($product->stock > 0)
                                                <button type="submit" class="btn px-4 py-2 add-to-cart-btn-shop"
                                                    data-id="{{ $product->id }}">
                                                    <i class="fas fa-shopping-cart me-2"></i>
                                                    {{ __('message.add_to_cart') }}
                                                </button>
                                            @else
                                                <button class="btn btn-sm out-of-stock-btn" disabled>
                                                    <i class="fas fa-times-circle me-1"></i>
                                                    {{ __('message.out_of_stock') }}
                                                </button>
                                            @endif
                                            @php
                                                $isWishlisted = \App\Models\WishList::where('customer_id', auth()->id())
                                                    ->where('product_id', $product->id)
                                                    ->exists();
                                            @endphp
                                            <form action="{{ route('customer.wishlist', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn px-4 py-2 wishlist-btn-shop"
                                                    @if($isWishlisted) disabled
                                                    style="background-color: #ccc; cursor: default;" @endif>
                                                    <i class="{{ $isWishlisted ? 'fas' : 'far' }} fa-heart me-2"
                                                        style="{{ $isWishlisted ? 'color: #fff;' : '' }}"></i>
                                                    {{ __('message.wishlist') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="realted-porduct">
                                <h3>{{ __('message.related_product') }}</h3>
                                <div class="shop-area">
                                    @if($relatedProducts->count() > 0)
                                        <ul class="products clearfix">
                                            @foreach ($relatedProducts as $relatedProduct)
                                                <li class="product">
                                                    <div class="product-holder">
                                                        <a href="{{ route('shop.show', $relatedProduct->id) }}">
                                                            <img src="{{ asset('storage/' . $relatedProduct->image) }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-info">
                                                        <h2 class="product__title">
                                                            <a>
                                                                {{ $relatedProduct->name }}
                                                            </a>
                                                        </h2>
                                                        <h4 class="product__price">

                                                            @if($relatedProduct->discount && $relatedProduct->discount->status == 'active')

                                                                <span
                                                                    style="text-decoration: line-through; color: #888; margin-right:6px;">
                                                                    ₹{{ number_format($relatedProduct->price, 2) }}
                                                                </span>

                                                                <span style="color:red; font-weight:bold; margin-right:6px;">
                                                                    ₹{{ number_format($relatedProduct->final_price, 2) }}
                                                                </span>

                                                                <span style="color:green; font-weight:600;">
                                                                    ({{ $relatedProduct->discount->discount_value }}% OFF)
                                                                </span>

                                                            @else

                                                                <span style="color:red; font-weight:600;">
                                                                    ₹{{ number_format($relatedProduct->price, 2) }}
                                                                </span>

                                                            @endif

                                                        </h4>
                                                    </div>
                                                    <div class="mt-4 product-button-row">

                                                        @if($relatedProduct->stock > 0)
                                                            <button type="submit" class="add-to-cart-r"
                                                                data-id="{{ $relatedProduct->id }}">
                                                                <i class="fas fa-shopping-cart me-2"></i>
                                                                {{ __('message.add_to_cart') }}
                                                            </button>
                                                        @else
                                                            <button class="out-of-stock-btn-r" disabled>
                                                                <i class="fas fa-times-circle me-2"></i>
                                                                {{ __('message.out_of_stock') }}
                                                            </button>
                                                        @endif

                                                        <form action="{{ route('customer.wishlist', $relatedProduct->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit" class="add-to-cart-r">
                                                                <i class="far fa-heart me-2"></i>
                                                                {{ __('message.wishlist') }}
                                                            </button>
                                                        </form>

                                                    </div>

                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No related products found.</p>
                                    @endif


                                    {{--<li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('assets/img/product/img_166.html')}}"></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Tab M10 Plus, FHD
                                                    Android Tablet, Processor</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                        <span class="product__badge color-2"><span>New</span></span>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('assets/img/product/img_167.html')}}" alt></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Portable 2TB External
                                                    Hard Drive Portable HDD USB</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </li>
                                    <li class="product">
                                        <div class="product-holder">
                                            <a href="shop-single.html"><img
                                                    src="{{ asset('assets/img/product/img_168.html')}}"></a>
                                            <ul class="product__action">
                                                <li><a href="#!"><i class="far fa-compress-alt"></i></a></li>
                                                <li><a href="#!"><i class="far fa-shopping-basket"></i></a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product-info">
                                            <div class="product__review ul_li">
                                                <ul class="rating-star ul_li mr-10">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                    <li><i class="far fa-star"></i></li>
                                                </ul>
                                                <span>(126) Review</span>
                                            </div>
                                            <h2 class="product__title"><a href="shop-single.html">Skullcandy Dime True
                                                    In-Ear Earbuds – Golden</a></h2>
                                            <span class="product__available">Available: <span>334</span></span>
                                            <div class="product__progress progress color-primary">
                                                <div class="progress-bar" role="progressbar" style="width: 50%"
                                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h4 class="product__price"><span class="new">$30.52</span><span
                                                    class="old">$28.52</span></h4>
                                        </div>
                                    </li>--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end of container -->
            </section>
            <!-- end of shop-single-section -->


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

    <script>
        $(document).ready(function() {
            // Add to cart for main product
            $('.add-to-cart-btn-shop').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var btn = $(this);
                
                $.ajax({
                    url: "{{ route('customer.cart', ':id') }}".replace(':id', productId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Show success message
                        alert('Product added to cart successfully!');
                        
                        // Optional: Update cart count in header if you have that element
                        // $('.cart-count').text(response.cart_count || '1');
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON?.message || 'Error adding product to cart';
                        alert(errorMessage);
                    }
                });
            });

            // Add to cart for related products
            $('.add-to-cart-r').click(function(e) {
                e.preventDefault();
                var productId = $(this).data('id');
                var btn = $(this);
                
                $.ajax({
                    url: "{{ route('customer.cart', ':id') }}".replace(':id', productId),
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        alert('Product added to cart successfully!');
                        
                        // Optional: Update cart count in header if you have that element
                        // $('.cart-count').text(response.cart_count || '1');
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON?.message || 'Error adding product to cart';
                        alert(errorMessage);
                    }
                });
            });
        });
    </script>
</body>


<!-- Mirrored from html.themexriver.com/radios/shop-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:29 GMT -->

</html>