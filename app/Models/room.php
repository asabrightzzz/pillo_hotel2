<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $fillable = [
        'name',
        'status',
        'room_category_id',
        'description',
    ];

    protected $hidden = [
        'password',
    ];
}
