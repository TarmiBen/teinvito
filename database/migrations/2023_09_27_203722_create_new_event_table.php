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
        Schema::create('new_event', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('user_invited_id');
            $table->integer('invitation_id');
            $table->string('type');
            $table->date('ceremony_date');
            $table->date('event_date');
            $table->string('title');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_event');
    }
};
