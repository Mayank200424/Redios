<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Reset Password</title>
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
                              <div class="col-lg-4 py-lg-5">
                                   <div class="d-flex flex-column h-100 justify-content-center">

                                        <div class="card">
                                             <div class="card-body">
                                                  <div class="auth-logo mb-4 text-center">
                                                       <a href="index.html" class="logo-dark">
                                                            <img src="{{ asset('assets/img/logo/logo.svg') }}" height="40" alt="logo dark">
                                                       </a>

                                                       <a href="index.html" class="logo-light">
                                                            <img src="{{ asset('assets/img/logo/logo.svg') }}" height="40" alt="logo light">
                                                       </a>
                                                  </div>

                                                  <h2 class="fw-bold fs-24 text-center">Reset Password</h2>
                                                  <p class="text-muted text-center mb-4">Enter your email and new password to reset your password.</p>

                                                  @if(session('success'))
                                                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                       <strong>Success!</strong> {{ session('success') }}
                                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                                  @endif

                                                  @if(session('error'))
                                                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                       <strong>Error!</strong> {{ session('error') }}
                                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                                  @endif

                                                  <form action="{{ route('password.update') }}" method="post" class="authentication-form">
                                                       @csrf
                                                       <input type="hidden" name="token" value="{{ $token }}"> 
                                                       
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-email">Email Address</label>
                                                            <input type="email" id="example-email" name="email" class="form-control" placeholder="Enter your email" required>
                                                       </div>
                                                       
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-password">New Password</label>
                                                            <input type="password" id="example-password" name="password" class="form-control" placeholder="Enter new password" required>
                                                       </div>
                                                       
                                                       <div class="mb-3">
                                                            <label class="form-label" for="example-password-confirm">Confirm Password</label>
                                                            <input type="password" id="example-password-confirm" name="password_confirmation" class="form-control" placeholder="Confirm new password" required>
                                                       </div>
                                                       
                                                       <br>
                                                       <div class="mb-1 text-center d-grid">
                                                            <button class="btn btn-soft-primary" type="submit">Reset Password</button>
                                                       </div>
                                                       <br>
                                                       <p class="text-muted text-center">Remember your password? <a href="{{ route('login') }}" class="text-dark fw-bold ms-1">Sign In</a></p>
                                                  </form>
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

</html>