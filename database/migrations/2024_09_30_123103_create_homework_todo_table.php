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
        Schema::create('homework_todo', function (Blueprint $table) {
            $table->id();
            $table->foreignId('homework_id')
                ->constrained('homework')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('todo_id')
                ->constrained('todos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homework_todo');
    }
};
