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

library2.push({title: "Learning JavaScript Design Patterns", author : "Addy Osmani", numPages : 254});

console.log(`length: ${library2.length}, books name: \n  book 1: ${library2[0].title} \n  book 2: ${library2[1].title} \n  book 3: ${library2[2].title} \n  book 4: ${library2[3].title}` )