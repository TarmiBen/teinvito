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
        Schema::create('userProvider', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('users_id')->unsigned();
            $table->BigInteger('company_id')->unsigned();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
        
        Schema::table('userProvider', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userProvider');
    }
};

