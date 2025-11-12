<!--Crea un array indexado con los números pares de 1 al 50. 
Usa un bucle for para mostrar los pares en orden ascendente y un bucle while para mostrarlos en orden descendente. 

Debes entregar el fuente como ej2_tunombre.php y una captura del navegador (pantalla completa).-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    for ($i=0; $i <= 50; $i+=2) { 
        $numPares[] = $i;
    }

    $tam = count($numPares);

    echo "<h2> Pares en orden ascendente con for: </h2>";
    //bucle for para mostrar los números pares en orden ascendente
    for ($i=0; $i < $tam; $i++) { 

            echo $numPares[$i] . " ";
        
    }
    echo "<h2> Pares en orden descendente con while: </h2>";
    //bucle while para mostrar los números pares en orden descendente
    $j = $tam -1;
    while ($j >= 0) {
        echo $numPares[$j] . " ";
        $j--;
    }

    ?>
</body>
</html>