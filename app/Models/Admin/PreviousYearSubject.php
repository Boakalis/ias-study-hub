<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreviousYearSubject extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name' ,'status' , 'slug','image','price','usercount','categorycount','isFree'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Admin\PreviousYearTest');
    }

}
