<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttachedUserEvent extends Model
{
    protected $table = 'attached_user_events';

    protected $fillable = [
        'user_id', 'event_id',  'stand_id', 'tariff_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
