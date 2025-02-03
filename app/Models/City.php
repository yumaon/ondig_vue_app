<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Prefecture;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'prefecture_id',
        'name',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function generalUsers()
    {
        return $this->hasMany(GeneralUser::class);
    }
}
