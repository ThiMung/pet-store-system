<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AILogSeeder extends Seeder
{
    public function run()
    {
        DB::table('ai_logs')->insert([
            ['id' => 1, 'user_id' => 2, 'query_text' => 'Chó Poodle nên ăn hạt gì?', 'ai_response' => 'Poodle nên ăn các loại hạt size nhỏ như Royal Canin Poodle...', 'type' => 'chat', 'created_at' => now()],
            ['id' => 2, 'user_id' => 2, 'query_text' => 'Bệnh care ở chó chữa được không?', 'ai_response' => 'Care là bệnh nguy hiểm, cần đưa ra thú y ngay...', 'type' => 'chat', 'created_at' => now()],
        ]);
    }
}
