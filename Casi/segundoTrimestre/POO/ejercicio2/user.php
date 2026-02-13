<?php

use PDO;
use PDOException;

require_once "dataBase.php";

class Usuario
{
    private $conexionDataBase;
    private $id;
    private $userName;
    private $password;
    private $idRol = 2;

    public function __construct($db)
    {
        $this->conexionDataBase = $db;
    }



    /**
     * Get the value of userName
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of idRol
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set the value of idRol
     *
     * @return  self
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }


    public function registrar()
    {

        try {

            $sql = "INSERT INTO usuario (username, password, id_rol) VALUES (:usu, :pass, :id_rol)";

            $sentencia = $this->conexionDataBase->prepare($sql);
            $sentencia->execute([
                ":usu" => $this->userName,
                ":pass" => password_hash($this->password, PASSWORD_DEFAULT),
                ":id_rol" => $this->idRol
            ]);

            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function login()
    {
        $sql = "SELECT * from usuario where username = :user";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":user" => $this->userName]);

        $usuarioDatos = $sentencia->fetch(PDO::FETCH_ASSOC);

        if ($usuarioDatos != false) {

            if (password_verify($this->password, $usuarioDatos["password"])) {
                $this->id = $usuarioDatos["id_usuario"];
                $this->idRol = $usuarioDatos["id_rol"];
                return true;
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
}
