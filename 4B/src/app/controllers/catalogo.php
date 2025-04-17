<?php

namespace app\controllers;

use app\classes\Conexao;
use app\classes\Filme;
use app\classes\Pessoa;
use app\daos\FilmeDao;
use app\daos\locacaoDao;
use app\daos\PessoaDao;
use Doctrine\ORM\EntityManager;
use Persistence\Persitence;

class Catalogo
{
    static function index()
    {
        $fdao = new FilmeDao();
        if (isset($_GET["pesquisa"])) {
            $rs = $fdao->listarTodosPesquisa($_GET["pesquisa"]);
            include '../app/views/modules/catalogomodulo.php';
        } else {
            $rs = $fdao->listarTodos();
            include '../app/views/modules/nav.php';
            include '../app/views/catalogo.php';
        }

        include '../app/views/modules/footer.php';
    }

    static function locacao()
    {
        if ($_SESSION["auth"][0]->getTipo() == "1") {

            $locacaoDao = new locacaoDao();
            $filmeDao = new FilmeDao();
            $pessoaDao = new PessoaDao();
            $pessoas = $pessoaDao->listarParaAluguel();
            $filmes = $filmeDao->listarTodos();
            $lista = $locacaoDao->listaTodos();
            include '../app/views/modules/nav.php';
            include '../app/views/locacao.php';
            include '../app/views/modules/footer.php';
        } else {
            $locacaoDao = new locacaoDao();
            $lista = $locacaoDao->listaTodosUsuario($_SESSION["auth"]["id"]);
            include '../app/views/modules/nav.php';
            include '../app/views/locacao.php';
            include '../app/views/modules/footer.php';
        }
    }
    static function cadastro()
    {
        $locacaoDao = new locacaoDao();
        $locacaoDao->insert($_POST);
        header("location:/locacao");
    }
    static function baixa()
    {
        $locacaoDao = new locacaoDao();
        $locacaoDao->update($_GET["id"]);
        header("location:/locacao");
    }
}
