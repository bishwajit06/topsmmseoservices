<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
		'slug',
		'division_id',
    ];


    public function division()
    {
        return $this->belongsTo('App\Division');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
