<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\Cart;
use App\Models\Buy;
use App\Events\buyingSuccessfull;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Http\Middleware\AddToCart;
use Illuminate\Http\Request;
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

//fluent string:
// $x = 'hi nakhda';
// $x = Str::of($x)
//     ->ucfirst($x)->replaceFirst('Hi', 'hello', $x)->camel($x);
// echo $x;

// Route::controller(UserControler::class)->group(function () {
//     Route::post('user', 'saveData');
//     Route::get('user', 'showData');
//     Route::get('delete/{id}', 'delete');
//     Route::get('edit/{id}', 'edit');
//     Route::get('user/{key}', 'showData1');
//     Route::put('update', 'updateUser');
// });

// Route::get('user/{key:pwd}', function(User $key){
//     return $key->email;
// });

// Route::get('/SampleMail', [MailController::class, 'sendEmail']);
// Route::get('/SampleMail', function () {
//     Mail::to('fake@mail.com')->send(new SampleMail);
//     return new SampleMail();
// });
Route::get('/', [ProductController::class, 'index']);
// Route::get('/{id}', [ProductController::class, 'index']);

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
});

Route::view('/SignIn', 'signIn') ;
    

Route::controller(UserController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/signIn', 'signIn');
});

Route::get('/order', function () {
    return view('order');
});

Route::post('/buy', function (Request $req) {
    $orderAddress = $req->text;
    $paymentOrder = $req->optradio ;
    $userId = session()->get('user')['id'];
    // $carts = ProductController::;
    $carts = Cart::where(['user_id' => $userId])->join('products', 'cart.product_id', '=', 'products.id')->select('cart.*', 'products.price', 'products.name')->get();
    buyingSuccessfull::dispatch($carts, $paymentOrder, $orderAddress);
    return redirect('')->with('purchase', 'successfull');
});


Route::get('/detail/{id}', [ProductController::class, 'detail']);
Route::post('/add-to-cart', [ProductController::class, 'addToCart'])->middleware(AddToCart::class);

Route::get('/cart', [ProductController::class, 'showCart'])->name('showCart');
Route::get('deleteCart/{cartId}', [ProductController::class, 'deleteCart']);
Route::get('updateCart/{id}/{count}', [ProductController::class, 'updateCart'])->name('updateCart');
// Route::post('cart/updateCart', [ProductController::class, 'updateCart']);
