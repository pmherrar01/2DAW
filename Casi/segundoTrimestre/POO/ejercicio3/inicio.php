<?php
session_start(); // Recuerda: session_start va AL PRINCIPIO, antes de cualquier require

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php?error=true");
    exit;
}

$userLogueado = $_SESSION["usuario"]; // Esto ahora es un array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <h1>Bienvenido <?php echo htmlspecialchars($userLogueado["username"]); ?></h1>
</body>
</html>