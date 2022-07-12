<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'job',
        'image',
        'phone',
        'role',
        'date_of_birth',
        'description',
        'about',
        'status',
        'address',
        'google_id',
    ];

    public function scopeSearch($query, $data) {
        if (isset($data['keyword'])) {
            $query->where('name','LIKE', '%' .$data['keyword']. '%');
        }
        return $query;
    }
}

