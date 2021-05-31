@extends('layouts.admin')
@section('content')

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
              <li class="breadcrumb-item active">Banner</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="addbanner" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Banner</h3>

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
                    <label for="category_name">Banner Name</label>
                    <input type="text" class="form-control" name="name" id="banner_name" placeholder="Enter Banner Name">
                  
                </div>

                <div class="form-group">
                  <label>Select Category</label>
                  <select class="form-control select2" style="width: 100%;" name="category">
                    @foreach($data as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
           
                  </select>
                </div>
              </div>

              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Banner Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="banner_image" id="banner_image">
  
                      <label class="custom-file-label" for="banner_image">Banner Image</label>
                    </div>
                  </div>
                </div>
                <!-- /.form-group -->
        
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <div class="form-group">
              <label for="category_name">Content</label>
              <textarea class="form-control" name="content" rows="3" placeholder="Enter Content"></textarea>
          </div>

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