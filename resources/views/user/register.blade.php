@extends('layouts.template')
@section('content')

        <!-- Login Start -->
        <div class="login">
           
          <div class="container">
                          
                        <div class="register-form">
                            <h2>Sign up</h2>
                            <form action="userregister" method="POST" class="register-form" id="register-form">
                                @csrf
                            <div class="row">
                           
                                <div class="col-md-6">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Full Name">
                                    @error('name')
                                    <p style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                          
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" name="email" placeholder="E-mail">
                                    @error('email')
                                    <p style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Mobile No">

                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password" placeholder="Password">
                                    @error('password')
                                    <p style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Retype Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Password">
                                    @error('password_confirmation')
                                    <p style="color:red">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="signup" class="btn">Sign up</button>
                                </div>
                          
                            </div>
                            </form>
                        </div>
                    </div>
        </div>
        <!-- Login End -->

        {{-- <!-- Sign up form -->
        <section class="signup">
  
            <div class="container">

           
                <div class="signup-content">
                    <div class="signup-form">
                    
                        <h2 class="form-title">Sign up</h2>
                        @if(Session::get('ok'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('ok')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        @endif
{{-- 
                        <div class="flash-message">
                            @foreach (['danger','warning','success','info'] as $msg)
                                @if(Session::has('alert-'.$msg))
                                <p class="alert alert-{{$msg}}">{{Session::get('alert-'.$msg)}} <a href="#"  class="close" data-dismiss="alert" aria-label="Close">&times;</a></p>
                                @endif
                            @endforeach
                        </div> --}}
           

{{-- 
                        <form action="userregister" method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
								<label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
								<input type="text" name="name" id="name" placeholder="Your Name"/>
                                @error('name')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email"/>
                                @error('email')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password"/>
                                @error('password')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password"/>
                                @error('password_confirmation')
                                <p style="color:red">{{$message}}</p>
                                @enderror
                            
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="user_login" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section> --}} 

@endsection