<?php
$titulo = "Página con includes";
include("encabezado.php"); //También válido: include “encabezado.php”;
?>
<h1><?= $titulo ?></h1>
<?php
include"pie.html";
?>
