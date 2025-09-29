function comprobarNum() {

  let op1 = document.getElementByIdº("op1").value;
  let op2 = document.getElementById("op2").value;

  if (isNaN(op1) || isNaN(op2) || op1 === "" || op2 === "") {
    alert("error");
    return false;
}
  return true;
}


function calculate() {


  if (!comprobarNum()) {

    let op1 = parseFloat(document.getElementById("op1").value);
    let op2 = parseFloat(document.getElementById("op2").value);

    let operation = document.forms[0].elements["operation"].value;

    let result;

    switch (operation) {
      case "add":
        result = op1 + op2;
        break;
      case "subtract":
        result = op1 - op2;
        break;
      case "multiply":
        result = op1 * op2;
        break;
      case "divide":
        result = op1 / op2;
        break;
      default:
        console.log("error");
        return;
    }

    console.log("Result:", result);
  }
}