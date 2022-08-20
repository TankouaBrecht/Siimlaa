<!DOCTYPE HTML>
<html lang="en">


<!-- Mirrored from wp.alithemes.com/html/evara/evara-backend/page-account-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 01 Aug 2021 15:33:33 GMT -->
<head>
    <meta charset="utf-8">
    <title>Simla - Login</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/imgs/theme/SIMLA.jpeg') }}">
    <!-- Template CSS -->
    <link href="{{ asset('backend/assets/css/main.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <main>
        <header class="main-header style-2 navbar">
            <div class="col-brand">
                <a href="index.html" class="brand-wrap">
                    <img src="{{ asset('backend/assets/imgs/theme/SIMLA.jpeg') }}" class="logo" width="65px">
                </a>
            </div>

        </header>
        <section class="content-main mt-80 mb-80">
            <div class="card mx-auto card-login">
                <div class="card-body">
                    <h4 class="card-title mb-4">Sign in</h4>
                    <form action="{{ route('admin.check') }}" method="POST">
                      @if(session('fail'))
                          <div class="alert alert-danger">
                              {{ Session('fail') }}
                          </div>   
                      @endif    

                      @csrf
                      <div class="form-group">
                       <label class="col-form-label">Email Address</label>
                       <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                       <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                     </div>

                    <div class="form-group">
                      <label class="col-form-label">Password</label>
                      <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" required="" placeholder="*********">
                        <div class="show-hide"><span class="show">                         </span></div>
                      </div>
                      <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                        <div class="mb-3">
                            <a href="#" class="float-end font-sm text-muted">Forgot password?</a>
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" checked="">
                                <span class="form-check-label">Remember</span>
                            </label>
                        </div> <!-- form-group form-check .// -->
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary w-100"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                    <p class="text-center mb-4">Don't have account? <a href="#">Sign up</a></p>
                </div>
            </div>
        </section>
        <footer class="main-footer text-center">
            <p class="font-xs mb-30">All rights reserved</p>
        </footer>
    </main>
    <script src="{{ asset('backend/assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/vendors/jquery.fullscreen.min.js') }}"></script>
    <!-- Main Script -->
    <script src="{{ asset('backend/assets/js/main.js') }}" type="text/javascript"></script>

</body>

</html>