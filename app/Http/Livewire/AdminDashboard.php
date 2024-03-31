<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Activity;
use App\Models\Company;
use App\Models\Curriculum;
use Livewire\WithPagination;

class AdminDashboard extends Component
{
    use WithPagination; // No recargar la pagina al usar la paginacion
    /* ========================================
    Propiedades
    ========================================= */
    public $search;
    public $showRows = 10; // Mostrar n numero de filas

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $curricula = Curriculum::all();
        $vacancies = Vacancy::all();
        $users = User::all();
        $companies = Company::all();
        $activities = Activity::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function ($userQuery) {
                    $userQuery->where('name', 'like', '%' . $this->search . '%');
                });
        })->latest()->paginate($this->showRows);

        return view('livewire.admin-dashboard', [
            'curricula' => $curricula,
            'vacancies' => $vacancies,
            'users' => $users,
            'activities' => $activities,
            'companies' => $companies
        ]);
    }
}
