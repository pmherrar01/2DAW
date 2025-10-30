let aEnunciados = [];

function rellenarLista(){
    aEnunciados.push(recogerDatos());
}

function recogerDatos(){
    return  document.getElementById("enunciado").value;
}

function mostrarLista(){
    const lista = document.getElementById("lista");

    let contenido = "<ul>"

    for (const enunciado of aEnunciados) {
        contenido += `<li> ${enunciado}</li>`;
    }

    contenido += "</ul>"

    lista.innerHTML = contenido;

    lista.addEventListener('click', function (event) {

        if (event.target.tagName === 'LI') {
      
          event.target.classList.toggle('tarea-completada');
        }
      });
}

function borrarElemento(){
    for(let i =0; i < aEnunciados.length; i++){
        if(aEnunciados[i] === recogerDatos()){
            aEnunciados.splice(i, 1);
            break;
        }
    }

    mostrarLista();
}

