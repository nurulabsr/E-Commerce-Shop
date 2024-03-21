@extends('Frontend.Layouts.master')
@section('content')
      <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>cart View</h4>
                        <ul>
                            <li><a href="#">home</a></li>
                            <li><a href="#">peoduct</a></li>
                            <li><a href="#">cart view</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-xl-9">
                    <div class="wsus__cart_list">
                        <div class="table-responsive">
                            <table>
                                <tbody>
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_status">
                                            Unit Price
                                        </th>

                                        <th class="wsus__pro_tk">
                                            Total Price
                                        </th>
                                        <th class="wsus__pro_select">
                                            quantity
                                        </th>


                                        <th class="wsus__pro_icon">
                                            <a href="#" class="common_btn clear_cart">clear cart</a>
                                        </th>
                                    </tr>
                                    @foreach ($cartItems as $cartItem)
                                        
                                    <tr class="d-flex">
                                        <td class="wsus__pro_img"><img src="{{asset($cartItem->options->image)}}" alt="product"
                                                class="img-fluid w-100">
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{{$cartItem->name}}</p>
                                            @foreach ($cartItem->options->variants as $key => $variantValue )     
                                            <span>{{$key}}: {{$variantValue['product_variant_item_name']}} ({{$settings->currency_icon}} {{$variantValue['product_variant_item_price']}})</span>
                                            @endforeach
                                            
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>{{$settings->currency_icon}} {{$cartItem->price}}</h6>
                                        </td>
                                        <td class="wsus__pro_status">
                                            <h5 id="{{$cartItem->rowId}}">{{$settings->currency_icon}}{{ ($cartItem->price + $cartItem->options->variantTotalAmount) * $cartItem->qty}}</h5>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <div class="product_qty_wrapper">
                                                <button class="btn btn-danger btn-sm product_decrement">-</button>
                                                <input class="product_qty" data-rowid ="{{$cartItem->rowId}}" type="text" min="1" max="100" value="{{$cartItem->qty}}" readonly />
                                                <button class="btn btn-success btn-sm product_increment">+</button>
                                            </div>
                                        </td>


                                        <td class="wsus__pro_icon">
                                            <a href="#"><i class="far fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="wsus__cart_list_footer_button" id="sticky_sidebar">
                        <h6>total cart</h6>
                        <p>subtotal: <span>$124.00</span></p>
                        <p>delivery: <span>$00.00</span></p>
                        <p>discount: <span>$10.00</span></p>
                        <p class="total"><span>total:</span> <span>$134.00</span></p>

                        <form>
                            <input type="text" placeholder="Coupon Code">
                            <button type="submit" class="common_btn">apply</button>
                        </form>
                        <a class="common_btn mt-4 w-100 text-center" href="check_out.html">checkout</a>
                        <a class="common_btn mt-1 w-100 text-center" href="product_grid_view.html"><i
                                class="fab fa-shopify"></i> go shop</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="wsus__single_banner">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_2.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>sell on <span>35% off</span></h6>
                            <h3>smart watch</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="wsus__single_banner_content single_banner_2">
                        <div class="wsus__single_banner_img">
                            <img src="images/single_banner_3.jpg" alt="banner" class="img-fluid w-100">
                        </div>
                        <div class="wsus__single_banner_text">
                            <h6>New Collection</h6>
                            <h3>Cosmetics</h3>
                            <a class="shop_btn" href="#">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
          CART VIEW PAGE END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
       
            $('.product_increment').on('click', function(){
                let input = $(this).siblings('.product_qty');
                let rowId = input.data('rowid');
                let currentQuantity = parseInt(input.val());
                let newQuantity = currentQuantity + 1;
                input.val(newQuantity);
                // console.log(newQuantity);

                // AJAX request
                $.ajax({
                    url: "{{route('update-cart-quantity')}}",
                    method: 'POST',
                    data: {
                        quantity: newQuantity,
                        rowId:rowId
                    },
                    success: function(data){
                        console.log(data);
                        if(data.status == "success"){
                            let productId = '#' + rowId;
                            let product_total = "{{$settings->currency_icon}}" + data.product_total;
                            console.log("data:", $(productId).text(product_total));
                            toastr.success(data.message);
                        }
                    },
                    error: function(xhr, textStatus, error){
                      
                    }
                });
            });

            $('.product_decrement').on('click', function(){
                let input = $(this).siblings('.product_qty');
                let rowId = input.data('rowid');
                let currentQuantity = parseInt(input.val());
                let newQuantity = currentQuantity - 1;
                if(newQuantity < 1) newQuantity = 1;
                input.val(newQuantity);
                console.log(newQuantity);

                // AJAX request
                $.ajax({
                    url: "{{route('update-cart-quantity')}}",
                    method: 'POST',
                    data: {
                        quantity: newQuantity,
                        rowId:rowId
                    },
                    success: function(data){
                        console.log(data);
                        if(data.status == "success"){
                            let productId = '#' + rowId;
                            let product_total = "{{$settings->currency_icon}}" + data.product_total;
                            console.log("data:", $(productId).text(product_total));
                            toastr.success(data.message);
                        }
                    },
                    error: function(xhr, textStatus, error){
                      
                    }
                });
            });

            $('.clear_cart').on('click', function(){
                event.preventDefault();
                Swal.fire({
                    title: "Are you sure?",
                    text: "Continuing will empty your cart!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, clear it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'get',
                            url: "",
                            success: function(data) {
                        
                            },
                            error: function(xhr, status, error) {
                                console.log(error);
                            }
                        });
                    }
                });
            })
        });
    </script>
@endpush
