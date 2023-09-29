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
        Schema::create('student_courses', function (Blueprint $table) {
            $table->id();
            $table->string('sorov_holati')->default('tekshirilmoqda');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade')->nullable();;  
            $table->foreignId('student_id')->constrained('users')->onDelete('cascade')->nullable();; 
            $table->string('tolov_qilgani')->default('qilinmagan');
            $table->text('bu_xaqda_xabar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_courses');
    }
};
