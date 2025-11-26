<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$nombre = "pablo";
$edad = 20;

echo '$_ENV';
foreach($_ENV as $clave => $valor){
echo "$clave => $valor <br>";
}

echo '$_SERVER: ';
foreach($_SERVER as $clave){
    echo "<br>$clave => $valor";
    if(is_array($valor))echo " ES ARRAY";
}


echo '$GLOBALS';
foreach($GLOBALS as $clave => $valor){
   if(!is_array($valor)) echo "<br>$clave => $valor";
}

?>

</body>
</html>