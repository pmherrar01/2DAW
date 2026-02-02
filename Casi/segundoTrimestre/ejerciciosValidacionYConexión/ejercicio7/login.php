<?php

session_start();

require_once "./conexion.php";

$user = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";



try {

    $sql = "SELECT * from usuario where username = :usu";

    $sentencia = $conexion ->prepare($sql);
    $sentencia->execute([":usu" => $user]);

    if (($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) != false) {
        if (password_verify($contrasena, $fila["password"])) {
            $_SESSION['user'] = $fila["username"];
            header("Location: portal.php");
            exit;
        }else{
            echo "Contraseña incorrecta";
        }
    }else{
        echo "Usuario no existente";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>