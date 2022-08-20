@extends('frontend.main_master')

@section('content')

@section('title')
MarketPlace | Account
@endsection


<!--=====================================
Breadcrumb
======================================-->  

<div class="ps-breadcrumb">

    <div class="container">

        <ul class="breadcrumb">

            <li><a href="index.html">Home</a></li>

            <li>My Account</li>

        </ul>

    </div>

</div>

<!--=====================================
Login - Register Content
======================================--> 

<div class="ps-my-account">

    <div class="container">

        <div class="ps-form--account ps-tab-root">

            <ul class="ps-tab-list">

                <li class="active"><a href="#sign-in">Login</a></li>

                <li class=""><a href="#register">Register</a></li>

            </ul>

            <div class="ps-tabs">

                <!--=====================================
                Login Form
                ======================================--> 

                <div class="ps-tab active" id="sign-in">

                    <div class="ps-form__content">

                        <h5>Log In Your Account</h5>

                        <form action="{{ route('user.check') }}" method="POST">

                            @csrf

                            <div class="form-group">

                                <input class="form-control" type="text" name="email" placeholder="Username or email address">

                                @error('email')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group form-forgot">

                                <input class="form-control" type="password" name="password" placeholder="Password">

                                @error('password')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                                <a href="">Forgot?</a>

                            </div>

                            <div class="form-group">

                                <div class="ps-checkbox">

                                    <input class="form-control" type="checkbox" id="remember-me" name="remember-me">

                                    <label for="remember-me">Remember me</label>

                                </div>

                            </div>

                            <div class="form-group ">

                                <button type="submit" class="ps-btn ps-btn--fullwidth">Login</button>

                            </div>  
                        
                        </form>

                    </div>

                    <div class="ps-form__footer">

                        <p>Connect with:</p>

                        <ul class="ps-list--social">

                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="google" href="#"><i class="fab fa-google"></i></a></li>

                        </ul>

                    </div>

                </div><!-- End Login Form -->

                <!--=====================================
                Register Form
                ======================================--> 

                <div class="ps-tab" id="register">

                    <div class="ps-form__content">

                        <h5>Register An Account</h5>

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

                                @error('email')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group">

                                <input class="form-control" type="text" name="phone" placeholder="Phone number">

                            </div>

                            <div class="form-group">

                                <input class="form-control" type="password" name="password" placeholder="Password">

                                @error('password')
                                    <span class="text text-danger" style="font-size: 14px">{{ $message }}</span>
                                @enderror

                            </div>

                            <div class="form-group submtit">

                                <button type="submit" class="ps-btn ps-btn--fullwidth">Register</button>

                            </div>

                        </form>

                    </div>

                    <div class="ps-form__footer">

                        <p>Connect with:</p>

                        <ul class="ps-list--social">

                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="google" href="#"><i class="fab fa-google"></i></a></li>

                        </ul>

                    </div>

                </div><!-- End Register Form -->

            </div>

        </div>

    </div>

</div>

@endsection

