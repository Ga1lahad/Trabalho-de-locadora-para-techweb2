<?php

namespace app\controllers;

use app\classes\Conexao;
use app\classes\Filme;
use app\daos\EstiloDao;
use app\daos\FilmeDao;

class FilmeController
{
    static function incluir()
    {
        $conn = new Conexao();
        $estiloDao = new EstiloDao($conn);
        if (isset($_POST["submit"]) && !empty($_POST)) {
            $filmeDao = new FilmeDao($conn);
            $filme = new Filme($_POST);
            $filmeDao->insert($filme);
            echo '<script>alert("Filme Cadastrado")</script>';
        } elseif (isset($_POST["submit-est"]) && !empty($_POST)) {
            $conn = new Conexao();
            $estiloDao = new EstiloDao($conn);
            $estiloDao->insert($_POST["nome"]);
            echo '<script>alert("Categoria Cadastrada")</script>';
        }
        include '../app/views/modules/nav.php';
        include '../app/views/incluir.php';
        include '../app/views/modules/footer.php';
    }
}
