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
        Schema::create('harvests', function (Blueprint $table) {
            $table->id();
            $table->text('Harv_ID'); 
            $table->foreignId('farmer_id');   
            $table->string('seller');       
            $table->string('Harv_Name');
            $table->string('Harv_Desc');
            $table->string('Harv_Type');
            $table->string('Harv_Stock');
            $table->string('Harv_Price');
            $table->string('Image_Harv');
            $table->string('Video_Harv');

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harvests');
    }
};
