<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price', 'status'];

    // Thiết lập quan hệ với User để lấy tên người mua
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
