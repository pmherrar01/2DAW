<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios funciones</title>
</head>

<body>
    <?php
    /*
        Implementa una función sumaFlexible que reciba una cantidad variable de números y
        devuelva su suma total. La función debe ignorar cualquier argumento que no sea
        numérico. Devolverá 0 en el caso de que no reciba parámetros.
    */
    function sumaFlexible(...$numeros)
    {
        $suma = 0;
        foreach ($numeros as $num) {
            if (is_numeric($num)) {
                $suma += $num;
            }
        }
        return $suma;
    }

    echo "Suma:  " . sumaFlexible(2, 5) . "<br>";

    /*. 
        Implementa una función formateaCadenas que reciba una cantidad variable de cadenas
        y las devuelva todas en mayúsculas y separadas por guiones. Utiliza la función array_map
        (que permite aplicar strtoupper a cada elemento) y también implode
    */

    function formateaCadenas(...$cadenas)
    {
        $cadenasMayusculas = array_map('strtoupper', $cadenas);
        return implode('-', $cadenasMayusculas);
    }


    echo "Cadenas formateadas: " . formateaCadenas("hola", "me", "gusta", "php") . "<br>";

    /* 
        Implementa una función listaHTML que reciba una cantidad variable de elementos y los
        convierta en una lista HTML. La función devolverá una cadena con todo el código HTML
    */
    function listaHTML(...$elementos) {
        $codigo = "<ul>\n";
        foreach($elementos as $elemento){
            $codigo .= "<li> $elemento</li>\n";
        }
        $codigo .= "</ul>";
        return $codigo;

    }

    echo listaHTML("Perro", "Gato", "Agapornis");

    /*
        Crea una función longitudTotal que reciba una cantidad variable de cadenas y devuelva
        la suma total de sus longitudes.

    */
    function longitudTotal(...$cadenas){
        $sumaCadenas = 0;
        foreach($cadenas as $cadena){
            $sumaCadenas += strlen($cadena);
        }
        return $sumaCadenas;
    }
    echo "Longitud total: " . longitudTotal("jorge", "barriga", "borracho") . "<hr>";

    ?>
</body>

</html>