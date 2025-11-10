<?php
$productos = [
    "goma" => 0.4,
    "lapiz" => 0.6,
    "cuaderno" => 3.2,
    "estuche" => 9.95,
    "boligrafo" => 0.8
];

echo "<h1>Productos y precios</h1> \n";

foreach ($productos as $precio) {
    $precio2 = number_format($precio,2);
    echo "$precio \n";
}

foreach ($productos as $nombre => $precio) {
    $precio2 = number_format($precio,2);
    echo "nombre: {$nombre} precio: {$precio}€ \n";
}


?>