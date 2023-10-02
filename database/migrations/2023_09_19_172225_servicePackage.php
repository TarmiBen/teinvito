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

        Schema::create('service_package', function (Blueprint $table) {

            $table->id();
            $table->BigInteger('service_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->float('price');
        });


        Schema::table('service_package', function (Blueprint $table) {
            $table->foreign('service_id')->references('id')->on('service')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicePackage');
    }
};
