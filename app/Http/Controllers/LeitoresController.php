<?php

namespace App\Http\Controllers;

use App\Models\Leitor;
use App\Services\CriadorLeitor;
use Illuminate\Http\Request;

class LeitoresController extends Controller
{

    public function index()
    {
        return view('problema2.cadastroLeitor');
    }

    public function create()
    {
        
    }

    public function store(Request $request, CriadorLeitor $criadorLeitor)
    {
        $leitor = $criadorLeitor->criarLeitor(
            $request->nome,
            $request->tipo,
            $request->email,
            $request->telefone,
            $request->endereco,
            $request->cep
        );

        return view('problema2.cadastroLeitor', compact('leitor'));
    }

}
