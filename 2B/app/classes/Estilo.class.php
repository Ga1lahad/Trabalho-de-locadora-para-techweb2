<?php

namespace app\classes;

class Estilo
{
    private $id;
    private $nome;

    function __construct($row)
    {
        $this->id = $row["id"];
        $this->nome = $row["nome"];
    }


    function __get($name)
    {
        return $this->$name;
    }
    function __set($name, $value)
    {
        $this->$name = $value;
    }
}
