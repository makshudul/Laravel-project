<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerLoginController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderAndProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\WishlistController;
use App\Models\CustomerLogin;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;

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
//dashboard
Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

//fontend homepage and product details
route::get('/',[FrontendController::class,'index'])->name('homepage');
route::get('/product/details/{product_id}',[FrontendController::class,'Product_details'])->name('fontend.product_details');
route::get('/category/product/details/{category_id}',[FrontendController::class,'category_Product_details'])->name('fontend.category_Product_details');

// frontEnd Menu
route::get('/contact',[FrontendController::class,'contact'])->name('frontend.contact');
route::get('/about',[FrontendController::class,'about'])->name('frontend.about');
route::get('/shop',[FrontendController::class,'shop'])->name('frontend.shop');

//frontEnd wishlist
route::get('/wishlist/page',[WishlistController::class,'wishlist_index'])->name('frontend.wishlist.index');
route::post('/wishlist/insert',[WishlistController::class,'wishlist_insert'])->name('frontend.wishlist_insert');

//fontend Cart
route::post('/cart/insert',[CartController::class,'cart_insert'])->name('frontend.cart_insert');
route::post('/cart/update',[CartController::class,'cart_update'])->name('frontend.cart_update');
route::get('/cart/delete/{card_id}',[CartController::class,'cart_delete'])->name('frontend.cart_delete');
route::get('/cart',[CartController::class,'cart'])->name('frontend.cart');

//fontend  customer register / login
route::get('/customer/register/index',[CustomerLoginController::class,'index'])->name('coustomer_register');
route::post('/customer/login',[CustomerLoginController::class,'customer_login']);
route::post('/customer/register',[CustomerLoginController::class,'customer_register']);

//customer account
route::get('/customer/account',[CustomerController::class,'customer_acccount'])->name('account');
route::get('/customer/logut',[CustomerController::class,'customer_logout'])->name('account_logout');
route::get('/customer/invoice/downnload/{invoice_id}',[CustomerController::class,'invoice_download'])->name('invoice.download');

//fontend checkout
route::get('/checkout',[CheckoutController::class,'index'])->name('frontend.CheckOutIndex');
route::post('/getCity',[CheckoutController::class,'getCity']);
Route::post('/order',[CheckoutController::class,'order'])->name('order');//orders



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/users', [HomeController::class, 'users'])->name('users');
Route::get('/add/users', [HomeController::class, 'add_users'])->name('add_users');
Route::post('/users/insert', [HomeController::class, 'users_insert'])->name('users_insert');

// profile
Route::get('/profile',[ProfileController::class,'profile_index'])->name('profile_index');
Route::post('/profile/name',[ProfileController::class,'profile_name_update'])->name('profile_name_update');
Route::post('/profile/password/update',[ProfileController::class,'profile_password_update'])->name('profile_password_update');
Route::post('/profile/photo/update',[ProfileController::class,'profile_photo_update'])->name('profile_photo_update');

 // users controller
Route::get('/user/delete/{user_id}',[HomeController::class,'user_delete']);
Route::get('/user/edit/{user_id}',[HomeController::class,'user_edit']);
Route::post('/user/update',[HomeController::class,'user_update']);

//Category
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::post('/category/insert',[CategoryController::class,'insert']);
Route::get('/category/delete/{category_id}',[CategoryController::class,'delete'])->name('delete');
Route::post('/category/alldelete',[CategoryController::class,'Alldelete'])->name('Alldelete');
Route::post('/category/update',[CategoryController::class,'update']);
Route::get('/category/edit/{category_id}',[CategoryController::class,'category_edit'])->name('Edit');
Route::get('/category/softDelete/{softdelete_id}',[CategoryController::class,'SoftDelete'])->name('SoftDelete');
Route::get('/category/restore/{restore_id}',[CategoryController::class,'restore'])->name('Restore');
Route::post('/category/restore/',[CategoryController::class,'AllRestore'])->name('AllRestore');

// SubCategory
Route::get('/subcategory/index',[SubCategoryController::class,'index'])->name('Subcategory');
Route::post('/subcategory/insert',[SubCategoryController::class,'insert'])->name('Subcategory.insert');
Route::get('/subcategory/softDelete/{softdelete_id}',[SubCategoryController::class,'SubSoftDelete'])->name('SubSoftDelete');
Route::get('/subcategory/restore/{restore_id}',[SubCategoryController::class,'SubRestore'])->name('SubRestore');
Route::get('/subcategory/delete/{category_id}',[SubCategoryController::class,'Subdelete'])->name('Subdelete');
Route::get('/subcategory/edit/{category_id}',[SubCategoryController::class,'Subcategory_edit'])->name('SubEdit.category');


// Product
Route::get('/Product/index',[ProductController::class,'index'])->name('add.product');
Route::post('/getSubcategory',[ProductController::class,'getSubcategory']);
Route::post('/product/insert',[ProductController::class,'insert'])->name('product.insert');
Route::get('/products',[ProductController::class,'showProducts'])->name('backend.showProducts');

// coupon
Route::get('/coupon',[CouponController::class,'index'])->name('backend.coupon_index');
Route::post('/coupon/insert',[CouponController::class,'insert'])->name('backend.coupon_insert');

// Order
Route::get('/order',[OrderAndProduct::class,'index'])->name('backend.order');
Route::get('/order/need/product',[OrderAndProduct::class,'need_product'])->name('backend.need_product');





