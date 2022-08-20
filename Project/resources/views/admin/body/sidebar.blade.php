@php
  $prefix = Request::route()->getPrefix();
  $route = Route::current()->getName();
@endphp

<aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.html" class="brand-wrap">
                    <img src="{{ asset('frontend/assets/logo.png') }}" class="logo" width="100px" height="35px">
                </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i> </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">
                <li class="menu-item {{ ($prefix == '/admin') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('admin.dashboard.home') }}"> <i class="icon material-icons md-home"></i>
                        <span class="text">Tableau de bord</span>
                    </a>
                </li>
                <li class="menu-item {{ ($prefix == '/brand') ? 'active' : '' }}">
                    <a class="menu-link" href="{{route('all.brand')}}"> <i class="icon material-icons md-stars"></i>
                        <span class="text">Marques</span> </a>
                </li>
                <li class="menu-item has-submenu {{ ($prefix == '/category') ? 'active' : '' }}">
                    <a class="menu-link" href="page-sellers-cards.html"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text">Categories</span>
                    </a>
                    <div class="submenu">
                    <a href="{{route('all.category')}}"><i class="ti-more"></i>Toutes les categories</a>
                    <a href="{{route('all.subcategory')}}"><i class="ti-more"></i>Toutes les sous-categories</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link {{ ($prefix == '/slider') ? 'active' : '' }}" href=""> <i class="icon material-icons md-star"></i>
                        <span class="text">Sliders</span>
                    </a>
                    <div class="submenu">
                        <a href="{{route('principal.slider.view')}}">Tous les sliders</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ ($prefix == '/product') ? 'active' : '' }}">
                    <a class="menu-link" href="page-products-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Products</span>
                    </a>
                    <div class="submenu">
                       <a href="{{route('add.product.view')}}">Ajouter un produit</a>
                       <a href="{{route('view.all.products')}}">Voir tous les produits</a>
                    </div>
                </li>
                <li class="menu-item has-submenu {{ ($prefix == '/service') ? 'active' : '' }}">
                    <a class="menu-link" href="page-services-list.html"> <i class="icon material-icons md-shopping_bag"></i>
                        <span class="text">services</span>
                    </a>
                    <div class="submenu">
                       <a href="{{route('add.service.view')}}">Ajouter un servicet</a>
                       <a href="{{route('view.all.services')}}">Voir tous les services</a>
                    </div>
                </li>
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-person"></i>
                        <span class="text">Account</span>
                    </a>
                    <div class="submenu">
                        <a href="page-account-login.html">User login</a>
                        <a href="page-account-register.html">User registration</a>
                        <a href="page-error-404.html">Error 404</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-reviews.html"> <i class="icon material-icons md-comment"></i>
                        <span class="text">Reviews</span>
                    </a>
                </li>

                <li class="menu-item">
                    <a class="menu-link" disabled href="#"> <i class="icon material-icons md-pie_chart"></i>
                        <span class="text">Statistics</span>
                    </a>
                </li>
            </ul>
            <hr>
            <ul class="menu-aside">
                <li class="menu-item has-submenu">
                    <a class="menu-link" href="#"> <i class="icon material-icons md-settings"></i>
                        <span class="text">Settings</span>
                    </a>
                    <div class="submenu">
                        <a href="page-settings-1.html">Setting sample 1</a>
                        <a href="page-settings-2.html">Setting sample 2</a>
                    </div>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="page-blank.html"> <i class="icon material-icons md-local_offer"></i>
                        <span class="text"> Starter page </span>
                    </a>
                </li>
            </ul>
            <br>
            <br>
        </nav>
    </aside>