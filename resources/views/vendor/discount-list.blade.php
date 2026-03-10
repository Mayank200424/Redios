<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:07 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Vendor</title>
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
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Discount List</h4>
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

          <!-- ==================================================== -->
          <!-- Start right Content here -->
          <!-- ==================================================== -->
          <div class="page-content">

               <!-- Start Container Fluid -->
               <div class="container-fluid">

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                                        <h4 class="card-title flex-grow-1">All Discount List</h4>

                                        <a href="{{ route('discount.add') }}" class="btn btn-sm btn-primary">
                                             Add Discount
                                        </a>
                                   </div>
                                   <div>
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th style="width: 20px;">
                                                                 <div class="form-check ms-1">
                                                                      <input type="checkbox" class="form-check-input"
                                                                           id="customCheck1">
                                                                      <label class="form-check-label"
                                                                           for="customCheck1"></label>
                                                                 </div>
                                                            </th>
                                                            <th>Id</th>
                                                            <th>Product Image</th>
                                                            <th>Product Name</th>
                                                            <th>Price</th>
                                                            <th>Discount</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @forelse ($discounts as $discount)
                                                       <tr>
                                                            <td>
                                                                 <div class="form-check ms-1">
                                                                      <input type="checkbox" class="form-check-input"
                                                                           id="customCheck2">
                                                                      <label class="form-check-label"
                                                                           for="customCheck2">&nbsp;</label>
                                                                 </div>
                                                            </td>
                                                            <td>
                                                                 <div class="d-flex align-items-center gap-2">
                                                                      <p class="text-dark fw-medium fs-15 mb-0">
                                                                           {{ $discount->id }}
                                                                      </p>
                                                                 </div>
                                                            </td>
                                                            <td><img src="{{ asset('storage/' . $discount->product->image) }}"
                                                                      style="width:80px; height:80px;"></td>
                                                            <td>{{ $discount->product->name }}</td>
                                                            <td>{{ $discount->product->price }}</td>
                                                            <td>{{ $discount->discount_value }}%</td>
                                                            <td>{{ $discount->start_date }}</td>
                                                            <td>{{ $discount->end_date }}</td>
                                                            <td>{{ $discount->status }}</td>
                                                            <td>
                                                                 <div class="d-flex gap-2">
                                                                      <a href="{{ route('discount-edit', $discount->id) }}"
                                                                           class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                                icon="solar:pen-2-broken"
                                                                                class="align-middle fs-18"></iconify-icon></a>
                                                                      <a href="#" class="btn btn-soft-danger btn-sm"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#deleteModal"
                                                                           data-id="{{ $discount->id }}">
                                                                           <iconify-icon
                                                                                icon="solar:trash-bin-minimalistic-2-broken"
                                                                                class="align-middle fs-18"></iconify-icon>
                                                                      </a>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @empty
                                                       <tr>
                                                            <td colspan="10" class="text-center py-4">
                                                                 <div class="text-muted">
                                                                      <i class="bx bx-discount fs-40"></i>
                                                                      <h5 class="mt-2">No Discounts Found</h5>

                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @endforelse

                                                  </tbody>
                                             </table>
                                        </div>
                                        <!-- end table-responsive -->
                                   </div>
                                   {{--<div class="card-footer border-top">
                                        {{ $products->links() }}
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

     <!-- Delete Modal -->
     <div class="modal fade" id="deleteModal" tabindex="-1">
          <div class="modal-dialog">
               <div class="modal-content">
                    <form method="POST" id="deleteForm">
                         @csrf
                         @method('DELETE')

                         <div class="modal-header">
                              <h5 class="modal-title">Delete Discount</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                         </div>

                         <div class="modal-body">
                              Are you sure you want to delete this discount?
                         </div>

                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-danger">Yes, Delete</button>
                         </div>

                    </form>
               </div>
          </div>
     </div>


     <!-- Vendor Javascript (Require in all Page) -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="{{ asset('admin/assets/js/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/app.js') }}"></script>
     <script>
          var deleteModal = document.getElementById('deleteModal');
          deleteModal.addEventListener('show.bs.modal', function (event) {
               var button = event.relatedTarget;
               var id = button.getAttribute('data-id');

               var form = document.getElementById('deleteForm');
               form.action = "/vendor/discount/delete/" + id;
          });
     </script>
</body>
<!-- Mirrored from techzaa.in/larkon/admin/product-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:13 GMT -->

</html>