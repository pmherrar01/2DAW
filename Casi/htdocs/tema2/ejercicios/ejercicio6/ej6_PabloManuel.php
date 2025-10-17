<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Pablo Manuel Herrera Rodriguez">
    <title>Ejercicio 6</title>
</head>
<body>
    <?php

    for($i = 0; $i < 5; $i++){
        $aAle1[] = rand(1, 100);
        $aAle2[] = rand(1, 100);
    }

    echo "<h2>Primer array de numeros aleatorios: ";
    foreach($aAle1 as $num){
        echo "{$num} ";
    }

    echo "<br><br>";

    echo "Segundo array de numeros aleatorios: ";
    foreach($aAle2 as $num){
        echo "{$num} ";
    }

    echo "<br><br>";

    $aTotal = array_merge($aAle1, $aAle2);
    sort($aTotal);    
    echo "Array ordenado de menor a mayor  ";
    echo implode(", ",$aTotal) . "<br><br>";
    rsort($aTotal);    
    echo "Array ordenado de mayor a menor ";
    echo implode(", ",$aTotal);
    echo "</h2>";
    

    ?>
</body>
</html>