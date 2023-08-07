<?php

namespace App\Models;

use App\Models\StudyProgram;
use App\Models\AcademicProgram;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curriculum extends Model
{
    use HasFactory;
    protected $fillable = [
        // Propiedades compartidas
        'name',
        'last_name',
        'email',
        'phone',
        'about_me',
        'academic_achievements',
        'experience',
        'projects',
        'references',
        // Propiedades del estudiante
        'study_programs_id',
        'semester',
        'academic_programs_id',
        // Propiedades del docente
        'study_level',
        'degree',
        'type',
    ];

    public function academicProgram(){
        return $this->belongsTo(AcademicProgram::class, 'academic_programs_id');
    }

    public function studyProgram(){
        return $this->belongsTo(StudyProgram::class, 'study_programs_id');
    }
}
