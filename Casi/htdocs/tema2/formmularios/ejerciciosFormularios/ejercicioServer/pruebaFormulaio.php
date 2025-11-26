<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php

echo'$_SERVER["PHP_SELF"]= '. $_SERVER["PHP_SELF"];

echo "<br>" . $_GET["nombre"];

?>

    <form method="get" action=" <?=  htmlspecialchars($_SERVER['PHP_SELF']) ?>">
        <label for="nombre"><b>nombre</b></label>
        <input type="text" name="nombre" id="nombre">

        <input type="submit" value="ENVIAR">
    </form>
</body>



</html>