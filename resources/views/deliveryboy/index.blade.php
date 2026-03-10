<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:38:55 GMT -->

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
               {!! toastMessage() !!}
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
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Welcome
                                        {{ Auth::user()->name }}
                                   </h4>
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
          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-fluid">

                    <!-- Start here.... -->
                    <div class="row">
                         <div class="col-md-6">
                              <a href="{{ route('deliveryboy.assignedorder') }}" style="text-decoration: none;">
                                   <div class="card overflow-hidden hover-shadow">
                                        <div class="card-body">
                                             <div class="row">
                                                  <div class="col-6">
                                                       <div class="avatar-md bg-soft-primary rounded">
                                                            <iconify-icon icon="solar:cart-5-bold-duotone"
                                                                 class="avatar-title fs-32 text-primary"></iconify-icon>
                                                       </div>
                                                  </div>
                                                  <div class="col-6 text-end">
                                                       <p class="text-muted mb-0 text-truncate">Total Assigned Orders</p>
                                                       <h3 class="text-dark mt-1 mb-0">
                                                            {{ $assigned_order_count }}
                                                       </h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </a>
                         </div>

                         <div class="col-md-6">
                              <a href="{{ route('deliveryboy.deliveredorder') }}" style="text-decoration: none;">
                                   <div class="card overflow-hidden hover-shadow">
                                        <div class="card-body">
                                             <div class="row">
                                                  <div class="col-6">
                                                       <div class="avatar-md bg-soft-primary rounded">
                                                            <i
                                                                 class="bx bxs-backpack avatar-title fs-24 text-primary"></i>
                                                       </div>
                                                  </div>
                                                  <div class="col-6 text-end">
                                                       <p class="text-muted mb-0 text-truncate">Total Delivered Orders</p>
                                                       <h3 class="text-dark mt-1 mb-0">
                                                            {{$delivered_order_count}}
                                                       </h3>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </a>
                         </div>

                    </div>
                    <!-- end row -->

                    {{--<div class="row">
                         <div class="col">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                             <h4 class="card-title">
                                                  Recent Orders
                                             </h4>
                                        </div>
                                   </div>
                                   <!-- end card body -->
                                   <div class="table-responsive table-centered">
                                        <table class="table mb-0">
                                             <thead class="bg-light bg-opacity-50">
                                                  <tr>
                                                       <th>
                                                            Order Number.
                                                       </th>
                                                       <th>
                                                            Customer
                                                       </th>
                                                       <th>
                                                            Product Name
                                                       </th>
                                                       <th>
                                                            Total
                                                       </th>
                                                       <th>
                                                            Payment
                                                       </th>
                                                       <th>Date</th>
                                                  </tr>
                                             </thead>
                                             <!-- end thead-->
                                             <tbody>
                                                  @forelse ($recent_orders as $recent_order)
                                                       <tr>
                                                            <td>{{ $recent_order->order->order_number }}</td>

                                                            <td>{{ $recent_order->users->name }}</td>

                                                            <td>
                                                                 {{ $recent_order->product->name }}
                                                            </td>
                                                            <td>
                                                                 ₹{{ $recent_order->total_amount }}
                                                            </td>
                                                            <td>
                                                                 @if($recent_order->payment_status == 'paid')
                                                                      <span
                                                                           style="background: green; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                           {{ ucfirst($recent_order->payment_status) }}
                                                                      </span>
                                                                 @elseif($recent_order->payment_status == 'pending')
                                                                      <span
                                                                           style="background: orange; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                           {{ ucfirst($recent_order->payment_status) }}
                                                                      </span>
                                                                 @else
                                                                      <span
                                                                           style="background: red; color: white; padding:4px 8px; border-radius:4px; display:inline-block;">
                                                                           {{ ucfirst($recent_order->payment_status) }}
                                                                      </span>
                                                                 @endif
                                                            </td>
                                                            <td>
                                                                 {{ $recent_order->created_at->format('d-m-Y') }}
                                                            </td>
                                                       </tr>
                                                  @empty
                                                       <tr>
                                                            <td colspan="5" class="text-center text-danger">
                                                                 No Product Found
                                                            </td>
                                                       </tr>
                                                  @endforelse
                                             </tbody>
                                             <!-- end tbody -->
                                        </table>
                                        <!-- end table -->
                                   </div>
                                   <!-- table responsive -->

                                   <div class="card-footer border-top">
                                        {{ $stocks->links() }}
                                   </div>
                              </div>
                              <!-- end card -->
                         </div>
                         <!-- end col -->
                    </div>--}}

               </div>
               <!-- End Container Fluid -->

          </div>
          <!-- ==================================================== -->
          <!-- End Page Content -->
          <!-- ==================================================== -->

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

     <!-- Vector Map Js -->
     <script src="{{ asset('admin/assets/vendor/jsvectormap/js/jsvectormap.min.js') }}"></script>
     <script src="{{ asset('admin/assets/vendor/jsvectormap/maps/world-merc.js') }}"></script>
     <script src="{{ asset('admin/assets/vendor/jsvectormap/maps/world.js') }}"></script>

     <!-- Dashboard Js -->
     <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>
</body>


<!-- Mirrored from techzaa.in/larkon/admin/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:39:53 GMT -->

</html>