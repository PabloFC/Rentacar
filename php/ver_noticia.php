<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

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

        $codigo = $_GET["codigo"];
        // echo $codigo;

        $sentencia = "select * from noticia where codigo='$codigo'";
        $consulta = $conexion->query($sentencia);
        echo '<div class="container">';
        echo '<div class="row">';
        while ($fila = $consulta->fetch_array((MYSQLI_ASSOC))) {

            $fec = strtotime($fila["fecha"]);
            $fecha_publicacion = date("d/m/Y", $fec);

            echo "<div class='col-sm-12'>
                                    <h1 style='text-align:left;'>$fila[titulo]</h1>
                                <div>
                                        <img width='100%' class='img-fluid' src='../img/Noticias/$fila[foto]' alt='Foto de la noticia'>
                                </div>
                                <div>
                                        <p class='color_grisClaro' style='text-align:left;'>Fecha de publicación: $fecha_publicacion</p>
                                </div>";


            echo "<div>
                                <p style='text-align:left; font-size:18px !important;'>$fila[contenido]</p>
                                </div>
                    </div>";
        }
        echo "</div>";
        echo "</div>";

        ?>

    </main>
    <?php
        footer();
    ?>
</body>

</html>