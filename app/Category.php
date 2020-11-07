<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // public function posts()
    // {
    //     return $this->belongsToMany('App\Post')->withTimestamps();
    // }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
