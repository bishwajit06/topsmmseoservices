<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
		'favicon',
		'home_banner',
		'top_contact',
		'header_title',
        'footer_copyright'
    ];
}
