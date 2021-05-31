@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Product Attributes</li>
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
        <!-- SELECT2 EXAMPLE -->
        
        <form action ="{{url('add_attributes', ['id' => $data->id])}}" method = "POST" enctype="multipart/form-data">
     
          @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Product Attributes</h3>

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
                    <label for="category_name">Product Name:</label> &nbsp; 
                    {{$data->title}}
                    
                    <input type="hidden" name="id" class="form-control" value="">
                </div>

                <div class="form-group">
                    <label for="category_name">Product Category: </label> &nbsp;
    
                    {{$product_category->title}}
                  
                </div>



                <div class="form-group">
                  <label for="category_name">Product Price: </label> &nbsp; 
                  Rs.{{$data->price}}/-
                </div>

                <div class="form-group">
                    <div class="field_wrapper">
                        <div style="display:flex">
                            <input type="text" name="sku[]" id="sku" placeholder="SKU" class="form-control" style="width: 120px; margin-right:5px;"/>
                            <input type="text" name="size[]" id="size" placeholder="SIZE" class="form-control" style="width: 120px;  margin-right:5px;"/>
                            <input type="text" name="color[]" id="color" placeholder="COLOR" class="form-control" style="width: 120px;  margin-right:5px;"/>
                            <input type="text" name="stock[]" id="stock" placeholder="QUANTITY" class="form-control" style="width: 120px;  margin-right:5px;"/>
                            <a href="javascript:void(0);" class="add_button" title="Add Field">Add</a>
                        </div>
                    </div>
                  </div>
                

              </div>

             
              <div class="col-md-6">
                <div class="form-group">
                    
                    <img style="width:120px; margin-top:5px; margin-left:100px;" src="{{ asset('uploads/product_image/'.$data->image ) }}" alt="">
                </div>
              </div>
              <!-- /.col -->
             
              <!-- /.col -->
            </div>
            <!-- /.row -->

   

            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add Attribute</button>
        
          </div>
    </div>
</form>

<div class="card">

    

    <div class="card-body">
      <table id="categories" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>ID</th>
          <th>SKU</th>
          <th>Size</th>
        </tr>
        </thead>
        <tbody>
          @foreach($data->attributes as $item)
        <tr>
          <td>{{$item->id}}</td>
          <td>{{$item->sku}}</td>
          <td>{{$item->size}}</td>
        </tr>
          @endforeach
        </tbody>
      
      </table>
    </div>
    <!-- /.card-body -->
  </div>


        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection