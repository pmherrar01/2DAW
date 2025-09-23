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
    
    for (let i = 0; i < aLibros.length; i++) {
        
        console.log(`book ${i} \n Title: ${aLibros[i].title}, author:  ${aLibros[i].author}, pages: ${aLibros[i].numPages}`)
        
    }
}

function copyBooks(aLibros) {

        let ultimosLibros = aLibros.slice(-2);

        return ultimosLibros;
    
}

function remobeBook(aLibros) {

    aLibros.shift();
    
}

let book = {
    title: "Learning JavaScript Design Patterns",
     author : "Addy Osmani",
      numPages : 254
}

mostrarArray("Sin añadir libro", library2);

library2.push(book);

mostrarArray("Añadiendo libro", library2)

let ultimosLibros = copyBooks(library2);

mostrarArray("ultimos dos libros", ultimosLibros)
remobeBook(library2);

mostrarArray("borrado el primero ",library2);