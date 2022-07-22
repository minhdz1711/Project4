<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
    use Mail;
use Carbon\Carbon;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\SanPhamModel;

session_start();

class CheckoutController extends Controller
{
    public function login_checkout(){
        $cate_product=DB::table('loaixes')->where('trangthai',0)->orderby('id','desc')->get();
        $product=DB::table('sanphams')->where('trangthai',0)->orderby('product_id','desc')->get();
        return view('checkout.login-checkout',['cate_product'=>$cate_product,'product'=>$product]);
    }
	public function registration(){
		return view('checkout.registration');
	}

    public function add_customer(Request $request){

    	$data = array();
    	$data['hoten'] = $request->hoten;
    	$data['gioitinh'] = $request->gt;
    	$data['email'] = $request->email;
        $data['phone'] = $request->sdt;
        $data['diachi'] = $request->diachi;
    	$data['password'] =$request->pass;

    	$customer_id = DB::table('customers')->insertGetId($data);

    	Session::put('customer_id',$customer_id);
    	Session::put('hoten',$request->hoten);

    	return Redirect::to('/login-checkout');


    }
    public function checkout(){
    	$cate_product = DB::table('loaixes')->where('trangthai','0')->orderby('id','desc')->get();
        $product=DB::table('sanphams')->where('trangthai',0)->orderby('product_id','desc')->get();
    	return view('checkout.show_checkout',['cate_product'=>$cate_product,'product'=>$product]);
    }
    public function save_checkout_customer(Request $request){
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_note'] = $request->shipping_note;
    	$shipping_id = DB::table('shipping')->insertGetId($data);

    	Session::put('shipping_id',$shipping_id);

    	return Redirect::to('/payment');
    }
    public function payment(){

        $cate_product = DB::table('loaixes')->where('trangthai','0')->orderby('id','desc')->get();
        $product=DB::table('sanphams')->where('trangthai',0)->orderby('product_id','desc')->get();
        return view('checkout.payment',['cate_product'=>$cate_product,'product'=>$product]);

    }
    public function logout_checkout(){
    	Session::flush();
    	return Redirect('/');
    }

    public function login_customer(Request $request){
    	$email = $request->email_account;
    	$password = $request->pass_account;
    	$result = DB::table('customers')->where('email',$email)->where('password',$password)->first();
    	if($result){
    		Session::put('customer_id',$result->customer_id);
    		return Redirect::to('/checkout');
    	}else{
    		return Redirect::to('/login-checkout');
    	}

    }
	public function order_place(Request $request){
		$data_p = array();
    	$data_p['payment_method'] = $request->option;
        $data_p['payment_status'] = 'đang chờ xử lí';
    	$payment_id = DB::table('payment')->insertGetId($data_p);


    	$order_data = array();
    	$order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = Session::get('shipping_id');
		$order_data['payment_id'] = $payment_id;
		$order_data['order_total'] = Cart::subtotal();
		$order_data['order_status'] = 'đang chờ xử lí';
    	$order_id = DB::table('orders')->insertGetId($order_data);

		$content=Cart::content();
        foreach($content as $ct){
		$order_dt_data = array();
    	$order_dt_data['order_id'] = $order_id;
        $order_dt_data['product_id'] = $ct->id;
		$order_dt_data['product_name'] = $ct->name;
		$order_dt_data['product_price'] = $ct->price;
		$order_dt_data['product_quantity'] = $ct->qty;
    	DB::table('order_details')->insert($order_dt_data);
		}

		$allemail=DB::table('customers')->join('orders','orders.customer_id','=','customers.customer_id')
		->join('shipping','shipping.shipping_id','=','orders.shipping_id')->orderBy('order_id','desc')
		->first();
		if($data_p['payment_method']==1){
			echo 'Thanh toán thẻ ATM';

		}else{
			Mail::send('email.email-order',[
				'order_data'=>$order_data,
				'allemail'=>$allemail,
				],function($message) {
					$message->to();
					$message->from('minh171112b@gmail.com');
					$message->subject('Thư đặt hàng từ cửa hàng mô tô PKL MMJ');
			});
			Cart::destroy();
			$cate_product = DB::table('loaixes')->where('trangthai','0')->orderby('id','desc')->get();
			$product=DB::table('sanphams')->where('trangthai',0)->orderby('product_id','desc')->get();
			return view('checkout.handcash',['cate_product'=>$cate_product,'product'=>$product]);
		}
    	return Redirect::to('/payment');

	}
	public function manage_order(){
		$all_order=DB::table('orders')
		->join('customers','orders.customer_id','=','customers.customer_id')
		->select('orders.*','customers.hoten')
		->orderby('orders.order_id','desc')->get();
		$manager_order=view('Admin.manage-order')->with('all_order',$all_order);
		return view('Admin._Layout_Admin')->with('Admin.manage-order',$manager_order);
	}

}
