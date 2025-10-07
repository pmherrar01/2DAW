//Array para guardar las prendas
let aStock = [];
//funcion para añadir una prenda al array
function anadirPrenda() {
    console.log(aStock)
    let prendaNueva;

    if (!validarpPrenda()) {
        alert("Por favor, rellena todos los campos");
    } else {
        prendaNueva = datosPrenda(
            document.getElementById("tipodePrenda").value,
            parseFloat(document.getElementById("precio").value),
            document.getElementById("fechaSalida").value,
            document.querySelector('input[name="tara"]:checked').value === "true"
        );
    }
    aStock.push(prendaNueva);



}

//funcion para validar que todos los campos esten rellenos
function validarpPrenda() {
    let tipoPrenda = document.getElementById("tipodePrenda").value;
    let precio = document.getElementById("precio").value;
    let fechaSalida = document.getElementById("fechaSalida").value;
    let tara = document.querySelector('input[name="tara"]:checked');

    if (tipoPrenda === "" || precio === "" || fechaSalida === "" || tara === null) {
        return false;
    }

    return true;

}
//funcion para crear un objeto prenda que lo retorna
function datosPrenda(tipoPrenda, precio, fechaSalida, tara) {

    let prenda = { tipoPrenda, precio, fechaSalida, tara }

    return prenda;
}

//funcion para mostrar el array que lo uso para comprobar que se añden bien al array
function mostrarStock(aPrendas) {
    for (let i = 0; i < aPrendas.length; i++) {

        console.log(aPrendas[i]);

    }
}