<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory, HasUuids;

    protected $table = 'rooms';

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
        'name',
    ];
}
