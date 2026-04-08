<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run()
    {
        DB::table('carts')->insert([
            // Khách hàng ID 2 thêm Chó Alaska và Balo vào giỏ
            ['id' => 1, 'user_id' => 2, 'product_id' => 1, 'quantity' => 1],
            ['id' => 2, 'user_id' => 2, 'product_id' => 5, 'quantity' => 2], 
        ]);
    }
}
