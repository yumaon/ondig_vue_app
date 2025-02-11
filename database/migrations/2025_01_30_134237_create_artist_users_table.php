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
        Schema::create('artist_users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('genre_id')->constrained('genres');
            $table->foreignId('prefecture_id')->nullable()->constrained('prefectures');
            $table->foreignId('city_id')->nullable()->constrained('cities');
            $table->string('address_detail')->nullable();
            $table->decimal('latitude', 10, 7)->nullable()->comment('緯度');
            $table->decimal('longitude', 10, 7)->nullable()->comment('経度');
            $table->string('artist_name');
            $table->text('introduction')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('background_image')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artist_users');
    }
};
