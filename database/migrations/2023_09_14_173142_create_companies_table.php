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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('rfc');
            $table->string('street');
            $table->string('int');
            $table->string('ext');
            $table->string('colony');
            $table->string('city');
            $table->string('state');
            $table->integer('cp')->unsigned();
            $table->string('description');
            $table->string('logo');
            $table->string('cover');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
