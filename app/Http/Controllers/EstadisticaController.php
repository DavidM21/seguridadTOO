<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class EstadisticaController extends Controller
{
    public function mostrarestado()
    {
        $usuario = User::get();
        return view('estado',compact('usuario'));
    }

    public function mostrarestadistica()
    {
        $usuario = User::get();
        return view('estadistica',compact('usuario'));
    }
    
}
