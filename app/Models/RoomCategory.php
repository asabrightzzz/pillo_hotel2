<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomCategory extends Model
{
    protected $table = "room_categories";
    protected $fillable = [
        'name',
        'price',
        'room_size',
        'capacity',
        'bed_setup',
    ];
}
