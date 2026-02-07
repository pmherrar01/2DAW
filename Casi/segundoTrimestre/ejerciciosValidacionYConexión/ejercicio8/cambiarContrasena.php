<?php

session_start();

require_once "./conexion.php";

$user = $_SESSION["user"];
$contrasenaAntigua = isset($_POST["password"]) ? trim($_POST["password"]) : "";
$contrasenaNueva = isset($_POST["newPassword"]) ? trim($_POST["newPassword"]) : "";

try {

    $sql = "SELECT * from usuario where username = :usu";

    $sentencia = $conexion->prepare($sql);
    $sentencia->execute([":usu" => $user]);

    if (($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) != false) {
        if (password_verify($contrasenaAntigua, $fila["password"])) {
            $contrasenaNuevaSegura = password_hash($contrasenaNueva, PASSWORD_DEFAULT);

            $sql1 = "UPDATE usuario SET password = :nuevaContrasena WHERE username = :usu";

            $sentencia = $conexion->prepare($sql1);
            $sentencia->execute([
                ":nuevaContrasena" => $contrasenaNuevaSegura,
                ":usu" => $user
            ]);

            header("Location: portal.php?passwordChange=true");
            exit;

        } else {

            header("Location: perfil.php?passwordChange=false");
            exit;
        }
    }


} catch (PDOException $e) {
    echo $e->getMessage();
}

?>