<?php

session_start();

require_once "user.php";
require_once "dataBase.php";


$nameUsuNew = isset($_POST["nombreUsuario"]) ? $_POST["nombreUsuario"] : "";
$passNewUser = isset($_POST["password"]) ? $_POST["password"] : "";

$db = new DataBase();

$newUser = new User($db->conectar());



if(!empty($nameUsuNew) && !empty($passNewUser)){

$newUser->setUserName($nameUsuNew);
$newUser->setPassword($passNewUser);

if($newUser->registrar()){
    $_SESSION["usuario"]  = [
        "idUsuario" => $newUser->getIdUsuario(),
        "nombreUser" => $newUser->getUserName(),
        "rol" => $newUser->getIdRol()
    ];

    header("Location: iniciarSesion.php?registro=true");
    exit;

}

header("Location: registrar.php?registro=false");
exit;

}

?>