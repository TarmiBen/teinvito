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
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->BigInteger('model_id')->unsigned();
            $table->BigInteger('type_social_id')->unsigned();
            $table->string('url');            
        });

        // Schema::table('socials', function (Blueprint $table) {           
            
        //     $table->foreign('model_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
        //     $table->foreign('type_social_id')->references('id')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socials');
    }
};
