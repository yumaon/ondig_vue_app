<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    protected $table = 'prefectures';

    protected $fillable = [
        'name',
        'code',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function generalUsers()
    {
        return $this->hasMany(GeneralUser::class);
    }
}
