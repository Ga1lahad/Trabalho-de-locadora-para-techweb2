<?php

namespace app\daos;

use app\classes\Conexao;
use app\classes\Pessoa;
use PDO;
use PDOException;

class PessoaDao
{
    private $conn;
    function __construct(Conexao $Conn)
    {
        $this->conn = $Conn;
    }
    /**Autentica o login do usuario */
    function autenticar($cpf, $hash)
    {
        session_destroy();
        session_start();
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT id,nome,endereco,telefone,cpf,tipo FROM pessoa WHERE cpf=? AND senha=?;");
        $sql->bindParam(1, $cpf);
        $sql->bindParam(2, $hash);
        $sql->execute();
        $_SESSION["auth"] = $sql->fetch();
    }
    /**Faz o Cadastro do usuario no banco */
    function cadastrar(Pessoa $p)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("INSERT INTO `pessoa`(`nome`, `endereco`, `telefone`, `tipo`, `senha`, `cpf`) VALUES (?,?,?,?,?,?)");
        $sql->bindParam(1, $p->nome);
        $sql->bindParam(2, $p->endereco);
        $sql->bindParam(3, $p->telefone);
        $sql->bindParam(4, $p->tipo);
        $sql->bindParam(5, $p->senha);
        $sql->bindParam(6, $p->cpf);
        $sql->execute();
    }
    function listarParaAluguel()
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT id,cpf FROM pessoa");
        $sql->execute();
        return ($sql->fetchall());
    }
}
