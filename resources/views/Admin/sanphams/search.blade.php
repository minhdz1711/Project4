@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><a href="{{route('asanphamsindex')}}">Trang chủ</a></li> / 
                            
                            <li class="active">Danh sách xe</li>
                        </ol>
                    </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <button type="button" class="btn btn-success" style="width: 100px; margin: 0px 0 20px 20px;"><a style="text-decoration: none;color: white;" href="{{route('asanphamsaddnew')}}">Thêm</a></button>
                    <form>
                        <button style="float: right;border-radius: 4px;margin-left: 4px;font-size:20px;" type="submit"><i class="fa fa-search"></i></button>
                        <div style="float: right;margin: 0px 0 20px 20px;" class="form-group">
                            <select style="font-size:15px;" class="form-control" name="loai">
                                <option value="">
                                Loại Xe
                                </option>
                                @if(isset($dbloai))
                                @foreach($dbloai as $l)
                                <option value="{{$l->loaixe}}" {{\Request::get("loai")== $l->loaixe ? "selected='selected'":""}}>{{$l->loaixe}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                       
                    </form>
                    <form method="post" action="{{URL::to('/Admin/sanphams/search')}}">
                        {{ csrf_field() }}  
                        <input style="font-size:20px;border-radius:4px;float:right; margin-bottom:20px;"  name="search"  placeholder="Search" class="search-query span2" value="{{\Request::get('search')}}" >  
                        </form>
                   
                    <table class="table table-bordered" id="dssp" >
                        <thead>
                            <tr>
                                
                                <th>Tên sản phẩm</th>
                                <th>Loại xe</th>
                                <th>Ảnh</th>

                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Trang thái</th>
                                <th>Nổi bật</th>

                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @isset($sanphams_search)
                        @foreach($sanphams_search as $r)
                            <tr >

                                <td title="tenxe">{{$r->tenxe}}</td>
                               
                                <td title="loaixe"  >{{$r->loaixe}}</td>
                               
                                <td title="image"><img src="/img/{{$r->image}}" style="width:80px;height:50px;text-align:center" /></td>

                                <td title="soluong">{{$r->soluong}}</td>
                                
                                <td title="giaban">{{number_format($r->giaban),1}}VNĐ</td>
                                
                                <!-- <td>{{$r->mota}}</td> -->
                                <td><input type="checkbox" name="tt" id="tt"  value="{{$r->trangthai}}" {{$r->trangthai==1?"checked":""}}></td>
                                <td><input type="checkbox" name="hot" id="nt" value="{{$r->noibat}}" {{$r->noibat==1?"checked":""}}></td>
                                <td><a href="{{URL::to('/edit').'/'.$r->product_id}}" class='btn btn-info'><i class="fas fa-edit"></i>Edit</a></td>
                                <td><a  onclick="return confirm('Bạn có chắc muốn xóa xe {{$r->tenxe}}?')" href="{{route('asanphamsremove').'/'.$r->product_id}}" class='btn btn-danger'><i class="fas fa-trash"></i>Delete</a></td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                    
                                                                      
                            
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                        
                   </nav>
                    
                </div>
               
            </div>
        </div>
    

</div>

@endsection