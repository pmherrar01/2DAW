<?php
/*
crea la función digitos, que cuenta el número de cifras de un
número natural. La función recibe como parámetro un número y devuelve la cantidad
de dígitos. Devolverá 0 si el número es negativo.
*/
declare (strict_types = 1);
function digitos(int $num): int{

    if ($num < 0) {
        return 0;
    }
    $cadenaNum = (string) $num;
    $longitud = strlen($cadenaNum);

    return $longitud;

}

echo "EL numero 30 tiene una cantidad de: " . digitos(30) . " digitos";

?>