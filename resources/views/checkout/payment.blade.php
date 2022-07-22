@extends('_Layout')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        
                        <span>Thanh Toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <div  class="checkout-form">
                <div class="row">
                
                    
                    <?php
                        $content=Cart::content();
                    ?> 
                    <div class="col-lg-8">
                        
                        <div class="place-order">
                            <h4>Thanh toán giỏ hàng</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    
                                    
                                    <li>Product 
                                        <i style="margin-left: 200px;">Ảnh</i>
                                        <span>SubTotal</span>
                                    </li>
                                    @foreach($content as $ct )
                                    <li class="fw-normal">{{$ct->name}} x {{$ct->qty}}<i><img  style="width: 80px;height:40px;margin-left: 160px;" src="{{asset('/storage/images/products/'.$ct->options->image)}}"></i> <span>{{$subtotal=number_format($ct->price*$ct->qty).' '.'vnđ'}}</span></li>
                                    <!-- <li class="fw-normal">Combination x 1 <span>$60.00</span></li>
                                    <li class="fw-normal">Combination x 1 <span>$120.00</span></li>
                                    <li class="fw-normal">Subtotal <span>$240.00</span></li> -->
                                    @endforeach
                                    <li class="total-price">Total <span>{{Cart::subtotal().''. 'vnđ'}}</span></li>
                                </ul>
                                <form action="{{URL::to('/order-place')}}" method="POST">
                                {{csrf_field()}}
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label >
                                            Thanh toán ATM
                                            <input type="checkbox" value="1" name="option">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label>
                                            Thanh toán tiền mặt
                                            
                                            <input type="checkbox"  value="2" name="option">
                                            
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection