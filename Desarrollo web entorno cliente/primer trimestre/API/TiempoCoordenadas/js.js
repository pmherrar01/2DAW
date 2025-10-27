const latitude = 39.4765;
const longitude = -6.3722;

fetch(`https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&hourly=temperature_2m,relative_humidity_2m&timezone=auto&forecast_days=1`)
    .then(response => response.json())
    .then(json => {
        const horaActual = new Date().getHours();
        const datos = json.hourly; 
        pintarTemperaturaActual(datos, horaActual);
    });

function pintarTemperaturaActual(datos, horaActual) {
    const container = document.getElementById('container');

        const temperaturaActual = datos.temperature_2m[horaActual + 2];
        const humedadActual = datos.relative_humidity_2m[horaActual + 2];

        container.innerHTML = `
            <div class="card">
                <p>Temperatura en dos horas: ${temperaturaActual}°C</p>
                <p>Humedad relativa en dos horas: ${humedadActual} %</p>
            </div>
        `;

}