<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomReservation extends Model
{
    protected $table = 'room_reservations';

     protected $fillable = [
        'reservation_id', 
        'room_id', 
        'arrival', 
        'departure',
        'nights',
        'adult',
        'child',
        'infant',
        'status',
        'roomrate',
    ];
}
