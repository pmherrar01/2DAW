<?php

require_once "./conexion.php";

$usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : "";
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : "";

if (strlen($usuario) >= 6 && strlen($usuario) <= 20 ) {
    $contrasenaSegura =  password_hash($contrasena, PASSWORD_DEFAULT);

    try {

    $sql = "INSERT INTO usuario (username, password, id_rol) VALUES (:usu, :securityPassword, :rol)";

    $sentencia = $conexion->prepare($sql);

    $sentencia->execute([
        ":usu" => $usuario,
        ":securityPassword" => $contrasenaSegura,
        ":rol" => 2
    ]);

    echo "Insertado correctamente!!";

    } catch (PDOException $e) {
        echo $e->getMessage();
    }


}else{
    echo "Error. La longitud del usuario es incorrecta, tiene que estar entre 6 y 20";
    echo "<a href='./index.html'> Volver al formulario </a>";
}

?>