<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /* ========================================
    Mostrar dashboard de vccantes
    ========================================= */
    public function index(){
        return view('vacancies.index');
    }

    /* ========================================
    Crear vacante
    ========================================= */
    public function createVacancy(){
        return view('vacancies.create');
    }
}
