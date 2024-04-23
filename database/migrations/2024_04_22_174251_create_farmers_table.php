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
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();
            $table->string('Farmer_ID'); //from regist process (User Model)
            $table->string('Farmer_Name'); //from regist form (username)
            $table->string('Farmer_Address'); //from regist form (address)
            $table->string('Farmer_Phone'); //from regist form (phone)
            $table->string('Farmer_Email'); //from regist form (email)
            $table->text('Farmer_Image')->default('default')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};
