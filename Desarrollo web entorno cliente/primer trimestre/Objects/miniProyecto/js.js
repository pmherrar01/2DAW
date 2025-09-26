let prenda1 = {
    tipoDePrenda: "sudadera",
    precio: 55,
    fechaSalida: new Date("2025-09-2"),
    tara : false
}

let prenda2 = {
    tipoDePrenda: "camiseta",
    precio: 30,
    fechaSalida: new Date("2019-12-20"),
    tara : true 
}

let prenda3 = {
    tipoDePrenda: "gorra",
    precio: 20,
    fechaSalida: new Date("2018-03-2"),
    tara : false
}

let aStock = [];

function anadirPrenda() {

    aStock.push(prenda1);
    aStock.push(prenda2);
    aStock.push(prenda3);

    console.log(aStock)

    let prendaNueva = datosPrenda(document.getElementById("tipodePrenda").value, document.getElementById("precio").value, document.getElementById("fechaSalida").value, document.querySelector('input[name="tara"]:checked').value === "true");

    aStock.push(prendaNueva);



}

function datosPrenda(tipoPrenda, precio, fechaSalida, tara) {

    let prenda = { tipoPrenda, precio, fechaSalida, tara }

    return prenda;
}

function mostrarStock(aPrendas) {
    for (let i = 0; i < aPrendas.length; i++) {

        console.log(aPrendas[i]);

    }
}

function borrarPrenda(tipoDePrenda, aPrendas) {

    let i = aPrendas.indexOf(tipoDePrenda);

    if (i !== tipoDePrenda) {
        aPrendas.splice(i, 1);
    }

}


mostrarStock(aStock);

anadirPrenda();

mostrarStock(aStock);
