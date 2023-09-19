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
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('service_package_id')->unsigned();
            $table->string('src');
            $table->string('tittle');
            $table->string('text');
        });

        // Schema::table('galeries', function (Blueprint $table) {
        //     $table->foreign('service_package_id')->references('id')->on('service_packages')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
    }
};
