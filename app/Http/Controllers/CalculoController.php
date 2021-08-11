<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculoController extends Controller
{
    
    public function listaCalculos()
    {
        return view('problema1.listaCalculos');
    }
}
