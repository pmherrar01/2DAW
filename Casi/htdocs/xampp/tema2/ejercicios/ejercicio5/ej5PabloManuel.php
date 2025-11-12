<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 5</title>
    <meta name="author" content="Pablo Manuel Herrera Rodriguez">
</head>

<body>
    <?php
    $alumnos = [
        ["nombre" => "Sara", "edad" => 19, "Nota" => 8.2],
        ["nombre" => "Juan", "edad" => 18, "Nota" => 9.3],
        ["nombre" => "Andrés", "edad" => 20, "Nota" => 3.5],
        ["nombre" => "María", "edad" => 21, "Nota" => 6.2],
        ["nombre" => "Pedro", "edad" => 25, "Nota" => 4.1],
    ];
    $notas =  array_column($alumnos, 'Nota');
    $media = array_sum($notas) / count($notas);
    $notaAlta = max($notas);
    $notaBaja = min($notas);

    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Edad</th><th>Nota</th></tr>";


    foreach ($alumnos as $alumno) {
        echo "<tr>";
        foreach ($alumno as $valor) {
            echo "<td>{$valor}</td>";
        }
        echo "</tr>";
    }


    echo "</table>";

    echo "<p>Nota media: {$media}  </p>";
    echo "<p>Nota más alta: {$notaAlta}  </p>";
    echo "<p>Nota más baja: {$notaBaja}  </p>";



    ?>
</body>

</html>