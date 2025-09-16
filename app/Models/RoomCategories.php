<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategories extends Model
{
    protected $fillable = [
        'name',
        'price',
        'room_size',
        'capacity',
        'bed_setup',
    ];
}
