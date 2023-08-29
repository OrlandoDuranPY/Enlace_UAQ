<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'users_id',
        'curricula_id',
        'vacancies_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function curriculum(){
        return $this->belongsTo(Curriculum::class);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }
}
