<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\RequestProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SanPhamModel;
use App\Models\LoaiXeModel;
use DB;



class sanphamsController extends Controller
{
    public function index(Request $req){
    	$sanphams=DB::table('sanphams')->join('loaixes','loaixes.id','=','sanphams.id_loaixe')->orderby('sanphams.product_id','DESC')->paginate(10);
        // $data['sanphams']=SanPhamModel::paginate(10);
        // if($req->search)
        // $sanphams=DB::table('sanphams')->join('loaixes','loaixes.id','=','sanphams.id_loaixe')->where('tenxe','like','%'.$req->search.'%')->OrderBy('sanphams.product_id','DESC')->paginate(10);
            //$data['sanphams']=SanPhamModel::where('tenxe','like','%'.$req->search.'%')->OrderBy('id','DESC')->paginate(10);

        if($req->loai)
        //$data['sanphams']=SanPhamModel::where('id_loaixe',$req->loai)->OrderBy('id','DESC')->paginate(10);
        $sanphams=DB::table('sanphams')->join('loaixes','loaixes.id','=','sanphams.id_loaixe')->where('loaixe',$req->loai)->orderby('sanphams.product_id','DESC')->paginate(20);
            $dbloai= $this->getcategory();
        
    	return view('Admin.sanphams.index',['dbloai'=>$dbloai,'sanphams'=>$sanphams]);
    }
    public function search(Request $req){
        $sanphams_search=DB::table('sanphams')->join('loaixes','loaixes.id','=','sanphams.id_loaixe')->where('tenxe','like','%'.$req->search.'%')->OrderBy('sanphams.product_id','DESC')->get();
        //$data['sanphams']=SanPhamModel::where('tenxe','like','%'.$req->search.'%')->OrderBy('id','DESC')->paginate(10);
        return view('Admin.sanphams.search',['sanphams_search'=>$sanphams_search]);


    }
    public function getcategory(){
        return LoaiXeModel::all();
    }
    public function edit($id){
        $editsp=DB::table('sanphams')->join('loaixes','loaixes.id','=','sanphams.id_loaixe')->where('product_id',$id)->get();
        //$editsp=SanPhamModel::where('id',$id)->get();
        $cate_product=DB::table('loaixes')->orderby('id','desc')->get();
        return view('Admin.sanphams.edit',['editsp'=>$editsp,'cate_product'=>$cate_product]);

    }
    public function update(Request $req,$id){
        $data=array();
        
        $data['tenxe']=$req->txttenxe;
        $data['id_loaixe']=$req->txtid_loaixe;
        $data['soluong']=$req->txtsoluong;
        $data['giaban']=$req->txtgiaban;
        $data['khuyenmai']=$req->txtkhuyenmai;
        $data['noidung']=$req->txtnoidung;
        $data['mota']=$req->txtmota;
        $data['image']=$req->txtimage;
        $data['trangthai']=$req->has('tt')?1:0;
        
        $data['noibat']=$req->has('hot')?1:0;
        DB::table('sanphams')->where('product_id',$id)->update($data);
        return redirect()->route('asanphamsindex');


    }
    //  public function edit($id=null){
    //  	if ($id!=null) {
    //  		$dbxe=SanPhamModel::Find($id);
           
    // 		return view('Admin.sanphams.edit',['dbxe'=>$dbxe]);
    // 	}

    // 	return redirect()->route('asanphamsindex');//lat phai tao route co ten la alophocindex
    // }

    // public function put(Request $req)
    // {
    //     $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtidxe trong view
    //     if($id!=null){
    //         $dbxe=SanPhamModel::find($id);
    //         if($dbxe!=null){
    //             $dbxe->id=$id;
    //             $dbxe->tenxe=$req->input('txttenxe');
    //             $dbxe->id_loaixe=$req->input('txtid_loaixe');
    //             $dbxe->soluong=$req->input('txtsoluong'); 
    //             $dbxe->giaban=$req->input('txtgiaban');
    //             $dbxe->khuyenmai=$req->input('txtkhuyenmai');
    //             $dbxe->mota=$req->input('txtmota');
    //             $dbxe->image=$req->input('txtimage');
    //             $dbxe->trangthai=$req->has('tt')?1:0;
    //             $dbxe->noibat=$req->has('hot')?1:0;
    //             $dbxe->save();
    //         }
           
            
    //     }
        

    //     return redirect()->route('asanphamsindex');//lat phai tao route co ten la alophocindex
    // }
    public function remove($id){
        if($id!=null){
            $dbxe=DB::table('sanphams')->join('loaixes','loaixes.id','=','sanphams.id_loaixe')->where('product_id',$id)->delete();
            //$dbxe=SanPhamModel::find($id)->delete();
            
        }

        return redirect()->route('asanphamsindex');
    }
    //hien thi form them moi
    public function addnew()
    {
        $category_pr=DB::table('loaixes')->orderby('id','desc')->get();
        //$dbloai=$this->getcategory();
        return view('Admin.sanphams.create',['category_pr'=>$category_pr]);
    }

    //them vao csdl
    public function save(RequestProduct $req){
       // $id=$req->input('txtid');//lat phat tao 1 hiden ten la txtid trong view
         //if($id!=null){
            if($req->hasFile('txtimage')){
                $des_path='public/images/products';
                $image=$req->file('txtimage');
               $image_name=$image->getClientOriginalName();
               $path=$req->file('txtimage')->storeAs($des_path,$image_name);
               $input['txtimage']=$image_name;
             }
            $dbxe=new SanPhamModel();
           

                // $dbxe->id=$id;
                $dbxe->tenxe=$req->input('txttenxe');
                $dbxe->id_loaixe=$req->input('txtid_loaixe');
                $dbxe->soluong=$req->input('txtsoluong'); 
                $dbxe->giaban=$req->input('txtgiaban');
                $dbxe->khuyenmai=$req->input('txtkhuyenmai');
                $dbxe->noidung=$req->input('txtnoidung');
                $dbxe->mota=$req->input('txtmota');
                $dbxe->image=$image_name;
                $dbxe->trangthai=$req->has('tt')?1:0;
                $dbxe->noibat=$req->has('hot')?1:0;
                
              
               
                $dbxe->save();    
                
           
           //}           
            return redirect()->route('asanphamsindex');

    }
    
}