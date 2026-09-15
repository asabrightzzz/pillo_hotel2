<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'room_category_id',
        'description',
    ];

    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function roomReservations()
    {
        return $this->hasMany(RoomReservation::class, 'room_id');
    }
}
