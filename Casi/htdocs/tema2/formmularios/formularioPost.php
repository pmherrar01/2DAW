<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulariophp</title>
</head>
<body>
    Hola <?= htmlspecialchars($_POST['nombre'] )?>
    <br>Has elegido el numero <?= $_POST['numero'] ?>
    <br><a href="./formulario1.html">Volver al formulario</a>

    <?php
    foreach($_POST as $clave => $valor){
        echo "<br> $clave => $valor var_dump: ";
        var_dump($valor);
    }
    ?>
</body>
</html>