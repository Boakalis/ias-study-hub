<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id','subject_id', 'course_name','course_discount','url', 'description','course_image'.'created_by',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
