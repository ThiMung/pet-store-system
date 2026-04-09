<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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