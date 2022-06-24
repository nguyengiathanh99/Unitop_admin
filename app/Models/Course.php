<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
