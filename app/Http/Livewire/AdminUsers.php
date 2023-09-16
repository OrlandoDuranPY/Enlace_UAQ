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
    public $admin;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    /* ========================================
    Validacion de datos
    ========================================= */
    protected $rules = [
        'name' => ['required', 'min:3', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'admin' => ['required', 'between:0,1'],
        'password' => ['required', 'min:8', 'confirmed'],
        'password_confirmation' => ['required'],
    ];

    public function addUser()
    {
        $datos = $this->validate();
        User::create([
            'admin' => $datos['admin'],
            'name' => $datos['name'],
            'email' => $datos['email'],
            'password' => $datos['password']
        ]);

        // ID de la persona autenticada
        $user_id = Auth::id();
        // Crear una nueva accion en la tabla historial
        Activity::create([
            'name' => 'Agregó un nuevo usuario',
            'users_id' => $user_id,
        ]);

        // Resetear el formulario
        $this->reset([
            'admin',
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
