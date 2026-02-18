<?php
// validarLogin.php - MODO DETECTIVE 🕵️‍♂️
session_start();

require_once "dataBase.php";
require_once "user.php"; // Asegúrate que el archivo se llame user.php (minúscula/mayúscula importa)

echo "<h1>🔍 Analizando datos recibidos...</h1>";

// 1. ¿Llegan los datos del formulario?
echo "<h3>1. Datos que llegan por POST:</h3>";
echo "<pre>";
var_dump($_POST);
echo "</pre>";

$nameUser = isset($_POST["nombreUsuario"]) ? trim($_POST["nombreUsuario"]) : "";
$passwordUser = isset($_POST["password"]) ? trim($_POST["password"]) : "";

echo "Usuario limpio: [" . $nameUser . "]<br>";
echo "Contraseña limpia: [" . $passwordUser . "]<br>";

// 2. Probamos a meterlos en el objeto
echo "<h3>2. Cargando el objeto Usuario...</h3>";
$dataBase = new DataBase();
$user = new User($dataBase->conectar());

if($nameUser != "" && $passwordUser != ""){
    $user->setUserName($nameUser);
    $user->setPassword($passwordUser);
    
    echo "✅ Datos cargados en el objeto.<br>";
    echo "Objeto tiene username: [" . $user->getUserName() . "]<br>";
    
    // 3. Intentamos el Login
    echo "<h3>3. Intentando Login...</h3>";
    $resultadoLogin = $user->login();
    
    if($resultadoLogin){
        echo "<h1 style='color:green'>🎉 ¡LOGIN EXITOSO!</h1>";
        echo "El problema estaba en la redirección o en la sesión.<br>";
        
        // Vemos si se hidrató bien (IMPORTANTE)
        echo "ID recuperado: " . $user->getId() . "<br>";
        echo "Rol recuperado: " . $user->getIdRol() . "<br>";
        
        $_SESSION["usuario"] = $user;
        echo "<br><a href='inicio.php'>➡️ Pulsa aquí para ir a Inicio manualmente</a>";
        
    } else {
        echo "<h1 style='color:red'>❌ EL LOGIN FALLÓ</h1>";
        echo "El usuario/contraseña no coinciden en la base de datos (según el método login).";
    }

} else {
    echo "<h1 style='color:orange'>⚠️ CAMPOS VACÍOS</h1>";
    echo "Parece que las variables llegaron vacías.";
}
?>