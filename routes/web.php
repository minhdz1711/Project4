<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login-pages','App\Http\Controllers\HomeController@login_pages');
Route::get('/','App\Http\Controllers\HomeController@index')->name('Home');
Route::post('/tim-kiem','App\Http\Controllers\HomeController@search');
Route::get('/loaixe/{id_loai?}','App\Http\Controllers\HomeController@loaixe');
Route::get('/fgetallloaixe','App\Http\Controllers\HomeController@Getallloaixe')->name('fgetallloaixe');
Route::get('/detail/{id?}','App\Http\Controllers\HomeController@detail_product')->name('fdetail');
Route::get('/sanphamtheoloai/{slug?}','App\Http\Controllers\HomeController@sanphamtheoloai')->name('sanphamtheoloai');
//blog
Route::get('/blog','App\Http\Controllers\HomeController@blog');
Route::get('/Detail-blog/{id?}','App\Http\Controllers\HomeController@detail_blog')->name('detailblog');
//liên hệ
Route::get('/lien-he','App\Http\Controllers\ContactController@lien_he');
//cart
Route::post('/update-cart-quantity','App\Http\Controllers\CartController@update_cart_quantity');
Route::post('/save-cart','App\Http\Controllers\CartController@save_cart');
Route::get('/show-cart','App\Http\Controllers\CartController@show_cart');
Route::get('/delete-to-cart/{rowId}','App\Http\Controllers\CartController@delete_to_cart');
Route::get('/show-ssp','App\Http\Controllers\CartController@show_ssp');
//checkout
Route::get('/registration','App\Http\Controllers\CheckoutController@registration');
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/add-customer','App\Http\Controllers\CheckoutController@add_customer');
Route::get('/checkout','App\Http\Controllers\CheckoutController@checkout');
Route::post('/save-checkout-customer','App\Http\Controllers\CheckoutController@save_checkout_customer');
Route::get('/logout-checkout','App\Http\Controllers\CheckoutController@logout_checkout');
Route::post('/login-customer','App\Http\Controllers\CheckoutController@login_customer');
Route::get('/payment','App\Http\Controllers\CheckoutController@payment');
Route::post('/order-place','App\Http\Controllers\CheckoutController@order_place');

//admin login
Route::get('/Admin-login','App\Http\Controllers\Admin\AdminController@index');
//admin dashboard
Route::get('/dashboard','App\Http\Controllers\Admin\AdminController@show_dashboard');
Route::post('/Admin-dashboard','App\Http\Controllers\Admin\AdminController@dashboard');
Route::get('/logout','App\Http\Controllers\Admin\AdminController@logout');


//admin san pham
Route::get('/Admin/sanphams/index','App\Http\Controllers\Admin\sanphamsController@index')->name('asanphamsindex');
Route::get('/Admin/sanphams/search','App\Http\Controllers\Admin\sanphamsController@search');
Route::post('/Admin/sanphams/search','App\Http\Controllers\Admin\sanphamsController@search');
Route::get('/edit/{id?}','App\Http\Controllers\Admin\sanphamsController@edit');
Route::post('/update/{id?}','App\Http\Controllers\Admin\sanphamsController@update');
//Route::get('/Admin/sanphams/edit/{id?}','App\Http\Controllers\Admin\sanphamsController@edit')->name('asanphamsedit');
//Route::post('/Admin/sanphams/put','App\Http\Controllers\Admin\sanphamsController@put')->name('asanphamsput');
Route::get('/Admin/sanphams/remove/{id?}','App\Http\Controllers\Admin\sanphamsController@remove')->name('asanphamsremove');
Route::get('/Admin/sanphams/create','App\Http\Controllers\Admin\sanphamsController@addnew')->name('asanphamsaddnew');
Route::post('/Admin/sanphams/save','App\Http\Controllers\Admin\sanphamsController@save')->name('asanphamssave');


//admin loai san pham
Route::get('/Admin/loaixes/index','App\Http\Controllers\Admin\loaixesController@index')->name('aloaixesindex');
// Route::get('/Admin/loaixes/edit/{id_loai?}','App\Http\Controllers\Admin\loaixesController@edit')->name('aloaixesedit');
// Route::post('/Admin/loaixes/put','App\Http\Controllers\Admin\loaixesController@put')->name('aloaixesput');
Route::get('editloai/{id?}','App\Http\Controllers\Admin\loaixesController@editloai');
Route::post('updateloai/{id?}','App\Http\Controllers\Admin\loaixesController@updateloai');
Route::get('/Admin/loaixes/remove/{id?}','App\Http\Controllers\Admin\loaixesController@remove')->name('aloaixesremove');
Route::get('/Admin/loaixes/create','App\Http\Controllers\Admin\loaixesController@addnew')->name('aloaixesaddnew');
Route::post('/Admin/loaixes/save','App\Http\Controllers\Admin\loaixesController@save')->name('aloaixessave');
//admin blog
Route::get('/Admin/blogs/index','App\Http\Controllers\Admin\blogsController@index')->name('ablogsindex');
Route::get('/Admin/blogs/create','App\Http\Controllers\Admin\blogsController@addnew')->name('ablogsaddnew');
Route::post('/Admin/blogs/save','App\Http\Controllers\Admin\blogsController@save')->name('ablogssave');
Route::get('editblog/{id?}','App\Http\Controllers\Admin\blogsController@editblog');
Route::post('updateblog/{id?}','App\Http\Controllers\Admin\blogsController@updateblog');
Route::get('/Admin/blogs/remove/{id?}','App\Http\Controllers\Admin\blogsController@remove')->name('ablogsremove');
//admin order
Route::get('/Admin/orders/manage-order','App\Http\Controllers\Admin\ordersController@manage_order');
Route::get('/Admin/orders/view-order/{orderId}','App\Http\Controllers\Admin\ordersController@view_order');

//comment
Route::post('/load-comment','App\Http\Controllers\HomeController@load_comment');
Route::post('/send-comment','App\Http\Controllers\HomeController@send_comment');
Route::get('/comment','App\Http\Controllers\HomeController@list_comment')->name('acomment');
Route::post('/allow-comment','App\Http\Controllers\HomeController@allow_comment');
Route::post('/reply-comment','App\Http\Controllers\HomeController@reply_comment');
Route::get('/removecomm/{id?}','App\Http\Controllers\HomeController@removecomment')->name('aremovecomm');

//send-email
Route::get('email','App\Http\Controllers\CheckoutController@order_place');
