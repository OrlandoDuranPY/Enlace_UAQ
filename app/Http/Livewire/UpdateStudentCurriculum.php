<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Curriculum;
use App\Models\StudyProgram;
use App\Models\AcademicProgram;
use Illuminate\Support\Facades\Auth;

class UpdateStudentCurriculum extends Component
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
    public $curriculum_id;

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


    public function mount(Curriculum $curriculum)
    {
        // Montar campos para agregar inputs
        $this->addInput('academic_achievements');
        $this->addInput('experience');
        $this->addInput('projects');

        // Montar datos del curriculum en el formulario
        $this->curriculum_id = $curriculum->id;
        $this->name = $curriculum->name;
        $this->last_name = $curriculum->last_name;
        $this->email = $curriculum->email;
        $this->phone = $curriculum->phone;
        $this->about_me = $curriculum->about_me;
        $this->study_programs_id = $curriculum->study_programs_id;
        $this->semester = $curriculum->semester;
        $this->academic_achievements = $curriculum->academic_achievements;
        $this->toArray('academic_achievements');
        $this->academic_programs_id = $curriculum->academic_programs_id;
        $this->experience = $curriculum->experience;
        $this->toArray('experience');
        $this->projects = $curriculum->projects;
        $this->toArray('projects');
        $this->references = $curriculum->references;
        $this->toArray('references');
    }


    /* ========================================
    Convertir JSON a arreglo
    ========================================= */
    public function toArray($property)
    {
        // Verificar y convertir el JSON en un array
        if (is_string($this->$property)) {
            $decodedProperty = json_decode($this->$property, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $this->$property = $decodedProperty;
            } else {
                // Manejar el caso en el que el JSON no sea válido
                $this->$property = []; // O cualquier otro valor predeterminado
            }
        } else {
            $this->$property = (array) $this->$property;
        }
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

    /* ========================================
    EDITAR EL CURRICULUM
    ========================================= */
    public function updateCurriculum()
    {
        //Asignar el tipo de usuario (estudiante: 1/egresado: 2)
        if ($this->semester == 10) {
            $this->type = 2;
        } else {
            $this->type = 1;
        }

        // Validar los datos
        $data = $this->validate();

        // Encontrar el curriculum que se va a editar
        $curriculum = Curriculum::find($this->curriculum_id);

        // Asignar los valores
        $curriculum->name = $data['name'];
        $curriculum->last_name = $data['last_name'];
        $curriculum->email = $data['email'];
        $curriculum->phone = $data['phone'];
        $curriculum->about_me = $data['about_me'];

        $curriculum->study_programs_id = $data['study_programs_id'];
        $curriculum->semester = $data['semester'];
        $curriculum->academic_achievements = json_encode($data['academic_achievements']);
        $curriculum->academic_programs_id = $data['academic_programs_id'];

        $curriculum->experience = json_encode($data['experience']);
        $curriculum->projects = json_encode($data['projects']);

        $curriculum->references = json_encode($data['references']);

        // Guardar el curriculum
        $curriculum->save();

        // ID de la persona autenticada
        $user_id = Auth::id();
        // ID del curriculum
        $curriculum_id = $this->curriculum_id;

        // Crear una nueva accion en la tabla de Actividades
        Activity::create([
            'name' => 'Actualizó curriculum de estudiante',
            'users_id' => $user_id,
            'curricula_id' => $curriculum_id
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('update_success', '¡Curriculum actualizado exitosamente!');

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
        $this->mount(Curriculum::find($this->curriculum_id));
    }

    public function render()
    {
        $study_programs = StudyProgram::all();
        $academic_programs = AcademicProgram::all();
        return view('livewire.update-student-curriculum', [
            'study_programs' => $study_programs,
            'academic_programs' => $academic_programs
        ]);
    }
}
