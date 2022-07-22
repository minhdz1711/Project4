<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoaiXeModel;
use App\Models\SanPhamModel;
use App\Models\CommentModel;
use App\Models\BlogModel;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Cart;
use Session;
use DB;


class HomeController extends Controller
{
    public function index(){
    	$db=SanPhamModel::where('noibat',1)->get();
        $somepr=SanPhamModel::take(16)->get();

    	return view('Home',['db'=>$db,'somepr'=>$somepr]);
    }
    public function login_pages(){
        return view('login-pages');
    }
    public function search(Request $request){
        $keywords=$request->keywords_submit;
        $xe=DB::table('sanphams')->where('trangthai',1)->orderby('product_id','desc')->get();
        $loai=DB::table('loaixes')->where('trangthai',1)->orderby('id','desc')->get();
        $search_product=DB::table('sanphams')->where('tenxe','like','%'.$keywords.'%')->get();

        return view('search',['xe'=>$xe,'loai'=>$loai,'search_product'=>$search_product]);

    }



    public function Getallloaixe(){

    	return  LoaiXeModel::All();

    }
    public function Gettheoloaixe($id){
        $loai=LoaiXeModel::find($id);
        $dbct = SanPhamModel::find($id);
    	$SP_loai=SanPhamModel::Where('id_loaixe','=',$dbct->id_loaixe)->get();
    	return  view('honda',['SP_loai'=>$SP_loai,"dbct"=>$dbct,'loai'=>$loai]);

    }
    public function sanphamtheoloai($slug){
        $category=LoaiXeModel::where('slug',$slug)->first();
        $product=SanPhamModel::where('id_loaixe',$category->id)->get();
        return  view('sanphamtheoloai',['product'=>$product,'category'=>$category]);
    }
    public function detail_product($id){
        $dbct = SanPhamModel::where('product_id',$id)->first();
        //$dbloai=DB::table('loaixes')->join('sanphams','sanphams.id_loaixe','=','loaixes.id')->first();
        $dbloai=LoaiXeModel::where('id','=',$dbct->id_loaixe)->first();


        $dbsptheoloai=SanPhamModel::Where('id_loaixe','=',$dbct->id_loaixe)->take(4)->get();


        return view('detail',["dbct"=>$dbct,'dbloai'=>$dbloai,"dbsptheoloai"=>$dbsptheoloai]);
    }
    public function send_comment(Request $request){
        $product_id=$request->product_id;
        $comment_name=$request->comment_name;

        $comment_content=$request->comment_content;
        $comment=new CommentModel();
        $comment->comment=$comment_content;
        $comment->comment_name=$comment_name;
        $comment->comment_status=1;
        $comment->comment_product_id=$product_id;
        $comment->save();

    }
    public function load_comment(Request $request){
        $product_id=$request->product_id;
        $comment=CommentModel::where('comment_product_id',$product_id)->where('comment_status',0)->get();
        $output='';
        foreach($comment as $comm){
            $output.='
            <div class="comment-option">
                <div class="co-item">

                    <div class="avatar-pic">
                        <img src="img/product-single/avatar-1.png" alt="">
                    </div>

                    <div class="avatar-text">
                        <div class="at-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <h5> '.$comm->comment_name.'<span>'.$comm->comment_date.'</span></h5>
                        <div class="at-reply">'.$comm->comment.'</div>

                    </div>

                </div>

            </div>
            ';
        }
        echo $output;

    }
    public function list_comment(){
        $comment=DB::table('comments')->join('sanphams','sanphams.product_id','=','comments.comment_product_id')->orderBy('comment_status','desc')->get();
        return view('Admin.comment.list_comment',['comment'=>$comment]);
    }
    public function allow_comment(Request $request){
        $data=$request->all();
         $comment=CommentModel::where('comment_id','=',$data['comment_id']);
        $comment=CommentModel::find($data['comment_id']);
        $comment->comment_status=$data['comment_status'];

        $comment->save();

    }
    public function reply_comment(Request $request){
        $data=$request->all();
        $comment=new CommentModel();
        $comment->comment_parentcom=$data['comment_id'];

        $comment->comment_product_id=$data['comment_product_id'];
        $comment->comment_status=0;
        $comment->comment_name='MINH';
        $comment->comment=$data['comment'];
        $comment->save();

    }
    public function removecomment($id){
        if($id!=null){
            $dbcomment=DB::table('comments')->where('comment_id',$id)->delete();
            //$dbxe=SanPhamModel::find($id)->delete();

        }

        return redirect()->route('acomment');
    }
   public function blog(){
       $blogs=BlogModel::All();
       return view('/blog',['blogs'=>$blogs]);
   }
   public function detail_blog($id){
    $ctblog = BlogModel::where('blog_id',$id)->first();
    //$dbloai=DB::table('loaixes')->join('sanphams','sanphams.id_loaixe','=','loaixes.id')->first();

    return view('Detail-blog',["ctblog"=>$ctblog]);
    }
}
