<?php
// test_registro.php
require_once "dataBase.php";
require_once "user.php";

$db = new Database();
$conexion = $db->conectar();
$usuario = new User($conexion);

// Vamos a crear un usuario nuevo de prueba
$usuario->setUserName("prueba_final");
$usuario->setPassword("1234"); 
$usuario->setIdRol(2);

echo "Intentando registrar usuario 'prueba_final' con pass '1234'...<br>";

if($usuario->registrar()) {
    echo "<h1 style='color:green'>¡ÉXITO! Usuario creado.</h1>";
    echo "Ahora ve al login e intenta entrar con: <b>prueba_final</b> y contraseña <b>1234</b>";
} else {
    echo "<h1 style='color:red'>ERROR al registrar.</h1>";
    echo "Revisa que la tabla se llame 'usuario' y tenga las columnas 'username', 'password', 'id_rol'.";
}
?>