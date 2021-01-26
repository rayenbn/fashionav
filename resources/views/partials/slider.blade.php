 <!-- slider-area start -->
 <div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach ($sliders as $key => $slider)
        <div class="slider-wrapper">
            <div class="single-slider">
                <img src="/storage/sliders/{{ $slider->picture}}" alt="">
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- slider-area end -->