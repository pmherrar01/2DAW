<?php

function saluda($nombre, $prefijo = "Sr"){
    echo "\nHola {$prefijo} {$nombre}";
    echo "\nNos ponemos en contacto con usted.";
}

saluda("Juan","Mr");
saluda("Paula","Srta");
saluda("Juan");

?>