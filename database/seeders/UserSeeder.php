<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'first_name' => '太郎',
                'last_name' => '山田',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),

            ],
            [
                'name' => 'student',
                'first_name' => 'テスト',
                'last_name' => '学生',
                'email' => 'student@student.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'sakuragi',
                'first_name' => '花道',
                'last_name' => '桜木',
                'email' => 'sakuragi@sakuragi.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'rukawa',
                'first_name' => '楓',
                'last_name' => '流川',
                'email' => 'rukawa@rukawa.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'teacher',
                'first_name' => 'テスト',
                'last_name' => '先生',
                'email' => 'teacher@teacher.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'anzai',
                'first_name' => '先生',
                'last_name' => '安西',
                'email' => 'anzai@anzai.com',
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'admin',
                'first_name' => 'テスト',
                'last_name' => '管理者',
                'email' => 'admin@admin.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
