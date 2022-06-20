<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;


class Admin extends \Illuminate\Foundation\Auth\User
{
    use HasFactory;
    use Notifiable;
    protected $guard ='admin';
    protected $fillable = [
        'name' ,'email' ,'password',
    ];
    protected $hidden =['password','remember_token',];

}
