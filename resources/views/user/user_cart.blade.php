@extends('layouts.user')
@section('content')
<?php
$subtotal = 0;
?>


<script>
$(document).ready(function(){
    $("#btn_fetchall").click(function () {
    alert("Hello!");
    
  });
<?php 
for($i=1; $i<20; $i++){ ?>

    $('#upCart<?php echo $i;?>' ).on('change keyup', function(){
        
        var newqty = $('#upCart<?php echo $i;?>').val();
        var rowId = $('#rowId<?php echo $i;?>').val();
        var proId = $('#proId<?php echo $i;?>').val();
        
        // if(newqty <= 0){
        //     alert('enter only integer');
        // }
        //else{
            $.ajax({
                type: "get",
                dataType: 'html',
                //url: "<?php echo url('/cartupdate');?>/"+rowId,
                url: '/cartupdate/'+rowId,
               // data: "qty=" + newqty + "& rowId=" + rowId,  + "& proId=" + proId,
                data: {
                  "rowId": rowId,
                  "proId": proId,
                  "qty": newqty,
                     },
                success: function(data)
                {
                    console.log(data);
                    
                   var result =  JSON.parse(data);
                    
                    $("#price"+rowId).html("Rs."+result.price);
                }

            });
      //  }
    });
<?php }?>



});



</script>
 <!-- Breadcrumb Start -->
 <div class="breadcrumb-wrap">
    <div class="container-fluid">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Products</a></li>
            <li class="breadcrumb-item active">Cart</li>
        </ul>
    </div>
</div>
<!-- Breadcrumb End -->

 <!-- Cart Start -->
 <div class="cart-page">
    <div class="container-fluid">
        @if(Session::get('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{Session::get('status')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <?php $count=1; ?>
                            @foreach($products as $item)
                            <tbody class="align-middle">
                                
                                <tr class="row{{$item['id']}}">
                              
                                    <td>
                                        
                                        <div class="img">
                                            @foreach($item->products->getImages as $img)
                                            <a href="#"><img src="{{ asset('uploads/product_image/'.$img->image ) }}" alt="Image"></a>
                                            @endforeach
                                            <p>{{$item->products->title}} ({{$item->size}})</p>
                                        </div>
                                    </td>
                                    <td>Rs. {{$item->products->price}}</td>
                                    <td class="cart_quantity">
                                        <div class="cart_quantity_button">
                                        <input type="hidden"  value="{{$item->id}}" id="rowId<?php echo $count; ?>">
                                        <input type="hidden"  value="{{$item->products->id}}" id="proId<?php echo $count; ?>">

                                            {{-- <input type="number" size="2" value="{{$item->quantity}}" name="qty" id="upCart" autocomplete="off" style="text-align: center; max-width: 5px;"  MIN="1" MAX="30" > --}}
                                            <input type="number" value="{{$item->quantity}}" name="qty" id="upCart<?php echo $count; ?>" autocomplete="off" min="1" max="30">
                                        </div>
                                        {{-- <div class="qty"> --}}
                                            {{-- <button class="btn-minus"><i class="fa fa-minus"></i></button> --}}
                                            {{-- <input type="text" value="{{$item->quantity}}"> --}}
                                            {{-- <button class="btn-plus"><i class="fa fa-plus"></i></button> --}}
                                        {{-- </div> --}}



                                       {{-- <p> cart_quantity_button   </p> --}}




                                    </td>
                                    <td id="price{{$item['id']}}">Rs. {{$item->price}}</td>
                                    <td>
                                        <meta name="csrf-token" content="{{ csrf_token() }}"> 
                                        <button  class="deleteRecord" data-id="{{$item->id}}" ><i class="fa fa-trash"></i></button>
                                     


                                        {{-- <a class="btn" href="removecart/{{$item->id}}"><i class="fa fa-trash"></i></a>--}}
                                  
                                    </td>
                                  
                                   

                                    {{-- <button><i class="fa fa-trash"></i></button> --}}
                                </tr>
                               <?php 
                               $subtotal += $item->price;
                              
                               ?>
                               <script>
                                $(".deleteRecord").click(function(){
                                        var id = $(this).data("id");
                                        var token = $("meta[name='csrf-token']").attr("content");
                                        confirm("Are You sure want to delete !");
                                        $( ".row"+id ).remove();
                                       // $(id).remove();
                                        $.ajax(
                                        {
                                            url: "/removecart/"+id,
                                            type: 'DELETE',
                                            data: {
                                                "id": id,
                                                "_token": token,
                                            },
                                            success: function (){
                                                console.log("it Works");
                                            }
                                        });
                                       
                                       
                                    });
                                </script>
                                
                <?php $count++; ?>
                            </tbody>
                            @endforeach
                        </table>
                      
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                        
                        </div>
                        <div class="col-md-12">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span>Rs. {{$subtotal}}</span></p>
                                    <p>Shipping Cost<span>Rs. 100</span></p>
                                    <h2>Grand Total<span>Rs {{$subtotal+100}}</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <br>
                                    <center>
                                    <a class="btn btn-danger" href="checkout"><i class="fa fa-shopping-cart"></i>Checkout</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection