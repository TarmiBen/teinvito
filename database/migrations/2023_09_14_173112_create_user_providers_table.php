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
        Schema::create('user_providers', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('users_id')->unsigned();
            $table->BigInteger('company_id')->unsigned();
        });
        
        // Schema::table('user_providers', function (Blueprint $table) {
        //     $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
        // });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_providers');
    }
};
