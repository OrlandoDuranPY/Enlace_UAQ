<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class AdminUsers extends Component
{
    /* ========================================
    Propiedades
    ========================================= */
    public $rol;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $showModal = false;

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
    }

    public function render()
    {
        return view('livewire.admin-users');
    }
}
