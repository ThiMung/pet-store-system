<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessorySeeder extends Seeder
{
public function run()
    {
        DB::table('accessories')->insert([
            ['product_id' => 25, 'accessory_type' => 'Balo', 'brand' => 'PetStar', 'material' => 'Nhựa ABS', 'size' => 'L'],
            ['product_id' => 26, 'accessory_type' => 'Đồ chơi', 'brand' => 'CatFun', 'material' => 'Gỗ/Cát tông', 'size' => 'M'],
            ['product_id' => 27, 'accessory_type' => 'Dụng cụ ăn', 'brand' => 'BowlMaster', 'material' => 'Inox/Nhựa', 'size' => 'Freesize'],
            ['product_id' => 28, 'accessory_type' => 'Nhà', 'brand' => 'DreamHouse', 'material' => 'Gỗ thông', 'size' => 'XL'],
            ['product_id' => 29, 'accessory_type' => 'Nệm', 'brand' => 'SleepyPet', 'material' => 'Bông/Vải nhung', 'size' => 'L'],
            ['product_id' => 30, 'accessory_type' => 'Huấn luyện', 'brand' => 'ProTrain', 'material' => 'Nhiều chất liệu', 'size' => 'M'],
            ['product_id' => 31, 'accessory_type' => 'Phụ kiện dắt', 'brand' => 'SafeWalk', 'material' => 'Da/Nylon', 'size' => 'S/M/L'],
        ]);
    }
}
