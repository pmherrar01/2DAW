<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>

<body>
    <?php

    $productos = [
        ['nombre' => 'Sudadera', 'precio' => 70.00, 'stock' => 20],
        ['nombre' => 'Pantalón', 'precio' => 50.00, 'stock' => 15],
        ['nombre' => 'Camiseta', 'precio' => 25.00, 'stock' => 30],
        ['nombre' => 'Zapatos', 'precio' => 80.00, 'stock' => 9],
        ['nombre' => 'Gorra', 'precio' => 15.00, 'stock' => 5],
    ];

    echo "<table border='1'>";
    echo "<caption>Lista de Productos</caption>";
    echo "<tr><th>Nombre</th><th>Precio</th><th>Stock</th></tr>";


    foreach ($productos as $producto) {
        echo "<tr>";
        foreach ($producto as $clave => $valor) {
            echo "<td>$valor</td>";
        }
    }
    echo "</tr></table><br><br>";

    echo "Lista de productos que hay que reponer el stock por que es menor a 10:<br><br>";
        foreach ($productos as $producto) {

        if ($producto['stock'] < 10) {
            echo "Nombre: {$producto['nombre']}, Precio: {$producto['precio']}€, Stock: {$producto['stock']}<br>";
        }
    }

    echo "<br><br>";

    echo "Lista de productos cuyo precio es superior a 20€:<br><br>";
    foreach ($productos as $producto) {

        if ($producto['precio'] > 20) {
            echo "Nombre: {$producto['nombre']}, Precio: {$producto['precio']}€, Stock: {$producto['stock']}<br>";
        }
    }


    ?>
</body>

</html>