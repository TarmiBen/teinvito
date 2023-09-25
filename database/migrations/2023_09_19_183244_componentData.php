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
        Schema::create('componentData', function (Blueprint $table) { 
            $table->id();
            $table->biginteger('invitation_id')->unsigned(); 
            $table->biginteger('component_id')->unsigned(); 
            $table->string('key');
            $table->string('value'); 
            $table->timestamps();
        });

        Schema::table('componentData', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitation');
        });

        Schema::table('componentData', function (Blueprint $table) {
            $table->foreign('component_id')->references('id')->on('component');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('componentData');
    }
};
