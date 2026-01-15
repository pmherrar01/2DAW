// js/dragDrop.js

// Al empezar a arrastrar
export function dragStart(ev) {
    // Guardamos el ID del elemento que estamos arrastrando
    ev.dataTransfer.setData("text", ev.target.id);
    ev.target.style.opacity = "0.5"; // Efecto visual
}

// Al terminar de arrastrar (se suelte donde se suelte)
export function dragEnd(ev) {
    ev.target.style.opacity = "1";
}

// Permitir soltar (necesario para que funcione el drop)
export function allowDrop(ev) {
    ev.preventDefault();
}

// Efecto visual al pasar por encima de una zona
export function dragEnter(ev) {
    ev.preventDefault();
    if (ev.target.classList.contains('drop-zone')) {
        ev.target.classList.add('drag-over');
    }
}

// Quitar efecto visual al salir
export function dragLeave(ev) {
    if (ev.target.classList.contains('drop-zone')) {
        ev.target.classList.remove('drag-over');
    }
}

// Lógica de soltar
export function drop(ev) {
    ev.preventDefault();
    
    // Quitamos la clase de estilo visual 'drag-over'
    if (ev.target.classList.contains('drop-zone')) {
        ev.target.classList.remove('drag-over');
    }

    const data = ev.dataTransfer.getData("text");
    const draggedElement = document.getElementById(data);

    // Verificamos que estamos soltando dentro de una zona válida (drop-zone)
    // OJO: ev.target podría ser la imagen que ya está dentro, así que buscamos la caja
    let dropZone = ev.target;
    
    // Si soltamos encima de una carta que ya está ahí, buscamos su padre (la caja)
    if (!dropZone.classList.contains('drop-zone')) {
        dropZone = dropZone.closest('.drop-zone');
    }

    // Si encontramos una zona válida, movemos la carta
    if (dropZone) {
        dropZone.appendChild(draggedElement);
        // Reseteamos estilos de validación al moverla
        draggedElement.classList.remove('correcto', 'incorrecto');
    }
}