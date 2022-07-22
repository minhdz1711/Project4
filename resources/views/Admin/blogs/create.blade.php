@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
                
			<div class="page-header">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li> / 
					
					<li><a href="{{route('asanphamsindex')}} " title="danh sách xe">Danh sách tin tức</a></li> /
					<li class="active">Thêm mới</li> 
				</ol>
			</div>
               
        </div>
		<div class="card-body ">
		<form  action="{{route('ablogssave')}}"  method="post" enctype="multipart/form-data">
			<div class="row">
			{{ csrf_field() }}
			
			<div class="col-md-6">
			
				<div  class="form-group">
					<label>Tiêu Đề</label>
					<input type="text" class="form-control" placeholder="Tiêu đề" name="txttieude" value="{{old('txttieude')}}">
					@if($errors->has('txttenxe'))
						<div class="error-text">
							{{$errors->first('txttieude')}}
						</div>
					@endif
				</div >
				
				<div  class="form-group">
					<label>Nội Dung</label>
					<textarea id="ckeditor5"  class="form-control" cols="30" rows="3" placeholder="Nội dung" name="txtnoidung" value="{{old('txtnoidung')}}"></textarea>
					@if($errors->has('txtnoidung'))
						<div class="error-text" >
							{{$errors->first('txtnoidung')}}
						</div>
					@endif
				</div>
				
				
				
            </div>
			<div class="col-md-6">
                <div  class="form-group">
					<label>Ngày Đăng</label>
					<input type="date" class="form-control" placeholder="ngày đăng" name="txtngaydang" value="{{old('txtngaydang')}}">
					@if($errors->has('txtngaydang'))
						<div class="error-text">
							{{$errors->first('txtngaydang')}}
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
						<label>Trạng thái <input type="checkbox" name="blogtt"  value="{{old('blogtt')}}"></label>
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