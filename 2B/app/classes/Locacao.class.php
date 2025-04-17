<?php

namespace app\classes;

class locacao
{
    private $id;
    private $emissao;
    private $devolucao;
    private $valor;
    private $cpf;
    private $cliente;
    private $filme;

    function __construct($array)
    {
        $this->id = $array["id"];
        $this->emissao = $array["emissao"];
        $this->devolucao = $array["devolucao"];
        $this->cpf = $array["cpf"];
        $this->valor = $array["valor"];
        $this->cliente = $array["cliente"];
        $this->filme = $array["filme"];
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
