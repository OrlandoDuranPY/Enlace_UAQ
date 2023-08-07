<?php

namespace App\Http\Livewire;

use App\Models\Curriculum;
use Livewire\Component;

class ShowCurricula extends Component
{
    public $selectedCurriculum;
    public $selectedCard;
    public $term;
    public $user;
    protected $listeners = ['deleteCurriculum', 'terminosBusqueda' => 'buscar'];


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
    public function deleteCurriculum(Curriculum $curriculum){
        $curriculum->delete();
        $this->selectedCurriculum = '';
    }

    /* ========================================
    Cerrar preview del curriculum en dispositivos
    moviles
    ========================================= */
    public function closeCurriculum()
    {
        $this->reset(['selectedCurriculum', 'selectedCard']);
    }

    public function render()
    {
        $curricula = Curriculum::all();
        return view('livewire.show-curricula', [
            'curricula' => $curricula
        ]);
    }
}
