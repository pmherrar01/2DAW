<?php

class User
{
    private $idUser;
    private $password;
    private $conexionDataBase;
    private $idRol = 2;
    private $userName;

    public function __construct($db)
    {
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

    public function login()
    {

        $sql = "SELECT * from usuario where username = :usu";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":usu" => $this->userName]);

        $datosUsuario = $sentencia->fetch(PDO::FETCH_ASSOC);

        if (password_verify($this->password, $datosUsuario["password"])) {

            $this->idUser = $datosUsuario["id_usuario"];
            $this->idRol = $datosUsuario["id_rol"];

            return true;
        }

        return false;
    }

    public function registrar()
    {

        try {

            $sql = "INSERT INTO usuario(username, password, id_rol) VALUES(:usu, :pass, :idRol)";
            $sentencia = $this->conexionDataBase->prepare($sql);
            $sentencia->execute([
                ":usu" => $this->userName,
                ":pass" => password_hash($this->password, PASSWORD_DEFAULT),
                ":idRol" => $this->idRol
            ]);

            return true;
        } catch (PDOException $e) {
            $e->getMessage();
            return false;
        }
    }

    public function obtenerTodosUsuarios()
    {
        $sql = "SELECT id_usuario, username, id_rol FROM usuario";

        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC);
    }

    public function borrarUsuario($id)
    {

        try {
            $sql = "DELETE FROM usuario where id_usuario = :idUsu";

            $sentencia = $this->conexionDataBase->prepare($sql);
            $sentencia->execute([":idUsu" => $id]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function buscarUsuario($id)
    {
        $sql = "SELECT * from usuario where id_usuario = :id";
        $sentencia = $this->conexionDataBase->prepare($sql);
        $sentencia->execute([":id" => $id]);

        return $sentencia->fectch(PDO::FETCH_ASSOC);
    }

    public function editarUsuario($id, $rol)
    {

        $rolNew = 2; 

        if ($rol == 2) {
            $rolNew = 1;
        }

        try {

            $sql = "UPDATE usuario SET id_rol = :newRol where id_usuario = :id";
            $sentencia = $this->conexionDataBase->prepare($sql);
            $sentencia->execute([":id" => $id, ":newRol" => $rolNew]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function actualizarContrasena($id, $newPassword)
    {

        try {
            $sql = "UPDATE usuario SET password = :newPass where id_usuario = :id";
            $sentencia = $this->conexionDataBase->prepare($sql);
            $sentencia->execute([":newPass" => password_hash($newPassword, PASSWORD_DEFAULT), ":id" => $id]);

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
