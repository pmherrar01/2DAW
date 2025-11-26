<?php 
declare(strict_types = 1);

function generaAN(int $columna, int $fila): array {

    $tabla = [[]];

    for($i = 0; $i < $fila; $i++){

        for($j = 0; $j < $columna; $j++){

            $valor = rand(0,1);

            ($valor === 0) ? $tabla[$i][$j] = "N" : $tabla[$i][$j] = "A";
             
        }

    }

    return $tabla;
}

function filtrarPares($cantidadNum, $valorMinimo = 1 , $valoMaximo = 100): array{
    $anumerosAle = [];

    for ($i=0; $i < $cantidadNum ; $i++) { 

        $anumerosAle[$i] = rand($valorMinimo , $valoMaximo);

    }

    echo "ELEMENTOS DEL ARRAY GENERADOS EN LA FUNCIÓN:<br>";
    foreach ($anumerosAle as $value) {
        echo "{$value} - ";
    }

    
    $afiltrado = array_filter($anumerosAle, fn($numero)=> ($numero %2 ===0));

  // print_r($afiltrado);

    return $afiltrado;

}

//filtrarPares(5);

/*function mostrarTabla(array $tabla, $columna, $fila){
    echo "<table border=1>";
    foreach($tabla as $fila){
        echo "<tr>";
        foreach($fila as $dato){
            echo "<td>" . $dato. "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


mostrarTabla(generaAN(4,5), 4,5);

*/

?>