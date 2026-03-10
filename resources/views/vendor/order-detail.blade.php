<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <title>Vendor</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="images/x-icon" />
     
     <link href="{{ asset('admin/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
     <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="{{ asset('assets/css/other.css') }}">
     <script src="{{ asset('admin/assets/js/config.js') }}"></script>

</head>

<body>

     <div class="wrapper">

          <!-- ========== Topbar Start ========== -->
          <header class="topbar">
               <div class="container-fluid">
                    <div class="navbar-header">
                         <div class="d-flex align-items-center">
                              <!-- Menu Toggle Button -->
                              <div class="topbar-item">
                                   <button type="button" class="button-toggle-menu me-2">
                                        <iconify-icon icon="solar:hamburger-menu-broken"
                                             class="fs-24 align-middle"></iconify-icon>
                                   </button>
                              </div>

                              <!-- Menu Toggle Button -->
                              <div class="topbar-item">
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Order Details</h4>
                              </div>
                         </div>

                         @include('admin.header')
                    </div>
               </div>
          </header>
          <!-- ========== Topbar End ========== -->

          <!-- ========== App Menu Start ========== -->
          <div class="main-nav">
               <!-- Sidebar Logo -->
               <div class="logo-box">
                    <a href="{{ route('vendor.index') }}" class="logo-dark">
                         <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('admin/assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
                    </a>

                    <a href="{{ route('vendor.index') }}" class="logo-light">
                         <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('admin/assets/images/logo-light.png') }}" class="logo-lg" alt="logo light">
                    </a>
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone"
                         class="button-sm-hover-icon"></iconify-icon>
               </button>

               
               @include('sidebar.vendor-sidebar')
          </div>
          <!-- ========== App Menu End ========== -->


          <!-- ================= Page Content ================= -->
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

                              <div class="card">
                                   <div class="card-header bg-light">
                                        <h5 class="mb-0">Vendor Details</h5>
                                   </div>

                                   <div class="card-body">

                                        <div class="d-flex justify-content-between mb-2">
                                             <h5 class="fw-bold">Name</h5>
                                             <span>{{ $order->vendor->name }}</span>
                                        </div>

                                        <div class="d-flex justify-content-between mb-2">
                                             <h5 class="fw-bold">Email</h5>
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

     </div>

     <!-- Profile Edit Modal -->
     <div class="modal fade" id="profileModal" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title">Edit Profile</h5>
                         <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                         @csrf
                         @method('PUT')

                         <div class="modal-body">

                              <div class="mb-3 text-center">
                                   <div class="profile-circle mx-auto mb-2"
                                        style="width:60px;height:60px;font-size:24px;">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                   </div>
                              </div>

                              <div class="mb-3">
                                   <label>Name</label>
                                   <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control"
                                        required>
                              </div>

                              <div class="mb-3">
                                   <label>Email</label>
                                   <input type="email" name="email" value="{{ Auth::user()->email }}"
                                        class="form-control" required>
                              </div>

                         </div>

                         <div class="modal-footer">
                              <button type="submit" class="btn btn-orange">Edit Profile</button>
                         </div>
                    </form>
               </div>
          </div>
     </div>

     <!-- Logout Confirmation Modal -->
     <div class="modal fade" id="logoutModal" tabindex="-1">
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

     <script src="{{ asset('admin/assets/js/vendor.js') }}"></script>
     <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>

</html>