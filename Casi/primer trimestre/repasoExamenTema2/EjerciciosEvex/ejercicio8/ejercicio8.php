<?php
/*
A partir de una frase, devuelve la cantidad de cada una de las
vocales, y el total de ellas.
*/
declare(strict_types=1);
function contarVocales(string ...$frases): array
{

    $fraseMinuscula = strtolower(implode("", $frases));

    $aLetras = str_split($fraseMinuscula);



    $conteo = [
        'a' => 0,
        'e' => 0,
        'i' => 0,
        'o' => 0,
        'u' => 0,
        'total' => 0
    ];


        foreach ($aLetras as $letra) {

            // Comprobamos si la letra es una vocal
            switch ($letra) {
                case 'a':
                    $conteo['a']++;
                    $conteo['total']++;
                    break; // 'break' para salir del switch

                case 'e':
                    $conteo['e']++;
                    $conteo['total']++;
                    break;

                case 'i':
                    $conteo['i']++;
                    $conteo['total']++;
                    break;

                case 'o':
                    $conteo['o']++;
                    $conteo['total']++;
                    break;

                case 'u':
                    $conteo['u']++;
                    $conteo['total']++;
                    break;


            }
        }
    




    return $conteo;

}



print_r(contarVocales("hola Mundo", "VIVIR LA vida"));
?>