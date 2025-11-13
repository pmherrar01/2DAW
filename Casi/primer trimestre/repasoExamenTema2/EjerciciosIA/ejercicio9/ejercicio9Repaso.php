<?php
/*Implementa una función sumaFlexible() que reciba una cantidad variable de números (usando el operador variadic ... ). La función debe devolver la suma total, ignorando cualquier argumento que no sea numérico. Si no recibe parámetros, debe devolver 0*/

function sumaFlexible(...$numeros){
    $suma = 0;
    foreach ($numeros as $num) {
        if(is_numeric($num)){
            $suma += $num;
        }
    }
    return $suma;
}

echo sumaFlexible(1, 2, 3, 'a', 4.5, null, 5);
echo sumaFlexible();

?>