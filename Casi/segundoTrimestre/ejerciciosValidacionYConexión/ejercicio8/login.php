<?php

session_start();

require_once "./conexion.php";

$user = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "" ;
$password = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "" ;

try {

    $sql = "SELECT * from usuario where username = :user";

    $sentencia = $conexion ->prepare($sql);
    $sentencia->execute([":user" => $user]);

    if (($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) != false) {
        if (password_verify($password, $fila["password"])) {
            $_SESSION['user'] = $fila['username'];
            header("Location: portal.php");
            exit;
        }else{
            header("Location: index.php?passwordEncontrada=false");
            exit;
        }
    }else{

    header("Location: index.php?userEncontrado=false");
    exit;

    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>