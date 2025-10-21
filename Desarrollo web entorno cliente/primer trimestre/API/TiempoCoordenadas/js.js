fetch(`https://api.open-meteo.com/v1/forecast?latitude=39.4765&longitude=-6.3722&hourly=temperature_2m,relative_humidity_2m&timezone=auto&forecast_days=1`)
    .then(response => response.json())
    .then(json => {
        const horaActual = new Date().getHours();
        const datos = json.hourly; 
        pintarTemperaturaActual(datos, horaActual);
    });

function pintarTemperaturaActual(datos, horaActual) {
    const container = document.getElementById('container');

        const temperaturaActual = datos.temperature_2m[horaActual];
        const humedadActual = datos.relative_humidity_2m[horaActual];

        container.innerHTML = `
            <div class="card">
                <p>Temperatura actual: ${temperaturaActual}°C</p>
                <p>Humedad relativa: ${humedadActual} %</p>
            </div>
        `;

}