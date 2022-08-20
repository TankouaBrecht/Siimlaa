<footer class="main">
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-about font-md mb-md-5 mb-lg-0">
                            <div class="logo logo-width-1 wow fadeIn animated">
                                <a href="{{ url('/') }}"><img src="{{ asset('frontend/assets/logo.png') }}" alt="Simla"></a>
                    
                            </div>
                            <h5 class="mt-20 mb-10 fw-600 text-grey-4 wow fadeIn animated">Contact</h5>
                            <p class="wow fadeIn animated">
                                <strong>Addresse: </strong>7741 Rue Dufresne Lasalle
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Contact: </strong>438 995 4284
                            </p>
                            <p class="wow fadeIn animated">
                                <strong>Code Postal: </strong>H8N 1V7
                            </p>
                            <h5 class="mb-10 mt-30 fw-600 text-grey-4 wow fadeIn animated">Follow Us</h5>
                            <div class="mobile-social-icon wow fadeIn animated mb-sm-5 mb-md-0">
                                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter.svg') }}" alt=""></a>
                                <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <h5 class="widget-title wow fadeIn animated">About</h5>
                        <ul class="footer-list wow fadeIn animated mb-sm-5 mb-md-0">
                            <li><a href="{{ url('/about') }}">About Us</a></li>
                            <li><a href="">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                            <li><a href="#">Support Center</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2  col-md-3">
                        <h5 class="widget-title wow fadeIn animated">My Account</h5>
                        <ul class="footer-list wow fadeIn animated">
                            <li><a href="{{ url('/login') }}">Sign In</a></li>
                            <li><a href="{{ url('/shop-cart') }}">View Cart</a></li>
                            <li><a href="{{ url('/shop-wishlist') }}">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Order</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4">
                        <h5 class="widget-title wow fadeIn animated">Secured Payment Gateways</h5>
                        <div class="row">
                            <div class="col-md-4 col-lg-12 mt-md-3 mt-lg-0">
                                <p class="mb-20 wow fadeIn animated"></p>
                                <img class="wow fadeIn animated" style="width:50%;" src="{{ asset('frontend/assets/imgs/theme/payment-methods.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-20 wow fadeIn animated">
            <div class="row">
                <div class="col-12 mb-20">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-lg-6">
                    <p class="float-md-left font-sm text-muted mb-0">&copy; 2021, <strong class="text-brand">Simla</strong> - Ecommerce Store </p>
                </div>
                <div class="col-lg-6">
                    <p class="text-lg-end text-start font-sm text-muted mb-0">
                        Designed by <a href="http://alithemes.com/" target="_blank">Alliance Digital</a>. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>