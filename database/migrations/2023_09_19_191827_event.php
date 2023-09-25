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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('user_invited_id');
            $table->bigInteger('invitation_id')->unsigned();
            $table->string('type');
            $table->timestamp('ceremony_date');
            $table->timestamp('event_date')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->string('title');
        });

        Schema::table('event', function (Blueprint $table) {
            $table->foreign('invitation_id')->references('id')->on('invitation');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
