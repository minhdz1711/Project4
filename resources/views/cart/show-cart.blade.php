@extends('_Layout')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                        <!-- <a href="./shop.html">Shop</a> -->
                        <span class="active">Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->




    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>

                                    <th class="p-name">Tên sản phẩm</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <!-- <th><i class="ti-close"></i></th> -->
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $content=Cart::content();
                            ?>
                            @foreach($content as $ct )
                                <tr>
                                <td class="cart-title first-row">
                                        <h5>{{$ct->name}}</h5>
                                    </td>
                                    <td class="cart-pic first-row"><img style="width: 100px;height:60px;" src="{{asset('/storage/images/products/'.$ct->options->image)}}" alt=""></td>

                                    <td class="p-price first-row">{{number_format($ct->price).''.'vnđ'}} </td>
                                    <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                    {{ csrf_field() }}
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="text" name="cart_quantity"value="{{$ct->qty}}"/>


                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$ct->rowId}}" name="rowId_cart" class="form-control"/>

                                        <input type="submit" value="Update" name="update_qty" class="btn btn-default btn-sm"/>

                                    </td>
                                    <td class="total-price first-row">{{$subtotal=number_format($ct->price*$ct->qty).' '.'vnđ'}}</td>
                                    <td class="close-td first-row"><a href="{{URL::to('/delete-to-cart/'.$ct->rowId)}}"><i class="ti-close"></i></a></td>
                                    </form>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div  class="cart-buttons">
                                <a href="{{URL::to('/')}}" class="primary-btn "><i class="	fa fa-arrow-circle-o-left"></i> Tiếp tục mua hàng</a>
                                <!-- <a href="#" class="primary-btn up-cart">Update cart</a> -->
                            </div>
                            <!-- <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div> -->
                        </div>

                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>

                                    <li class="cart-total">Tổng tiền:<span>{{Cart::subtotal().''. 'vnđ'}}</span></li>
                                    <!-- <li class="subtotal">Thuế <span>{{Cart::tax().' '.'VNĐ'}}  </span></li> -->
                                    <!-- <li class="subtotal">Thành tiền <span>{{Cart::total() . ' ' . 'VNĐ '}}   </span></li> -->

                                </ul>
                                <?php
                                $customer_id=Session::get('id');
                                if($customer_id!=null){  ?>
                                <a class="btn btn-primary btn-sm" href="{{URL::to('/checkout')}}">Thanh toán</a>
                                <?php

                                }
                                else{
                                    ?>
                                <a class="btn btn-primary btn-sm" href="{{URL::to('/login-checkout')}}" >Checkout</a>
                                    <?php

                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection
