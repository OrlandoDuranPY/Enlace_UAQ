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
    public $schedule;
    public $description;
    public $observations;
    public $phone;
    public $email;

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
        'schedule' => ['required', 'string', 'max:50'],
        'description' => ['required', 'min:10', 'max:1500'],
        'observations' => ['nullable', 'min:10', 'max:500'],
        'phone' => ['required', 'numeric'],
        'email' => ['required', 'email', 'max:255'],
    ];

    /* ========================================
    Crear Vacante y subirlo a la base de datos
    ========================================= */
    public function createVacancy(){
        // Validacion de datos
        $data = $this->validate();

        // Guardar la vacante en la base de datos
        Vacancy::create([
            'company' => $data['company'],
            'location' => $data['location'],
            'job_title' => $data['job_title'],
            'salary' => $data['salary'],
            'schedule' => $data['schedule'],
            'description' => $data['description'],
            'observations' => $data['observations'],
            'phone' => $data['phone'],
            'email' => $data['email']
        ]);

        // ID de la persona autenticada
        $user_id = Auth::id();

        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Agregó la vacante: ' . $data['company'] . ', ' . $data['job_title'],
            'users_id' => $user_id,
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('create_success', '¡Vacante creada exitosamente!');

        // Resetear el formulario
        $this->reset([
            'company',
            'location',
            'job_title',
            'salary',
            'schedule',
            'description',
            'observations',
            'phone',
            'email'
        ]);

    }

    public function render()
    {
        return view('livewire.create-vacancy');
    }
}
