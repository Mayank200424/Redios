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
                                   <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">Categories List</h4>
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
                         @foreach ($categories as $category)
                              <div class="col-md-6 col-xl-3">
                                   <div class="card">
                                        <div class="card-body text-center">
                                             <div
                                                  class="rounded bg-secondary-subtle d-flex align-items-center justify-content-center mx-auto">
                                                  <img src="{{ asset('storage/' . $category->image) }}" alt=""
                                                       class="avatar-xl">
                                             </div>
                                             <h4 class="mt-3 mb-0">{{ $category->name }}</h4>
                                        </div>
                                   </div>
                              </div>
                         @endforeach
                    </div>

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">
                                   <div class="card-header d-flex justify-content-between align-items-center gap-1">
                                        <h4 class="card-title flex-grow-1">All Categories List</h4>
                                        <div>
                                             <form class="app-search d-none d-md-block ms-2">
                                                  <div class="position-relative">
                                                       <input type="search" class="form-control search-input"
                                                            placeholder="Search Category" name="search"
                                                            value="{{ request('search') }}" autocomplete="off"
                                                            style="padding-right: 45px; border-radius: 8px; border: 1px solid #e0e0e0; transition: all 0.3s ease;">

                                                       <span class="search-icon-wrapper">
                                                            <iconify-icon icon="solar:magnifer-linear"
                                                                 class="search-widget-icon"
                                                                 style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #6c757d; font-size: 15px;">
                                                            </iconify-icon>
                                                       </span>
                                                  </div>
                                             </form>
                                        </div>
                                        <a href="{{ route('category.add') }}" class="btn btn-sm btn-primary">
                                             Add Category
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
                                                            <th>Category Image</th>
                                                            <th>Category Name</th>
                                                            <th>Create Date</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody id="categoryTable">
                                                       @foreach ($categories as $category)
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
                                                                                {{ $category->id }}
                                                                           </p>
                                                                      </div>
                                                                 </td>
                                                                 <td><img src="{{ asset('storage/' . $category->image) }}"
                                                                           style="width:80px; height:80px;"></td>
                                                                 <td>{{ $category->name }}</td>
                                                                 <td>{{ $category->created_at->format('d/m/y') }}</td>
                                                                 <td>
                                                                      <div class="d-flex gap-2">
                                                                           <a href="javascript:void(0)"
                                                                                class="btn btn-light btn-sm viewCategoryBtn"
                                                                                data-id="{{ $category->id }}"
                                                                                data-name="{{ $category->name }}"
                                                                                data-image="{{ asset('storage/' . $category->image) }}"
                                                                                data-date="{{ $category->created_at->format('d/m/y') }}"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#viewModal">
                                                                                <iconify-icon icon="solar:eye-broken"
                                                                                     class="align-middle fs-18"></iconify-icon>
                                                                           </a>

                                                                           <a href="{{ route('category.edit', $category->id) }}"
                                                                                class="btn btn-soft-primary btn-sm"><iconify-icon
                                                                                     icon="solar:pen-2-broken"
                                                                                     class="align-middle fs-18"></iconify-icon></a>
                                                                           <a href="#" class="btn btn-soft-danger btn-sm"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#deleteModal"
                                                                                data-id="{{ $category->id }}">
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
                                        {!! $categories->links() !!}
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

     <!-- View Modal -->
     <div class="modal fade" id="viewModal">
          <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">

                    <div class="modal-header">
                         <h5 class="modal-title">Category Details</h5>
                         <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">

                         <div class="mb-3 text-center">
                              <img id="viewImage" src="" class="img-fluid rounded" width="150">
                         </div>

                         <div class="mb-3 text-center">
                              <p class="mb-1">
                                   <strong>Name :</strong>
                                   <span id="viewName"></span>
                              </p>
                         </div>

                         <div class="mb-3 text-center">
                              <p class="mb-1">
                                   <strong>Date :</strong>
                                   <span id="viewDate"></span>
                              </p>
                         </div>

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
                              <h5 class="modal-title">Delete Category</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                         </div>

                         <div class="modal-body">
                              Are you sure you want to delete this category?
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
               form.action = "/admin/delete-category/" + id;
          });

          $(document).on('click', '.viewCategoryBtn', function () {

               var name = $(this).data('name');
               var image = $(this).data('image');
               var date = $(this).data('date');

               $('#viewName').text(name);
               $('#viewImage').attr('src', image);
               $('#viewDate').text(date);

          });

          $(document).ready(function () {

               $('.search-input').keyup(function () {

                    var search = $(this).val();

                    $.ajax({
                         url: "{{ route('category.search') }}",
                         type: "GET",
                         data: { search: search },
                         success: function (data) {

                              var html = '';

                              if (data.data && data.data.length > 0) {

                                   data.data.forEach(function (category) {

                                        html += `
                                        <tr>
                                             <td>
                                                  <div class="form-check">
                                                       <input type="checkbox" class="form-check-input">
                                                  </div>
                                             </td>

                                             <td>${category.id}</td>

                                             <td>
                                                  <img src="/storage/${category.image}" 
                                                       style="width:80px; height:80px;">
                                             </td>

                                             <td>${category.name}</td>

                                             <td>${new Date(category.created_at).toLocaleDateString('en-GB')}</td>


                                             <td>
                                             <div class="d-flex gap-2">
                                                       <a href="javascript:void(0)"
                                                       class="btn btn-light btn-sm viewCategoryBtn"
                                                       data-id="${category.id}"
                                                       data-name="${category.name}"
                                                       data-image="/storage/${category.image}"
                                                       data-date="${new Date(category.created_at).toLocaleDateString('en-GB')}"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#viewModal">
                                                       <iconify-icon icon="solar:eye-broken"
                                                            class="align-middle fs-18"></iconify-icon>
                                                       </a>
                                                       <a href="/admin/category/edit/${category.id}"
                                                            class="btn btn-soft-primary btn-sm"><iconify-icon
                                                            icon="solar:pen-2-broken"
                                                            class="align-middle fs-18"></iconify-icon></a>
                                                       <a href="#" class="btn btn-soft-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteModal"
                                                            data-id="${category.id}">
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
                                                  <td colspan="6" class="text-center text-danger">
                                                       No Category found
                                                  </td>
                                             </tr>
                                        `;
                                       
                                   // Clear pagination when no results
                                   $('.card-footer').html('');
                              }

                              $('#categoryTable').html(html);
                         }
                    });

               });

          });

     </script>


</body>


<!-- Mirrored from techzaa.in/larkon/admin/category-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

</html>