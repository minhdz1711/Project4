@extends('_Layout')
@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>registration</span>
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
                <div class="register-form">
                        <h2>Đăng kí</h2>
                        <form action="{{URL::to('/add-customer')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="group-input">
                                <label >Họ và tên*</label>
                                <input name="hoten" type="text" >
                            </div>
                            <div class="group-input">
                                <label> Giới tính </label>
                                <input name="gt" type="text" >
                            </div>
                            <div class="group-input">
                                <label for="username"> Email address *</label>
                                <input name="email" type="email" >
                            </div>
                            <div class="group-input">
                                <label > Số điện thoại</label>
                                <input name="sdt" type="phone" >
                            </div>
                            <div class="group-input">
                                <label > Địa chỉ</label>
                                <input name="diachi"  type="address" >
                            </div>
                            
                            <div class="group-input">
                                <label >Password *</label>
                                <input type="password" name="pass">
                            </div>
                            <!-- <div class="group-input">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="text" id="con-pass">
                            </div> -->
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <!-- <div class="switch-login">
                            <a href="{{URL::to('/login-checkout')}}" class="or-login">Or Login</a>
                        </div> -->
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
