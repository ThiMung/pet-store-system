<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Tích hợp Homepage & Auth System
|--------------------------------------------------------------------------
*/

// Giao diện trang chủ (Nhóm trưởng)
// Lưu ý: Bạn truy cập http://127.0.0.1:8000/ là ra trang này
Route::get('/', [PageController::class, 'index'])->name('trangchu');

// Hiển thị theo danh mục (Chó/Mèo)
Route::get('/danh-muc/{id}', [PageController::class, 'category'])->name('category');

// Hiển thị tất cả phụ kiện
Route::get('/tat-ca-phu-kien', [PageController::class, 'allAccessories'])->name('all_accessories');

// Xem chi tiết sản phẩm theo ID
Route::get('/san-pham/{id}', [PageController::class, 'detail'])->name('chitiet');

// --- CÁC ROUTE CHO AUTH (Phần của bạn) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tat-ca-san-pham', [PageController::class, 'allProducts'])->name('all_products');

// Các route cho Admin
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'products'])->name('admin.products');
