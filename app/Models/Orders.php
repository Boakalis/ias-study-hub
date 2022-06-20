<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'order_id', 'user_id', 'amount', 'date', 'status', 'batch_id', 'type_id', 'payment_type', 'course_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Admin\CourseType', 'course_id');
    }

    public function batch()
    {
        return $this->belongsTo('App\Models\Admin\Batch', 'batch_id');
    }

    public function series()
    {
        return $this->belongsTo('App\Models\Admin\Series');
    }

    public function qbbatch()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankSubject', 'batch_id');
    }

    public function pyqbatch()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearSubject', 'batch_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
