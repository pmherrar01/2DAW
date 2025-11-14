<?php
/*
haciendo uso de un array que almacene el nombre de las
funciones del archivo anterior, a partir de dos números recibidos por URL, recorre el
array e invoca a las funciones de manera dinámica haciendo uso de funciones
variable.
 */
declare(strict_types = 1);

require_once './../ejercicio4/ejercicio4RepasoEvex.php';

 $funciones = ["sumar","restar","multiplicar","dividir"];

$num1 = (float)($_GET['num1'] ?? 0);
$num2 = (float)($_GET['num2'] ?? 0);

foreach($funciones as $nombreFuncion ){
    $resultado = $nombreFuncion($num1, $num2);

    if ($resultado === null) {
        echo "Resultado de $nombreFuncion: No se puede dividir por cero <br>";
    } else {
        echo "Resultado de $nombreFuncion {$num1} y {$num2}: $resultado <br>";
    }
}

?>