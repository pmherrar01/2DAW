// ==========================================
// 1. VARIABLES GLOBALES Y ESTADO INICIAL
// ==========================================




// --- Gestión de Stock LocalStorage ---
let datosLocal = localStorage.getItem("prendas");
let allData;
if (datosLocal) {
  try {
    allData = JSON.parse(datosLocal);
  } catch (e) {
    allData = undefined;
  }
}

// Si hay datos válidos los usamos (haciendo una copia), si no empezamos con array vacío
let aStock = allData ? allData.slice() : [];


//mostrar el stock visualmente en la tabla
//llamo a la funcion para que se muestre al cargar la pagina
mostrarVisualStock();


// --- Contadores y Elementos DOM ---
//variable cont con la que cuento cuantas orendas añado
//--RELOJ--
let cont = 0;
const reloj = document.getElementById("reloj");
const parrafoReloj = reloj.querySelector('.reloj');
const contenidoBotonReloj = document.getElementById("botonReloj");
const parrafoColorReloj = document.getElementById("reloj").querySelector('.reloj');
const horaActual = new Date().getHours();
//const ahora = new Date();
//const contenidoHora = ahora.toLocaleTimeString();


//prendas
const tipoPrenda = document.getElementById("tipoPrenda");
const descripcion = document.getElementById("descripcion");
const precio = document.getElementById("precio");
const fechaSalida = document.getElementById("fechaSalida");




// --- Configuración Inicial de Color ---
const colorGuardado = localStorage.getItem("clockColor");

if (colorGuardado) {
  document.getElementById("colores").value = colorGuardado;
}

// --- Constantes de Ubicación ---
const latitude = 39.4765;
const longitude = -6.3722;



// ==========================================
// 2. FUNCIONES UTILITARIAS (EXPRESIONES)
// ==========================================

let local = function (aPrendas) {
  localStorage.setItem("prendas", JSON.stringify(aPrendas));
};

let color = function () {
  return document.getElementById("colores").value;;
};

// ==========================================
// 3. EVENT LISTENERS Y INTERACTIVIDAD
// ==========================================

document.getElementById("botonReloj").onclick = function () {

const parrafoActual = reloj.querySelector('.reloj');

  if (intervalo) {
    clearInterval(intervalo);
    intervalo = null;

    if (parrafoActual) {
      parrafoActual.style.fontSize = "10px";
      parrafoActual.style.color = color(); // Mantenemos el color seleccionado
  }
  } else {
    intervalo = setInterval(mostrarHora, 1000);
    if (parrafoActual) {
      parrafoActual.style.fontSize = "30px";
      parrafoActual.style.color = color();
  }
  }

  intervalo
    ? (contenidoBotonReloj.value = "parar reloj")
    : (contenidoBotonReloj.value = "reanudar reloj");
};

document.getElementById("borrarDatos").onclick = function () {
  aStock = [];
  local = localStorage.clear();

  mostrarVisualStock();
};

document.getElementById("colores").onchange = function () {
  // 1. Guardamos en localStorage
  localStorage.setItem("clockColor", this.value);

  // 2. Actualizamos el reloj visualmente YA MISMO (sin esperar al siguiente segundo)

  if (parrafoColorReloj) {
    parrafoColorReloj.style.color = this.value;
  }
};

// ==========================================
// 4. EJECUCIÓN DE APIs Y TEMPORIZADORES
// ==========================================

// Iniciar Reloj
let intervalo = setInterval(mostrarHora, 1000);

// API Clima
fetch(
  `https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&hourly=temperature_2m,relative_humidity_2m&timezone=auto&forecast_days=1`
)
  .then((response) => response.json())
  .then((json) => {
    const datos = json.hourly;
    pintarTemperaturaActual(datos, horaActual);
  });

// API Frases
fetch(`https://jsonplaceholder.typicode.com/posts`)
  .then((response) => response.json())
  .then((json) => {
    // const aUsuarios = json;
    pintarFrase(json);
  });

// ==========================================
// 5. FUNCIONES DE LÓGICA DE STOCK (CORE)
// ==========================================

//funcion para añadir una prenda al array
function anadirPrenda() {
  let prendaNueva;

  if (!validarpPrenda()) {
    alert("Por favor, rellena todos los campos");
  } else {
    prendaNueva = datosPrenda(
      Math.floor(Math.random() * 100000),
     tipoPrenda.value,
      descripcion.value,
      parseFloat(precio.value),
      fechaSalida.value,
      document.querySelector('input[name="tara"]:checked').value === "true"
        ? true
        : false
    );
    if (prendaExiste(prendaNueva)) {
      alert("La prenda ya existe en el stock");
    } else {
      aStock.push(prendaNueva);
      local(aStock);
      cont++;

      mostrarVisualStock();
    }
  }
}

//funcion para validar que todos los campos esten rellenos
function validarpPrenda() {
   tipoPrenda.value;
   descripcion.value;
   precio.value;
   fechaSalida.value;
   const tara = document.querySelector('input[name="tara"]:checked');

  if (
    tipoPrenda === "" ||
    descripcion === "" ||
    precio === "" ||
    fechaSalida === "" ||
    tara === null
  ) {
    return false;
  }

  return true;
}

//funcion para crear un objeto prenda que lo retorna
function datosPrenda(
  codigoPrenda,
  tipoPrenda,
  descripcion,
  precio,
  fechaSalida,
  tara
) {
  let prenda = {
    codigoPrenda,
    tipoPrenda,
    descripcion,
    precio,
    fechaSalida,
    tara,
  };

  return prenda;
}

//funcion para odernar el array por precio
function ordenarPrecio() {
  return aStock.sort((a, b) => a.precio - b.precio);
}

//funcion para comprobar si una prenda ya existe en el array
function prendaExiste(prendaBuscar) {
  if (aStock.length === 0) {
    return false;
  } else {
    for (let i = 0; i < aStock.length; i++) {
      if (aStock[i].codigoPrenda === prendaBuscar.codigoPrenda) {
        return true;
      }
    }
  }

  return false;
}

//funcion para borrar una prenda del array
function borrarPrenda() {
  let codigoPrendaABorrar = prompt(
    mostrarStock(),
    "Introduce el codigo de la prenda a borrar:"
  );

  if (aStock.includes(codigoPrendaABorrar)) {
    alert("La prenda no existe en el stock");
  } else {
    for (let i = 0; i < aStock.length; i++) {
      if (aStock[i].codigoPrenda == codigoPrendaABorrar) {
        aStock.splice(i, 1);
        local(aStock);
        alert("Prenda borrada correctamente");
        mostrarVisualStock();
        return;
      }
    }
  }
}

/*
    Utilizo esta variable count para contar cuetnas prendas añado de una vez,
    me refiero de de una vex se presiona 2 veces el boton "enviar" pues se añaden 2 prendas de una vez entonces contaria 2,
    a parte en el metodo mostrar voy poniendo cuantas prendas tiene el array,
    por que no se muy bien a que te refieres con que añadamos el contador que muestre cuantos elementos se han añadido al array
*/
//funcion para mostrar
function mostrarStock() {
  let aStockOrdenado = ordenarPrecio();

  let mensaje = `Mostarndo el stock ordenado por precio\n`;

  for (let i = 0; i < aStockOrdenado.length; i++) {
    mensaje += `\n Codigo prenda ${aStockOrdenado[i].codigoPrenda}:   ${aStockOrdenado[i].tipoPrenda} \n Descipcion: ${aStockOrdenado[i].descripcion} \nPrecio: ${aStockOrdenado[i].precio} \nFecha de salida: ${aStockOrdenado[i].fechaSalida} \n¿Tiene tara?: ${aStockOrdenado[i].tara}\n`;
  }

  alert(mensaje);

  alert(`Se han añadido ${cont} prendas al stock`);
  cont = 0;
}

// ==========================================
// 6. FUNCIONES DE UI Y RENDERIZADO
// ==========================================

function mostrarHora() {

  let horaActual = new Date();
  let contenidoHora = horaActual.toLocaleTimeString();

  const parrafo = reloj.querySelector('.reloj');

  if (!parrafo) {
    reloj.innerHTML = `   
    <div class="card">
      <p class="reloj" style="font-size: 30px; color: ${color()} ">${contenidoHora}</p>
    </div>
    `;
  } else {
    parrafo.textContent = contenidoHora;
    parrafo.style.color = color();
  }


  //  const fontSize = (intervalo) ? "30px" : "10px";
}

function pintarTemperaturaActual(datos, horaActual) {
  const container = document.getElementById("container");

  const temperaturaActual = datos.temperature_2m[horaActual] + 2;
  const humedadActual = datos.relative_humidity_2m[horaActual] + 2;

  container.innerHTML = `
            <div class="card">
                <p>Temperatura en dos horas: ${temperaturaActual}°C</p>
                <p>Humedad relativa en dos horas: ${humedadActual} %</p>
            </div>
        `;

  localStorage.setItem("temperaturaActual", temperaturaActual);
  localStorage.setItem("humedad actual", humedadActual);
}

function pintarFrase(usuarios) {
  const containerFrase = document.getElementById("frase");

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
    <div class="card">
    <p>Frase aleatoria : ${contenidoFrase}</p>
    </div>
`;
}


function mostrarVisualStock() {

  const cuerpoTabla = document.getElementById("cuerpoTabla");

  let contenidoVisual = "";

  aStock.forEach(prenda => {
    contenidoVisual  += `
    <tr>
      <td>${prenda.codigoPrenda}</td>
      <td>${prenda.tipoPrenda}</td>
      <td>${prenda.descripcion}</td>
      <td>${prenda.precio}</td>
      <td>${prenda.fechaSalida}</td>
      <td>${prenda.tara}</td> 
    </tr>
    `;
  });

  cuerpoTabla.innerHTML = contenidoVisual;
}


//cambio para probar el script nuevo

//prueba 3 script

