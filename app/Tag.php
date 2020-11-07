<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function services()
    {
        return $this->belongsToMany('App\Service')->withTimestamps();
    }

    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
