<?php
    $persona = [
        "nombre" => "Jorge",
        "telefono" => ["123456789", "987654321"],
        "profesión" => [
            "dia" => "filantropodo",
            "noche" => "caballero oscuro"
        ]
        ];
    print_r($persona);
    print $persona["profesión"]["noche"];
?>