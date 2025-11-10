<?php
declare (strict_types= 1);
function suma(int $a, int $b): int {
    return $a + $b;
}

$num = 33;
echo "\n".suma(10,30);
echo "\n".suma(10,$num);
echo "\n".suma("10",30);
?>