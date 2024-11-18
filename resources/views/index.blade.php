@extends('layouts.whole')
@section('content')
 
  <!-- START SLIDER SECTION -->
    <div class="home-slider-section section">
        <!-- Home Slider -->
        <div id="home-slider" class="slides">   
            <img src="template/outside/img/slider/1.jpg" alt="" title="#slider-caption-1"  />
            <img src="template/outside/img/slider/2.jpg" alt="" title="#slider-caption-2"  />
        </div>
        <!-- Caption 1 -->
        <div id="slider-caption-1" class="nivo-html-caption">
            <div class="container">
                <div class="row">
                    <div class="hero-slider-content col-sm-8 col-xs-12">
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">Awesome Dsr Chair</h1>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
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
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, </p>
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
                    <button data-filter=".chair">chair</button>
                    <button data-filter=".ptable">table</button>
                    <button data-filter=".home-decor">home decor</button>
                    <button data-filter=".lighting">lighting</button>
                </div>
                <!-- Product Filter Toggle -->
                <div class="col-auto">
                    <button class="product-filter-toggle">filter</button>
                </div>
            </div>
            
            <!-- Product Filter Wrapper -->
            <div class="row">
                <div class="col-12">
                    <div class="product-filter-wrapper">
                        <div class="row">
                            <!-- Product Filter -->
                            <div class="product-filter col-lg-3 col-md-6 col-12 mb-30">
                                <h5>Sort by</h5>
                                <ul class="sort-by">
                                    <li><a href="#">Default</a></li>
                                    <li><a href="#">Popularity</a></li>
                                    <li><a href="#">Average rating</a></li>
                                    <li><a href="#">Newness</a></li>
                                    <li><a href="#">Price: Low to High</a></li>
                                    <li><a href="#">Price: High to Low</a></li>
                                </ul>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-lg-3 col-md-6 col-12 mb-30">
                                <h5>color filters</h5>
                                <ul class="color-filter">
                                    <li><a href="#"><i style="background-color: #000000;"></i>Black</a></li>
                                    <li><a href="#"><i style="background-color: #663300;"></i>Brown</a></li>
                                    <li><a href="#"><i style="background-color: #FF6801;"></i>Orange</a></li>
                                    <li><a href="#"><i style="background-color: #ff0000;"></i>red</a></li>
                                    <li><a href="#"><i style="background-color: #FFEE00;"></i>Yellow</a></li>
                                </ul>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-lg-3 col-md-6 col-12 mb-30">
                                <h5>product tags</h5>
                                <div class="product-tags">
                                    <a href="#">New</a>,
                                    <a href="#">brand</a>,
                                    <a href="#">black</a>,
                                    <a href="#">white</a>,
                                    <a href="#">chire</a>,
                                    <a href="#">table</a>,
                                    <a href="#">Lorem</a>,
                                    <a href="#">ipsum</a>,
                                    <a href="#">dolor</a>,
                                    <a href="#">sit</a>,
                                    <a href="#">amet</a>
                                </div>
                            </div>
                            <!-- Product Filter -->
                            <div class="product-filter col-lg-3 col-md-6 col-12 mb-30">
                                <h5>Filter by price</h5>
                                <div id="price-range"></div>
                                <div class="price-values">
                                    <span>Price:</span>
                                    <input type="text" class="price-amount">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="isotope-grid row">
                <!-- Product Item Start -->
                <div class="isotope-item chair home-decor col-xl-3 col-lg-4 col-md-6 col-12 mb-50">
                    <div class="product-item text-center">
                        <!-- Product Image -->
                        <div class="product-img">
                            <!-- Image -->
                            <a class="image" href="/product-details"><img src="template/outside/img/product/1.jpg" alt=""/></a>
                            <!-- Wishlist Button -->
                            <a class="wishlist" href="#" title="Wishlist"><i class="pe-7s-like"></i></a>
                            <!-- Action Button -->
                            <div class="action-btn fix">
                                <!-- <a href="#" data-bs-toggle="modal"  data-bs-target="#" title="Quick View"></a> -->
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="pe-7s-look"></i>Quick view</a>
                                <a href="#" title="Add to Cart"><i class="pe-7s-cart"></i>add to cart</a>
                            </div>
                        </div>
                        <!-- Portfolio Info -->
                        <div class="product-info text-left">
                            <!-- Title -->
                            <h5 class="title"><a href="product-details.html">Le Parc Minotti Chair</a></h5>
                            <!-- Price Ratting -->
                            <div class="price-ratting fix">
                                <span class="price float-start"><span class="new">€169.00</span></span>
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
               
            </div>
            
            <div class="row">
                <div class="text-center col-12 mt-30">
                    <a href="#" class="btn load-more-product">load more</a>
                </div>
            </div>
            
        </div>
    </div>
    <!-- PRODUCT SECTION END -->

@endsection