<?php
declare(strict_types = 1);

include "ej1biblioteca_pablomanuel.php";

$aTabla = generaAN(5,4);
echo "<table border=1>";
    foreach($aTabla as $fila){
        echo "<tr>";
        foreach($fila as $dato){
            echo "<td>" . $dato. "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

$aNumeros = filtrarPares(5);
echo "<br>Array con pares: <br>";
foreach($aNumeros as $valor){
    echo $valor . "- ";
}

?>