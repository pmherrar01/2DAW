<?php
/*
function duplica_valor($num){
    $num *= 2;
    echo"Valor dentro de la funcion (por valor): $num";

}

$valor = 5;
duplica_valor($valor);
echo "\nValor fuera de la funcion: $valor";*/ 

function duplicar_referencia(&$num){
    $num *= 2;
    echo"Valor dentro de la funcion (por referencia): $num \n";

}

$valor = 5;
duplicar_referencia($valor);
echo "Valor fuera de la funcion: $valor";

?>