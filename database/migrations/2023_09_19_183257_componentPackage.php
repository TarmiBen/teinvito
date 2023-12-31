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
        Schema::create('component_packages', function (Blueprint $table) { 
            $table->id();
            $table->biginteger('component_id')->unsigned(); 
            $table->biginteger('package_id')->unsigned(); 
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::table('component_packages', function (Blueprint $table) {
            $table->foreign('component_id')->references('id')->on('components');
        });

        Schema::table('component_packages', function (Blueprint $table) {
            $table->foreign('package_id')->references('id')->on('packages');
        });   
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('componentPackages');
    }
};
