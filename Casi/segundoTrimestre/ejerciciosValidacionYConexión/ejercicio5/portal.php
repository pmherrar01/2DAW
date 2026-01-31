<?php

session_start();

if (!isset($_SESSION['usu'])) {
    // ... lo mandamos fuera, al login.
    header("Location: index.html");
    exit;
}else{

echo "<h1>Bienvenido" . $_SESSION['usu'] . "</h1>";
}
?>