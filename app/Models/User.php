<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

class User extends Authenticatable
{
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function order() {
        return $this->hasMany("App\Models\Order");
    }

    public function notifications()
    {
        return $this->hasMany("App\Models\Notification");
    }

    public function assignedOrder() {
        return $this->hasMany('App\Models\Assigned_order');
    }

    public function blockedWriter() {
        return $this->hasMany('App\Models\Blocked_writer');
    }

    public function favouriteWriter() {
        return $this->hasMany('App\Models\Favourite_writer');
    }

    public function payedOrder() {
        return $this->hasMany('App\Models\Payed_order');
    }

    public function review() {
        return $this->hasMany('App\Models\Review');
    }
}
