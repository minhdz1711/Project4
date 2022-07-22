<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Moto PKL">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>MMJ-puppy</title>

    <!-- Google Font -->


    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
</head>

<body>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        minsd319@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +84 334 063 808
                    </div>
                </div>
                <div  style="float:right"class="ht-right">
                <?php
                $customer_id=Session::get('customer_id');
                if($customer_id!=null){  ?>
                <a href="{{URL::to('/logout-checkout')}}"class="login-panel"><i class="fa fa-user"></i>Đăng xuất</a>
                <?php

                }
                else{
                    ?>
                    <a href="{{URL::to('/login-checkout')}}" class="login-panel"><i class="fa fa-user"></i>Login</a>




                    <div class="top-social">
                    <a href="{{URL::to('/registration')}}" class="registration-panel"><i class="fa fa-registered"></i>registration</a>
                        <!-- <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a> -->
                    </div>
                    <?php

                }
                ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{route('Home')}}">
                                <img style="width:145px;height:90px;" src="/img/logommj.jpg" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="advanced-search">

                            <div class="input-group">
                            <form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{ csrf_field() }}

                                <input type="text" placeholder="What do you need?"  name="keywords_submit">
                                <button name="search_items" style="float: right;" type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <?php
                            $content=Cart::content();
                            ?>
                            <li class="cart-icon">

                                <a href="{{URL::to('/show-cart')}}">
                                    <i class="icon_cart_alt"></i>

                                    <span>{{ Cart::count() }}</span>


                                </a>
                                <div id="show-ssp"></div>
                                <div class="cart-hover">
                                <div id="change-item-cart">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                            @foreach($content as $ct )
                                                <tr>
                                                    <td class="si-pic"><img style="width:100px; height: 60px;" src="img/{{$ct->options->image}}" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>{{number_format($ct->price),1}} x {{$ct->qty}}</p>
                                                            <h6>{{$ct->name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <a href="{{URL::to('/delete-to-cart/'.$ct->rowId)}}"><i class="ti-close"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <!-- <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>{{Cart::subtotal().''. 'vnđ'}}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="{{URL::to('/show-cart')}}" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="{{URL::to('/login-checkout')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">{{Cart::subtotal().''. 'vnđ'}} </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @include('_menu')
    </header>
    <!-- Header End -->


    @yield('content')

    <!-- Latest Blog Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img style="height: 120px;width: 204px;"  src="/img/logo-honda.jpg" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img style="height: 120px;width: 204px;" src="/img/logo-yamaha.jpg" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img style="height: 120px;width: 204px;" src="/img/logo-ducati.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img style="height: 120px;width: 204px;" src="/img/logo-kawasaki.png" alt="">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a  href="{{route('Home')}}"><img style="width:145px;height:90px;" src="/img/logommj.jpg" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 130A ngõ 88 Vũ Hựu, phường Thanh Bình, TP Hải Dương</li>
                            <li>Phone: +84 334 063 808</li>
                            <li>Email: minsd319@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <!-- <li><a href="#">About Us</a></li> -->
                            <li><a href="URL::to('/login-checkout')">Checkout</a></li>
                            <li><a href="URL::to('/lien-he')">Contact</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="">My Account</a></li>
                            <li><a href="URL::to('/lien-he')">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>

    <script type="text/javascript">
    $(document).ready(function(){

        load_comment();
        function load_comment(){
            var product_id=$('.comment_product_id').val();

            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/load-comment')}}",
                method:"POST",
                data:{product_id:product_id,_token:_token},
                success:function(data){
                    $('#comment_show').html(data);
                }

            });
        }
        $('.send-comment').click(function(){
            var product_id=$('.comment_product_id').val();
            var comment_name=$('.comment_name').val();

            var comment_content=$('.comment_content').val();
            var _token=$('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/send-comment')}}",
                method:"POST",
                data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token},
                success:function(data){

                    $('#notify_comment').html('<span class="text text-success">Bình luận thành công, bình luận đang chờ duyệt</span>');
                    load_comment();
                    $('#notify_comment').fadeOut(9000);
                    $('.comment_name').val('');

                    $('.comment_content').val('');
                }

            });
        });

    });
    </script>
    <!-- <script type="text/javascript">
        $('.pd-cart').click(function(){
            show_ssp();
            function show_ssp(){
                $.ajax({
                    url:'{{url('/show-ssp')}}',
                    method:"GET",
                    success:function(data){
                        $('#show-ssp').html(data);
                    }
                });
            }
        });
    </script> -->
</body>

</html>
