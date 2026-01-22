const stock = [];


let prendaNueva = () =>{

    let tipoPrenda = document.getElementById("tipodePrenda").value;
    let precio = document.getElementById("precio").value;
    let fechaSalida = document.getElementById("fechaSalida").value;
    let tara = document.querySelector('input[name="tara"]:checked').value;


     return {
        tipoPrenda,
        precio,
        fechaSalida, 
        tara
    };

}