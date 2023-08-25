<?php

namespace App\Http\Livewire;

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
    
    public function render()
    {
        return view('livewire.create-vacancy');
    }
}
