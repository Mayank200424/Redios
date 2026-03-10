<!DOCTYPE html>
<html lang="en" class="h-100">

<!-- Mirrored from techzaa.in/larkon/admin/auth-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:36 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>SignUp</title>
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

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/config.js') }}"></script>
</head>

<body class="h-100">
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-5 p-4">
                                   <div class="d-flex flex-column h-100 justify-content-center">
                                        <div class="card">
                                             <div class="card-body">
                                                  <div class="auth-logo mb-4 text-center">
                                                       <a href="index.html" class="logo-dark">
                                                            <img src="{{ asset('assets/img/logo/logo.svg') }}"
                                                                 height="40" alt="logo dark">
                                                       </a>

                                                       <a href="index.html" class="logo-light">
                                                            <img src="{{ asset('assets/img/logo/logo.svg') }}"
                                                                 height="40" alt="logo light">
                                                       </a>
                                                  </div>

                                                  <h2 class="fw-bold fs-24 text-center">Sign Up</h2>

                                                  <form action="{{ route('sign-up') }}" method="post"
                                                       class="authentication-form">
                                                       @csrf
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-name">Name</label>
                                                            <input type="name" id="example-name" name="name"
                                                                 class="form-control" placeholder="Enter your name">
                                                            <div>
                                                                 <span style="color: red;">@error('name'){{ $message }}@enderror</span>
                                                            </div>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-email">Email</label>
                                                            <input type="email" id="example-email" name="email"
                                                                 class="form-control bg-"
                                                                 placeholder="Enter your email">
                                                            <div>
                                                                 <span style="color: red;">@error('email'){{ $message }}@enderror</span>
                                                            </div>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label"
                                                                 for="example-password">Password</label>
                                                            <input type="password" id="example-password" name="password"
                                                                 class="form-control" placeholder="Enter your password">
                                                            <div>
                                                                 <span style="color: red;">@error('password'){{ $message }}@enderror</span>
                                                            </div>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-password">Confirm
                                                                 Password</label>
                                                            <input type="password" id="example-password"
                                                                 name="password_confirmation" class="form-control"
                                                                 placeholder="Enter your confirm password">
                                                             <div>
                                                                 <span style="color: red;">@error('password_confirmation'){{ $message }}@enderror</span>
                                                            </div>
                                                       </div>
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-role">Role</label>
                                                            <select name="role" class="form-select">
                                                                 <option value="">Select Role</option>
                                                                 <option value="admin">Admin</option>
                                                                 <option value="customer">Customer</option>
                                                                 <option value="vendor">Vendor</option>
                                                                 <option value="delivery_boy">Delivery Boy</option>
                                                            </select>
                                                            <div>
                                                                 <span style="color: red;">@error('role'){{ $message }}@enderror</span>
                                                            </div>
                                                       </div>
                                                       <div class="mb-1 text-center d-grid">
                                                            <button class="btn btn-soft-primary" type="submit">Sign
                                                                 Up</button>
                                                       </div>
                                                  </form>

                                                  <p class="mt-3 text-danger text-center">I already have an account? <a
                                                            href="{{ route('login') }}"
                                                            class="text-dark fw-bold ms-1">Sign In</a></p>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/vendor.js') }}"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/app.js') }}"></script>

</body>


<!-- Mirrored from techzaa.in/larkon/admin/auth-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:36 GMT -->

</html>