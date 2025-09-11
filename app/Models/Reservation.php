<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'code',
        'guest_id',
        'status',
        'voucher',
    ];

    public function guest(){
        return $this->belongsTo(Guest::class);
    }
}
