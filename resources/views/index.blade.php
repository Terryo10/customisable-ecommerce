@extends('layouts.whole')
@section('content')

<!-- START SLIDER SECTION -->
<div class="home-slider-section section">
    <!-- Home Slider -->
    <div id="home-slider" class="slides">
        <img src="template/outside/img/slider/1.jpg" alt="" title="#slider-caption-1" />
        <img src="template/outside/img/slider/2.jpg" alt="" title="#slider-caption-2" />
    </div>
    <!-- Caption 1 -->
    <div id="slider-caption-1" class="nivo-html-caption">
        <div class="container">
            <div class="row">
                <div class="hero-slider-content col-sm-8 col-xs-12">
                    <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Awesome Dsr Chair</h1>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">There are many variations of
                        passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                        injected humour, </p>
                    <a href="#shop" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">View Shop</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Caption 2 -->
    <div id="slider-caption-2" class="nivo-html-caption">
        <div class="container">
            <div class="row">
                <div class="hero-slider-content col-sm-8 col-xs-12">
                    <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Arc Floor Lamp</h1>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">There are many variations of
                        passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by
                        injected humour, </p>
                    <a href="#shop" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">View Shop</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SLIDER SECTION -->

<!-- PRODUCT SECTION START -->
<div class="product-section section pt-120 pb-120">
    <div class="container">

        <div class="row justify-content-between">
            <!-- Isotop Product Filter -->
            <div class="isotope-product-filter col-auto">
                <button class="active" data-filter="*">all</button>
            </div>

        </div>

        <div class="isotope-grid row">
            @foreach ($products as $product)

            <!-- Product Item Start -->
            <div class="isotope-item chair home-decor col-xl-3 col-lg-4 col-md-6 col-12 mb-50">
                <div class="product-item text-center">
                    <!-- Product Image -->
                    <div class="product-img">
                        <!-- Image -->
                        <a class="image" href="#"><img src={{$product->feature_image ??
                            "template/outside/img/product/1.jpg"}} alt=""/></a>
                        <!-- Wishlist Button -->
                        <a class="wishlist" href="#" title="Wishlist"><i class="pe-7s-like"></i></a>
                        <!-- Action Button -->
                        <div class="action-btn fix">
                            <!-- <a href="#" data-bs-toggle="modal"  data-bs-target="#" title="Quick View"></a> -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i
                                    class="pe-7s-look"></i>Quick view</a>
                            <a href="#" title="Add to Cart"><i class="pe-7s-cart"></i>Add To Cart</a>
                        </div>
                    </div>
                    <!-- Portfolio Info -->
                    <div class="product-info text-left">
                        <!-- Title -->
                        <h5 class="title"><a href="product-details.html">{{ $product->name ?? "" }}</a></h5>
                        <!-- Price Ratting -->
                        <div class="price-ratting fix">
                            <span class="price float-start"><span class="new">${{ $product->price }}</span></span>
                            <span class="ratting float-end">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product Item End -->
            @endforeach

        </div>

        <div class="row">
            <div class="text-center col-12 mt-30">
                <a href="#" class="btn load-more-product">Add Pagination Here</a>
            </div>
        </div>

    </div>
</div>
<!-- PRODUCT SECTION END -->

@endsection