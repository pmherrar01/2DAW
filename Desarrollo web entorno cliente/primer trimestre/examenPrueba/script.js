const referenciaClave = document.getElementById("clave");
const referenciaNombre = document.querySelector('input[name="opcion"]:checked').value === "name"; 
const referenciaEmail = document.querySelector('input[name="opcion"]:checked').value === "email";
let aResultados = [];
const palabrasClave_pmhr = "Leanne";
const modo_pmhr = "name";
//usamos const para una variables por que son constantes es decir que su valor no se va a modificar y let para otras por que si se va a modificar su valor


fetch(
    `https://jsonplaceholder.typicode.com/users`
  )
    .then((response) => response.json())
    .then((json) => {
        pintar(json);
    });

    var pintar = function(aDatos) {
        const contenidoDatos =  document.getElementById("salida");
        let contenido = "";

    
        
        for (let i = 0; i < aDatos.length; i++) {

           if(aDatos[i].name.toLowerCase().includes(palabrasClave_pmhr.toLowerCase())  ){
                contenido += aDatos[i].name;
                aResultados.push(aDatos[i]);
            }
            
        }

        contenidoDatos.innerHTML = `<p>Personas con el nombre "Leanne" ${contenido}</p> <br> el total de resultados son: ${aResultados.length}`;

    }

    //el responde.json() lo que hace es mandarte la respuesta de la api en un json
    //usamos innerHTML en lugar de otro metodo del dom por que queremos añadir al html un contenido que en mi caso es contenido
    //la diferencia entre una funcion con nombre yu una anonima es que la anonima la podemos almacenar en una variable.