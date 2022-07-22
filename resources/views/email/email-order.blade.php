<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
  </head>
  <body>
  <div class="container" style="padding:15px;">
    <div class="col-md-12">
        <p style="text-align: center">
            Email từ cửa hàng xe mô tô PKL MMJ
        </p>
        <div class="row" style="padding: 15px;">
            <div clss="col-md-6" style="text-align: center;font-weight: bold;font-size: 30px ">
                <h4 style="margin: 0px;">Cửa hàng xe mô tô PKL MMJ</h4>
                <h6 style="margin: 0px;">Dịch vụ bán hàng chuẩn quốc tế</h6>
            </div>
            <div class="col-md-6 logo" >
                <p>Chào bạn<strong style="color:#000;text-decoration: underline;">{{$allemail->hoten}}</strong></p>
            </div>
            <div class="col-md-12">
                <p style="font-size: 17px;">
                    Bạn đã đặt hàng ở cửa hàng với thông tin như sau:
                </p>
                <h4 style="color: #000; text-transform: uppercase;">Thông tin đơn hàng</h4>
                <!-- <p>Mã đơn hàng:<strong style=" text-transform: uppercase;color: #fff"></strong> </p> -->
                <p>Dịch vụ:<strong style="text-transform: uppercase;">Đặt hàng trực tuyến</strong></p>
                <h4 style="color: #000;text-transform: uppercase;">Thông tin người nhận</h4>
                <p>Email:
                    @if($allemail->shipping_email=='')
                        Không có
                    
                    @else
                        <span style="color: #fff">{{$allemail->shipping_email}}</span>
                    @endif
                </p>
                <p>Họ và tên:
                    @if($allemail->shipping_name=='')
                        Không có
                    
                    @else
                        <span >{{$allemail->shipping_name}}</span>
                    @endif
                </p>
                <p>Địa chỉ nhận hàng:
                    @if($allemail->shipping_address=='')
                        Không có
                    
                    @else
                        <span >{{$allemail->shipping_address}}</span>
                    @endif
                </p>
                <p>Số điện thoại:
                    @if($allemail->shipping_phone=='')
                        Không có
                    
                    @else
                        <span >{{$allemail->shipping_phone}}</span>
                    @endif
                </p>
                <p>Ghi chú:
                    @if($allemail->shipping_note=='')
                        Không có
                    
                    @else
                        <span >{{$allemail->shipping_note}}</span>
                    @endif
                </p>
                <p style="color: #fff"></p>
                <h4 style="color:#000;text-transform: uppercase;">Sản phẩm đã đặt</h4>
                <table class="table table-bordered " >
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>

                            <th>Giá tiền</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $content=Cart::content();
                            ?>
                    @foreach($content as $ct)
                  
                  
                        <tr>
                            <td>{{$ct->name}}</td>
                            <td>{{$ct->qty}}</td>
                            <td>{{number_format($ct->price).''.'vnđ'}}</td>
                            <td>{{$subtotal=number_format($ct->price*$ct->qty).' '.'vnđ'}}</td>
                           
                          
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" >
                           <p>Mọi thắc mắc xin liên hệ với cửa hàng theo số điện thoại 0334063808. </p>
                           <p>Xin chân thành cảm ơn!!!</p>
                        </td>
                    </tr>
                    </tbody>
                    
                </table>

            </div>
        </div>
    </div>
  </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" ></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>