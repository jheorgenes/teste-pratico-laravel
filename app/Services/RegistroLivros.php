<?php

namespace App\Services;

use App\Models\Livro;
use Illuminate\Support\Facades\DB;

class RegistroLivros
{
    public function gravaEmprestimo(string $nomelivro, string $tipoLeitor, string $leitor)
    {
        DB::beginTransaction();
        $livro = Livro::create(
            [
                'nomelivro' => $nomelivro,
                'tipoLeitor' => $tipoLeitor,
                'leitor' => $leitor,
            ]
        );
        DB::commit();

        return $livro;
    }

    //public function pesquisaPorLivro(string $nomelivro): Livro
    //{
    //    return DB::table('livros')->where('nomelivro', $nomelivro)->get();
    //}
//
    //public function pesquisaPorLeitor(string $leitor): Livro
    //{
    //    return DB::table('livros')->where('leitor', $leitor)->get();
    //}

}
