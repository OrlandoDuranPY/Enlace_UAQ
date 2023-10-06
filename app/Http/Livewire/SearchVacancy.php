<?php

namespace App\Http\Livewire;

use App\Models\Vacancy;
use Livewire\Component;

class SearchVacancy extends Component
{
    public $term;

    public function readFilterTerms(){
        $this->emit('filterTerms', $this->term);
    }

    public function render()
    {
        $vacancies = Vacancy::all();
        return view('livewire.search-vacancy', [
            'vacancies' => $vacancies
        ]);
    }
}
