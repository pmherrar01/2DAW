<?php

session_start();

require_once "./conexion.php";

$usuario = $_SESSION["user"];
$password = isset($_POST["password"]) ? trim($_POST["password"]) : "" ;
$newPassword = isset($_POST["newPassword"]) ? trim($_POST["newPassword"]) : "" ;

try {
    $sql = "SELECT * from usuario where username = :usu";

    $sentencia = $conexion ->prepare($sql);
    $sentencia->execute(["usu" => $usuario]);

    if(($fila = $sentencia->fetch(PDO::FETCH_ASSOC)) != false){
        if (password_verify($password, $fila["password"])) {
            $newPasswordSecurity = password_hash($newPassword, PASSWORD_DEFAULT);

            $sql1 = "UPDATE usuario SET password = :nuevaContrasena WHERE username = :usu";

                $sentencia = $conexion ->prepare($sql1);
                $sentencia->execute([":usu" => $usuario, ":nuevaContrasena" => $newPasswordSecurity]);

                header("Location: portal.php?cambio=ok");
                exit;
        }else{
            echo "La contraseña antigua no es correcta. ";
            exit;
        }
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>