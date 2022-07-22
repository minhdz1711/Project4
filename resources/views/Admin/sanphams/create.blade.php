@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
                
			<div class="page-header">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li> / 
					
					<li><a href="{{route('asanphamsindex')}} " title="danh sách xe">Danh sách xe</a></li> /
					<li class="active">Thêm mới</li> 
				</ol>
			</div>
               
        </div>
		<div class="card-body ">
		<form  action="{{route('asanphamssave')}}"  method="post" enctype="multipart/form-data">
			<div class="row">
			{{ csrf_field() }}
			<!-- <caption>Add sản phẩm</caption> -->
			<div class="col-md-6">
			<!-- <div  class="form-group">
					<label>Mã xe</label>
					<input type="text" class="form-control" placeholder="mã xe" name="txtidxe" value="{{old('txtidxe')}}">
					@if($errors->has('txtidxe'))
						<div class="error-text">
							{{$errors->first('txtidxe')}}
						</div>
					@endif
				</div > -->
				<div  class="form-group">
					<label>Tên xe</label>
					<input type="text" class="form-control" placeholder="tên xe" name="txttenxe" value="{{old('txttenxe')}}">
					@if($errors->has('txttenxe'))
						<div class="error-text">
							{{$errors->first('txttenxe')}}
						</div>
					@endif
				</div >
				<div  class="form-group">
					<label> Loại xe</label>
					
					<select name="txtid_loaixe" class="form-control">
					@foreach($category_pr as $r)
						<option value="{{$r->id}}">{{$r->loaixe}}</option>

						
					@endforeach
					</select>

						
					
					@if($errors->has('txtid_loaixe'))
						<div class="error-text" >
							{{$errors->first('txtid_loaixe')}}
						</div>
					@endif
				</div>
				<div  class="form-group">
					<label>Số lượng</label>
					<input type="text" class="form-control" placeholder="số lượng" name="txtsoluong" value="{{old('txtsoluong')}}">
					@if($errors->has('txtsoluong'))
						<div class="error-text" >
							{{$errors->first('txtsoluong')}}
						</div>
					@endif
				</div>
				<div  class="form-group">
					<label>Giá Bán</label>
					<input type="text" class="form-control" placeholder="giá bán" name="txtgiaban" value="{{old('txtgiaban')}}">
					@if($errors->has('txtgiaban'))
						<div class="error-text">
							{{$errors->first('txtgiaban')}}
						</div>
					@endif
				</div>
				<div  class="form-group">
					<label>Khuyến mãi</label>
					<input type="text" class="form-control" placeholder="khuyến mãi" name="txtkhuyenmai" value="{{old('txtkhuyenmai')}}">
				</div>
				<div  class="form-group">
					<label>Nội Dung</label>
					<textarea id="ckeditor4"  class="form-control" cols="30" rows="3" placeholder="Nội dung" name="txtnoidung" value="{{old('txtnoidung')}}"></textarea>
					@if($errors->has('txtnoidung'))
						<div class="error-text">
							{{$errors->first('txtnoidung')}}
						</div>
					@endif
				</div>
				
            </div>
			<div class="col-md-6">
			    <div  class="form-group">
					<label>Mô tả</label>
					<textarea id="ckeditor1"  class="form-control" cols="30" rows="3" placeholder="Mô tả" name="txtmota" value="{{old('txtmota')}}"></textarea>
					@if($errors->has('txtmota'))
						<div class="error-text">
							{{$errors->first('txtmota')}}
						</div>
					@endif
				</div>
				<div  class="form-group">
					<label>Ảnh</label>
					<input type="file" class="form-control" name="txtimage" value="{{old('txtimage')}}">
					@if($errors->has('txtimage'))
						<div class="error-text" >
							{{$errors->first('txtimage')}}
						</div>
					@endif
				</div>
				<div  class="form-group">
					<div class="checkbox">
						<label>Trạng thái <input type="checkbox" name="tt"  value="{{old('tt')}}"></label>
					</div>
					<div class="checkbox">
						<label>Nổi bật <input type="checkbox" name="hot"  value="{{old('hot')}}"></label>
					</div>
				</div>
            </div>
			<button type="submit" class="btn btn-primary" name="cmd">Lưu thông tin</button>
        </div>
		</form>
        </div>
    </div>
</div>

		
@endsection