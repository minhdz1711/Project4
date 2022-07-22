<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\LoaiXeModel;
use App\Models\SanPhamModel;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\ContactModel;
session_start();
class ContactController extends Controller
{
    public function lien_he(Request $request){
        $xe=DB::table('sanphams')->where('trangthai',1)->orderby('product_id','desc')->get();
        return view('lienhe.contact',['xe'=>$xe]);
    }
}
