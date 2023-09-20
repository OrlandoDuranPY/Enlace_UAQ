<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Activity;
use App\Models\Curriculum;

class AdminDashboard extends Component
{
    /* ========================================
    Propiedades
    ========================================= */
    public $search;
    public function render()
    {
        $curricula = Curriculum::all();
        $studentCurricula = Curriculum::where('type', '<>', 3)->get();
        $teacherCurricula = Curriculum::where('type', '==', 0)->get();
        $vacancies = Vacancy::all();
        $users = User::all();
        // $activities = Activity::paginate(10);
        $activities = Activity::where(function ($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', function ($userQuery) {
                    $userQuery->where('name', 'like', '%' . $this->search . '%');
                });
        })->get();

        return view('livewire.admin-dashboard', [
            'curricula' => $curricula,
            'studentCurricula' => $studentCurricula,
            'teacherCurricula' => $teacherCurricula,
            'vacancies' => $vacancies,
            'users' => $users,
            'activities' => $activities
        ]);
    }
}
