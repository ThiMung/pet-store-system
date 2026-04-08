<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            // --- CHÓ (ID 1 - 13) ---
            ['id' => 1, 'name' => 'Chó Ailen Setter', 'price' => 12000000, 'image' => 'cho-ailen-setter.jpg', 'description' => 'Giống chó săn thanh lịch', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 2, 'name' => 'Chó Alaska', 'price' => 15000000, 'image' => 'cho-alaska.jpg', 'description' => 'Chó kéo xe dũng mãnh', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 3, 'name' => 'Chó Beauceron', 'price' => 18000000, 'image' => 'cho-beauceron.jpg', 'description' => 'Chó chăn cừu thông minh', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 4, 'name' => 'Chó Chihuahua', 'price' => 5000000, 'image' => 'cho-chihuahua.jpg', 'description' => 'Nhỏ nhắn và đáng yêu', 'stock' => 5, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 5, 'name' => 'Chó Dogo Argentino', 'price' => 25000000, 'image' => 'cho-dogo.jpg', 'description' => 'Chó săn mạnh mẽ', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 6, 'name' => 'Chó Golden Retriever', 'price' => 10000000, 'image' => 'cho-goldens.jpg', 'description' => 'Người bạn trung thành', 'stock' => 4, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 7, 'name' => 'Chó Greyhound', 'price' => 14000000, 'image' => 'cho-greyhound.jpg', 'description' => 'Vận động viên điền kinh', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 8, 'name' => 'Chó Ngao Anh', 'price' => 30000000, 'image' => 'cho-ngao-anh.jpg', 'description' => 'Khổng lồ và điềm tĩnh', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 9, 'name' => 'Chó Ngao Tây Ban Nha', 'price' => 35000000, 'image' => 'cho-ngao-tay-ban-nha.jpg', 'description' => 'Vệ sĩ tận tâm', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 10, 'name' => 'Chó Poodle', 'price' => 7000000, 'image' => 'cho-poodle.jpg', 'description' => 'Thông minh và dễ dạy', 'stock' => 6, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 11, 'name' => 'Chó Pug', 'price' => 6500000, 'image' => 'cho-pug.jpg', 'description' => 'Khuôn mặt hài hước', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 12, 'name' => 'Chó Samoyed Trắng', 'price' => 12000000, 'image' => 'cho-trang.jpg', 'description' => 'Nàng bạch tuyết vùng Siberia', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 13, 'name' => 'Chó Labrador', 'price' => 9000000, 'image' => 'labrador.jpg', 'description' => 'Thân thiện với trẻ nhỏ', 'stock' => 4, 'product_type' => 'pet', 'status' => 'available'],

            // --- MÈO (ID 14 - 24) ---
            ['id' => 14, 'name' => 'Mèo Anh Lông Dài', 'price' => 9500000, 'image' => 'meo-anh-long-dai.jpg', 'description' => 'Quý tộc lông dài', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 15, 'name' => 'Mèo Anh Lông Ngắn', 'price' => 8000000, 'image' => 'meo-anh-long-ngan.jpg', 'description' => 'Mũm mĩm đáng yêu', 'stock' => 4, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 16, 'name' => 'Mèo Ba Tư', 'price' => 11000000, 'image' => 'meo-ba-tu.jpg', 'description' => 'Khuôn mặt tịt đặc trưng', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 17, 'name' => 'Mèo Bengal', 'price' => 20000000, 'image' => 'meo-bengal.jpg', 'description' => 'Họa tiết báo rừng rực rỡ', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 18, 'name' => 'Mèo Maine Coon', 'price' => 25000000, 'image' => 'meo-maine-coon.jpg', 'description' => 'Gã khổng lồ dịu dàng', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 19, 'name' => 'Mèo Munchkin', 'price' => 15000000, 'image' => 'meo-munchkin.jpg', 'description' => 'Nấm lùn chân ngắn', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 20, 'name' => 'Mèo Mướp', 'price' => 500000, 'image' => 'meo-muop.jpg', 'description' => 'Thợ săn chuột tài ba', 'stock' => 10, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 21, 'name' => 'Mèo Nga Mắt Xanh', 'price' => 12000000, 'image' => 'meo-nga-mat-xanh.jpg', 'description' => 'Đôi mắt hút hồn', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 22, 'name' => 'Mèo Turkish Van', 'price' => 18000000, 'image' => 'meo-turkish-van.jpg', 'description' => 'Giống mèo thích bơi lội', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 23, 'name' => 'Mèo Vàng', 'price' => 400000, 'image' => 'meo-vang.jpg', 'description' => 'Ngoan ngoãn và dễ nuôi', 'stock' => 8, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 24, 'name' => 'Mèo Xiêm', 'price' => 6000000, 'image' => 'meo-xiem.jpg', 'description' => 'Vẻ đẹp phương Đông', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],

            // --- PHỤ KIỆN (ID 25 - 31) ---
            ['id' => 25, 'name' => 'Balo Vận Chuyển', 'price' => 450000, 'image' => 'balo-van-chuyen.jpg', 'description' => 'Balo phi hành gia thoáng khí', 'stock' => 20, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 26, 'name' => 'Bàn Cào Móng', 'price' => 150000, 'image' => 'ban-cao-mong.jpg', 'description' => 'Giúp mèo giải trí và bảo vệ nội thất', 'stock' => 30, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 27, 'name' => 'Bát Ăn Và Bình Nước', 'price' => 120000, 'image' => 'bat-an-va-binh-nuoc.jpg', 'description' => 'Bộ dụng cụ ăn uống cao cấp', 'stock' => 50, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 28, 'name' => 'Nhà Thú Cưng', 'price' => 1200000, 'image' => 'nha.jpg', 'description' => 'Ngôi nhà ấm cúng cho thú cưng', 'stock' => 5, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 29, 'name' => 'Ổ Nệm Giường Ngủ', 'price' => 350000, 'image' => 'o-nem,-giuong-ngu.jpg', 'description' => 'Nệm êm ái cho giấc ngủ ngon', 'stock' => 15, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 30, 'name' => 'Dụng Cụ Huấn Luyện', 'price' => 200000, 'image' => 'phu-kien-huan-luyen.jpg', 'description' => 'Bộ dụng cụ huấn luyện cơ bản', 'stock' => 10, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 31, 'name' => 'Vòng Cổ Và Dây Dắt', 'price' => 180000, 'image' => 'vong-co-va-day-dat.jpg', 'description' => 'Chất liệu bền bỉ, an toàn', 'stock' => 40, 'product_type' => 'accessory', 'status' => 'available'],
        ]);
    }
}