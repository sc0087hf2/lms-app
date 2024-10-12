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
        Schema::create('sentence_part_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('ja_sentence');
            $table->string('en_sentence');
            $table->foreignId('grammar_id')
                ->constrained('grammars')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('reference_id')
                ->constrained('references')
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
        Schema::dropIfExists('sentence_part_quizzes');
    }
};
