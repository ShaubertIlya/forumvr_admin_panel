<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'forum_users';

    public $isFirstTime = true;

    public static $allowPasswordAutoHash = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        static::saving(function (self $model) {
            if (User::$allowPasswordAutoHash === true) {
                if (empty($model->password)) {
                    $model->password = $model->getOriginal('password');
                }
            }
        });

        static::saved(function (self $model) {
            if (User::$allowPasswordAutoHash === true) {
                User::$allowPasswordAutoHash = false;

                if ($model->password !== $model->getOriginal('password')) {
                    $model->password = Hash::make($model->password);
                    $model->save();
                }
            }
        });

        parent::boot();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function business_information()
    {
        return $this->belongsTo(BusinessInformation::class, 'business_information_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'user_events', 'user_id', 'available_event_id');
    }

    public function attached_events()
    {
        return $this->hasMany(AttachedUserEvent::class, 'user_id');
    }
}
