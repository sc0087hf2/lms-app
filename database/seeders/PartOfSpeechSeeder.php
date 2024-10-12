<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartOfSpeechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('part_of_speeches')->insert([
            [
                'name' => '代名詞',
            ],
            [
                'name' => '動詞',
            ],
            [
                'name' => '副詞',
            ],
            [
                'name' => '助動詞',
            ],
            [
                'name' => '形容詞',
            ],
            [
                'name' => '名詞',
            ],
            [
                'name' => '接続詞',
            ],
            [
                'name' => '前置詞',
            ],

        ]);
    }
}
