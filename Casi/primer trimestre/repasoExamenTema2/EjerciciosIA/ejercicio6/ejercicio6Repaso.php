<?php 
/*
Crea un archivo HTML (.html) con un formulario (<form method="POST" ...>) que pida: nombre, apellidos, email y año de nacimiento. El formulario debe enviar los datos a un archivo PHP (.php) que los reciba (usando $_POST) y los muestre dentro de una tabla HTML.
*/ 

echo "<table border = '1'>";
echo "<tr><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Año de Nacimiento</th></tr>";
echo "<tr>";
echo "<th> " . $_POST['nombre'] . " </th>";
echo "<th> " . $_POST['apellidos'] . " </th>";
echo "<th> " . $_POST['email'] . " </th>";
echo "<th> " . $_POST['anio_nacimiento'] . " </th>";
echo "</table>";

?>