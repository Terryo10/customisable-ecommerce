<div>
    <div class="home-slider-section section">
        <!-- Home Slider -->
        <div id="home-slider" class="slides">
            @foreach ($sliders as $slider)
            <img src="{{"/storage/$slider->image"}}" alt="" title={{"#slider-caption-$slider->id"}} />

            @endforeach

        </div>
        @foreach ($sliders as $slider)
        <!-- Caption 1 -->
        <div id={{"slider-caption-$slider->id"}} class="nivo-html-caption">
            <div class="container">
                <div class="row">
                    <div class="hero-slider-content col-sm-8 col-xs-12">
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">{{$slider->title}}</h1>
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">{{$slider->description}} </p>
                        <a href="#shop" class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">View Shop</a>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>