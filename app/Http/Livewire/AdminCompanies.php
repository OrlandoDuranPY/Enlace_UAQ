<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use App\Models\Activity;
use App\Models\Curriculum;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AdminCompanies extends Component
{
    use WithPagination; // No recargar la pagina al usar la paginacion

    /* ========================================
    Propiedades de la empresa
    ========================================= */
    public $searchCompany;
    public $searchUser;
    public $showRows = 10;
    public $name;
    public $num_curriculums;
    public $showCompanyModal = false;
    public $showAddUserModal = false;
    public $showLinkedUsers = false;
    public $selectedCompany;
    protected $listeners = ['deleteCompany', 'unlinkUser'];

    public function updatingSearch(){
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
    Abrir ventana modal de usuarios
    ========================================= */
    public function showAddUserModal($company_id)
    {
        $this->selectedCompany = $company_id;
        // dd($this->selectedCompany);
        $this->showAddUserModal = true;
    }

    /* ========================================
    Cerrar ventana modal de usuarios
    ========================================= */
    public function closeAddUserModal()
    {
        $this->showAddUserModal = false;
        $this->reset([
            'searchUser'
        ]);
    }

    /* ========================================
    Abrir Modal para mostrar usuarios vinculados
    ========================================= */
    public function showLinkedUsersModal($company_id)
    {
        $this->selectedCompany = $company_id;
        // dd('SelectedCompany' . $this->selectedCompany);
        $this->showLinkedUsers = true;
    }

    /* ========================================
    Cerrar Modal de usuarios vinculados
    ========================================= */
    public function closeLinkedUsersModal()
    {
        $this->showLinkedUsers = false;
        $this->reset([
            'searchUser'
        ]);
    }

    /* ========================================
    Vincular usuario con la empresa
    ========================================= */
    public function linkUser($curriculum_id)
    {
        // Verifica que haya una empresa seleccionada
        if (!$this->selectedCompany) {
            // Maneja el caso en el que no haya empresa seleccionada
            // Puedes mostrar un mensaje de error o tomar alguna acción necesaria.
            return;
        }

        // Actualiza el campo 'companies_id' en la tabla 'curricula' con el valor de 'selectedCompany'
        Curriculum::where('id', $curriculum_id)->update(['companies_id' => $this->selectedCompany]);

        // Emitir evento de mensaje de exito
        $this->emit('create_success', '¡Usuario vinculado exitosamente!');

        // Cierra la modal de vinculación de usuarios
        $this->closeAddUserModal();

        // dd($this->selectedCompany . '->' . $curriculum_id);
    }

    /* ========================================
    Desvincular un usuario de la empresa
    ========================================= */
    public function unlinkUser($curriculum_id)
    {
        // dd($curriculum_id);

        Curriculum::where('id', $curriculum_id)->update(['companies_id' => null]);

        $this->emit('create_success', '¡Usuario desvinculado exitosamente!');

        $this->closeLinkedUsersModal();
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
        $this->emit('create_success', '¡Empresa agregada exitosamente!');

        // Resetear el formulario
        $this->reset(['name']);

        $this->closeCompanyModal();
    }


    /* ========================================
    Borrar empresas
    ========================================= */
    public function deleteCompany(Company $company)
    {
        $linkedUsers = Curriculum::where('companies_id', $company->id)->get();
        if (count($linkedUsers) > 0) {
            // Emitir evento de mensaje de error
            $this->emit('error_message_alert', 'Para eliminar una empresa no debe de tener usuarios vinculados!');
            return;
        }

        // ID de la persona autenticada
        $user_id = Auth::id();

        $company->delete();

        // Crear una nueva accion en la tabla de Actividades
        Activity::create([
            'name' => 'Borró la empresa: ' . $company->name,
            'users_id' => $user_id,
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('success_message', '¡Empresa eliminada exitosamente!');

    }

    public function render()
    {
        $curricula = Curriculum::where(function ($query) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->searchUser) . '%']);
        })->whereNull('companies_id')->latest()->paginate(10);

        $linkedUsers = Curriculum::where(function ($query) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->searchUser) . '%']);
        })->where('companies_id', '=', $this->selectedCompany) // Agregar la condición de companies_id
            ->latest()
            ->paginate(10);

        // $linkedUsers = Curriculum::where('companies_id', '=', $this->selectedCompany);
        // $linkedUsers = Curriculum::where('companies_id', $this->selectedCompany);

        $companies = Company::where(function ($query) {
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->searchCompany) . '%']);
        })->latest()->paginate($this->showRows);

        return view('livewire.admin-companies', [
            'companies' => $companies,
            'curricula' => $curricula,
            'linkedUsers' => $linkedUsers,
        ]);
    }
}
