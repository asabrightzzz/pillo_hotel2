<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guest';

    protected $fillable = ['name', 'email', 'phone', 'identity_number', 'identity_photo'];
};
