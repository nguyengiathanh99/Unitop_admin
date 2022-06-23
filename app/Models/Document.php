<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';

    protected $fillable = [
        'name',
        'title',
        'lesson_id',
        'image',
        'file_path',
    ];
    use HasFactory;

    public function lessons()
    {
        return $this->belongsTo(Lesson::class);
    }
}
