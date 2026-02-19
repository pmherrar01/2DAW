<?php

session_start();

require_once "user.php";
require_once "dataBase.php";

$db = new DataBase();
$newUser = new User($db->conectar());

$nameNewUser = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
$passwordNewUser = isset($_POST["password"]) ? $_POST["password"] : "";

if (!empty($nameNewUser) && !empty($passwordNewUser)) {

    $newUser->setNameUser($nameNewUser);
    $newUser->setPassword($passwordNewUser);

    if ($newUser->registrar()) {
        $_SESSION["user"] = [
            "idUsuario" => $newUser->getIdUsuario(),
            "nombreUser" => $newUser->getUserName(),
            "rol" => $newUser->getIdRol()
        ];

        header("Location: iniciarSesion.php?registro=true");
        exit;
    }

    header("Location: registar.php?registro=false");
    exit;
}
