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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->unique();
            $table->foreignId('teacher_id')
                ->constrained('teachers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('guardian');
            $table->string('phone_number', 15)->nullable();
            $table->string('school');
            $table->string('school_year');
            $table->string('desired_school')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
