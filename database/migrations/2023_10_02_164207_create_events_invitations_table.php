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
        Schema::create('events_invitations', function (Blueprint $table) {
            $table->id();
            $table->biginteger('event_id')->unsigned();
            $table->biginteger('invitation_id')->unsigned();
            $table->timestamps();
            $table->softDeletes()->nullable();
        });

        Schema::table('events_invitations', function (Blueprint $table) {
            $table->foreign('event_id')->references('id')->on('event');
        });

        Schema::table('events_invitations', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitation');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events_invitations');
    }
};
