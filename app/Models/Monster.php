<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Monster extends Model
{
    protected $fillable = [
        'id',
        'name',
        'sprite',
        'map',
        'map_image_url',
        'respawn_time',
        'respawn_max_time'
    ];

    protected function spriteImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? asset($value) : null,
        );
    }

    protected function mapImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? asset($value) : null,
        );
    }
}
