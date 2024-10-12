<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('homework', function (Blueprint $table) {
            $table->foreignId('todo_id')
                ->after('lesson_id')  // lesson_idの後ろに追加
                ->constrained('todos')  // todosテーブルへの外部キー制約
                ->onUpdate('cascade')   // 更新時に連動
                ->onDelete('cascade');  // 削除時に連動
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homework', function (Blueprint $table) {
            Schema::table('homework', function (Blueprint $table) {
                $table->dropForeign(['todo_id']);  // 外部キー制約を削除
                $table->dropColumn('todo_id');     // カラムを削除
            });
        });
    }
};
