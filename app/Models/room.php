<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'gender',
    ];

    protected $hidden = [
        'password',
    ];
}
