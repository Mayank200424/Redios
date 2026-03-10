<!DOCTYPE html>
<html lang="en" class="h-100">


<!-- Mirrored from techzaa.in/larkon/admin/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:07 GMT -->

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>SignIn</title>
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

     <!-- Theme Config js (Require in all Page) -->
     <script src="{{ asset('admin/assets/js/config.js') }}"></script>
</head>

<body class="h-100">
     <div class="d-flex flex-column h-100 p-3">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="col-xxl-7">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-4 py-lg-5">
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

                                                  <h2 class="fw-bold fs-24 text-center">Sign In</h2>

                                                 {!! toastMessage() !!}

                                                  <form action="{{ route('sign-in') }}" method="post"
                                                       class="authentication-form">
                                                       @csrf
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
                                                            <input type="password" id="example-password"
                                                                 class="form-control" name="password"
                                                                 placeholder="Enter your password">
                                                            <div>
                                                                 <span style="color: red;">@error('password'){{ $message }}@enderror</span>
                                                            </div>
                                                            <a href="{{ route('forgot-password.form') }}"
                                                                 class="float-end text-muted ms-1">Forgot password</a>
                                                       </div>
                                                       <!-- <div class="mb-3">
                                                            <div class="form-check">
                                                                 <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                                                 <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                                            </div>
                                                       </div> -->
                                                       <br>
                                                       <div class="mb-1 text-center d-grid">
                                                            <button class="btn btn-soft-primary" type="submit">Sign
                                                                 In</button>
                                                       </div>
                                                       <br>
                                                       <p class="text-danger text-center">Don't have an account? <a
                                                                 href="{{ route('signUp') }}"
                                                                 class="text-dark fw-bold ms-1">Sign Up</a></p>
                                                  </form>

                                                  <!-- <p class="mt-3 fw-semibold no-span">OR sign with</p>

                                                  <div class="d-grid gap-2">
                                                       <a href="javascript:void(0);" class="btn btn-soft-dark"><i class="bx bxl-google fs-20 me-1"></i> Sign in with Google</a>
                                                       <a href="javascript:void(0);" class="btn btn-soft-primary"><i class="bx bxl-facebook fs-20 me-1"></i> Sign in with Facebook</a>
                                                  </div> -->
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


<!-- Mirrored from techzaa.in/larkon/admin/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Feb 2026 10:40:07 GMT -->

</html>