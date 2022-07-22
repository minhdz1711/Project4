<?php

namespace App\Http\Controllers\Admin;
use DB;
use Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\OrderModel;
use App\Models\CommentModel;


session_start();

class AdminController extends Controller
{
    public function Authlogin(){

    }
    public function index(){
        return view('Admin.Admin-login');
    }
    public function show_dashboard(){
        $tkorder=DB::table('orders')
        ->select(DB::raw('count(*) as order_count, order_status'))     
        ->where('order_status','=','đang chờ xử lí')    
        ->groupBy('order_status')->get();

        $tkcomment=DB::table('comments')
        ->select(DB::raw('count(*) as comment_count, comment_status'))   
        ->where('comment_status','=',1)   
        ->groupBy('comment_status')->get();

        // $tktotal=DB::table('orders')
        // ->where('order_status','=','đang chờ xử lí') 
        // ->sum('order_total');
        return view('Admin.dashboards.dashboard',['tkorder'=>$tkorder,'tkcomment'=>$tkcomment]);
    }
    public function dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_passwoard=md5($request->admin_password);
        $result=DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_passwoard)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');

        }
        else{
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác!!!');
            return Redirect::to('/Admin-login');
        }
        
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/Admin-login');
    }
    

}
