@extends('Admin/_Layout_Admin')
@section('content')
<div class="container-fluid" style="text-decoration:none;text-decoration-style:none;">
    
        <div class="card shadow mb-4">
            <div class="card-header py-3">
               
                    <div class="page-header">
                        <ol class="breadcrumb">
                            <li><a href="#">Trang chủ</a></li> / 
                            
                            <li class="active">Danh sách comment</li>
                        </ol>
                    </div>
                
            </div>
            <div id="notify_comment"></div>
            <div class="card-body">
                <div class="table-responsive">                    
                   
                    <table class="table table-bordered"  >
                        <thead>
                            <tr>
                                
                                <th>Duyệt</th>
                                <th>Tên người gửi</th>
                                <th>Bình luận</th>
                                <th>Ngày gửi</th>

                                <th>Sản phẩm</th>
                                <th>Quản lí</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                      
                        @foreach($comment as $comm)
                            <tr >
                                <td>
                                    @if($comm->comment_status==1)
                                    <input type="button" data-comment_status="0" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="comment_duyet btn btn-primary btn-xs" value="Duyệt" />
                                    @else
                                    <input type="button" data-comment_status="1" data-comment_id="{{$comm->comment_id}}" id="{{$comm->comment_product_id}}" class="comment_duyet btn btn-danger btn-xs" value="Bỏ duyệt" />
                                    @endif
                                </td>
                               
                                <td title="">{{$comm->comment_name}}
                                
                                   
                                </td>
                               

                                <td title="">{{$comm->comment}}
                                @if($comm->comment_status==0)
                                    <br><textarea class="form-control reply_comment_{{$comm->comment_id}}" rows=5> </textarea>
                                    <br><button class="btn btn-default btn-sm btn-reply-comment" data-product_id="{{$comm->comment_product_id}}" data-comment_id="{{$comm->comment_id}}">Trả lời</button>
                               
                                    
                                @endif
                                </td>
                                
                                <td title="">{{$comm->comment_date}}</td>
                                <td title=""><a style="text-decoration:none" href="{{url('/detail/'.$comm->product_id)}}"target="_blank">{{$comm->tenxe}}</a></td>
                                
                              
                                <!-- <td><a href="" class='btn btn-info'><i class="fas fa-edit"></i>Edit</a> -->
                                <td><a  onclick="return confirm('Bạn có chắc muốn xóa?')" href="{{route('aremovecomm').'/'.$comm->comment_id}}" class='btn btn-danger'><i class="fas fa-trash"></i>Delete</a></td>
                            </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    
                                                                      
                            
                    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                       
                   </nav>
                    
                </div>

            </div>
        </div>
    

</div>

@endsection