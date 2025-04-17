<?php

namespace app\daos;

use app\classes\Estilo;
use app\classes\Conexao;
use Persistence\Persitence;

class EstiloDao
{
    private $doc;
    function __construct()
    {
        $this->doc  = Persitence::orm();
    }
    function listar($id)
    {
        $estilos = $this->doc->getRepository(Estilo::class)->find($id);
        return $estilos;
    }
    function listarTodos()
    {
        $estilos = $this->doc->getRepository(Estilo::class)->findAll();
        return $estilos;
    }
    function insert($nome)
    {
        $estilo = new Estilo($nome);
        $this->doc->persist($estilo);
        $this->doc->flush();
    }
}
