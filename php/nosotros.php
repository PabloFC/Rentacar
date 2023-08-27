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
                <h1>Nosotros</h1>
            </div>
        </section>

        <!--Nosotros-->

        <section class="nosotros">
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <img class="img-fluid" style="margin-top:3% !important;" src="../img/nosotros.jpg" alt="">
                    </div>
                    <div class="col-sm-5">
                        <p style="text-align:left;"><strong>Rent luxury cars</strong> es una empresa dedicada al alquiler coches de alta gama y deportivos exclusivos, para cualquier tipo de evento, sea por horas o días.</p>
                        <p style="text-align:left;">Disponemos de una logística y un equipo humano experto que nos permite ir más allá, organizando incluso tu estancia al completo, con los lugares que desees visitar y actividades de tu interés, llevando nuestros servicios a cualquier punto de España.</p>
                        <p style="text-align:left;"> <strong>Nuestra misión</strong> es que todos los interesados del motor puedan disfrutar de su pasión a un precio asequible.</p>
                    </div>
                </div>
            </div>
        </section>
        <hr class="separador">

        <!--Nuestro Equipo-->

        <h2>Nuestro equipo</h2>

        <article class="nuestro_equipo">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3 equipo">
                        <img class="img-fluid" src="../img/equipo/ceo.jpg" alt="">
                        <p class="alineacion_equipo"><strong>Pablo Fuentes</strong></p>
                        <p class="alineacion_equipo">CEO</p>
                    </div>
                    <div class="col-sm-3 equipo">
                        <img class="img-fluid" src="../img/equipo/manager.jpg" alt="">
                        <p class="alineacion_equipo"><strong>Naiara Martínez</strong></p>
                        <p class="alineacion_equipo">Manager</p>
                    </div>
                    <div class="col-sm-3 equipo">
                        <img class="img-fluid" src="../img/equipo/marketing.jpg" alt="">
                        <p class="alineacion_equipo"><strong>Guillermo Ferres</strong></p>
                        <p class="alineacion_equipo">Marketing</p>
                    </div>
                    <div class="col-sm-3 equipo">
                        <img class="img-fluid" src="../img/equipo/ventas.jpg" alt="">
                        <p class="alineacion_equipo"><strong>Rafael Sánchez</strong></p>
                        <p class="alineacion_equipo">Mecánico</p>
                    </div>
                </div>
            </div>
        </article>

        <!--CONTACTA-->
        <h2>Contacta</h2>

        <section class="contacta">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="formu_contacta">
                            <h3 class="color_blanco">¿Tienes alguna duda?</h3>
                            <br>
                            <form action="#">
                                <div class="form-group">
                                    <label for="nom"><i class="fas fa-user color_rojo"></i></label>
                                    <input type="text" class="form-control" id="nom" placeholder="Nombre..." required>
                                </div>
                                <div class="form-group">
                                    <label for="correo"><i class="fas fa-envelope color_rojo"></i></label>
                                    <input type="email" class="form-control" id="correo" placeholder="Correo..." required>
                                </div>
                                <div class="form-group">
                                    <label for="mensa"><i class="fas fa-pencil-alt color_rojo"></i></label>
                                    <textarea class="form-control" id="mensa" rows="5" placeholder="Escriba su mensaje.." required></textarea>
                                </div>
                                <div class="pt-1 mb-4">
                                    <a href="mailto:Rluxurycars@info.com" class="btn-lg btn-block boton" style="text-align:center">Enviar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <iframe width="100%" height="400px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12714.229746408095!2d-3.607656!3d37.1869872!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb362c7165dc2ded2!2sEscuela%20Arte%20Granada!5e0!3m2!1ses!2ses!4v1630434562688!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row text-center icono_nosotros">
                    <div class="col-md-4">
                        <i class="fas fa-map-marker-alt fa-2x color_rojo"></i></a>
                        <p style="font-weight:bold;">Av. Dr. Oloriz, 6, 18012</p>
                        <p style="font-weight:bold;">Granada</p>
                    </div>
    
                    <div class="col-md-4">
                        <i class="fas fa-phone fa-2x color_rojo"></i></a>
                        <p style="font-weight:bold;">+34 661478899</p>
                    </div>
    
                    <div class="col-md-4">
                        <i class="fas fa-envelope fa-2x color_rojo"></i></a>
                        <p style="font-weight:bold;">Rluxurycars@info.com</p>
                    </div>
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