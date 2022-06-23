<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'price',
        'description',
    ];
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'lesson_id');
    }
}
