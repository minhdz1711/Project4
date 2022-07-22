@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li> / 
                            
                            <li class="active">Danh sách order</li>
                        </ol>
                    </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">

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
                                
                                <th>Tên người mua</th>
                                <th>Tổng tiền</th>
                                <th>Tình trạng</th> 
                                <th>Xem</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                        @isset($all_order)
                        @foreach($all_order as $r)
                            <tr >

                                <td title="tên người mua">{{$r->hoten}}</td>
                                <td title="tổng tiền">{{$r->order_total}}</td>
                                
                                <td title="status">{{$r->order_status}}</td>
                                
                              
                                
                                <td><a href="{{URL::to('Admin/orders/view-order/'.$r->order_id)}}" class='btn btn-info'><i class="fas fa-detail"></i>Xem</a></td>
                                <td><a onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{URL::to('/delete-order/'.$r->order_id)}}" class='btn btn-danger'><i class="fas fa-trash"></i>Delete</a></td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                    
                                                                      
                            
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                      
                   </nav>
                    
                </div>
                <!-- <div id="myModal2" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="m2-title">Modal Header</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Mã sản phẩm:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MaSP" class="form-control" id="txtmasp" required/>
                                    <label>Tên sản phẩm:</label>
                                    <input type="text" ng-model="SanPhamAdmin.TenSP" class="form-control" id="txttensp" />
                                    <label>Mã loại sản phẩm:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MaLoaiSP" class="form-control" id="txtmaloai" />
                                    <label>Mã nhà cung cấp:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MaNCC" class="form-control" id="txtmancc" />
                                    <label>Số lượng:</label>
                                    <input type="text" ng-model="SanPhamAdmin.SoLuong" class="form-control" id="txtsoluong" />
                                    <label>Đơn giá:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DonGia" class="form-control" id="txtdongia" />
                                    <label>Image:</label>
                                    <input type="text" ng-model="SanPhamAdmin.Image" class="form-control" id="txtimage" />
                                    <label>Mô tả:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MoTa" class="form-control" id="txtmota" />
                                    <label>Khối lượng:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KhoiLuong" class="form-control" id="txtkhoiluong" />
                                    <label>Dài x Rộng x Cao:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DRC" class="form-control" id="txtdrc" />
                                    <label>Khoảng cách trục bánh xe:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KCTBX" class="form-control" id="txtkctbx" />
                                    <label>Độ cao yên:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DCY" class="form-control" id="txtdcy" />
                                    <label>Khoảng cách gầm xe:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KCGX" class="form-control" id="txtkcgx" />
                                    <label>Dung tích bình xăng:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DTBX" class="form-control" id="txtdtbx" />
                                    <label>Khoảng cách lớp trước/sau:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KCLTS" class="form-control" id="txtkclts" />
                                    <label>Phuộc trước:</label>
                                    <input type="text" ng-model="SanPhamAdmin.PT" class="form-control" id="txtpt" />
                                    <label>Phuộc sau:</label>
                                    <input type="text" ng-model="SanPhamAdmin.PS" class="form-control" id="txtps" />
                                    <label>Loại động cơ:</label>
                                    <input type="text" ng-model="SanPhamAdmin.LDC" class="form-control" id="txtldc" />
                                    <label>Công suất tối đa:</label>
                                    <input type="text" ng-model="SanPhamAdmin.CSTD" class="form-control" id="txtcstd" />
                                    <label>Dung tích nhớt máy:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DTNM" class="form-control" id="txtdtnm" />
                                    <label>Mức tiêu thụ nhiên liệu:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MTTNL" class="form-control" id="txtmttnl" />
                                    <label>Hộp số:</label>
                                    <input type="text" ng-model="SanPhamAdmin.HS" class="form-control" id="txths" />
                                    <label>Loại truyền động:</label>
                                    <input type="text" ng-model="SanPhamAdmin.LTD" class="form-control" id="txtltd" />
                                    <label>Hệ thống khởi động:</label>
                                    <input type="text" ng-model="SanPhamAdmin.HTKD" class="form-control" id="txthtkd" />
                                    <label>Moment cực đại:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MCD" class="form-control" id="txtmcd" />
                                    <label>Dung tích xy-lanh:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DTXL" class="form-control" id="txtdtxl" />
                                    <label>Đường kính x hành trình pít tông:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DKHTBT" class="form-control" id="txtdkhtbt" />
                                    <label>Tỷ số nén:</label>
                                    <input type="text" ng-model="SanPhamAdmin.TSN" class="form-control" id="txttsn" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-default" ng-click="add_data()">Add</button>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="m-title">Modal Header</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    
                                    <label>Ma sản phẩm:</label>
                                    <input type="text"  ng-model="SanPhamAdmin.MaSP" class="form-control" id="txtmasp" />
                                    <label>Tên sản phẩm:</label>
                                    <input type="text" ng-model="SanPhamAdmin.TenSP" class="form-control" id="txttensp" />
                                    <label>Mã loại sản phẩm:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MaLoaiSP" class="form-control" id="txtmaloai" />
                                    <label>Mã nhà cung cấp:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MaNCC" class="form-control" id="txtmancc" />
                                    <label>Số lượng:</label>
                                    <input type="text" ng-model="SanPhamAdmin.SoLuong" class="form-control" id="txtsoluong" />
                                    <label>Đơn giá:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DonGia" class="form-control" id="txtdongia" />
                                    <label>Image:</label>
                                    <input type="text" ng-model="SanPhamAdmin.Image" class="form-control" id="txtimage" />
                                    <label>Mô tả:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MoTa" class="form-control" id="txtmota" />
                                    <label>Khối lượng:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KhoiLuong" class="form-control" id="txtkhoiluong" />
                                    <label>Dài x Rộng x Cao:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DRC" class="form-control" id="txtdrc" />
                                    <label>Khoảng cách trục bánh xe:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KCTBX" class="form-control" id="txtkctbx" />
                                    <label>Độ cao yên:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DCY" class="form-control" id="txtdcy" />
                                    <label>Khoảng cách gầm xe:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KCGX" class="form-control" id="txtkcgx" />
                                    <label>Dung tích bình xăng:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DTBX" class="form-control" id="txtdtbx" />
                                    <label>Khoảng cách lớp trước/sau:</label>
                                    <input type="text" ng-model="SanPhamAdmin.KCLTS" class="form-control" id="txtkclts" />
                                    <label>Phuộc trước:</label>
                                    <input type="text" ng-model="SanPhamAdmin.PT" class="form-control" id="txtpt" />
                                    <label>Phuộc sau:</label>
                                    <input type="text" ng-model="SanPhamAdmin.PS" class="form-control" id="txtps" />
                                    <label>Loại động cơ:</label>
                                    <input type="text" ng-model="SanPhamAdmin.LDC" class="form-control" id="txtldc" />
                                    <label>Công suất tối đa:</label>
                                    <input type="text" ng-model="SanPhamAdmin.CSTD" class="form-control" id="txtcstd" />
                                    <label>Dung tích nhớt máy:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DTNM" class="form-control" id="txtdtnm" />
                                    <label>Mức tiêu thụ nhiên liệu:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MTTNL" class="form-control" id="txtmttnl" />
                                    <label>Hộp số:</label>
                                    <input type="text" ng-model="SanPhamAdmin.HS" class="form-control" id="txths" />
                                    <label>Loại truyền động:</label>
                                    <input type="text" ng-model="SanPhamAdmin.LTD" class="form-control" id="txtltd" />
                                    <label>Hệ thống khởi động:</label>
                                    <input type="text" ng-model="SanPhamAdmin.HTKD" class="form-control" id="txthtkd" />
                                    <label>Moment cực đại:</label>
                                    <input type="text" ng-model="SanPhamAdmin.MCD" class="form-control" id="txtmcd" />
                                    <label>Dung tích xy-lanh:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DTXL" class="form-control" id="txtdtxl" />
                                    <label>Đường kính x hành trình pít tông:</label>
                                    <input type="text" ng-model="SanPhamAdmin.DKHTBT" class="form-control" id="txtdkhtbt" />
                                    <label>Tỷ số nén:</label>
                                    <input type="text" ng-model="SanPhamAdmin.TSN" class="form-control" id="txttsn" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" ng-click="updatedata()">Save</button>
                            </div>
                        </div>

                    </div>
                </div> -->
                <!-- <div id="myModal1" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="m1-title">Modal Header</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" value="" id="id" />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" >Delete</button>
                            </div>
                        </div>

                    </div>
                </div> -->
            </div>
        </div>
    

</div>

@endsection