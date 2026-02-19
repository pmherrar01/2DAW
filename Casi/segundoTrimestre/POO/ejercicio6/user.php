<?php

class User{
    private $idUser;
    private $password;
    private $conexionDataBase;
    private $idRol = 2;
    private $userName;

    public function __construct($db) {
        $this->conexionDataBase = $db;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

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

    public function login(){

        $sql = "SELECT * from usuario where username = :usu";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":usu" => $this->userName ]);

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
            
        $sql = "INSERT INTO usuario(username, password, id_rol) VALUES(:usu, :pass, :idRol)";
        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([
            ":usu" => $this->userName,
            ":pass" => password_hash($this->password, PASSWORD_DEFAULT),
            ":IdRol" => $this->idRol
        ]);

        return true;
        
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }



    }
}

?>