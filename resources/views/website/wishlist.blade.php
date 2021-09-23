@extends("website.layouts.app")
@section("content")
<style>
.breadcrumb-area .breadcrumb-title {
    color: #000
} 
.breadcrumb-list li a{
    color: #000
}
</style>
<!-- breadcrumb-area start -->
<div class="breadcrumb-area" data-bg-image="{{asset('website_files/images/breadcrunb-bg.webp')}}">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">WishList</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">WishList</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
  <!-- Wishlist Area Start -->
  <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your WishList items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Until Price</th>
                                          
                                            <th>Add To Cart</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($wishlist->products as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px" src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->images[0]->image)}}" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$product->name}}</a></td>
                                            <td class="product-name"><a href="#">{{$product->category->name}}</a></td>
                                            <td class="product-price-cart"><span class="amount">EGP {{number_format($product->sale_price)}}</span></td>
                                            
                                           
                                            <td class="product-wishlist-cart">
                                                <a href="{{route('product.details',$product->id)}}">Back To View</a>
                                            </td>
                                        </tr>
                                    @endforeach  
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Area End -->

      @endsection  