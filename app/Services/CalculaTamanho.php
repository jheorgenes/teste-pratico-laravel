<?php

namespace App\Services;

class CalculaTamanho
{

    private $nome;
    private $tamanho;

    public function __construct($nome, $tamanho)
    {
        $this->nome = $nome;
        $this->tamanho = $tamanho;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTamanho()
    {
        return $this->tamanho;
    }

}
