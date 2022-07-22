
@extends('_Layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">           
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="login-form">
                        <h2>Login</h2>
                        <form action="{{URL::to('/login-customer')}}" method="POST">
                        {{ csrf_field() }}
                            <div class="group-input">
                                <label for="username">Username or email address *</label>
                                <input type="email" name="email_account">
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" name="pass_account">
                            </div>
                            <div class="group-input gi-check">
                                <div class="gi-more">
                                    <label for="save-pass">
                                        Save Password
                                        <input type="checkbox" id="save-pass">
                                        <span class="checkmark"></span>
                                    </label>
                                    <a href="#" class="forget-pass">Forget your Password</a>
                                </div>
                            </div>
                            <button type="submit" class="site-btn login-btn">LogIn</button>
                        </form>
                        <div class="switch-login">
                            <a href="{{URL::to('/registration')}}" class="or-login">Or Create An Account</a>
                        </div>
                    </div>
                </div>
                
               
            </div>
        </div>
    </div>
    <!-- <div class="register-login-section spad">
        <div class="container">
            <div class="row">
               
            </div>
        </div>
    </div> -->
    <!-- Register Form Section End -->
    <!-- Shopping Cart Section End -->
    @endsection