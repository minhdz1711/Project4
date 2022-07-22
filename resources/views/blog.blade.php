@extends('_Layout')
@section('content')
 <!-- Breadcrumb Section Begin -->
 <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                       
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        
                        
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-1.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-2.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-3.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                                <a href="#" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="img/blog/recent-4.jpg" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6>The Personality Trait That Makes...</h6>
                                        <p>Fashion <span>- May 19, 2019</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div> -->
                <div class="col-lg-9 order-1 order-lg-2">
                
                    <div class="row">
                    @isset($blogs)
                    @foreach($blogs as $r)
                        <div  class="col-lg-6 col-sm-6">
                            <div class="blog-item"style="border: 2px solid red;">
                                <div class="bi-pic">
                                    <a href="{{route('detailblog').'/'.$r->blog_id}}"><img src="img/{{$r->blog_image}}" alt=""></a>
                                </div>
                                <div class="bi-text">
                                    <a href="./blog-details.html">
                                    <h4>{{$r->blog_title}}</h4>
                                    
                                    </a>
                                    <p>
                                        <span style="margin-left:10%"><i class="fa fa-calendar"></i>{{$r->blog_date}}</span>

                                        <span style="width:50%; margin-left:20%"><i class="fa fa-eye"></i>{{$r->blog_view}}</span>
                                    
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @endisset
                    
                        
                        <!-- <div class="col-lg-12">
                            <div class="loading-more">
                                <i class="icon_loading"></i>
                                <a href="#">
                                    Loading More
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection