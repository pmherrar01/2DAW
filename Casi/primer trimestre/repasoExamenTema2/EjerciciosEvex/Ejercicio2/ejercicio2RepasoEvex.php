<?php 
/* 
 Crea las siguientes funciones con tipificación estricta:
● Una función que devuelva el mayor de todos los números recibidos como
parámetros: function mayor(). Utiliza las funciones func_get_args(), etc... No
puedes usar la función max().
● Implementa una función llamada concatenar() que reciba un número
indeterminado de cadenas de texto mediante el operador variadic (...). La
función debe realizar los siguientes pasos:
1. Eliminar los espacios en blanco al inicio y al final de cada cadena.
2. Convertir la primera letra de cada palabra a mayúscula y resto en
minúscula (capitalizar).
3. Concatenar todas las cadenas procesadas, separándolas con el
símbolo menor (<). Finalmente, la función devolverá la cadena
resultante.
Para probar la segunda función y comprobar que funciona correctamente,
debes llamarla con estos parámetros:
 concatenar("pERRo "," GAto", " ErIzO ", "AGAPornIS").

*/

function mayor(): int{
    $mayor = 0;

    $cantidadParametros = func_num_args();

    if($cantidadParametros == 0){
        return 0;
    }

    $numeros = func_get_args();

    $mayor =$numeros[0];

    for($i = 0; $i < $cantidadParametros; $i++){
        if($numeros[$i] > $mayor){
            $mayor = $numeros[$i];
        }
    }

    return $mayor;
}

function concatenar(...$cadenas){
    $cadenaLimpia = trim($cadenas);
}

echo "El mayor de (1,3,8,2) es: " .  mayor(1,3,8,2);

?>