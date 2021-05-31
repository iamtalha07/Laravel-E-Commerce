@extends('layouts.user')
@section('content')
<?php
$subtotal = 0;
?>

<script>

$(document).ready(function(){

    $("#btn_fetchall").click(function () {
    fetchRecords(100);
 
});


function fetchRecords(id)
{
    $.ajax({
        url: 'getUsers/'+id,
        type: 'get',
        dataType: 'json',
        success: function(response){

            var len=0;
            if(response['data'] != null){
                len = response['data'].length;
            }

            // Empty tbody

            $('#userTable tbody').empty();

            if(len > 0 ){
                for(var i=0; i<len; i++)
                {
                    var id = response['data'][i].id;
                    var quantity = response['data'][i].quantity;
                    var price = response['data'][i].price;

                    var tr_str = "<tr>" + 
                        "<td align='center'>"+ (i+1) +"</td>"+
                        "<td align='center'>"+ quantity +"</td>"+
                        "<td align='center'>"+ price +"</td>"+
                        "</tr>";

                    $('#userTable tbody').append(tr_str)


                }
            }
            else{
                var tr_str = "<tr>"+
                    "<td align='center'>No record found</td>"
                +"</tr>";
                $('#userTable tbody').append(tr_str)

            }
        }
//     });




// });
});
}


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
<button id="btn_fetchall" >Click me</button>

<table id="userTable">
    <thead>
        <tr>
            <th>id</th>
            <th>quantity</th>
            <th>price</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>



@endsection



