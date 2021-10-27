<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $table = 'visitors';

    protected $fillable = [
        'first_name', 'last_name', 'middle_name', 'phone', 'email', 'company', 'password', 'event_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    // attributes 

    public function getFullnameAttribute(): string
    {
        $fullname = [
            data_get($this, 'last_name'),
            data_get($this, 'first_name'),
            data_get($this, 'middle_name')
        ];

        $implodedStr = implode(' ', $fullname);

        return trim($implodedStr);
    }
}
