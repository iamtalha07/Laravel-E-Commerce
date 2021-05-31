@extends('layouts.admin')
@section('content')


<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Catalogue</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{url('storedetails', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Site Settings</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
         
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">

                <div class="form-group">
                    <label for="category_name">Store Address</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" name="address" value="{{$data->address}}">
                        <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                      </div>
                 
                  </div>

                  <div class="form-group">
                    <label for="category_name">Store E-Mail</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" name="email"  value="{{$data->email}}">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="category_name">Phone:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-phone"></i></span>
                        </div>
                        <input type="text" class="form-control" name="phone"  value="{{$data->phone}}">
                      </div>
                  </div>

                

              </div>
              <!-- /.col -->
             <div class="col-md-6">
                <div class="form-group">
                    <label for="category_name">Facebook:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
                        </div>
                        <input type="text" class="form-control" name="facebook"  value="{{$data->fb}}">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="category_name">Twitter:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                        </div>
                        <input type="text" class="form-control" name="twitter"  value="{{$data->twitter}}">
                      </div>
                  </div>

                  <div class="form-group">
                    <label for="category_name">Instagram:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fab fa-instagram"></i></i></span>
                        </div>
                        <input type="text" class="form-control" name="insta"  value="{{$data->insta}}">
                      </div>
                  </div>
                
              
             </div>


   
              <!-- /.col -->
            </div>
            <!-- /.row -->
      

         
   

            <!-- /.row -->
          </div>
         
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        
          </div>
    </div>
</form>


        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection