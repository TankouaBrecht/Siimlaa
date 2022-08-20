@extends('frontend.main_master')

@section('content')

@section('title')
Login-Register
@endsection


<!--=====================================
Login - Register Content
======================================--> 

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Pages
            <span></span> Login / Register
        </div>
    </div>
</div>
<section class="pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-10 mb-md-5 mb-lg-0 mb-sm-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3 class="mb-30">Login</h3>
                                </div>
                                <form action="{{ route('user.check') }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" required="" name="email" placeholder="Your Email">
                                        @error('email')
                                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input required="" type="password" name="password" placeholder="Password">
                                        @error('password')
                                            <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                                <label class="form-check-label" for="exampleCheckbox1"><span>Remember me</span></label>
                                            </div>
                                        </div>
                                        <a class="text-muted" href="#">Forgot password?</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Log in</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-6">
                        <div class="login_wrap widget-taber-content p-30 background-white border-radius-5">
                            <div class="padding_eight_all bg-white">
                                <div class="heading_s1">
                                    <h3 class="mb-30">Create an Account</h3>
                                </div>
                                <p class="mb-50 font-sm">
                                    Your personal data will be used to support your experience throughout this website
                                </p>
                                <form action="{{ route('user.create') }}" method="POST">
                                @csrf
                                <div class="form-group">

                                    <input class="form-control" type="text" name="firstname" placeholder="First name">

                                    @error('firstname')
                                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                    @enderror

                                    </div>

                                    <div class="form-group">

                                    <input class="form-control" type="text" name="lastname" placeholder="Last name">

                                    @error('lastname')
                                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                    @enderror

                                    </div>

                                    <div class="form-group">

                                    <input class="form-control" type="text" name="username" placeholder="User name">

                                    @error('username')
                                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                    @enderror

                                    </div>

                                    <div class="form-group">

                                    <input class="form-control" type="email" name="email" placeholder="Email address">

                                    {{-- @error('email')
                                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                    @enderror --}}

                                    </div>

                                    <div class="form-group">

                                    <input class="form-control" type="text" name="phone" placeholder="Phone number">

                                    </div>

                                    <div class="form-group">

                                    <input class="form-control" type="password" name="password" placeholder="Password">

                                    {{-- @error('password')
                                        <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                    @enderror --}}

                                    </div>
                                    <div class="login_footer form-group">
                                        <div class="chek-form">
                                            <div class="custome-checkbox">
                                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox12" value="">
                                                <label class="form-check-label" for="exampleCheckbox12"><span>I agree to terms &amp; Policy.</span></label>
                                            </div>
                                        </div>
                                        <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Lean more</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-fill-out btn-block hover-up" name="login">Submit &amp; Register</button>
                                    </div>
                                </form>
                                <div class="divider-text-center mt-15 mb-15">
                                    <span> or</span>
                                </div>
                                <ul class="btn-login list_none text-center mb-15">
                                    <li><a href="#" class="btn btn-facebook hover-up mb-lg-0 mb-sm-4">Login With Facebook</a></li>
                                    <li><a href="#" class="btn btn-google hover-up">Login With Google</a></li>
                                </ul>
                                <div class="text-muted text-center">Already have an account? <a href="#">Sign in now</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

