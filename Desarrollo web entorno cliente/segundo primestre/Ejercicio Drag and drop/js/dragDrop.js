export function dragStart(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
    ev.target.style.opacity = "0.5"; // Efecto visual
}

export function dragEnd(ev) {
    ev.target.style.opacity = "1";
}

export function allowDrop(ev) {
    ev.preventDefault();
}

export function dragEnter(ev) {
    ev.preventDefault();
    if (ev.target.classList.contains('drop-zone')) {
        ev.target.classList.add('drag-over');
    }
}

export function dragLeave(ev) {
    if (ev.target.classList.contains('drop-zone')) {
        ev.target.classList.remove('drag-over');
    }
}

export function drop(ev) {
    ev.preventDefault();
    
    if (ev.target.classList.contains('drop-zone')) {
        ev.target.classList.remove('drag-over');
    }

    const data = ev.dataTransfer.getData("text");
    const draggedElement = document.getElementById(data);

    let dropZone = ev.target;
    
    if (!dropZone.classList.contains('drop-zone')) {
        dropZone = dropZone.closest('.drop-zone');
    }

    if (dropZone) {
        dropZone.appendChild(draggedElement);
        draggedElement.classList.remove('correcto', 'incorrecto');
    }
}