<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class room_category_facility extends Model
{

    protected $table = "room_category_facilities";

   protected $fillable = [
        'room_category_id',
        'facility_id',
        'qty',
    ];

    public function roomCategory()
{
    return $this->belongsTo(RoomCategory::class);
}
    public function facility()
{
    return $this->belongsTo(Facility::class);
}

}
