<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionBankQuestion extends Model
{
    use HasFactory;

    use SoftDeletes;


    protected $fillable = ['subject_id','category_id','status','slug','question_id' ,'type','name','duration','mark','negativemark' ,'order'];

    public function subject()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankSubject');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankCategory');
    }
    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function questions()
    {
       return $this->hasMany('App\Models\Admin\AddBankQuestion','bank_id','id');
    }
    public function batch()
    {
        return $this->belongsTo('App\Models\Admin\Batch');
    }


}
