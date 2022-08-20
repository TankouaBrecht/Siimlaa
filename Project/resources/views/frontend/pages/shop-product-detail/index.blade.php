@extends('frontend.main_master')

@section('content')

@section('title')
Product-Detail
@endsection
<div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span><a href=""> {{ $product->category->category_name_fr }} </a></span>
                    <span> {{ $product->product_name_fr }} </span>
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-gallery">
                                        <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                        <!-- MAIN SLIDES -->
                                        <div class="product-image-slider">
                                        @php
                                         $multiImgs = App\Models\MultiImg::where('product_id',$product->id)->orderBy('id','ASC')->get();
                                        @endphp
                                        @foreach($multiImgs as $img)
                                            <figure class="border-radius-10">
                                                <img src="{{ asset($img->photo_name) }}" style="width: 100% !important;">
                                            </figure>
                                        @endforeach
                                        </div>
                                        <!-- THUMBNAILS -->
                                        <div class="slider-nav-thumbnails pl-15 pr-15">
                                           @foreach($multiImgs as $img)
                                            <div><img src="{{ asset($img->photo_name) }}" alt="product image"></div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                    <div class="social-icons single-share">
                                        <ul class="text-grey-5 d-inline-block">
                                            <li><strong class="mr-10">Visiter nos Pages:</strong></li>
                                            <li class="social-facebook"><a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook.svg') }}" alt=""></a></li>
                                            <li class="social-instagram"><a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram.svg') }}" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info">
                                        <h2 class="title-detail" id="pname">{{ $product->product_name_fr }} f</h2>
                                        <div class="product-detail-rating">
                                            <div class="pro-details-brand">
                                                <span> Brands: {{$product->brand->brand_name_fr}}</span>
                                            </div>
                                            <div class="product-rate-cover text-end">
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width:90%">
                                                    </div>
                                                </div>
                                                <span class="font-small ml-5 text-muted"> (25 reviews)</span>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                            @php
                                            $amount= $product->selling_price - $product->discount_price;
                                            $discount = ($amount/$product->selling_price) *100;
                                            @endphp
                                            @if($product->discount_price != NULL)
                                                <ins><span class="text-brand">${{ $product->discount_price }}</span></ins>
                                                <ins><span class="old-price font-md ml-15">${{$product->selling_price}}</span></ins>
                                                <span class="save-price  font-md color3 ml-15">{{ round($discount) }}% Off</span>
                                            @endif
                                            @if($product->discount_price == NULL)
                                            <ins><span class="text-brand">${{ $product->selling_price }}</span></ins>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                        <div class="short-desc mb-30">
                                             {!! $product->long_descp_fr !!} 
                                        </div>
                                        <div class="product_sort_info font-xs mb-30">
                                            <ul>
                                                <li class="mb-10"><i class="fi-rs-crown mr-5"></i> Livraison et Suivie</li>
                                                <li class="mb-10"><i class="fi-rs-refresh mr-5"></i> Satisfait ou Remboursé</li>
                                                <li><i class="fi-rs-credit-card mr-5"></i> Paiement Securisé</li>
                                            </ul>
                                        </div>
                                        @if($product->product_color_fr != null)
                                        <div class="attr-detail attr-color mb-15">
                                            <strong class="mr-10">Color</strong>
                                            <div class="form-group" id="colorArea">
                                            <label for="exampleFormControlSelect1">Choisir une couleur</label>
                                            <select id="pcolor" name="pcolor" style="width: 90%;height:30px">
                                            @foreach($product_color_fr as $color)
                                            <option value="{{$color}}">{{ucwords($color)}}</option>
                                            @endforeach
                                            </select>
                                           </div>
                                        </div>
                                        @endif
                                        @if($product->product_size_fr != null)
                                        <div class="attr-detail attr-size">
                                            <strong class="mr-10">Taille</strong>
                                            <div class="form-group" id="sizeArea">
                                            <label for="exampleFormControlSelect1">Choisir une taille</label>
                                            <select id="psize" name="psize" style="width: 90%;height:30px">
                                            @foreach($product_size_fr as $size)
                                            <option value="{{$size}}">{{ucwords($size)}}</option>
                                            @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        @endif
                                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                        <div class="detail-extralink">
                                        <div class="detail-qty border radius">                                        
                                        <input class="form-control" style="height: 22px !important;" type="text" id="qty" name="qty" value="1" min="1">
                                    </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart" onclick="addToCarts()">Ajouter au Panier</button>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                            </div>
                                        </div>
                                        <ul class="product-meta font-xs color-grey mt-50">
                                            <li class="mb-5">SKU: <a href="#">{{$product->product_code}}</a></li>
                                            <li class="mb-5">Tags: {{$product->product_tags_fr}} </li>
                                            <li>Disponibilité:<span class="in-stock text-success ml-5"> <strong class="mr-10"><span class="badge badge-pill badge-success"  style="background: green; color: white">en stock</span></strong></span></li>
                                        </ul>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="tab-style3">
                            <input type="hidden" id="product_id" value="{{ $product->id }}">
                                <ul class="nav nav-tabs text-uppercase">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Information Additionnelle</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Commentaires (3)</a>
                                    </li>
                                </ul>
                                <div class="tab-content shop_info_tab entry-main-content">
                                    <div class="tab-pane fade show active" id="Description">
                                        <div class="">
                                            {!! $product->long_descp_fr !!} 
                                            <ul class="product-more-infor mt-30">
                                                <li><span>Marque</span> SIIMLAA</li>
                                                <li><span>Couleur</span> {{ $product->product_color_fr }} </li>
                                                <li><span>Taille</span> {{ $product->product_size_fr }} </li>
                                                <li><span>Quantité</span> {{ $product->product_qty }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="Additional-info">
                                        <table class="font-md">
                                            <tbody>
                                                <tr class="stand-up">
                                                    <th>Produit</th>
                                                    <td>
                                                        <p>{{ $product->product_name_fr }}</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-wo-wheels">
                                                    <th>Couleur</th>
                                                    <td>
                                                        <p>{{ $product->product_color_fr }}</p>
                                                    </td>
                                                </tr>
                                                <tr class="folded-w-wheels">
                                                    <th>Taille</th>
                                                    <td>
                                                        <p>{{ $product->product_size_fr }}</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="Reviews">
                                        <!--Comments-->
                                        <div class="comments-area">

                                            <div class="row">

                                                @php 

                                                    $reviews = \App\Models\Review::where("product_id", $product->id)->limit(5)->get(); 

                                                @endphp

                                                <div class="col-lg-8">
                                                    <h4 class="mb-30">Customer questions & answers</h4>

                                                    <div class="comment-list">

                                                        @foreach ($reviews as $item)
                                                            
                                                            <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex">
                                                                    <div class="thumb text-center">
                                                                        <img src="{{ (!empty($item->user->profil_pic))? url('upload/users/'.$item->user->profil_pic) : url('upload/no_image.jpg') }}" alt="">
                                                                        <h6><a href="#">{{ $item["user"]["firstname"] }}</a></h6>
                                                                        <p class="font-xxs">Since {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                                                    </div>
                                                                    <div class="desc">
                                                                        <p>{{ $item->comment }}</p>
                                                                        <div class="d-flex justify-content-between">
                                                                            <div class="d-flex align-items-center">
                                                                                <p class="font-xs mr-30">{{ $item->created_at }} </p>
                                                                                {{-- <a href="#" class="text-brand btn-reply">Reply <i class="fi-rs-arrow-right"></i> </a> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @endforeach

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                        <!--comment form-->
                                        <div class="comment-form">
                                            <h4 class="mb-15">Add a review</h4>

                                            <div class="row">
                                                <div class="col-lg-8 col-md-12">
                                                    @guest
                                                        <p> <b> For Add Product Review. You Need to Login First <a href="{{ route('login') }}">Login Here</a> </b> </p>
                                                    @else
                                                        <form class="form-contact comment_form" role="form" class="cnt-form" method="post" action="{{ route('review.store') }}" id="commentForm">
                                                            @csrf 

                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" placeholder="Write Comment"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" id="addComment" idProduct="{{ $product->id }}" class="button button-contactForm">Submit
                                                                    Review</button>
                                                            </div>
                                                        </form>
                                                    @endguest

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Nos Coiffures <br><p style="font-size: 10px;">passer commande </p></h5>
                            
                            <ul class="categories">
                                <li><a href="#">Tresses Africaines</a></li>
                                <li><a href="#">Twist</a></li>
                                <li><a href="#">Box braids</a></li>
                                <li><a href="#">Jumbo Braids</a></li>
                                <li><a href="#">Beauty</a></li>
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="frontend/assets/imgs/shop/thumbnail-3.jpg" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="shop-product-detail.html">Chen Cardigan</a></h5>
                                    <p class="price mb-0 mt-5">$99.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="frontend/assets/imgs/shop/thumbnail-4.jpg" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="shop-product-detail.html">Chen Sweater</a></h6>
                                    <p class="price mb-0 mt-5">$89.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:80%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="frontend/assets/imgs/shop/thumbnail-5.jpg" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="shop-product-detail.html">Colorful Jacket</a></h6>
                                    <p class="price mb-0 mt-5">$25</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <script>

            $("body").on("click", "#addComment", function(event) {

                event.preventDefault();

                var idProduct = $(this).attr("idProduct");

                var comment = $("#comment").val();

                $.ajax({
                    type:'POST',
                    url: '/add-comment',
                    data: {idProduct: idProduct, comment: comment},
                    dataType:'json',
                    success:function(data){
        
                        // start
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                        })

                        if($.isEmptyObject(data.error)){
                            Toast.fire({
                                type: 'success',
                                icon: 'success',
                                title: data.success
                            })
                        }else{
                            Toast.fire({
                                type: 'error',
                                icon: 'error',
                                title: data.error
                            })
                        }

                    }
                })

            });

        </script> --}}

@endsection