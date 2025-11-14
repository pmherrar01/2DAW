<?php
/*
recibe los datos y comprueba si son correctos. Los
usuarios válidos estarán almacenados en un array bidimensional, donde cada
elemento es un array asociativo con las clave “usuario” y “passwd”. El script
comprobará si el usuario existe y la contraseña es correcta, pasando el control
mediante el uso de include a:
○ claveok.php: El usuario introducido es correcto
○ claveerror.php: credenciales incorrectas. Informar si el error es que
el usuario no existe o contraseña incorrecta (pasar por URL si
error=usuario o error=passwd). Volver a mostrar el formulario de acceso.
 */
declare(strict_types = 1);
 $usuarios = [
    ["usuario" => "pablo", "passwd" => "pablo123"],
    ["usuario" => "pedro", "passwd" => "pedro123"],
    ["usuario" => "guada", "passwd" => "guada123"],
    ["usuario" => "jony", "passwd" => "jony123"],
    ["usuario" => "saul", "passwd" => "saul123"],
 ];

 $usuario = $_POST["usuario"] ?? "";
 $contrasena = $_POST["contrasena"] ?? "";

 function validarLogin(array $aUsuarios, string $usuarioABuscar, string $contrasenaABuscar): void{
    $usuarioEcontrado = false;
    $loguinFallado = false;
    foreach($aUsuarios as $datosUsuarios){
        if($datosUsuarios["usuario"] === $usuarioABuscar){
            $usuarioEcontrado = true;
            if($datosUsuarios["passwd"] === $contrasenaABuscar){
                $loguinFallado = true;
            }
        }
    }
    if(!$loguinFallado){
        if($usuarioEcontrado){
            $error = "contraseña";
        }else{
            $error = "usuario";
        }

        include "claveerror.php";

    }else{
        include "claveok.php";
    }
 }


 validarLogin($usuarios, $usuario, $contrasena);
?>