<?php
$num1 = 5;
$num2 = 4;

$miClosure = function() use ($num1, $num2) {
   echo $num1 + $num2;

};

$miClosure();
echo $num1, $num2;
echo $num2;
?>