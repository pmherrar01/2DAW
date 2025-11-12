<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uno</title>
</head>

<body>
    <?php
        $ciclo = "Desarrollo de aplicaiones web";

        echo "<h3>HEREDOC:</h3>";

        $a = <<< 'ID'
        $ciclo
        Módulo : Desarollo web n entorno servidor 
        curso: 2025-202 \t Grupo: 2W Diurno
        ID;
        echo $a;
        echo "<pre>".$a."</pre>";
        echo nl2br($a);

    ?>
</body>

</html>