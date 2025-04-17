<?php

namespace app\daos;

use app\classes\Conexao;
use app\classes\locacao;

class locacaoDao
{
    private $conn;

    function __construct($Conn)
    {
        $this->conn = $Conn;
    }
    /**Codigo de inserção no banco de dados */
    function insert($array)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("INSERT INTO `locacao`(valor, filme_id, cliente_id) VALUES (?,?,?)");
        $sql->bindValue(1, $array["valor"]);
        $sql->bindValue(2, $array["filme"]);
        $sql->bindValue(3, $array["cliente"]);
        $sql->execute();
    }
    function update($id)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("UPDATE locacao set devolucao = CURRENT_DATE() WHERE id=?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }
    function listaTodos()
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT l.emissao,l.devolucao,l.valor,l.id,p.nome as 'cliente',p.cpf ,f.nome as 'filme' FROM locacao l INNER JOIN pessoa p on p.id = l.cliente_id INNER JOIN filme f on f.id = l.filme_id;");
        $sql->execute();
        foreach ($sql->fetchAll() as $row) {
            $locacao = new locacao($row);
            $lista[] = $locacao;
        }
        return ($lista);
    }
    function listaTodosUsuario($Id)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT l.emissao,l.devolucao,l.valor,l.id,p.nome as 'cliente',p.cpf ,f.nome as 'filme' FROM locacao l RIGHT JOIN pessoa p on p.id = l.cliente_id INNER JOIN filme f on f.id = l.filme_id WHERE p.id = ?;");
        $sql->bindValue(1,$Id);
        $sql->execute();
        foreach ($sql->fetchAll() as $row) {
            $locacao = new locacao($row);
            $lista[] = $locacao;
        }
        return $lista;
    }
}
