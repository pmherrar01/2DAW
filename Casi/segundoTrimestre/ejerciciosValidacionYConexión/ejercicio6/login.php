<?php

session_start();

require_once "./conexion.php";

$usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
$passwordUser = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";

try {

    $sql = "SELECT * from usuario where username = :usu";

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([
        ":usu" => $usuario
    ]);

    if (($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) != false) {
        if (password_verify($passwordUser, $fila["password"])) {
            $_SESSION['usuario'] = $fila['username'];
            header("Location: portal.php");
            exit;
        }else{
            echo "Contraseña incorecta";
            
        }
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>