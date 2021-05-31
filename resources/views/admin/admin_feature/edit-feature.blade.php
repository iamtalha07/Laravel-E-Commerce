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
              <li class="breadcrumb-item active">Feature</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="{{url('editfeature', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Feature</h3>

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
                    <label for="category_name">Feature Title</label>
                    <input type="text" class="form-control" name="title" id="feature_title" value="{{$data->title}}">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    @error('title')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                </div>
              </div>

              <!-- /.col -->
              <div class="form-group">
                <label>Feature Icon</label><br>
                <select class="form-control select2" style="width: 510px;" name="icon">
             
                  <option value="<i class='fab fa-cc-mastercard'></i>">Payment</option>
                  <option value="<i class='fa fa-truck'></i>">Truck</option>
                  <option value=" <i class='fa fa-sync-alt'></i>">Circular Arrow</option>
                  <option value="<i class='fa fa-comments'></i>">Comment</option>
                 
         
                </select>
              </div>
              <!-- /.col -->
            </div>


            <div class="form-group">
              <label for="category_name">Feature Content</label>
              <textarea class="form-control" name="content" rows="3" placeholder="Enter Description">{{$data->content}}</textarea>
          </div>

          <div class="form-group">
            <label for="category_name">Active this feature</label>
            <input type="checkbox" name="active" value=1 @if($data->is_active == 1) checked @endif>
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