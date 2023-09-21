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
        Schema::create('invitationComponents', function (Blueprint $table) { 
            $table->id();
            $table->biginteger('invitation_id')->unsigned(); 
            $table->biginteger('component_id')->unsigned();
            $table->integer('order'); 
            $table->timestamps();
            $table->softDeletes()->nullable();
            
        });

        Schema::table('invitationComponents', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitation');
        });

        Schema::table('invitationComponenst', function (Blueprint $table) {
            $table->foreign('component_id')->references('id')->on('component');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitationComponents');
    }
};
