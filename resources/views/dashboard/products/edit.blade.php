@extends('dashboard.layouts.app')
@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Products</a></li>
              <li class="breadcrumb-item active">Edit</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <!-- general form elements -->
        <div class="col-md-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Product</h3>
              </div>
              
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('dashboard.products.update',$product->id)}}" method="post">
              @csrf
              {{ method_field('PATCH') }}

                <div class="card-body">
                @include('dashboard.partials._errors')
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter product name" name="name" value="{{$product->name}}">
                  </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="1" placeholder="Enter product description" name="description">{{$product->description}}</textarea>
                  </div>
                                        
                   <!-- textarea -->
                   <div class="form-group">
                        <label>Details</label>
                        <textarea class="form-control" rows="3" id="editor1" rows="10" cols="80"  name="details" >{{$product->details}}
                      </textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Purchase_price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="5000" name="purchase_price" value="{{$product->purchase_price}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sale_price</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="6500" name="sale_price" value="{{$product->sale_price}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Stock</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Enter stock" name="stock" value="{{$product->stock}}">
                  </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control select2bs4" style="width: 100%;" name="category_id">
                        <option selected="selected">Select a Category</option>
                        @foreach($categories as $category)
                       
                        <option value="{{$category->id}}" 
                         <?php 
                         if($category->id == $product->category->id){
                           echo "selected";
                         }
                         ?>
                          >{{$category->name}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                  <label>Color</label>

                  <div class="input-group my-colorpicker2">
                    <input type="text" class="form-control" name="color" value={{$product->color}}>

                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-square"></i></span>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
               <!-- /.card-body -->
               </div>  
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  
@endsection