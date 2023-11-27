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
            $table->string('type');
            $table->datetime('ceremony_date');
            $table->datetime('event_date');
            $table->varchar('title');
            $table->timestamps();
            $table->softDeletes()->nullable();
        });


        Schema::table('events', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
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
