let prenda1 = {
    tipoDePrenda: "sudadera",
    precio: 55,
    fechaSalida: new Date("2025-09-2"),
    tara : false
}

let prenda2 = {
    tipoDePrenda: "sudadera",
    precio: 55,
    fechaSalida:new Date("2025-09-2"),
    tara : false 
}

let prenda3 = {
    tipoDePrenda: "gorra",
    precio: 20,
    fechaSalida: new Date("2018-03-2"),
    tara : false
}

let aStock = [];

aStock.push(prenda1);
aStock.push(prenda2);
aStock.push(prenda3);


function anadirPrenda() {
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
function comparar(prenda1, prenda2) {
    return prenda1 === prenda2;
}


mostrarStock(aStock);

//anadirPrenda();

//mostrarStock(aStock);
console.log(comparar(aStock[0], aStock[1]));
