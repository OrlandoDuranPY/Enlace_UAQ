<?php

use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\CurriculaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
// use App\View\Components\AdminPanelContent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/* ========================================
Rutas de curriculums
========================================= */
Route::get('/curriculums', [CurriculaController::class, 'index'])->name('curricula.index');
Route::get('/crear/curriculum-estudiante', [CurriculaController::class, 'createStudentCurriculum'])->name('curricula.student.create');
Route::get('/actualizar/curriculum-estudiante/{curriculum}', [CurriculaController::class, 'updateStudentCurriculum'])->name('curricula.student.update');
Route::get('/crear/curriculum-docente', [CurriculaController::class, 'createTeacherCurriculum'])->name('curricula.teacher.create');
Route::get('/actualizar/curriculum-docente/{curriculum}', [CurriculaController::class, 'updateTeacherCurriculum'])->name('curricula.teacher.update');

/* ========================================
Rutas de vacantes
========================================= */
Route::get('/vacantes', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/crear/vacante', [VacancyController::class, 'createVacancy'])->name('vacancies.create');
Route::get('/actualizar/vacante/{vacancy}', [VacancyController::class, 'updateVacancy'])->name('vacancies.update');

/* ========================================
Rutas de panel de administrador
========================================= */
Route::get('/panel/resumen', [AdminPanelController::class, 'index'])->name('admin.panel.index');
Route::get('/panel/usuarios', [AdminPanelController::class, 'users'])->name('admin.panel.users');
Route::get('/panel/empresas', [AdminPanelController::class, 'companies'])->name('admin.panel.companies');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
