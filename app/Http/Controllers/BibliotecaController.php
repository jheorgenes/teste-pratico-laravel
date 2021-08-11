<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Leitor;
use Illuminate\Http\Request;
use App\Services\RegistroLivros;

class BibliotecaController extends Controller
{

    public function index(Request $request)
    {
        $leitores = Leitor::all();
        
        return view('problema2.index', compact('leitores'));
    }

    public function store(Request $request, RegistroLivros $registroLivros)
    {
        $livro = $registroLivros->gravaEmprestimo(
            $request->nomeLivro,
            $request->tipo,
            $request->leitor
        );

        return response()->json($livro, 200);
    }

    public function buscaTodos()
    {
        $livro = Livro::all();
        return response()->json($livro, 200);
    }
}
