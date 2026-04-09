<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'image', 'description', 'stock', 'product_type', 'status'];

    // Lấy thông tin chi tiết nếu là thú cưng
    public function pet() {
        return $this->hasOne(Pet::class, 'product_id');
    }

    // Lấy thông tin chi tiết nếu là phụ kiện
    public function accessory() {
        return $this->hasOne(Accessory::class, 'product_id');
    }
}
