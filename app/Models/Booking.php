<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name',
        'customers_count',
        'booking_from',
        'booking_to',
    ];

    public function Hookah() {

        return $this->belongsToMany('App\Models\Hookah', 'hookah_booking');
    }

    public function calculateTime($date, $offset) {
        return Date("Y:M:s h:i:s", strtotime($offset, strtotime($date)));
    }
}
