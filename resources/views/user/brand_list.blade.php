@extends('layouts.user')
@section('content')

        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="user_dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Brand</a></li>
                    <li class="breadcrumb-item active">Brand List</li>
                </ul>
            </div>
        </div>

        <!-- Breadcrumb End -->

          <!-- Product List Start -->
          <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            @if($isExist==null)
                            <h2>There is no product for this brand</h2>
                            @else 
                            @foreach($data as $item)
                            <div class="col-md-4 product_data">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">{{$item->title}}</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                              
                                         <input type="hidden" class="product_id" value="{{$item->id}}">
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            @foreach($item->images as $photo)
                                            <img src="{{ asset('uploads/product_image/'.$photo->image ) }}">
                                            @endforeach
                                        </a>
                                        <div class="product-action">
                                           
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#" class="add-to-wishlist-btn"><i class="fa fa-heart"></i></a>
                                            {{-- <button class="btn" onclick="doSomething()"><i class="fa fa-heart"></i></button> --}}
                                            <a href="{{URL('product-detail/'.$item->id )}}"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>Rs.</span>{{$item->price}}</h3>
                                        <a class="btn" href="product-detail/{{$item->id}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div> 
                        
                        <!-- Pagination Start -->
                        {{-- <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div> --}}
                        <!-- Pagination Start --> 
                    </div>            
                
                    








                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-female"></i>Fashion & Beauty</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-child"></i>Kids & Babies Clothes</a>
                                    </li> --}}


                                    @foreach($category as $category)
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>{{$category->title}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </nav>
                        </div>
                        
                        <div class="sidebar-widget widget-slider">
                              
                            <div class="sidebar-slider normal-slider">
                                @foreach($topProducts as $item)
                                <div class="product-item product_data">
                                    <div class="product-title">
                                        <a href="#">{{$item->title}}</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <input type="hidden" class="product_id" value="{{$item->id}}">
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="{{ asset('uploads/product_image/'.$item->image ) }}">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#" class="add-to-wishlist-btn"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>Rs.</span>{{$item->price}}</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Buy Now</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="sidebar-widget brands">
                            <h2 class="title">Our Brands</h2>
                            <ul>
                                @foreach($brand as $item)
                                <li><a href="brand-list/{{$item->id}}">{{$item->name}} ({{$item->products->count()}}) </a></li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <div class="sidebar-widget tag">
                            <h2 class="title">Tags Cloud</h2>
                            <a href="#">Lorem ipsum</a>
                            <a href="#">Vivamus</a>
                            <a href="#">Phasellus</a>
                            <a href="#">pulvinar</a>
                            <a href="#">Curabitur</a>
                            <a href="#">Fusce</a>
                            <a href="#">Sem quis</a>
                            <a href="#">Mollis metus</a>
                            <a href="#">Sit amet</a>
                            <a href="#">Vel posuere</a>
                            <a href="#">orci luctus</a>
                            <a href="#">Nam lorem</a>
                        </div>
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>

@endsection