<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;

class Writer extends Model
{
    use HasFactory;
    use Notifiable;
    use HasProfilePhoto;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password'
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

    public function grammarTestScore() {
        return $this->hasMany('App\Models\Grammar_test_score', 'email', 'email');
    }

    public function declinedBids() {
        return $this->hasMany('App\Models\Declined_bid', 'email', 'email');
    }

    public function unconfirmedBid() {
        return $this->hasMany('App\Models\Unconfirmed_bid', 'email', 'email');
    }

    public function fundWithdrawalRequest() {
        return $this->hasMany('App\Models\FundWithdrawalRequest', 'email', 'email');
    }
}
