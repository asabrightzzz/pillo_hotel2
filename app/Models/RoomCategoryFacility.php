<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomCategoryFacility extends Model
{
    use HasFactory;

    protected $table = 'room_category_facilities';

    protected $fillable = [
        'room_category_id',
        'facility_id',
        'qty',
    ];

    public function roomCategory()
    {
        return $this->belongsTo(RoomCategory::class, 'room_category_id');
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facility_id');
    }
}
