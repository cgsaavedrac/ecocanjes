<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPasswordNotification;
use App\Balance;
use App\RecyclingRecord;
use App\Exchange;
use App\exchange_grantees;
use App\Region;
use App\City;
use App\Sale;

class User extends Authenticatable
{
    use Notifiable;

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

    public function balances(){
        return $this->hasMany(Balance::class);
    }

    public function recycling_records(){
        return $this->hasMany(RecyclingRecord::class);
    }

    public function exchanges(){
        return $this->hasMany(Exchange::class);
    }

    public function exchange_grantees(){
        return $this->hasMany(exchange_grantees::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }


    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function scopeSearch($query, $name){
        return $query->where('name', 'LIKE', "%$name%")->orWhere('email', 'LIKE', "%$name%")->orWhere('created_at', 'LIKE', "%$name%");
    }
}
