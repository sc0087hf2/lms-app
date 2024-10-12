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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->foreignId('part_of_speech_id')
                ->constrained('part_of_speeches')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('en_word');
            $table->string('ja_word');
            $table->string('en_example')->nullable();
            $table->string('ja_example')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
