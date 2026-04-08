<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Chó Cảnh'],
            ['id' => 2, 'name' => 'Mèo Cảnh'],
        ]);
    }
}
