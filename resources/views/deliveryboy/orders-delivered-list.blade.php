<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/orders-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Delivery Boy</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="images/x-icon" />

     <!-- Vendor css (Require in all Page) -->
     <link href="{{ asset('admin/assets/css/vendor.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" href="{{ asset('assets/css/other.css') }}">
     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/config.js') }}"></script>
</head>

<body>

     <!-- START Wrapper -->
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
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Orders Delivered List</h4>
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
                    <a href="{{ route('deliveryboy.index') }}" class="logo-dark">
                         <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('admin/assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
                    </a>

                    <a href="{{ route('deliveryboy.index') }}" class="logo-light">
                         <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('admin/assets/images/logo-light.png') }}" class="logo-lg" alt="logo light">
                    </a>
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone"
                         class="button-sm-hover-icon"></iconify-icon>
               </button>

              @include('sidebar.deliveryboy-sidebar')

          </div>
          <!-- ========== App Menu End ========== -->

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div>
               <div class="page-content">
                    <!-- Start Container Fluid -->
                    <div class="container-xxl">
                         <div class="row">
                              <div class="col-xl-12">
                                   <div class="card">
                                        <div class="d-flex card-header justify-content-between align-items-center">
                                             <div>
                                                  <h4 class="card-title">Delivered Order List</h4>
                                             </div>
                                        </div>
                                        <div class="card-body p-0">
                                             <div class="table-responsive">
                                                  <table class="table align-middle mb-0 table-hover table-centered">
                                                       <thead class="bg-light-subtle">
                                                            <tr>
                                                                 <th>Order ID</th>
                                                                 <th>Product Name</th>
                                                                 <th>Customer</th>
                                                                 <th>Total Amount</th>
                                                                 <th>Payment Mode</th>
                                                                 <th>Payment Status</th>
                                                                 <th>Order Status</th>
                                                                 <th>Action</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            @forelse ($delivered_orders as $order)
                                                               
                                                                 <tr>
                                                                      <td>
                                                                           {{ $order->orderItem->order->order_number }}
                                                                      </td>
                                                                      <td>
                                                                           {{ $order->orderItem->product->name }}
                                                                      </td>
                                                                      <td>
                                                                           {{ $order->orderItem->users->name }}
                                                                      </td>
                                                                      <td> ₹{{ $order->orderItem->total_amount }} </td>
                                                                      
                                                                      <td>{{ ucfirst($order->orderItem->payment_mode) }}</td>
                                                                      <td>
                                                                           @switch($order->orderItem->payment_status)

                                                                                @case('paid')
                                                                                     <span style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->payment_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @case('pending')
                                                                                     <span style="background: orange; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->payment_status) }}
                                                                                     </span>
                                                                                @break

                                                                                @case('failed')
                                                                                     <span style="background: black; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->payment_status) }}
                                                                                     </span>
                                                                                @break

                                                                                @default
                                                                                     <span style="background: blue; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->payment_status) }}
                                                                                     </span>

                                                                           @endswitch
                                                                      </td>            
                                                                      <td>
                                                                           @switch($order->orderItem->order_status)

                                                                                @case('pending')
                                                                                     <span style="background: orange; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @case('processing')
                                                                                     <span style="background: #2196f3; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @case('out_of_delivery')
                                                                                     <span style="background: #9c27b0; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @case('shipped')
                                                                                     <span style="background: #3f51b5; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @case('delivered')
                                                                                     <span style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @case('cancelled')
                                                                                     <span style="background: red; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status)  }}
                                                                                     </span>
                                                                                @break

                                                                                @default
                                                                                     <span style="background: blue; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                                          {{ ucfirst($order->orderItem->order_status) }}
                                                                                     </span>
                                                                           @endswitch
                                                                      </td>
                                                                      <td>
                                                                           <div class="d-flex gap-2">
                                                                                <a href="{{ route('deliveryboy.order-detail', $order->id) }}"
                                                                                     class="btn btn-light btn-sm"><iconify-icon
                                                                                          icon="solar:eye-broken"
                                                                                          class="align-middle fs-18"></iconify-icon></a>
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
                                        
                                        {{--<div class="card-footer border-top">
                                             <nav aria-label="Page navigation example">
                                                  <ul class="pagination justify-content-end mb-0">
                                                       <li class="page-item"><a class="page-link"
                                                                 href="javascript:void(0);">Previous</a></li>
                                                       <li class="page-item active"><a class="page-link"
                                                                 href="javascript:void(0);">1</a></li>
                                                       <li class="page-item"><a class="page-link"
                                                                 href="javascript:void(0);">2</a></li>
                                                       <li class="page-item"><a class="page-link"
                                                                 href="javascript:void(0);">3</a></li>
                                                       <li class="page-item"><a class="page-link"
                                                                 href="javascript:void(0);">Next</a></li>
                                                  </ul>
                                             </nav>
                                        </div>--}}
                                   </div>
                              </div>

                         </div>

                    </div>
                    <!-- End Container Fluid -->

               </div>
               <!-- ==================================================== -->
               <!-- End Page Content -->
               <!-- ==================================================== -->


          </div>

     </div>
     <!-- END Wrapper -->

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

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>


<!-- Mirrored from techzaa.in/larkon/admin/orders-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

</html>