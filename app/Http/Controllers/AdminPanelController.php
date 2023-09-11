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
}
