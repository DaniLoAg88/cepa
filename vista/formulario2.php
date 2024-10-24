<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CEPA</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/formulario2.js"></script>
</head>
<body>
    <h1>Formulario Alta de nuevo alumno</h1>
    <h2 class="centrado">2️⃣⇾ Datos persona de contacto</h2>
    <form action="../controlador/controlador.php" method="post">
        <input type="hidden" name="origen" value="formulario2">
        <div class="formulario unaColumna">
            <div>
            <p>
                <label for="nombreFamiliar">Nombre persona de contacto: </label>
                <input type="text" name="nombreFamiliar" id="nombreFamiliar">
            </p>
            <p>
                <label for="telefonoFamiliar">Teléfono del contacto: </label>
                <input type="text" name="telefonoFamiliar" id="telefonoFamiliar">
            </p>
            <p>
                <label for="relacion">Relación: </label>
                <select name="relacion" id="relacion">
                    <option></option>
                    <?php
                    include_once("../modelo/conexion.php"); //Incluimos el archivo de la conexión a la BD
                    $link = conectar(); //ejecutamos la funcion conectar del archivo conexion.php
                    $consulta = "SELECT * FROM parentesco"; //Guardamos la consulta en una variable
                    $resultado = mysqli_query($link, $consulta); //Ejecutamos la consulta y guardamos en variable

                    while($fila = mysqli_fetch_assoc($resultado)){ //Se recorre el array y se guarda en $fila un array asociativo de cada registro
                        //Ejemplo: $fila["idEstudios"] y $fila["nombreNivel"]
                        echo "<option value='$fila[idRelacion]'>$fila[nombreRelacion]</option>";
                    }
                    ?>
                </select>
            </p>
            <p>
                <input type="checkbox" id="casilla">Acepta la Política de <a href="https://aepd.es/" target="_blank">Provacidad y Protección de Datos</a>
            </p>
            <p>
                <!--                    <label for="btn">Continúe al siguiente paso:</label>-->
                <input type="submit" name="enviarFormulario2" value="→ Finalizar" class="enviarBoton" disabled id="enviarFormulario2">
            </p>
                <p>
                    <?php
                    if(!empty($_GET["errores"])){
                        echo "<p class='textoError'>***".$_GET["errores"]."***</p>";
                    }
                    ?>
                </p>
        </div>
        </div>
</body>
</html>
