// Capture data from user
let name = prompt("Enter your name:");
sadansdfpksdf;  
let age = prompt("Enter your age:");
let color = prompt("Enter your favorite color:");
let study = prompt("What are you studing?");

// Create message
let message = "Hello, " + name + "! You are " + age + " years old and your favorite color is " + color + "and you are studying " + study + ".";

// Show in console
console.log(message);


// Check age and show result
if (age > 18) {
  console.log("You are an adult!");
} else {
  console.log("You are a minor!");
}

if(study == "programming"){
  console.log("You are studying " + study)
}else{
  console.log("you not are studying programming")
}

// Change background color
document.body.style.backgroundColor = color;
