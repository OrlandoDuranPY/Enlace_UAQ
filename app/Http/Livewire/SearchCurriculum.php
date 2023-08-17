<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Curriculum;

class SearchCurriculum extends Component
{
    public $term;
    public $user;

    public function readFilterTerms(){
        $this->emit('filterTerms', $this->term, $this->user);
    }

    public function render()
    {
        $curricula = Curriculum::all();
        return view('livewire.search-curriculum', [
            'curricula' =>  $curricula
        ]);
    }
}
