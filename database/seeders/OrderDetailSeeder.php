<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('order_details')->insert([
            // Đơn hàng #1 mua Chó Ailen Setter (ID 1) và Balo (ID 25)
            ['order_id' => 1, 'product_id' => 1, 'quantity' => 1, 'price' => 12000000],
            ['order_id' => 1, 'product_id' => 25, 'quantity' => 1, 'price' => 450000],

            // Đơn hàng #2 mua Chó Poodle (ID 10)
            ['order_id' => 2, 'product_id' => 10, 'quantity' => 1, 'price' => 7000000],
        ]);
    }
}
