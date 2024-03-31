<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HomeSearchbar extends Component
{

    /* ========================================
    Propiedades del componente
    ========================================= */
    public $term;
    public $docType;

    protected $rules = [
        'term' => ['required'],
        'docType' => ['required'],
    ];

    public function search()
    {
        $data = $this->validate();

        if ($this->docType == 'curricula') {
            // Agregar el término como parámetro de consulta en la URL
            return redirect()->route('curricula.index', ['term' => $this->term]);
        } elseif ($this->docType == 'vacancies') {
            // Agregar el término como parámetro de consulta en la URL
            return redirect()->route('vacancies.index', ['term' => $this->term]);
        }
    }



    public function render()
    {
        return view('livewire.home-searchbar');
    }
}
