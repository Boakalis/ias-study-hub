<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'phone', 'facebookId', 'userId', 'googleId', 'email_verified_at','image','otp'
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

    public function getState()
    {
        return $this->hasOne('App\State', 'id', 'state');
    }

    public function getCountry()
    {
        return $this->hasOne('App\Country', 'id', 'country');
    }

    public function addNew($input)
    {
        $check = static::where('facebook_id', $input['facebook_id'])->first();


        if (is_null($check)) {
            return static::create($input);
        }


        return $check;
    }

    public function country()
    {
       return $this->belongsTo('App\Models\Country','country_id','id');
    }
    public function city()
    {
       return $this->belongsTo('App\Models\City','city_id','id');
    }
    public function state()
    {
       return $this->belongsTo('App\Models\State','state_id','id');
    }


    public static function checkSubscription($batch_id = '', $course_id = '')
    {
        return Orders::where([['user_id', Auth::user()->id], ['status', 1], ['batch_id', $batch_id], ['course_id', $course_id]])->exists();
    }

    public static function checkPremium($batch_id = '', $course_id = '')
    {
        return Orders::where([['user_id', Auth::user()->id], ['status', 1], ['batch_id', $batch_id], ['course_id', $course_id]])->exists();
    }
}
