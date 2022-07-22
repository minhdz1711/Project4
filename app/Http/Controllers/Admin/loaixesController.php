<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\RequestProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SanPhamModel;
use App\Models\LoaiXeModel;
use Illuminate\Database\Eloquent\Collection;
use DB;


class loaixesController extends Controller
{
    public function index(Request $req){
       
        $data['loaixes']=LoaiXeModel::paginate(10);
        if($req->search)
        
            $data['loaixes']=LoaiXeModel::where('loaixe','like','%'.$req->search.'%')->OrderBy('id','DESC')->paginate(10);

       
        
    	return view('Admin.loaixes.index',$data);
    }
    // public function getcategory(){
    //     return LoaiXeModel::all();
    // }
    public function editloai($id){
        $editloai=LoaiXeModel::where('id',$id)->get();
        return view('Admin.loaixes.editloai',['editloai'=>$editloai]);

    }
    public function updateloai(Request $req,$id){
        $data=array();
        
        $data['loaixe']=$req->txtloaixe;
        $data['slug']=$req->txtslug;
        $data['trangthai']=$req->has('tt')?1:0;
        
       
        DB::table('loaixes')->where('id',$id)->update($data);
        return redirect()->route('aloaixesindex');


    }
    //  public function edit($id=null){
    //  	if ($id!=null) {
    //  		$db=LoaiXeModel::Find($id);
    //          //$dbloai=$this->getcategory();
    // 		return view('Admin.loaixes.edit',['db'=>$db]);
    // 	}

    // 	return redirect()->route('aloaixesindex');//lat phai tao route co ten la alophocindex
    // }

    // public function put(Request $req)
    // {
    //     $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
    //     if($id!=null){
    //         $db=LoaiXeModel::find($id);
    //         if($db!=null){
                              
    //             $db->loaixe=$req->input('txtloaixe');               
    //             $db->trangthai=$req->has('tt')?1:0;               
    //             $db->save();
    //         }
           
            
    //     } dd($id);

    //     //return redirect()->route('aloaixesindex');//lat phai tao route co ten la alophocindex
    // }
    public function remove($id=null){
        if($id!=null){
            
            $db=LoaiXeModel::find($id)->delete();
            
        }

        return redirect()->route('aloaixesindex');
    }
    //hien thi form them moi
    public function addnew()
    {
        //$dbloai=$this->getcategory();
        return view('Admin.loaixes.create');
    }
    //them vao csdl
    public function save(Request $req){
        // $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
        // if($id!=null){
            $db=new LoaiXeModel();
                //$db->id=$id;                
                $db->loaixe=$req->input('txtloaixe');  
                $db->slug=$req->input('txtslug');                             
                $db->trangthai=$req->has('tt')?1:0;
                           
                $db->save();               
            
            //}           
            return redirect()->route('aloaixesindex');

    }
    

}
