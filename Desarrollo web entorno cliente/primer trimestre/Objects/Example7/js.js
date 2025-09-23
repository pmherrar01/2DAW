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

function countPages(aLibros) {
    let count = 0;

    for (let i = 0; i < aLibros.length; i++) {

        count = count + aLibros[i].numPages;
        
    }

    return count;
}

let book = {
    title: "Learning JavaScript Design Patterns",
     author : "Addy Osmani",
      numPages : 254
}

library2.push(book);

mostrarArray("", library2)

let total = countPages(library2);

console.log(`sum of the pages: ${total}`);