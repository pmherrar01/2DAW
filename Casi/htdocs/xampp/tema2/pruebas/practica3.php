<!--Crea un script en PHP que muestre el día actual de la semana en español. Para ello:
● Utiliza la función date('l') para obtener el nombre del día en inglés.
● Traduce ese valor al español mediante una estructura switch.
● Finalmente, muestra si el año actual es bisiesto utilizando el operador
ternario: condición ? valor_si_verdadero : valor_si_falso.-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>practica3</title>
</head>

<body>
    <?php
    $day = date('l');

    switch ($day) {
        case "monday":
            $dia = "Lunes";
            break;
        case "tuesday":
            $dia = "Martes";
            break;
        case "wednesday":
            $dia = "miercoles";
            break;
        case "thuesday":
            $dia = "jueves";
            break;
        case "Friday":
            $dia = "viernes";
            break;
        case "saturday":
            $dia = "sabado";
            break;
        case "sunday":
            $dia = "domingo";
            break;

        default:
            echo "ese dia no existe";
            break;
    }

    echo "Hoy es {$dia} <br>";
    echo "Año bisiesto: ".(date('L') ?"SI":"NO");
    ?>

</body>

</html>