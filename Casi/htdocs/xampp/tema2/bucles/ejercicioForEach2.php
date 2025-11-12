<?php
    $menu1 = [
        "Plato1" => "Macarrones con queso",
        "Plato2" => "Pescado asado",
        "Bebida" => "Coca-cola",
        "Postre" => "Helado de vainilla",
    ];
    $menu2 = [
        "Plato1" => "Ensalada mixta",
        "Plato2" => "Pollo al horno",
        "Bebida" => "Agua",
        "Postre" => "Fruta del tiempo",
    ];
    $menu3 = [
        "Plato1" => "Sopa de verduras",
        "Plato2" => "Filete de ternera",
        "Bebida" => "Vino tinto",
        "Postre" => "Tarta de queso",
    ];
    $menus = [$menu1, $menu2, $menu3];

    $cont = 1;

    foreach ($menus as $menu) {
        echo "<h2>Menú {$cont}</h2> \n";
        foreach ($menu as $nombre => $plato) {
            echo "$nombre: $plato <br> \n";
        }
        $cont++;
    }
?>