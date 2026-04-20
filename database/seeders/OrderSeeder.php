<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        DB::table('orders')->insert([
            ['id' => 1, 'user_id' => 2, 'total_price' => 12450000, 'status' => 'completed', 'created_at' => now()],
            ['id' => 2, 'user_id' => 2, 'total_price' => 7000000, 'status' => 'pending', 'created_at' => now()],
        ]);
    }
}
