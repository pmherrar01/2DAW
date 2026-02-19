<?php

use PDO;
use PDOException;

class User{
    private $idUsuario;
    private $userName;
    private $password;
    private $idRol = 2;
    private $conexionDB;



    public function __construct($db) {
        $this->conexionDB = $db;
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

    public function login(){
        $sql = "SELECT * from usuario where username = :user";

        $sentencia= $this->conexionDB->prepare($sql);
        $sentencia->execute([":user" => $this->userName]);

        $datosUsuario = $sentencia->fetch(PDO::FETCH_ASSOC);


        if($datosUsuario != false){

            if(password_verify($this->password, $datosUsuario["password"])){

            $this->idUsuario = $datosUsuario["id_usuraio"];
            $this->idRol = $datosUsuario["id_rol"];

            return true;
            exit;
            }



        }else{
            return false;
        }

    }

    public function registrar(){
        try {
            $sql = "INSERT INTO usuario(username, password, id_rol) VALUES (:usu, :password, :idRol)";

            $sentencia = $this->conexionDB->prepare($sql);
            $sentencia->execute([
                ":usu" => $this->userName,
                ":password" => password_hash($this->password, PASSWORD_DEFAULT),
                ":idRol" => $this->idRol
            ]);

            return true;



        } catch (PDOException $e) {
            echo $e->getMessage();

            return false;
        }
    }

}

?>