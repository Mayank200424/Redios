<!doctype html>
<html lang="zxx">


<!-- Mirrored from html.themexriver.com/radios/shop-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:27 GMT -->

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
            <section class="breadcrumb-area" style="border-radius: 15px; overflow: hidden;">
                <div class="container">
                    <div class="radios-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center">
                            <li class="radiosbcrumb-item radiosbcrumb-begin">
                                <a href="{{ route('customer.index') }}"><span>{{ __('message.home') }}</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>{{ __('message.shop') }}</span>
                            </li>
                        </ul>
                    </div>
                    <br>
                    <div class="subcategory-slider">
                        @foreach ($subcategories as $subcategory)
                            <div class="subcategory-item text-center">
                                <a href="javascript:void(0);" class="subcategory-link" data-id="{{ $subcategory->id }}">

                                    <div class="subcategory-image">
                                        <img src="{{ asset('storage/' . $subcategory->image) }}">
                                    </div>

                                    <p class="subcategory-name">
                                        {{ $subcategory->name }}
                                    </p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- start shop-section -->
            <section class="shop-section pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="shop-area shop-left-sidebar clearfix">
                                <div class="woocommerce-content-wrap">
                                    <div
                                        class="d-flex justify-content-between align-items-center flex-wrap mb-4 shop-top-bar">

                                        <form class="widget__search d-flex align-items-center" id="search-form"
                                            action="#">
                                            <input type="text" id="search-input" class="form-control search-input"
                                                name="search" placeholder="{{ __('message.search') }}...">
                                            <button type="submit" class="search-btn">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <br>
                                    <div class="woocommerce-content-inner">
                                        <ul class="products three-column clearfix" id="product-list">
                                            @if ($products && $products->count() > 0)
                                                @foreach ($products as $product)
                                                    <li class="product">
                                                        <div class="product-holder">
                                                            <a href="{{ route('shop.show', $product->id) }}">
                                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                                    style="width:90%; height:80%; ">
                                                            </a>
                                                        </div>
                                                        <div class="product-info">
                                                            <h2 class="product__title">{{ $product->name }}</h2>
                                                            <h4 class="product__price">

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

                                                            </h4>
                                                           
                                                            <div
                                                                class="mt-3 d-flex justify-content-center align-items-center gap-3">
                                                                @if($product->stock > 0)
                                                                    <form action="{{ route('customer.cart', $product->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button
                                                                            class="btn btn-sm custom-btn d-flex align-items-center gap-2 add-to-cart-btn">
                                                                            <i class="fas fa-shopping-cart"></i>
                                                                            <span style="color: white;">{{ __('message.add_to_cart') }}</span>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <button class="out-of-stock-btn" disabled>
                                                                        <i class="fas fa-times-circle me-1"></i>
                                                                        {{ __('message.out_of_stock') }}
                                                                    </button>
                                                                @endif
                                                                @php
                                                                    $isWishlisted = \App\Models\WishList::where('customer_id', auth()->id())
                                                                        ->where('product_id', $product->id)
                                                                        ->exists();
                                                                @endphp

                                                                <form action="{{ route('customer.wishlist', $product->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <button type="submit"
                                                                        class="btn btn-sm custom-btn d-flex align-items-center gap-2 wishlist-btns"
                                                                        data-id="{{ $product->id }}" @if($isWishlisted) disabled
                                                                        @endif
                                                                        style="{{ $isWishlisted ? 'background-color: #ccc; cursor: default;' : '' }}">
                                                                        <i class="{{ $isWishlisted ? 'fas' : 'far' }} fa-heart"
                                                                            style="{{ $isWishlisted ? 'color: #fff;' : '' }}"></i>
                                                                        <span style="color: white;">{{ __('message.wishlist') }}</span>
                                                                    </button>
                                                                </form>

                                                            </div>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li>
                                                    <h4>No Products Found</h4>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div>
                                        {{ $products->links() }}
                                    </div>
                                </div>
                                <div class="shop-sidebar">
                                    <br>
                                    {{-- <div class="widget">
                                        <h2 class="widget__title">
                                            <span>Filter by Name</span>
                                        </h2>

                                        <div class="form-group">
                                            <select class="form-control" id="nameFilter" name="sort">
                                                <option value="">All</option>
                                                <option value="asc">A - Z</option>
                                                <option value="desc">Z - A</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="widget">
                                        <h2 class="widget__title">
                                            <span>{{ __('message.filter_by_name') }}</span>
                                        </h2>

                                        <div class="form-group">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input nameFilterRadio" type="radio" name="sort"
                                                    value="" id="sortAll" checked>
                                                <label class="form-check-label" for="sortAll">All</label>
                                            </div>

                                            <div class="form-check mb-2">
                                                <input class="form-check-input nameFilterRadio" type="radio" name="sort"
                                                    value="asc" id="sortAsc">
                                                <label class="form-check-label" for="sortAsc">A - Z</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input nameFilterRadio" type="radio" name="sort"
                                                    value="desc" id="sortDesc">
                                                <label class="form-check-label" for="sortDesc">Z - A</label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="widget">
                                        <h2 class="widget__title">
                                            <span>{{ __('message.filter_by_price') }}</span>
                                        </h2>

                                        <div class="form-group">
                                            <div class="form-check mb-2">
                                                <input class="form-check-input priceFilterRadio" type="radio"
                                                    name="price" value="" id="priceAll" checked>
                                                <label class="form-check-label" for="sortAll">All</label>
                                            </div>

                                            <div class="form-check mb-2">
                                                <input class="form-check-input priceFilterRadio" type="radio"
                                                    name="price" value="asc" id="priceAsc">
                                                <label class="form-check-label" for="priceAsc">Low To High</label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input priceFilterRadio" type="radio"
                                                    name="price" value="desc" id="priceDesc">
                                                <label class="form-check-label" for="priceDesc">High To Low</label>
                                            </div>

                                        </div>
                                    </div>

                                    {{-- <div class="widget">
                                        <h2 class="widget__title">
                                            <span>Filter by Price</span>
                                        </h2>

                                        <div class="form-group">
                                            <select class="form-control" id="priceFilter" name="price">
                                                <option value="">All</option>
                                                <option value="asc">Low To High</option>
                                                <option value="desc">High To Low</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- end container -->
            </section>
            <!-- end shop-section -->

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
        var subCategoryIds = @json($subcategories->pluck('id'));

        $(document).ready(function () {

            var currentCategoryId = null;

            function loadProducts() {

                var sort = $('input[name="sort"]:checked').val();
                var price = $('input[name="price"]:checked').val();
                var search = $('#search-input').val();

                $.ajax({
                    url: "{{ route('customer.getProducts') }}",
                    type: 'GET',
                    data: {
                        category_id: currentCategoryId,
                        subCategoryIds: currentCategoryId ? null : subCategoryIds,
                        sort: sort,
                        price: price,
                        search: search
                    },
                    success: function (response) {

                        let html = '';

                        if (response.length > 0) {

                            response.forEach(function (product) {

                                let productUrl = "{{ route('shop.show', ':id') }}".replace(':id', product.id);
                                let cartUrl = "{{ route('customer.cart', ':id') }}".replace(':id', product.id);
                                let wishlistUrl = "{{ route('customer.wishlist', ':id') }}".replace(':id', product.id);
                                let csrfToken = '{{ csrf_token() }}';

                                let stockButton = '';

                                if (product.stock > 0) {
                                    stockButton = `
                                <form action="${cartUrl}" method="post">
                                    <input type="hidden" name="_token" value="${csrfToken}">
                                    <button class="btn btn-sm custom-btn d-flex align-items-center gap-2">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span style="color: white;">{{ __('message.add_to_cart') }}</span>
                                    </button>
                                </form>
                            `;
                                } else {
                                    stockButton = `
                                <button class="out-of-stock-btn" disabled>
                                    <i class="fas fa-times-circle me-1"></i>
                                    {{ __('message.out_of_stock') }}
                                </button>
                            `;
                                }

                                let wishlistDisabled = product.isWishlisted ? 'disabled' : '';
                                let wishlistStyle = product.isWishlisted ? 'background-color:#ccc;cursor:default;' : '';
                                let heartClass = product.isWishlisted ? 'fas' : 'far';

                                html += `
                            <li class="product">
                                <div class="product-holder">
                                    <a href="${productUrl}">
                                        <img src="/storage/${product.image}" style="width:90%; height:80%;">
                                    </a>
                                </div>

                                <div class="product-info">
                                    <h2 class="product__title">${product.name}</h2>
                                    <h4 class="product__price">
                                        ${product.discount && product.discount.status === 'active' ? 
                                            `<span style="text-decoration: line-through; color: #888; margin-right:6px;">₹${parseFloat(product.price).toFixed(2)}</span>
                                             <span style="color: red; font-weight: bold; margin-right:6px;">₹${parseFloat(product.final_price).toFixed(2)}</span>
                                             <span style="color: green; font-weight: 600;">(${product.discount.discount_value}% OFF)</span>` : 
                                            `<span style="color: red; font-weight: 600;">₹${parseFloat(product.price).toFixed(2)}</span>`
                                        }
                                    </h4>

                                    <div class="mt-3 d-flex justify-content-center align-items-center gap-3">
                                        ${stockButton}

                                        <form action="${wishlistUrl}" method="POST">
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            <button type="submit"
                                                class="btn btn-sm custom-btn d-flex align-items-center gap-2 wishlist-btns"
                                                data-id="${product.id}"
                                                ${wishlistDisabled}
                                                style="${wishlistStyle}">
                                                <i class="${heartClass} fa-heart"></i>
                                                <span style="color: white;">{{ __('message.wishlist') }}</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        `;
                            });

                        } else {
                            html = '<li><h4>No Products Found</h4></li>';
                        }

                        $('#product-list').html(html);
                    }
                });
            }
            $('.subcategory-link').click(function () {
                currentCategoryId = $(this).data('id');
                loadProducts();
            });

            $('.nameFilterRadio').change(loadProducts);
            $('.priceFilterRadio').change(loadProducts);

            $('#search-form').submit(function (e) {
                e.preventDefault();
                loadProducts();
            });

            $('#search-input').keyup(loadProducts);

        });
    </script>
</body>


<!-- Mirrored from html.themexriver.com/radios/shop-left-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:18:28 GMT -->

</html>