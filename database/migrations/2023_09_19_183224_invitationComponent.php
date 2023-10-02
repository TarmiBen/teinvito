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

        Schema::create('invitation_components', function (Blueprint $table) {

            $table->id();
            $table->biginteger('invitation_id')->unsigned();
            $table->biginteger('component_id')->unsigned();
            $table->timestamps();

        });



        Schema::table('invitation_components', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitations');
        });

        Schema::table('invitation_components', function (Blueprint $table) {
            $table->foreign('component_id')->references('id')->on('components');


        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitationComponent');
    }
};
