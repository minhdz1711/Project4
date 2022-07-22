@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li> / 
                            
                            <li ><a href="{{URL::to('/Admin/orders/manage-order')}}">Danh sách order</a></li> /
                            <li class="active">chi tiết đơn hàng</li>
                        </ol>
                    </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin khách hàng</h6>
                </div>


                    <!-- <button type="button" class="btn btn-success" style="width: 100px; margin: 0px 0 20px 20px;"><a style="text-decoration: none;color: white;" href="">Thêm</a></button> -->
                    <!-- <form>
                        <button style="float: right;border-radius: 4px;margin-left: 4px;font-size:20px;" type="submit"><i class="fa fa-search"></i></button>
                        <div style="float: right;margin: 0px 0 20px 20px;" class="form-group">
                            <select style="font-size:15px;" class="form-control" name="loai">
                                <option value="">
                                Loại Xe
                                </option>
                                @if(isset($dbloai))
                                @foreach($dbloai as $l)
                                <option value="{{$l->id}}" {{\Request::get("loai")== $l->id ? "selected='selected'":""}}>{{$l->loaixe}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <input style="font-size:20px;border-radius:4px;float:right; margin-bottom:20px;"  name="search"  placeholder="Search" class="search-query span2" value="{{\Request::get('search')}}" >  
                    </form> -->
                   
                    <table class="table table-bordered" id="dssp" >
                        <thead>
                            <tr>
                                
                                <th>Tên khách hàng</th>                                
                                
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                            <tr >

                                <td title="tên người mua">{{$order_by_id->hoten}}</td>
                                <td title="số điện thoại">{{$order_by_id->phone}}</td>                                                              
                            </tr>
                            
                        </tbody>
                    </table>
                    
                                                                      
                            
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                      
                   </nav>
                    
                </div>
               
            </div>
            <br>
            <div class="card-body">
                <div class="table-responsive">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thông tin vận chuyển</h6>
                </div>


                    <!-- <button type="button" class="btn btn-success" style="width: 100px; margin: 0px 0 20px 20px;"><a style="text-decoration: none;color: white;" href="">Thêm</a></button> -->
                    <!-- <form>
                        <button style="float: right;border-radius: 4px;margin-left: 4px;font-size:20px;" type="submit"><i class="fa fa-search"></i></button>
                        <div style="float: right;margin: 0px 0 20px 20px;" class="form-group">
                            <select style="font-size:15px;" class="form-control" name="loai">
                                <option value="">
                                Loại Xe
                                </option>
                                @if(isset($dbloai))
                                @foreach($dbloai as $l)
                                <option value="{{$l->id}}" {{\Request::get("loai")== $l->id ? "selected='selected'":""}}>{{$l->loaixe}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <input style="font-size:20px;border-radius:4px;float:right; margin-bottom:20px;"  name="search"  placeholder="Search" class="search-query span2" value="{{\Request::get('search')}}" >  
                    </form> -->
                   
                    <table class="table table-bordered" id="dssp" >
                        <thead>
                            <tr>
                                
                                <th>Tên người nhận</th>                                
                                
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                            </tr>
                        </thead>
                        <tbody>
                     
                            <tr >

                                <td title="tên người nhận">{{$order_by_id->shipping_name}}</td>
                                <td title="địa chỉ">{{$order_by_id->shipping_address}}</td>        
                                <td title="số điện thoại ">{{$order_by_id->shipping_phone}}</td>                                                              
                            </tr>
                            
                        </tbody>
                    </table>
                    
                                                                      
                            
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                      
                   </nav>
                    
                </div>
               
            </div>
            <br><br>
            <div class="card-body">
                <div class="table-responsive">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                </div>


                    <!-- <button type="button" class="btn btn-success" style="width: 100px; margin: 0px 0 20px 20px;"><a style="text-decoration: none;color: white;" href="">Thêm</a></button> -->
                    <!-- <form>
                        <button style="float: right;border-radius: 4px;margin-left: 4px;font-size:20px;" type="submit"><i class="fa fa-search"></i></button>
                        <div style="float: right;margin: 0px 0 20px 20px;" class="form-group">
                            <select style="font-size:15px;" class="form-control" name="loai">
                                <option value="">
                                Loại Xe
                                </option>
                                @if(isset($dbloai))
                                @foreach($dbloai as $l)
                                <option value="{{$l->id}}" {{\Request::get("loai")== $l->id ? "selected='selected'":""}}>{{$l->loaixe}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <input style="font-size:20px;border-radius:4px;float:right; margin-bottom:20px;"  name="search"  placeholder="Search" class="search-query span2" value="{{\Request::get('search')}}" >  
                    </form> -->
                   
                    <table class="table table-bordered" id="dssp" >
                        <thead>
                            <tr>
                                
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá</th> 
                               
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                            <tr >

                                <td title="tên sản phẩm">{{$order_by_id->product_name}}</td>
                                <td title="số lượng">{{$order_by_id->product_quantity}}</td>
                                
                                <td title="giá">{{$order_by_id->product_price}}</td>
                                
                                <td title="tổng tiền">{{$order_by_id->order_total}}VNĐ</td>
                                
                               
                            </tr>
                            
                        </tbody>
                    </table>
                    
                                                                      
                            
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                      
                   </nav>
                    
                </div>
               
            </div>
        </div>
    

</div>

@endsection