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
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('user_id')->unsigned(); 
            $table->BigInteger('package_id')->unsigned();
            $table->timestamps();
            $table->softDeletes()->nullable();                           
        });

        Schema::table('invitations', function (Blueprint $table) {
            $table->foreign('package_id')->references('id')->on('packages');
        });

        Schema::table('invitations', function (Blueprint $table) {            
            $table->foreign('user_id')->references('id')->on('users');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitations');
    }
};
