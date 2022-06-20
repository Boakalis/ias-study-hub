<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddQuizQuestion extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $guarded = [] ;
    public function question()
    {
        return $this->belongsTo('App\Models\Question');

    }

}
