<?php 
/*
Rellena un array con 50 números aleatorios comprendidos entre 0 y 99. Luego, muestra todos los números en una lista desordenada (<ul><li>...</li></ul>). (Usa la función rand() para generar los números aleatorios).

*/ 

$numeros = array();

for ($i=0; $i < 10; $i++) { 
    $numeros [] = rand(0, 99);
}

echo "<ul>";
for ($i=0; $i < count($numeros) ; $i++) { 
    echo "<li>" . $numeros[$i] . "</li>";
}
echo "</ul>";
?>