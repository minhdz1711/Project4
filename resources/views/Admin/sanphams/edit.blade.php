@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
					
			<div class="page-header">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li> / 
                            
                    <li><a href="{{route('asanphamsindex')}} " title="danh sách xe">Danh sách xe</a></li> /
					<li class="active">Sửa thông tin xe</li> 
				</ol>
			</div>
					
		</div>
		<div class="card-body">
		@foreach($editsp as $r)
		<form action="{{URL::to('/update/'.$r->product_id)}}"  method="post" enctype="multipart/form-data">
			<div class="row">
				{{ csrf_field() }}
				<div class="col-md-6">
				<!-- <caption>Edit sản phẩm</caption> -->
				<div class="form-group">
					
					<input type="text" class="form-control"  name="txtid" value="{{$r->product_id}}" disabled>
						
				</div>
				<div class="form-group">
					<label>Tên xe</label>
					<input type="text" class="form-control"  name="txttenxe" value="{{$r->tenxe}}">
						
				</div>
				<div class="form-group">
				    <label> Loại xe</label>
					<select name="txtid_loaixe">
						@foreach($cate_product as $cate)
					
							@if($cate->id==$r->id_loaixe)
					    	<option selected value="{{$cate->id}}">{{$cate->loaixe}}</option>
							@else
							<option  value="{{$cate->id}}">{{$cate->loaixe}}</option>
							@endif
						@endforeach
					</select>	
				</div>
				<div class="form-group">
					<label>Số lượng</label>
					<input type="text" class="form-control"  name="txtsoluong" value="{{$r->soluong}}">
						
				</div>
				<div class="form-group">
					<label>Giá bán</label>
					<input type="text" class="form-control"  name="txtgiaban" value="{{($r->giaban)}}">
						
				</div>
				<div class="form-group">
					<label>Khuyến mãi</label>
					<input type="text" class="form-control"  name="txtkhuyenmai" value="{{$r->khuyenmai}}">
						
				</div>
				<div class="form-group">
					<label>Nội dung</label>
					
					<textarea  id="ckeditor3" type="text" class="form-control" cols="30" rows="3" placeholder="Nội dung" name="txtnoidung" >{{$r->noidung}}</textarea>	
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Mô tả</label>
					
					<textarea  id="ckeditor2" type="text" class="form-control" cols="30" rows="3" placeholder="Mô tả" name="txtmota" >{{$r->mota}}</textarea>	
				</div>
				<div class="form-group">
					<label>Ảnh</label>
					<input type="file" class="form-control"  name="txtimage" value="{{$r->image}}">
					<img style="height:80px;width:120px;" src="{{asset('/storage/images/products/'.$r->image)}}">
						
				</div>
				<div  class="form-group">
					<div class="checkbox">
						<label>Trạng thái <input type="checkbox" name="tt"  {{$r->trangthai==1?"checked":""}}></label>
					</div>
					<div class="checkbox">
						<label>Nổi bật <input type="checkbox" name="hot"  {{$r->noibat==1?"checked":""}}"></label>
					</div>
				</div>
				
			</div>
			<input type="submit" class="btn btn-primary" name="cmd" value="Lưu thông tin ">
		</form>
		@endforeach
        </div>
    </div>
</div>

@endsection	