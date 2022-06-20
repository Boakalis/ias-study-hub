<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddBankQuestion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [ 'question_id' ,'bank_id' ];

    public function bank()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankQuestion');

    }

    public function question()
    {
        return $this->belongsTo('App\Models\Question');

    }


}
