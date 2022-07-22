<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;



class blogsController extends Controller
{
    public function index(){
        $dbblog=BlogModel::where('blog_status',1)->get();
        return view('Admin.blogs.index',['dbblog'=>$dbblog]);
    }
    public function addnew(){
        return view('Admin.blogs.create');
    }
    public function editblog($id){
        $eblog=BlogModel::where('blog_id',$id)->get();
        
       
        return view('Admin.blogs.editblog',['eblog'=>$eblog]);

    }
    public function updateblog(Request $req,$id){
        $data=array($id);
       
        $data['blog_title']->$req->txttieude;
        $data['blog_content']->$req->txtnoidung;
        $data['blog_date']->$req->txtngaydang; 
        
        $data['blog_image']->req->txtimage;
       
        $data['blog_status']=$req->has('blogtt')?1:0;

        DB::table('blogs')->where('blog_id',$id)->update($data);
        return redirect()->route('ablogsindex');


    }
    public function remove($id=null){
        if($id!=null){
            $dbblog=BlogModel::where('blog_id',$id)->delete();
            //$dbblog=BlogModel::find($id)->delete();
            
        }

        return redirect()->route('ablogsindex');
    }
    public function save(Request $req){
        //  $blog_id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        //   if($blog_id!=null){
            if($req->hasFile('txtimage')){
                $des_path='/image';
                $image=$req->file('txtimage');
            $image_name=$image->getClientOriginalName();
            $path=$req->file('txtimage')->storeAs($des_path,$image_name);
            }
            $dbblog=new BlogModel();
                 //$dbxe->id=$id;
                $dbblog->blog_title=$req->input('txttieude');
                $dbblog->blog_content=$req->input('txtnoidung');
                $dbblog->blog_date=$req->input('txtngaydang'); 
               
                $dbblog->blog_image=$image_name;
                $dbblog->blog_status=$req->has('blogtt')?1:0;
                          
                $dbblog->save();    
                
        
                  
            return redirect()->route('ablogsindex');

    }


}
