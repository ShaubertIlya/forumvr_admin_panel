<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stand extends Model
{
    protected $casts = [
        'video_urls' =>'json',
    ];

    public function getNameAttribute()
    {
        $postfix = '_'. app()->getLocale();

        return data_get($this, 'stand_name'.$postfix);
    }
}
