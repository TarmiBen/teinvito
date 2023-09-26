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
        Schema::create('components', function (Blueprint $table) { 
            $table->id();
            $table->biginteger('component_package_id')->unsigned();
            $table->string('name');
            $table->string('model_type'); 
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
        // Schema::table('component', function (Blueprint $table) {
        //     $table->foreign('component_package_id')->references('id')->on('componentPackage');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
