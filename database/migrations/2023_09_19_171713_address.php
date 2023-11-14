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
        Schema::create('address', function (Blueprint $table) {
            $table->id();  
            $table->BigInteger('company_id')->unsigned();
            $table->integer('priority');          
            $table->string('name');            
            $table->string('street');
            $table->string('int');
            $table->string('ext');
            $table->integer('cp')->unsigned();
            $table->string('colony');
            $table->string('city');
            $table->string('state');  
            $table->timestamps();
            $table->softDeletes()->nullable();          
        });

        Schema::table('address', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');          
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address');
    }
};

