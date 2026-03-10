<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from techzaa.in/larkon/admin/product-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

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
                            <h4 class="fw-bold topbar-button pe-none text-uppercase mb-0">View Product</h4>
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
        <div class="page-content p-4">

            <div class="container-xxl">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">

                        <div class="card mb-4 shadow-sm">
                            <div class="card-header bg-light">
                                <h4 class="card-title mb-0">View Product</h4>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Image</label>
                                        <br>
                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                style="height:80px; width:80px;">
                                    </div>

                                    <!-- Product Name -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Product Name</label>
                                        <p class="form-control-plaintext">{{ $product->name }}</p>
                                    </div>

                                    <!-- Category -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Product Category</label>
                                        <p class="form-control-plaintext">
                                            {{ $product->category->name ?? 'No Category' }}</p>
                                    </div>

                                    <!-- Stock -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Stock</label>
                                        <p class="form-control-plaintext">{{ $product->stock }}</p>
                                    </div>

                                    <!-- Price -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label fw-bold">Price</label>
                                        <p class="form-control-plaintext">₹{{ $product->price }}</p>
                                    </div>

                                     <!-- Description -->
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label fw-bold">Description</label>
                                        <p class="form-control-plaintext">{{ $product->description }}</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <div class="profile-circle mx-auto mb-2" style="width:60px;height:60px;font-size:24px;">
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
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control"
                                required>
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


<!-- Mirrored from techzaa.in/larkon/admin/product-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:15 GMT -->

</html>