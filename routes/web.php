<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\AuthController;
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

// Các route cho Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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
