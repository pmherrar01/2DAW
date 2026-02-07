<?php

session_start();

    if(isset($_SESSION["user"]) != false){
            header("Location: index.php?iniciado=false");
    }

require_once "./conexion,php";






try {

    $sql = "";

} catch (PDOException $e) {
    echo $e->getMessage();
}


?>