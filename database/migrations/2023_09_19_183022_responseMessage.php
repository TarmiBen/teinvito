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
        Schema::create('responseMessage', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('platform_id')->unsigned();
            $table->string('reference');
            $table->integer('status');
            $table->string('status_detail');
            $table->string('cardholder');
            $table->integer('card');
            $table->double('amount');           
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::table('responseMessage', function (Blueprint $table) {
            $table->foreign('platform_id')->references('id')->on('platform');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responseMessage');
    }
};
