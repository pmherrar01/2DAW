<?php
    function crearUsuario($nombre, $rol = "usuario", $activo = true){
        echo "$nombre - rol: $rol - Activo: ". ($activo ? "Si" : "No ");
    }

    //Lamada tradicional (por omision)
    crearUsuario("Ana", "admin", false);

    //llamada con nombre y orden personalizado:
    crearUsuario(activo: false, nombre: "Ana");

?>