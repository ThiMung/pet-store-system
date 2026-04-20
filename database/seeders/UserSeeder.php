<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123456'),
                'phone' => '0123456789',
                'address' => 'Đà Nẵng, Việt Nam',
                'role' => 'admin',
            ],
            [
                'id' => 2,
                'name' => 'Nguyễn Văn A',
                'email' => 'nguyenvana@gmail.com',
                'password' => Hash::make('user123456'),
                'phone' => '0987654321',
                'address' => 'Hồ Chí Minh, Việt Nam',
                'role' => 'user',
            ],
        ]);
    }
}
