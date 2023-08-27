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
       if (isset ($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
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
                <h1>Noticias</h1>
            </div>
        </section>

        <!--NOTICIAS-->
        <?php
        $sentencia = "select * from noticia order by fecha desc limit 6";
        $consulta = $conexion->query($sentencia);
        echo "<article class='noticias'>
            <div class='container'>
                <div class='row'>";
        while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {

            $fec = strtotime($fila["fecha"]);
            $fecha_publicacion = date("d/m/Y", $fec);

            echo " 
            <div class='col-sm-6'>
                        <img class='img-fluid' src='../img/noticias/$fila[foto]' alt=''>
                    </div>
                    <div class='col-sm-6'>
                        <h4 class='alineacion_noticias'>$fila[titulo]</h4>
                        <p class='alineacion_noticias color_grisClaro'><strong>$fila[subtitulo]</strong></p>
                        <p class='alineacion_noticias color_grisClaro'>Fecha publicación: $fecha_publicacion</p>
                        <br>
                        <a href='ver_noticia.php?codigo=$fila[codigo]' class='boton alineacion_boton'>Ver Más</a>
                    </div>
                    <hr class='separador_noticias'>";
        }
        echo "</div>
            </div>
        </article>";

        //FOOTER
        footer();
        ?>
    </main>

</body>

</html>