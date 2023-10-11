<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    /* ========================================
    Mostrar dashboard de panel de administrador
    ========================================= */
    public function index()
    {
        return view('admin-panel.index');
    }

    /* ========================================
    Vista de usuarios
    ========================================= */
    public function users(){
        return view('admin-panel.users');
    }

    /* ========================================
    Vista de empresas
    ========================================= */
    public function companies(){
        return view('admin-panel.companies');
    }
}
