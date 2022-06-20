<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function getState()
    {
       return $this->hasOne('App\Models\State','id','state');
    }

    public function getCountry()
    {
       return $this->hasOne('App\Models\Country','id','country');
    }

}
