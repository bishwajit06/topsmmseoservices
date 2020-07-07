<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public $fillable = [
        'category_id',
        'name',
        'description',
        'slug',
        'quantity',
        'price',
        'status',
        'offer_price',
        'user_id'
    ];


    public function images()
    {
        return $this->hasMany('App\ServiceImage');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
}
