<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestReport extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = ['batch_id','test_id', 'date', 'type', 'user_id', 'correct', 'incorrect', 'unattempt', 'review', 'total_marks', 'positive_mark','negative_mark', 'marks_obtained', 'question_html' ,'course_id' ];

    public function batch()
    {
        return $this->belongsTo('App\Models\Admin\Batch');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Admin\Test');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Admin\CourseType','course_id');
    }

    public function qbtest()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankQuestion','test_id');
    }

    public function qbbatch()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankSubject','batch_id');
    }

    public function pyqtest()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearTest','test_id');
    }

    public function pyqbatch()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearSubject','batch_id');
    }



}
