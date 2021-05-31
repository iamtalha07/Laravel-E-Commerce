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
              <li class="breadcrumb-item active">Images</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <form action="add-dashboard-image" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Add Dashboard Images</h3>

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
                    <label for="exampleInputFile">Banner Top</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="banner_top" id="banner_top">
    
                        <label class="custom-file-label" for="banner_top">Dashboard Image</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dashboard Image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="dashboard_image1" id="dashboard_image1">

                        <label class="custom-file-label" for="dashboard_image1">dashboard Image</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dashboard Image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="dashboard_image3" id="dashboard_image3">

                        <label class="custom-file-label" for="dashboard_image3">dashboard Image</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dashboard Image 5</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="dashboard_image5" id="dashboard_image5">

                        <label class="custom-file-label" for="dashboard_image5">dashboard Image</label>
                      </div>
                    </div>
                  </div>
              </div>

              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputFile">Banner Bottom</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" name="banner_bottom" id="banner_bottom">
                      <label class="custom-file-label" for="banner_bottom">Brand Image</label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Dashboard Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="dashboard_image2" id="dashboard_image2">
                        <label class="custom-file-label" for="dashboard_image2">dashboard Image</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dashboard Image 4</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="dashboard_image4" id="dashboard_image4">
                        <label class="custom-file-label" for="dashboard_image4">dashboard Image</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Dashboard Image 6</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="dashboard_image6" id="dashboard_image6">
                        <label class="custom-file-label" for="dashboard_image6">dashboard Image</label>
                      </div>
                    </div>
                  </div>
                <!-- /.form-group -->
        
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
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