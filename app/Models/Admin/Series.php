<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Series extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = ['name' ,'description' , 'image', 'slug','status','order'];

    public function batch()
    {
        return $this->hasMany('App\Models\Admin\Batch');
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
