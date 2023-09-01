<?php

namespace App\Http\Livewire;

use App\Models\Activity;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowVacancies extends Component
{
    /* ========================================
    Propiedades
    ========================================= */
    public $selectedVacancy;
    public $selectedCard;
    public $term;
    public $company;
    protected $listeners = ['deleteVacancy'];
    // Propiedades de la vacante
    public $vacancy_id;

    /* ========================================
    Asignar valores del filtro de busqueda a
    propiedades de este componente
    ========================================= */
    public function filterVacancy($term, $company)
    {
        $this->term = $term;
        $this->company = $company;
    }

    /* ========================================
    Preview de la vacante seleccionada
    ========================================= */
    public function showVacancy($id){
        $this->selectedVacancy = Vacancy::find($id);
        $this->selectedCard = $id;
    }

    /* ========================================
    Borrar una vacante (se ejecuta desde el JS)
    ========================================= */
    public function deleteVacancy(Vacancy $vacancy){
        $vacancy->delete();
        $this->selectedVacancy = '';

        // ID de la persona autenticada
        $user_id = Auth::id();

        // Crear una nueva accion en la tabla de actividades
        Activity::create([
            'name' => 'Borró una vacante',
            'users_id' => $user_id,
            'vacancies_id' => $vacancy->id
        ]);
    }

    /* ========================================
    Cerrar el preview de la vacante en
    dispositivos moviles
    ========================================= */
    public function closeVacancy(){
        $this->reset(['selectedVacancy', 'selectedCard']);
    }

    public function render()
    {
        $vacancies = Vacancy::all();
        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
