//Array para guardar las prendas
let aStock = [];
//variable cont con la que cuento cuantas orendas añado
let cont = 0;
/*
    Utilizo esta variable count para contar cuetnas prendas añado de una vez,
    me refiero de de una vex se presiona 2 veces el boton "enviar" pues se añaden 2 prendas de una vez entonces contaria 2,
    a parte en el metodo mostrar voy poniendo cuantas prendas tiene el array,
    por que no se muy bien a que te refieres con que añadamos el contador que muestre cuantos elementos se han añadido al array
*/
//funcion para añadir una prenda al array
function anadirPrenda() {
    console.log(aStock)
    let prendaNueva;

    if (!validarpPrenda()) {
        alert("Por favor, rellena todos los campos");
    } else {
        prendaNueva = datosPrenda(
            document.getElementById("tipoPrenda").value,
            document.getElementById("descripcion").value,
            document.getElementById("precio").value,
            document.getElementById("fechaSalida").value,
            document.querySelector('input[name="tara"]:checked').value === "true" ? true : false
        );
    }

    if (prendaExiste(prendaNueva)) {
        alert("La prenda ya existe en el stock");
    }else{
        aStock.push(prendaNueva);
        cont++;
    }

    



}

//funcion para validar que todos los campos esten rellenos
function validarpPrenda() {
    let tipoPrenda = document.getElementById("tipoPrenda").value;
    let descripcion = document.getElementById("descripcion").value;
    let precio = document.getElementById("precio").value;
    let fechaSalida = document.getElementById("fechaSalida").value;
    let tara = document.querySelector('input[name="tara"]:checked');

    if (tipoPrenda === ""  || descripcion === "" || precio === "" || fechaSalida === "" || tara === null) {
        return false;
    }

    return true;

}
//funcion para crear un objeto prenda que lo retorna
function datosPrenda(tipoPrenda, descripcion, precio, fechaSalida, tara) {

    let prenda = {
        tipoPrenda, 
        detalles: [
            descripcion,
            precio,
            fechaSalida,
            tara
        ] 
 }

    return prenda;
}

//funcion para odernar el array por precio
function ordenarPrecio() {
    aStock.sort((a, b) => a.precio - b.precio);

}

//funcion para comprobar si una prenda ya existe en el array
function prendaExiste(prendaNueva) {
    for (const prenda in aStock) {
        if(prenda.tipoPrenda === prendaNueva.tipoPrenda && prenda.detalles[0] === prendaNueva.detalles[0] && prenda.detalles[1] === prendaNueva.detalles[1] && prenda.detalles[2] === prendaNueva.detalles[2] && prenda.detalles[3] === prendaNueva.detalles[3]){
            return true;
        } 
    }    

    return false;
    
}

//funcion para mostrar
function mostrarStock() {

    ordenarPrecio();

    alert(`Mostarndo el stock ordenado por precio`);

   for (const tipodePrenda in aStock) {
    alert(`Prenda ${parseInt(tipodePrenda) + 1}:   ${aStock[tipodePrenda].tipoPrenda} \n Descipcion: ${aStock[tipodePrenda].detalles[0]} \nPrecio: ${aStock[tipodePrenda].detalles[1]} \nFecha de salida: ${aStock[tipodePrenda].detalles[2]} \n¿Tiene tara?: ${aStock[tipodePrenda].detalles[3]}`);
        
    
   }

    alert(`Se han añadido ${cont} prendas al stock`);
    cont = 0;

}
