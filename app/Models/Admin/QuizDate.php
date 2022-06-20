<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizDate extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['date', 'status'];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }


}
