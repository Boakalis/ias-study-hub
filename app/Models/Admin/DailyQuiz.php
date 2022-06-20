<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyQuiz extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function date()
    {
        return $this->belongsTo('App\Models\Admin\QuizDate');

    }

    public function questions()
    {
       return $this->hasMany('App\Models\Admin\AddQuizQuestion','test_id','id');
    }


}
