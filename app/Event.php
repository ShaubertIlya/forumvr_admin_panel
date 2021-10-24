<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    const TYPE_OPENED = 0;
    const TYPE_PAID = 1;
    const TYPE_CLOSED = 2;
    const TYPE_PLANED = 3;

    const TYPES = [
        self::TYPE_OPENED => 'Открытое',
        self::TYPE_PAID => 'Платное',
        self::TYPE_CLOSED => 'Закрытое',
        self::TYPE_PLANED => 'Планируется',
    ];

    public function stands()
    {
        return $this->hasMany(Stand::class, 'event_id');
    }
}
