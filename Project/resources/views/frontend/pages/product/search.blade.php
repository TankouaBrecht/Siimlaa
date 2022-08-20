
@extends('frontend.main_master')

@section('content')

@section('title')
Product-Search
@endsection

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow">Home</a>
            <span></span> Search
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="shop-product-fillter style-2">
                    <div class="totall-product">
                        <p> We found <strong class="text-brand">688</strong> items for you!</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                    <li><a href="#">Release Date</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-list mb-50">

                    @foreach ($products as $item)

                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <div class="product-img-inner">
                                        <a href="shop-product-right.html">
                                            <img class="default-img" src="assets/imgs/shop/product-2-1.jpg" alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-action-1">
                                    <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                    <i class="fi-rs-search"></i></a>
                                    <a aria-label="Add To Wishlist" class="action-btn hover-up" href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Hot</span>
                                </div>
                            </div>

                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a href="shop-grid-right.html">{{ $item->category->category_name_fr }}</a>
                                </div>
                                <h2><a href="shop-product-right.html">{{ $item->product_name_fr }}</a></h2>
                                <div class="product-price">
                                    <span>$ {{ $item->discount_price }} </span>
                                    <span class="old-price">${{ $item->selling_price }}</span>
                                </div>
                                <p class="mt-15">{{ $item->long_descp_fr }}</p>
                                <div class="product-action-1 show">
                                    <a aria-label="Buy now" class="action-btn" href="shop-cart.html"><i class="fi-rs-shopping-bag-add"></i>Add to Cart</a>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        
                    @endforeach


                </div>

                <!--pagination-->
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            {{$products->links()}}
                            {{-- <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li> --}}
                        </ul>
                    </nav>
                </div>
            </div>

            {{-- Category section  --}}
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="widget-category mb-30">
                    <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                    <ul class="categories">

                        @foreach ($categories as $item)
                            
                            <li>
                                
                                <a href="shop-grid-right.html">{{ $item->category_name_fr }}</a>
                            
                            </li>

                        @endforeach

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
                            <img src="assets/imgs/shop/thumbnail-3.jpg" alt="#">
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
                            <img src="assets/imgs/shop/thumbnail-4.jpg" alt="#">
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
                            <img src="assets/imgs/shop/thumbnail-5.jpg" alt="#">
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

@endsection