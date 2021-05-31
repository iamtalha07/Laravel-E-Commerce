@extends('layouts.user')
@section('content')

 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Wishlist</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Wishlist Start -->
<div class="wishlist-page">
    <div class="container-fluid">
        <div class="wishlist-page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Add to Cart</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            @foreach($products as $item)
                            <form action="wishlist-to-cart" method="POST">
                            <tbody class="align-middle">
                               
                                    @csrf
                                <tr class="row{{$item['id']}}">
                                    <td>
                                        <div class="img">
                                            @foreach($item->products->getImages as $img)
                                            <a href="#"><img src="{{ asset('uploads/product_image/'.$img->image ) }}" alt="Image"></a>
                                            @endforeach
                                            <p>{{$item->products->title}} <input type="hidden" name = "id" value="{{$item->id}}"></p>
                                        </div>
                                    </td>
                                    <td>Rs. {{$item->products->price}}</td>
                                    <td>
                                        <div class="qty">
                                            <input type="number" value="1" name="qty" value="1" min="1" max="30">
                                        </div>
                                    </td>
                                    {{-- <td> <a class="btn" href="wishlist-to-cart/{{$item->id}}"><i class="fa fa-shopping-cart"></i>Buy Now</a></td> --}}
                                    <td><button type="submit" class="btn-cart">Add To Cart</button></td>
                                    <td> <a href="#" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa fa-trash"></i></a>&nbsp &nbsp</td>
                                </tr>
                           
                            </tbody>
                        </form>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Wishlist End -->

@endsection