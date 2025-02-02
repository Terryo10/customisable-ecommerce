<div>
    <div class="home-slider-section section">
        <div class="container">
            <div class="row">
                <!-- Home Slick Text Slider -->
                <div class="home-slick-text-slider col-sm-6 col-xs-12">
                    <!-- Home Text Content -->
                    @foreach ($sliders ?? [] as $slider)
                    <div class="home-slick-content">
                        <h1>{{ $slider->title ?? "" }}</h1>
                        <p>{{ $slider->description ?? "" }}</p>
                        <a href={{"/product/$slider->product_id"}}
                            class="btn">Shop Now</a>
                    </div>
                    @endforeach
                </div>
                <!-- Home Slick Image Slider -->
                <div class="home-slick-image-slider col-sm-6 col-xs-12">
                    @foreach ($sliders as $slider)
                    <div class="image"><img src="/storage/{{ $slider->image }}" alt="" style="height: 70%"></div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
</div>