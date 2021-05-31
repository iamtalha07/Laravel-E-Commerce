@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogues</h1>
       
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Orders</li>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
        <section class="content">
            
            @if(Session::get('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{Session::get('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- /.card -->
        
    
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
     
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($order as $item)

                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->status}}</td>
                    <td>
                        <a href="order_detail/{{$item->id}}" style="max-width: 80px; float: left; display: inline-block; color:white;" class="btn btn-block btn-warning">View</a>
                        <a href="order_status/{{$item->id}}" style="max-width: 80px; float: left; display: inline-block; " class="btn btn-block btn-success">Status</a>

                    </td>


                  
                   
                 

                    {{-- <td>
                      <a title ="Add Images" href="add-category-images/"><i class="fa fa-plus-circle"></i></a>&nbsp &nbsp
                        <a href="edit_categories/"><i class="fa fa-edit"></i></a>&nbsp &nbsp
                        <a href="deletecategory/" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a>&nbsp &nbsp
                    </td> --}}
                  </tr>
                
                 @endforeach
                  </tbody>
                
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection