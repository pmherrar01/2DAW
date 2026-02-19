<?php

session_start();

require_once "user.php";
require_once "dataBase.php";

$newUserName= isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
$newPassword = isset($_POST["password"]) ? $_POST["password"] : "";

$db = new DataBase();
$newUser =  new User($db->conectar());

if(!empty($newUserName) && !empty($newPassword)){
    $newUser->setUserName($newUserName);
    $newUser->setPassword($newPassword);

    if($newUser->registrar()){
         $_SESSION["user"] = [
            "idUsuario" => $newUser->getIdUsuario(),
            "nombreUser" => $newUser->getNameUser(),
            "rol" => $newUser->getIdRol()
        ];

        header("Location: iniciarSesion.php?registro=true");
        exit;
    }

    header("Location: registar.php?registro=false");
    exit;
}

?>