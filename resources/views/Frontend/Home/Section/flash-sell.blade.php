<section id="wsus__flash_sell" class="wsus__flash_sell_2">
    <div class=" container">
        <div class="row">
            <div class="col-xl-12">
                <div class="offer_time" style="background: url(asset('FrontendData/images/flash_sell_bg.jpg'))">
                    <div class="wsus__flash_coundown">
                        <span class=" end_text">flash sell</span>
                        <div class="simply-countdown simply-countdown-one"></div>
                        <a class="common_btn" href="{{route('flashsell')}}">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach($flashsellItems as $flashsellItem)
            @php
                $product = \App\Models\Product::find($flashsellItem->product_id)
            @endphp
            <div class="col-xl-3 col-sm-6 col-lg-4">
                <div class="wsus__product_item">
                    <span class="wsus__new">{{productType($product->product_type)}}</span>
                    @if (checkDiscount($product))
                        
                    <span class="wsus__minus">{{caculateDisCountPrice($product->product_price, $product->product_offer_price)}}%</span>
                    @endif
                    <a class="wsus__pro_link" href="{{route('product-detail', $product->product_slug)}}">
                        <img src="{{$product->product_thumnail_img}}" alt="product" class="img-fluid w-100 img_1" />
                        <img src="
                        @if (isset($product->productImageGallery[0]->product_image_gallery_img))
                           {{asset($product->productImageGallery[0]->product_image_gallery_img)}}
                        @else
                        {{asset($product->product_thumnail_img)}}
                        @endif
                        
                        " alt="product" class="img-fluid w-100 img_2" />
                    </a>
                    <ul class="wsus__single_pro_icon">
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$product->id}}"><i
                                    class="far fa-eye"></i></a></li>
                        <li><a href="#"><i class="far fa-heart"></i></a></li>
                        <li><a href="#"><i class="far fa-random"></i></a>
                    </ul>
                    <div class="wsus__product_details">
                        <a class="wsus__category" href="#">{{$product->category->category_name}} </a>
                        <p class="wsus__pro_rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span>(133 review)</span>
                        </p>
                        <a class="wsus__pro_name" href="{{route('product-detail', $product->product_slug)}}">{{$product->product_name}}</a>
                        @if (checkDiscount($product))
                        <p class="wsus__price">{{$settings->currency_icon}}{{$product->product_offer_price}} <del>{{$settings->currency_icon}}{{$product->product_price}}</del></p>
                        @else
                        <p class="wsus__price">{{$settings->currency_icon}}{{$product->product_price}} </p>
                        @endif
                        
                        <a class="add_cart" href="#">add to cart</a>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<div>
    <section class="product_popup_modal">
                @foreach($flashsellItems as $flashsellItem)
                @php
                    $product = \App\Models\Product::find($flashsellItem->product_id)
                @endphp   
                <div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="height: auto; cursor: pointer;">
                            <div class="modal-body">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                 class="far fa-times"></i></button>
                                <div class="row">
                                    <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                                        <div class="wsus__quick_view_img">
                                            @if ($product->product_video_link)
                                            <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                                href="{{$product->product_video_link}}">
                                                <i class="fas fa-play"></i>
                                            </a>
                                            @endif
                                            <div class="row modal_slider">
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{asset($product->product_thumnail_img)}}" alt="product" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                                @if (count($product->productImageGallery)==0)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{asset($product->product_thumnail_img)}}" alt="product" class="img-fluid w-100">
                                                    </div>
                                            </div>
                                                @endif
                                                @foreach ($product->productImageGallery as $Thumnailimg)
                                                <div class="col-xl-12">
                                                    <div class="modal_slider_img">
                                                        <img src="{{asset($Thumnailimg->product_image_gallery_img)}}" alt="product" class="img-fluid w-100">
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                                        <div class="wsus__pro_details_text" >
                                            <a class="title" href="#">{{$product->product_name}}</a>
                                            <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                            @if (checkDiscount($product))
                                            <h4>{{$settings->currency_icon}}{{$product->product_offer_price}} <del>{{$settings->currency_icon}}{{$product->product_price}}</del></h4>
                                            @else
                                            <h4>{{$settings->currency_icon}}{{$product->product_price}}</h4>
                                            @endif
                                            <p class="review">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>20 review</span>
                                            </p>
                                            <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
    
                                            {{-- <div class="wsus_pro_hot_deals">
                                                <h5>offer ending time : </h5>
                                                <div class="simply-countdown simply-countdown-one"></div>
                                            </div> --}}
                                            <div class="wsus__selectbox">
                                                <div class="row">
                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    @foreach ($product->productVariants as $variant)
                                                    <div class="col-xl-6 col-sm-6">
                                                        <h5 class="mb-2">{{ $variant->product_variant_name }} :</h5>
                                                        <select class="select_2" name="variants_items[]">
                                                            @foreach ( $variant->productVariantItems as $productVariantItem)
                                                            <option value="">Select</option>
                                                            <option value="{{$productVariantItem->id}}" {{$productVariantItem->product_variant_item_is_default == 1 ? 'selected' :'' }}>{{$productVariantItem->product_variant_item_name}} ({{$productVariantItem->product_variant_item_price}}{{$settings->currency_icon}})</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endforeach
    
                                                </div>
                                            </div>
                                            <div class="wsus__quentity">
                                                <h5>quentity :</h5>
                                                <form class="select_number">
                                                    <input class="number_area" type="text" min="1" max="100" value="1" />
                                                </form>
                                                <h3>$50.00</h3>
                                            </div>
                                            <ul class="wsus__button_area">
                                                <li><a class="add_cart" href="#">add to cart</a></li>
                                                <li><a class="buy_now" href="#">buy now</a></li>
                                                <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                                <li><a href="#"><i class="far fa-random"></i></a></li>
                                            </ul>
                                            <p class="brand_model"><span>model :</span> 12345670</p>
                                            <p class="brand_model"><span>brand :</span> {{$product->brands->brand_name}}</p>
                                            <div class="wsus__pro_det_share" >
                                                <h5>share :</h5>
                                                <ul class="d-flex">
                                                    <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                                    <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    </section>
</div>  

    @push('scripts')
    <script>
    $(document).ready(function(){

        simplyCountdown('.simply-countdown-one', {
            year: {{date('Y', strtotime($flashsell->end_date))}},
            month: {{date('m', strtotime($flashsell->end_date))}},
            day:  {{date('d', strtotime($flashsell->end_date))}},
            enableUtc: true
        });
    });    
    </script>    
    @endpush