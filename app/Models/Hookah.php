<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hookah extends Model
{
    protected $fillable = [
        'name',
        'tubes_count'
    ];

    public function SmokingBar() {
        return $this->belongsToMany('App\Models\SmokingBar', 'smoking_bar_hookahs')->withPivot('hookahs_count');
    }
}
