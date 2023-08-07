<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curriculum;
use App\Models\StudyProgram;
use App\Models\AcademicProgram;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class CreateStudentCurriculum extends Component
{
    /* ========================================
    Atributos
    ========================================= */
    // Contadores
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

    // Datos Academicos
    public $study_programs_id;
    public $semester;
    public $academic_achievements = [];
    public $academic_programs_id;

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

    public function mount()
    {
        $this->addInput('academic_achievements');
        $this->addInput('experience');
        $this->addInput('projects');
    }

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
        // Datos academicos
        'study_programs_id' => ['required', 'numeric', 'between:1,16'],
        'semester' => ['required', 'numeric', 'between:1,10'],
        'academic_achievements.0' => ['nullable', 'string'],
        'academic_achievements.*' => ['nullable', 'string'],
        'academic_programs_id' => ['required', 'numeric', 'between:1,2'],
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


    /* ========================================
    Crear Curriculum y subirlo a la base de datos
    ========================================= */
    public function createCurriculum()
    {
        // Asignar el tipo de usuario (estudiante/egresado)
        if ($this->semester === 10) {
            $this->type = 2;
        } else {
            $this->type = 1;
        }

        // Validacion de datos
        $data = $this->validate();

        // Guardar el curriculum en la base de datos
        $curriculum = Curriculum::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'about_me' => $data['about_me'],
            'study_programs_id' => $data['study_programs_id'],
            'semester' => $data['semester'],
            'academic_achievements' => json_encode($data['academic_achievements']),
            'academic_programs_id' => $data['academic_programs_id'],
            'experience' => json_encode($data['experience']),
            'projects' => json_encode($data['projects']),
            'references' => json_encode($data['references']),
            'type' => $data['type'],
        ]);

        // ID de la persona autenticada
        $user_id = Auth::id();
        // ID del curriculum
        $curriculum_id = $curriculum->id;

        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Agregó curriculum estudiante',
            'users_id' => $user_id,
            'curricula_id' => $curriculum_id
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('curriculum_success', '¡Curriculum creado exitosamente!');

        // Resetear el formulario
        $this->reset([
            'achievementsCounter',
            'experienceCounter',
            'projectsCounter',
            'referenceCounter',
            'name',
            'last_name',
            'email',
            'phone',
            'about_me',
            'study_programs_id',
            'semester',
            'academic_achievements',
            'academic_programs_id',
            'experience',
            'projects',
            'references',
            'type',
        ]);
        // Resetear las propiedaes faltantes
        $this->mount();
    }

    /* ========================================
    Funcion para agregar inputs nuevos
    ========================================= */
    public function addInput($value)
    {
        // Agregar Logro Academico
        if ($value === 'academic_achievements') {
            if (count($this->academic_achievements) < 5) {
                $this->academic_achievements[] = '';
                $this->achievementsCounter++;
            }
        }
        // Agregar Experiencia
        elseif ($value === 'experience') {
            if (count($this->experience) < 5) {
                $this->experience[] = '';
                $this->experienceCounter++;
            }
        }
        // Agregar Proyecto
        elseif ($value === 'projects') {
            if (count($this->projects) < 5) {
                $this->projects[] = '';
                $this->projectsCounter++;
            }
        }
        // Agregar Referencia
        elseif ($value === 'references') {
            if (count($this->references) < 3) {
                $this->references[] = [
                    'name' => '',
                    'email' => '',
                    'phone' => '',
                ];
            }
        }
    }

    /* ========================================
    Funcion para remover inputs agregados
    ========================================= */
    public function removeInput($value, $key)
    {
        // Remover Logro Academico
        if ($value === 'academic_achievements') {
            if (count($this->academic_achievements) > 1) {
                unset($this->academic_achievements[$key]);
                $this->academic_achievements = array_values($this->academic_achievements);
                $this->achievementsCounter--;
            }
        }
        // Remover Experiencia
        elseif ($value === 'experience') {
            if (count($this->experience) > 1) {
                unset($this->experience[$key]);
                $this->experience = array_values($this->experience);
                $this->experienceCounter--;
            }
        }
        // Remover Proyecto
        elseif ($value === 'projects') {
            if (count($this->projects) > 1) {
                unset($this->projects[$key]);
                $this->projects = array_values($this->projects);
                $this->projectsCounter--;
            }
        }
        // Remover Referencia
        elseif ($value === 'references') {
            if (count($this->references) > 1) {
                unset($this->references[$key]);
            }
        }
    }


    public function render()
    {

        $study_programs = StudyProgram::all();
        $academic_programs = AcademicProgram::all();
        return view('livewire.create-student-curriculum', [
            'study_programs' => $study_programs,
            'academic_programs' => $academic_programs,
        ]);
    }
}
