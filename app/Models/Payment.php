<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'payment_id','amount','date','status','type_id','response','payment_type','order_id','user_id','batch_id','course_id'
    ];

    public function type()
    {
        return $this->belongsTo('App\Models\Admin\CourseType','course_id');

    }



}
