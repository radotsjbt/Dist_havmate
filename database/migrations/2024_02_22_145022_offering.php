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
        Schema::create('offering', function (Blueprint $table) {
            $table->id();
            $table->string('Offer_ID'); 
            $table->foreignId('Dist_Id');
            $table->string('Dist_Name');   
            $table->foreignId('Harv_Id');
            $table->string('Harv_Name');
            $table->foreignId('Farmer_Id'); 
            $table->string('Farmer_Name');     
            $table->integer('Qty');
            $table->integer('Offer_Price');
            $table->text('Notes');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offering');
    }
};
