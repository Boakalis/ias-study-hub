<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddQuestion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [ 'question_id' ,'test_id' ];


    public function question()
    {
        return $this->belongsTo('App\Models\Question');

    }
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
