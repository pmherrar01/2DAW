<?php 
/*Crea un array de 10 números aleatorios del 1 al 100.

Usa array_map() con una función flecha (fn)  para crear un nuevo array con el doble de cada número.

Usa array_filter() con una función anónima (function)  para crear un nuevo array que contenga solo los números pares del array original. */

$numerosAleatorios = [];

for($i = 0; $i < 10; $i++){
    $numerosAleatorios[] = rand(1, 100);
}

$numDobles =  array_map(fn($n) => $n *2, $numerosAleatorios);

echo "Numeros aleatorios : <br>";
foreach($numerosAleatorios as $num){
    echo "[{$num}]";
}


echo "<br>Numeros dobles : <br>";
foreach($numDobles as $num){
    echo "[{$num}] ";
}


?>