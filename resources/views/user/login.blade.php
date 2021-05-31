@extends('layouts.template')
@section('content')

 {{-- <!-- Sing in  Form -->
 <section class="sign-in">
    <div class="container">
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                <a href="user_register" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
                <div class="flash-message">
                    @foreach (['danger','warning','success','info'] as $msg)
                        @if(Session::has('alert-'.$msg))
                        <p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}} <a href="#"  class="close" data-dismiss="alert" aria-label="Close">&times;</a></p>
                        @endif
                    @endforeach
                </div>
                <h2 class="form-title">Login</h2>
                <form action="userlogin" method="POST" class="register-form" id="login-form">
                    @csrf
                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="email" id="email" placeholder="Your E-Mail"/>
                    </div>
                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                        <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
                <div class="social-login">
                    <span class="social-label">Or login with</span>
                    <ul class="socials">
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                        <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Login Start -->
<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">    
              
            </div>
            <div class="col-lg-6">
                <div class="login-form">
                    <form action="userlogin" method="POST" class="register-form" id="login-form">
                        @if(Session::get('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
                
                    <h2>Login</h2>
                    <div class="row">
                      
                            @csrf
                        <div class="col-md-6">
                            <label>E-mail</label>
                            <input class="form-control" type="text" name="email" placeholder="E-mail">
                        </div>
                        <div class="col-md-6">
                            <label>Password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="login" class="btn">Signin</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login End -->

@endsection