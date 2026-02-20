<?php
// crear_admin.php

require_once "dataBase.php"; // Traemos tu clase de base de datos

echo "<h1>👑 Creador de Administradores</h1>";

try {
    // 1. Conectamos a la base de datos
    $db = new DataBase();
    $conexion = $db->conectar();

    if(!$conexion) {
        die("<p style='color:red'>❌ Error: No se pudo conectar a la base de datos. Revisa dataBase.php</p>");
    }

    // 2. Definimos los datos del SUPER USUARIO
    $nombreAdmin = "jefazo"; // El nombre que usarás en el login
    $passAdmin = "1234";     // La contraseña fácil para probar
    $rolAdmin = 1;           // ¡El rol mágico número 1!

    // 3. Preparamos la SQL (directo a la tabla usuario)
    $sql = "INSERT INTO usuario (username, password, id_rol) VALUES (:usu, :pass, :rol)";
    $sentencia = $conexion->prepare($sql);

    // 4. Ejecutamos y encriptamos la contraseña al vuelo
    $resultado = $sentencia->execute([
        ":usu" => $nombreAdmin,
        ":pass" => password_hash($passAdmin, PASSWORD_DEFAULT),
        ":rol" => $rolAdmin
    ]);

    if ($resultado) {
        echo "<h2 style='color:green'>✅ ¡ÉXITO! Administrador creado.</h2>";
        echo "<p>Ya puedes ir al Login e iniciar sesión con:</p>";
        echo "<ul>";
        echo "<li>Usuario: <b>" . $nombreAdmin . "</b></li>";
        echo "<li>Contraseña: <b>" . $passAdmin . "</b></li>";
        echo "</ul>";
        echo "<p>⚠️ <i>Nota: Si recargas esta página te dará error porque el usuario 'jefazo' ya existirá.</i></p>";
    } else {
        echo "<h2 style='color:red'>❌ Algo falló al insertar.</h2>";
    }

} catch (PDOException $e) {
    echo "<h2 style='color:red'>❌ Error de Base de Datos:</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
}
?>