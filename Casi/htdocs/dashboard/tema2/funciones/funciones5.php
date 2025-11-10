<?php

/*
function sumaParametros(){
    if (func_num_args() == 0){
        return false;
    }else{
        $suma = 0;
        for($i =0; $i< func_num_args(); $i++){
            $suma += func_get_arg($i);

        }

        return $suma;

    }
}

echo "Suma = ".sumaParametros(1,5,9);
*/

function sumarParametros(){
    $numeros = func_get_args();

    if ($numeros == null) {
        return "No se han pasado parametros";

    }else{
        $suma =0;
        for($i =0; $i < count($numeros); $i++){
            $suma += $numeros[$i];
        
    }
    return "La suma es: ".$suma;
}
}

$suma = sumarParametros();

if(is_numeric($suma)){
echo $suma;

}else{
    echo $suma;
}



?>