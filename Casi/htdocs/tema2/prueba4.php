<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>prueba4
    </title>
</head>

<body>
    <?php
    $nombre = "pablo";
    $curso = "2DAW";
    ?>

    <table>
        <tr>
            <td>nombre</td>
            <td>CURSO</td>
        </tr>
        <tr>
            <td>
                <?php
                echo $nombre;
                ?>
            </td>
            <td>
                <?php
                echo $curso;
                ?>

            </td>
        </tr>
    </table>
</body>

</html>