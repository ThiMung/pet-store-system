<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'status'];

    // Accessor: Lấy tên trạng thái tiếng Việt
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Đang chờ xử lý',
            'completed' => 'Đã hoàn thành',
            default => ucfirst($this->status),
        };
    }

    // Thiết lập quan hệ với User để lấy tên người mua
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'product_id')
                    ->withPivot('quantity', 'price');
    }
}
