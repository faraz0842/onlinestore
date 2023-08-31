<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductDetailController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\User\FrontendController;
use App\Models\ProductDetail;
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

// Route::get('/', function () {
//     return view('master');
// });
Route::get('test', [ProductController::class, 'test']);

 /************************************
 * Admin Register Routes
 ***********************************/
Route::get('register', [RegisterController::class, 'register']);
Route::post('register/store', [RegisterController::class, 'store'])->name('register.store');
Route::get('login', [RegisterController::class, 'login'])->name('login');
Route::post('checklogin', [RegisterController::class, 'checkLogin'])->name('check.login');
Route::get('logout', [RegisterController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'admin'], function () {
 /************************************
 * Admin Product Routes
 ***********************************/

/**
 * Product/show
 */
Route::get('product', [ProductController::class, 'index'])->name('product');
/**
 * Product/store
 */
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
/**
 * Product/update
 */
Route::post('product/update/{product_id}', [ProductController::class, 'update'])->name('product.update');
/**
 * Product/update/image
 */
Route::post('product/update/image/{product_id}', [ProductController::class, 'updateImage'])->name('product.update.image');
/**
 * Product/delete
 */
Route::get('product/delete/{product_id}', [ProductController::class, 'destroy'])->name('product.destroy');

 /************************************
 * Admin Product Detail Routes
 ***********************************/

/**
 * ProductDetail/show
 */
Route::get('product-detail', [ProductDetailController::class, 'index'])->name('product-detail');
/**
 * ProductDetail/store
 */
Route::post('product-detail/store', [ProductDetailController::class, 'store'])->name('product.detail.store');
/**
 * ProductDetail/update
 */
Route::post('product-detail/update/{product_detail_id}', [ProductDetailController::class, 'update'])->name('product.detail.update');
/**
 * ProductDetail/delete
 */
Route::get('product-detail/delete/{product_detail_id}', [ProductDetailController::class, 'destroy'])->name('product-detail.delete');
 /************************************
 * Admin Category Routes
 ***********************************/

/**
 * Category/show
 */
Route::get('category', [CategoryController::class, 'index'])->name('category');
/**
 * Category/store
 */
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
/**
 * Category/update
 */
Route::post('category/update/{cat_id}', [CategoryController::class, 'update'])->name('category.update');
/**
 * Category/update
 */
Route::get('category/delete/{cat_id}', [CategoryController::class, 'destroy'])->name('category.delete');

 /************************************
 * Admin Order Routes
 ***********************************/

/**
 * Order/show
 */
Route::get('order/show', [OrderController::class, 'orderShow'])->name('order.show');
/**
 * Order/show
 */
Route::get('order/detail/show/{order_id}', [OrderController::class, 'orderDetailShow'])->name('order.detail.show');
});

 /************************************
 * Frontend Pages Routes
 ***********************************/
/**
 * User/Home
 */
Route::get('/home', [FrontendController::class, 'getProduct'])->name('home');
/**
 * User/women
 */
Route::get('women', [FrontendController::class, 'getWomenProduct'])->name('women');
/**
 * User/Men
 */
Route::get('men', [FrontendController::class, 'getMenProduct'])->name('men');
/**
 * User/Kid
 */
Route::get('kid', [FrontendController::class, 'getKidProduct'])->name('kid');
/**
 * User/Product-Detail
 */
Route::get('product-detail/{product_id}', [FrontendController::class, 'detailProduct'])->name('user.product.detail');
/**
 * cart/store
 */
Route::get('cart/store/{product_id}', [FrontendController::class, 'cartStore'])->name('cart.store');
/**
 * cart/show
 */
Route::get('carts', [FrontendController::class, 'Carts'])->name('cart.show');

Route::post('cart/update/{product_id}', [FrontendController::class, 'cartUpdate'])->name('cart.update');
/**
 * User/contact
 */
Route::get('user/contact', function(){
    return view('Pages.contact');
})->name('contact');
/**
 * User/faq
 */
Route::get('user/faq', function(){
    return view('Pages.faq');
})->name('faq');
/**
 * User/Checkout
 */
Route::get('user/checkout', function () {
    return view('Pages.checkout');
})->name('checkout');

Route::get('indexx', [FrontendController::class, 'index']);
Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{priduct_id}', [FrontendController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [FrontendController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [FrontendController::class, 'remove'])->name('remove.from.cart');

Route::post('thank-you', [FrontendController::class, 'checkout'])->name('thankyou');

Route::get('thanks', function(){
    return view('Pages.thank-you');
});
