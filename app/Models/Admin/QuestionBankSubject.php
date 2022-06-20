<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionBankSubject extends Model
{
    use HasFactory;

    use SoftDeletes;

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    protected $fillable = ['subject','status','slug','price','image','usercount','categorycount'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Admin\QuestionBankCategory');
    }


}
