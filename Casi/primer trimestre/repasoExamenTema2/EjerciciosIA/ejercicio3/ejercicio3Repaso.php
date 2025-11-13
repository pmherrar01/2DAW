<?php 
/*
Enunciado: Define una variable $num (ej. $num = 7). Utiliza un bucle for para mostrar la tabla de multiplicar de ese número, del 1 al 10. (Ej. "7 x 1 = 7", "7 x 2 = 14", ...)
*/ 

$num = rand(0,10);

for ($i=0; $i < 11 ; $i++) { 
    echo "{$num} X {$i} = " . ($num * $i) . "<br>" ;
}

?>