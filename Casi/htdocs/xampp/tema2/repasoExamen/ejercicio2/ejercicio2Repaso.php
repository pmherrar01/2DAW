<?php
/*
Define una variable $numero. Escribe un script que muestre por pantalla si ese número es "positivo", "negativo" o "cero".
 */

$minimo = -100000000000000000;
$maximo = 100000000000000000;
$numero = rand($maximo, $minimo);


switch ($numero) {
    case $numero > 0:
        echo "El número $numero es positivo.";
        break;
    case $numero < 0:
        echo "El numero $numero es negativo";
        break;
    default:
        echo "El numero es cero";
        break;
}
