<?php

session_start();


$contrasenaAntigua = isset($_POST["password"]) ? trim($_POST["password"]) : "";
$contrasenaNueva = isset($_POST["newPassword"]) ? trim($_POST["newPassword "]) : "";



?>