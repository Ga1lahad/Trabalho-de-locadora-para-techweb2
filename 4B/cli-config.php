<?php

namespace Persistence;

require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class Persitence
{
    static function orm(): EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: [__DIR__ . '/src/app/classes'],
            isDevMode: true,
        );
        // Parâmetros de conexão com o banco de dados
        $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'host' => 'localhost',
            'dbname' => 'tw_2b'
        ];

        // Obter a conexão com o bando de dados
        $conn = DriverManager::getConnection($dbParams);
        // Criar o EntityManager
        return new EntityManager($conn, $config);
    }
}
