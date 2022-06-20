<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = [ 'name', 'status', 'created_by'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function question()
    {
        return $this->hasMany('App\Models\Question');

    }

}


