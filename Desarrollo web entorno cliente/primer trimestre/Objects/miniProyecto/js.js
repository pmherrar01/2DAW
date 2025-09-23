let prenda1 = {
    tipoDePrenda : "sudadera",
    precio : 55,
    fechaSalida : new Date("2025-09-2"),
    tara : false
}

let prenda2 = {
    tipoDePrenda : "camiseta",
    precio : 30,
    fechaSalida : new Date("2019-12-20"),
    tara : true 
}

let prenda3 = {
    tipoDePrenda : "gorra",
    precio : 20,
    fechaSalida : new Date("2018-03-2"),
    tara : false
}

let aStock = [];

function añadirPrenda(prenda, aPrendas) {

    aPrendas.push(prenda);
    
}

function datosPrenda(tipoPrenda, precio, fechaSalida, tara) {
    
    let prenda = {tipoPrenda, precio, fechaSalida, tara}

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
        aPrendas.slice(i,1);
    }

}

añadirPrenda(prenda1, aStock);
añadirPrenda(prenda2, aStock);
añadirPrenda(prenda3, aStock);

mostrarStock(aStock);
