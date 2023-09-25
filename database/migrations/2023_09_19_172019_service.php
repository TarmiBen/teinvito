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
        Schema::create('service', function (Blueprint $table) {
            $table->id();
            $table->string('name');   
            $table->BigInteger('category_id')->unsigned();           
            $table->BigInteger('company_id')->unsigned();                       
            $table->text('description_large');    
            $table->string('description_small');
            $table->string('img_src'); 
            $table->string('keywords');  
            $table->timestamps();
            $table->softDeletes()->nullable();    
        });

        Schema::table('service', function (Blueprint $table) {            
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};

