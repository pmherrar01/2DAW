<?php
function precio_con_iva(){
    global $precio;

    $precio *= 1.18;
    print "El precio con iva es ".$precio;
}

$precio = 10;
precio_con_iva();

?>