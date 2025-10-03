let students = [];
let error = false;

function anadirStudient(nameStudent, math, languaje, science) {
    let student = {
        name: nameStudent,
        math: math,
        languaje: languaje,
        science: science
    };
    return student;
}

function comprobarString() {
    let nameStudent = document.getElementById("name").value;

    if(nameStudent.trim() === "" || !isNaN(nameStudent)) {
        alert("Por favor, ingresa un nombre");
        error = true;
    }else{
        return nameStudent;
    }

}

function comprobarNum(num) {
    let nota = document.getElementById(num).value;

    if(isNaN(nota) || nota < 0 || nota > 10) {
        alert("Please, enter a valid number");
        error = true;
    }else{
        return nota;
    }

}

function calculateAverageGrades(student) {
    let averageGrades = 0;
    let count = 0;
    for (const key in student) {
        if (key === "name") {
            continue;
        }
        averageGrades += Number(student[key]);
        count++;
    }

    return averageGrades / count;
}


function control() {
    let nameSt = comprobarString();
    let notaMath = comprobarNum("math");
    let notaLanguaje = comprobarNum("languaje");
    let notaScience = comprobarNum("science");
    
    let newStudent = anadirStudient(nameSt, notaMath, notaLanguaje, notaScience);
    students.push(newStudent);

    let averageGrades = calculateAverageGrades(newStudent);

    if(!error){
        alert(`The average grade of ${newStudent.name} is ${averageGrades}`);
    }
    
}
