<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use Illuminate\Database\Eloquent\Collection;
class ordersController extends Controller
{
    public function manage_order(){
		$all_order=DB::table('orders')
		->join('customers','orders.customer_id','=','customers.customer_id')
		->select('orders.*','customers.hoten')
		->orderby('orders.order_id','desc')->get();
		$manager_order=view('Admin.orders.manage-order')->with('all_order',$all_order);
		return view('Admin._Layout_Admin')->with('Admin.orders.manage-order',$manager_order);
	}
	public function view_order($orderId){
		$order_by_id=DB::table('orders')
		->join('customers','orders.customer_id','=','customers.customer_id')
		->join('shipping','orders.shipping_id','=','shipping.shipping_id')
		->join('order_details','orders.order_id','=','order_details.order_id')
		->select('orders.*','customers.*','shipping.*','order_details.*')->first();
		
		$manager_order_by_id=view('Admin.orders.view-order')->with('order_by_id',$order_by_id);
		return view('Admin._Layout_Admin')->with('Admin.orders.view-order',$manager_order_by_id);
		
	}
}
