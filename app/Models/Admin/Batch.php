<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Batch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =[
       'schedule', 'name','series_id','price','slug','discount','description','status','start_date','isClosed'
    ];

    public function series()
    {
        return $this->belongsTo('App\Models\Admin\Series');
    }

    public function test()
    {
        return $this->hasMany('App\Models\Admin\Test');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


}
