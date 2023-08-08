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

    // Datos academicos
    public $study_level = [];
    public $degree;
    public $academic_achievements = [];

    // Experiencia
    public $experience = [];
    public $projects = [];

    // Referencias
    public $references = [
        [
            'name' => '',
            'email' => '',
            'phone' => '',
        ]
    ];

    // Tipo de usuario
    public $type;



    /* ========================================
    Validacion de datos
    ========================================= */
    protected $rules = [
        // Datos personales
        'name' => ['required', 'string', 'min:3', 'max:100'],
        'last_name' => ['required', 'string', 'min:3', 'max:100'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'numeric'],
        'about_me' => ['required', 'string', 'max:500'],
        // Datos Academico
        'study_level.0' => ['required', 'string'],
        'study_level.*' => ['required', 'string'],
        'degree' => ['required', 'string'],
        'academic_achievements.0' => ['nullable', 'string'],
        'academic_achievements.*' => ['nullable', 'string'],
        // Datos experiencia
        'experience.0' => ['nullable', 'string'],
        'experience.*' => ['nullable', 'string'],
        'projects.0' => ['nullable', 'string'],
        'projects.*' => ['nullable', 'string'],
        // Datos referencia
        'references.0.name' => ['required', 'string', 'min:3', 'max:255'],
        'references.*.name' => ['required', 'string', 'min:3', 'max:255'],
        'references.0.email' => ['required', 'email', 'max:255'],
        'references.*.email' => ['required', 'email', 'max:255'],
        'references.0.phone' => ['required', 'numeric'],
        'references.*.phone' => ['required', 'numeric'],
        // Tipo de usuario
        'type' => ['required', 'numeric', 'between:1,3']
    ];

    public function render()
    {
        return view('livewire.create-teacher-curriculum');
    }
}
