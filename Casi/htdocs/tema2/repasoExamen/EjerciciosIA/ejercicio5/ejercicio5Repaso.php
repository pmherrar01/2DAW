<?php
/*A partir del array del ejercicio anterior (o uno nuevo de 33 elementos aleatorios ), recorre el array y calcula: el número mayor, el número menor y la media de todos los valores */

$numeros = array();

for ($i = 0; $i < 33; $i++) {
    $numeros[] = rand(1, 100);
}

$mayor = max($numeros);
$menor = min($numeros);
$suma = array_sum($numeros);
$media = $suma / count($numeros);


echo "<ul>";
for ($i=0; $i < count($numeros) ; $i++) { 
    echo "<li>$numeros[$i]</li>";
}
echo "</ul>";

echo "El numero mayor es : {$mayor} <br>";
echo "El numeroo menor es el {$menor} <br>";
echo "La media es : {$media} <br>";

 ?>