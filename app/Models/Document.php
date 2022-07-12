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

    public function scopeSearch($query, $data)
    {
        if (isset($data['keyword'])) {
            $query->where('name', 'LIKE', '%' . $data['keyword'] . '%')
                ->orWhere('lesson_id', 'LIKE', '%' . $data['keyword'] . '%');
        }
        return $query;
    }
}
