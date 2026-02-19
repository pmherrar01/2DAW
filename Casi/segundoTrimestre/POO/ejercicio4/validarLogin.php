<?php

session_start();

require_once "user.php";
require_once "dataBase.php";

$dataBase = new DataBase();
$user = new User($dataBase->conectar());


$nameUser = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if (!empty($nameUser) && !empty($password)) {
    $user->setUserName($nameUser);
    $user->setPassword($password);

    if($user->login()){
        $_SESSION["usuario"] = [
            "idUsuario" => $user->getIdUsuario(),
            "nombreUser" => $user->getUserName(),
            "rol" => $user->getIdRol()
        ];

        header("Location: inicio.php?bienvenido=true");
        exit;
    }

    header("Location: iniciarSesion.php?encontrado=false");
    exit;
}

?>