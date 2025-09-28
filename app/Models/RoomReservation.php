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
        'adults',
        'child',
        'infant',
        'roomrate',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
