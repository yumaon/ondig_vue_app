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
        Schema::create('live_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_user_id')->constrained('artist_users')->onDelete('cascade');
            $table->string('title');
            $table->string('description', 1000)->nullable();
            $table->string('image')->nullable();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_schedules');
    }
};
