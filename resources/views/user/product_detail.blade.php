@extends('layouts.user')
@section('content')
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">{{$product->title}}</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="product-detail-top">
                            <div class="row align-items-center">
                               
                            
                                <div class="col-md-5">
                                    @if($isExist->isEmpty())
                                    <div class="product-slider-single normal-slider">
                                        @foreach($product->getImages as $photo)
                                        <img src="{{ asset('uploads/product_image/'.$photo->image ) }}">
                                        @endforeach
                                    </div>
                                    @else
                                    <div class="product-slider-single normal-slider">
                                        @foreach($product->getImagesChild as $photo)
                                     
                                        <img src="{{ asset('uploads/product_image_multiple/'.$photo->image ) }}">
                                        {{-- <img src="/img/product-1.jpg" alt="Product Image">
                                        <img src="/img/product-3.jpg" alt="Product Image">
                                        <img src="/img/product-5.jpg" alt="Product Image">
                                        <img src="/img/product-7.jpg" alt="Product Image">
                                        <img src="/img/product-9.jpg" alt="Product Image">
                                        <img src="/img/product-10.jpg" alt="Product Image"> --}}
                                        @endforeach
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        @foreach($product->getImagesChild as $photo)
                                        <div class="slider-nav-img"><img src="{{ asset('uploads/product_image_multiple/'.$photo->image ) }}" alt="Product Image"></div>
                                        {{-- <div class="slider-nav-img"><img src="/img/product-3.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/img/product-5.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/img/product-7.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/img/product-9.jpg" alt="Product Image"></div>
                                        <div class="slider-nav-img"><img src="/img/product-10.jpg" alt="Product Image"></div> --}}
                                        @endforeach 
                                    </div>
                                    @endif
                                </div>
                    
                                <div class="col-md-7">
                                    <div class="product-content product_data">
                                        <div class="title"><h2>{{$product->title}}</h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>Rs {{$product->price}}</p>
                                        </div>
                                        <form action="{{route('add_to_cart')}}" method="POST">
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            
                                            <div class="qty">
                                                <button type="button" class="btn-minus" ><i class="fa fa-minus"></i></button>
                                                <input type="text" value="1" name="quantity">
                                                <button type="button" class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            {{-- <div class="btn-group btn-group-sm"> --}}
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach($product->attributes as $item)
                                                {{-- <button name="size" value="{{$item->size}}" class="btn">{{$item->size}}</button> --}}
                                                {{-- <input type="button" name="size" value="{{$item->size}}" class="btn"> --}}
                                                {{-- <button name="termkey" value="{{$item->size}}" class="btn">{{$item->size}}</button> --}}
                                                {{-- <button type="button" class="btn">M</button>
                                                <button type="button" class="btn">L</button>
                                                <button type="button" class="btn">XL</button> --}}
                                               
                                                    <label class="btn btn-danger">
                                                      <input type="radio" name="size" id="option_a1" value="{{$item->size}}"> {{$item->size}}
                                                    </label>
                                                @endforeach
                                            </div>
                                            {{-- </div>  --}}
                                        </div>
                                        <div class="p-color">
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn">White</button>
                                                <button type="button" class="btn">Black</button>
                                                <button type="button" class="btn">Blue</button>
                                            </div> 
                                        </div>
                                        <div class="action">
                                            {{-- <form action="{{route('add_to_cart')}}" method="POST"> --}}
                                                @csrf
                                                <input type="hidden" name="product_id" class="product_id" value="{{$product['id']}}">
                                                <input type="hidden" name="product_price" value="{{$product['price']}}">

                                                <button type="submit" class="btn"><i class="fa fa-shopping-cart"></i>Add to Cart</button>
                                                <button type="button" class="add-to-wishlist-btn btn"><i class="fa fa-heart"></i>Add to Wishlist</button>
                                          
                                            {{-- <a class="btn" href="#"><i class="fa fa-shopping-cart"></i>Addsss to Cart</a> --}}
                                         
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row product-detail-bottom">
                            <div class="col-lg-12">
                                <ul class="nav nav-pills nav-justified">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#specification">Specification</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div id="description" class="container tab-pane active">
                                        <h4>Product description</h4>
                                        <p>
                                           {!!  $product->description !!}
                                        </p>
                                    </div>
                                    <div id="specification" class="container tab-pane fade">
                                        <h4>Product specification</h4>
                                        <p>
                                            {!!  $product->specification !!}
                                         </p>
                                    </div>
                                    <div id="reviews" class="container tab-pane fade">
                                        <div class="reviews-submitted">
                                            <div class="reviewer">Phasellus Gravida - <span>01 Jan 2020</span></div>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p>
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                            </p>
                                        </div>
                                        <div class="reviews-submit">
                                            <h4>Give your Review:</h4>
                                            <div class="ratting">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <div class="row form">
                                                <div class="col-sm-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="email" placeholder="Email">
                                                </div>
                                                <div class="col-sm-12">
                                                    <textarea placeholder="Review"></textarea>
                                                </div>
                                                <div class="col-sm-12">
                                                    <button>Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                                @foreach($product->category->products as $item)
                               
                               
                                <div class="col-lg-3 product_data">
                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="#"> {{$item->title}}</a>
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
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <nav class="navbar bg-light">
                                <ul class="navbar-nav">
                                    @foreach($category as $item)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL('category-list/'.$item->id )}}"><i class="fa fa-female"></i>{{$item->title}}</a>
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
                                    </div>
                                    <input type="hidden" class="product_id" value="{{$item->id}}">
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
                                <li><a href="brand-list/{{$item->id}}">{{$item->name}}  ({{$item->products->count()}}) </a></li>
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
        <!-- Product Detail End -->
     
@endsection