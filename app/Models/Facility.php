<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['name', 'type', 'stock', 'description'];

    public function roomCategories()
    {
        return $this->belongsToMany(RoomCategory::class, 'room_category_facilities')->withPivot('qty')->withTimestamps();
    }

    public function scopeRoom($query)
    {
        return $query->where('type', 'room');
    }

    public function scopePublic($query)
    {
        return $query->where('type', 'public');
    }
}
