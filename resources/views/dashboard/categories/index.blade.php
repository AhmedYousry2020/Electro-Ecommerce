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
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Categories</a></li>
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
                <h3 class="card-title">Categories List</h3>
                <a href="{{route('dashboard.categories.create')}}" class="btn btn-primary btn-sm">Create new category<i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Acion</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($categories as $category)

                  <tr>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td class="actions">
                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i></a>
                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post">
                    @csrf
                    {{ method_field("delete") }}
                    <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </form>
                    </td>
                  </tr>
                  @endforeach

                  
                  <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Description</th>
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
  
@endsection

