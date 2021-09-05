@extends('dashboard.layouts.app')
@section('content')

    <style>
     .table .actions form{
         display:inline
     }
     .card-header a{
         float:right
     }
     .card-header a i{
        padding: 0px 0px 0px 6px;
     }
    </style>

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Orders</a></li>
              <li class="breadcrumb-item active">index</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
      <div class="col-6 table-responsive">
      <div class="card">
              <div class="card-header">
                <h3 class="card-title">Order Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                  <table class="table table-striped">
                   
                    <tr>
                    <th>Total Products</th>
                    <td>{{$products->count()}}</td>
                    </tr>
                    <tr>
                    <th>Total Price</th>
                    <td>EGP {{$order->total_price}}</td>
                    </tr>
                    <tr>
                    <th>Date</th>
                    <td>{{$order->created_at}}</td>
                    </tr>
                    <tr>
                    <th>Checkout_Status</th>
                    <td>@if($order->status == 0)
                    <div class='badge badge-warning badge-lg'> Pending </div> 
                    @else
                    <div class='badge badge-success badge-lg'> Completed </div>
                    @endif  </td>
                    </tr>
                   
                   
                  </table>
                   <!-- /.card-body -->
            </div>
            <!-- /.card -->
                </div>
                </div>

                <div class="col-6 table-responsive">
                <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Details</h3>
                <!-- <a href="{{route('dashboard.products.create')}}" class="btn btn-primary btn-sm">Create new Product<i class="fas fa-plus"></i></a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-striped">
                   
                   <tr>
                   <th>Name</th>
                   <td>{{$order->user->name}}</td>
                   </tr>
                   <tr>
                   <th>Email</th>
                   <td>{{$order->user->email}}</td>
                   </tr>
                   <tr>
                   <th>Address</th>
                   <td>Egypt,giza</td>
                   </tr>
                   <tr>
                   <th>Status</th>
                   <td><div class='badge badge-info badge-lg'>New Customer</div></td>
                   </tr>
                   
                   
                  
                  
                 </table>
                   <!-- /.card-body -->
            </div>
            <!-- /.card -->
                </div>
      </div>
      </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Product List</h3>
                <!-- <a href="{{route('dashboard.products.create')}}" class="btn btn-primary btn-sm">Create new Product<i class="fas fa-plus"></i></a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>color</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                  </tr>
                  </thead>
                  <tbody>
                 @foreach($products as $index =>$product)
                  <tr>
                    <td>{{$index + 1}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td> 
                    <td>{{$product->color}}</td>
        
                    <td>
                       {{$product->pivot->quantity}}  
                    </td>
                    <td>
                      EGP {{$product->sale_price}}  
                    </td>
                   <td>
                   <img src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$product->images[0]->image)}}" alt="" style="width: 90px;height:90px" class="img-thumbnail">
                   </td>
                  </tr>
               

                  @endforeach
                  <tfoot>
                  <tr>
                  <th>#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>color</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Image</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
 
@endsection

