<?php
function calcular_precio_con_iva($precio){
    $precio_iva = $precio * 1.18;
    return number_format($precio_iva, 2);
}

$precio_base = 50.25;
$total = calcular_precio_con_iva($precio_base);
echo "El precio con IVA  {$total} €";

?>