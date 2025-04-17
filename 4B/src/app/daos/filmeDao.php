<?php

namespace app\daos;

use app\classes\Conexao;
use app\classes\Filme;
use Persistence\Persitence;

class FilmeDao
{
    private static $listacompleta;
    private $doc;

    /**Cria a instacia do DAO, Necessario parametro da classe Conexao*/
    function __construct()
    {
        $this->doc = Persitence::orm();
    }
    function listar($id)
    {
        $Filmes = $this->doc->getRepository(Filme::class)->find($id);
        $Filmes->getEstilo()->getNome();
        return ($Filmes);
    }
    function listarTodos()
    {
        $Filmes = $this->doc->getRepository(Filme::class)->findAll();
        return ($Filmes);
    }
    /**Faz a busca no banco de dados procurando nome compativeis com o parametro */
    function listarTodosPesquisa($pesq)
    {
        $Filmes = $this->doc->getRepository(Filme::class)->createQueryBuilder('f')->where('f.nome LIKE :nome')->setParameter('nome', '%' . $pesq . '%')->getQuery()->getResult();
        return ($Filmes);
    }
    function insert(array $f)
    {
        $edao = new EstiloDao();
        $estilo = $edao->listar($f["estilo"]);
        $filme = new Filme($f);
        $filme->setNome($f["nome"]);
        $filme->setAno($f["ano"]);
        $filme->setDuracao($f["duracao"]);
        $filme->setFoto($f["foto"]);
        $filme->setSinopse($f["sinopse"]);
        $filme->setEstilo($estilo);
        $this->doc->persist($filme);
        $this->doc->flush();
    }
}
