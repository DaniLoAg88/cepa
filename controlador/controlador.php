<?php
session_start();
$errores = array();

// COMPROBACIÓN DEL PRIMER FORMULARIO:
if ($_REQUEST["origen"] === "formulario1") {
    validarCpostal($_REQUEST["cp"]);
    validarDni($_REQUEST["dni"]);
    validarEdad($_REQUEST["fNacimiento"]);
    validarTexto($_REQUEST["nombre"], "nombre");
    validarTexto($_REQUEST["pApellido"], "primer apellido");
    validarTelefono($_REQUEST["telefono"]);
    validarVacio($_REQUEST["provincia"], "La provincia");
    validarVacio($_REQUEST["fechaUE"], "La fecha de ultimo estudio");
    validarVacio($_REQUEST["ciudad"], "La ciudad");
    validarVacio($_REQUEST["direccion"], "La direccion");
    validarVacio($_REQUEST["uEstudio"], "El ultimo estudio");

    if(count($errores) > 0){
        foreach ($errores as $error){
            $todosLosErrores .= $error;
        }

        header("Location: ../vista/formulario1.php?errores=$todosLosErrores");

    } else {
        $_SESSION["cp"] = $_REQUEST["cp"];
        header("Location: ../vista/formulario2.php");
    }
}

//COMPROBACIÓN DEL SEGUNDO FORMULARIO:
if ($_REQUEST["origen"] === "formulario2") {
    if(validarTexto($_REQUEST["nombreFamiliar"], "nombre de familiar") && validarTelefono($_REQUEST["telefonoFamiliar"]) && !empty($_REQUEST["relacion"])){
        //LEER DATOS
        header("Location: ../vista/confirmacion.php");
    }else{
        header("Location: ../vista/formulario2.php?errores=Faltan datos");
    }
}

function validarTexto($texto, $variable){

    global $errores;

    if(empty($texto) || !is_string($texto) || preg_match("/[0-9]/", $texto)){ // Si no es un String o contiene números
        $errores[] = "<p class='error'>El $variable no puede estar vacio ni contener numeros</p>";
        return false;
    }else{
        return true;
    }

}

function validarVacio($valor, $variable){

    global $errores;

    if(empty($valor)){
        $errores[] = "<p class='error'>$variable no puede estar vacio</p>";
    }
}

function validarTelefono($telefono){

    global $errores;

    if(empty($telefono) || !is_numeric($telefono) || !preg_match("/^[6789]\d{8}$/", $telefono)){
        $errores[] = "<p class='error'>El formato del telefono es incorrecto, debe comenzar por 6/7/8/9 y tener 9 digitos</p>";
        return false;
    }else{
        return true;
    }
}

function validarEdad($fecha){

    $fechaT = date_create()
    return true;
}

function validarCpostal($cp){

    global $errores;

    if(empty($cp) || !preg_match("/^[0-9]{5}$/", $cp)){
        $errores[] = "<p class='error'>El codigo postal no puede estar vacio y debe contener 5 numeros</p>";
        return false;
    }else{
        return true;
    }
}

function validarDni($dni){

    global $errores;

    if(!preg_match("/^[0-9]{8}[A-Za-z]{1}$/", $dni) || !validarLetra($dni)){
        $errores[] = "<p class='error'>El DNI introducido no es valido</p>";
        return false;
    }else{
        return true;
    }
}

function validarLetra($dni) {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";

    //Cogemos desde la posición 0, 8 caracteres, dejando fuera el 9 que será la letra y nos quedamos sólo con los números
    $numeroDNI = substr($dni,0,8);

    //Calculamos el resto de los números, y nos da la posición de la letra
    $resto = $numeroDNI % 23;

    //Comprobamos en el "array" de caracteres la posición que nos ha dado el resto, y lo comparamos con la letra (pasandola a mayuscula) de la posición 8 del DNI(letra)
    if($letras[$resto] == strtoupper(substr($dni, 8, 1))){
        return true;
    }else{
        return false;
    }
}