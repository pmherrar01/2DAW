<?php
$nombre = !empty($_GET['nombre']) ? $_GET["nombre"] : "";
$apellido = !empty($_GET['apellidos']) ? $_GET["apellidos"]  : ""; 
$email = !empty($_GET['email']) ? $_GET["email"] : "nulo";
$paginaPersonal = !empty($_GET['url']) ? $_GET["url"] : "nulo";
$sexo = $_GET['sexo'] ?? "nulo";
$numconvivientes = !empty($_GET['convivientes']) ? $_GET['convivientes'] : "nulo";
$aficiones = $_GET['aficiones'] ?? [];
$estudios = !empty($_GET['estudios']) ? $_GET['estudios'] : "nulo";
$lenguajesProgramacion = $_GET['lenguajes'] ??[];


echo "Nombre: <br>" . $nombre . "<br>";
echo "Apellidos: <br>" . $apellido . "<br>";
echo "Email: <br>" . $email . "<br>";
echo "URL: <br>" . $paginaPersonal . "<br>";
echo "Sexo: <br>" . $sexo . "<br>";
echo "Nunmero de convivientes: <br>" . $numconvivientes . "<br>";
echo "Aficiones: <br>";
if(!empty($aficiones)){
    echo implode(", " , $aficiones);
}else{
    echo "Ninguna seleccionada <br>";
}
echo "Estudios: <br>" . $estudios  . "<br>" ;
echo "Lenguaes de programacion: <br>";
if(!empty($lenguajesProgramacion)){
    echo implode(", ", $lenguajesProgramacion);
}else{
    echo "Ninguna seleccionada <br>" ;
}




?>