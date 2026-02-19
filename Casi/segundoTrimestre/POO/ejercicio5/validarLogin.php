<?php

session_start();

require_once "user.php";
require_once "dataBase.php";

$nameLogin = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
$passwordLogin = isset($_POST["password"]) ? $_POST["password"] : "";

$db = new DataBase();
$userLogin = new User($db->conectar());

if(!empty($nameLogin) && !empty($passwordLogin)){

    $userLogin->setNameUser($nameLogin);
    $userLogin->setPassword($passwordLogin);

    if($userLogin->login()){
        $_SESSION["user"] = [
            "idUsuario" => $userLogin->getIdUsuario(),
            "nombreUser" => $userLogin->getNameUser(),
            "rol" => $userLogin->getIdRol()
        ];

        header("Location: inicio.php?bienvenido=true");
        exit;
    }

    header("Location: iniciarSesion.php?encontrado=false");
    exit;
}

?>