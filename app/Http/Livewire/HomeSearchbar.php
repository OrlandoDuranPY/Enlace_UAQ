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

    public function search(){
        $data = $this->validate();
        dd($this->term . $this->docType);
    }

    public function render()
    {
        return view('livewire.home-searchbar');
    }
}
