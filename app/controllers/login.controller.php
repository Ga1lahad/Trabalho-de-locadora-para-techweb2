<?php

namespace app\controllers;

use app\classes\Conexao;
use app\classes\Pessoa;
use app\daos\PessoaDao;

class Login
{
    static function login()
    {
        $conn = new Conexao();
        $pessoaDao = new PessoaDao($conn);
        include '../app/views/modules/nav.php';
        include '../app/views/login_usr.php';
        include '../app/views/modules/footer.php';
    }
    static function logar()
    {
        $conn = new Conexao();
        $pessoaDao = new PessoaDao($conn);
        $pessoaDao->autenticar($_POST["cpf"], hash("md5", $_POST["senha"]));

        header("location:/");
    }

    static function cadastro()
    {
        $conn = new Conexao();
        $pessoaDao = new PessoaDao($conn);
        include '../app/views/modules/nav.php';
        include '../app/views/cadastro_usr.php';
        include '../app/views/modules/footer.php';
    }
    static function cadastrar()
    {
        session_start();
        $conn = new Conexao();
        $clienteDao = new PessoaDao($conn);
        $pessoa = new Pessoa();
        $pessoa->nome = $_POST["nome"];
        $pessoa->endereco = $_POST["endereco"];
        $pessoa->telefone = $_POST["telefone"];
        $pessoa->cpf = $_POST["cpf"];
        if (is_null($_POST["tipo"])) {
            $pessoa->tipo = 0;
        } else {
            $pessoa->tipo = 1;
        }
        $pessoa->senha = hash("md5", $_POST["senha"]);
        $clienteDao->cadastrar($pessoa);
        header("location:/cadastro");
    }
}
