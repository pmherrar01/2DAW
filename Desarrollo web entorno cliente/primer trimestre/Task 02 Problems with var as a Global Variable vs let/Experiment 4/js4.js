
let points = 50;
function testLet()
{
let points = 30; // local to this block points++;
console.log("Inside function:", points);
}
testLet();
console.log("Outside function:", points);