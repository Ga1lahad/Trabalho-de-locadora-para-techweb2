<?php

namespace app\daos;

use app\classes\Estilo;
use app\classes\Conexao;

class EstiloDao
{
    private $conn;
    function __construct(Conexao $Conn)
    {
        $this->conn = $Conn;
    }
    function listarTodos()
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT * FROM estilo");
        $sql->execute();
        foreach ($sql->fetchall() as $row) {
            $estilo = new Estilo($row);
            $estilos[] = $estilo;
        }
        return ($estilos);
    }
    function insert($nome)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("INSERT INTO `estilo`(`nome`) VALUES (?)");
        $sql->bindParam(1, $nome);
        $sql->execute();
    }
}
