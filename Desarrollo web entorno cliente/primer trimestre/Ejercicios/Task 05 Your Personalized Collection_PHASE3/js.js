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
        if (prendaExiste(prendaNueva)) {
            alert("La prenda ya existe en el stock");
        }else{
            aStock.push(prendaNueva);
            cont++;
        }
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

    return aStock.sort((a, b) => a.detalles[1] - b.detalles[1]);

}

//funcion para comprobar si una prenda ya existe en el array
function prendaExiste(prendaBuscar) {

    if (aStock.length === 0) {
        return false;
    }else{
        for (let i = 0; i < aStock.length; i++) {

            if (aStock[i].tipoPrenda === prendaBuscar.tipoPrenda && aStock[i].detalles[0] === prendaBuscar.detalles[0] && aStock[i].detalles[1] === prendaBuscar.detalles[1] && aStock[i].detalles[2] === prendaBuscar.detalles[2] && aStock[i].detalles[3] === prendaBuscar.detalles[3]) {
                return true;
            }
            
        }
    }
    
    

    return false;
    
}

//funcion para borrar una prenda del array
function borrarPrenda() {

    let prenda = datosPrenda(document.getElementById("tipoPrenda").value,
    document.getElementById("descripcion").value,
    document.getElementById("precio").value,
    document.getElementById("fechaSalida").value,
    document.querySelector('input[name="tara"]:checked').value === "true" ? true : false
);

if (!validarpPrenda(prenda)) {
    alert("Por favor, rellena todos los campos");
    
}else{
    if(!prendaExiste(prenda)){
        alert("La prenda no existe en el stock");
    }else{
        for (let i = 0; i < aStock.length; i++) {
            if (aStock[i].tipoPrenda === prenda.tipoPrenda && aStock[i].detalles[0] === prenda.detalles[0] && aStock[i].detalles[1] === prenda.detalles[1] && aStock[i].detalles[2] === prenda.detalles[2] && aStock[i].detalles[3] === prenda.detalles[3]) {
                aStock.splice(i, 1);
                alert("Prenda borrada del stock");
                break;
            }
        }
    }
}

   
}

//funcion para mostrar
function mostrarStock() {

    let aStockOrdenado = ordenarPrecio();

    let mensaje = `Mostarndo el stock ordenado por precio\n`;

   for (const tipodePrenda in aStockOrdenado) {
    mensaje += `\n Prenda ${parseInt(tipodePrenda) + 1}:   ${aStockOrdenado[tipodePrenda].tipoPrenda} \n Descipcion: ${aStockOrdenado[tipodePrenda].detalles[0]} \nPrecio: ${aStockOrdenado[tipodePrenda].detalles[1]} \nFecha de salida: ${aStockOrdenado[tipodePrenda].detalles[2]} \n¿Tiene tara?: ${aStockOrdenado[tipodePrenda].detalles[3]}\n`
    
   }

    alert(mensaje);

    alert(`Se han añadido ${cont} prendas al stock`);
    cont = 0;

}
