@extends('_Layout')
@section('content')
 <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                       
                        <a href="{{URL::to('/blog')}}"> Blog</a>
                        <span>Blog-detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   @isset($ctblog)
                   @if($ctblog)
                   
                    <h2 style="color:#212121;">{{$ctblog->blog_title}}</h2>
                    
                    <div class="line" style="margin-top: 20px;margin-bottom: 20px;">
    
                        <div class="line1" style="width: 100%;height: 3px; position: relative; background-color: #c00;opacity: .1;">  
                        </div>
                        <div class="line2" style="width: 100px;height: 3px; position: absolute; background-color: #c00;opacity: .1;">
                        </div>
                    </div>
                    <div>
                        {!! $ctblog->blog_content !!}
                    </div>
                   @endif
                   @endisset
                </div>
            </div>
        </div>
    </section>
@endsection