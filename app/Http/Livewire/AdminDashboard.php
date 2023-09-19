<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Vacancy;
use Livewire\Component;
use App\Models\Activity;
use App\Models\Curriculum;

class AdminDashboard extends Component
{
    public function render()
    {
        $curricula = Curriculum::all();
        $studentCurricula = Curriculum::where('type', '<>', 3)->get();
        $teacherCurricula = Curriculum::where('type', '==', 0)->get();
        $vacancies = Vacancy::all();
        $users = User::all();
        $activities = Activity::paginate(1);

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
