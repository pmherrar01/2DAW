<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba3</title>
</head>
<body>
    <?php
        $a = 7;

        function contador()  {
            global $a;
            echo $a;// local
        }

        contador();
    ?>
</body>
</html>