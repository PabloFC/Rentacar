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
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <main>
        <!--Menu -->
        <?php
        require_once("php/funciones.php");
        $conexion = conectar_servidor();
        info();
        $rut1 = "./";
        $rut2 = "php/";
        if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
            menu_usu($rut1, $rut2);
        } else {
            main_menu($rut1, $rut2);
        }

        ?>

        <!--SLIDER-->

        <section>
            <div id="coches" class="carousel slide fluid-carousel d-none d-sm-block" data-ride="carousel" data-interval="3000">
                <!-- Indicadores -->
                <ul class="carousel-indicators">
                    <li data-target="#coches" data-slide-to="0" class="active"></li>
                    <li data-target="#coches" data-slide-to="1"></li>
                    <li data-target="#coches" data-slide-to="2"></li>
                </ul>

                <!-- Imágenes -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="carousel-caption d-none d-sm-block fondoTransparente">
                            <h2>Los más potentes del mercado</h2>
                            <a href="php/deportivos.php" class="boton">Ver Deportivos</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-sm-block fondoTransparente">
                            <h2>Coches de época que siempre quisiste conducir</h2>
                            <a href="php/clasicos.php" class="boton">Ver Clásicos</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-sm-block fondoTransparente">
                            <h2>Disfruta en familia</h2>
                            <a href="php/todoterrenos.php" class="boton">Ver Todoterrenos</a>
                        </div>
                    </div>
                </div>

                <!-- Siguiente y anterior -->
                <a class="carousel-control-prev" href="#coches" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#coches" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </section>

        <!-- NUESTROS COCHES -->
        <h1>Nuestros Coches</h1>

        <?php
        $sentencia = "select matricula,marca.nombre,modelo,coche.foto,tipo,precio_dia from coche,marca where 
        coche.marca=marca.codigo order by fecha_compra desc";
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
                            <img src='img/$fila[foto]' class='card-img-top imagen_coche' alt='...'>
                            <div class='card-body'>
                                <a href='php/alquilar_coche2.php?matricula=$fila[matricula]' class='boton'>Ver más</a>
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
                        <img src='img/$fila[foto]' class='card-img-top imagen_coche' alt='...'>
                        <div class='card-body'>
                            <a href='php/alquilar_coche.php?matricula=$fila[matricula]' class='boton'>Ver más</a>
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
        $consulta->close();
        ?>

        <!-- SERVICIOS -->
        <article class="servicios">
            <h2>¿Qué ofrecemos?</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 margen fondo_servicios" id="uno">
                        <div class="iconos_servicios">
                            <img src="img/alquiler.png" alt="">
                        </div>
                        <h5 style="color:black;">Alquiler de coches</h5>
                        <p> Sólo trabajamos con primeras marcas, Superdeportivos y coches de lujo exclusivos avalados por la máxima cobertura de seguros.</p>
                    </div>
                    <div class="col-lg-3 margen imagen_servicios" id="dos">
                        <img class="img-fluid" src="img/alquiler.jpg" alt="">
                    </div>

                    <div class="col-lg-3 margen fondo_servicios" id="cinco">
                        <div class="iconos_servicios">
                            <img src="img/events.png" alt="">
                        </div>
                        <h5 style="color:black;">Eventos</h5>
                        <p>Somos grandes amantes de los coches por encima de todo. Por ello, estamos muy activos en la comunidad automovilística y organizamos múltiples eventos a precios muy asequibles para que todos puedan disfrutar de nuestra pasión.</p>
                    </div>
                    <div class="col-lg-3 margen imagen_servicios" id="seis">
                        <img class="img-fluid" src="img/eventos_index.jpg" alt="">
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-3 margen fondo_servicios" id="tres">
                        <div class="iconos_servicios">
                            <img src="img/repair.png" alt="">
                        </div>
                        <h5 style="color:black;">Mantenimiento</h5>
                        <p> Reparamos tu coche de alta gama. Si tienes dificultad en encontrar piezas específicas para arreglar tu vehículo, nosotros te las conseguimos.</p>
                    </div>
                    <div class="col-lg-3 margen imagen_servicios" id="cuatro">
                        <img class="img-fluid" src="img/mecanico.jpg" alt="">
                    </div>

                    <div class="col-lg-3 margen fondo_servicios" id="siete">
                        <div class="iconos_servicios">
                            <img src="img/24hours.png" alt="">
                        </div>
                        <h5 style="color:black;">Servicio 24H</h5>
                        <p> No descansamos el fin de semana para que usted pueda hacerlo. Para ello prestamos el servicio de 24 horas de atención los 365 días del año. </p>
                    </div>
                    <div class="col-lg-3 margen imagen_servicios" id="ocho">
                        <img class="img-fluid" src="img/24h.jpg" alt="">
                    </div>
                </div>

        </article>

        <!--MARCAS-->
        <section class="marcas">
            <h2>Marcas</h2>
            <div class="container">
                <div class="row">
                    <?php
                    $sentencia = "select codigo,foto_logo from marca";
                    $consulta = $conexion->query($sentencia);
                    while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {
                        if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
                            echo '<div class="col-12 col-sm-6 col-lg-3 logo">';
                            echo " <a href='./php/marcas.php?codigo=$fila[codigo]'><img src='img/logos/$fila[foto_logo]' alt=''></a>";
                            echo "</div>";
                        } else {
                            echo '<div class="col-12 col-sm-6 col-lg-3 logo">';
                            echo "<a href='./php/marcas.php?codigo=$fila[codigo]'><img src='img/logos/$fila[foto_logo]' alt=''></a>";
                            echo "</div>";
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

        <!--FOOTER-->

        <?php
        footer();
        ?>


    </main>

</body>

</html>