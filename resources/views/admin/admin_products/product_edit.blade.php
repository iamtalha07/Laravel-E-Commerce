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
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        
        <form action ="{{url('editproduct', ['id' => $data->id])}}" method = "POST" enctype="multipart/form-data">
            @csrf
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Edit Product</h3>

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
                    <label for="category_name">Product Title</label>
                  
                    <input type="text" value="{{$data->title}}" class="form-control" name="title"  placeholder="Enter Category Name">
                    @error('title')
                    <p style="color:red">{{$message}}</p>
                    @enderror
                  
                    <input type="hidden" name="id" class="form-control" value="{{$data->id}}">
                </div>

                <div class="form-group">
                  <label>Select Category</label>
                  <select class="form-control select2" style="width: 100%;" name="category">
                    @foreach($category as $item)
                    <option value="{{$item->id}}">{{$item->title}}</option>
                    @endforeach
           
                  </select>
                </div>

                <div class="form-group">
                  <label>Select Brand</label>
                  <select class="form-control select2" style="width: 100%;" name="brand">
                    @foreach($brand as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
           
                  </select>
                </div>

 

 




              </div>
              <!-- /.col -->
             <div class="col-md-6">
              <div class="form-group">
                <label for="exampleInputFile">Product Image</label>
                <div class="input-group">
                  <div class="custom-file">

                  
                  
                    <input type="file" class="custom-file-input" name="product_image" id="product_image" >
          
                    <label class="custom-file-label" for="product_image"></label>
          
                  </div>
                </div>
                @error('product_image')
                <p style="color:red">{{$message}}</p>
                @enderror
              </div>
              @foreach($data->getImages as $item)
              <input type="hidden" name="my_image" value="{{$item->image}}">
              @endforeach

             


              <div class="form-group">
                <label for="category_name">Product Price</label>
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">Rs.</span>
                </div>
                <input type="text" class="form-control" value={{$data->price}} name="price" id="category_name" placeholder="Enter Product Price">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
                @error('price')
                <p style="color:red">{{$message}}</p>
                @enderror
                </div>
              </div>

              <div class="form-group">
                <label for="category_name">Featured</label>
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <input type="checkbox" name="feature" value=1 @if($data->is_featured == 1) checked @endif>
                  </span>
                </div>
                <input type="text" class="form-control" value="Is the Product Featured?" disabled>
                </div>
              </div>

              

             </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            {{-- <div class="form-group">
              <label for="category_name">Product Description</label>
              <textarea class="form-control" name="description" rows="3" {{$data->description}} placeholder="Enter Description">{{$data->description}}</textarea>
          </div> --}}

          <label for="category_name">Product Description</label>
          <textarea id="summernote" name="description">
            {{$data->description}}
          </textarea>

          <label for="category_name">Product Specification</label>
          <textarea id="summernote1" name="specification">
            {{$data->specification}}
          </textarea>

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
  <script>
    $(document).ready(function() {
      $('#summernote').summernote('code');
      $('#summernote1').summernote('code');

    });
    </script>
@endsection