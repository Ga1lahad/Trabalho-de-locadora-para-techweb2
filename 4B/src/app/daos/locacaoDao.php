<?php

namespace app\daos;

use app\classes\Conexao;
use app\classes\Locacao;
use DateTime;
use Persistence\Persitence;

class locacaoDao
{
    private $doc;

    function __construct()
    {
        $this->doc = Persitence::orm();
    }
    /**Codigo de inserção no banco de dados */
    function insert($array)
    {
        $pdao = new PessoaDao();
        $fdao = new FilmeDao();
        $locacao = new Locacao($array);
        $locacao->setValor($array["valor"]);
        $locacao->setEmissao(new \DateTime);
        $locacao->setFilme($fdao->listar($array["filme"]));
        $locacao->setCliente($pdao->listar($array["cliente"]));
        $this->doc->persist($locacao);
        $this->doc->flush();
        die;
    }
    function update($id)
    {
        $query = $this->doc->createQueryBuilder();
        $query->update('locacoa', 'l')
            ->set('devolucao', "CURRENT_DATE()")
            ->where('l.id', $id);
        $query->getQuery()->execute();
    }
    function listaTodos()
    {
        $Locacoes = $this->doc->getRepository(Locacao::class)->findAll();
        return ($Locacoes);
    }
    function listaTodosUsuario($Id)
    {
        $query = $this->doc->createQueryBuilder();

        $query->select('l.emissao', 'l.devolucao', 'l.valor', 'l.id', 'p.nome AS cliente', 'p.cpf', 'f.nome AS filme')
            ->from('app\classes\Locacao', 'l')
            ->innerJoin('l.cliente', 'p')
            ->innerJoin('l.filme', 'f')
            ->where('p.id = :id')
            ->setParameter('id', $Id);
        $query = $query->getQuery();
        $rs = $query->getResult();
        $Locacoes = [];
        foreach ($rs as $locacao) {
            $locacao = new Locacao($locacao);
            $Locacoes[] = $locacao;
        }
        return $Locacoes;
    }
}
