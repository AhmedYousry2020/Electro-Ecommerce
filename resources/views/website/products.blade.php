@extends("website.layouts.app")
@section("content")
<style>
.page-item.active .page-link{
    z-index: 3;
color: #fff;
background-color: #0d6efd;
border-color: #0d6efd;
color: #266bf9;
border-color: #266bf9;
background: #fff;
padding: 0;
height: 50px;
background: #fff;
display: inline-block;
width: 50px;
border-radius: 5px;
text-align: center;
vertical-align: top;
font-size: 18px;
-webkit-transition: all .3s ease 0s;
transition: all .3s ease 0s;
border-color: #266bf9;
font-weight: 600;
line-height: 50px;
outline: 0;
border-width: 2px;
border-style: solid;
} 

</style>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Smart devices</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
                
         
       <!-- Shop Page Start  -->
       <div class="shop-category-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Shop Top Area Start -->
                        <div class="shop-top-bar d-flex">
                            <p class="compare-product"> <span>4</span> Product Found of <span>4</span></p>
                            <!-- Left Side End -->
                            <div class="shop-tab nav">
                                <!-- <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                                    <i class="fa fa-th" aria-hidden="true"></i>
                                </button>
                                <button data-bs-target="#shop-list" data-bs-toggle="tab">
                                    <i class="fa fa-list" aria-hidden="true"></i>
                                </button> -->
                            </div>
                            <!-- Right Side Start -->
                            <div class="select-shoing-wrap d-flex align-items-center">
                                <div class="shot-product">
                                    <p>Sort By:</p>
                                </div>
                                <!-- Single Wedge End -->
                                <div class="header-bottom-set dropdown">
                                    <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">Default <i class="fa fa-angle-down"></i></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a class="dropdown-item" href="#">Name, A to Z</a></li>
                                        <li><a class="dropdown-item" href="#">Name, Z to A</a></li>
                                        <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                                        <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                                        <li><a class="dropdown-item" href="#">Sort By new</a></li>
                                        <li><a class="dropdown-item" href="#">Sort By old</a></li>
                                    </ul>
                                </div>
                                <!-- Single Wedge Start -->
                            </div>
                            <!-- Right Side End -->
                        </div>
                        <!-- Shop Top Area End -->
                        <!-- Shop Bottom Area Start -->
                        <div class="shop-bottom-area">
                            <!-- Tab Content Area Start -->
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="shop-grid">
                                            <div class="row mb-n-30px">
                                               @foreach($products as $product)
                                                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-6 mb-30px">
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
                                        </div>
                                      </div>
                                </div>
                            </div>
                            </div>
                            <!-- Tab Content Area End -->
                            <!--  Pagination Area Start -->
                            <div class="pro-pagination-style text-center text-lg-end" data-aos="fade-up" data-aos-delay="200">
                                <div class="pages">
                                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                            
                            <!--  Pagination Area End -->
                        </div>
                        <!-- Shop Bottom Area End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Page End  -->
        <!-- Product Area End -->
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