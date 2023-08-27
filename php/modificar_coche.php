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
            $conexion=conectar_servidor();
            menu_admin();
            
            $matricula = $_GET["matricula"];
            echo "<h1> Modificar coche </h1>";

            $sentencia = "select nombre,coche.* from coche,marca where 
            coche.marca=marca.codigo and matricula='$matricula'";
            $consulta = $conexion->query($sentencia);

            echo '<section class="modificar_noticias">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 caja_formu">
                        <div class="formu_contacta">
                            <form action="#" method="post" enctype="multipart/form-data">';

            while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {

                echo "  
            <div class='form-group'>
                <label for='Modelo'><span class='color_blanco'>Modelo</span></label>
                <input type='text' name='mod' value='$fila[modelo]' class='form-control' id='Modelo'>
            </div>
            <div class='form-group'>
                <label for='Tipo'><span class='color_blanco'>Tipo</span></label>
                <input type='text' name='tip' value='$fila[tipo]' class='form-control' id='Tipo'>
            </div>
            <div class='form-group'>
                <label for='foto'><span class='color_blanco'>Foto</span></label>
                <input type='file' name='fot' value='$fila[foto]' class='form-control' id='foto'>
            </div>
            <div class='form-group'>
                <label for='fecha'><span class='color_blanco'>Fecha de compra</span></label>
                <input type='date' name='fec' value='$fila[fecha_compra]' class='form-control' id='fecha'>
            </div>
            <div class='form-group'>
                <label for='Precio'><span class='color_blanco'>Precio por día</span></label>
                <input type='text' name='pre' value='$fila[precio_dia]' class='form-control' id='Precio'>
            </div>
            <div class='form-group'>
                <label for='Descripcion'><span class='color_blanco'>Descripcion</span></label>
                <textarea name='des' value='$fila[descripcion]' class='form-control' id='Descripcion' cols='30' rows='10'></textarea>
            </div>
            <div class='form-group'>
                <label for='Caballos'><span class='color_blanco'>Caballos </span></label>
                <input type='text' name='cab' value='$fila[caballos]' class='form-control' id='Caballos'>
            </div>
            <div class='form-group'>
                <label for='Asientos'><span class='color_blanco'>Asientos </span></label>
                <input type='text' name='asi' value='$fila[asientos]' class='form-control' id='Asientos'>
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
                if (!($_POST["mod"] && $_POST["tip"] && $_FILES["fot"] 
                && $_POST["fec"]) && $_POST["pre"] && $_POST["des"] && $_POST["cab"] && $_POST["asi"]) {
                    echo "<p align='center'>Introduce todos los campos</p>";
                } else {

                    // $matricula = $_POST["mat"];
                    // $marca = $_POST["mar"];
                    $modelo = $_POST["mod"];
                    $tipo = $_POST["tip"];
                    $fecha_compra=$_POST["fec"];
                    $precio_dia=$_POST["pre"];
                    $descripcion=$_POST["des"];
                    $caballos=$_POST["cab"];
                    $asientos=$_POST["asi"];

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


                    $sentencia2 = "update coche set modelo=?,tipo=?,foto=?,fecha_compra=?,
                    precio_dia=?,descripcion=?,caballos=?,asientos=? where matricula='$matricula'";
                    $consulta2 = $conexion->prepare($sentencia2);
                    $consulta2->bind_param("ssssdsii", $modelo, $tipo,$foto,$fecha_compra,
                    $precio_dia,$descripcion,$caballos,$asientos);
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