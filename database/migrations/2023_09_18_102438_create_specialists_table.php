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
        Schema::create('specialists', function (Blueprint $table) {
            $table->id();
            $table->string('fish')->nullable();
            $table->string('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('desc')->nullable();
            $table->boolean('lvl')->nullable();
            $table->string('lavozim')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('tg_follow')->nullable();
            $table->string('insta_follow')->nullable();
            $table->string('facebook_follow')->nullable();
            $table->boolean('status')->nullable();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialists');
    }
};
