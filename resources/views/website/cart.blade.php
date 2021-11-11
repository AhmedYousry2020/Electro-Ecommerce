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
            <div class="container" >
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title">Cart</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                            <li class="breadcrumb-item active">Cart</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb-area end -->
           <!-- Cart Area Start -->
        @if(isset($cart))
        <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <form id ="updateCartItems-form" action="{{route('UpdateCartItems')}}" method="post" style="display: none;">
                                    @csrf                         
                                    @auth
                                    <tbody> 
                                       @foreach($cart->products as $product)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px" src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->images[0]->image)}}" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$product->name}}</a></td>
                                            <td class="product-price-cart"><span class="amount">EGP {{number_format($product->sale_price)}}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus" >
                                                    <input class="cart-plus-minus-box p-m-{{$product->id}}" type="text" data-id="{{$product->id}}" name="qtybutton" value="{{$product->pivot->quantity}}" />
                                                </div>
                                            </td>
                                             <input type="hidden" name="product_ids[]" value="{{$product->id}}">
                                             <input type="hidden" class ="quantity-{{$product->id}}" name="quantities[]"  value="{{$product->pivot->quantity}}">
                                            
                                            <td class="product-subtotal">EGP {{number_format($product->sale_price * $product->pivot->quantity)}}</td>
                                            <td class="product-remove">
                                                <a href="{{route('product.details',$product->id)}}"><i class="fa fa-pencil"></i></a>
                                                
                                               
                                                <a class="remove-item" data-id="{{$product->id}}" data-method="delete" ><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>
                                      @endforeach 
                                    </tbody>
                                    @endauth
                                    
                                    @guest
                                    <?php foreach(Cart::content() as $row) :?>
                                    
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px" src="{{asset('storage/uploads/product_images/'.$row->name.'/'.$row->image)}}" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">{{$row->name}}</a></td>
                                            <td class="product-price-cart"><span class="amount">EGP {{number_format($row->price)}}</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus" >
                                                    <input class="cart-plus-minus-box p-m-{{$row->id}}" type="text" data-id="{{$row->id}}" name="qtybutton" value="{{$row->qty}}" />
                                                </div>
                                            </td>
                                             <input type="hidden" name="product_ids[]" value="{{$row->id}}">
                                             <input type="hidden" class ="quantity-{{$row->id}}" name="quantities[]"  value="{{$row->qty}}">
                                            
                                            <td class="product-subtotal">EGP {{number_format($row->price * $row->qty)}}</td>
                                            <td class="product-remove">
                                                <a href="{{route('product.details',$row->id)}}"><i class="fa fa-pencil"></i></a>
                                                
                                               
                                                <a class="remove-item" data-id="{{$row->id}}" data-method="delete" ><i class="fa fa-times"></i></a>
                                            </td>
                                        </tr>

                                     <?php endforeach;?>   
                                    @endguest
                                </table>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <a href="{{route('home')}}">Continue Shopping</a>
                                        </div>
                                        <div class="cart-clear">
                                        <form id ="removeCart-form" action="{{route('cart.remove')}}" method="post" style="display: none;">
                                                @csrf
                                                {{ method_field("delete") }}
                                         </form>

                                        
                                            <button onclick="event.preventDefault();
                                                     document.getElementById('updateCartItems-form').submit();">Update Shopping Cart</button>
                                            <a onclick="event.preventDefault();
                                                     document.getElementById('removeCart-form').submit();">Clear Shopping Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                      
                        <div class="row">
                            <div class="col-lg-4 col-md-6 mb-lm-30px">
                                <div class="cart-tax">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>
                                    </div>
                                    <div class="tax-wrapper">
                                        <p>Enter your destination to get a shipping estimate.</p>
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label>
                                                    * Country
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Region / State
                                                </label>
                                                <select class="email s-email s-wid">
                                                    <option>Bangladesh</option>
                                                    <option>Albania</option>
                                                    <option>Åland Islands</option>
                                                    <option>Afghanistan</option>
                                                    <option>Belgium</option>
                                                </select>
                                            </div>
                                            <div class="tax-select mb-25px">
                                                <label>
                                                    * Zip/Postal Code
                                                </label>
                                                <input type="text" />
                                            </div>
                                            <button class="cart-btn-2" type="submit">Get A Quote</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 mb-lm-30px">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                                    </div>
                                    <div class="discount-code">
                                        <p>Enter your coupon code if you have one.</p>
                                        <form>
                                            <input type="text" required="" name="name" />
                                            <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 mt-md-30px">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total products <span>
                                    @auth
                                    EGP {{number_format($cart->total_price)}}
                                          
                                    @endauth
                                    @guest
                                    EGP {{Cart::pricetotal()}}
                                    @endguest    
                                    </span></h5>
                                    <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li><input type="checkbox" /> Standard <span>EGP 20.00</span></li>
                                            <li><input type="checkbox" /> Express <span>EGP 30.00</span></li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">Grand Total <span> 
                                    @auth
                                    EGP {{number_format($cart->total_price)}}      
                                    @endauth
                                    @guest
                                    EGP {{Cart::pricetotal()}}
                                    @endguest     </span></h4>
                                    <a href="{{route('order.checkout')}}">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
          <!-- Empty Cart area start -->
          <div class="empty-cart-area pb-100px pt-100px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-heading">
                            <h2>Your cart item</h2>
                        </div>
                        <div class="empty-text-contant text-center">
                            <i class="pe-7s-shopbag"></i>
                            <h3>There are no more items in your cart</h3>
                            <a class="empty-cart-btn" href="{{route('home')}}">
                                <i class="fa fa-arrow-left"> </i> Continue shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Empty Cart area end -->
        @endif
@endsection  

@section("scripts")
<script>

$(document).ready(function(){
   
    $(document).on('click', '.inc', function (event) {
        var id = $(this).parent('.cart-plus-minus').find(".cart-plus-minus-box").data("id"); 
       $('.quantity-'+id).val($(this).parent('.cart-plus-minus').find(".cart-plus-minus-box").val());
          
    // $('.quantity-'+id).val($('.p-m-'+id).val());

});
$(document).on('click', '.dec', function (event) {
    var id = $(this).parent('.cart-plus-minus').find(".cart-plus-minus-box").data("id"); 
       $('.quantity-'+id).val($(this).parent('.cart-plus-minus').find(".cart-plus-minus-box").val());
          
});

$('.remove-item').on('click',function(e){
e.preventDefault();

var url = $(this).data('url');

var method = $(this).data('method');
var id = $(this).data("id");
$.ajax({
url:'product/'+id+'/reomveItemFromCart',
type:'DELETE',
headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
success: function(){
    location.reload()
},
fail: function(xhr, textStatus, errorThrown){
    location.reload()
    }
});
setTimeout(() => {
    location.reload();
}, 300);

 });
});


</script>
@endsection