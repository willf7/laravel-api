<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'topic',
        'description',
        'difficulty',
        'course_id',
        'due_date',
        'file',
        'status',
        'subject_id'
    ];

    protected $casts = [
        'due_date' => 'date'
    ];
}
