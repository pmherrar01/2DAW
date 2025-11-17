let menu = document.getElementById('menu');
let items = menu.getElementsByClassName('item');
console.log("ITEMS: ");
console.log(items );

let data = [].map.call(items, (item) => item.textContent);
console.log("data:");
console.log(data);


const items2 = document.getElementsByClassName('secondary');
console.log("items2:");
console.log(items2 );

const data2 = Array.of(...items).map((item) => item.textContent);

console.log("data2:");
console.log(data2);

const menu1 = document.getElementById('menu').textContent;
console.log("items3:");
console.log(menu1);

let elements = document.getElementsByName('item2'); 
const aElementos = []; 

elements.forEach(element => {
     aElementos.push(element.textContent);
});


console.log("items4:");
aElementos.forEach(element => {
    console.log(`[${element}]`);
});

const data3 = document.getElementById('33').textContent;
console.log("data3:");
console.log(data3);


const items5 = document.querySelectorAll('li, h2');
console.log("items5:");
console.log(items5 );