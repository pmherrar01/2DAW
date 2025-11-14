<?php
/*
Crea una función que permite generar una letra aleatoria,
mayúscula o minúscula.
 */
declare(strict_types = 1);
 function letrarAleatoria(): string{
    $letraAlelatoria = "";
    $opcion = rand(0,1);

    if($opcion === 1) {
        $letraAlelatoria =  rand(97, 122);
    }else{
        $letraAlelatoria =  rand(65, 90);
    }

    return chr($letraAlelatoria);

 }


 echo letrarAleatoria();
?>