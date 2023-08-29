<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateVacancy extends Component
{
    /* ========================================
    Atributos
    ========================================= */
    public $company;
    public $location;
    public $job_title;
    public $salary;
    public $description;

    /* ========================================
    Validacion de datos
    ========================================= */
    protected $rules = [
        // Datos de la empresa
        'company' => ['required', 'string', 'min:1', 'max:50'],
        'location' => ['required', 'string', 'min:5', 'max:100'],
        // Datos de la vacante
        'job_title' => ['required', 'string', 'min:5', 'max:100'],
        'salary' => ['nullable', 'string', 'max:50'],
        'description' => ['required', 'min:10', 'max:1500']
    ];

    /* ========================================
    Crear Vacante y subirlo a la base de datos
    ========================================= */
    public function createVacancy(){
        // Validacion de datos
        $data = $this->validate();

        // Guardar la vacante en la base de datos
        $vacancy = Vacancy::create([
            'company' => $data['company'],
            'location' => $data['location'],
            'job_title' => $data['job_title'],
            'salary' => $data['salary'],
            'description' => $data['description']
        ]);

        // ID de la persona autenticada
        $user_id = Auth::id();

        // ID de la vacante
        $vacancy_id = $vacancy->id;
        // dd($vacancy->id);

        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Agregó una vacante',
            'users_id' => $user_id,
            'vacancies_id' => $vacancy_id
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('vacancy_success', '¡Vacante creada exitosamente!');

        // Resetear el formulario
        $this->reset([
            'company',
            'location',
            'job_title',
            'salary',
            'description'
        ]);

    }

    public function render()
    {
        return view('livewire.create-vacancy');
    }
}
