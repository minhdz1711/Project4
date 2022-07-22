@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
					
			<div class="page-header">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li> / 
                            
                    <li><a href="{{route('aloaixesindex')}} " title="danh sách xe">Danh sách loại xe</a></li> /
					<li class="active">Sửa thông tin loại xe</li> 
				</ol>
			</div>
					
		</div>
		<div class="card-body">
		@foreach($editloai as $r)
		<form action="{{URL::to('/updateloai/'.$r->id)}}"  method="POST">
			
		{{ csrf_field() }}
				
				<!-- <caption>Edit sản phẩm</caption> -->
				<div class="form-group">
					<label>Mã loại xe</label>
					<input type="text" class="form-control"  name="txtid" value="{{$r->id}}" disabled>
						
				</div>
				<div class="form-group">
					<label>Tên loại xe</label>
					<input type="text" class="form-control"  name="txtloaixe" value="{{$r->loaixe}}">
						
				</div>
				<div class="form-group">
					<label>Slug</label>
					<input type="text" class="form-control"  name="txtslug" value="{{$r->slug}}">
						
				</div>
				
				<div  class="form-group">
					<div class="checkbox">
						<label>Trạng thái <input type="checkbox" name="tt"  {{$r->trangthai==1?"checked":""}}></label>
					</div>
					
				</div>
				
			
			<button type="submit" class="btn btn-primary" >Lưu thông tin</button>
		</form>
		@endforeach
        </div>
    </div>
</div>

@endsection	