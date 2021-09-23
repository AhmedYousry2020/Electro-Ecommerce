@extends("website.layouts.app")
@section("content")

<div class="section ">
            <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1">
                <!-- Hero slider Active -->
                <div class="swiper-wrapper">
                    <!-- Single slider item -->
                    <div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="{{asset('website_files/images/hero/bg/hero-bg-1.webp')}}">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                    <div class="hero-slide-content slider-animated-1">
                                        <span class="category">Welcome To Hmart</span>
                                        <h2 class="title-1">Your Home <br>
                                        Smart Devices & <br>
                                         Best Solution </h2>
                                        <a href="#" class="btn btn-primary text-capitalize">Shop All Devices</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                    <div class="show-case">
                                        <div class="hero-slide-image">
                                            <img src="{{asset('website_files/images/hero/inner-img/hero-1-1.png')}}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single slider item -->
                    <div class="hero-slide-item slider-height swiper-slide bg-color1" data-bg-image="{{asset('website_files/images/hero/bg/hero-bg-1.webp')}}">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                    <div class="hero-slide-content slider-animated-1">
                                        <span class="category">Welcome To Hmart</span>
                                        <h2 class="title-1">Your Home <br>
                                        Smart Devices & <br>
                                         Best Solution </h2>
                                        <a href="#" class="btn btn-primary text-capitalize">Shop All Devices</a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                    <div class="show-case">
                                        <div class="hero-slide-image">
                                            <img src="{{asset('website_files/images/hero/inner-img/hero-1-2.png')}}" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Slider -->
                <!-- Banner Area Start -->
        <div class="banner-area style-two pt-100px pb-100px">
            
        </div>
        <!-- Banner Area End -->
                <!-- Product Area Start -->
        <div class="product-area pb-100px">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">New Products</h2>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="row mb-n-30px">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px">
                                <!-- Single Prodect -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="new">New</span>
                                    </span>
                                    <div class="thumb">
                                        <a href="{{route('product.details',$product->id)}}" class="image">
                                            <img src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->images[0]->image)}}" alt="Product" />
                                           
                                            <img class="hover-image" src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->images[1]->image)}}" alt="Product" />
                                        </a>
                                    </div>
                                    
                                  
                                    <div class="content">
                                        <span class="category"><a href="#">{{$product->category->name}}</a></span>
                                        <h5 class="title"><a href="single-product.html">{{$product->name}}
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new">EGP {{number_format($product->sale_price)}}</span>
                                        </span>
                                    </div>
                                 
                                    <div class="actions">
                                    <form id="AddToCart-form-{{$product->id}}" action="{{route('AddToCart')}}" method="POST" style="display:none">
                                        @csrf 
                                        <input type="hidden" class ="quantity" name="quantity" value="1">
                                        
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                      </form>
                                      <form id="AddToWishList-form-{{$product->id}}" action="{{route('AddItemToWishList')}}" method="POST" style="display:none">
                                                  @csrf 
                                        
                                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                                    </form>
                                                <button title="Add To Cart" class="action add-to-cart" onclick="event.preventDefault();
                                                     document.getElementById('AddToCart-form-{{$product->id}}').submit();" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"><i
                                                    class="pe-7s-shopbag"></i></button>
                                                  
                                                <button class="action wishlist" title="Wishlist" onclick="event.preventDefault();
                                                     document.getElementById('AddToWishList-form-{{$product->id}}').submit();" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"><i
                                                        class="pe-7s-like"></i></button>
                                                <a href="{{route('product.details',$product->id)}}" title="Quick view" class="action quickview" data-link-action="quickview" ><i class="pe-7s-look"></i></a>
                                                <button class="action compare" title="Compare" data-bs-toggle="modal" data-bs-target="#exampleModal-Compare"><i
                                                        class="pe-7s-refresh-2"></i></button>
                                            </div>
                                </div>
                            </div>
                        @endforeach    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->
         <!-- Testimonial area start -->
         <div class="trstimonial-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center m-0">
                            <h2 class="title">Client Feedback</h2>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Swiper -->
                        <div class="swiper-container content-top slider-nav-style-1">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <div class="testi-content">
                                            <p>Lorem ipsum dolor sit amel adipiscing elit, sed do eiusll tempor incididunt ut laborj et dolore magna sed do eiusll tempor dolore.
                                            </p>
                                        </div>
                                        <div class="testi-author">
                                            <div class="author-image">
                                                <img class="img-responsive" src="{{asset('website_files/images/testimonial/1.webp')}}" alt="">
                                            </div>
                                            <div class="author-name">
                                                <h4 class="name">Regan Rosen<span>Client</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <div class="testi-content">
                                            <p>Lorem ipsum dolor sit amel adipiscing elit, sed do eiusll tempor incididunt ut laborj et dolore magna sed do eiusll tempor dolore.
                                            </p>
                                        </div>
                                        <div class="testi-author">
                                            <div class="author-image">
                                                <img class="img-responsive" src="{{asset('website_files/images/testimonial/1.webp')}}" alt="">
                                            </div>
                                            <div class="author-name">
                                                <h4 class="name">Regan Rosen<span>Client</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <div class="testi-content">
                                            <p>Lorem ipsum dolor sit amel adipiscing elit, sed do eiusll tempor incididunt ut laborj et dolore magna sed do eiusll tempor dolore.
                                            </p>
                                        </div>
                                        <div class="testi-author">
                                            <div class="author-image">
                                                <img class="img-responsive" src="{{asset('website_files/images/testimonial/1.webp')}}" alt="">
                                            </div>
                                            <div class="author-name">
                                                <h4 class="name">Regan Rosen<span>Client</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="testi-inner">
                                        <div class="testi-content">
                                            <p>Lorem ipsum dolor sit amel adipiscing elit, sed do eiusll tempor incididunt ut laborj et dolore magna sed do eiusll tempor dolore.
                                            </p>
                                        </div>
                                        <div class="testi-author">
                                            <div class="author-image">
                                                <img class="img-responsive" src="{{asset('website_files/images/testimonial/1.webp')}}" alt="">
                                            </div>
                                            <div class="author-name">
                                                <h4 class="name">Regan Rosen<span>Client</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial area end-->
          <!-- Fashion Area Start -->
          <div class="fashion-area" data-bg-image="{{asset('website_files/images/fashion/fashion-bg.webp')}}">
            <div class="container h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 text-center">
                        <h2 class="title"> <span>Smart Fashion</span> With Smart Devices </h2>
                        <a href="#" class="btn btn-primary text-capitalize m-auto">Shop All Devices</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fashion Area End -->
        <!-- Brand area start -->
        <div class="brand-area pt-100px pb-100px">
            <div class="container">
                <div class="brand-slider swiper-container">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="#"><img class=" img-fluid" src="{{asset('website_files/images/partner/1.png')}}" alt="" /></a>
                        </div>
                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="#"><img class=" img-fluid" src="{{asset('website_files/images/partner/1.png')}}" alt="" /></a>
                        </div>
                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="#"><img class=" img-fluid" src="{{asset('website_files/images/partner/1.png')}}" alt="" /></a>
                        </div>
                        <div class="swiper-slide brand-slider-item text-center">
                            <a href="#"><img class=" img-fluid" src="{{asset('website_files/images/partner/1.png')}}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand area end -->
 <!-- Modal Cart-->
  <!-- <div class="modal customize-class fade" id="exampleModal-Cart" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                    <div class="tt-modal-messages">
                        <i class="pe-7s-check"></i> Added to cart successfully!
                    </div>
                    <div class="tt-modal-product">
                        <div class="tt-img">
                            <img src="assets/images/product-image/1.webp" alt="Modern Smart Phone">
                        </div>
                        <h2 class="tt-title"><a href="#">Modern Smart Phone</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

@endsection