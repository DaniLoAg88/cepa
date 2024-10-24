window.onload = function (){
    let check = document.querySelector("#casilla");
    let boton = document.querySelector("#enviarFormulario2");

    check.addEventListener("change", function (){
        if(check.checked){
            boton.disabled = false;
            boton.classList.remove("botonDesactivado")
            boton.classList.add("enviarBoton", "boton");

        }else{
            boton.disabled = true;
            boton.classList.remove("boton")
            boton.classList.add("enviarBoton", "botonDesactivado");
        }
    })
}