<?php

namespace app\daos;

use app\classes\Conexao;
use app\classes\Filme;

class FilmeDao
{
    private static $listacompleta;
    private $conn;

    /**Cria a instacia do DAO, Necessario parametro da classe Conexao*/
    function __construct(Conexao $Conn)
    {
        $this->conn = $Conn;
    }
    function traduzEstilo($id)
    {
        $estilo_id = $id;
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT nome FROM estilo WHERE id=?");
        $sql->bindParam(1, $estilo_id);
        $sql->execute();
        $rs = $sql->fetchcolumn();
        return $rs;
    }
    function listarTodos()
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT * FROM filme");
        $sql->execute();
        foreach ($sql->fetchall() as $row) {
            $row["estilo"] = $this->traduzEstilo($row["estilo_id"]);
            $filme = new Filme($row);
            $lista[] = $filme;
        }
        self::$listacompleta = $lista;
        return ($lista);
    }
    /**Faz a busca no banco de dados procurando nome compativeis com o parametro */
    function listarTodosPesquisa($pesq)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("SELECT * FROM filme f WHERE f.nome LIKE ?");
        $sql->bindValue(1, "%" . $pesq . "%");
        $sql->execute();
        foreach ($sql->fetchall() as $row) {
            $row["estilo"] = $this->traduzEstilo($row["estilo_id"]);
            $filme = new Filme($row);
            $lista[] = $filme;
        }
        self::$listacompleta = $lista;
        return ($lista);
    }
    function insert(Filme $f)
    {
        $pdo = $this->conn->conectar();
        $sql = $pdo->prepare("INSERT INTO `filme` (`nome`, `ano`, `duracao`, `foto`, `sinopse`, `estilo_id`) VALUES (?,?,?,?,?,?);");
        $sql->bindParam(1, $f->nome);
        $sql->bindParam(2, $f->ano);
        $sql->bindValue(3, $f->duracao);
        $sql->bindParam(4, $f->foto);
        $sql->bindParam(5, $f->sinopse);
        $sql->bindParam(6, $f->estilo);
        $sql->execute();
    }
}
