<!doctype html>
<html lang="zxx">

<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Customer</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                    {!! toastMessage() !!}
                    <div class="radios-breadcrumb breadcrumbs">
                        <ul class="list-unstyled d-flex align-items-center">
                            <li class="radiosbcrumb-item radiosbcrumb-begin">
                                <a href="{{ route('customer.index') }}"><span>{{ __('message.home') }}</span></a>
                            </li>
                            <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>{{ __('message.cart') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- start cart-section -->
            {{--<section class="cart-section woocommerce-cart pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col col-xs-12">
                            <div class="woocommerce">
                                <form action="https://html.themexriver.com/" method="post">
                                    <table class="shop_table shop_table_responsive cart">
                                        <thead>
                                            <tr>
                                                <th class="product-remove">&nbsp;</th>
                                                <th class="product-thumbnail">&nbsp;</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="cart_single">
                                                <td class="product-remove">
                                                    <a href="#!" class="remove" title="Remove this item"
                                                        data-product_id="8" data-product_sku="my name is">&times;</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="#!">
                                                        <img width="57" height="70"
                                                            src="{{ asset('assets/img/product/img_178.png') }}"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="#!" />
                                                    </a>
                                                </td>
                                                <td class="product-name" data-title="Product">
                                                    <a href="#!">Checked Hoodies Woo</a>
                                                </td>

                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <input type="number" step="1" min="0"
                                                            name="cart[c9f0f895fb98ab9159f51fd0297e236d][qty]" value="2"
                                                            title="Qty"
                                                            class="product-count input-text qty text product-count form-control" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>330.00</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_single">
                                                <td class="product-remove">
                                                    <a href="#!" class="remove" title="Remove this item"
                                                        data-product_id="21" data-product_sku="">&times;</a>
                                                </td>

                                                <td class="product-thumbnail">
                                                    <a href="#">
                                                        <img width="57" height="70"
                                                            src="{{ asset('assets/img/product/img_179.png') }}"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="#!" />
                                                    </a>
                                                </td>

                                                <td class="product-name" data-title="Product">
                                                    <a href="#!">product2</a>
                                                </td>

                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>100.00</span>
                                                </td>

                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <input type="number" step="1" min="0"
                                                            name="cart[1FjMjtzom8sQqT4RxQCTwt8xSZ8N4UKdE5][qty]"
                                                            value="1" title="Qty"
                                                            class="product-count input-text qty text" />
                                                    </div>
                                                </td>

                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>100.00</span>
                                                </td>
                                            </tr>
                                            <tr class="cart_single">
                                                <td class="product-remove">
                                                    <a href="#!" class="remove" title="Remove this item"
                                                        data-product_id="8" data-product_sku="my name is">&times;</a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <a href="#!">
                                                        <img width="57" height="70"
                                                            src="{{ asset('assets/img/product/img_180.png')}}"
                                                            class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image"
                                                            alt="#!" />
                                                    </a>
                                                </td>
                                                <td class="product-name" data-title="Product">
                                                    <a href="#!">Checked Hoodies Woo</a>
                                                </td>

                                                <td class="product-price" data-title="Price">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>165.00</span>
                                                </td>
                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <input type="number" step="1" min="0"
                                                            name="cart[c9f0f895fb98ab9159f51fd0297e236d][qty]" value="2"
                                                            title="Qty"
                                                            class="product-count input-text qty text product-count form-control" />
                                                    </div>
                                                </td>
                                                <td class="product-subtotal" data-title="Total">
                                                    <span class="woocommerce-Price-amount amount"><span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>330.00</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" class="actions">
                                                    <div class="coupon">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" name="coupon_code" class="input-text"
                                                            id="coupon_code" value="" placeholder="Coupon code" />
                                                        <button class="thm-btn thm-btn__2 br-0 no-icon" type="submit">
                                                            <span class="btn-wrap">
                                                                <span>Apply Coupon</span>
                                                                <span>Apply Coupon</span>
                                                            </span>
                                                        </button>
                                                    </div>

                                                    <button class="thm-btn thm-btn__2 br-0 no-icon" type="submit">
                                                        <span class="btn-wrap">
                                                            <span>Update Cart</span>
                                                            <span>Update Cart</span>
                                                        </span>
                                                    </button>

                                                    <input type="hidden" id="_wpnonce" name="_wpnonce"
                                                        value="918724a9c2" />
                                                    <input type="hidden" name="_wp_http_referer"
                                                        value="/wp/?page_id=5" />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>

                                <div class="cart-collaterals">
                                    <div class="cart_totals calculated_shipping">
                                        <h2>Cart Totals</h2>
                                        <table class="shop_table shop_table_responsive">
                                            <tr class="cart-subtotal">
                                                <th>Subtotal</th>
                                                <td data-title="Subtotal"><span class="woocommerce-Price-amount amount">
                                                        <span
                                                            class="woocommerce-Price-currencySymbol">&pound;</span>430.00</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Total</th>
                                                <td data-title="Total"><strong><span
                                                            class="woocommerce-Price-amount amount"><span
                                                                class="woocommerce-Price-currencySymbol">&pound;</span>430.00</span></strong>
                                                </td>
                                            </tr>
                                        </table>

                                        <div class="wc-proceed-to-checkout">
                                            <a href="#!"
                                                class="checkout-button thm-btn thm-btn__2 no-icon br-0 alt wc-forward">
                                                <span class="btn-wrap">
                                                    <span>Proceed to Checkout</span>
                                                    <span>Proceed to Checkout</span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>--}}
            <!-- end cart-section -->

            <!-- start cart-section -->
            <!-- start cart-section -->
            <section class="cart-section pb-80">
                <div class="container-fluid">
                    <div class="row">

                        <!-- LEFT SIDE : CART TABLE -->
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('message.cart_items') }}</h4>
                                </div>

                                <div class="table-responsive">
                                    <table class="table align-middle mb-0 table-hover">
                                        <thead>
                                            <tr>
                                                <th>{{ __('message.action') }}</th>
                                                <th>{{ __('message.product_image') }}</th>
                                                <th>{{ __('message.product_name') }}</th>
                                                <th>{{ __('message.product_price') }}</th>
                                                <th>{{ __('message.qty') }}</th>
                                                <th>{{ __('message.total') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($carts->count() > 0)

                                                @foreach($carts as $cart)
                                                    <tr>
                                                        <td>
                                                            <form action="{{ route('customer.removeCart', $cart->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    style="background-color:#ffffff; border:none;">
                                                                    <i class="fa-solid fa-trash fs-6"></i>
                                                                </button>
                                                            </form>
                                                        </td>

                                                        <td>
                                                            <img src="{{ asset('storage/' . $cart->product->image) }}"
                                                                style="width:75px;height:70px;">
                                                        </td>

                                                        <td>{{ $cart->product->name }}</td>
                                                        <td>
                                                            @if($cart->product->discount && $cart->product->discount->status == 'active')
                                                                <!-- Old Price -->
                                                                <span style="text-decoration: line-through; color: #888; font-size: 0.9em; display: block;">
                                                                    ₹{{ number_format($cart->product->price, 2) }}
                                                                </span>
                                                                <!-- Discounted Price -->
                                                                <span style="color: red; font-weight: bold;">
                                                                    ₹{{ number_format($cart->product->final_price, 2) }}
                                                                </span>
                                                                <!-- Discount Percentage -->
                                                                <span style="color: green; font-weight: 600; font-size: 0.85em;">
                                                                    ({{ $cart->product->discount->discount_value }}% OFF)
                                                                </span>
                                                            @else
                                                                <span style="color: #777474; font-weight: bold;">
                                                                    ₹{{ number_format($cart->product->price, 2) }}
                                                                </span>
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <input type="number" class="form-control quantity-input"
                                                                data-id="{{ $cart->id }}" value="{{ $cart->quantity }}" min="1"
                                                                style="width:80px;">
                                                        </td>

                                                        <td class="item-total-{{ $cart->id }}">
                                                            ₹{{ $cart->quantity * $cart->product->final_price }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @else

                                                <tr>
                                                    <td colspan="6" class="text-center py-5">
                                                        <h5 class="text-muted"><i class="fa-solid fa-cart-shopping"></i>
                                                            {{ __('message.your_cart_is_empty') }}</h5>
                                                        <a href="{{ route('customer.index') }}"
                                                            class="btn btn-primary mt-3">
                                                            {{ __('message.continue_shopping') }}
                                                        </a>
                                                    </td>
                                                </tr>

                                            @endif
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{ __('message.cart_summary') }}</h4>
                                </div>

                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>{{ __('message.sub_total') }}</span>
                                        <strong id="subtotal">₹{{ $subtotal }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>{{ __('message.gst (18%)') }}</span>
                                        <strong id="gst">₹{{ $gst }}</strong>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3">
                                        <span>{{ __('message.delivery_charge') }}</span>
                                        <strong id="deliveryCharge">₹{{ $deliveryCharge }}</strong>
                                    </div>
                                    
                                    <hr>

                                    <div class="d-flex justify-content-between mb-4">
                                        <span>{{ __('message.total') }}</span>
                                        <strong class="text-success fs-5" id="grandtotal">
                                            ₹{{ $total }}
                                        </strong>
                                    </div>

                                    <div class="d-grid">
                                        <a href="{{ route('customer.checkout') }}" class="btn btn-primary btn-lg">
                                            {{ __('message.proceed_to_checkout') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end cart-section -->

            <!-- end cart-section -->


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
        $(document).ready(function () {

            $('.quantity-input').on('change', function () {

                let cartId = $(this).data('id');
                let quantity = $(this).val();

                $.ajax({
                    url: "{{ route('customer.updateQuantity') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        cart_id: cartId,
                        quantity: quantity
                    },
                    success: function (response) {
                        $('.item-total-' + cartId).html('₹' + response.itemTotal);
                        $('#subtotal').html('₹' + response.subtotal);
                        $('#gst').html('₹' + response.gst);
                        $('#deliveryCharge').html('₹' + response.deliveryCharge);
                        $('#grandtotal').html('₹' + response.total);
                    }
                });
            });
        });
    </script>
</body>


<!-- Mirrored from html.themexriver.com/radios/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:17:13 GMT -->

</html>