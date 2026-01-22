import { dragStart, dragEnd, allowDrop, drop, dragEnter, dragLeave } from './dragDrop.js';

document.addEventListener('DOMContentLoaded', () => {
    
    const cartas = document.querySelectorAll('.carta');
    cartas.forEach(carta => {
        carta.addEventListener('dragstart', dragStart);
        carta.addEventListener('dragend', dragEnd);
    });

    const dropZones = document.querySelectorAll('.drop-zone');
    dropZones.forEach(zone => {
        zone.addEventListener('dragover', allowDrop);
        zone.addEventListener('drop', drop);
        zone.addEventListener('dragenter', dragEnter);
        zone.addEventListener('dragleave', dragLeave);
    });

    const btnValidar = document.getElementById('btn-validar');
    btnValidar.addEventListener('click', validarResultados);
    
    document.getElementById('btn-reiniciar').addEventListener('click', () => location.reload());
});


function validarResultados() {
    let aciertos = 0;
    let errores = 0;
    const totalCartas = document.querySelectorAll('.carta').length;
    
    const cartas = document.querySelectorAll('.carta');

    cartas.forEach(carta => {
        const zonaPadre = carta.parentElement;

        carta.classList.remove('correcto', 'incorrecto');

        if (zonaPadre.id === 'mazo-cartas') {
            return; 
        }

        const paloCarta = carta.dataset.palo;
        const paloZona = zonaPadre.dataset.palo;

        if (paloCarta === paloZona) {
            // Acierto
            carta.classList.add('correcto'); 
            aciertos++;
        } else {
            // Error
            carta.classList.add('incorrecto'); 
            errores++;
        }
    });

    const mensajeDiv = document.getElementById('mensaje-resultado');
    
    if (aciertos === totalCartas) {
        mensajeDiv.textContent = "¡Enhorabuena! Has clasificado todas las cartas correctamente. 🎉";
        mensajeDiv.style.color = "green";
    } else {
        const cartasSinJugar = totalCartas - (aciertos + errores);
        if (cartasSinJugar > 0) {
            mensajeDiv.textContent = `Aún te faltan colocar ${cartasSinJugar} cartas.`;
            mensajeDiv.style.color = "orange";
        } else {
            mensajeDiv.textContent = `Tienes ${errores} fallos. Inténtalo de nuevo.`;
            mensajeDiv.style.color = "red";
        }
    }
}