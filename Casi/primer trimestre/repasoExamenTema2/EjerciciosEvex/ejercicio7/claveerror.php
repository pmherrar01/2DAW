<?php
if(isset($error)){
    if($error == "usuario"){
        echo "El usuario no existe";
    }else{
        echo "La constraseña es incorrecta";
    }
    
}

include "../ejercicio6/ejercicio6RepasoEvex.html";
?>