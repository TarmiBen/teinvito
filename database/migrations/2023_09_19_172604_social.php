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
        Schema::create('social', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->BigInteger('model_id')->unsigned();
            $table->BigInteger('typesSocial')->unsigned();
            $table->string('url');     
            $table->timestamps();
            $table->softDeletes()->nullable();       
        });

        Schema::table('social', function (Blueprint $table) {           
            
            $table->foreign('model_id')->references('id')->on('company')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('typesSocial')->references('id')->on('typesSocial')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social');
    }
};

