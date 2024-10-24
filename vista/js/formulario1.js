window.onload = function(){
    let fechaNacimiento = document.querySelector("#fNacimiento");
    let hoy = new Date();            //2024/10/24
    let year = hoy.getFullYear();    //2024
    let anioMin = year - 18;
    let mesMin = String(hoy.getMonth()+1).padStart(2, "0"); //Obliga a tener 2 número, si sólo tiene uno le pone el 0 delante
    let diaMin = String(hoy.getDate()).padStart(2, "0");
    let fechaFormulario = anioMin + "-" + mesMin + "-" + diaMin;
    fechaNacimiento.setAttribute("max", fechaFormulario);
}