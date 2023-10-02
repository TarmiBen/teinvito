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
            $table->BigInteger('types_social')->unsigned();
            $table->string('url');
        });

        Schema::table('social', function (Blueprint $table) {


            $table->foreign('model_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('types_social')->references('id')->on('types_socials')->onDelete('cascade')->onUpdate('cascade');

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

