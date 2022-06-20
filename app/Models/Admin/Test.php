<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Test extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name','duration', 'batch_id','mark','negativemark', 'status' ,'type', 'slug','order'
    ];

    public function batch()
    {
        return $this->belongsTo('App\Models\Admin\Batch');
    }

    public function series()
    {
        return $this->belongsTo('App\Models\Admin\Series');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function questions()
    {
       return $this->hasMany('App\Models\Admin\AddQuestion','test_id','id');
    }

    public function getTestReports()
    {
       return $this->hasMany('App\Models\TestReport','test_id','id')->where('user_id',Auth::user()->id);
    }

}
