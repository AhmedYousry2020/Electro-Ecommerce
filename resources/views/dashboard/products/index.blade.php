@extends('dashboard.layouts.app')
@section('content')

    <style>
     .table .actions{
      display: flex;
     }
     .actions button{
       margin-left:4px

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
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Products</a></li>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products List</h3>

                @if(Auth::guard('admin')->user()->type == 'artist')
                <a href="{{route('dashboard.products.create')}}" class="btn btn-primary btn-sm">Create new Product<i class="fas fa-plus"></i></a>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Approve</th>
                    <th>Category</th>

                    <th>Acion</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($products as $product)

                  <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>
                        @if($product->approved == 1)
                        <div class='badge badge-success badge-lg'> Approved </div>

                        @else
                        <div class='badge badge-warning badge-lg'> Pending </div>

                        @endif
                    </td>
                    <td>{{$product->category->name}}</td>
                    <!-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$product->id}}">
 View Images
</button> -->

                    <td class="actions">
                    <a href="{{route('dashboard.products.edit',$product->id)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>

                    <form action="{{route('dashboard.products.destroy',$product->id)}}" method="post">
                    @csrf
                    {{ method_field("delete") }}
                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </form>
                    @if(Auth::guard('admin')->user()->type == 'admin' && $product->approved == 0)
                    <form action="{{route('dashboard.products.approve',$product->id)}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">Approve</a>
                        </form>
                        @endif
                    </td>
                  </tr>
                  @endforeach


                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Approve</th>

                    <th>Category</th>

                    <th>Acion</th>
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
  <!-- Modal -->
@isset($product)
<div class="modal fade" id="exampleModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Images</h5>

      </div>
      <div class="modal-body">
      @if(isset($product->images))
        <row>

      @foreach($product->images as $image)
      <td><img src="{{asset('storage/uploads/product_images/'.$product->name.'/'.$image->image)}}" alt="" style="width: 90px;" class="img-thumbnail"></td>

      @endforeach

        </row>
      @else
      <row> not found </row>
      @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
@endisset
@endsection

