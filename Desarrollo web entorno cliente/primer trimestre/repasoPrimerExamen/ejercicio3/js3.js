// 1. Selectores de elementos del DOM
const cantidadInput = document.getElementById('cantidad');
const monedaOrigenSelect = document.getElementById('moneda-origen');
const monedaDestinoSelect = document.getElementById('moneda-destino');
const btnConvertir = document.getElementById('btn-convertir');
const resultadoP = document.getElementById('resultado');

// URL base de la API
const API_URL = 'https://api.frankfurter.app';

// --- FUNCIONES ---

/**
 * Función para cargar las monedas en los <select>
 * Se llama cuando la página termina de cargar.
 */
function cargarMonedas() {
    
    // 1. Hacemos el fetch para obtener las monedas
    fetch(`${API_URL}/currencies`)
        .then(function(response) {
            // response.json() también es una promesa, así que la retornamos
            return response.json();
        })
        .then(function(monedas) {
            // 'monedas' es el objeto: {AUD: "Australian Dollar", ...}
            
            // Usamos un bucle 'for...in' para recorrer el OBJETO
            // 'codigo' será "AUD", "BGN", "CAD", etc. en cada vuelta
            for (let codigo in monedas) {
                
                // Creamos la opción para el select de ORIGEN
                const optionOrigen = document.createElement('option');
                optionOrigen.value = codigo;
                optionOrigen.textContent = codigo;
                monedaOrigenSelect.appendChild(optionOrigen);

                // Creamos la opción para el select de DESTINO
                const optionDestino = document.createElement('option');
                optionDestino.value = codigo;
                optionDestino.textContent = codigo;
                monedaDestinoSelect.appendChild(optionDestino);
            }

            // Ponemos valores por defecto (opcional, pero útil)
            monedaOrigenSelect.value = 'EUR';
            monedaDestinoSelect.value = 'USD';
        })
        .catch(function(error) {
            // Si algo falla (la API está caída, no hay internet...)
            console.error('Error al cargar monedas:', error);
            resultadoP.textContent = 'Error al cargar las monedas.';
        });
}

/**
 * Función para realizar la conversión
 * Se llama al hacer clic en el botón.
 */
function convertirMoneda() {
    
    // 1. Obtenemos los valores del usuario
    const cantidad = cantidadInput.value;
    const origen = monedaOrigenSelect.value;
    const destino = monedaDestinoSelect.value;

    // 2. Validaciones básicas
    if (cantidad <= 0 || !cantidad) {
        resultadoP.textContent = 'Introduce una cantidad válida.';
        return; // Detiene la función aquí
    }

    if (origen === destino) {
        resultadoP.textContent = 'Las monedas no pueden ser iguales.';
        return; // Detiene la función aquí
    }

    // 3. Mostramos un mensaje de "Cargando"
    resultadoP.textContent = 'Convirtiendo...';

    // 4. Hacemos la llamada a la API
    fetch(`${API_URL}/latest?amount=${cantidad}&from=${origen}&to=${destino}`)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // 'data' es el objeto: {amount: 1, base: "EUR", rates: {USD: 1.08}}
            
            // 5. Leemos el resultado y lo pintamos
            const resultadoConversion = data.rates[destino];
            resultadoP.textContent = `${cantidad} ${origen} = ${resultadoConversion} ${destino}`;
        })
        .catch(function(error) {
            console.error('Error al convertir:', error);
            resultadoP.textContent = 'Error al realizar la conversión.';
        });
}

// --- EVENT LISTENERS ---

// IMPORTANTE:
// Esta línea asume que tu etiqueta <script> está al FINAL del <body>
// Llama a la función para rellenar los <select> en cuanto carga el JS.
cargarMonedas();

// 2. Cuando se haga clic en el botón, llama a convertirMoneda()
btnConvertir.addEventListener('click', convertirMoneda);