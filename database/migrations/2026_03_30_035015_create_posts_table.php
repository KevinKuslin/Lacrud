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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();               // id (BIGINT, auto increment, primary key) 
            $table->timestamps();       // buat created_at dan updated_at 
            $table->string('title');    // title (VARCHAR) 
            $table->longText('body');   // body (LONGTEXT) 
            $table->foreignId('user_id')->constrained(); // constrained() berfungsi untuk references('id')->on('users') 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
