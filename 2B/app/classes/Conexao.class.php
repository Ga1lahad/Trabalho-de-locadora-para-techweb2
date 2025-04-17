<?php

namespace app\classes;

use PDO;
use PDOException;

class Conexao
{
    private $user;
    private $pass;
    private $db;
    private $serv;
    private static $pdo; // PDO (PHP Data Objects)

    public function __construct()
    {
        $this->serv = "localhost";
        $this->db = "tw_2b";
        $this->user = "root";
        $this->pass = "";
    }

    public function conectar()
    {
        try {
            if (is_null(self::$pdo)) {
                self::$pdo = new PDO(
                    "mysql:host=$this->serv;dbname=$this->db",
                    $this->user,
                    $this->pass
                );
            }
            return self::$pdo; // :: é utilizado quando pretende-se referenciar um método ou variável estática
        } catch (PDOException $ex) {
            echo "mysql:host=$this->serv;dbname=$this->db";
            echo "Usuario:" . $this->user;
            echo "Senha:" . $this->pass;
            echo 'ERROR: ' . $ex->getMessage();
        }
    }
}
