<?php

namespace app\classes;

class Filme
{
    private $id;
    private $nome;
    private $ano;
    private $duracao;
    private $foto;
    private $sinopse;
    private $estilo;

    function __construct(array $dados)
    {
        $this->id = $dados["id"];
        $this->nome = $dados["nome"];
        $this->ano = $dados["ano"];
        $this->duracao = $dados["duracao"];
        $this->foto =  $dados["foto"];
        $this->sinopse =  $dados["sinopse"];
        $this->estilo =  $dados["estilo"];
    }

    function &__get($name)
    {
        return $this->$name;
    }
    function __set($name, $value)
    {
        $this->$name = $value;
    }
}
