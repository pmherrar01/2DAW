let library2 = [
    {
        title : "book1",
        author : "pepe",
        numPages : 345
    },
    {
        title : "book2",
        author : "juan",
        numPages : 378
    },
    {
        title : "book3",
        author : "fran",
        numPages : 4365
    }
];

function mostrarArray(mensaje , aLibros) {
    console.log(mensaje);
    
    for (let i = 1; i < aLibros.length; i++) {
        
        console.log(`book ${i} \n Title: ${aLibros[i].title}, author:  ${aLibros[i].author}, pages: ${aLibros[i].numPages}`)
        
    }
}

mostrarArray("sin añadir libro", library2);

library2.push({title: "Learning JavaScript Design Patterns", author : "Addy Osmani", numPages : 254});

mostrarArray("Añadiendo libro", library2)