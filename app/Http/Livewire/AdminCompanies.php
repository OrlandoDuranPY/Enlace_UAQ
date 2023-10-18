<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Models\Activity;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AdminCompanies extends Component
{
    use WithPagination; // No recargar la pagina al usar la paginacion

    /* ========================================
    Propiedades de la empresa
    ========================================= */
    public $search;
    public $showRows = 10;
    public $name;
    public $num_curriculums;
    public $showCompanyModal = false;
    protected $listeners = ['deleteCompany'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    /* ========================================
    Abrir ventana modal para crear empresa
    ========================================= */
    public function showCompanyModal()
    {
        $this->showCompanyModal = true;
    }

    /* ========================================
    Cerrar ventana modal para crear empresa
    ========================================= */
    public function closeCompanyModal()
    {
        $this->showCompanyModal = false;
        $this->reset([
            'name'
        ]);
    }

    /* ========================================
    Validacion de datos
    ========================================= */
    protected $rules = [
        'name' => ['required', 'min:3', 'max:255', 'unique:companies,name'],
    ];

    /* ========================================
    Crear una nueva empresa en la base de datos
    ========================================= */
    public function addCompany()
    {
        $data = $this->validate();

        Company::create([
            'name' => $data['name']
        ]);

        // ID de la persona autenticada
        $user_id = Auth::id();
        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Agregó la empresa: ' . $data['name'],
            'users_id' => $user_id,
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('create_success', 'Empresa agregada exitosamente!');

        // Resetear el formulario
        $this->reset(['name']);

        $this->closeCompanyModal();
    }


    /* ========================================
    Borrar empresas
    ========================================= */
    public function deleteCompany(Company $company)
    {
        $company->delete();
        // ID de la persona autenticada
        $user_id = Auth::id();

        // Crear una nueva accion en la tabla de Actividades
        Activity::create([
            'name' => 'Borró la empresa: ' . $company->name,
            'users_id' => $user_id,
        ]);
    }

    public function render()
    {
        $companies = Company::where(function ($query){
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%']);
        })->latest()->paginate($this->showRows);
        return view('livewire.admin-companies', [
            'companies' => $companies
        ]);
    }
}
