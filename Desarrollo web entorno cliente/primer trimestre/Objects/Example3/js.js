let book1 = {
    title : "Speaking JavaScript",
    author : "Axel Rauschmayer",
    numberPages : 460
}

let book2 = {
    title : "Programming JavaScript Applications",
    author : "Eric Elliottr",
    numberPages : 254
}

let book3 = {
    title : "Understanding ECMAScript 6",
    author : "Nicholas C. Zakas",
    numberPages : 352
}

let library = [book1,book2,book3];

console.log(`libro 1: \n Title: ${library[0].title} , author: ${library[0].author} and number pages: ${library[0].numberPages} libro 2: \n Title: ${library[1].title} , author: ${library[1].author} and number pages: ${library[1].numberPages} libro 3: \n Title: ${library[2].title} , author: ${library[2].author} and number pages: ${library[2].numberPages}`);


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
]


console.log(`libro 1: \n Title: ${library2[0].title} , author: ${library2[0].author} and number pages: ${library2[0].numberPages} libro 2: \n Title: ${library2[1].title} , author: ${library2[1].author} and number pages: ${library2[1].numberPages} libro 3: \n Title: ${library2[2].title} , author: ${library2[2].author} and number pages: ${library2[2].numberPages}`);