<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo __LINE__;
    echo "<br>".__FILE__;
    echo "<br>".basename(__FILE__);
    echo "<br>".__DIR__;
    $a = 5;
    $b = $a++;
    ?>
</body>
</html>