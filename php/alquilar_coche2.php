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
        <article>
            <!--Menu -->
            <?php
            require_once("funciones.php");
            $conexion = conectar_servidor();
            info();
            $rut1 = "../";
            $rut2 = "./";
            if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
                menu_usu($rut1, $rut2);
            } else {
                main_menu($rut1, $rut2);
            }
            ?>
            <!--BANNER-->
            <section class="banner">
                <div class="container-fluid">
                    <img class="img-fluid" src="../img/banner.jpg" alt="">
                </div>
                <div class="centrado">
                    <h1>Alquilar</h1>
                </div>
            </section>
            <!--Foto y descripcion-->
            <article>
                <?php
                $matricula = $_GET["matricula"];

                $sentencia = "select nombre,coche.* from coche,marca where 
                coche.marca=marca.codigo and matricula='$matricula'";
                $consulta = $conexion->query($sentencia);
                echo '<div class="container">';

                while ($fila = $consulta->fetch_array((MYSQLI_ASSOC))) {
                    echo '<div class="row" style="margin-top: 40px;">';
                    echo "<div class='col-sm-12'>";
                    echo "<h2> $fila[nombre] $fila[modelo] </h2>";
                    echo "</div>";
                    echo "</div>";

                    echo '<div class="row" style="margin-top: 40px;">';
                    echo "<div class='col-sm-6'>";
                    echo "<img class='img-fluid' src='../img/$fila[foto]' alt='Foto de coche'>";
                    echo "<div class='iconos_coche'>
                                    <span><img src='../img/asientos.png' alt='icono asiento de coche'><span class='icons_words'> $fila[asientos] Asientos</span></span>
                                    <span><img src='../img/caballos.png' alt='icono caballos de coche'><span class='icons_words'> $fila[caballos] Caballos</span></span>
                                    <span><img src='../img/coche.png' alt='icono tipo de coche'><span class='icons_words'> ";
                    echo ucfirst($fila["tipo"]);
                    echo "</span></span>
                            </div>";
                    echo "</div>";
                    echo "<div class='col-sm-6'>";
                    echo "<p class='descrip'>$fila[descripcion]</p>";
                    echo "</div>";
                    echo "</div>";
                }


                echo "</div>";
                $consulta->close();
                ?>
            </article>
            <!--FORMULARIO-->
            <section class="alquilar">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <div class="formu_contacta" style="padding:2% !important;">
                                <h3 class="color_blanco">Reservar vehículo</h3>
                                <br>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="recogida"><span class="color_rojo">Día de recogida</span></label>
                                        <input type="date" min="<?php echo date('Y-m-d'); ?>" name="rec" class="form-control" id="recogida">
                                    </div>
                                    <div class="form-group">
                                        <label for="devolucion"><span class="color_rojo">Día de devolución</span></label>
                                        <input type="date" name="dev" class="form-control" id="devolucion">
                                    </div>
                                    <?php
                                    $sentencia = "select precio_dia from coche where matricula='$matricula'";
                                    $consulta = $conexion->query($sentencia);
                                    while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                                        echo "<label for='precio'><span class='color_rojo'>Precio por día</span></label>
                                        <input type='text' name='pre' value='$fila[precio_dia] €' class='form-control' id='precio'>";
                                    }
                                    $consulta->close();
                                    ?>
                                    <div class="pt-1 mb-4">
                                        <input class="btn-lg btn-block boton" style="margin-top:3%;" name="enviar" value="Alquilar" type="submit">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <?php
            if (isset($_POST["enviar"])) {
                if (!($_POST["rec"] && $_POST["dev"])) {
                    echo '<script>alert("Introduce todos los campos")</script>';
                    echo "<p align='center'>Introduce todos los campos</p>";
                } else {

                    $recogida = $_POST["rec"];
                    $devolucion = $_POST["dev"];

                    $fecha1 = strtotime($recogida) / 60 / 60 / 24;
                    $fecha2 = strtotime($devolucion) / 60 / 60 / 24;
                    $dias_pasados1 = $fecha2 - $fecha1;

                    $sentencia = "select precio_dia from coche where matricula='$matricula'";
                    $consulta = $conexion->query($sentencia);

                    while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                        $precio_total = $fila["precio_dia"] * $dias_pasados1;
                    }

                    $sentprev = "select count(*) c from reserva where matricula_coche='$matricula' 
                    and fecha_inicio='$recogida'";
                    // print_r($sentprev) ;
                    $consultaprev = $conexion->query($sentprev);



                    while ($filaprev = $consultaprev->fetch_array(MYSQLI_ASSOC)) {
                        $nReserva = $filaprev["c"];
                    }

                    $sentencia2 = "insert into reserva values(null,'$_SESSION[dni]','$matricula','$recogida',
                    '$devolucion',$precio_total)";
                    // print_r($sentencia2);
                    $consulta2 = $conexion->prepare($sentencia2);
                    $consulta2->execute();

                    $fec1 = strtotime($recogida);
                    $recog = date("d/m/Y", $fec1);
                    $fec2 = strtotime($devolucion);
                    $devol = date("d/m/Y", $fec2);

                    if ($consulta2->affected_rows == 0 || $nReserva > 0) {
                        echo "<p align='center'>Lo sentimos, este coche ya está alquilado para esa fecha</p>";
                    } else {

                        echo "<div class='container'>
                        <div class='row justify-content-center'>
                            <div class='col-sm-8 mensaje_alquilado' style='background-color:#3d3c3c;'>
                                <h4 align='center' style='color:#ff102d; font-size:20px; text-align:left;'>
                                Gracias"; ?> <?php echo $mayus = ucfirst($_SESSION["usuario"]) ?>
            <?php
                        echo " por confiar en nosotros!! ";
                        echo "</h4>";
                        echo "<p align='left' class='color_blanco'>Has alquilado el coche el día $recog hasta
                                el día $devol con un precio total de <br> $precio_total €. </p>";
                        echo " <p align='left' class='color_blanco'> Si quieres cancelar la reserva llámanos <strong>
                               <a style='color:#ff102d !important; text-align:left !important;' href='tel:661478899'>661478899</a> </strong> </p>
                            </div>
            
                        </div>
                    </div>";
                    }

                    $consulta2->close();
                }
            }

            ?>


        </article>
        <?php
        footer();
        ?>
    </main>

</body>

</html>