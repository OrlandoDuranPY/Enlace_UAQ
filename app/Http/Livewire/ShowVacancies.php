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
    protected $listeners = ['deleteVacancy', 'filterTerms' => 'filterVacancy'];
    // Propiedades de la vacante
    public $vacancy_id;

        /* ========================================
    Montar el $term que se recibe por URL para
    que se aplique en automatico el filtro de
    busqueda
    ========================================= */
    public function mount(){
        $this->term = request('term');
    }

    /* ========================================
    Asignar valores del filtro de busqueda a
    propiedades de este componente
    ========================================= */
    public function filterVacancy($term)
    {
        $this->term = $term;
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
            'name' => 'Borró la vacante de: '. $vacancy->company . ', ' . $vacancy->job_title,
            'users_id' => $user_id,
        ]);
    }


    /* ========================================
    Cerrar preview del curriculum en dispositivos
    moviles
    ========================================= */
    public function closePreview()
    {
        $this->reset(['selectedVacancy', 'selectedCard']);
    }

    public function render()
    {
        /* ========================================
        Buscar vacantes por termino de busqueda
        ========================================= */
        $vacancies = Vacancy::when($this->term, function ($query){
            $query->where(function ($query){
                $query->whereRaw('LOWER(company) LIKE ?', ['%' . strtolower($this->term) . '%'])
                ->orWhereRaw('LOWER(location) LIKE ?', ['%' . strtolower($this->term) . '%'])
                ->orWhereRaw('LOWER(job_title) LIKE ?', ['%' . strtolower($this->term) . '%'])
                ->orWhereRaw('LOWER(salary) LIKE ?', ['%' . strtolower($this->term) . '%'])
                ->orWhereRaw('LOWER(description) LIKE ?', ['%' . strtolower($this->term) . '%'])
                ->orWhereRaw('LOWER(observations) LIKE ?', ['%' . strtolower($this->term) . '%']);
            });
        })->latest()->get();

        // $vacancies = Vacancy::all();
        return view('livewire.show-vacancies', [
            'vacancies' => $vacancies
        ]);
    }
}
