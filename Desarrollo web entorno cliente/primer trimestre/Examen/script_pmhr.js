/*

localStorage.setItem("jokers", "jokerPrueba");

window.alert(localStorage.getItem("jokers"));

localStorage.setItem("jokers", "jokerPrueba2");

window.alert(localStorage.getItem("jokers"));
*/

const array_pmhr = [];
const joker_pmhr = document.getElementById("texto_pmhr");
const contenedorListaJokers_pmhr = document.getElementById("lista_pmhr");
const containerBroma_pmhr = document.getElementById("cita_pmhr");
//const parrafoColorJoker_pmhr = document.getElementById("cita_pmhr").querySelector('.cita_pmhr');

let color_pmhr = function () {
  return document.getElementById("color_pmhr").value;
};

let local_pmhr = function (array_pmhr) {
  localStorage.setItem("jokers", JSON.stringify(array_pmhr));
};




function mostrarLista_pmhr (jokerIntroducir_pmhr) {
  let lista_pmhr = contenedorListaJokers_pmhr.querySelector("ul");


  if (!lista_pmhr) {
    lista_pmhr = document.createElement("ul");
    contenedorListaJokers_pmhr.appendChild(lista_pmhr);
  }

  let item_pmhr = document.createElement("li");
  item_pmhr.textContent = jokerIntroducir_pmhr;
  lista_pmhr.appendChild(item_pmhr);

  contenedorListaJokers_pmhr.appendChild(lista_pmhr);
}


let datosLocal_pmhr = localStorage.getItem("jokers");
if (datosLocal_pmhr) {
  try {
    let jokersLocal_pmhr = JSON.parse(datosLocal_pmhr);

    if(jokersLocal_pmhr.length > 0){
      jokersLocal_pmhr.forEach(joker => {
        array_pmhr.push(joker);
        mostrarLista_pmhr(joker);
      });
    
    }
  } catch (e) {
    console.log(e);
  }
}

function validarJoker_pmhr (jokerABuscar_pmhr){

    array_pmhr.forEach( (joker_pmhr) => {
        if(joker_pmhr.trim() === jokerABuscar_pmhr.trim() ){
            return false;
        }
        return true;
    }

    )

};

let botonAnadir_pmhr = document.getElementById("btnAdd_pmhr");


botonAnadir_pmhr.addEventListener("click", function () {
    let jokerIntroducir_pmhr = joker_pmhr.value;

    if(jokerIntroducir_pmhr === ""){
        window.alert("vacio");
    }else{
        if(validarJoker_pmhr(jokerIntroducir_pmhr)){
            window.alert("ese joker ya existe");
        }else{
             array_pmhr.push(jokerIntroducir_pmhr);

        local_pmhr(array_pmhr);

        mostrarLista_pmhr(jokerIntroducir_pmhr);
        }
   
    }

   
});

const cambiarColor_pmhr = document.getElementById("btnColor_pmhr").onclick = function () {

  containerBroma_pmhr.style.color = color_pmhr();

}


fetch(`https://api.chucknorris.io/jokes/random`)
  .then((response) => response.json())
  .then((json) => {
    pintarBroma_pmhr(json);
  });



let pintarBroma_pmhr = (bromas_pmhr) => {

    let contenidoBroma_pmhr = bromas_pmhr.value


    containerBroma_pmhr.textContent = contenidoBroma_pmhr;

  }

