@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
					
			<div class="page-header">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li> / 
                            
                    <li><a href="{{route('ablogsindex')}} " title="danh sách xe">Danh sách tin tức</a></li> /
					<li class="active">Sửa tin tức</li> 
				</ol>
			</div>
					
		</div>
		<div class="card-body">
		@foreach($eblog as $r)
		<form action="{{URL::to('/updateblog/'.$r->blog_id)}}"  method="POST" enctype="multipart/form-data">
			<div class="row">
				{{ csrf_field() }}
				<div class="col-md-6">
				<!-- <caption>Edit sản phẩm</caption> -->
				<div class="form-group">
					
					<input type="text" class="form-control"  name="txtid" value="{{$r->blog_id}}"  disabled>
						
				</div>
				<div class="form-group">
					<label>Tiêu Đề</label>
					<input type="text" class="form-control"  name="txttieude" value="{{$r->blog_title}}">
						
				</div>
				
				
				<div class="form-group">
					<label>Nội dung</label>
					
					<textarea  id="ckeditor6" type="text" class="form-control" cols="30" rows="3" placeholder="Nội dung" name="txtnoidung" >{{$r->blog_content}}</textarea>	
				</div>
				<div class="form-group">
					<label>Ngày đăng</label>
					<input type="date" class="form-control"  name="txtngaydang" value="{{$r->blog_date}}">
				
						
				</div>
			</div>
			<div class="col-md-6">
				
				<div class="form-group">
					<label>Ảnh</label>
					<input type="file" class="form-control"  name="txtimage" value="{{$r->blog_image}}">
					<img style="height:80px;width:120px;" src="/app/image/{{$r->blog_image}}">
						
				</div>
				<div  class="form-group">
					<div class="checkbox">
						<label>Trạng thái <input type="checkbox" name="blogtt"  {{$r->blog_status==1?"checked":""}}></label>
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