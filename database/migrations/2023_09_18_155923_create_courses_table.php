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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('image');
            $table->string('youtube');
            $table->string('narxi');
            $table->string('kurs_tili');
            $table->string('davomiylik_vaqti');
            $table->foreignId('teacher_id')->nullable()->constrained('specialists');  
            $table->foreignId('maqullagan_id')->nullable()->constrained('users');  
            $table->text('desc');
            $table->boolean('status')->default(0);
            $table->string('maqullanganligi')->default('korilmagan');
            $table->text('sabab_desc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
