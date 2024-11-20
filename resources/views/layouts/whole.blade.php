<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce App</title>
    <meta name="description" content="Empowering Lesotho's Adolescent and Young People by providing Sexual and Reproductive Health and HIV Information." />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon  -->
    <link rel="icon" href="assets/assets/img/favicon.png" />

    <!-- All CSS Files -->
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{ asset('template/outside/css/bootstrap.min.css') }}">
    <!-- Icon Font -->
    <link rel="stylesheet" href="{{ asset('template/outside/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/outside/css/pe-icon-7-stroke.css') }}">
    <!-- Plugins css file -->
    <link rel="stylesheet" href="{{ asset('template/outside/css/plugins.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('template/outside/style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('template/outside/css/responsive.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

    </head>

<body>
 
 <div class="wrapper">

    <!-- START HEADER SECTION -->
    <header class="header-section section sticker">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <!-- logo -->
                    <div class="header-logo">
                        <a href="/"><img src="template/outside/img/logo.png" alt="main logo"></a>
                    </div>
                </div>
                <div class="col-auto d-flex">
                    <!-- header-search & total-cart -->
                    <nav class="main-menu">
                        <ul>
                            <li><a href="/">Home</a>
                            @if(Auth::check())
                            <li><a href="/auth/logout">LogOut</a>
                            @else
                                <!-- User is not logged in -->
                            <li><a href="/login">Login</a>
                            @endif
                            
                            
                            </li>
                            {{-- <li><a href="/shop">links</a>
                                <ul class="sub-menu">
                                    <li><a href="/order">Orders</a></li>
                                    <li><a href="/login">Login</a></li>
                                </ul>
                            </li> --}}
                           
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- header-search & total-cart -->
                    <div class="header-option-btns d-flex">
                        <!-- header-search -->
                        {{-- <div class="header-search">
                            <button class="search-toggle"><i class="pe-7s-search"></i></button>
                            <div class="header-search-form">
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                    <button><i class="fa fa-long-arrow-right"></i></button>
                                </form>
                            </div>
                        </div> --}}
                        <!-- header Account -->
                        {{-- <div class="header-account">
                            <ul>
                                <li><a href="#" class="account-toggle"><i class="pe-7s-config"></i></a>
                                    <ul class="account-menu">
                                        <li><a href="/login">Log in</a></li>
                                        <li><a href="/register">Register</a></li>
                                        <li><a href="#">My Account</a></li>
                                        <li><a href="/checkout">Checkout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div> --}}
                        <!-- Header Cart -->
                        <div class="header-cart">
                            <!-- Cart Toggle -->
                            <a class="cart-toggle" href="#">
                                <i class="pe-7s-cart"></i>
                                <span>2</span>
                            </a>
                            <!-- Mini Cart Brief -->
                            <div class="mini-cart-brief text-left">
                                <!-- Cart Products -->
                                <div class="all-cart-product clearfix">
                                    <div class="single-cart clearfix">
                                        <div class="cart-image">
                                            <a href="product-details.html"><img src="template/outside/img/product/cart-1.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-info">
                                            <h5><a href="product-details.html">Le Parc Minotti Chair</a></h5>
                                            <p>1 x £9.00</p>
                                            <a href="#" class="cart-delete" title="Remove this item"><i class="pe-7s-trash"></i></a>
                                        </div>
                                    </div>
                                    <div class="single-cart clearfix">
                                        <div class="cart-image">
                                            <a href="product-details.html"><img src="template/outside/img/product/cart-2.jpg" alt=""></a>
                                        </div>
                                        <div class="cart-info">
                                            <h5><a href="product-details.html">DSR Eiffel chair</a></h5>
                                            <p>1 x £9.00</p>
                                            <a href="#" class="cart-delete" title="Remove this item"><i class="pe-7s-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Total -->
                                <div class="cart-totals">
                                    <h5>Total <span>£12.00</span></h5>
                                </div>
                                <!-- Cart Button -->
                                <div class="cart-bottom  clearfix">
                                    <a href="checkout.html">Check out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu"></div>
            </div>
        </div>
    </header>
    <!-- END HEADER SECTION -->

    <!-- QUICK VIEW MODAL END-->
    @yield('content')

    <!-- FOOTER TOP SECTION START -->
    <div class="footer-top-section section pt-100 pb-60">
        <div class="container">
            <div class="row">
            
                <!-- Footer Widget -->
                <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">ABOUT THE STORE</h5>
                    <p>There are many variations of passages of Lor available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                </div>
                
                <!-- Footer Widget -->
                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">CUSTOMER SERVICE</h5>
                    <ul>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Returns & Refunds</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">online store</a></li>
                    </ul>
                </div>
                
                <!-- Footer Widget -->
                <div class="footer-widget col-lg-2 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">PROFILE</h5>
                    <ul>
                        <li><a href="#">my Account</a></li>
                        <li><a href="#">Checkout</a></li>
                        <li><a href="#">help</a></li>
                        <li><a href="#">support</a></li>
                    </ul>
                </div>
                
                <!-- Footer Widget -->
                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">SIGN UP FOR OUR AWESOME NEWS</h5>
                    <form action="https://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="sunscribe-form validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <label for="mce-EMAIL" class="d-lg-none">Subscribe to our mailing list</label>
                            <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                    <div class="footer-social fix">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- FOOTER TOP SECTION END -->  

    <!-- FOOTER BOTTOM SECTION START -->
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <!-- Copyright -->
                <div class="copyright text-left col-md-auto col-12">
                    <p>Powered by <a href="https://tradersmark.co.zw/" target="_blank">TradersMark</a></p>
                </div>
                <!-- Payment Method -->
                <div class="footer-menu text-right col-md-auto col-12">
                    <a href="#">Help & Support</a>
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER BOTTOM SECTION END -->  
    <!-- QUICK VIEW MODAL START-->
    <div class="modal fade" id="quickViewModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- QuickView Product Images -->
                    <div class="col-xl-5 col-md-6 col-12 mb-40">	
                        <!-- Tab panes -->
                        <div class="tab-content mb-10">
                            <div class="pro-large-img tab-pane active" id="pro-large-img-1">
                                <img src="template/outside/img/product/2.jpg" alt="" />
                            </div>
                            <div class="pro-large-img tab-pane" id="pro-large-img-2">
                                <img src="template/outside/img/product/1.jpg" alt="" />
                            </div>
                            <div class="pro-large-img tab-pane" id="pro-large-img-3">
                                <img src="template/outside/img/product/3.jpg" alt="" />
                            </div>
                            <div class="pro-large-img tab-pane" id="pro-large-img-4">
                                <img src="template/outside/img/product/4.jpg" alt="" />					
                            </div>
                            <div class="pro-large-img tab-pane" id="pro-large-img-5">
                                <img src="template/outside/img/product/5.jpg" alt="" />
                            </div>
                        </div>
                        <!-- QuickView Product Thumbnail Slider -->
                        <div class="pro-thumb-img-slider nav">
                            <div><a href="#pro-large-img-1" class="active" data-bs-toggle="tab"><img src="template/outside/img/product/2.jpg" alt="" /></a></div>
                            <div><a href="#pro-large-img-2" data-bs-toggle="tab"><img src="template/outside/img/product/1.jpg" alt="" /></a></div>
                            <div><a href="#pro-large-img-3" data-bs-toggle="tab"><img src="template/outside/img/product/3.jpg" alt="" /></a></div>
                            <div><a href="#pro-large-img-4" data-bs-toggle="tab"><img src="template/outside/img/product/4.jpg" alt="" /></a></div>
                            <div><a href="#pro-large-img-5" data-bs-toggle="tab"><img src="template/outside/img/product/5.jpg" alt="" /></a></div>
                        </div>
                    </div>
                    <!-- QuickView Product Details -->
                    <div class="col-xl-7 col-md-6 col-12 mb-40">
                        <div class="product-details section">
                            <!-- Title -->
                            <h1 class="title">DSR Eiffel chair</h1>
                            <!-- Price Ratting -->
                            <div class="price-ratting section d-flex flex-column flex-sm-row justify-content-between">
                                <!-- Price -->
                                <span class="price"><span class="new">€ 120.00</span></span>
                                <!-- Ratting -->
                                <span class="ratting">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <span> (01 Customer Review)</span>
                                </span>
                            </div>
                            <!-- Short Description -->
                            <div class="short-desc section">
                                <h5 class="pd-sub-title">Quick Overview</h5>
                                <p>There are many variations of passages of Lorem Ipsum avaable, b majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. make an ami jani na.</p>
                            </div>
                            <!-- Product Size -->
                            <div class="product-size section">
                                <h5 class="pd-sub-title">Select Size</h5>
                                <button>s</button>
                                <button class="active">m</button>
                                <button>x</button>
                                <button>xl</button>
                            </div>
                            <!-- Product Color -->
                            <div class="color-list section">
                                <h5 class="pd-sub-title">Select Color</h5>
                                <button class="active" style="background-color: #51bd99;"><i class="fa fa-check"></i></button>
                                <button style="background-color: #ff7a5f;"><i class="fa fa-check"></i></button>
                                <button style="background-color: #baa6c2;"><i class="fa fa-check"></i></button>
                                <button style="background-color: #414141;"><i class="fa fa-check"></i></button>
                            </div>
                            <!-- Quantity Cart -->
                            <div class="quantity-cart section">
                                <div class="product-quantity">
                                    <input type="text" value="0">
                                </div>
                                <button class="add-to-cart">Place Order</button>
                            </div>
                            <!-- Usefull Link -->
                            <ul class="usefull-link section">
                                <li><a href="#"><i class="pe-7s-mail"></i> Email to a Friend</a></li>
                                <li><a href="#"><i class="pe-7s-like"></i> Wishlist</a></li>
                                <li><a href="#"><i class="pe-7s-print"></i> print</a></li>
                            </ul>
                            <!-- Share -->
                            <div class="share-icons section">
                                <span>share :</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

</div>
 

 
<!-- jQuery latest version -->
<script src="{{ asset('template/outside/js/vendor/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('template/outside/js/vendor/jquery-migrate.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('template/outside/js/bootstrap.bundle.min.js') }}"></script>
<!-- Plugins js -->
<script src="{{ asset('template/outside/js/plugins.js') }}"></script>
<!-- Ajax Mail js -->
<script src="{{ asset('template/outside/js/ajax-mail.js') }}"></script>
<!-- Main js -->
<script src="{{ asset('template/outside/js/main.js') }}"></script>

</body>


</html>
