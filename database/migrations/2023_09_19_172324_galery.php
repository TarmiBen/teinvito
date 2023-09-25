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
        Schema::create('galery', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('service_package_id')->unsigned();
            $table->string('src');
            $table->string('tittle');
            $table->string('text');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::table('galery', function (Blueprint $table) {
            $table->foreign('service_package_id')->references('id')->on('servicePackages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galery');
    }
};

