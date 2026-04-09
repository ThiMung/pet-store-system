<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = false; // Vì ID lấy từ bảng Product
    protected $fillable = ['product_id', 'category_id', 'breed', 'gender', 'age', 'vaccination'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
