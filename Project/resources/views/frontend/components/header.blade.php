<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<header class="header-area header-style-1 header-height-2">
        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                  
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li><div id='google_translate_element'></div></li>
                                <li><i class="fi-rs-marker"></i><a  href="page-contact.html">Canada</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <!-- <li>Get great devices up to 50% off <a href="shop-grid-right.html">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="shop-grid-right.html">Shop now</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                            <ul>
                                <!-- Select Language -->
                                <li>
                                
                                </li>
                                <!-- Login/Register -->
                                @if(Auth::check())
                                <li><i class="fi-rs-user" style="font-size: 20px;"></i></li>
                                @else
                                <li><i class="fi-rs-user"></i><a href="{{ url('/login') }}">Se connceter / S'inscrire</a></li>
                                @endif
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ url('/') }}"><img src="{{ asset('frontend/assets/logo.png') }}" alt="Simla" style="height:50px;width:200px;"></a>
                    </div>
                    <div class="header-right">
                        <!-- Header Search Category Group -->
                        <div class="search-style-2">
                            <form method="GET" action="{{ route('product.search') }}">
                                @csrf
                                <select class="select-active">
                                    <option>Catégories </option>
                                    @php
                                    $categories = App\Models\Category::orderBy('category_name_fr','ASC')->get();
                                    @endphp
                                    @foreach($categories as $category)
                                        <option><a href="{{ url('product/categories/'.$category->id.'/'.$category->category_slug_fr) }}"><i class="{{$category->category_icon}}"></i>{{$category->category_name_fr}} </a></option>
                                    @endforeach
                                </select>

                                <input type="text" name="search" id="search" placeholder="Rechercher un prouduit...">

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Nav Section  -->
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="assets/imgs/theme/logo.svg" alt="Simla"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Parcourir les catégories
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul>
                                @php
                                $categories = App\Models\Category::orderBy('category_name_fr','ASC')->get();
                                @endphp
                                @foreach($categories as $category)
                                    <li class="has-children">
                                        <a href="{{ url('product/categories/'.$category->id.'/'.$category->category_slug_fr) }}"><i class="{{$category->category_icon}}"></i>{{$category->category_name_fr}}</a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex justify-content-between" >
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li><span class="submenu-title">Elements</span></li>
                                                                @php
                                                                $subcategories = App\Models\Subcategory::where('category_id',$category->id)->orderBy('subcategory_name_fr','DESC')->limit(3)->get();
                                                                @endphp
                                                                @foreach($subcategories as $subcategory)
                                                                <li><a class="dropdown-item nav-link nav_item" href="{{ url('product/subcategories/'.$subcategory->id.'/'.$subcategory->subcategory_slug_fr) }}"> {{$subcategory->subcategory_name_fr}} </a></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        <!--  -->
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li>
                                        <a class="active" href="{{ url('/') }}"> Page d'acceuil </i></a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/about') }}"> A propos </a>
                                    </li>
                                    <li>
                                        <a href="blog-category-grid.html">Services</i></a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <p><i class="fi-rs-headset"></i><span>Contact</span> 438 995 4284 </p>
                    </div>
                    <div class="header-action-right whislst">
                            <div class="header-action-2">
                                <!-- Wishlist -->
                                <div class="header-action-icon-2">
                                    <a href="{{ route('user.wishlist') }}">
                                        <img class="svgInject" alt="Simla" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}">
                                        <span class="pro-count blue" id="Wishlistcount">0</span>
                                    </a>
                                </div>
                                <!-- Cart -->
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ url('/shop-cart') }}">
                                        <img alt="Simla" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}">
                                        <span class="pro-count blue" id="CartQty">0</span>
                                    </a>
                                    <!-- Cart Sidebar -->
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul id="minicart">

                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total  <span>$<span id="CartSubTotal"></span></span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('shop_cart') }}" class="outline">Voir</a>
                                                <a href="{{ route('checkout') }}">Proceder a l'achat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <p class="mobile-promotion">Bienvenue sur la boutique <span class="text-brand">SIIMLAA</span>. </p>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="{{ route('user.wishlist') }}">
                                    <img alt="" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}">
                                    <span class="pro-count white" id="mblWishlistcount"></span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}">
                                    <span class="pro-count white" id="mblCartQty"></span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                  <ul id="minicart">

                                  </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$<span id="CartSubTotal"></span></span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-action-icon-2 d-block d-lg-none">
                                <div class="burger-icon burger-icon-white">
                                    <span class="burger-icon-top"></span>
                                    <span class="burger-icon-mid"></span>
                                    <span class="burger-icon-bottom"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Mobile Section  -->
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html">Siimlaa</a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" name="search" id="search" placeholder="Rechercher un produit…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Parcourir les catégories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                            @php
                                $categories = App\Models\Category::orderBy('category_name_fr','ASC')->get();
                                @endphp
                                @foreach($categories as $category)
                                <li><a href="{{ url('product/categories/'.$category->id.'/'.$category->category_slug_fr) }}"><i class="{{$category->category_icon}}"></i>@if(session()->get('language') == 'english'){{$category->category_name_fr}} @else {{$category->category_name_fr}} @endif</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children">
                                <span class="menu-expand"></span><a href="{{ url('/') }}"> Page d'acceuil </a>
                            </li>
                            <li class="menu-item-has-children">
                                <span class="menu-expand"></span><a href="{{ url('/about') }}">A propos</a>
                            </li>
                            <li class="menu-item-has-children">
                                <span class="menu-expand"></span><a href="blog-category-fullwidth.html">Services</a>
                            </li>
                            <li class="menu-item-has-children">
                                <span class="menu-expand"></span><a href="{{ url('/contact') }}">Contact</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a  href="page-contact.html"> Canada </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login-register.html">Se connecter / S'inscrire' </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">819 805 2343 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Nous suivre</h5>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>

<script>

    const site_url = "http://127.0.0.1:8000/";

    $("body").on("keyup", "#search", function(){

        let text = $("#search").val();
        console.log(text);

        if (text.length > 0){

            $.ajax({
                data: {search: text},
                url : site_url + "search-product", 
                method : 'POST',
                beforSend : function(request){
                    return request.setReuestHeader('X-CSRF-Token',("meta[name='csrf-token']"))
                },
                success:function(result){

                    $("#searchProducts").html(result);

                }

            }); // end ajax 

        }

        if (text.length < 1 ) $("#searchProducts").html("");

    }); // end one 

</script>