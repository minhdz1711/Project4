@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><a href="{{route('asanphamsindex')}}">Trang chủ</a></li> / 
                            
                            <li class="active">Danh sách tin tức</li>
                        </ol>
                    </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <button type="button" class="btn btn-success" style="width: 100px; margin: 0px 0 20px 20px;"><a style="text-decoration: none;color: white;" href="{{route('ablogsaddnew')}}">Thêm</a></button>
                    
                        <form method="post" action="{{URL::to('/Admin/sanphams/search')}}">
                        {{ csrf_field() }}  
                        <input style="font-size:20px;border-radius:4px;float:right; margin-bottom:20px;"  name="search"  placeholder="Search" class="search-query span2" value="{{\Request::get('search')}}" >  
                        </form>
                   
                   
                    <table class="table table-bordered"  >
                        <thead>
                            <tr>
                                
                                <th>Tiêu Đề</th>
                                <th>Nội Dung</th>                           
                                <th>Ảnh</th>
                                <th>Trạng Thái</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                                                        
                                
                            </tr>
                        </thead>
                        <tbody>
                        @isset($dbblog)
                        @foreach($dbblog as $r)
                            <tr >

                                <td title="tiêu đề">{{$r->blog_title}}</td>                              
                                <td title="nội dung"  >{!! $r->blog_content !!}</td>      
                                <td title="image"><img src="/image/{{$r->blog_image}}" style="width:80px;height:50px;text-align:center" /></td>
                                
                                 <td><input type="checkbox" name="blogtt"   value="{{$r->blog_status}}" {{$r->blog_status==1?"checked":""}}></td>
                                
                                <td><a href="{{URL::to('/editblog').'/'.$r->blog_id}}" class='btn btn-info'><i class="fas fa-edit"></i>Edit</a></td>
                                <td><a  onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('ablogsremove').'/'.$r->blog_id}}" class='btn btn-danger'><i class="fas fa-trash"></i>Delete</a></td>
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