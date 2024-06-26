<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'location',
        'job_title',
        'salary',
        'schedule',
        'description',
        'observations',
        'phone',
        'email'
    ];
}
