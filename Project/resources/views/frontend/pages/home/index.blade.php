@extends('frontend.main_master')

<!-- Index Home Page -->
@section('content')

<!-- Title of this page -->
@section('title')
SIIMLAA - Store
@endsection

<!-- Slider Section -->
<section class="home-slider position-relative pt-50">
    <div class="hero-slider-1 dot-style-1 dot-style-1-position-1">
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-6 col-md-6">
                        <div class="hero-slider-content-2">
                            <h4 class="animated">SIIMLAA Service</h4>
                            <h2 class="animated fw-900">Coiffure a domicile</h2>
                            <p class="">Consulter la liste des nos coiffures & passer commande a des prix abordables</p>
                            <!-- <p class="animated">Save more with coupons & up to 70% off</p> -->
                            <a class="animated btn btn-brush btn-brush-3" href="shop-product-right.html"> Visiter </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6" style="margin-top: -25px !important;">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated slider-1-1" src="{{ asset('frontend/assets/imgs/slider/slider-30.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-hero-slider single-animation-wrap">
            <div class="container">
                <div class="row align-items-center slider-animated-1">
                    <div class="col-lg-6 col-md-6">
                        <div class="hero-slider-content-2">
                            <h4 class="animated">SIIMLAA Accessoires</h4>
                            <h2 class="animated fw-900">Large choix de Pérruque</h2>
                            <p class="">Consulter la liste des nos pérruques & passer commande a des prix abordables</p>
                            <!-- <p class="animated">Save more with coupons & up to 70% off</p> -->
                            <a class="animated btn btn-brush btn-brush-3" href="shop-product-right.html"> Visiter </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6" style="margin-top: -25px !important;">
                        <div class="single-slider-img single-slider-img-1">
                            <img class="animated slider-1-1" src="{{ asset('frontend/assets/imgs/slider/slider-31.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="slider-arrow hero-slider-1-arrow"></div>
</section>

<!-- Slider Section -->
<section class="featured section-padding position-relative">            
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-1.png') }}" alt="">
                    <h4 class="bg-1">Livraison Gratuite</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-2.png') }}" alt="">
                    <h4 class="bg-3">Commande</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-3.png') }}" alt="">
                    <h4 class="bg-2">Prix Abordable</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-4.png') }}" alt="">
                    <h4 class="bg-4">Promotions</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-5.png') }}" alt="">
                    <h4 class="bg-5">Achat Securiséé</h4>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-6.png') }}" alt="">
                    <h4 class="bg-6">24/7 Support</h4>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-bg wow fadeIn animated" style="background-image: url('frontend/assets/imgs/banner/banner-8.jpg')">
                    <div class="banner-content">
                        <h5 class="text-grey-4 mb-15" style="font-size: 20px;">Bienvenue</h5>
                        <p style="width: 78%;">SIIMLAA  est une boutique en ligne de vente de perruques et d'accessoires de beaué, nous sommes specialises dan la vente: perruques, des accessoires pour perruques.
                            Nous offrons aussi des services de coiffure a domicile a des prix tres abordables
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product-tabs section-padding position-relative wow fadeIn animated">
    <div class="bg-square"></div>
    <div class="container">
        <div class="tab-header">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="nav-tab-three" data-bs-toggle="tab" data-bs-target="#tab-three" type="button" role="tab" aria-controls="tab-three" aria-selected="false">Nos produits</button>
                </li>
            </ul>
            <a href="#" class="view-more d-none d-md-flex">Voir plus<i class="fi-rs-angle-double-small-right"></i></a>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content wow fadeIn animated" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                @php
                      $simlaproducts = App\Models\Product::latest()->where('status', 1)->limit(16)->get();
                    @endphp
                    @foreach($simlaproducts as $product)
                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_fr) }}">
                                        <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="">
                                        <img class="hover-img" src="{{ asset($product->product_thambnail) }}" alt="">
                                    </a>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up" href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_fr) }}"><i class="fi-rs-eye"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" id="{{$product->id}}" onclick="addToWishlist(this.id)"><i class="fi-rs-heart"></i></a>
                                </div>
                                @php
                                $amount= $product->selling_price - $product->discount_price;
                                $discount = ($amount/$product->selling_price) *100;
                                @endphp
                                @if($product->discount_price == null)
                                
                                @else
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">-{{ round($discount) }}%</span>
                                </div>
                                @endif
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $product->category->category_name_fr }} </a>
                                </div>
                                <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_fr) }}">SIIMLAA | {{ $product->product_name_fr }}</a></h2>

                                @if($product->discount_price == null)
                                <div class="rating-result" title="{{ round($discount) }}%">
                                    <span>
                                        <span></span>
                                    </span>
                                </div>
                                @else
                                <div class="rating-result" title="{{ round($discount) }}%">
                                    <span>
                                        <span>-{{ round($discount) }}%</span>
                                    </span>
                                </div>
                                @endif
                                @if($product->discount_price == null)
                                
                                <div class="product-price">
                                    <span>${{ $product->selling_price }} </span>
                                </div>
                                @else
                                <div class="product-price">
                                    <span>${{ $product->discount_price }} </span>
                                    <span class="old-price">${{ $product->selling_price }}</span>
                                </div>
                                @endif
                                <div class="product-action-1 show">
                                    <a aria-label="Add To Cart" class="action-btn hover-up" data-bs-toggle="modal"  data-bs-target="#quickViewModal" id="{{$product->id}}" onclick="productView(this.id)" data-placement="top" title="Add to cart"><i class="fi-rs-shopping-bag-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!--End product-grid-4-->
            </div>
        </div>
        <!--End tab-content-->
    </div>
</section>
<section class="banners mb-15">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow fadeIn animated">
                    <img src="{{ asset('frontend/assets/imgs/banner/banner-2.png') }}" alt="">
                    <div class="banner-text">
                        <span style="color:black;">Offre Speciale</span><br>
                        <h4>Foulard</h4>
                        <a href="">Commander<i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img wow fadeIn animated">
                    <img src="{{ asset('frontend/assets/imgs/banner/banner-1.png') }}" alt="">
                    <div class="banner-text">
                        <span style="color:black;">Offre Speciale</span><br>
                        <h4>Bandeaux</h4>
                        <a href="">Commander<i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img wow fadeIn animated  mb-sm-0">
                    <img src="{{ asset('frontend/assets/imgs/banner/banner-3.png') }}" alt="">
                    <div class="banner-text">
                        <span style="color:black;">Offre Speciale</span><br>
                        <h4>Bandeaux</h4>
                        <a href="shop-grid-right.html">Commander<i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding">
            <div class="container pt-25 pb-20">
            <h3 class="section-title mb-20"><span>Nos</span> Coiffures</h3>
                <div class="row">
                    @php
                      $simlaservices = App\Models\Service::latest()->where('status', 1)->limit(8)->get();
                    @endphp
                    @foreach($simlaservices as $service)
                    <div class="col-lg-6">
                        <div class="post-list mb-4 mb-lg-0">
                            <article class="wow fadeIn animated">
                                <div class="d-md-flex d-block">
                                    <div class="post-thumb d-flex mr-15">
                                        <a class="color-white" href="{{ url('service/details/'.$service->id.'/'.$service->service_slug_fr) }}">
                                            <img src="{{ asset($service->service_thambnail) }}" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h4 class="post-title mb-10 text-limit-2-row">
                                            <a href="{{ url('service/details/'.$service->id.'/'.$service->service_slug_fr) }}"><h1 style="font-size: 23px;">{{$service->service_name_fr}}</h1></a>
                                        </h4>
                                        <p>{{$service->service_name_fr}} disponible a moindre cout, passer commande</p>
                                        <p class="post-on">Prix : <strong>{{$service->selling_price}}</strong>$</p>  

                                            <div style="display: flex;justify-content:space-between;width:100%;align-items:center;">
                                                <p class="hit-count has-dot" style="background-color: orangered;padding:5px;border-radius:5px;color:white;font-size:13px;cursor:pointer;" id="{{$service->id}}" onclick="addToCommandservice(this.id)">Passer Commander</p>
                                                <a href="{{ url('service/details/'.$service->id.'/'.$service->service_slug_fr) }}">Voir Plus</a>
                                            </div>
                                            
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
</section>
<!--Popular Category-->
<section class="popular-categories section-padding mt-15 mb-25">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>Nos</span> Categories</h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows"></div>
            <div class="carausel-6-columns" id="carausel-6-columns">
            @php
                $categories = App\Models\Category::orderBy('category_name_fr','ASC')->get();
            @endphp
            @foreach($categories as $category)
                <div class="card-1">
                    <figure class=" img-hover-scale overflow-hidden">
                        <a href="{{ url('product/categories/'.$category->id.'/'.$category->category_slug_fr) }}"><img src="{{$category->category_image}}" alt=""></a>
                    </figure>
                    <h5><a href="{{ url('product/categories/'.$category->id.'/'.$category->category_slug_fr) }}">{{$category->category_name_fr}}</a></h5>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section-padding">
    <div class="container wow fadeIn animated">
        <h3 class="section-title mb-20"><span>Nouveautés</span></h3>
        <div class="carausel-6-columns-cover position-relative">
            <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows"></div>
            <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                <!--End product-cart-wrap-2-->
                @foreach($simlaproducts as $product)
                <div class="product-cart-wrap small hover-up">
                    <div class="product-img-action-wrap">
                        <div class="product-img product-img-zoom">
                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_fr) }}">
                                <img class="default-img" src="{{ asset($product->product_thambnail) }}" alt="">
                                <img class="hover-img" src="{{ asset($product->product_thambnail) }}" alt="">
                            </a>
                        </div>
                        <div class="product-action-1">
                            <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                         <i class="fi-rs-eye"></i></a>
                            <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="shop-wishlist.html" tabindex="0"><i class="fi-rs-heart"></i></a>
                            <a aria-label="Compare" class="action-btn small hover-up" href="shop-compare.html" tabindex="0"><i class="fi-rs-shuffle"></i></a>
                        </div>
                        <div class="product-badges product-badges-position product-badges-mrg">
                            <span class="new">New</span>
                        </div>
                    </div>
                    <div class="product-content-wrap">
                        <h2><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_fr) }}">{{ $product->product_name_fr }}</a></h2>
                               @if($product->discount_price == null)  
                               <div class="rating-result" title="{{ round($discount) }}%">
                                    <span>
                                        <span>-{{ round($discount) }}%</span>
                                    </span>
                                </div>     
                                @else
                                <div class="rating-result" title="{{ round($discount) }}%">
                                    <span>
                                        <span>-{{ round($discount) }}%</span>
                                    </span>
                                </div>
                                @endif
                                @if($product->discount_price == null)
                                
                                <div class="product-price">
                                    <span>${{ $product->selling_price }} </span>
                                </div>
                                @else
                                <div class="product-price">
                                    <span>${{ $product->discount_price }} </span>
                                    <span class="old-price">${{ $product->selling_price }}</span>
                                </div>
                                @endif
                    </div>
                </div>
                @endforeach
        </div>
    </div>
</section>

<!--Top Deals Section-->
<section class="mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner-bg wow fadeIn animated" style="background-image: url('{{ asset('frontend/assets/imgs/banner/banner-8.jpg') }}')">
                    <div class="banner-content">
                        <h5 class="text-grey-4 mb-15">SIIMLAA</h5>
                        <h2 class="fw-600">Notre objectif est de vous satisfaire </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="featured section-padding position-relative">            
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-1.png') }}" alt=""><br>
                    <h4 class="bg-1 text-center">Livraison et suivi</h4><br>
                    <p style="margin-top: 15px;">Votre commande sera livrée gratuitement a votre domicile entre 1 et 10 jours</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-2.png') }}" alt=""><br>
                    <h4 class="bg-3">Achat & paiement securisé</h4><br>
                    <p style="margin-top: 15px;">Nous avons choisi de confier la gestion des paiements en ligne a <strong>Stripe & Paypal</strong> grace a leur service 100% securisée</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-md-3 mb-lg-0">
                <div class="banner-features wow fadeIn animated hover-up">
                <img src="{{ asset('frontend/assets/imgs/theme/icons/feature-6.png') }}" alt=""><br>
                    <h4 class="bg-1 text-center">Support 24H/24</h4><br>
                    <p style="margin-top: 15px;">Pour tout souci veuillez nous contacter au numero suivant <strong>438 995 4284</strong></p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="mb-45">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                <div class="banner-img wow fadeIn animated mb-md-4 mb-lg-0">
                    <img src="{{ asset('frontend/assets/imgs/banner/banner-10.jpg') }}" alt="">
                    <div class="banner-text">
                        <span>Shoes Zone</span>
                        <h4>Save 17% on <br>All Items</h4>
                        <a href="shop-grid-right.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-sm-5 mb-md-0">
                <h4 class="section-title style-1 mb-30 wow fadeIn animated">Top Selling</h4>
                <div class="product-list-small wow fadeIn animated">
                    <article class="row align-items-center">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-6.jpg') }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="title-small">
                                <a href="shop-product-right.html">Geometric Printed Long Sleeve Blosue</a>
                            </h4>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </article>
                    <article class="row align-items-center">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-7.jpg') }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="title-small">
                                <a href="shop-product-right.html">Print Patchwork Maxi Dress</a>
                            </h4>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </article>
                    <article class="row align-items-center">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-8.jpg') }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="title-small">
                                <a href="shop-product-right.html">Daisy Floral Print Straps Jumpsuit</a>
                            </h4>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="section-title style-1 mb-30 wow fadeIn animated">Hot Releases</h4>
                <div class="product-list-small wow fadeIn animated">
                    <article class="row align-items-center">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-9.jpg') }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="title-small">
                                <a href="shop-product-right.html">Floral Print Casual Cotton Dress</a>
                            </h4>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </article>
                    <article class="row align-items-center">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-1.jpg') }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="title-small">
                                <a href="shop-product-right.html">Ruffled Solid Long Sleeve Blouse</a>
                            </h4>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </article>
                    <article class="row align-items-center">
                        <figure class="col-md-4 mb-0">
                            <a href="shop-product-right.html"><img src="{{ asset('frontend/assets/imgs/shop/thumbnail-2.jpg') }}" alt=""></a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h4 class="title-small">
                                <a href="shop-product-right.html">Multi-color Print V-neck T-Shirt</a>
                            </h4>
                            <div class="product-price">
                                <span>$238.85 </span>
                                <span class="old-price">$245.8</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section> -->


@endsection