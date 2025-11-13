<?php
/*
Crea un array asociativo que almacene el nombre y la altura de 5 personas (ej. 'Juan' => 180). Recorre el array y muéstralo en una tabla HTML. Finalmente, calcula y muestra la altura media del grupo.
*/ 

$personas = array(
    "Jorge"=>180,
    "Ana"=>165,
    "Luis"=>175,
    "Marta"=>160,
    "Sofía"=>170
);

echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Altura (cm)</th></tr>";
foreach($personas as $nombre => $altura){
    echo "<tr><td>$nombre</td><td>$altura</td></tr>";
}
echo "</table>";

?>