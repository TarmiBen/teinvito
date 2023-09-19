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
        Schema::create('invitation', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned(); 
            $table->BigInteger('package_id')->unsigned();
            $table->timestamps();                           
        });

        Schema::table('invitation', function (Blueprint $table) {
            $table->foreign('package_id')->references('id')->on('package');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation');
    }
};