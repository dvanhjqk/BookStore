<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'showIndex'])->name('show_index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'showIndex'])->name('show_index');
Route::post('/search', [HomeController::class, 'search'])->name('search_index');
Route::post('/comment/{id}', [HomeController::class, 'comment'])->name('comment');
Route::post('/rating/{id}', [HomeController::class, 'rating'])->name('rating');
Route::post('/add-cart-ajax', [HomeController::class, 'add_cart_ajax'])->name('cart.add');
Route::get('/delete-cart/{session_id}', [HomeController::class, 'deleteCart'])->name('delete-cart');
Route::post('/update-qty', [HomeController::class, 'updateCart'])->name('update-qty');
Route::get('/category/{id}', [HomeController::class, 'showCategory'])->name('show_category');
Route::get('/product/{id}', [HomeController::class, 'showProduct'])->name('show_product');
Route::get('/del-coupon', [HomeController::class, 'delCoupon'])->name('unset_coupon');
Route::get('/test-email', [HomeController::class, 'testEmail']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/show-cart', [HomeController::class, 'showCart'])->name('cart.show');
    Route::post('/check-coupon', [HomeController::class, 'checkCoupon'])->name('check_coupon');
    Route::get('/{user}/checkout', [HomeController::class, 'checkOut'])->name('check_out');
    Route::post('/save-checkout', [HomeController::class, 'saveCheckout'])->name('save_checkout');
});

require __DIR__ . '/auth.php';

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    });
    //danh mục
    Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category_index');
    Route::match(['GET', 'POST'], '/category/add', [App\Http\Controllers\CategoryController::class, 'add'])->name('category_add');
    Route::match(['GET', 'POST'], '/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category_edit');
    Route::get('/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category_delete');
    //sản phẩm
    Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product_index');
    Route::match(['GET', 'POST'], '/product/add', [App\Http\Controllers\ProductController::class, 'add'])->name('product_add');
    Route::match(['GET', 'POST'], '/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product_edit');
    Route::get('/product/delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product_delete');
    //tác giả
    Route::get('/author', [App\Http\Controllers\AuthorController::class, 'index'])->name('author_index');
    Route::match(['GET', 'POST'], '/author/add', [App\Http\Controllers\AuthorController::class, 'add'])->name('author_add');
    Route::match(['GET', 'POST'], '/author/edit/{id}', [App\Http\Controllers\AuthorController::class, 'edit'])->name('author_edit');
    Route::get('/author/delete/{id}', [App\Http\Controllers\AuthorController::class, 'delete'])->name('author_delete');
    //nhà sản xuất
    Route::get('/publisher', [App\Http\Controllers\PublisherController::class, 'index'])->name('publisher_index');
    Route::match(['GET', 'POST'], '/publisher/add', [App\Http\Controllers\PublisherController::class, 'add'])->name('publisher_add');
    Route::match(['GET', 'POST'], '/publisher/edit/{id}', [App\Http\Controllers\PublisherController::class, 'edit'])->name('publisher_edit');
    Route::get('/publisher/delete/{id}', [App\Http\Controllers\PublisherController::class, 'delete'])->name('publisher_delete');
    //nhà cung cấp
    Route::get('/supplier', [App\Http\Controllers\SupplierController::class, 'index'])->name('supplier_index');
    Route::match(['GET', 'POST'], '/supplier/add', [App\Http\Controllers\SupplierController::class, 'add'])->name('supplier_add');
    Route::match(['GET', 'POST'], '/supplier/edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('supplier_edit');
    Route::get('/supplier/delete/{id}', [App\Http\Controllers\SupplierController::class, 'delete'])->name('supplier_delete');
    //user
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user_index');
    Route::match(['GET', 'POST'], '/user/add', [App\Http\Controllers\UserController::class, 'add'])->name('user_add');
    Route::match(['GET', 'POST'], '/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user_edit');
    Route::get('/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user_delete');
    //đơn hàng
    Route::get('/order', [App\Http\Controllers\OrderController::class, 'index'])->name('order_index');
    Route::get('/order/detail/{id}', [App\Http\Controllers\OrderController::class, 'detail'])->name('order_detail');
    Route::get('/order/delete/{id}', [App\Http\Controllers\OrderController::class, 'delete'])->name('order_delete');
    //bình luận
    Route::get('/comment', [App\Http\Controllers\CommentController::class, 'index'])->name('comment_index');
    Route::get('/comment/delete/{id}', [App\Http\Controllers\CommentController::class, 'delete'])->name('com_delete');
    //mã giảm giá
    Route::get('/coupon', [App\Http\Controllers\CouponController::class, 'index'])->name('coupon_index');
    Route::match(['GET', 'POST'], '/coupon/add', [App\Http\Controllers\CouponController::class, 'add'])->name('coupon_add');
    Route::get('/coupon/delete/{id}', [App\Http\Controllers\CouponController::class, 'delete'])->name('coupon_delete');
});
