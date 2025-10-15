<!-- Crea un array indexado con los 10 primeros números naturales.
  Muestra el contenido del array con foreach. Usa un bucle para calcular la suma total sin usar array_sum().

Debes entregar el fuente como ej1_tunombre.php y una captura del navegador (pantalla completa).-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
    $suma = 0;
    //Bucle para crear y rellenar el array
    for ($i=1; $i < 11; $i++) { 
        $numeros[] = $i;
    }

    echo "<h2> Contenido del array: ";
    //bucle para mostrar el array
    foreach ($numeros as $numero) {
        echo $numero. " ";
        $suma += $numero;
    }
    echo "</h2>La suma total es: " . $suma; 

    ?>
</body>
</html>