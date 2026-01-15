// js/main.js
import { dragStart, dragEnd, allowDrop, drop, dragEnter, dragLeave } from './dragDrop.js';

document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Asignar eventos a las cartas (Drag)
    const cartas = document.querySelectorAll('.carta');
    cartas.forEach(carta => {
        carta.addEventListener('dragstart', dragStart);
        carta.addEventListener('dragend', dragEnd);
    });

    // 2. Asignar eventos a las zonas de destino (Drop Zones)
    const dropZones = document.querySelectorAll('.drop-zone');
    dropZones.forEach(zone => {
        zone.addEventListener('dragover', allowDrop);
        zone.addEventListener('drop', drop);
        zone.addEventListener('dragenter', dragEnter);
        zone.addEventListener('dragleave', dragLeave);
    });

    // 3. Lógica del Botón VALIDAR
    const btnValidar = document.getElementById('btn-validar');
    btnValidar.addEventListener('click', validarResultados);
    
    // 4. Lógica del Botón REINICIAR
    document.getElementById('btn-reiniciar').addEventListener('click', () => location.reload());
});


function validarResultados() {
    let aciertos = 0;
    let errores = 0;
    const totalCartas = document.querySelectorAll('.carta').length;
    
    // Seleccionamos todas las cartas
    const cartas = document.querySelectorAll('.carta');

    cartas.forEach(carta => {
        // Obtenemos el padre actual de la carta (donde fue soltada)
        const zonaPadre = carta.parentElement;

        // Limpiamos clases previas
        carta.classList.remove('correcto', 'incorrecto');

        // Verificamos si la carta está en el mazo original (footer) o en una zona de juego
        if (zonaPadre.id === 'mazo-cartas') {
            // Si sigue en el mazo, no la contamos como error visual, pero no está lista
            return; 
        }

        // --- LÓGICA DE VALIDACIÓN ---
        // Comparamos el data-palo de la carta con el data-palo de la caja
        const paloCarta = carta.dataset.palo;
        const paloZona = zonaPadre.dataset.palo;

        if (paloCarta === paloZona) {
            // Acierto
            carta.classList.add('correcto'); // Sombra Verde
            aciertos++;
        } else {
            // Error
            carta.classList.add('incorrecto'); // Sombra Roja
            errores++;
        }
    });

    // Mostrar mensaje final
    const mensajeDiv = document.getElementById('mensaje-resultado');
    
    // Si todas están bien colocadas
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