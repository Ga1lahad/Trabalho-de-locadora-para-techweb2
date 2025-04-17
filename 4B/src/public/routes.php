<?php
session_start();
// var_dump($_SESSION);
require __DIR__ . '/../../cli-config.php';

use app\controllers\Catalogo;
use app\controllers\FilmeController;
use app\controllers\Login;

$url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
switch ($url) {
    case '/':
        Catalogo::index();
        break;
    case '/locacao':
        Catalogo::locacao();
        break;
    case '/locacao/cadastro':
        Catalogo::cadastro();
        break;
    case '/locacao/baixa':
        Catalogo::baixa();
        break;
    case '/incluir':
        FilmeController::incluir();
        break;
    case '/login':
        Login::login();
        break;
    case '/logar':
        Login::logar();
        break;
    case '/cadastro':
        Login::cadastro();
        break;
    case '/cadastrar':
        Login::cadastrar();
        break;

    default:
        include '../app/views/errorpage.php';
        break;
}
