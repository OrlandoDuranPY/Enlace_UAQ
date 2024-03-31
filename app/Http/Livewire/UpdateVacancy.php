<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class UpdateVacancy extends Component
{
    /* ========================================
    Atributos
    ========================================= */
    public $company;
    public $location;
    public $job_title;
    public $salary;
    public $description;
    public $observations;

    // Propiedades de la vacante
    public $vacancy_id;

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
        'description' => ['required', 'min:10', 'max:1500'],
        'observations' => ['nullable', 'min:10', 'max:500'],
    ];


    public function mount(Vacancy $vacancy)
    {
        // Montar los datos de la vacante
        $this->vacancy_id = $vacancy->id;
        $this->company = $vacancy->company;
        $this->location = $vacancy->location;
        $this->job_title = $vacancy->job_title;
        $this->salary = $vacancy->salary;
        $this->description = $vacancy->description;
        $this->observations = $vacancy->observations;
    }

    /* ========================================
    Actualizar la vacante
    ========================================= */
    public function updateVacancy()
    {
        $data = $this->validate();
        $vacancy = Vacancy::find($this->vacancy_id);


        // Asignar los valores
        $vacancy->company = $data['company'];
        $vacancy->location = $data['location'];
        $vacancy->job_title = $data['job_title'];
        $vacancy->salary = $data['salary'];
        $vacancy->description = $data['description'];
        $vacancy->observations = $data['observations'];


        $vacancy->save();

        // ID de la persona autenticada
        $user_id = Auth::id();
        // ID de la vacante
        // $vacancy_id = $vacancy->id;

        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Actualizó la vacante: ' . $data['company'] . ', ' . $data['job_title'],
            'users_id' => $user_id,
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('update_success', '¡Vacante actualizada exitosamente!');
    }

    public function render()
    {
        return view('livewire.update-vacancy');
    }
}
