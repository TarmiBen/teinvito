<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->biginteger('users_id')->unsigned();
            $table->integer('user_invited_id')->unsigned();
            $table->bigInteger('invitation_id')->unsigned();
            $table->string('type');
            $table->timestamp('ceremony_date');
            $table->softDeletes()->nullable();
            $table->string('title');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitations');
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('user');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
