<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateTeacherCurriculum extends Component
{
    /* ========================================
    Atributos
    ========================================= */
    // Contadores
    public $studyLevelCounter = 1;
    public $achievementsCounter = 1;
    public $experienceCounter = 1;
    public $projectsCounter = 1;
    public $referenceCounter = 1;

    // Propiedades del Curriculum
    // Datos Personales
    public $name;
    public $last_name;
    public $email;
    public $phone;
    public $about_me;


    public function render()
    {
        return view('livewire.create-teacher-curriculum');
    }
}
