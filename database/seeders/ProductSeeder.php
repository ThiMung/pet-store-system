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
            ['id' => 1, 'name' => 'Chó Ailen Setter', 'price' => 12000000, 'image' => 'cho-ailen-setter.jpg', 'description' => 'Giống chó săn thanh lịch với bộ lông dài óng mượt, tính cách thân thiện, năng động và rất trung thành với chủ.', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 2, 'name' => 'Chó Alaska', 'price' => 15000000, 'image' => 'cho-alaska.jpg', 'description' => 'Chó kéo xe dũng mãnh, có sức bền cao, thân thiện với con người và rất thích hợp sống ở môi trường rộng rãi.', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 3, 'name' => 'Chó Beauceron', 'price' => 18000000, 'image' => 'cho-beauceron.jpg', 'description' => 'Chó chăn cừu thông minh, trung thành và dễ huấn luyện, thích hợp làm chó bảo vệ và làm việc.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 4, 'name' => 'Chó Chihuahua', 'price' => 5000000, 'image' => 'cho-chihuahua.jpg', 'description' => 'Giống chó nhỏ nhắn, đáng yêu, năng động và rất quấn chủ, phù hợp nuôi trong không gian nhỏ như căn hộ.', 'stock' => 5, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 5, 'name' => 'Chó Dogo Argentino', 'price' => 25000000, 'image' => 'cho-dogo.jpg', 'description' => 'Chó săn mạnh mẽ, cơ bắp, rất dũng cảm và có khả năng bảo vệ cao, cần được huấn luyện tốt.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 6, 'name' => 'Chó Golden Retriever', 'price' => 10000000, 'image' => 'cho-goldens.jpg', 'description' => 'Người bạn trung thành, hiền lành, thông minh và rất thân thiện với trẻ em, dễ huấn luyện.', 'stock' => 4, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 7, 'name' => 'Chó Greyhound', 'price' => 14000000, 'image' => 'cho-greyhound.jpg', 'description' => 'Vận động viên điền kinh trong thế giới loài chó, nhanh nhẹn, thân hình thon gọn và tính cách hiền hòa.', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 8, 'name' => 'Chó Ngao Anh', 'price' => 30000000, 'image' => 'cho-ngao-anh.jpg', 'description' => 'Giống chó khổng lồ, điềm tĩnh, trung thành và có khả năng bảo vệ gia đình rất tốt.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 9, 'name' => 'Chó Ngao Tây Ban Nha', 'price' => 35000000, 'image' => 'cho-ngao-tay-ban-nha.jpg', 'description' => 'Chó vệ sĩ mạnh mẽ, dũng cảm, có bản năng bảo vệ cao và phù hợp với những người có kinh nghiệm nuôi chó.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 10, 'name' => 'Chó Poodle', 'price' => 7000000, 'image' => 'cho-poodle.jpg', 'description' => 'Giống chó thông minh, nhanh nhẹn, dễ dạy và có ngoại hình đáng yêu với bộ lông xoăn đặc trưng.', 'stock' => 6, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 11, 'name' => 'Chó Pug', 'price' => 6500000, 'image' => 'cho-pug.jpg', 'description' => 'Chó có khuôn mặt hài hước, thân thiện, thích chơi đùa và rất phù hợp làm thú cưng trong gia đình.', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 12, 'name' => 'Chó Samoyed Trắng', 'price' => 12000000, 'image' => 'cho-trang.jpg', 'description' => 'Giống chó lông trắng xù, nổi bật với nụ cười “Samoyed”, thân thiện, hiền lành và rất thích vận động.', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 13, 'name' => 'Chó Labrador', 'price' => 9000000, 'image' => 'labrador.jpg', 'description' => 'Giống chó thân thiện, thông minh, dễ huấn luyện và rất phù hợp với gia đình có trẻ nhỏ.', 'stock' => 4, 'product_type' => 'pet', 'status' => 'available'],

            // --- MÈO (ID 14 - 24) ---
            ['id' => 14, 'name' => 'Mèo Anh Lông Dài', 'price' => 9500000, 'image' => 'meo-anh-long-dai.jpg', 'description' => 'Giống mèo quý tộc với bộ lông dài mềm mại, tính cách hiền lành, thích được chăm sóc và vuốt ve.', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 15, 'name' => 'Mèo Anh Lông Ngắn', 'price' => 8000000, 'image' => 'meo-anh-long-ngan.jpg', 'description' => 'Mèo mũm mĩm đáng yêu, lông ngắn dày, tính cách điềm đạm, thích hợp nuôi trong nhà.', 'stock' => 4, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 16, 'name' => 'Mèo Ba Tư', 'price' => 11000000, 'image' => 'meo-ba-tu.jpg', 'description' => 'Giống mèo nổi bật với khuôn mặt tịt, lông dài sang trọng và tính cách nhẹ nhàng, ít hoạt động.', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 17, 'name' => 'Mèo Bengal', 'price' => 20000000, 'image' => 'meo-bengal.jpg', 'description' => 'Mèo có họa tiết giống báo rừng, năng động, thông minh và thích leo trèo, khám phá.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 18, 'name' => 'Mèo Maine Coon', 'price' => 25000000, 'image' => 'meo-maine-coon.jpg', 'description' => 'Giống mèo khổng lồ nhưng hiền lành, thân thiện, có bộ lông dày và rất thích tương tác với con người.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 19, 'name' => 'Mèo Munchkin', 'price' => 15000000, 'image' => 'meo-munchkin.jpg', 'description' => 'Mèo chân ngắn dễ thương, năng động, thích chơi đùa và rất thân thiện với gia đình.', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 20, 'name' => 'Mèo Mướp', 'price' => 500000, 'image' => 'meo-muop.jpg', 'description' => 'Giống mèo phổ biến, dễ nuôi, khỏe mạnh và có khả năng săn chuột rất tốt.', 'stock' => 10, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 21, 'name' => 'Mèo Nga Mắt Xanh', 'price' => 12000000, 'image' => 'meo-nga-mat-xanh.jpg', 'description' => 'Mèo sở hữu đôi mắt xanh cuốn hút, tính cách nhẹ nhàng, thông minh và thích sự yên tĩnh.', 'stock' => 2, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 22, 'name' => 'Mèo Turkish Van', 'price' => 18000000, 'image' => 'meo-turkish-van.jpg', 'description' => 'Giống mèo đặc biệt thích bơi, năng động, thông minh và có bộ lông độc đáo.', 'stock' => 1, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 23, 'name' => 'Mèo Vàng', 'price' => 400000, 'image' => 'meo-vang.jpg', 'description' => 'Mèo ta dễ nuôi, ngoan ngoãn, thích nghi tốt với môi trường và rất gần gũi với con người.', 'stock' => 8, 'product_type' => 'pet', 'status' => 'available'],
            ['id' => 24, 'name' => 'Mèo Xiêm', 'price' => 6000000, 'image' => 'meo-xiem.jpg', 'description' => 'Giống mèo mang vẻ đẹp phương Đông, thông minh, tình cảm và thích giao tiếp với chủ.', 'stock' => 3, 'product_type' => 'pet', 'status' => 'available'],

            // --- PHỤ KIỆN (ID 25 - 31) ---
            ['id' => 25, 'name' => 'Balo Vận Chuyển', 'price' => 450000, 'image' => 'balo-van-chuyen.jpg', 'description' => 'Balo vận chuyển thú cưng thiết kế hiện đại, thoáng khí, giúp thú cưng thoải mái khi di chuyển.', 'stock' => 20, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 26, 'name' => 'Bàn Cào Móng', 'price' => 150000, 'image' => 'ban-cao-mong.jpg', 'description' => 'Giúp mèo mài móng, giảm stress, hạn chế làm hỏng đồ nội thất trong nhà.', 'stock' => 30, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 27, 'name' => 'Bát Ăn Và Bình Nước', 'price' => 120000, 'image' => 'bat-an-va-binh-nuoc.jpg', 'description' => 'Bộ bát ăn và bình nước tiện lợi, đảm bảo vệ sinh và an toàn cho thú cưng.', 'stock' => 50, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 28, 'name' => 'Nhà Thú Cưng', 'price' => 1200000, 'image' => 'nha.jpg', 'description' => 'Ngôi nhà nhỏ ấm cúng, giúp thú cưng có không gian riêng tư và nghỉ ngơi thoải mái.', 'stock' => 5, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 29, 'name' => 'Ổ Nệm Giường Ngủ', 'price' => 350000, 'image' => 'o-nem,-giuong-ngu.jpg', 'description' => 'Ổ nệm mềm mại, êm ái, giúp thú cưng có giấc ngủ sâu và thoải mái hơn.', 'stock' => 15, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 30, 'name' => 'Dụng Cụ Huấn Luyện', 'price' => 200000, 'image' => 'phu-kien-huan-luyen.jpg', 'description' => 'Bộ dụng cụ hỗ trợ huấn luyện thú cưng hiệu quả, giúp xây dựng thói quen tốt.', 'stock' => 10, 'product_type' => 'accessory', 'status' => 'available'],
            ['id' => 31, 'name' => 'Vòng Cổ Và Dây Dắt', 'price' => 180000, 'image' => 'vong-co-va-day-dat.jpg', 'description' => 'Vòng cổ và dây dắt chắc chắn, an toàn, phù hợp cho việc dắt thú cưng đi dạo.', 'stock' => 40, 'product_type' => 'accessory', 'status' => 'available'],
        ]);
    }
}
