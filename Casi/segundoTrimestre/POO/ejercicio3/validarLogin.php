<?php

session_start();

require_once "dataBase.php";
require_once "user.php";

$nameUser = isset($_POST["nombreUsuario"]) ? trim($_POST["nombreUsuario"]) : "";
$passwordUser = isset($_POST["password"]) ? trim($_POST["password"]) : "";

$dataBase = new DataBase();
$user = new User($dataBase->conectar());


if (!empty($nameUser) && !empty($passwordUser)) {

    $user->setUserName($nameUser);
    $user->setPassword($passwordUser);

    if ($user->login()) {
        
        $_SESSION["usuario"] = [
            "id" => $user->getId(),
            "username" => $user->getUserName(),
            "rol" => $user->getIdRol()
        ];
        

        header("Location: inicio.php");
        exit;
    }
    
} 

header("Location: index.php?error=true");
exit;
?>