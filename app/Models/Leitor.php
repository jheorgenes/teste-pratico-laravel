<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leitor extends Model
{
    protected $fillable = [
        'nome', 'tipo', 'email', 'telefone', 'endereco', 'cep',
    ];
}
