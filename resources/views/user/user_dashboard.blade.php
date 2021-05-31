@extends('layouts.user')
@section('content')
     <!-- Main Slider Start -->
     <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <nav class="navbar bg-light">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="user_dashboard"><i class="fa fa-home"></i>Home</a>
                            </li>
                            @foreach($data as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="category-list/{{$item->id}}"><i class="fa fa-shopping-bag"></i>{{$item->title}}</a>
                            </li>
                            @endforeach
                
                        </ul>
                    </nav>
                </div>
                <div class="col-md-6">
                    <div class="header-slider normal-slider">
                        @foreach($pic as $item)
                        <div class="header-slider-item">
                            @foreach($item->images as $photo)
                            <img  src="{{ asset('uploads/banner_image/'.$photo->image ) }}" alt="Slider Image" />
                            @endforeach
                            <div class="header-slider-caption">
                                <p>{{$item->content}}</p>
                                <a class="btn" href="category-list/{{$item->category_id}}"><i class="fa fa-shopping-cart"></i>Shop Now</a>
                            </div>
                            
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3">
               
                    
                    <div class="header-img">
                     
                        <div class="img-item">
                            
                          
                            <img src="img/category-1.jpg">
                            
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                           
                        </div>
                        
                        <div class="img-item">
                           
                            <img src="img/category-2.jpg">
                            <a class="img-text" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                          
                        </div>
                    </div>
                
                  
                </div>
            </div>
        </div>
    </div>
    <!-- Main Slider End -->    
    
        <!-- Brand Start -->
        <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    @foreach($brand as $item)
                    <a href="brand-list/{{$item->id}}">   
                    @foreach($item->images as $photo)  
                    <div class="brand-item"><img src="{{ asset('uploads/brand_image/'.$photo->image ) }}" alt=""> </div>
                    @endforeach
                </a> 
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Brand End -->  

           
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                    @foreach($content as $item)
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            {!! $item->icon !!}
                            <h2>{{$item->title}}</h2>
                            <p>
                               {{$item->content}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        
        <!-- Category Start-->
        <div class="category">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="{{asset('img/category-3.jpg')}}" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-250">
                            <img src="{{asset('img/category-4.jpg')}}" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-150">
                            <img src="{{asset('img/category-5.jpg')}}" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-150">
                            <img src="{{asset('img/category-6.jpg')}}" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                        <div class="category-item ch-250">
                            <img src="{{asset('img/category-7.jpg')}}" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="category-item ch-400">
                            <img src="{{asset('img/category-8.jpg')}}" />
                            <a class="category-name" href="">
                                <p>Some text goes here that describes the image</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Category End-->      

              
        <!-- Call to Action Start -->
        <div class="call-to-action">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>call us for any queries</h1>
                    </div>
                    <div class="col-md-6">
                        <a href="tel:0123456789">+012-345-6789</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to Action End -->   

         <!-- Featured Product Start -->
         <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    @foreach($featured as $item)
                    <div class="col-lg-8 product_data">
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
                            <div class="product-image">
                                <a href="product-detail.html">
                                    @foreach($item->getImages as $photo)
                                    <img src="{{ asset('uploads/product_image/'.$photo->image ) }}">
                                    @endforeach
                                </a>
                                <input type="hidden" class="product_id" value="{{$item->id}}">
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#" class="add-to-wishlist-btn"><i class="fa fa-heart"></i></a>
                                    <a href="product-detail/{{$item->id}}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            
                            <div class="product-price">
                                <h3><span>Rs.</span>{{$item->price}}</h3>
                                <a class="btn" href="product-detail/{{$item->id}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        <div class="newsletter">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1>Subscribe Our Newsletter</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="form">
                            <input type="email" value="Your email here">
                            <button>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Newsletter End -->        
        
        <!-- Recent Product Start -->
        <div class="recent-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Recent Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                    @foreach($recent as $item)
                    <div class="col-lg-3 product_data">
                        
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
                                    @foreach($item->getImages as $photo)
                                    <img src="{{ asset('uploads/product_image/'.$photo->image ) }}">
                                    @endforeach
                                </a>
                                <div class="product-action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#" class="add-to-wishlist-btn"><i class="fa fa-heart"></i></a>
                                    <a href="product-detail/{{$item->id}}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-price">
                                <h3><span>Rs.</span>{{$item->price}}</h3>
                                <a class="btn" href="product-detail/{{$item->id}}"><i class="fa fa-shopping-cart"></i>Buy Now</a>
                            </div>
                        </div>
                        
                    </div>
                    @endforeach
        
               
              
                  
                </div>
            </div>
        </div>
        <!-- Recent Product End -->
        
        <!-- Review Start -->
        <div class="review">
            <div class="container-fluid">
                <div class="row align-items-center review-slider normal-slider">
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-1.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-2.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-slider-item">
                            <div class="review-img">
                                <img src="img/review-3.jpg" alt="Image">
                            </div>
                            <div class="review-text">
                                <h2>Customer Name</h2>
                                <h3>Profession</h3>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vitae nunc eget leo finibus luctus et vitae lorem
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Review End -->    
@endsection