<div>
    <div class="footer-top-section section pt-100 pb-60">
        <div class="container">
            <div class="row">

                <!-- Footer Widget -->
                <div class="footer-widget col-lg-4 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">ABOUT THE STORE</h5>
                    <p>SlimRiff is an e-commerce platform</p>
                </div>

                <!-- Footer Widget -->
                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">CUSTOMER SERVICE</h5>
                    <ul>
                        <li><a href="#!" data-bs-toggle="modal" data-bs-target={{"#quickViewModalContact"}}>Contact
                                Us</a></li>
                    </ul>
                </div>

                <!-- Footer Widget -->
                <div class="footer-widget col-lg-2 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">PROFILE</h5>
                    <ul>
                        <li><a href="/orders">my Orders</a></li>

                    </ul>
                </div>

                <!-- Footer Widget -->
                <div class="footer-widget col-lg-3 col-md-6 col-12 mb-40">
                    <h5 class="widget-title">SIGN UP FOR OUR AWESOME NEWS</h5>
                    <form action="/subscribe" method="POST" name="mc-embedded-subscribe-form"
                        class="sunscribe-form validate">
                        @csrf
                        <div id="mc_embed_signup_scroll">
                            <label for="mce-EMAIL" class="d-lg-none">Subscribe to our mailing list</label>
                            <input type="email" value="" name="email" class="email" id="mce-EMAIL"
                                placeholder="Email Address" required>
                            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text"
                                    name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe"
                                    id="mc-embedded-subscribe" class="button"></div>
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

    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <!-- Copyright -->
                <div class="copyright text-left col-md-auto col-12">
                    <p>Powered by <a href="https://tradersmark.co.zw/" target="_blank">TradersMark</a></p>
                </div>
                <!-- Payment Method -->
                <div class="footer-menu text-right col-md-auto col-12">

                </div>
            </div>
        </div>
    </div>
</div>