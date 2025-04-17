<?php

namespace app\controllers;

use app\classes\Conexao;
use app\classes\Estilo;
use app\classes\Filme;
use app\daos\EstiloDao;
use app\daos\FilmeDao;

class FilmeController
{
    static function incluir()
    {
        $estiloDao = new EstiloDao();
        $filmeDao = new FilmeDao();
        $estiloDao = new EstiloDao();
        if (isset($_POST["submit"]) && !empty($_POST)) {
            $filmeDao->insert($_POST);
            echo '<script>alert("Filme Cadastrado")</script>';
        } elseif (isset($_POST["submit-est"]) && !empty($_POST)) {
            $estiloDao->insert($_POST["nome"]);
            echo '<script>alert("Categoria Cadastrada")</script>';
        }
        include '../app/views/modules/nav.php';
        include '../app/views/incluir.php';
        include '../app/views/modules/footer.php';
    }
}
