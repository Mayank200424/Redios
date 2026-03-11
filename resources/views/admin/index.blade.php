<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Admin</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


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
                    <a href="{{ route('admin.index') }}" class="logo-dark">
                         <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('admin/assets/images/logo-dark.png') }}" class="logo-lg" alt="logo dark">
                    </a>

                    <a href="{{ route('admin.index') }}" class="logo-light">
                         <img src="{{ asset('admin/assets/images/logo-sm.png') }}" class="logo-sm" alt="logo sm">
                         <img src="{{ asset('admin/assets/images/logo-light.png') }}" class="logo-lg" alt="logo light">
                    </a>
               </div>

               <!-- Menu Toggle Button (sm-hover) -->
               <button type="button" class="button-sm-hover" aria-label="Show Full Sidebar">
                    <iconify-icon icon="solar:double-alt-arrow-right-bold-duotone"
                         class="button-sm-hover-icon"></iconify-icon>
               </button>

               @include('sidebar.admin-sidebar')

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
                         <div class="col-xxl-5">
                              <div class="row">
                                   {{-- Total Revenue --}}
                                   <div class="col-md-6">
                                        <a href="{{ route('order-list') }}" class="card-link">
                                             <div class="card overflow-hidden dashboard-card">
                                                  <div class="card-body">
                                                       <div class="row">
                                                            <div class="col-6">
                                                                 <div class="avatar-md bg-soft-primary rounded">
                                                                      <iconify-icon icon="solar:cart-5-bold-duotone"
                                                                           class="avatar-title fs-32 text-primary"></iconify-icon>
                                                                 </div>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                 <p class="text-muted mb-0 text-truncate">Total Revenue
                                                                 </p>
                                                                 <h3 class="text-dark mt-1 mb-0">₹{{ $total_revenue }}
                                                                 </h3>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </a>
                                   </div>

                                   {{-- Total Customers --}}
                                   <div class="col-md-6">
                                        <a href="{{ route('admin.customer') }}" class="card-link">
                                             <div class="card overflow-hidden dashboard-card">
                                                  <div class="card-body">
                                                       <div class="row">
                                                            <div class="col-6">
                                                                 <div class="avatar-md bg-soft-primary rounded">
                                                                      <i
                                                                           class="bx bx-award avatar-title fs-24 text-primary"></i>
                                                                 </div>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                 <p class="text-muted mb-0 text-truncate">Total
                                                                      Customers</p>
                                                                 <h3 class="text-dark mt-1 mb-0">{{ $customers }}</h3>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </a>
                                   </div>

                                   {{-- Total Vendors --}}
                                   <div class="col-md-6">
                                        <a href="{{ route('admin.vendor') }}" class="card-link">
                                             <div class="card overflow-hidden dashboard-card">
                                                  <div class="card-body">
                                                       <div class="row">
                                                            <div class="col-6">
                                                                 <div class="avatar-md bg-soft-primary rounded">
                                                                      <i
                                                                           class="bx bxs-backpack avatar-title fs-24 text-primary"></i>
                                                                 </div>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                 <p class="text-muted mb-0 text-truncate">Total Vendors
                                                                 </p>
                                                                 <h3 class="text-dark mt-1 mb-0">{{ $vendors }}</h3>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </a>
                                   </div>

                                   {{-- Total Vendors --}}
                                   <div class="col-md-6">
                                        <a href="{{ route('admin.vendor') }}" class="card-link">
                                             <div class="card overflow-hidden dashboard-card">
                                                  <div class="card-body">
                                                       <div class="row">
                                                            <div class="col-6">
                                                                 <div class="avatar-md bg-soft-primary rounded">
                                                                      <i
                                                                           class="bx bxs-backpack avatar-title fs-24 text-primary"></i>
                                                                 </div>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                 <p class="text-muted mb-0 text-truncate">Total DeliveryBoy
                                                                 </p>
                                                                 <h3 class="text-dark mt-1 mb-0">{{ $total_deliveryboy }}</h3>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </a>
                                   </div>

                                   {{-- Total Category --}}
                                   <div class="col-md-6">
                                        <a href="{{ route('admin.category') }}" class="card-link">
                                             <div class="card overflow-hidden dashboard-card">
                                                  <div class="card-body">
                                                       <div class="row">
                                                            <div class="col-6">
                                                                 <div class="avatar-md bg-soft-primary rounded">
                                                                      <iconify-icon icon="solar:cart-5-bold-duotone"
                                                                           class="avatar-title fs-32 text-primary"></iconify-icon>
                                                                 </div>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                 <p class="text-muted mb-0 text-truncate">Total Category
                                                                 </p>
                                                                 <h3 class="text-dark mt-1 mb-0">{{ $categories }}</h3>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </a>
                                   </div>

                                   {{-- Total SubCategory --}}
                                   <div class="col-md-6">
                                        <a href="{{ route('admin.subcategory') }}" class="card-link">
                                             <div class="card overflow-hidden dashboard-card">
                                                  <div class="card-body">
                                                       <div class="row">
                                                            <div class="col-6">
                                                                 <div class="avatar-md bg-soft-primary rounded">
                                                                      <iconify-icon icon="solar:cart-5-bold-duotone"
                                                                           class="avatar-title fs-32 text-primary"></iconify-icon>
                                                                 </div>
                                                            </div>
                                                            <div class="col-6 text-end">
                                                                 <p class="text-muted mb-0 text-truncate">Total
                                                                      SubCategory</p>
                                                                 <h3 class="text-dark mt-1 mb-0">{{ $subcategories }}
                                                                 </h3>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </a>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <!-- end row -->

                    <div class="row">
                         <div class="col">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                             <h4 class="card-title">
                                                  Recent Login
                                             </h4>
                                        </div>
                                   </div>
                                   <!-- end card body -->
                                   <div class="table-responsive table-centered">
                                        <table class="table mb-0">
                                             <thead class="bg-light bg-opacity-50">
                                                  <tr>
                                                       <th>
                                                            Date
                                                       </th>
                                                       <th>
                                                            Login Time
                                                       </th>
                                                       <th>
                                                            User Name
                                                       </th>
                                                       <th>
                                                            User Email ID
                                                       </th>
                                                       <th>
                                                            Role
                                                       </th>
                                                  </tr>
                                             </thead>
                                             <!-- end thead-->
                                             <tbody>
                                                  @foreach ($login_logs as $login_log)
                                                       <tr>
                                                            <td>{{ $login_log->login_time->format('d-m-Y') }}</td>
                                                            <td>{{ $login_log->login_time->diffForHumans() }}</td>
                                                            <td>{{ $login_log->user->name }}</td>
                                                            <td>{{ $login_log->user->email }}</td>
                                                            <td>{{ $login_log->user->role }}</td>
                                                       </tr>
                                                  @endforeach
                                             </tbody>
                                             <!-- end tbody -->
                                        </table>
                                        <!-- end table -->
                                   </div>
                                   <!-- table responsive -->

                                   <div class="card-footer border-top">
                                        {{ $login_logs->links() }}
                                   </div>
                              </div>
                              <!-- end card -->
                         </div>
                         <!-- end col -->
                    </div> <!-- end row -->

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