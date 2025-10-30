fetch(`https://api.thecatapi.com/v1/images/search?limit=10`)
.then((response) => response.json())
.then((json) => {
  pintarGatos(json);
});

function pintarGatos(aGatos) {
    const containerGatos = document.getElementById("galeriaGatos");


    aGatos.forEach(gato => {
        containerGatos.innerHTML += `
        <div class="gato">
            <img src="${gato.url}" alt="Imagen de un gato">
        </div>
        `;
    });

    containerGatos.innerHTML += `
    <div class="card">
        <button type="button" onclick="mostrarMasGatos()">Mostrar 10 gatos más</button>
    </div>
    `;
}

function mostrarMasGatos() {
    fetch(`https://api.thecatapi.com/v1/images/search?limit=10`)
    .then((response) => response.json())
    .then((json) => {
        pintarGatos(json); 
    });
}