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
        Schema::create('users', function (Blueprint $table) {
           
            $table->id();
            $table->string('User_ID');
            $table->string('username');
            $table->string('phone');
            $table->text('address');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');
            
            $table->string('web')->nullable();
            $table->string('image_url')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_desc')->nullable();
            $table->string('qty')->nullable();
            $table->string('needs')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
