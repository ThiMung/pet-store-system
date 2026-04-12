<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Đảm bảo Laravel gọi đúng tên bảng là 'products'
    protected $table = 'products';

    // Nếu Nhu có dùng ID tự tăng hoặc các trường fillable
    protected $fillable = ['name', 'price', 'image', 'description', 'stock', 'product_type', 'category_id', 'status'];
}
