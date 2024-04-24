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
            $table->string('Cust_ID'); //from regist process (User Model)
            $table->string('Cust_Name'); //from regist form (username)
            $table->text('Cust_Address');
            $table->string('Cust_Phone'); //from regist form (phone)
            $table->string('Cust_Email'); //from regist form (email)
            $table->string('Purchase_Needs')->default('default')->nullable();
            $table->string('CustProd_Name')->default('default')->nullable();
            $table->text('CustProd_Desc')->default('default')->nullable();
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
