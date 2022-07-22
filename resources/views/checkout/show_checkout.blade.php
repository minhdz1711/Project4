@extends('_Layout')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href=""><i class="fa fa-home"></i> Home</a>
                        
                        <span>Shipping</span>
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
                
                    <div class="col-lg-8">
                    <form action="{{URL::to('/save-checkout-customer')}}" class="checkout-form" method="POST">
                            {{csrf_field()}}
                        
                        <h4>Thông tin giao hàng</h4>
                        <div class="row">
                           
                            <div class="col-lg-12">
                                <label >Họ và tên<span>*</span></label>
                                <input type="text" name="shipping_name">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun-name">Email</label>
                                <input type="text" name="shipping_email">
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Địa chỉ<span>*</span></label>
                                <input type="text" name="shipping_address">
                            </div>
                            <div class="col-lg-12">
                                <label >Phone<span>*</span></label>
                                <input type="text" name="shipping_phone" class="street-first">
                                
                            </div>
                            
                            <div class="col-lg-12">
                                <label >Ghi chú<span>*</span></label>
                                <textarea type="text" name="shipping_note"></textarea>
                                
                            </div>
                            <div  class="col-lg-4 ">
                            <input  type="submit" value="Thanh toán" class="btn btn-primary btn-sm" name="send_order"></input>
                                
                               </div> 
                            

                            
                            <!-- <div class="col-lg-12">
                                <label for="zip">Postcode / ZIP (optional)</label>
                                <input type="text" id="zip">
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City<span>*</span></label>
                                <input type="text" id="town">
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="email">
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone">
                            </div> -->
                            <!-- <div class="col-lg-12">
                                <div class="create-item">
                                    <label for="acc-create">
                                        Create an account?
                                        <input type="checkbox" id="acc-create">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div> -->
                        </div>
                        </form> 
                    </div>
                
               
                    
                
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
@endsection