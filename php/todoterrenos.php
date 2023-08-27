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
        <!--Menu -->
        <?php
        require_once("funciones.php");
        $conexion = conectar_servidor();
        info();
        if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
            $rut1 = "../";
            $rut2 = "./";
            menu_usu($rut1, $rut2);
           
        } else {
            $rut1 = "../";
            $rut2 = "./";
            main_menu($rut1, $rut2);
        }
        ?>

        <!--BANNER-->
        <section class="banner">
            <div class="container-fluid">
                <img class="img-fluid" src="../img/banner.jpg" alt="">
            </div>
            <div class="centrado">
                <h1>Todoterrenos</h1>
            </div>
        </section>

        <!--Coches Todoterrenos-->
        <?php
        require_once("funciones.php");
        $conexion = conectar_servidor();

        $sentencia = "select marca.nombre,coche.* from coche,marca where 
        coche.marca=marca.codigo and tipo='todoterreno'";
        $consulta = $conexion->query($sentencia);

        echo "
        <article>
            <div class='container cuerpo_web'>
                <div class='row'>";
        while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
            if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
                echo "
                                    <div class='col-12 col-sm-6 col-lg-3'>
                                        <div class='card'>
                                            <div class='card-header'>
                                                <h5 class='card-title'>$fila[nombre] $fila[modelo]</h5>
                                            </div>
                                            <img src='../img/$fila[foto]' class='card-img-top imagen_coche' alt='...'>
                                            <div class='card-body'>
                                                <a href='alquilar_coche2.php?matricula=$fila[matricula]' class='boton'>Ver más</a>
                                            </div>
                                            <div class='card-footer'>
                                                <span class='badge bg-warning'>$fila[tipo]</span>
                                                <span class='badge bg-success'>$fila[precio_dia]€/día</span>
                                            </div>
                                        </div>
                                    </div>";
            } else {
                echo "
                <div class='col-12 col-sm-6 col-lg-3'>
                    <div class='card'>
                        <div class='card-header'>
                            <h5 class='card-title'>$fila[nombre] $fila[modelo]</h5>
                        </div>
                        <img src='../img/$fila[foto]' class='card-img-top imagen_coche' alt='...'>
                        <div class='card-body'>
                            <a href='alquilar_coche.php?matricula=$fila[matricula]' class='boton'>Ver más</a>
                        </div>
                        <div class='card-footer'>
                            <span class='badge bg-warning'>$fila[tipo]</span>
                            <span class='badge bg-success'>$fila[precio_dia]€/día</span>
                        </div>
                    </div>
                </div>";
            }
        }
        echo "</div>
            </div>
        </article>";
        ?>
    </main>
</body>

</html>