<?php

namespace app\classes;

class Pessoa
{
    private $id;
    private $nome;
    private $cpf;
    private $endereco;
    private $telefone;
    private $tipo;


    function &__get($name)
    {
        return $this->$name;
    }
    function __set($name, $value)
    {
        $this->$name = $value;
    }
}
