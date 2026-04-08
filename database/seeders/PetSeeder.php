<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
public function run()
    {
        DB::table('pets')->insert([
            // Chó (Category 1)
            ['product_id' => 1, 'category_id' => 1, 'breed' => 'Ailen Setter', 'gender' => 'male', 'age' => '4 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 2, 'category_id' => 1, 'breed' => 'Alaska', 'gender' => 'female', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 3, 'category_id' => 1, 'breed' => 'Beauceron', 'gender' => 'male', 'age' => '5 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 4, 'category_id' => 1, 'breed' => 'Chihuahua', 'gender' => 'female', 'age' => '2 tháng', 'vaccination' => 'Đã tiêm 1 mũi'],
            ['product_id' => 5, 'category_id' => 1, 'breed' => 'Dogo', 'gender' => 'male', 'age' => '6 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 6, 'category_id' => 1, 'breed' => 'Golden', 'gender' => 'female', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 7, 'category_id' => 1, 'breed' => 'Greyhound', 'gender' => 'male', 'age' => '4 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 8, 'category_id' => 1, 'breed' => 'Ngao Anh', 'gender' => 'male', 'age' => '5 tháng', 'vaccination' => 'Đã tiêm 3 mũi'],
            ['product_id' => 9, 'category_id' => 1, 'breed' => 'Ngao Tây Ban Nha', 'gender' => 'female', 'age' => '6 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 10, 'category_id' => 1, 'breed' => 'Poodle', 'gender' => 'female', 'age' => '2 tháng', 'vaccination' => 'Đã tiêm 1 mũi'],
            ['product_id' => 11, 'category_id' => 1, 'breed' => 'Pug', 'gender' => 'male', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 12, 'category_id' => 1, 'breed' => 'Samoyed', 'gender' => 'female', 'age' => '4 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 13, 'category_id' => 1, 'breed' => 'Labrador', 'gender' => 'male', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],

            // Mèo (Category 2)
            ['product_id' => 14, 'category_id' => 2, 'breed' => 'Anh Lông Dài', 'gender' => 'female', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 15, 'category_id' => 2, 'breed' => 'Anh Lông Ngắn', 'gender' => 'male', 'age' => '2 tháng', 'vaccination' => 'Đã tiêm 1 mũi'],
            ['product_id' => 16, 'category_id' => 2, 'breed' => 'Ba Tư', 'gender' => 'female', 'age' => '4 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 17, 'category_id' => 2, 'breed' => 'Bengal', 'gender' => 'male', 'age' => '5 tháng', 'vaccination' => 'Đã tiêm 3 mũi'],
            ['product_id' => 18, 'category_id' => 2, 'breed' => 'Maine Coon', 'gender' => 'female', 'age' => '6 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 19, 'category_id' => 2, 'breed' => 'Munchkin', 'gender' => 'male', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 20, 'category_id' => 2, 'breed' => 'Mèo Mướp', 'gender' => 'female', 'age' => '2 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 21, 'category_id' => 2, 'breed' => 'Nga Mắt Xanh', 'gender' => 'male', 'age' => '4 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
            ['product_id' => 22, 'category_id' => 2, 'breed' => 'Turkish Van', 'gender' => 'female', 'age' => '5 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 23, 'category_id' => 2, 'breed' => 'Mèo Vàng', 'gender' => 'male', 'age' => '3 tháng', 'vaccination' => 'Đã tiêm đủ'],
            ['product_id' => 24, 'category_id' => 2, 'breed' => 'Mèo Xiêm', 'gender' => 'female', 'age' => '4 tháng', 'vaccination' => 'Đã tiêm 2 mũi'],
        ]);
    }
}
