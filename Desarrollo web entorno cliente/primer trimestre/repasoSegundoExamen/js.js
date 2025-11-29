const titulo = document.getElementById('titulo');
const consola = document.getElementById('tipoConsola');
const precio = document.getElementById('precio');



let datosJuego = () => {
    
    const radioMarcado = document.querySelector('input[name="estado"]:checked');

    const juego = {
        codigoJuego : Math.floor(Math.random() * 100000),
        titulo: titulo.value,
        consola : consola.value,
        precio : precio.value, // Corregido (tenías consola.value antes)
        

        estado : radioMarcado?.value 
    };

    return juego;
}

let validacion = () => {
    let juego = datosJuego();

    if(juego.titulo === "" || juego.consola === null || juego.precio === "0" || juego.estado === undefined){
        return false;
    }
}

let juego;

document.getElementById('enviar').onclick = juego = datosJuego();

