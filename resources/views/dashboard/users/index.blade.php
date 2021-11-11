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
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Users</a></li>
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
                <h3 class="card-title">Users List</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th>Registeration Date</th>
                    <th>Action</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)

                  <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    @php
                    $date = explode(' ',$user->created_at);
                    @endphp
                    <td>{{$date[0]}}</td>
                    <td class="actions">
                    <a href="#" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></a>
                  
                    </td>
                  </tr>
                  @endforeach

                  
                  <tfoot>
                  <tr>
                  <th>Name</th>
                    <th>email</th>
                    <th>Registeration Date</th>
                    <th>Action</th>
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

