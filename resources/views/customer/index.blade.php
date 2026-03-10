<!doctype html>
<html lang="{{ app()->getLocale() }}">


<!-- Mirrored from html.themexriver.com/radios/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:16:14 GMT -->

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>Customer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .hero {
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
</head>

<body>

    <div class="body_wrap">

        {!! toastMessage() !!}

        <!-- header start -->
        <header class="header header__style-one">
            <div class="header__top-info-wrap d-none d-lg-block">
                <div class="container">
                    <div class="header__top-info ul_li_between mt-none-10">
                        <ul class="ul_li mt-10">
                            @if (Auth::check())
                                <li><i class="fas fa-user"></i>{{ __('message.welcome') }}, {{ Auth::user()->name }}</li>
                            @endif
                        </ul>
                        <div class="header__top-right ul_li mt-10">
                            <div class="date">
                                <i class="fal fa-calendar-alt"></i>
                                {{ now()->locale(app()->getLocale())->translatedFormat('l, d F Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="header__middle ul_li_between justify-content-xs-center">
                    <div class="header__logo">
                        <a href="{{ route('customer.index') }}">
                            <img src="{{ asset('assets/img/logo/logo.svg') }}" alt="">
                        </a>
                    </div>
                    <form class="header__search-box" action="{{ route('customer.searchCategory') }}" method="GET">
                        <input type="text" name="search" id="search"
                            placeholder="{{ __('message.search_placeholder') }}" required />
                        <button type="submit">
                            <i class="far fa-search"></i>
                        </button>
                    </form>
                    @php
                        $currentLang = app()->getLocale();
                    @endphp
                    
                    <div class="header__lang ul_li">
                        <div class="header__language">
                            <ul>
                                <li>
                                    <a href="#" class="lang-btn d-flex align-items-center gap-2">

                                        @if($currentLang == 'en')
                                            <img src="{{ asset('assets/img/icon/usd_flag.png') }}" alt="USA Flag"
                                                style="height:18px; width:24px; object-fit:cover;">
                                            <span>English</span>
                                        @else
                                            <img src="{{ asset('assets/img/icon/india.png') }}" alt="India Flag"
                                                style="height:18px; width:24px; object-fit:cover;">
                                            <span>हिंदी</span>
                                        @endif

                                        <i class="far fa-chevron-down ms-1"></i>
                                    </a>

                                    <ul class="lang_sub_list">
                                        <li>
                                            <a href="{{ route('language.switch', 'en') }}"
                                                class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/img/icon/usd_flag.png') }}" alt="USA Flag"
                                                    style="height:16px; width:22px;">
                                                <span>English</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="{{ route('language.switch', 'hi') }}"
                                                class="d-flex align-items-center gap-2">
                                                <img src="{{ asset('assets/img/icon/india.png') }}" alt="India Flag"
                                                    style="height:16px; width:22px;">
                                                <span>हिंदी</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="header__icons ul_li">
                        <div class="icon">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#profileModal">
                                <div class="profile-circle">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                            </a>
                        </div>

                        <div class="icon wishlist-icon">
                            <a href="{{ route('customer.showWishlist') }}">
                                <img src="{{ asset('assets/img/icon/heart.svg') }}" alt="">
                                <span class="count">{{ $wishlists }}</span>
                            </a>
                        </div>

                        <div class="cart_btn icon">
                            <img src="{{ asset('assets/img/icon/shopping_bag.svg') }}" alt="">
                            <span class="count">{{ $cart_count }}</span>
                        </div>

                        <div class="icon">
                            <button type="button" class="dropdown-item text-danger d-flex align-items-center"
                                data-bs-toggle="modal" data-bs-target="#logoutModal"
                                style="border: none; background: none; width: 100%;">
                                <i class="bx bx-log-out bx-sm me-2"></i>
                                <span>{{__('message.logout')}}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__cat-wrap" data-uk-sticky="top: 250; animation: uk-animation-slide-top;">
                <div class="container">
                    <div class="header__wrap ul_li_between">
                        <div class="header__cat ul_li">
                            <div class="hamburger_menu">
                                <a href="javascript:void(0);" class="active">
                                    <div class="icon bar">
                                        <span><i class="fa-solid fa-bars"></i></span>
                                    </div>
                                </a>
                            </div>
                            <ul class="category ul_li">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('customer.category', $category->id) }}" class="category-link">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header end -->

        <!-- slide-bar start -->
        <aside class="slide-bar">
            <div class="close-mobile-menu">
                <a href="javascript:void(0);"><i class="fal fa-times"></i></a>
            </div>

            <!-- sidebar-info start -->
            <div class="cart_sidebar">
                <button type="button" class="cart_close_btn"><i class="fal fa-times"></i></button>
                <h2 class="heading_title text-uppercase">{{ __('message.cart_items') }} - <span>{{ $cart_count }}</span>
                </h2>
                <div class="cart_items_list">
                    @foreach ($carts as $cart)
                        <div class="cart_item">
                            <div class="item_image">
                                <img src="{{ asset('storage/' . $cart->product->image) }}">
                            </div>
                            <div class="item_content">
                                <h4 class="item_title">
                                    {{ $cart->product->name }}
                                </h4>
                                <span class="item_price">₹{{ $cart->total_price }}</span>
                                <form action="{{ route('customer.removeCart', $cart->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="remove_btn"><i class="fal fa-times"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="total_price text-uppercase">
                    <span>{{ __('message.subtotal') }}:</span>
                    <span>₹{{ $subtotal }}</span>
                </div>
                <ul class="btns_group ul_li">
                    <li><a href="{{ route('customer.showCart') }}" class="thm-btn">
                            <span class="btn-wrap">
                                <span>{{ __('message.view_cart') }}</span>
                                <span>{{ __('message.view_cart') }}</span>
                            </span>
                        </a></li>
                    <li><a href="{{ route('customer.index') }}" class="thm-btn thm-btn__black">
                            <span class="btn-wrap">
                                <span>{{ __('message.cancel') }}</span>
                                <span>{{ __('message.cancel') }}</span>
                            </span>
                        </a></li>
                </ul>
            </div>
            <!-- sidebar-info end -->

            <!-- side-mobile-menu start -->
            <nav class="side-mobile-menu">
                <ul id="mobile-menu-active">
                    <li><a href="{{ route('customer.index') }}">{{ __('message.home') }}</a></li>
                    <li><a href="{{ route('customer.showCart') }}">{{ __('message.cart_items') }}</a></li>
                    <li><a href="{{ route('customer.showWishlist') }}">{{ __('message.favorites') }}</a></li>
                    <li><a href="{{ route('customer.myorder')}}">{{ __('message.my_order') }}</a></li>
                    <li>
                        <a href="{{ route('customer.aboutus') }}">{{ __('message.about_us') }}</a>
                    </li>

                    <li><a href="{{ route('customer.contact') }}">{{ __('message.contact') }}</a></li>

                </ul>
            </nav>
            <!-- side-mobile-menu end -->
        </aside>
        <div class="body-overlay"></div>
        <!-- slide-bar end -->

        <main>
            <!-- hero start -->
            <div class="hero" style="margin:0; padding:0;">
                <div class="container-fluid p-0">
                    <div class="row g-0">
                        <div class="col-12 p-0">
                            <img src="{{ asset('assets/img/latest_electronics_banner.png') }}" alt="Latest Electronics"
                                style="width:100%; height:650px;display:block;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- hero end -->

            <!-- tab product start -->
            <style>
                .tab-product__item::before {
                    display: none !important;
                }
            </style>
            <div class="tab-product pt-40 pb-40">
                <div class="container">
                    <h5>{{ __('message.shop_by_category') }}</h5>
                    <div class="vd-products">
                        <div class="tab-content tab_has_slider" id="vd-myTabContent">
                            <div class="tab-product__slide tx-arrow">
                                @foreach ($categories as $category)
                                    <div class="tab-product__item tx-product text-center">
                                        <div class="thumb">
                                            <a href="{{ route('customer.category', $category->id) }}"><img
                                                    src="{{ asset('storage/' . $category->image) }}" alt=""></a>
                                        </div>
                                        <div class="content">
                                            <h3 class="title"><a style="font-weight:bold">{{ $category->name }}</a></h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tab product end -->

            <!-- rd slide product start -->
            <div class="rd-slide-product">
                <div class="container">
                    <div class="row mt-none-30">
                        <div class="col-lg-12 mt-30">
                            <div class="rd-slide-products">
                                <h2 class="section-heading mb-25"><span>{{ __('message.trending_product') }}</span></h2>
                                <div class="rd-product__slide tx-arrow">
                                    @foreach ($products as $product)
                                        <div class="rd-product__slide-item">
                                            <div class="product__item">
                                                <div class="product__img text-center pos-rel">
                                                    <a>
                                                        @if ($product->image)
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                alt="{{ $product->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/img/product/img_07.png') }}"
                                                                alt="{{ $product->name }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <br>
                                                    </div>
                                                    <h2 class="product__title"><a href="">{{ $product->name }}</a></h2>
                                                    <h4 class="product__price">

                                                        @if($product->discount && $product->discount->status == 'active')

                                                            <!-- Old Price -->
                                                            <span style="text-decoration: line-through; color: #888;">
                                                                ₹{{ number_format($product->price, 2) }}
                                                            </span>

                                                            <!-- Discounted Price -->
                                                            <span style="color: red; font-weight: bold;">
                                                                ₹{{ number_format($product->final_price, 2) }}
                                                            </span>

                                                            <!-- Discount Percentage -->
                                                            <span style="color: green; font-weight: bold;">
                                                                ({{ $product->discount->discount_value }}% off)
                                                            </span>
                                                        @else
                                                            <span>
                                                                ₹{{ number_format($product->price, 2) }}
                                                            </span>
                                                        @endif

                                                    </h4>
                                                </div>
                                                <ul class="product__action">
                                                    <li><a href="{{ route('shop.show', $product->id) }}"><i
                                                                class="far fa-compress-alt"></i></a></li>

                                                    @php
                                                        $iscarted = \App\Models\Cart::where('customer_id', auth()->id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                                                    @endphp
                                                    <li>
                                                        @if($iscarted)
                                                            <button type="submit" class="isadd-to-cart-btns" disabled>
                                                                <i class="far fa-shopping-basket"></i>
                                                            </button>
                                                        @else
                                                            <form action="{{ route('customer.cart', $product->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="add-to-cart-btns">
                                                                    <i class="far fa-shopping-basket"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </li>
                                                    @php
                                                        $isWishlisted = \App\Models\WishList::where('customer_id', auth()->id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                                                    @endphp

                                                    <li>
                                                        @if($isWishlisted)
                                                            <button type="submit" class="iswishlist-btn" disabled>
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        @else
                                                            <form action="{{ route('customer.wishlist', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="wishlist-btn">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </li>
                                                </ul>
                                                @if ($product->is_new)
                                                    <span class="badge-skew">New</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rd slide product end -->

            <br>

            <!-- rd slide product start -->
            <div class="rd-slide-product">
                <div class="container">
                    <div class="row mt-none-30">
                        <div class="col-lg-12 mt-30">
                            <div class="rd-slide-products">
                                <h2 class="section-heading mb-25"><span>{{ __('message.mobile_phones') }}</span></h2>
                                <div class="rd-product__slide tx-arrow">
                                    @foreach ($mobileProducts as $product)
                                        <div class="rd-product__slide-item">
                                            <div class="product__item">
                                                <div class="product__img text-center pos-rel">
                                                    <a>
                                                        @if ($product->image)
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                alt="{{ $product->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/img/product/img_07.png') }}"
                                                                alt="{{ $product->name }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <br>
                                                    </div>
                                                    <h2 class="product__title"><a href="">{{ $product->name }}</a></h2>
                                                    <h4 class="product__price">

                                                        @if($product->discount && $product->discount->status == 'active')

                                                            <!-- Old Price -->
                                                            <span style="text-decoration: line-through; color: #888;">
                                                                ₹{{ number_format($product->price, 2) }}
                                                            </span>

                                                            <!-- Discounted Price -->
                                                            <span style="color: red; font-weight: bold;">
                                                                ₹{{ number_format($product->final_price, 2) }}
                                                            </span>
                                                                
                                                            <!-- Discount Percentage -->
                                                            <span style="color: green; font-weight: bold;">
                                                                ({{ $product->discount->discount_value }}% off)
                                                            </span>
                                                        @else
                                                            <span>
                                                                ₹{{ number_format($product->price, 2) }}
                                                            </span>
                                                        @endif

                                                    </h4>
                                                </div>
                                                <ul class="product__action">
                                                    <li><a href="{{ route('shop.show', $product->id) }}"><i
                                                                class="far fa-compress-alt"></i></a></li>

                                                    @php
                                                        $iscarted = \App\Models\Cart::where('customer_id', auth()->id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                                                    @endphp
                                                    <li>
                                                        @if($iscarted)
                                                            <button type="submit" class="isadd-to-cart-btns" disabled>
                                                                <i class="far fa-shopping-basket"></i>
                                                            </button>
                                                        @else
                                                            <form action="{{ route('customer.cart', $product->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="add-to-cart-btns">
                                                                    <i class="far fa-shopping-basket"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </li>
                                                    @php
                                                        $isWishlisted = \App\Models\WishList::where('customer_id', auth()->id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                                                    @endphp

                                                    <li>
                                                        @if($isWishlisted)
                                                            <button type="submit" class="iswishlist-btn" disabled>
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        @else
                                                            <form action="{{ route('customer.wishlist', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="wishlist-btn">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </li>
                                                </ul>
                                                @if ($product->is_new)
                                                    <span class="badge-skew">New</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rd slide product end -->

            <br>

            <!-- rd slide product start -->
            <div class="rd-slide-product">
                <div class="container">
                    <div class="row mt-none-30">
                        <div class="col-lg-12 mt-30">
                            <div class="rd-slide-products">
                                <h2 class="section-heading mb-25"><span>{{ __('message.leptops') }}</span></h2>
                                <div class="rd-product__slide tx-arrow">
                                    @foreach ($leptopsProducts as $product)
                                        <div class="rd-product__slide-item">
                                            <div class="product__item">
                                                <div class="product__img text-center pos-rel">
                                                    <a>
                                                        @if ($product->image)
                                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                                alt="{{ $product->name }}">
                                                        @else
                                                            <img src="{{ asset('assets/img/product/img_07.png') }}"
                                                                alt="{{ $product->name }}">
                                                        @endif
                                                    </a>
                                                </div>
                                                <div class="product__content">
                                                    <div class="product__review ul_li_center">
                                                        <br>
                                                    </div>
                                                    <h2 class="product__title"><a href="">{{ $product->name }}</a></h2>
                                                    <h4 class="product__price">

                                                        @if($product->discount && $product->discount->status == 'active')

                                                            <!-- Old Price -->
                                                            <span style="text-decoration: line-through; color: #888;">
                                                                ₹{{ number_format($product->price, 2) }}
                                                            </span>

                                                            <!-- Discounted Price -->
                                                            <span style="color: red; font-weight: bold;">
                                                                ₹{{ number_format($product->final_price, 2) }}
                                                            </span>

                                                            <!-- Discount Percentage -->
                                                            <span style="color: green; font-weight: bold;">
                                                                ({{ $product->discount->discount_value }}% off)
                                                            </span>
                                                        @else
                                                            <span>
                                                                ₹{{ number_format($product->price, 2) }}
                                                            </span>
                                                        @endif

                                                    </h4>
                                                </div>
                                                <ul class="product__action">
                                                    <li><a href="{{ route('shop.show', $product->id) }}"><i
                                                                class="far fa-compress-alt"></i></a></li>

                                                    @php
                                                        $iscarted = \App\Models\Cart::where('customer_id', auth()->id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                                                    @endphp
                                                    <li>
                                                        @if($iscarted)
                                                            <button type="submit" class="isadd-to-cart-btns" disabled>
                                                                <i class="far fa-shopping-basket"></i>
                                                            </button>
                                                        @else
                                                            <form action="{{ route('customer.cart', $product->id) }}"
                                                                method="post">
                                                                @csrf
                                                                <button type="submit" class="add-to-cart-btns">
                                                                    <i class="far fa-shopping-basket"></i>
                                                                </button>
                                                            </form>
                                                        @endif

                                                    </li>
                                                    @php
                                                        $isWishlisted = \App\Models\WishList::where('customer_id', auth()->id())
                                                            ->where('product_id', $product->id)
                                                            ->exists();
                                                    @endphp

                                                    <li>
                                                        @if($isWishlisted)
                                                            <button type="submit" class="iswishlist-btn" disabled>
                                                                <i class="fas fa-heart"></i>
                                                            </button>
                                                        @else
                                                            <form action="{{ route('customer.wishlist', $product->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <button type="submit" class="wishlist-btn">
                                                                    <i class="far fa-heart"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    </li>
                                                </ul>
                                                @if ($product->is_new)
                                                    <span class="badge-skew">New</span>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rd slide product end -->

            <br>

        </main>

        @include('customer.footer')
    </div>

    <div class="modal fade" id="profileModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">{{ __('message.edit_profile') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="modal-body">

                        <div class="mb-3 text-center">
                            <div class="profile-circle mx-auto mb-2" style="width:60px;height:60px;font-size:24px;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                        </div>

                        <div class="mb-3">
                            <label>{{ __('message.full_name') }}</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label>{{ __('message.email') }}</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control"
                                required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit"
                            style="background-color: #FF8717; color: white; border-radius: 5px; font-weight: 100;">{{ __('message.edit_profile') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Confirm Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </div>
            </div>
        </div>
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
        // Handle logout modal confirmation
        document.addEventListener('DOMContentLoaded', function () {
            const logoutModal = document.getElementById('logoutModal');
            const logoutForm = document.getElementById('logoutForm');

            // Handle form submission inside modal
            logoutForm.addEventListener('submit', function (e) {
                // Close the modal before submitting
                const modal = bootstrap.Modal.getInstance(logoutModal);
                if (modal) {
                    modal.hide();
                }
            });
        });
    </script>
</body>

</html>