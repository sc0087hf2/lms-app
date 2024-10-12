<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrammarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('grammars')->insert([
            [
                'name' => 'be動詞',
            ],
            [
                'name' => '一般動詞',
            ],
            [
                'name' => '疑問詞',
            ],
            [
                'name' => '命令文',
            ],
            [
                'name' => '三人称単数現在形のs',
            ],
            [
                'name' => '現在進行形',
            ],
            [
                'name' => 'can',
            ],
            [
                'name' => '一般動詞の過去',
            ],
            [
                'name' => '名詞の複数形',
            ],
            [
                'name' => '代名詞',
            ],
            [
                'name' => 'be動詞の過去',

            ],
            [
                'name' => '過去進行形',

            ],
            [
                'name' => '未来',

            ],
            [
                'name' => '動名詞',

            ],
            [
                'name' => '不定詞',
            ],
            [
                'name' => '助動詞',
            ],
            [
                'name' => '比較',
            ],
            [
                'name' => 'there is',
            ],
            [
                'name' => '接続詞',
            ],
            [
                'name' => '受け身',
            ],
            [
                'name' => '現在完了形（継続）',
            ],
            [
                'name' => '現在完了形（経験）',
            ],
            [
                'name' => '現在完了形（完了）',
            ],
            [
                'name' => '現在完了進行形',
            ],
            [
                'name' => '不定詞2',
            ],
            [
                'name' => '原形不定詞',
            ],
            [
                'name' => '分詞',
            ],
            [
                'name' => '間接疑問',
            ],
            [
                'name' => '関係代名詞1',
            ],
            [
                'name' => '関係代名詞2',
            ],
            [
                'name' => '仮定法',
            ],
            [
                'name' => '形容詞',
            ],
            [
                'name' => '副詞',
            ],

        ]);
    }
}
