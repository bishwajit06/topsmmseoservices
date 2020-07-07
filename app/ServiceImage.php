<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceImage extends Model
{
    public $fillable = [
        'service_id',
        'image',
    ];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
