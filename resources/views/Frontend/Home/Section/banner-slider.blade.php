<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @foreach ($sliders as $slider)
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style=background: url({{asset($slider->slider_banner)}});>
                              
                              <div class="wsus__single_slider_text">
                                <h3>{{$slider->slider_title}}</h3>
                                <h1>{{$slider->slider_type}}</h1>
                                <h6>start at ${{$slider->product_price_slider}}</h6>
                                <a class="common_btn" href="{{$slider->slider_button_url}}">shop now</a>
                            </div> 
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>