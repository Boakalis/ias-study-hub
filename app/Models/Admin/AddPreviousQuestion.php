<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddPreviousQuestion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [ 'question_id' ,'test_id' ];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');

    }

}
