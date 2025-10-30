fetch(    `https://api.frankfurter.app/currencies`)
.then((response) => response.json())
.then((json) => {
    const codigosMonedas = Object.keys(json);
});
