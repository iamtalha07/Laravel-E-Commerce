@extends('layouts.admin')
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogue</h1>
       
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Feature</li>
             
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
                <h3 class="card-title">Feature</h3>
     
                <a href="add_feature" style="max-width: 150px; float: right; display: inline-block" class="btn btn-block btn-success">Add Feature</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Feature Icon</th>
                    <th>Status</th>
                    <th>Operations</th>
                  </tr>
                  </thead>
                  @foreach($data as $item)
                  <tbody>
              
                 
                  
                  
                  <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->content}}</td>
                    <td class="align-middle">{!! $item->icon !!}</td>
                    <td>{{$item->is_active}}</td>

            
                    <td>
                      <a title ="Add Images" href="add-category-images/"><i class="fa fa-plus-circle"></i></a>&nbsp &nbsp
                        <a href="edit_feature/{{$item->id}}"><i class="fa fa-edit"></i></a>&nbsp &nbsp
                        <a href="deletefeature/{{$item->id}}" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a>&nbsp &nbsp
                    </td>
                  </tr>
                
                 
                  </tbody>
                @endforeach
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