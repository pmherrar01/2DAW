<?php

use PDO;
use PDOException;

class DataBase{
    private $host = "localhost";
    private $dbName = "agencia_vuelos";
    private $user  = "root";
    private $password = "";
    private $charset = "utf8mb4";


    public function conectar(){
        try {
            $dns = "mysql:host=" . $this->host . ";dbname=" . $this->dbName . ";charset=" . $this->charset;

            $pdo = new PDO($dns, $this->user, $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}

?>