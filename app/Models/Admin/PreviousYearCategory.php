<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreviousYearCategory extends Model
{
    use HasFactory;


    protected $fillable = ['subject_id','category','status','slug'];


    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


    public function subject()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearSubject');
    }


}
