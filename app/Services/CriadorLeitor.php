<?php

namespace App\Services;

use App\Models\Leitor;
use Illuminate\Support\Facades\DB;

class CriadorLeitor{

    /* Criando Series */
    public function criarLeitor(string $nome, string $tipo, string $email, string $telefone, string $endereco, string $cep): Leitor
    {
        DB::beginTransaction();
        $leitor = Leitor::create([
            'nome' => $nome,
            'tipo' => $tipo,
            'email' => $email,
            'telefone' => $telefone,
            'endereco' => $endereco,
            'cep' => $cep,
        ]);
        DB::commit();

        return $leitor;
    }

    public function listaTodos(): Leitor
    {
        return Leitor::all();
    }
}
