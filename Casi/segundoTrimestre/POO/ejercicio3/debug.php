<?php
// debug.php - El Chivato

// Ajusta esto si tus archivos se llaman diferente (mayúsculas/minúsculas)
require_once "dataBase.php";
require_once "user.php"; 

echo "<h1>🕵️‍♂️ Informe del Detective PHP</h1>";

// 1. Probamos la conexión
try {
    $db = new DataBase();
    $conn = $db->conectar();
    echo "<p style='color:green'>✅ Conexión a Base de Datos: OK</p>";
} catch (Exception $e) {
    die("<p style='color:red'>❌ Error de Conexión: " . $e->getMessage() . "</p>");
}

// CAMBIA ESTO por el usuario que estás intentando probar
$usuarioPrueba = "prueba_final"; 
$passwordPrueba = "1234";

echo "<h3>Analizando usuario: '<strong>$usuarioPrueba</strong>'</h3>";

// 2. Buscamos 'a mano' en la base de datos (sin usar la clase User todavía)
$sql = "SELECT * FROM usuario WHERE username = :u"; // Asegúrate que tu tabla se llama 'usuario'
$stmt = $conn->prepare($sql);
$stmt->execute([':u' => $usuarioPrueba]);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

if ($resultado) {
    echo "<p style='color:green'>✅ El usuario EXISTE en la tabla 'usuario'.</p>";
    
    // Mostramos datos (Cuidado, esto es solo para debug)
    echo "<ul>";
    echo "<li><strong>ID:</strong> " . ($resultado['id_usuario'] ?? $resultado['id'] ?? '¿Nombre columna ID?') . "</li>";
    echo "<li><strong>Hash guardado:</strong> " . $resultado['password'] . "</li>";
    echo "</ul>";

    // 3. Verificamos la contraseña
    echo "<h3>Verificando contraseña...</h3>";
    if (password_verify($passwordPrueba, $resultado['password'])) {
        echo "<p style='color:green; font-weight:bold; font-size:20px'>✅ ¡LA CONTRASEÑA COINCIDE!</p>";
        echo "El problema debe estar en validarLogin.php o en la sesión.";
    } else {
        echo "<p style='color:red; font-weight:bold; font-size:20px'>❌ LA CONTRASEÑA FALLA</p>";
        echo "<p><strong>Explicación:</strong> Lo que hay en la base de datos NO coincide con '$passwordPrueba'.<br>";
        
        // Pista clave
        if ($resultado['password'] == $passwordPrueba) {
            echo "⚠️ <strong>¡ALERTA!</strong> Veo que la contraseña en la BD es texto plano ('$passwordPrueba'). <br>
            El sistema de login USA encriptación. <strong>No puedes insertar usuarios manualmente desde PHPMyAdmin</strong> escribiendo la contraseña normal. <br>
            Tienes que usar el método registrar() de tu código para que la encripte.</p>";
        } else {
            echo "El hash no corresponde. Quizás registraste otra contraseña.</p>";
        }
    }

} else {
    echo "<p style='color:red; font-weight:bold; font-size:20px'>❌ USUARIO NO ENCONTRADO</p>";
    echo "<p>He buscado en la tabla <code>usuario</code> el nombre <code>$usuarioPrueba</code> y no sale nada.<br>";
    echo "Verifica: <br>1. ¿La tabla se llama 'usuario' o 'usurio'? <br>2. ¿El usuario tiene algún espacio extra? (Ej: 'Pepe ')</p>";
}
?>