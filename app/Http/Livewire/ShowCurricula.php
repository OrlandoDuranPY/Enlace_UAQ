<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Activity;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Auth;

class ShowCurricula extends Component
{
    public $selectedCurriculum;
    public $selectedCard;
    public $term;
    public $user;
    protected $listeners = ['deleteCurriculum', 'filterTerms' => 'filterCurricula'];
    // Propiedades del curriculum
    public $curriculum_id;

    /* ========================================
    Asignar valores del filtro de busqueda a
    propiedades de este componente
    ========================================= */
    public function filterCurricula($term, $user)
    {
        $this->term = $term;
        $this->user = $user;
    }


    /* ========================================
    Preview de curriculum seleccionado
    ========================================= */
    public function showCurriculum($id)
    {
        $this->selectedCurriculum = Curriculum::find($id);
        $this->selectedCard = $id;
    }

    /* ========================================
    Borrar un curriculum (Se ejecuta desde el JS)
    ========================================= */
    public function deleteCurriculum(Curriculum $curriculum)
    {
        $curriculum->delete();
        $this->selectedCurriculum = '';

        // ID de la persona autenticada
        $user_id = Auth::id();

        // Crear una nueva accion en la tabla de Actividades
        Activity::create([
            'name' => 'Borró el curriculum de: '. $curriculum->name . ' ' . $curriculum->last_name,
            'users_id' => $user_id,
        ]);
    }

    /* ========================================
    Cerrar preview del curriculum en dispositivos
    moviles
    ========================================= */
    public function closePreview()
    {
        $this->reset(['selectedCurriculum', 'selectedCard']);
    }

    public function render()
    {
        /* ========================================
        Buscar cuando se usan los dos filtros de
        busqueda: $term y $user
        ========================================= */
        $curricula = Curriculum::when($this->term && $this->user, function ($query) {
            $query->where(function ($query) {
                $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(about_me) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(semester) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(academic_achievements) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(study_level) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(experience) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(projects) LIKE ?', ['%' . strtolower($this->term) . '%'])
                    ->orWhereRaw('LOWER(degree) LIKE ?', ['%' . strtolower($this->term) . '%']);
            })
                ->where('type', $this->user)
                ->orWhereHas('academicProgram', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->term . '%');
                })
                ->orWhereHas('studyProgram', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->term . '%');
                });
        })

            /* ========================================
        Buscar cuando se usa solo el filtro de
        busqueda: $term
        ========================================= */
            ->when($this->term && !$this->user, function ($query) {
                $query->where(function ($query) {
                    $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(about_me) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        //   ->orWhereRaw('studyProgram_id', 'LIKE', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(semester) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(academic_achievements) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        //   ->orWhereRaw('academicProgram_id', 'LIKE', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(study_level) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(experience) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(projects) LIKE ?', ['%' . strtolower($this->term) . '%'])
                        ->orWhereRaw('LOWER(degree) LIKE ?', ['%' . strtolower($this->term) . '%']);
                })
                    ->orWhereHas('academicProgram', function ($query) {
                        $query->where('name', 'LIKE', '%' . $this->term . '%');
                    })
                    ->orWhereHas('studyProgram', function ($query) {
                        $query->where('name', 'LIKE', '%' . $this->term . '%');
                    });
            })
            /* ========================================
        Buscar cuando se usa solo el filtro de
        busqueda: $user
        ========================================= */
            ->when(!$this->term && $this->user, function ($query) {
                $query->where('type', $this->user);
            })
            ->latest()->get();

        return view('livewire.show-curricula', [
            'curricula' => $curricula
        ]);
    }
}
