<?php
//tipos de arrays
$frutas = array("naranja", "pera", "manzana");
$notas = [5, 7.25, 9, 4, 3.8, 10];
$capitales = [];
$capitales[] = "Madrid";
$capitales[] = "Lisboa";
$capitales[] = "París";
print_r($frutas);

$persona = [
    "nombre" => "Laura",
    "edad" => 30,
    "ciudad" => "Madrid"
];

echo "{$persona['nombre']}, es de {$persona['ciudad']} y tiene {$persona['edad']} años";
var_dump($notas);


?>