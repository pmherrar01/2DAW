document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('footer img').forEach((img, idx) => {
        if (idx === 0) img.classList.add('visible');
    });
});


function allowDrop(ev) {
    ev.preventDefault(); // Previene el comportamiento por defecto (p. ej. abrir la imagen)
  }

  // Función que se ejecuta al empezar a arrastrar la imagen
  function drag(ev) {
    // Guarda información temporal en dataTransfer
    // "text" indica el tipo de dato
    // ev.target.id es el id del elemento arrastrado (por ejemplo, "drag1")
    // Esto permite identificar qué elemento se está moviendo
    ev.dataTransfer.setData("text", ev.target.id);
  }

  // Función que se ejecuta al soltar la imagen 
  function soltar(ev) {
    //ev.preventDefault(); // Previene el comportamiento por defecto

    // Recupera la información guardada en el drag
    // Debe ser el mismo tipo que se usó en setData ("text")
    var data = ev.dataTransfer.getData("text"); // en data tengo el id del elemento arrastrado

    // Con la id recuperada, seleccionamos el elemento en el DOM
    var draggedElement = document.getElementById(data);

    // Añade el elemento arrastrado como hijo del div donde se soltó
    // ev.currentTarget es el div que recibió el drop
    ev.currentTarget.appendChild(draggedElement);
  }