<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthday',
        'email',
        'mobile',
        'address',
        'course_title',
        'category',
        'status',         // 0: Inactive, 1: Active
    ];

    protected $casts = [
        'birthday' => 'date',
        'category' => 'array'
    ];
}
