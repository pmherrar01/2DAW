<?php
/*
crea un archivo con funciones para sumar, restar, multiplicar y
dividir dos números.
 */
declare(strict_types = 1);

 function sumar(int|float $a, int|float $b): float{
    return $a + $b;
 }



 function restar(int|float $a, int|float $b): float{
    return $a - $b;
 }


 function multiplicar(int|float $a, int|float $b): float{
    return $a * $b;
 }


 function dividir(int|float $a, int|float $b): float|null{
    if($b == 0){
        return null;
    }
    
    return $a / $b;
 }

?>