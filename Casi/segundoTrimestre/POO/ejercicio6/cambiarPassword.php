<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: index.php?error=true");
    exit;
}

if ($_SESSION["user"]["rol"] != 1) {
    header("Location: inicio.php?rol=false");
    exit;
}

require_once "user.php";
require_once "dataBase.php";

$db = new DataBase();
$userChangePass = new User($db->conectar());

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $idUserChangePass = isset($_GET["idUsu"]) ? $_GET["idUsu"] : 0;
    $pass = isset($_POST["contrasenaNueva"]) ? $_POST["contrasenaNueva"] : 0;

    if (!empty($idUserChangePass) && $idUserChangePass != 0) {
        if ($userChangePass->actualizarContrasena($idUserChangePass, $pass)) {
        header("Location: admin.php?cambioPass=true");    
        exit;
        };
    }else{
        header("Location: admin.php?cambioPass=false");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <label for="">Contraseña nueva:</label>
        <input type="password" name="contrasenaNueva"><br>
        <button type="submit">Cambiar</button>
    </form>
</body>

</html>