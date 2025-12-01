/*
fetch(`https://zenquotes.io/api/today`)
  .then((response) => response.json()) 
  .then((json) => {
    pintarFrase(json);
  })
  .catch((error) => {
    console.error("Error al obtener la frase:", error);
    // Aquí puedes llamar a una función para mostrar el error en pantalla
    // Ejemplo: pintarError("No se pudo cargar la frase."); 
  });
*/

const aTAreas = [];
//localStorage.clear();
const tarea = document.getElementById("tarea");
let cont = localStorage.getItem("cont") ? (parseInt(localStorage.getItem("cont"))+1 ): 0;



fetch(`https://jsonplaceholder.typicode.com/posts`)
  .then((response) => response.json())
  .then((json) => {
    // const aUsuarios = json;
    pintarFrase(json);
  });

  function pintarFrase(usuarios) {
    const containerFrase = document.getElementById("titulo2");
  
    const usuarioId = Math.floor(Math.random() * 10) + 1;
    let idFrase = Math.floor(Math.random() * 10) + 1 + (usuarioId - 1) * 10;
    let contenidoFrase = "no muestra nada";
  
    for (let i = 0; i < usuarios.length; i++) {
      if (usuarios[i].userId === usuarioId && usuarios[i].id === idFrase) {
        contenidoFrase = usuarios[i].body;
        break;
      }
    }
  
    localStorage.setItem("frase Usuario" + usuarioId, contenidoFrase);
  
    containerFrase.innerHTML = `
        <h2>${contenidoFrase}</h2>
  `;
  }

  document.getElementById("anadir").onclick = () => {


    let valorTarea = tarea.value;

    aTAreas.push(valorTarea);

    mostrarLista(valorTarea);

    localStorage.setItem("cont", cont);

    localStorage.setItem("tarea" +  cont, valorTarea);

    cont++;
  }



  let  mostrarLista = (tareasMostrar) => {
    const contenedorLista = document.getElementById("listaTareas"); 
    const lista = document.createElement("ul");

    //aTareasMostrar.forEach(tareaMostrar => {
        let item = document.createElement("li");
        item.innerText = tareasMostrar;
        item.innerHTML = item.innerText + ` <div class="hijo"> <input type="button" id="borrar" value="X"> </div>`;
        lista.appendChild(item);
    //});

    contenedorLista.appendChild(lista);

  }

  document.getElementById("borrar").onclick = () =>{

    let bontonBorar = document.querySelector("hijo");

    deleteNode(bontonBorar.parentNode);


  }

