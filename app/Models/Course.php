<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'description',
        'annual_price',
        'monthly_price',
        'topics',
        'tutor_id'
    ];

    protected $casts = [
        'annual_price' => 'decimal:2',
        'monthly_price' => 'decimal:2'
    ];

}
