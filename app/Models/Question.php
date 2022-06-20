<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Subject;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'subject_id','question' , 'option_1' , 'option_2' , 'option_3' , 'option_4', 'option_5' ,'option_6' ,'answers' , 'level' , 'status' ,'explanation' ,'hint',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Admin\Subject');

    }

    public function AddQuestion()
    {
        return $this->hasMany('App\Models\Admin\AddQuestion');

    }

}
