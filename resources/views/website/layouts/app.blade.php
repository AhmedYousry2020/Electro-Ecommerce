<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hmart - Home One</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('website_files/images/favicon.ico')}}" />
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{asset('website_files/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('website_files/css/font.awesome.css')}}" />
    <link rel="stylesheet" href="{{asset('website_files/css/pe-icon-7-stroke.css')}}" />
    <link rel="stylesheet" href="{{asset('website_files/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('website_files/css/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('website_files/css/venobox.css')}}">
    <link rel="stylesheet" href="{{asset('website_files/css/jquery-ui.min.css')}}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('website_files/css/style.css')}}">
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <style type="text/css">

img{

border-radius: 3px;

}

p{

color: #a1a1a1;

}

.search-element ul{

width: 100%;

}


/* .typeahead{
    background-color: whitesmoke;
} */

</style>

</head>

<body>
    <div class="main-wrapper">
        <header>
            <!-- Header top area start -->
            <div class="header-top">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col">
                            <div class="welcome-text">
                                <p>World Wide Completely Free Returns and Shipping</p>
                            </div>
                        </div>
                        <div class="col d-none d-lg-block">
                            <div class="top-nav">
                                <ul>
                                    <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                                    <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> demo@example.com</a></li>
                                    <li><a href="{{route('account.dashboard')}}"><i class="fa fa-user"></i> Account</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header top area end -->
            <!-- Header action area start -->
            <div class="header-bottom  d-none d-lg-block">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{asset('website_files/images/logo/logo.png')}}" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="search-element">
                        <form action="{{route('home')}}" method="get">
                            @csrf
                            <input type="text" placeholder="Search"  autocomplete="off" class="typeahead sea-view" name="searchBy" />
                            <button type="submit"><i class="pe-7s-search"></i></button>
                        </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col">
                            <div class="header-actions">
                                <!-- Single Wedge Start -->
                                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <!-- Single Wedge End -->
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                    <i class="pe-7s-shopbag"></i>
                                  @auth
                                   @if($cart = Auth::user()->carts->where("status","1")->first())
                                   <span class="header-action-num">

                                   {{$cart->products->count()}}

                                  </span>
                                   @else
                                  <span class="header-action-num">

                                   0
                                  </span>
                                  @endif

                                   @endauth
                                  @guest

                                   <span class="header-action-num">

                                    {{\Gloudemans\Shoppingcart\Facades\Cart::content()->count()}}
                                   </span>

                                  @endguest
                                    <!-- <span class="cart-amount">€30.00</span> -->
                                </a>
                                <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->
            <!-- Header action area start -->
            <div class="header-bottom d-lg-none sticky-nav style-1">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-3 col">
                            <div class="header-logo">
                                <a href="index.html"><img src="{{asset('website_files/images/logo/logo.png')}}" alt="Site Logo" /></a>
                            </div>
                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="search-element">
                            <form action="{{route('home')}}" method="get">
                            @csrf
                            <input type="text" placeholder="Search" autocomplete="off" class="typeahead sea-view" name="searchBy" />
                            <button type="submit"><i class="pe-7s-search"></i></button>
                        </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col">
                            <div class="header-actions">
                                <!-- Single Wedge Start -->
                                <a href="#offcanvas-wishlist" class="header-action-btn offcanvas-toggle">
                                    <i class="pe-7s-like"></i>
                                </a>
                                <!-- Single Wedge End -->
                                <a href="#offcanvas-cart" class="header-action-btn header-action-btn-cart offcanvas-toggle pr-0">
                                    <i class="pe-7s-shopbag"></i>
                                    @auth
                                   @if($cart = Auth::user()->carts->where("status","1")->first())
                                   <span class="header-action-num">

                                   {{$cart->products->count()}}

                                  </span>
                                  @else
                                  <span class="header-action-num">

                                   0
                                  </span>
                                  @endif

                                   @endauth
                                   @guest
                                    <span class="header-action-num">

                                  {{Cart::content()->count()}}
                                   </span>
                                  @endguest
                                </a>
                                <a href="#offcanvas-mobile-menu" class="header-action-btn header-action-btn-menu offcanvas-toggle d-lg-none">
                                    <i class="pe-7s-menu"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header action area end -->
            <!-- header navigation area start -->
            <div class="header-nav-area d-none d-lg-block sticky-nav">
                <div class="container">
                    <div class="header-nav">
                        <div class="main-menu position-relative">
                            <ul>
                                <li class="dropdown"><a href="{{route('home')}}">Home </i></a>

                                </li>

                                <li><a href="/about">About</a></li>

                                <li class="dropdown position-static"><a href="#">Products <i
                                    class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach($categories = App\Models\Category::all() as $category)
                                     <li><a href="/products?category_id={{$category->id}}"><span class="menu-text">{{$category->name}}</span></a></li>
                                     @endforeach

                                </ul>
                                </li>

                                <li class="dropdown position-static"><a href="#">Shop <i
                                    class="fa fa-angle-down"></i></a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Mobile Phones</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Samsung">Samsung</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Oppo">Oppo</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Redmi">Redmi</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Sony">Sony</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Huwaui">Huwaui</a>
                                                </li>
                                                <li><a href="{{route('home')}}?searchBy=Nokia">Nokia</a>
                                                </li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Laptops</a></li>
                                                <li><a href="{{route('home')}}?searchBy=HP">HP</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Dell">Dell</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Mac">Mac</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Samsung">Samsung</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Lenovo">Lenovo</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Toshiba">Toshiba</a></li>
                                            </ul>

                                        </li>
                                    </ul>
                                </li>
                                <!-- <li class="dropdown "><a href="#">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="dropdown position-static"><a href="blog-grid-left-sidebar.html">Blog Grid
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-list-left-sidebar.html">Blog List
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-single-left-sidebar.html">Single
                                                Blog <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-single.html">Single Blog</a>
                                                <li><a href="blog-single-left-sidebar.html">Single Blog Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-single-right-sidebar.html">Single Blog Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header navigation area end -->
            <div class="mobile-search-box d-lg-none">
                <div class="container">
                    <!-- mobile search start -->
                    <div class="search-element max-width-100">
                    <form action="{{route('home')}}" method="get">
                        @csrf
                        <input type="text" placeholder="Search" autocomplete="off" class="typeahead sea-view" name="searchBy" />
                        <button type="submit"><i class="pe-7s-search"></i></button>
                    </form>
                    </div>
                    <!-- mobile search start -->
                </div>
            </div>
        </header>
        <!-- offcanvas overlay start -->
        <div class="offcanvas-overlay"></div>
        <!-- offcanvas overlay end -->
        <!-- OffCanvas Wishlist Start -->
        @auth
        {{-- @if($wishlist = Auth::user()->wishlists->where("status","1")->first())
        <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
            <div class="inner">
                <div class="head">
                    <span class="title">Wishlist</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                        @foreach($wishlist->products as $product)
                        <li>
                            <a href="single-product.html" class="image"><img src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->images[0]->image)}}" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">{{$product->name}}</a>
                                <span class="quantity-price"> <span class="amount">EGP {{number_format($product->sale_price)}}</span></span>
                                <!-- <a href="#" class="remove">×</a> -->
                            </div>
                        </li>
                      @endforeach
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons">
                        <a href="{{route('wishlist.items')}}" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}
        <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
            <div class="inner">
                <div class="head">
                    <span class="title">Wishlist</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">

                </div>
                <!-- <div class="foot">
                    <div class="buttons">
                        <a href="{{route('wishlist.items')}}" class="btn btn-dark btn-hover-primary mt-30px">view wishlist</a>
                    </div>
                </div> -->
            </div>
        </div>
        @endauth
        @guest
        <div id="offcanvas-wishlist" class="offcanvas offcanvas-wishlist">
                    <div class="inner">
                        <div class="head">
                            <span class="title">Wishlist</span>
                            <button class="offcanvas-close">×</button>
                        </div>
                        <div class="body customScroll">

                        </div>
                        <div class="foot">
                            <!-- <div class="buttons mt-30px">
                                <a href="cart.html" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                                <a href="checkout.html" class="btn btn-outline-dark current-btn">checkout</a>
                            </div> -->
                        </div>
                    </div>
                </div>

         @endguest
        <!-- OffCanvas Wishlist End -->
        <!-- OffCanvas Cart Start -->
        @auth
        @if($cart = Auth::user()->carts->where("status","1")->first())

        <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
            <div class="inner">
                <div class="head">
                    <span class="title">Cart</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                    @foreach($cart->products as $product)
                        <li>
                            <a href="single-product.html" class="image"><img src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->image)}}" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">{{$product->name}}</a>
                                <span class="quantity-price">{{$product->pivot->quantity}} x <span class="amount">EGP {{number_format($product->sale_price)}}</span></span>
                                <form id ="removeItemFromCart-form" action="{{route('RemoveItemFromCart',$product->id)}}" method="post" style="display: none;">
                                                @csrf
                                                {{ method_field("delete") }}
                                                </form>
                                <a onclick="event.preventDefault();
                                                     document.getElementById('removeItemFromCart-form').submit();" class="remove">×</a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons mt-30px">
                        <a href="{{route('cart.items')}}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                        <a href="{{route('order.checkout')}}" class="btn btn-outline-dark current-btn">checkout</a>
                    </div>
                </div>
            </div>
        </div>

        @endif
        <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
            <div class="inner">
                <div class="head">
                    <span class="title">Cart</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">

                </div>
                <div class="foot">
                    <div class="buttons mt-30px">
                        <!-- <a href="{{route('cart.items')}}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                        <a href="{{route('order.checkout')}}" class="btn btn-outline-dark current-btn">checkout</a> -->
                    </div>
                </div>
            </div>
        </div>
        @endauth
        @guest
        <div id="offcanvas-cart" class="offcanvas offcanvas-cart">
            <div class="inner">
                <div class="head">
                    <span class="title">Cart</span>
                    <button class="offcanvas-close">×</button>
                </div>
                <div class="body customScroll">
                    <ul class="minicart-product-list">
                    @foreach(Cart::content() as $row)

                        <li>
                            <a href="single-product.html" class="image"><img src="{{asset('storage/uploads/product_images/'.$row->name.'/'.$row->image)}}" alt="Cart product Image"></a>
                            <div class="content">
                                <a href="single-product.html" class="title">{{$row->name}}</a>
                                <span class="quantity-price">{{$row->qty}} x <span class="amount">EGP {{number_format($row->price)}}</span></span>
                                <form id ="removeItemFromCart-form" action="{{route('RemoveItemFromCart',$row->id)}}" method="post" style="display: none;">
                                                @csrf
                                                {{ method_field("delete") }}
                                                </form>
                                <a onclick="event.preventDefault();
                                                     document.getElementById('removeItemFromCart-form').submit();" class="remove">×</a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
                <div class="foot">
                    <div class="buttons mt-30px">
                        <a href="{{route('cart.items')}}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                        <a href="{{route('order.checkout')}}" class="btn btn-outline-dark current-btn">checkout</a>
                    </div>
                </div>
            </div>
        </div>

        @endguest
        <!-- OffCanvas Cart End -->
        <!-- OffCanvas Menu Start -->
        <div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
            <button class="offcanvas-close"></button>
            <div class="user-panel">
                <ul>
                    <li><a href="tel:0123456789"><i class="fa fa-phone"></i> +012 3456 789</a></li>
                    <li><a href="mailto:demo@example.com"><i class="fa fa-envelope-o"></i> demo@example.com</a></li>
                    <li><a href="{{route('account.dashboard')}}"><i class="fa fa-user"></i> Account</a></li>
                </ul>
            </div>
            <div class="inner customScroll">
                <div class="offcanvas-menu mb-4">
                <ul>
                                <li class="dropdown"><a href="{{route('home')}}">Home </i></a>

                                </li>

                                <li><a href="/about">About</a></li>

                                <li class="dropdown position-static"><a href="#">Products <i
                                    class="fa fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach($categories = App\Models\Category::all() as $category)
                                     <li><a href="/products?category_id={{$category->id}}"><span class="menu-text">{{$category->name}}</span></a></li>
                                     @endforeach

                                </ul>
                                </li>

                                <li class="dropdown position-static"><a href="#">Shop <i
                                    class="fa fa-angle-down"></i></a>
                                    <ul class="mega-menu d-block">
                                        <li class="d-flex">
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Mobile Phones</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Samsung">Samsung</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Oppo">Oppo</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Redmi">Redmi</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Sony">Sony</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Huwaui">Huwaui</a>
                                                </li>
                                                <li><a href="{{route('home')}}?searchBy=Nokia">Nokia</a>
                                                </li>
                                            </ul>
                                            <ul class="d-block">
                                                <li class="title"><a href="#">Laptops</a></li>
                                                <li><a href="{{route('home')}}?searchBy=HP">HP</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Dell">Dell</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Mac">Mac</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Samsung">Samsung</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Lenovo">Lenovo</a></li>
                                                <li><a href="{{route('home')}}?searchBy=Toshiba">Toshiba</a></li>
                                            </ul>
                                </li>
                                <!-- <li class="dropdown "><a href="#">Blog <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub-menu">
                                        <li class="dropdown position-static"><a href="blog-grid-left-sidebar.html">Blog Grid
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                                <li><a href="blog-grid-left-sidebar.html">Blog Grid Left Sidebar</a></li>
                                                <li><a href="blog-grid-right-sidebar.html">Blog Grid Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-list-left-sidebar.html">Blog List
                                                <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-list-left-sidebar.html">Blog List Left Sidebar</a></li>
                                                <li><a href="blog-list-right-sidebar.html">Blog List Right Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown position-static"><a href="blog-single-left-sidebar.html">Single
                                                Blog <i class="fa fa-angle-right"></i></a>
                                            <ul class="sub-menu sub-menu-2">
                                                <li><a href="blog-single.html">Single Blog</a>
                                                <li><a href="blog-single-left-sidebar.html">Single Blog Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-single-right-sidebar.html">Single Blog Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> -->
                                <li><a href="/contact">Contact</a></li>
                            </ul>
                </div>
                <!-- OffCanvas Menu End -->
                <div class="offcanvas-social mt-auto">
                    <ul>
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-google"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- OffCanvas Menu End -->

        <!-- content start -->
        @yield("content")
        <!-- content end -->

         <!-- Footer Area Start -->
         <div class="footer-area">
            <div class="footer-container">
                <div class="footer-top">
                    <div class="container">
                        <div class="row">
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 mb-md-30px mb-lm-30px">
                                <div class="single-wedge">
                                    <div class="footer-logo">

                                        <a href="index.html"><img src="{{asset('website_files/images/logo/footer-logo.png')}}" alt=""></a>
                                    </div>
                                    <p class="about-text">Lorem ipsum dolor sit amet consl adipisi elit, sed do eiusmod templ incididunt ut labore
                                    </p>
                                    <ul class="link-follow">
                                        <li>
                                            <a class="m-0" title="Twitter" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-facebook"
                                                aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a title="Tumblr" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-tumblr" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Facebook" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a title="Instagram" target="_blank" rel="noopener noreferrer" href="#"><i class="fa fa-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-60px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Services</h4>
                                    <div class="footer-links">
                                        <div class="footer-row">
                                            <ul class="align-items-center">
                                                <li class="li"><a class="single-link" href="{{route('account.dashboard')}}">My Account</a></li>
                                                <li class="li"><a class="single-link" href="/contact">Contact</a></li>
                                                <li class="li"><a class="single-link" href="{{route('cart.items')}}">Shopping cart</a></li>
                                                <li class="li"><a class="single-link" href="{{route('home')}}">Shop</a></li>
                                                <li class="li"><a class="single-link" href="{{route('account.dashboard')}}">Services Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-6 mb-lm-30px pl-lg-40px">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">My Account</h4>
                                    <div class="footer-links">
                                        <div class="footer-row">
                                            <ul class="align-items-center">
                                                <li class="li"><a class="single-link" href="{{route('account.dashboard')}}">My Account</a></li>
                                                <li class="li"><a class="single-link" href="/contact">Contact</a></li>
                                                <li class="li"><a class="single-link" href="{{route('cart.items')}}">Shopping cart</a></li>
                                                <li class="li"><a class="single-link" href="{{route('home')}}">Shop</a></li>
                                                <li class="li"><a class="single-link" href="{{route('account.dashboard')}}">Services Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                            <!-- Start single blog -->
                            <div class="col-md-6 col-lg-3 col-sm-12">
                                <div class="single-wedge">
                                    <h4 class="footer-herading">Contact Info</h4>
                                    <div class="footer-links">
                                        <!-- News letter area -->
                                        <p class="address">Address: Your Address Goes Here.</p>
                                        <p class="phone">Phone/Fax:<a href="tel:0123456789"> 0123456789</a></p>
                                        <p class="mail">Email:<a href="mailto:demo@example.com"> demo@example.com</a></p>
                                        <p class="mail"><a href="https://demo@example.com"> demo@example.com</a></p>
                                        <!-- News letter area  End -->
                                    </div>
                                </div>
                            </div>
                            <!-- End single blog -->
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="container">
                        <div class="line-shape-top line-height-1">
                            <div class="row flex-md-row-reverse align-items-center">
                                <div class="col-md-6 text-center text-md-end">
                                    <div class="payment-mth"><a href="#"><img class="img img-fluid" src="{{asset('website_files/images/icons/payment.png')}}" alt="payment-image"></a></div>
                                </div>
                                <div class="col-md-6 text-center text-md-start">
                                    <p class="copy-text"> © 2021 <strong>Hmart</strong> Made With <i class="fa fa-heart"
                                        aria-hidden="true"></i> By <a class="company-name" href="https://themeforest.net/user/codecarnival/portfolio">
                                            <strong> Codecarnival </strong></a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Area End -->
    </div>

      <!-- Global Vendor, plugins JS -->
    <!-- JS Files
    ============================================ -->
    <script src="{{asset('website_files/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('website_files/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('website_files/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('website_files/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('website_files/js/plugins/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('website_files/js/plugins/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('website_files/js/plugins/scrollUp.js')}}"></script>
    <script src="{{asset('website_files/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('website_files/js/plugins/jquery-ui.min.js')}}"></script>
    <script src="{{asset('website_files/js/plugins/mailchimp-ajax.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">

var path = "{{ route('autocomplete') }}";

$('input.typeahead').typeahead({

    source:  function (query, process) {

        return $.get(path, { query: query }, function (data) {

            return process(data);

        });

    },

    highlighter: function (item, data) {

        var parts = item.split('#'),

            html = '<div class="row link-view" data-href="'+data.link+'">';
            //html += '<a href="'+data.link+'" >';

            html += '<div class="col-md-3" style="margin-top: 8px;">';

            html += '<img calss="link-view" src="{{asset("/storage/uploads/product_images")}}'+'/'+data.name+'/'+ data.image+'"/ height="44px;" width="65px;">';

            html += '</div>';

            html += '<div class="col-md-7 pl-0">';

            html += '<span>'+data.name+'</span>';

            html += '<p class="m-0">'+ 'EGP ' +data.sale_price+'</p>';


            html += '</div>';

            //html += '</a>';

            html += '</div>';


        return html;

    }

});

</script>
<script>
$(document).ready(function(){
    $('.sea-view').change(function(){
        var link = $(".link-view").data("href");

   window.location.href= link;
})
});



</script>

    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

@yield("scripts")
    <!--Main JS (Common Activation Codes)-->
    <script src="{{asset('website_files/js/main.js')}}"></script>
</body>

</html>

