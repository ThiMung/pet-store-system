<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AiController;

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('page.trangchu');
});

// Giao diện user
Route::get('/', [PageController::class, 'index'])->name('trangchu');

// Hiển thị theo danh mục (Chó/Mèo)
Route::get('/danh-muc/{id}', [PageController::class, 'category'])->name('category');

// Hiển thị tất cả phụ kiện
Route::get('/tat-ca-phu-kien', [PageController::class, 'allAccessories'])->name('all_accessories');

// Xem chi tiết sản phẩm theo ID
Route::get('/san-pham/{id}', [PageController::class, 'detail'])->name('chitiet');

// Tìm kiếm sản phẩm
Route::get('/search', [PageController::class, 'search'])->name('search');

// Hiển thị tất cả sản phẩm (Chó + Mèo + Phụ kiện)
Route::get('/tat-ca-san-pham', [PageController::class, 'allProducts'])->name('all_products');

// Trang giới thiệu tĩnh (dùng layout Bootstrap)
Route::view('/gioi-thieu', 'page.about')->name('about');
// Trang liên hệ tĩnh (dùng layout Bootstrap)
Route::view('/lien-he', 'page.contact')->name('contact');
// Các route cho Giỏ hàng
Route::get('/gio-hang', [PageController::class, 'indexCart'])->name('cart.index');
Route::post('/gio-hang/them', [PageController::class, 'add'])->name('cart.add');
Route::post('/gio-hang/xoa', [PageController::class, 'remove'])->name('cart.remove');

// Các route cho Auth

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tat-ca-san-pham', [PageController::class, 'allProducts'])->name('all_products');

// Các route cho Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
Route::get('/admin/orders', [AdminController::class, 'manageOrders'])->name('admin.orders');

// Route hiện tại của Nhu (Hiển thị danh sách)
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
// Thêm mới người dùng
Route::post('/admin/users/store', [AdminController::class, 'storeUser'])->name('admin.users.store');
// Xóa người dùng
Route::delete('/admin/users/delete/{id}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

// Quản lý sản phẩm Admin
Route::prefix('admin/products')->group(function () {
    Route::post('/store', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::post('/update/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::get('/delete/{id}', [AdminController::class, 'destroyProduct'])->name('admin.products.destroy');
});

Route::post('/admin/products/update/{id}', [AdminController::class, 'updateProduct'])->name('admin.products.update');

// Các route cho AI Tư vấn
// Trang hiển thị form tư vấn
Route::get('/tu-van-ai', function() {
    return view('page.ai_tuvan');
})->name('ai.consult');

Route::post('/ai-recommend', [AiController::class, 'recommend'])->name('ai.recommend');
Route::post('/ai-identify', [AiController::class, 'identify'])->name('ai.identify');
