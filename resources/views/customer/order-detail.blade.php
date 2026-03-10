<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <title>Customer</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- App favicon -->
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
                                <a href="{{ route('customer.index') }}"><span>Home</span></a>
                            </li>
                             <li class="radiosbcrumb-item radiosbcrumb-end">
                                <span>Order Information</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
            <!-- breadcrumb end -->

            <div class="page-content">
               <div class="container-xxl">

                    <div class="row">

                         <!-- ================= LEFT SIDE ================= -->
                         <div class="col-lg-8">

                              <!-- Order Header -->
                              <div class="card mb-3">
                                   <div class="card-body d-flex justify-content-between align-items-center">
                                        <div>
                                             <h4 class="fw-bold mb-1">
                                                  Order Number : {{ $order->order->order_number }}
                                             </h4>
                                             <p class="text-muted mb-0">
                                                  Order Date : {{ $order->created_at->format('d-m-Y') }}
                                             </p>
                                        </div>


                                   </div>
                              </div>
                              <div class="card mb-3">
                                   <div class="card-header bg-light">
                                        <h5 class="mb-0">Order Status Information</h5>
                                   </div>

                                   <div class="card-body">
                                        <div class="text-left">

                                             <strong>Payment Status :</strong>

                                             @switch($order->payment_status)

                                                  @case('paid')
                                                       <span style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->payment_status) }}
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

                                             <span class="mx-3"> | </span>

                                             <strong>Order Status :</strong>

                                             @switch($order->order_status)

                                                  @case('pending')
                                                       <span style="background: orange; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->order_status) }}
                                                       </span>
                                                  @break

                                                  @case('processing')
                                                       <span style="background: #2196f3; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->order_status) }}
                                                       </span>
                                                  @break

                                                  @case('out_of_delivery')
                                                       <span style="background: #9c27b0; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst(str_replace('_',' ', $order->order_status)) }}
                                                       </span>
                                                  @break

                                                  @case('shipped')
                                                       <span style="background: #3f51b5; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->order_status) }}
                                                       </span>
                                                  @break

                                                  @case('delivered')
                                                       <span style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->order_status) }}
                                                       </span>
                                                  @break

                                                  @case('cancelled')
                                                       <span style="background: red; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->order_status) }}
                                                       </span>
                                                  @break

                                                  @default
                                                       <span style="background: blue; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                            {{ ucfirst($order->order_status) }}
                                                       </span>

                                             @endswitch

                                        </div>
                                   </div>
                              </div>

                              <!-- Customer Details -->
                              <div class="card mb-3">
                                   <div class="card-header bg-light">
                                        <h5 class="mb-0">Customer Details</h5>
                                   </div>
                                   <div class="card-body">

                                        <p><strong>Name:</strong> {{ $order->users->name }}</p>
                                        <p><strong>Email:</strong> {{ $order->users->email }}</p>
                                        <p><strong>Phone:</strong> {{ $order->order->address->phone }}</p>

                                        <hr>

                                        <h6 class="fw-bold">Shipping Address</h6>
                                        <p class="mb-1">{{ $order->order->address->address }}</p>

                                        <p class="mb-1">
                                        <h6 class="fw-bold">City</h6>
                                        {{ $order->order->address->city }},
                                        <p class="mb-1">
                                        <h6 class="fw-bold">State</h6>
                                        {{ $order->order->address->state }}
                                        </p>
                                        </p>

                                   </div>
                              </div>

                              <!-- Product Details -->
                              <div class="card mb-3">
                                   <div class="card-header bg-light">
                                        <h5 class="mb-0">Product Details</h5>
                                   </div>

                                   <div class="card-body">
                                        <div class="table-responsive">
                                             <table class="table table-bordered align-middle">
                                                  <thead class="table-light">
                                                       <tr>
                                                            <th>Image</th>
                                                            <th>Product</th>
                                                            <th>Category</th>
                                                            <th>Qty</th>
                                                            <th>Price</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       <tr>
                                                            <td width="80">
                                                                 <img src="{{ asset('storage/' . $order->product->image) }}"
                                                                      class="img-fluid rounded" width="60">
                                                            </td>
                                                            <td>{{ $order->product->name }}</td>
                                                            <td>{{ $order->product->category->name }}</td>
                                                            <td>{{ $order->quantity ?? 1 }}</td>
                                                            <td>₹ {{ $order->product->price }}</td>

                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>

                         </div>

                         <!-- ================= RIGHT SIDE ================= -->
                         <div class="col-lg-4">

                              <div class="card">
                                   <div class="card-header bg-light">
                                        <h5 class="mb-0">Order Summary</h5>
                                   </div>

                                   <div class="card-body">

                                        <div class="d-flex justify-content-between mb-2">
                                             <span>Subtotal</span>
                                             <span>₹{{ $order->price }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                             <span>GST (18%)</span>
                                             <span>
                                                  ₹{{ number_format(($order->price * 18) / 100, 2) }}
                                             </span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                             <span>Delivery Charge</span>
                                             <span>₹50</span>
                                        </div>

                                        <hr>

                                        <div class="d-flex justify-content-between fw-bold fs-5">
                                             <span>Total Amount</span>
                                             <span>₹{{ $order->total_amount }}</span>
                                        </div>

                                        <hr>

                                        <div class="mt-3">
                                             <p class="mb-1"><strong>Payment Mode:</strong>
                                                  {{ ucfirst($order->payment_mode) }}</p>

                                        </div>
                                   </div>
                              </div>
                              <br>
                              <div class="card">
                                   <div class="card-header bg-light">
                                        <h5 class="mb-0">Vendor Details</h5>
                                   </div>
                                   <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                             <strong>Name</strong>
                                             <span>{{ $order->vendor->name }}</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                             <strong>Email</strong>
                                             <span>
                                                  {{ $order->vendor->email }}
                                             </span>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
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