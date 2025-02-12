<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class ArtistUser extends Authenticatable
{
    use HasUuids;
    protected $table = 'artist_users';

    /**
     * UUIDを自動生成するカラムの指定
     */
    public function newUniqueId(): string
    {
        return (string) Str::uuid();
    }

    /**
     * UUIDを生成するカラムの指定
     */
    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    protected $fillable = [
        'uuid',
        'genre_id',
        'prefecture_id',
        'city_id',
        'latitude',
        'longitude',
        'artist_name',
        'introduction',
        'profile_image',
        'background_image',
        'password',
        'is_deleted',
        'email',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_deleted' => 'boolean',
        ];
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
