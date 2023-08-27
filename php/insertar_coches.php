<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="PabloFC">
    <title>RentLuxuryCars</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <main>
        <?php

        if (isset($_SESSION["admin"])) {
            require_once("funciones.php");
            $conexion = conectar_servidor();
            menu_admin();

            echo "<h1>Insertar coche</h1>";
        ?>

            <section class="insertar_coches">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 caja_formu">
                            <div class="formu_contacta">
                                <form action="#" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="matricula"><span class="color_blanco">Matricula</span></label>
                                        <input type="text" name="mat" class="form-control" id="matricula">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $sentencia1 = "select distinct nombre, marca from coche,marca where 
                                        coche.marca=marca.codigo";
                                        $consulta1 = $conexion->query($sentencia1);

                                        echo '<label for="marca"><span class="color_blanco">Marca</span></label>';
                                        echo "<select class='custom-select' name='mar' id='marca' >";
                                        // <input type="text" name="mar" class="form-control" id="marca"> 
                                        while ($fila = $consulta1->fetch_array(MYSQLI_ASSOC)) {

                                            echo " <option value='$fila[marca]'>$fila[nombre]</option>";
                                        }
                                        echo "</select> <br>";
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="modelo"><span class="color_blanco">Modelo</span></label>
                                        <input type="text" name="mod" class="form-control" id="modelo">
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        $sentencia2 = "select distinct tipo from coche";
                                        $consulta2 = $conexion->query($sentencia2);

                                        echo '<label for="Tipo"><span class="color_blanco">Tipo</span></label>';
                                        echo "<select class='custom-select' name='tip' id='Tipo' >";
                                        while ($fila = $consulta2->fetch_array(MYSQLI_ASSOC)) {

                                            echo " <option value='$fila[tipo]'>$fila[tipo]</option>";
                                        }
                                        echo "</select> <br>";
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto"><span class="color_blanco">Foto</span></label>
                                        <input type="file" name="fot" class="form-control" id="foto">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha"><span class="color_blanco">Fecha de compra</span></label>
                                        <input type="date" name="fec" class="form-control" id="fecha">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio"><span class="color_blanco">Precio día</span></label>
                                        <input type="text" name="pre" class="form-control" id="precio">
                                    </div>
                                    <div class="form-group">
                                        <label for="descripcion"><span class="color_blanco">Descripcion</span></label>
                                        <!-- <input type="text" name="des" class="form-control" id="descripcion"> -->
                                        <textarea name="des" class="form-control" id="descripcion" id="descripcion" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="caballos"><span class="color_blanco">Caballos</span></label>
                                        <input type="text" name="cab" class="form-control" id="caballos">
                                    </div>
                                    <div class="form-group">
                                        <label for="asientos"><span class="color_blanco">Asientos</span></label>
                                        <input type="text" name="asi" class="form-control" id="asientos">
                                    </div>
                                    <div class="pt-1 mb-4">
                                        <input class="btn-lg btn-block boton" type="submit" name="enviar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php
            if (isset($_POST["enviar"])) {

                if (!($_POST["mat"] && $_POST["mar"] && $_POST["mod"] && $_POST["tip"] && $_FILES["fot"]
                    && $_POST["fec"] && $_POST["pre"] && $_POST["des"] && $_POST["cab"] && $_POST["asi"])) {
                        
                        echo '<script>alert("Introduce todos los campos")</script>';
                        
                } else {
                    $matricula = $_POST["mat"];
                    $marca = $_POST["mar"];
                    $modelo = $_POST["mod"];
                    $tipo = $_POST["tip"];
                    $fecha_compra = $_POST["fec"];
                    $precio_dia = $_POST["pre"];
                    $descripcion = $_POST["des"];
                    $caballos = $_POST["cab"];
                    $asientos = $_POST["asi"];

                    $foto = $_FILES["fot"]["name"];
                    $type = $_FILES["fot"]["type"];
                    $temp = $_FILES["fot"]["tmp_name"];
                    $tamaño = $_FILES["fot"]["size"];

                    if (!file_exists("../img")) {
                        mkdir("../img");
                    }

                    switch ($type) {
                        case "image/jpeg":
                            $foto1 = $foto;
                            break;
                        case "image/png";
                            $foto1 = $foto;
                            break;
                        default:
                            echo "<p align='center'>Archivo no soportado</p>";
                    }
                    if ($tamaño <= 2097152) {
                        $ruta = "../img/$foto1";
                        move_uploaded_file($temp, $ruta);
                    } else {
                        echo "<p align='center'>El formato de la foto tiene que ser jpg o png</p>";
                    }

                    $sentencia = "insert into coche values(?,?,'$tipo','$foto1',?,?,?,?,?,$marca)";
                    $consulta = $conexion->prepare($sentencia);
                    $content = nl2br($descripcion);
                    $consulta->bind_param(
                        "sssdsii",
                        $matricula,
                        $modelo,
                        $fecha_compra,
                        $precio_dia,
                        $content,
                        $caballos,
                        $asientos
                    );
                    $consulta->execute();
                    $consulta->store_result();

                    if ($consulta->affected_rows == 0) {
                        echo "<p align='center'>No se ha podido introducir el coche</p>";
                    } else {
                        echo "<p align='center'>Coche introducido con exito</p>";
                    }
                    $consulta->close();
                }
            }
            $conexion->close();
        } //FIN ISSET($_SESSION["admin"]);
        ?>
    </main>
</body>

</html>