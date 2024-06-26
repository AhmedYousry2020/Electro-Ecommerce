@extends("website.layouts.app")
@section("content")

 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">{{$product->name}}</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Product</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
        <!-- Product Details Area Start -->
        <div class="product-details-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container zoom-top">
                            <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->image)}}" alt="">
                                    <a class="venobox full-preview" data-gall="myGallery" href="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->image)}}">
                                        <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                    <img class="img-responsive m-auto" src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->image)}}" alt="">
                            </div>
                            </div>

                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content ml-25px">
                            <h2>{{$product->name}}</h2>
                            <div class="pricing-meta">
                                <ul class="d-flex">
                                    <li class="new-price">EGP {{number_format($product->sale_price)}}</li>
                                </ul>
                            </div>
                            <div class="pro-details-rating-wrap">
                                <div class="rating-product">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#">(5 Customer Review)</a></span>
                            </div>
                            <p class="mt-30px">{{$product->description}}</p>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>SKU:</span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">{{$product->SKU}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Categories: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Smart Device, </a>
                                    </li>
                                    <li>
                                        <a href="#">ETC</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0">
                                <span>Tags: </span>
                                <ul class="d-flex">
                                    <li>
                                        <a href="#">Smart Device, </a>
                                    </li>
                                    <li>
                                        <a href="#">Phone</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="pro-details-quality">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                </div>
                                <div class="pro-details-cart">
                                <form id="AddToCart-form" action="{{route('AddToCart')}}" method="POST" style="display: none;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <input type="hidden" class ="quantity" name="quantity" value="1">
                                </form>
                                    <button onclick="event.preventDefault();
                                                     document.getElementById('AddToCart-form').submit();" class="add-cart"> Add To
                                        Cart</button>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <form id="AddToWishList-form" action="{{route('AddItemToWishList')}}" method="POST" style="display:none">
                                  @csrf

                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                </form>
                                    <a onclick="event.preventDefault();
                                                     document.getElementById('AddToWishList-form').submit();"><i class="pe-7s-like"></i></a>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                    <a href="compare.html"><i class="pe-7s-refresh-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area start -->
                        <div class="description-review-wrapper">
                            <div class="description-review-topbar nav">
                                <button data-bs-toggle="tab" class="active" data-bs-target="#des-details1">Information</button>
                                <button  data-bs-toggle="tab" data-bs-target="#des-details2">Description</button>
                                <button data-bs-toggle="tab" data-bs-target="#des-details3">Reviews (02)</button>
                            </div>
                            <div class="tab-content description-review-bottom">
                                <div id="des-details1" class="tab-pane active">
                                    <div class="product-anotherinfo-wrapper text-start">
                                       {!!$product->details!!}
                                    </div>
                                </div>
                                <div id="des-details2" class="tab-pane">
                                    <div class="product-description-wrapper">
                                        <p>
                                            {{$product->description}}
                                        </p>
                                    </div>
                                </div>
                                <div id="des-details3" class="tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="review-wrapper">
                                                <div class="single-review">
                                                    <div class="review-img">
                                                        <img src="assets/images/review-image/1.png" alt="" />
                                                    </div>
                                                    <div class="review-content">
                                                        <div class="review-top-wrap">
                                                            <div class="review-left">
                                                                <div class="review-name">
                                                                    <h4>White Lewis</h4>
                                                                </div>
                                                                <div class="rating-product">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-left">
                                                                <a href="#">Reply</a>
                                                            </div>
                                                        </div>
                                                        <div class="review-bottom">
                                                            <p>
                                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                                cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                                euismod vehicula. Phasellus quam nisi, congue id nulla.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-review child-review">
                                                    <div class="review-img">
                                                        <img src="assets/images/review-image/2.png" alt="" />
                                                    </div>
                                                    <div class="review-content">
                                                        <div class="review-top-wrap">
                                                            <div class="review-left">
                                                                <div class="review-name">
                                                                    <h4>White Lewis</h4>
                                                                </div>
                                                                <div class="rating-product">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            </div>
                                                            <div class="review-left">
                                                                <a href="#">Reply</a>
                                                            </div>
                                                        </div>
                                                        <div class="review-bottom">
                                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                                cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                                euismod vehicula.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="ratting-form-wrapper pl-50">
                                                <h3>Add a Review</h3>
                                                <div class="ratting-form">
                                                    <form action="#">
                                                        <div class="star-box">
                                                            <span>Your rating:</span>
                                                            <div class="rating-product">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="rating-form-style">
                                                                    <input placeholder="Name" type="text" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="rating-form-style">
                                                                    <input placeholder="Email" type="email" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="rating-form-style form-submit">
                                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                                    <button class="btn btn-primary btn-hover-color-primary " type="submit" value="Submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details description area end -->

                    </div>
                </div>
            </div>
        </div>
     <!-- Product Area Start -->
     <div class="product-area related-product">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center m-0">
                            <h2 class="title">Related Products</h2>
                            <p>There are many variations of passages of Lorem Ipsum available</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="new-product-slider swiper-container slider-nav-style-1">
                            <div class="swiper-wrapper">
                               @foreach ($products as $product)
                               <div class="swiper-slide">
                                    <!-- Single Prodect -->
                                    <div class="product">
                                        <span class="badges">
                                        <span class="new">New</span>
                                        </span>
                                        <div class="thumb">
                                            <a href="{{route('product.details',$product->id)}}" class="image">
                                                <img src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->image)}}" alt="Product" />
                                                <img class="hover-image" src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->image)}}" alt="Product" />
                                            </a>
                                        </div>
                                        <div class="content">
                                            <span class="category"><a href="#">{{$product->category->name}}</a></span>
                                            <h5 class="title"><a href="single-product.html">Modern Smart Phone
                                                </a>
                                            </h5>
                                            <span class="price">
                                            <span class="new">EGP {{number_format($product->sale_price)}}</span>
                                            </span>
                                        </div>
                                        <div class="actions">
                                        <form id="AddToCart-form-{{$product->id}}" action="{{route('AddToCart')}}" method="POST">
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
        <!-- Product Area End -->

@endsection

@section("scripts")
<script>

$(document).ready(function(){
    $(document).on('click', '.inc', function (event) {

    $('.quantity').val($('.cart-plus-minus-box').val());

});
$(document).on('click', '.dec', function (event) {

    $('.quantity').val($('.cart-plus-minus-box').val());

});
});


</script>
@endsection
