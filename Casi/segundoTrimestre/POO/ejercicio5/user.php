<?php

use PDO;

class User
{
    private $idUsuario;
    private $idRol = 2;
    private $nameUser;
    private $password;
    private $conexionDataBase;

    public function __construct($db)
    {
        $this->conexionDataBase = $db;
    }



    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
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

    /**
     * Get the value of nameUser
     */
    public function getNameUser()
    {
        return $this->nameUser;
    }

    /**
     * Set the value of nameUser
     *
     * @return  self
     */
    public function setNameUser($nameUser)
    {
        $this->nameUser = $nameUser;

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


    public function login() {
        $sql = "SELECT * from usuario where username= :usu";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":usu"  => $this->nameUser]);

        $datosUsuario = $sentencia->fetch(PDO::FETCH_ASSOC);

        if(password_verify($this->password, $datosUsuario["password"])){
            return true;
            exit;
        }

        return false;
        exit;
    }

    public function registrar(){

    try {

        $sql = "INSERT INTO usuario(username, password, id_rol) VALUES (:usu, :pass, :idRol)";
        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([
            ":usu"  => $this->nameUser,
            ":pass" => password_hash($this->password, PASSWORD_DEFAULT),
            ":idRol" => $this->idRol
        ]);

        return true;
        
    } catch (PDOException $e) {
        echo $e->getMessage();
        return false;
    }

    }
}
