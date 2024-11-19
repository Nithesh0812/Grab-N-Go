<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
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


route::get('/',[HomeController::class,'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/view_catagory',[AdminController::class,'view_catagory']);

route::get('/redirect',[HomeController::class,'redirect'])->middleware('auth','verified')->name('redirect');

route::POST('add_catagory',[AdminController::class,'add_catagory']);

route::get('delete_catagory/{id}',[AdminController::class,'delete_catagory']);

route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[AdminController::class,'show_product']);

route::get('/send_email/{id}',[AdminController::class,'send_email']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::get('/order',[AdminController::class,'order']);

route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/print/{id}',[AdminController::class,'print']);

route::get('/search',[AdminController::class,'search']);

route::post('update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::post('/send_user_email/{id}',[AdminController::class,'send_user_email']);

route::post('/product_details',[HomeController::class,'product_details']);

route::post('add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart',[HomeController::class,'show_cart']);

route::get('/clear_product/{id}',[HomeController::class,'clear_product']);

route::get('/cash_order',[HomeController::class,'cash_order']);

route::get('/show_order',[HomeController::class,'show_order']);

route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

route::get('/product_search',[HomeController::class,'product_search']);

route::get('/merch',[HomeController::class,'merch']);

route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);

Route::post('/stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post');

route::get('mpesaa',[HomeController::class,'mpesaa']);

Route::get('/contact',[ContactController::class,'show'])->name('contact.show');

Route::post('/contact',[ContactController::class,'submit'])->name('contact.submit');
Route::get('/session', [HomeController::class, 'session'])->name('session');
Route::post('/book',[HomeController::class,'book'])->name('book');
Route::post('/university', [HomeController::class, 'university'])->name('university');








