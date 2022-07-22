<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Controllers\alert;
use Illuminate\Support\Facades\Redirect;
session_start();
class CartController extends Controller
{
    public function save_cart(Request $request ){
        $productId=$request->productid_hidden;
        $productqty=$request->productqty_hidden;
        $quantity=$request->qty;
        $product_Info=DB::table('sanphams')->where('product_id',$productId)->first();
        if($quantity>=$productqty){
            //Session::put('message','Bạn nên mua hàng với số lượng nhỏ hơn!!!' );
            //session()->flash('success','Bạn nên mua hàng với số lượng nhỏ hơn!!!');
            // echo('Bạn nên mua hàng với số lượng nhỏ hơn!!!');



        }
        else{


        $data['id'] = $product_Info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_Info->tenxe;
        $data['price'] = $product_Info->giaban;
        $data['weight']=$product_Info->giaban;
        $data['options']['image'] = $product_Info->image;

        Cart::add($data);
        alert('add sccess');

        return Redirect::to('/show-cart');
    }


    }
    public function show_cart(){

        $cate_product=DB::table('loaixes')->where('trangthai','1')->orderBy('id','Desc')->get();

        //$ssp=Cart::groupBy('rowId')->get();
        //dd($ssp);
        return view('cart.show-cart',['cate_product'=>$cate_product]);

    }

    // public function show_ssp(){
    //     $slsp=count(Session::get('cart'));

    //     $output='';
    //     if($slsp>0){
    //     $output.='<a href="'.url('/show-cart').'">
    //     <i class="icon_cart_alt"></i>
    //     <span>'.$slsp.'</span>
    //     </a>';
    // }
    // else{
    //     $output.='<a href="'.url('/show-cart').'">
    //     <i class="icon_cart_alt"></i>
    //     <span>0</span>
    // </a>';
    // }
    // echo $output;
    // }
    public function delete_to_cart($rowId){
        Cart::update($rowId,0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request){
        $rowId = $request->rowId_cart;
        $qty = $request->cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show-cart');
    }

}
