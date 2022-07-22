 

<div class="nav-item">
    <div class="container">
        <div class="nav-depart">
            <div class="depart-btn">
                <i class="ti-menu"></i>
                <span>Hãng Xe</span>
                
                <ul class="depart-hover" id="menutha">
                @foreach($category as $cate)
               <li><a href="{{route('sanphamtheoloai').'/'.$cate->slug}}">{{$cate->loaixe}} </a></li>
               @endforeach
                </ul>
               

                    
            </div>
        </div>
        <nav class="nav-menu mobile-menu">
            <ul>
                <li class=""><a href="{{route('Home')}}"><span class="icon_house"></span>Home</a></li>
                <!-- <li><a href="./shop.html">Shop</a></li>
                <li><a href="#">Collection</a>
                    <ul class="dropdown">
                        <li><a href="#">Men's</a></li>
                        <li><a href="#">Women's</a></li>
                        <li><a href="#">Kid's</a></li>
                    </ul>
                </li> -->
                <li><a href="{{URL::to('/blog')}}">Blog</a></li>
                <li><a href="{{URL::to('/lien-he')}}">Contact</a></li>
                <li><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./blog-details.html">Blog Details</a></li>
                        <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="./check-out.html">Checkout</a></li>
                        <li><a href="./faq.html">Faq</a></li>
                        <li><a href="./register.html">Register</a></li>
                        <li><a href="./login.html">Login</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>


<!-- <script>
     $(document).ready(function(){
       var url='{{route("fgetallloaixe")}}';
     
        $.get(url,function(data){
            $.each(data,function(i,v){
                $("#menutha").append('<li><a href="{{URL::to('/loaixe')}}">'+v.loaixe+'</a></li>'); 
            })
        });
     });
</script> -->
