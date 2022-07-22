@extends('_Layout')
@section('content')
<section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="/img/banner-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Honda CBR 1000RR-R Fireblade</span>
                            <h1>Moto Honda</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <!-- <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div> -->
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="/img/banner-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Yamaha R1</span>
                            <h1>Moto Yamaha</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <!-- <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div> -->
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="/img/banner-3.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>SUPERSPORT 950</span>
                            <h1>Moto Ducati</h1>
                            <p>Sportier in appearance, more fun to ride.
                               Easier, safer, and more comfortable.</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <!-- <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div> -->
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="/img/banner-4.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Kawasaki Ninja ZX-10R</span>
                            <h1>Moto Kawasaki</h1>
                            <p>a large displacement vehicle with unparalleled strength,
                                 super-modern equipment is referred to as "the god of 
                                 thunder" or "lightning" by the world who loves large displacement vehicles.  </p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <!-- <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img style="width: 314px;height: 169px;" src="/img/banner-1.jpg" >
                        <div class="inner-text">
                            <h4>HONDA</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img style="width: 314px;height: 169px;" src="/img/banner-2.jpg" >
                        <div class="inner-text">
                            <h4>YAMAHA</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img style="width: 314px;height: 169px;" src="/img/banner-3.jpg" >
                        <div class="inner-text">
                            <h4>DUCATI</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="single-banner">
                        <img style="width: 314px;height: 169px;" src="/img/banner-4.jpg" alt="">
                        <div class="inner-text">
                            <h4>KAWASAKI</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <section class="women-banner spad" >
        <div class="container-fluid">
            <div class="col-md-12">
                <div style="display:flex;">
                    <div style="width: auto;height: 32px;background-color: #c00;display: block;text-align:center;margin:0px 0;font-size:26px;padding:0 10px;color:white" >Kết Quả </div>
                    
                </div>
                <hr class="soften" style="margin:0 0 20px 0px;height:2px;background-color:#c00;">
            </div>
            <div class="row">
            
                
            @isset($search_product)
                @foreach($search_product as $r)
                <div class=" col-md-3">
                

                    <div class="product-item">
                        <div class="pi-pic">
                            <img style="height: 160px;" src="{{asset('/storage/images/products/'.$r->image)}}" alt="">

                            
                            <!-- <div class="sale">Sale</div> -->
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="{{route('fdetail').'/'.$r->product_id}}">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                           
                            <a href="#">
                                <h5>{{$r->tenxe}}</h5>
                            </a>
                            <div class="product-price">
                                    {{number_format($r->giaban),1}}VNĐ
                            </div>
                        </div>
                    </div>
                    

                </div>
                @endforeach
                @endisset
                

            
        </div>
    </section>


@endsection