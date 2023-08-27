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
        
        if (isset($_SESSION["admin"]) ) {
            require_once("funciones.php");
            $conexion=conectar_servidor();
            menu_admin();
            
            $codigo = $_GET["codigo"];
            echo "<h1> Modificar evento </h1>";

            $sentencia = "select * from evento where codigo=$codigo";
            $consulta = $conexion->query($sentencia);

            echo '<section class="modificar_eventos">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 caja_formu">
                        <div class="formu_contacta">
                            <form action="#" method="post" enctype="multipart/form-data">';

            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {

                echo "  <div class='form-group'>
                <label for='Titular'><span class='color_blanco'>Titular</span></label>
                <input type='text' name='tit' value='$fila[titular]' class='form-control' id='Titular'>
            </div>
            <div class='form-group'>
                <label for='Contenido'><span class='color_blanco'>Contenido</span></label>
                <textarea name='con' class='form-control' id='Contenido' cols='30' rows='10'> $fila[contenido]</textarea>
            </div>
            <div class='form-group'>
                <label for='foto'><span class='color_blanco'>Foto</span></label>
                <input type='file' name='fot' value='$fila[foto]' class='form-control' id='foto'>
            </div>
            <div class='form-group'>
                <label for='precio'><span class='color_blanco'>Precio del evento</span></label>
                <input type='text' name='pre' value='$fila[precio_evento]' class='form-control' id='precio'>
            </div>
            <div class='form-group'>
                <label for='Aforo'><span class='color_blanco'>Aforo</span></label>
                <input type='text' name='afo'value='$fila[aforo]'  class='form-control' id='Aforo'>
            </div>
            <div class='form-group'>
                <label for='fecha'><span class='color_blanco'>Fecha del evento</span></label>
                <input type='date' name='fec' value='$fila[fecha]' class='form-control' id='fecha'>
            </div>";
            }
            echo '   <div class="pt-1 mb-4">
            <input class="btn-lg btn-block boton" type="submit" name="enviar">
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>
            </section>';


            if (isset($_POST["enviar"])) {
                if (!($_POST["tit"] && $_POST["con"] && $_FILES["fot"] && $_POST["pre"]
                    && $_POST["afo"] && $_POST["fec"])) {
                    echo "<p align='center'>Introduce todos los campos</p>";
                } else {
                    $titular = $_POST["tit"];
                    $contenido = $_POST["con"];
                    $precio = $_POST["pre"];
                    $aforo = $_POST["afo"];
                    $fecha_evento = $_POST["fec"];

                    $foto = $_FILES["fot"]["name"];
                    $type = $_FILES["fot"]["type"];
                    $temp = $_FILES["fot"]["tmp_name"];
                    $tamaño = $_FILES["fot"]["size"];

                    if (!file_exists("../img/Eventos")) {
                        mkdir("../img/Eventos");
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
                        $ruta = "../img/Eventos/$foto1";
                        move_uploaded_file($temp, $ruta);
                    } else {
                        echo "<p align='center'>El formato de la foto tiene que ser jpg o png</p>";
                    }


                    $sentencia2 = "update evento set titular=?,contenido=?,foto=?,precio_evento=?,aforo=?,fecha=? where codigo=$codigo";
                    $consulta2 = $conexion->prepare($sentencia2);
                    $consulta2->bind_param("sssdis", $titular, $contenido, $foto, $precio, $aforo, $fecha_evento);
                    $consulta2->execute();
                    $consulta2->store_result();

                    if ($conexion->affected_rows == 0) {
                        echo "<p align='center'>No se ha modificado</p>";
                    } else {
                        echo "<p align='center'>datos modicados con exito</p>";
                    }
                    $consulta->close();
                    $consulta2->close();
                }
            }
            $conexion->close();
        } //FIN ISSET($_SESSION["usuario]);



        ?>
    </main>
</body>

</html>