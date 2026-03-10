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
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
                                <span>{{ __('message.my_order') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <!-- start myorder-section -->
            <section class="cart-section pb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                        {!! toastMessage() !!}
                            <div class="card">
                                <div class="d-flex card-header justify-content-between align-items-center">
                                    <div>
                                        <h4 class="card-title">{{ __('message.all_order_list') }}</h4>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table align-middle mb-0 table-hover table-centered">
                                            <thead class="bg-light-subtle">
                                                <tr>
                                                    <th>{{ __('message.order_id') }}</th>
                                                    <th>{{ __('message.created_at') }}</th>
                                                    <th>{{ __('message.customer') }}</th>
                                                    <th>{{ __('message.total_amount') }}</th>
                                                    <th>{{ __('message.payment_mode') }}</th>
                                                    <th>{{ __('message.payment_status') }}</th>
                                                    <th>{{ __('message.order_status') }}</th>
                                                    <th>{{ __('message.view') }}</th>
                                                    <th>{{ __('message.invoice') }}</th>
                                                    <th>{{ __('message.cancel_order') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($myorder as $order)
                                                    <tr>
                                                        <td>
                                                            {{ $order->order->order_number }}
                                                        </td>
                                                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                                                        <td>
                                                            {{ $order->users->name }}
                                                        </td>
                                                        <td> ₹{{ $order->total_amount }}</td>
                                                        <td>{{ ucfirst($order->payment_mode) }}</td>
                                                        <td>
                                                            @switch($order->payment_status)

                                                                @case('paid')
                                                                    <span style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->payment_status)  }}
                                                                    </span>
                                                                @break

                                                                @case('pending')
                                                                    <span style="background: orange; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->payment_status) }}
                                                                    </span>
                                                                @break

                                                                @case('failed')
                                                                    <span style="background: black; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->payment_status) }}
                                                                    </span>
                                                                @break

                                                                @default
                                                                    <span style="background: blue; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->payment_status) }}
                                                                    </span>

                                                            @endswitch
                                                        </td>            
                                                        <td>
                                                            @switch($order->order_status)

                                                                @case('pending')
                                                                    <span style="background: orange; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->order_status)  }}
                                                                    </span>
                                                                @break

                                                                @case('processing')
                                                                    <span style="background: #2196f3; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->order_status)  }}
                                                                    </span>
                                                                @break

                                                                @case('out_of_delivery')
                                                                    <span style="background: #9c27b0; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->order_status)  }}
                                                                    </span>
                                                                @break

                                                                @case('shipped')
                                                                    <span style="background: #3f51b5; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->order_status)  }}
                                                                    </span>
                                                                @break

                                                                @case('delivered')
                                                                    <span style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->order_status)  }}
                                                                    </span>
                                                                @break

                                                                @case('cancelled')
                                                                    <span style="background: red; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->order_status)  }}
                                                                    </span>
                                                                @break

                                                                @default
                                                                    <span style="background: blue; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                        {{ ucfirst($order->payment_status) }}
                                                                    </span>
                                                            @endswitch
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <a href="{{ route('customer.order-details',$order->id) }}"
                                                                    style="background-color:#ffffff; border:none;">
                                                                    <i class="fa-solid fa-eye fs-6"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                @if($order->payment_status == 'paid' && $order->order_status == 'delivered')
                                                                 <a href="{{ route('invoice.download',$order->id) }}"
                                                                    style="background-color:#ffffff; border:none;">
                                                                    <i class="fa-solid fa-download"></i>
                                                                </a> 
                                                                @else
                                                                    -
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                @if($order->order_status == 'pending' || $order->order_status == 'processing')
                                                                <form action="{{ route('customer.order-cancel',$order->id) }}" method="post"
                                                                    onsubmit="return confirm('Are you sure you want to cancel this order?')">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button type="submit" style="background-color:red; color: white; border-radius: 20px;">
                                                                        Cancel Order
                                                                    </button>
                                                                </form>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <td>No Order Found</td>
                                                @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end table-responsive -->
                                </div>
                                <div class="card-footer border-top">
                                    {{ $myorder->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end myorder-section -->
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


<!-- Mirrored from html.themexriver.com/radios/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:17:13 GMT -->

</html>