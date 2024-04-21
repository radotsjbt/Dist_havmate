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
            $table->string('Cust_Name');   
            $table->foreignId('Farmer_Id');  
            $table->string('Farmer_Name');     
            $table->string('Harv_Name');
            $table->string('Qty');
            $table->string('Total_Price');
            $table->text('Notes');

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
