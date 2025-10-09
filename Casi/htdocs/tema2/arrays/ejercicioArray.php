<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EjercicioArray</title>
</head>
<body>
    <?php
    echo "<h1>Array de colores</h1>";
    $colores = ["rojo", "verde", "azul", "amarillo", "naranja"];
    $tamanio = count($colores);
    for ($i=0; $i < $tamanio; $i++) { 
        echo "Color[{$i}] = {$colores[$i]}<br>";
    }
    ?>
</body>
</html>