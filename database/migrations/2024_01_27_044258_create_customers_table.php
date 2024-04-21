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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('Cust_Name');
            $table->text('Cust_Address');
            $table->string('Cust_Phone');
            $table->string('Cust_Email');
            $table->string('Company_Image');
            $table->string('Company_Name');
            $table->string('Purchase_Needs');
            $table->string('Buy_Price');
            $table->string('CustProd_Name');
            $table->string('CustProd_Desc');
            $table->string('CustProd_Image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
