<?php

namespace app\controllers;

use app\classes\Conexao;
use app\classes\Pessoa;
use app\daos\PessoaDao;

class Login
{
    static function login()
    {
        include '../app/views/modules/nav.php';
        include '../app/views/login_usr.php';
        include '../app/views/modules/footer.php';
    }
    static function logar()
    {
        $pessoaDao = new PessoaDao();
        $pessoaDao->autenticar($_POST["cpf"], hash("md5", $_POST["senha"]));
        header("location:/");
    }

    static function cadastro()
    {

        $pessoaDao = new PessoaDao();
        include '../app/views/modules/nav.php';
        include '../app/views/cadastro_usr.php';
        include '../app/views/modules/footer.php';
    }
    static function cadastrar()
    {
        $p = new Pessoa();
        $clienteDao = new PessoaDao();
        $_POST["senha"] = hash("md5", $_POST["senha"]);
        $clienteDao->insert($p->PreencherComArray($_POST));
        header("location:/cadastro");
    }
}
