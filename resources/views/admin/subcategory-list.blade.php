<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/category-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Admin</title>
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
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">SubCategories List</h4>
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
               <div class="container-xxl">
                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                                        <h4 class="card-title flex-grow-1">All SubCategories List</h4>
                                        <div>
                                             <!-- App Search-->
                                             <form class="app-search d-none d-md-block ms-2">
                                                  <div class="position-relative">
                                                       <input type="search" class="form-control search-input"
                                                            placeholder="Search subcategroy" autocomplete="off" value=""
                                                            name="search"
                                                            style="padding-right: 45px; border-radius: 8px; border: 1px solid #e0e0e0; transition: all 0.3s ease;">
                                                       <span class="search-icon-wrapper">
                                                            <iconify-icon icon="solar:magnifer-linear"
                                                                 class="search-widget-icon"
                                                                 style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #6c757d; font-size: 15px;"></iconify-icon>
                                                       </span>
                                                  </div>
                                             </form>
                                        </div>
                                        <a href="{{ route('subcategory.add') }}" class="btn btn-sm btn-primary">
                                             Add SubCategory
                                        </a>
                                   </div>
                                   <div>
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th style="width: 20px;">
                                                                 <div class="form-check">
                                                                      <input type="checkbox" class="form-check-input"
                                                                           id="customCheck1">
                                                                      <label class="form-check-label"
                                                                           for="customCheck1"></label>
                                                                 </div>
                                                            </th>
                                                            <th>ID</th>
                                                            <th>SubCategory Image</th>
                                                            <th>SubCategory Name</th>
                                                            <th>Category Name</th>
                                                            <th>Create by</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody id="subcategoryTable">
                                                       @foreach ($subcategories as $subcategory)

                                                            <tr>
                                                                 <td>
                                                                      <div class="form-check">
                                                                           <input type="checkbox" class="form-check-input"
                                                                                id="customCheck2">
                                                                           <label class="form-check-label"
                                                                                for="customCheck2"></label>
                                                                      </div>
                                                                 </td>
                                                                 <td>
                                                                      <div class="d-flex align-items-center gap-2">
                                                                           <p class="text-dark fw-medium fs-15 mb-0">
                                                                                {{ $subcategory->id }}
                                                                           </p>
                                                                      </div>
                                                                 </td>
                                                                 <td><img src="{{ asset('storage/' . $subcategory->image) }}"
                                                                           style="width:80px; height:80px;"></td>
                                                                 <td>{{ $subcategory->name }}</td>
                                                                 <td>{{ $subcategory->parent->name ?? 'N/A' }}</td>
                                                                 <td>{{ $subcategory->created_at->format('d/m/y') }}</td>
                                                                 <td>
                                                                      <div class="d-flex gap-2">
                                                                           <a href="javascript:void(0)"
                                                                                class="btn btn-light btn-sm viewsubCategoryBtn"
                                                                                data-id="{{ $subcategory->id }}"
                                                                                data-image="{{ asset('storage/' . $subcategory->image) }}"
                                                                                data-name="{{ $subcategory->name }}"
                                                                                data-subname="{{ $subcategory->parent->name }}"
                                                                                data-date="{{ $subcategory->created_at->format('d/m/y') }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#viewModal">
                                                                                <iconify-icon icon="solar:eye-broken"
                                                                                     class="align-middle fs-18"></iconify-icon>
                                                                           </a>
                                                                           <a href="{{ route('subcategory.edit', $subcategory->id) }}"
                                                                                class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                                     icon="solar:pen-2-broken"
                                                                                     class="align-middle fs-18"></iconify-icon></a>
                                                                           <a href="#" class="btn btn-soft-danger btn-sm"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#deleteModal"
                                                                                data-id="{{ $subcategory->id }}">
                                                                                <iconify-icon
                                                                                     icon="solar:trash-bin-minimalistic-2-broken"
                                                                                     class="align-middle fs-18"></iconify-icon>
                                                                           </a>
                                                                      </div>
                                                                 </td>
                                                            </tr>

                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                        <!-- end table-responsive -->
                                   </div>
                                   <div class="card-footer border-top">
                                        {!! $subcategories->links() !!}
                                   </div>
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
                              <h5 class="modal-title">Delete SubCategory</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                         </div>

                         <div class="modal-body">
                              Are you sure you want to delete this subcategory?
                         </div>

                         <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-danger">Yes, Delete</button>
                         </div>

                    </form>
               </div>
          </div>
     </div>

     <!-- View Modal -->
     <div class="modal fade" id="viewModal">
          <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">

                    <div class="modal-header">
                         <h5 class="modal-title">SubCategory Details</h5>
                         <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                         <div class="mb-3 text-center">
                              <img id="viewImage" src="" class="img-fluid rounded" width="150">
                         </div>

                         <div class="mb-3 text-center">
                              <p class="mb-1">
                                   <strong>SubCategory Name :</strong>
                                   <span id="viewName"></span>
                              </p>
                         </div>

                         <div class="mb-3 text-center">
                              <p class="mb-1">
                                   <strong>Category Name :</strong>
                                   <span id="viewParentName"></span>
                              </p>
                         </div>

                         <div class="mb-3 text-center">
                              <p class="mb-1">
                                   <strong>Created Date :</strong>
                                   <span id="viewDate"></span>
                              </p>
                         </div>

                    </div>

               </div>
          </div>
     </div>


     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/app.js') }}"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


     <script>
          var deleteModal = document.getElementById('deleteModal');
          deleteModal.addEventListener('show.bs.modal', function (event) {
               var button = event.relatedTarget;
               var id = button.getAttribute('data-id');

               var form = document.getElementById('deleteForm');
               form.action = "/admin/delete-subcategory/" + id;
          });

          $(document).on('click', '.viewsubCategoryBtn', function () {

               var name = $(this).data('name');
               var parentName = $(this).data('subname');
               var image = $(this).data('image');
               var date = $(this).data('date');

               $('#viewName').text(name);
               $('#viewParentName').text(parentName);
               $('#viewImage').attr('src', image);
               $('#viewDate').text(date);

          });

          $(document).ready(function () {

               $('.search-input').keyup(function () {

                    let search = $(this).val();

                    $.ajax({
                         url: "{{ route('subcategory.search') }}",
                         type: "GET",
                         data: { search: search },

                         success: function (data) {

                              let html = '';

                              if (data.data && data.data.length > 0) {

                                   data.data.forEach(function (subcategory) {

                                        html += `
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input">
                                                  </div>
                                             </td>

                                             <td>${subcategory.id}</td>

                                             <td>
                                                  <img src="/storage/${subcategory.image}" 
                                                       style="width:80px; height:80px;">
                                             </td>

                                             <td>${subcategory.name}</td>

                                             <td>${subcategory.parent ? subcategory.parent.name : 'N/A'}</td>

                                             <td>${new Date(subcategory.created_at).toLocaleDateString('en-GB')}</td>

                                             <td>
                                                  <div class="d-flex gap-2">
                                                       <a href="javascript:void(0)"
                                                            class="btn btn-light btn-sm viewsubCategoryBtn"
                                                            data-id="${subcategory.id}"
                                                            data-name="${subcategory.name}"
                                                            data-subname="${subcategory.parent ? subcategory.parent.name : 'N/A'}"
                                                            data-image="/storage/${subcategory.image}"
                                                            data-date="${new Date(subcategory.created_at).toLocaleDateString('en-GB')}"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#viewModal">
                                                            <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                       </a>

                                                        <a href="/admin/subcategory/edit/${subcategory.id}"
                                                                                class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                                     icon="solar:pen-2-broken"
                                                                                     class="align-middle fs-18"></iconify-icon></a>

                                                       <a href="#"
                                                            class="btn btn-soft-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            data-id="${subcategory.id}">
                                                            <iconify-icon
                                                            icon="solar:trash-bin-minimalistic-2-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                       </a>
                                                  </div>
                                             </td>
                                        </tr>
                                        `;
                                   });

                                   // Update pagination links if available
                                   if (data.links) {
                                        $('.card-footer').html(data.links);
                                   }

                              } else {

                                   html = `
                                             <tr>
                                                  <td colspan="7" class="text-center text-danger">
                                                       No SubCategory found
                                                  </td>
                                             </tr>
                                             `;
                                       
                                   // Clear pagination when no results
                                   $('.card-footer').html('');
                              }

                              $('#subcategoryTable').html(html);
                         }
                    });

               });

          });


     </script>


</body>


<!-- Mirrored from techzaa.in/larkon/admin/category-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

</html>