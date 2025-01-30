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
        Schema::create('relationships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_follower_id')->constrained('artist_users')->nullable()->onDelete('cascade'); // フォローする側
            $table->foreignId('artist_followed_id')->constrained('artist_users')->nullable()->onDelete('cascade'); // フォローされる側
            $table->foreignId('general_follower_id')->constrained('general_users')->nullable()->onDelete('cascade'); // フォローする側
            $table->foreignId('general_followed_id')->constrained('general_users')->nullable()->onDelete('cascade'); // フォローされる側
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relationships');
    }
};
