<?php

require_once "./conexion.php";

$usu = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
$password = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";



try {

    $sql = "SELECT * from usuario WHERE username = :usu";
    $sentencia = $conexion->prepare($sql);


    $sentencia->execute([
        ":usu" => $usu
    ]);

    if (($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) != false ) {
        if (password_verify($password, $fila["password"])) {
            echo "acceso permitido, bienVenido!";
        }else{
            echo"Error, contraseña incorrecta.";
        }
    } else{
        echo "Error el usuario no existe";
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}

?>