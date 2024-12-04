<div>
    <div class="home-slider-section section">
        <div class="container">
            <div class="row">
                <!-- Home Slick Text Slider -->
                <div class="home-slick-text-slider col-sm-6 col-xs-12">
                    <!-- Home Text Content -->
                    @foreach ($sliders as $slider)
                    <div class="home-slick-content">
                        <h1>jumpsuit</h1>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, ay dil he moskil.</p>
                        <a href="#" class="btn">SHOP NOW</a>
                    </div>
                    @endforeach
                </div>
                <!-- Home Slick Image Slider -->
                <div class="home-slick-image-slider col-sm-6 col-xs-12">
                    @foreach ($sliders as $slider)
                    <div class="image"><img src="/storage/{{$slider->image }}" alt="" style="height: 70%"></div>
                    @endforeach
                
                   
                </div>
            </div>
        </div>
    </div>
</div>