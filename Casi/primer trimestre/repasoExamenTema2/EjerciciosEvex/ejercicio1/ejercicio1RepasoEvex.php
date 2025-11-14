<?php
/*
: Crea las siguientes funciones con tipificación estricta:
● Una función esPar, que averigüe si un número pasado por parámetro es par.
La función devolverá true si es par, false en caso contrario.
● Escribe una función arrayAleatorio, que genere y devuelva un array con una
cantidad determinada de elementos. Cada elemento debe ser un número
aleatorio comprendido entre un valor mínimo y un valor máximo. La cantidad
de elementos, el valor mínimo y el valor máximo se recibirán como parámetros
de la función. Si no se indica al llamar a la función, el mínimo será 1 y el
máximo será 100 por defecto.
● Una función filtrarPares, que recibe un array por referencia y elimina todos
los números impares, dejando solo los pares. Una vez eliminados los pares, el
array se reindexará y ordenará.
Llama a las funciones para hacer todas las pruebas necesarias y mostrar los
contenidos de los arrays (ya sabéis que implode o print_r es lo más rápido).
 */
declare(strict_types = 1);
function esPar( int $numero): bool
{

    if ($numero % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function arrayAleatorio(int $cantidad,int $maximo = 100, int $minimo = 1): array
{
    $aAleatorio = [];

    for ($i = 0; $i < $cantidad; $i++) {
        $aAleatorio[] = rand($minimo, $maximo);
    }

    return $aAleatorio;
}

function borrarImpares(array &$array): void 
{
    foreach ($array as $key => $num) {
        if (!esPar($num)) {
            unset($array[$key]);
        }
    }

    sort($array);
}


$aAleatoro = arrayAleatorio(6);
borrarImpares($aAleatoro);

echo implode ( "|", $aAleatoro);
?>