<?php

namespace App\Http\Controllers;

use App\Models\Curriculum;
use Illuminate\Http\Request;

class CurriculaController extends Controller
{
    /* ========================================
    Mostrar dashboard de curriculums
    ========================================= */
    public function index(){
        return view('curricula.index');
    }

    /* ========================================
    Crear curriculum de Estudiante
    ========================================= */
    public function createStudentCurriculum(){
        return view('curricula.student.create');
    }

    /* ========================================
    Editar curriculum de Estudiante
    ========================================= */
    public function updateStudentCurriculum(Curriculum $curriculum){
        return view('curricula.student.update', [
            'curriculum' => $curriculum
        ]);
    }

    /* ========================================
    Crear curriculum de Docente
    ========================================= */
    public function createTeacherCurriculum(){
        return view('curricula.teacher.create');
    }

    /* ========================================
    Editar curriculum de Docente
    ========================================= */
    public function updateTeacherCurriculum(Curriculum $curriculum){
        return view('curricula.teacher.update', [
            'curriculum' => $curriculum
        ]);
    }
}
