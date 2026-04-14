<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = false;
    protected $fillable = ['product_id', 'accessory_type', 'brand', 'material', 'size'];

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
