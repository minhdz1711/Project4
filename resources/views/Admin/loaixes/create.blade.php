@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
	<div class="card shadow mb-4">
		<div class="card-header py-3">
                
			<div class="page-header">
				<ol class="breadcrumb">
					<li><a href="#">Trang chủ</a></li> / 
					
					<li><a href="{{route('asanphamsindex')}} " title="danh sách loại xe">Danh sách loại xe</a></li> /
					<li class="active">Thêm mới</li> 
				</ol>
			</div>
               
        </div>
		<div class="card-body ">
		<form  action="{{route('aloaixessave')}}"  method="post" enctype="multipart/form-data">
			<div class="row">
			{{ csrf_field() }}
			<!-- <caption>Add sản phẩm</caption> -->
			<div class="col-md-6">
				<div  class="form-group">
					<label>Loại xe</label>
					<input type="text" class="form-control" placeholder="loại xe" name="txtloaixe" value="{{old('txtloaixe')}}">
					@if($errors->has('txtloaixe'))
						<div class="error-text">
							{{$errors->first('txtloaixe')}}
						</div>
					@endif
				</div >
				<div  class="form-group">
					<label>Slug</label>
					<input type="text" class="form-control" placeholder="slug" name="txtslug" value="{{old('txtslug')}}">
					@if($errors->has('txtslug'))
						<div class="error-text">
							{{$errors->first('txtslug')}}
						</div>
					@endif
				</div >
				
            </div>
			<div class="col-md-6">
				
				
				<div  class="form-group">
					<div class="checkbox">
						<label>Trạng thái <input type="checkbox" name="tt"  value="{{old('tt')}}"></label>
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