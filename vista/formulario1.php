<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Formulario Alta de nuevo alumno</h1>
    <form action="../controlador/controlador.php" method="post">
        <input type="hidden" name="origen" value="formulario1">
        <div class="formulario">
            <div> <!-- IZQUIERDA -->
                <p>
                <label for="nombre">Nombre: </label>
                <input type="text" name="nombre" id="nombre">
                </p>
                <p>
                    <label for="pApellido">Primer apellido: </label>
                    <input type="text" name="pApellido" id="pApellido">
                </p>
                <p>
                    <label for="sApellido">Segundo apellido: </label>
                    <input type="text" name="sApellido" id="sApellido">
                </p>
                <p>
                    <label for="dni">DNI: </label>
                    <input type="text" name="dni" id="dni">
                </p>

                <p>
                    <label for="uEstudio">Último estudio cursado: </label>
                    <select name="uEstudio" id="uEstudio">
                        <option></option>
                        <?php
                            include_once("../modelo/conexion.php"); //Incluimos el archivo de la conexión a la BD
                            $link = conectar(); //ejecutamos la funcion conectar del archivo conexion.php
                            $consulta = "SELECT * FROM nivelestudios"; //Guardamos la consulta en una variable
                            $resultado = mysqli_query($link, $consulta); //Ejecutamos la consulta y guardamos en variable

                            while($fila = mysqli_fetch_assoc($resultado)){ //Se recorre el array y se guarda en $fila un array asociativo de cada registro
                                                                           //Ejemplo: $fila["idEstudios"] y $fila["nombreNivel"]
                                echo "<option value='$fila[idEstudios]'>$fila[nombreNivel]</option>";
                            }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="fechaUE">Fecha de terminación estudios: </label>
                    <input type="date" name="fechaUE" id="fechaUE">
                </p>
                <p>
                    <?php
                    if(!empty($_GET["errores"])){
                        echo "<p class='textoError'>***".$_GET["errores"]."***</p>";
                    }
                    ?>
                </p>
            </div>
            <div> <!-- DERECHA -->
                <p>
                    <label for="telefono">Teléfono: </label>
                    <input type="text" name="telefono" id="telefono">
                </p>
                <p>
                    <label for="direccion">Dirección: </label>
                    <input type="text" name="direccion" id="direccion">
                </p>
                <p>
                    <label for="cp">Código postal: </label>
                    <input type="text" name="cp" id="cp" maxlength="5">
                </p>
                <p>
                    <label for="ciudad">Ciudad: </label>
                    <input type="text" name="ciudad" id="ciudad">
                </p>
                <p>
                    <label for="provincia">Provincia: </label>
                    <select name="provincia" id="provincia">
                        <option></option>
                        <?php
                        include_once("../modelo/conexion.php"); //Incluimos el archivo de la conexión a la BD
                        $link = conectar(); //ejecutamos la funcion conectar del archivo conexion.php
                        $consulta = "SELECT * FROM provincia"; //Guardamos la consulta en una variable
                        $resultado = mysqli_query($link, $consulta); //Ejecutamos la consulta y guardamos en variable

                        while($fila = mysqli_fetch_assoc($resultado)){ //Se recorre el array y se guarda en $fila un array asociativo de cada registro
                            //Ejemplo: $fila["idEstudios"] y $fila["nombreNivel"]
                            echo "<option value='$fila[idProvincia]'>$fila[nombreProvincia]</option>";
                        }

                        ?>
                    </select>
                </p>
                <p>
                    <label for="fNacimiento">Fecha nacimiento:</label>
                    <input type="date" name="fNacimiento" id="fNacimiento">
                </p>
                <p>
<!--                    <label for="btn">Continúe al siguiente paso:</label>-->
                    <input type="submit" name="enviarFormulario1" value="→ Siguiente" class="enviarBoton">
                </p>
            </div>
        </div>
    </form>
</body>
</html>