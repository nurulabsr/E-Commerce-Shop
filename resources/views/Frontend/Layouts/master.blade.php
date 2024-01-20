<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Sazao || e-Commerce HTML Template</title>
    <link rel="icon" type="image/png" href="{{asset('Frontend/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.calendar.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/add_row_custon.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/mobile_menu.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.exzoom.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/multiple-image-video.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/ranger_style.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/jquery.classycountdown.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/venobox.min.css')}}">

    <link rel="stylesheet" href="{{asset('FrontendData/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('FrontendData/css/responsive.css')}}">
    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-2 col-md-1 d-lg-none">
                    <div class="wsus__mobile_menu_area">
                        <span class="wsus__mobile_menu_icon"><i class="fal fa-bars"></i></span>
                    </div>
                </div>
                <div class="col-xl-2 col-7 col-md-8 col-lg-2">
                    <div class="wsus_logo_area">
                        <a class="wsus__header_logo" href="index.html">
                            <img src="images/logo_2.png" alt="logo" class="img-fluid w-100">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-lg-4 d-none d-lg-block">
                    <div class="wsus__search">
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-xl-5 col-3 col-md-3 col-lg-6">
                    <div class="wsus__call_icon_area">
                        <div class="wsus__call_area">
                            <div class="wsus__call">
                                <i class="fas fa-user-headset"></i>
                            </div>
                            <div class="wsus__call_text">
                                <p>example@gmail.com</p>
                                <p>+569875544220</p>
                            </div>
                        </div>
                        <ul class="wsus__icon_area">
                            <li><a href="wishlist.html"><i class="fal fa-heart"></i><span>05</span></a></li>
                            <li><a href="compare.html"><i class="fal fa-random"></i><span>03</span></a></li>
                            <li><a class="wsus__cart_icon" href="#"><i
                                        class="fal fa-shopping-bag"></i><span>04</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__mini_cart">
            <h4>shopping cart <span class="wsus_close_mini_cart"><i class="far fa-times"></i></span></h4>
            <ul>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/tab_2.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">apple 9.5" 7 serise tab with full view display</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/pro4.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">men's fashion casual watch</a>
                        <p>$130</p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/pro2.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">men's casual shoes</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/pro9.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">men's fashion casual sholder bag</a>
                        <p>$140</p>
                    </div>
                </li>
                <li>
                    <div class="wsus__cart_img">
                        <a href="#"><img src="images/tab_2.jpg" alt="product" class="img-fluid w-100"></a>
                        <a class="wsis__del_icon" href="#"><i class="fas fa-minus-circle"></i></a>
                    </div>
                    <div class="wsus__cart_text">
                        <a class="wsus__cart_title" href="#">apple 9.5" 7 serise tab with full view display</a>
                        <p>$140 <del>$150</del></p>
                    </div>
                </li>
            </ul>
            <h5>sub total <span>$3540</span></h5>
            <div class="wsus__minicart_btn_area">
                <a class="common_btn" href="cart_view.html">view cart</a>
                <a class="common_btn" href="check_out.html">checkout</a>
            </div>
        </div>

    </header>
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
    <nav class="wsus__main_menu d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="relative_contect d-flex">
                        <div class="wsus_menu_category_bar">
                            <i class="far fa-bars"></i>
                        </div>
                        <ul class="wsus_menu_cat_item show_home toggle_menu">
                            <li><a href="#"><i class="fas fa-star"></i> hot promotions</a></li>
                            <li><a class="wsus__droap_arrow" href="#"><i class="fal fa-tshirt"></i> Fashion </a>
                                <ul class="wsus_menu_cat_droapdown">
                                    <li><a href="#">New Arrivals <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Best Sellers</a></li>
                                    <li><a href="#">Trending <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Home Audio & Theaters</a></li>
                                    <li><a href="#">TV & Videos</a></li>
                                    <li><a href="#">Camera</a></li>
                                    <li><a href="#">Photos & Videos <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="wsus__droap_arrow" href="#"><i class="fas fa-tv"></i> Electronics</a>
                                <ul class="wsus_menu_cat_droapdown">
                                    <li><a href="#">New Arrivals <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Best Sellers</a></li>
                                    <li><a href="#">Trending <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Home Audio & Theaters</a></li>
                                    <li><a href="#">TV & Videos</a></li>
                                    <li><a href="#">Camera</a></li>
                                    <li><a href="#">Photos & Videos <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="wsus__droap_arrow" href="#"><i class="fas fa-chair-office"></i> Furniture</a>
                                <ul class="wsus_menu_cat_droapdown">
                                    <li><a href="#">New Arrivals <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Best Sellers</a></li>
                                    <li><a href="#">Trending <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Home Audio & Theaters</a></li>
                                    <li><a href="#">TV & Videos</a></li>
                                    <li><a href="#">Camera</a></li>
                                    <li><a href="#">Photos & Videos <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="wsus__droap_arrow" href="#"><i class="fal fa-mobile"></i> Smart Phones</a>
                                <ul class="wsus_menu_cat_droapdown">
                                    <li><a href="#">New Arrivals <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Best Sellers</a></li>
                                    <li><a href="#">Trending <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li><a href="#">Home Audio & Theaters</a></li>
                                    <li><a href="#">TV & Videos</a></li>
                                    <li><a href="#">Camera</a></li>
                                    <li><a href="#">Photos & Videos <i class="fas fa-angle-right"></i></a>
                                        <ul class="wsus__sub_category">
                                            <li><a href="#">New Arrivals</a> </li>
                                            <li><a href="#">Best Sellers</a></li>
                                            <li><a href="#">Trending</a></li>
                                            <li><a href="#">Clothing</a></li>
                                            <li><a href="#">Bags</a></li>
                                            <li><a href="#">Home Audio & Theaters</a></li>
                                            <li><a href="#">TV & Videos</a></li>
                                            <li><a href="#">Camera</a></li>
                                            <li><a href="#">Photos & Videos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-home-lg-alt"></i> Home & Garden</a></li>
                            <li><a href="#"><i class="far fa-camera"></i> Accessories</a></li>
                            <li><a href="#"><i class="fas fa-heartbeat"></i> Healthy & Beauty</a></li>
                            <li><a href="#"><i class="fal fa-gift-card"></i> Gift Ideas</a></li>
                            <li><a href="#"><i class="fal fa-gamepad-alt"></i> Toy & Games</a></li>
                            <li><a href="#"><i class="fal fa-gem"></i> View All Categories</a></li>
                        </ul>

                        <ul class="wsus__menu_item">
                            <li><a class="active" href="index.html">home</a></li>
                            <li><a href="product_grid_view.html">shop <i class="fas fa-caret-down"></i></a>
                                <div class="wsus__mega_menu">
                                    <div class="row">
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>women</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>men</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>category</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#"> Healthy & Beauty</a></li>
                                                    <li><a href="#">Gift Ideas</a></li>
                                                    <li><a href="#">Toy & Games</a></li>
                                                    <li><a href="#">Cooking</a></li>
                                                    <li><a href="#">Smart Phones</a></li>
                                                    <li><a href="#">Cameras & Photo</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">View All Categories</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-lg-3">
                                            <div class="wsus__mega_menu_colum">
                                                <h4>women</h4>
                                                <ul class="wsis__mega_menu_item">
                                                    <li><a href="#">New Arrivals</a></li>
                                                    <li><a href="#">Best Sellers</a></li>
                                                    <li><a href="#">Trending</a></li>
                                                    <li><a href="#">Clothing</a></li>
                                                    <li><a href="#">Shoes</a></li>
                                                    <li><a href="#">Bags</a></li>
                                                    <li><a href="#">Accessories</a></li>
                                                    <li><a href="#">Jewlery & Watches</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="vendor.html">vendor</a></li>
                            <li><a href="blog.html">blog</a></li>
                            <li><a href="daily_deals.html">campain</a></li>
                            <li class="wsus__relative_li"><a href="#">pages <i class="fas fa-caret-down"></i></a>
                                <ul class="wsus__menu_droapdown">
                                    <li><a href="404.html">404</a></li>
                                    <li><a href="faqs.html">faq</a></li>
                                    <li><a href="invoice.html">invoice</a></li>
                                    <li><a href="about_us.html">about</a></li>
                                    <li><a href="product_grid_view.html">product</a></li>
                                    <li><a href="check_out.html">check out</a></li>
                                    <li><a href="team.html">team</a></li>
                                    <li><a href="change_password.html">change password</a></li>
                                    <li><a href="custom_page.html">custom page</a></li>
                                    <li><a href="forget_password.html">forget password</a></li>
                                    <li><a href="privacy_policy.html">privacy policy</a></li>
                                    <li><a href="product_category.html">product category</a></li>
                                    <li><a href="brands.html">brands</a></li>
                                </ul>
                            </li>
                            <li><a href="track_order.html">track order</a></li>
                            <li><a href="daily_deals.html">daily deals</a></li>
                        </ul>
                        <ul class="wsus__menu_item wsus__menu_item_right">
                            <li><a href="contact.html">contact</a></li>
                            <li><a href="dsahboard.html">my account</a></li>
                            <li><a href="login.html">login</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!--============================
        MAIN MENU END
    ==============================-->

           @yield('content')

    <!--============================
        FOOTER PART START
    ==============================-->
    <footer class="footer_2">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-3 col-sm-7 col-md-6 col-lg-3">
                    <div class="wsus__footer_content">
                        <a class="wsus__footer_2_logo" href="#">
                            <img src="images/logo_2.png" alt="logo">
                        </a>
                        <a class="action" href="callto:+8896254857456"><i class="fas fa-phone-alt"></i>
                            +8896254857456</a>
                        <a class="action" href="mailto:example@gmail.com"><i class="far fa-envelope"></i>
                            example@gmail.com</a>
                        <p><i class="fal fa-map-marker-alt"></i> San Francisco City Hall, San Francisco, CA</p>
                        <ul class="wsus__footer_social">
                            <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                            <li><a class="pinterest" href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a class="behance" href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-5 col-md-4 col-lg-2">
                    <div class="wsus__footer_content">
                        <h5>Company</h5>
                        <ul class="wsus__footer_menu">
                            <li><a href="#"><i class="fas fa-caret-right"></i> About Us</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Team Member</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Career</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Affilate</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Order History</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Team Member</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-5 col-md-4 col-lg-2">
                    <div class="wsus__footer_content">
                        <h5>Company</h5>
                        <ul class="wsus__footer_menu">
                            <li><a href="#"><i class="fas fa-caret-right"></i> About Us</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Team Member</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Career</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Contact Us</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Affilate</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Order History</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Team Member</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-7 col-md-8 col-lg-5">
                    <div class="wsus__footer_content wsus__footer_content_2">
                        <h3>Subscribe To Our Newsletter</h3>
                        <p>Get all the latest information on Events, Sales and Offers.
                            Get all the latest information on Events.</p>
                        <form>
                            <input type="text" placeholder="Search...">
                            <button type="submit" class="common_btn">subscribe</button>
                        </form>
                        <div class="footer_payment">
                            <p>We're using safe payment for :</p>
                            <img src="images/credit2.png" alt="card" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wsus__footer_bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__copyright d-flex justify-content-center">
                            <p>Copyright © 2021 Sazao shop. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--============================
        FOOTER PART END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{asset('FrontendData/js/jquery-3.6.0.min.js')}}"></script>
    <!--bootstrap js-->
    <script src="{{asset('FrontendData/js/bootstrap.bundle.min.js')}}"></script>
    <!--font-awesome js-->
    <script src="{{asset('FrontendData/js/Font-Awesome.js')}}"></script>
    <!--select2 js-->
    <script src="{{asset('FrontendData/js/select2.min.js')}}"></script>
    <!--slick slider js-->
    <script src="{{asset('FrontendData/js/slick.min.js')}}"></script>
    <!--simplyCountdown js-->
    <script src="{{asset('FrontendData/js/simplyCountdown.js')}}"></script>
    <!--product zoomer js-->
    <script src="{{asset('FrontendData/js/jquery.exzoom.js')}}"></script>
    <!--nice-number js-->
    <script src="{{asset('FrontendData/js/jquery.nice-number.min.js')}}"></script>
    <!--counter js-->
    <script src="{{asset('FrontendData/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('FrontendData/js/jquery.countup.min.js')}}"></script>
    <!--add row js-->
    <script src="{{asset('FrontendData/js/add_row_custon.js')}}"></script>
    <!--multiple-image-video js-->
    <script src="{{asset('FrontendData/js/multiple-image-video.js')}}"></script>
    <!--sticky sidebar js-->
    <script src="{{asset('FrontendData/js/sticky_sidebar.js')}}"></script>
    <!--price ranger js-->
    <script src="{{asset('FrontendData/js/ranger_jquery-ui.min.js')}}"></script>
    <script src="{{asset('FrontendData/js/ranger_slider.js')}}"></script>
    <!--isotope js-->
    <script src="{{asset('FrontendData/js/isotope.pkgd.min.js')}}"></script>
    <!--venobox js-->
    <script src="{{asset('FrontendData/js/venobox.min.js')}}"></script>
    <!--classycountdown js-->
    <script src="{{asset('FrontendData/js/jquery.classycountdown.js')}}"></script>

    <!--main/custom js-->
    <script src="{{asset('FrontendData/js/main.js')}}"></script>
</body>

</html>