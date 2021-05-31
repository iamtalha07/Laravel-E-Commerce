<?php 
use App\Http\Controllers\CartController;
use App\Setting;
use App\SiteSettings;


$total=0;
if(Session::has('user'))
{
    $total  = CartController::cartItem();

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>E Store - eCommerce HTML Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">
      
        <!-- Favicon -->
        <link href="{{asset('img/favicon.ico" rel="icon')}}">

          <!-- include libraries(jQuery, bootstrap) -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js-->
<link href="summernote.css" rel="stylesheet">
<script src="summernote.js"></script>

        <!-- Google Fonts -->
        <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap')}}" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/slick/slick.css')}}" rel="stylesheet">
        <link href="{{asset('lib/slick/slick-theme.css')}}" rel="stylesheet">
        <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js')}}"></script>
        <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>

    <body>

        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="/" class="nav-item nav-link active">Home</a>
                            <a href="{{route('product-list')}}" class="nav-item nav-link">Products</a>
                            <a href="cart" class="nav-item nav-link">Cart</a>
                            <a href="my-account.html" class="nav-item nav-link">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="login.html" class="dropdown-item">Login & Register</a>
                                    <a href="contact.html" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                              @if(Session::has('user'))
                              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{Session::get('user')['name']}}</a>
                              <div class="dropdown-menu">
                                  <a href="userlogout" class="dropdown-item">Logout</a>
                              </div>
                              @else
                              <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                              <div class="dropdown-menu">
                                  <a href="user_login" class="dropdown-item">Login</a>
                                  <a href="user_register" class="dropdown-item">Register</a>
                              </div>
                              @endif
                              
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="/img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{-- <form action="search"> --}}
                            <form id="search-form" action="search">
                            <div class="search">
                                <input type="text" class="form-control" name="query" value="{{Session::get('searchquery')}}" id="search_text" value="" placeholder="Search">
                                <button type="submit" name="searchbtn" ><i class="fa fa-search"></i></button>
                            
                            </div>
                            </form>
                       
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="wishlist" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="cart" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                            
                                <span>({{$total}})</span>
                              
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End -->       
        
       @yield('content')
        
        
      
      
        
           
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                  
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                              
                            <p><i class="fa fa-map-marker"></i>{{$settings['address']}}</p>
                               <p><i class="fa fa-envelope"></i>{{$settings['email']}}</p>
                               <p><i class="fa fa-phone"></i>{{$settings['phone']}}</p>
                             
                            </div>
                        </div>
                    </div>
              
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Follow Us</h2>
                            <div class="contact-info">
                                <div class="social">
                                   <a href="{{$settings['twitter']}}"><i class="fab fa-twitter"></i></a>
                                   <a href="{{$settings['fb']}}"><i class="fab fa-facebook-f"></i></a>
                                    <a href="{{$settings['insta']}}"><i class="fab fa-instagram"></i></a>
                                  <a href="{{$settings['youtube']}}"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Condition</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                                <li><a href="#">Pyament Policy</a></li>
                                <li><a href="#">Shipping Policy</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="row payment align-items-center">
                    <div class="col-md-6">
                        <div class="payment-method">
                            <h2>We Accept:</h2>
                            <img src="/img/payment-method.png" alt="Payment Method" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="payment-security">
                            <h2>Secured By:</h2>
                            <img src="/img/godaddy.svg" alt="Payment Security" />
                            <img src="/img/norton.svg" alt="Payment Security" />
                            <img src="/img/ssl.svg" alt="Payment Security" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">HTML Codex</a>. All Rights Reserved</p>
                    </div>

                    <div class="col-md-6 template-by">
                        <p>Template By <a href="https://htmlcodex.com">HTML Codex</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous"></script>
        <script src="{{asset('lib/easing/easing.min.js')}}"></script>
        <script src="{{asset('lib/slick/slick.min.js')}}"></script>

        {{-- Auto Complete --}}
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(document).ready(function(){
                src = "{{ route('searchproductajax') }}";
                $( "#search_text" ).autocomplete({
                source: function(request,response){
                        $.ajax({
                            url: src,
                            data: {
                                term: request.term
                            },
                            dataType: "json",
                            success: function (data){
                            response(data);

                           
                            
                            
                            }
                        });
                    },
                    minLength: 1,
                });

                $(document).on('click','.ui-menu-item', function(){
                    $('#search-form').submit();
                
                  
                });
           });
         
        </script>
     
        {{-- <script src="/js/3.1.1.jquery.min.js"></script> 
        <script src="/js/1.3.7.tether.min.js"></script>
        <script src="/js/4.0.0-alpha.5.bootstrap.min.js"></script>
        <script src="{{asset('js/laracrud.js')}}"></script> --}}

        {{-- <script src="{{asset('https://code.jquery.com/jquery.js')}}"></script> --}}

        
        <!-- Template Javascript -->
        <script src="{{asset('js/main.js')}}"></script>

        {{-- WISHLIST --}}
        <script>
            $(document).ready(function(){
                $('.add-to-wishlist-btn').click(function(e){
                    e.preventDefault();
        
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var product_id = $(this).closest('.product_data').find('.product_id').val();
                    // alert(product_id);
                    $.ajax({
                        method: "get",
                        url: "/add-wishlist",
                        data: {
                            'product_id': product_id,
                        },
                        success: function (response) {
                            // alert('DONE');
                            alert(response.status);
                        }
                    });
                });
            });
        
            // function doSomething(){
            //     alert("Click event is triggered on the link.");
            // }
            // $(document).ready(function(){
            //     $("button").click(function(){
            //         $("a")[0].click();
            //     });
            // });
            </script>

        {{-- <script type="text/javascript">
            var path="{{route('autocomplete')}}";
            $('input.typeahead').typeahead({
                source:function(terms,process){
                    return $.get(path,{terms:terms},function(data){
                        return process(data);
                    });
                }
            });
        </script> --}}

    </body>

    
</html>
