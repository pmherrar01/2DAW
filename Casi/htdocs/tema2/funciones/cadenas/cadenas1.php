<?php
$frase = "Quien busca encuentra, eso dicen, a veces";
$pos1 = strpos($frase, ","); // encuentra la primera coma
echo "Encontrada la primera coma en la posicion: {$pos1}";
$pos2 = strrpos($frase, ","); // encuentra la última coma
echo "\nEncontrada la ultima coma en la posicion: {$pos2}";
$trasComa = strstr($frase, ","); // ", eso dicen, a veces"
echo "\nCadena a partir de la primera coma: {$trasComa}";
?>