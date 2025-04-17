<?php

namespace app\controllers;

use app\classes\Conexao;
use app\classes\Filme;
use app\daos\FilmeDao;
use app\daos\locacaoDao;
use app\daos\PessoaDao;

class Catalogo
{
    static function index()
    {
        $conn = new Conexao();
        $filmeDao = new FilmeDao($conn);
        if (isset($_GET["pesquisa"])) {
            $rs = $filmeDao->listarTodosPesquisa($_GET["pesquisa"]);
            include '../app/views/modules/catalogomodulo.php';
        } else {
            $rs = $filmeDao->listarTodos();
            include '../app/views/modules/nav.php';
            include '../app/views/catalogo.php';
        }

        include '../app/views/modules/footer.php';
    }

    static function locacao()
    {
        if ($_SESSION["auth"]["tipo"] == 1) {
            $conn = new Conexao();
            $locacaoDao = new locacaoDao($conn);
            $filmeDao = new FilmeDao($conn);
            $pessoaDao = new PessoaDao($conn);
            $pessoas = $pessoaDao->listarParaAluguel();
            $filmes = $filmeDao->listarTodos();
            $lista = $locacaoDao->listaTodos();
            include '../app/views/modules/nav.php';
            include '../app/views/locacao.php';
            include '../app/views/modules/footer.php';
        } else {
            $conn = new Conexao();
            $locacaoDao = new locacaoDao($conn);
            $lista = $locacaoDao->listaTodosUsuario($_SESSION["auth"]["id"]);
            include '../app/views/modules/nav.php';
            include '../app/views/locacao.php';
            include '../app/views/modules/footer.php';
        }
    }
    static function cadastro()
    {
        $conn = new Conexao();
        $locacaoDao = new locacaoDao($conn);
        $locacaoDao->insert($_POST);
        header("location:/locacao");
    }
    static function baixa()
    {
        $conn = new Conexao();
        $locacaoDao = new locacaoDao($conn);
        $locacaoDao->update($_GET["id"]);
        header("location:/locacao");
    }
}
