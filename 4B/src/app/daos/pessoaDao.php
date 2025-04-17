<?php

namespace app\daos;

use app\classes\Conexao;
use app\classes\Pessoa;
use PDO;
use PDOException;
use Persistence\Persitence;

class PessoaDao
{
    private $doc;
    function __construct()
    {
        $this->doc = Persitence::orm();
    }
    /**Autentica o login do usuario */
    function autenticar($cpf, $hash)
    {
        session_destroy();
        session_start();

        $query = $this->doc->createQueryBuilder();

        $query->select('p')
            ->from('app\classes\Pessoa', 'p')
            ->where('p.cpf = :cpf')
            ->andWhere('p.senha = :hash')
            ->setParameter('cpf', $cpf)
            ->setParameter('hash', $hash);
        $rs = $query->getQuery()->getResult();
        $_SESSION["auth"] = (array) $rs;
    }
    /**Faz o Cadastro do usuario no banco */
    function insert(Pessoa $p)
    {
        $this->doc->persist($p);
        $this->doc->flush($p);
    }
    function listarParaAluguel()
    {
        $query = $this->doc->createQueryBuilder();
        $query->select(["p.id", "p.cpf"])
            ->from("app\classes\Pessoa", "p");
        $rs = $query->getQuery()->getResult();
        return ($rs);
    }
    function listar($id)
    {
        $Pessoa = $this->doc->getRepository(Pessoa::class)->find($id);
        return ($Pessoa);
    }
}
