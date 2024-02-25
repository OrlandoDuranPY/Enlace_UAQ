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
    protected $listeners = ['deleteCurriculum', 'statusCurriculum', 'filterTerms' => 'filterCurricula'];
    // Propiedades del curriculum
    public $curriculum_id;

    /* ========================================
    Montar el $term que se recibe por URL para
    que se aplique en automatico el filtro de
    busqueda
    ========================================= */
    public function mount()
    {
        $this->term = request('term');
    }

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
            'name' => 'Borró el curriculum de: ' . $curriculum->name . ' ' . $curriculum->last_name,
            'users_id' => $user_id,
        ]);
    }

    /* ========================================
    Cambiar el estado del curriculum
    ========================================= */
    public function statusCurriculum($id_curriculum)
    {
        // Actualizar el estado del curriculum
        $curriculum = Curriculum::findOrFail($id_curriculum);
        $curriculum->active = !$curriculum->active;
        $curriculum->save();

        // Agregar la actividad al registro de actividades
        // ID de la persona autenticada
        $user_id = Auth::id();

        // Crear una nueva accion en la tabla de Actividades
        Activity::create([
            'name' => 'Cambió el estado del curriculum de: ' . $curriculum->name . ' ' . $curriculum->last_name,
            'users_id' => $user_id,
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('success_message', '¡El estado del curriculum cambió exitosamente!');
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
        // Filtro para MySQL
        // $curricula = Curriculum::when($this->term && $this->user, function ($query) {
        //     $query->where(function ($query) {
        //         $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(about_me) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(semester) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(academic_achievements) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(study_level) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(experience) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(projects) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(degree) LIKE ?', ['%' . strtolower($this->term) . '%']);
        //     })
        //         ->where('type', $this->user)
        //         ->orWhereHas('academicProgram', function ($query) {
        //             $query->where('name', 'LIKE', '%' . $this->term . '%');
        //         })
        //         ->orWhereHas('studyProgram', function ($query) {
        //             $query->where('name', 'LIKE', '%' . $this->term . '%');
        //         });
        // })
        $curricula = Curriculum::when($this->term && $this->user, function ($query) {
            $term = '%' . strtolower($this->term) . '%';
            $query->where(function ($query) use ($term) {
                $query->whereRaw('LOWER(name) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(last_name) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(about_me) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(semester) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(academic_achievements) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(study_level) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(experience) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(projects) ILIKE ?', [$term])
                    ->orWhereRaw('LOWER(degree) ILIKE ?', [$term]);
            })
            ->where('type', $this->user)
            ->orWhere(function ($query) use ($term) {
                $query->whereHas('academicProgram', function ($query) use ($term) {
                    $query->where('name', 'ILIKE', $term);
                })
                ->orWhereHas('studyProgram', function ($query) use ($term) {
                    $query->where('name', 'ILIKE', $term);
                });
            });
        })

            /* ========================================
        Buscar cuando se usa solo el filtro de
        busqueda: $term
        ========================================= */
        // Buscador para MySQL
        // ->when($this->term && !$this->user, function ($query) {
        //     $query->where(function ($query) {
        //         $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(last_name) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(about_me) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             //   ->orWhereRaw('studyProgram_id', 'LIKE', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(semester) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(academic_achievements) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             //   ->orWhereRaw('academicProgram_id', 'LIKE', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(study_level) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(experience) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(projects) LIKE ?', ['%' . strtolower($this->term) . '%'])
        //             ->orWhereRaw('LOWER(degree) LIKE ?', ['%' . strtolower($this->term) . '%']);
        //     })
        //         ->orWhereHas('academicProgram', function ($query) {
        //             $query->where('name', 'LIKE', '%' . $this->term . '%');
        //         })
        //         ->orWhereHas('studyProgram', function ($query) {
        //             $query->where('name', 'LIKE', '%' . $this->term . '%');
        //         });
        // })

        //Buscador para Postgresql
        ->when($this->term && !$this->user, function ($query) {
            $query->where(function ($query) {
                $query->whereRaw('name ILIKE ?', ['%' . $this->term . '%'])
                    ->orWhereRaw('last_name ILIKE ?', ['%' . $this->term . '%'])
                    ->orWhereRaw('about_me ILIKE ?', ['%' . $this->term . '%'])
                    //   ->orWhereRaw('studyProgram_id', 'LIKE', ['%' . $this->term) . '%'])
                    ->orWhereRaw('semester ILIKE ?', ['%' . $this->term . '%'])
                    ->orWhereRaw('academic_achievements ILIKE ?', ['%' . $this->term . '%'])
                    //   ->orWhereRaw('academicProgram_id', 'LIKE', ['%' . $this->term) . '%'])
                    ->orWhereRaw('study_level ILIKE ?', ['%' . $this->term . '%'])
                    ->orWhereRaw('experience ILIKE ?', ['%' . $this->term . '%'])
                    ->orWhereRaw('projects ILIKE ?', ['%' . $this->term . '%'])
                    ->orWhereRaw('degree ILIKE ?', ['%' . $this->term . '%']);
            })
                ->orWhereHas('academicProgram', function ($query) {
                    $query->where('name ILIKE ?', ['%' . $this->term . '%']);
                })
                ->orWhereHas('studyProgram', function ($query) {
                    $query->where('name', 'ILIKE ?', ['%' . $this->term . '%']);
                });
        })

            /* ========================================
        Buscar cuando se usa solo el filtro de
        busqueda: $user
        ========================================= */
            ->when(!$this->term && $this->user, function ($query) {
                // Buscar curriculums inactivos
                if($this->user != 4){
                    // dd('Type '. $this->user);
                    $query->where('type', $this->user);
                }
                else{
                    // dd('Inactivos');
                    $query->where('active', 0);
                }

            })
            ->latest()->get();

        return view('livewire.show-curricula', [
            'curricula' => $curricula
        ]);
    }
}
