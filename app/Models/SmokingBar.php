<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmokingBar extends Model
{
    protected $fillable = [
        'name'
    ];

    public function Hookah() {
        return $this->belongsToMany('App\Models\Hookah', 'smoking_bar_hookahs')->withPivot('hookahs_count');
    }
}
