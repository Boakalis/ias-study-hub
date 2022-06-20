<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreviousYearTest extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'name','duration','mark', 'subject_id', 'status' ,'year','type', 'slug' ,'category_id','order'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearSubject');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearCategory');
    }

    public function questions()
    {
       return $this->hasMany('App\Models\Admin\AddPreviousQuestion','test_id','id');
    }

    public function getTestReports()
    {
       return $this->hasMany('App\Models\TestReport','test_id','id');
    }
}
