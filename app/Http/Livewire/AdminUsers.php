<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Activity;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AdminUsers extends Component
{
    use WithPagination; // No recargar la pagina al usar la paginacion

    /* ========================================
    Propiedades
    ========================================= */
    public $rol;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $search;
    public $showModal = false;
    public $showRows = 10; // Mostrar n numero de columnas en la tabla
    protected $listeners = ['deleteUser'];

    public function updatingSearch(){
        $this->resetPage();
    }

    /* ========================================
    Abrir la ventana modal
    ========================================= */
    public function openModal()
    {
        $this->showModal = true;
    }

    /* ========================================
    Cerrar la ventana modal
    ========================================= */
    public function closeModal()
    {
        $this->showModal = false;
        // Resetear el formulario
        $this->reset([
            'rol',
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);
    }

    /* ========================================
    Validacion de datos
    ========================================= */
    protected $rules = [
        'rol' => ['required'],
        'name' => ['required', 'min:3', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'min:8', 'confirmed'],
        'password_confirmation' => ['required'],
    ];

    public function addUser()
    {
        $data = $this->validate();
        // dd($data);
        User::create([
            'rol' => $data['rol'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        // ID de la persona autenticada
        $user_id = Auth::id();
        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Agregó al usuario: ' . $data['name'],
            'users_id' => $user_id,
        ]);

        // Emitir evento de mensaje de exito
        $this->emit('create_success', '¡Usuario agregado exitosamente!');

        // Resetear el formulario
        $this->reset([
            'rol',
            'name',
            'email',
            'password',
            'password_confirmation'
        ]);

        $this->closeModal();
    }

    /* ========================================
    Borrar usuarios
    ========================================= */
    public function deleteUser(User $user){
        $user->delete();
        // ID de la persona autenticada
        $user_id = Auth::id();

        // Crear una nueva accion en la tabla de Actividades
        Activity::create([
            'name' => 'Borró el usuario: ' . $user->name,
            'users_id' => $user_id,
        ]);
    }

    public function render()
    {
        $users = User::where(function ($query) {
            // $query->whereRaw('LOWER(name)', 'like', '%' . $this->search . '%');
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(email) LIKE ?', ['%' . strtolower($this->search) . '%'])
            ->orWhereRaw('LOWER(rol) LIKE ?', ['%' . strtolower($this->search) . '%']);
        })
        ->latest()->paginate($this->showRows);
        return view('livewire.admin-users', [
            'users' => $users
        ]);
    }
}

