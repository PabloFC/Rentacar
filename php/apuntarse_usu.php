<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RentLuxuryCars</title>
</head>

<body>
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
        <title>Rent a car</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/estilos.css">
    </head>

    <body>
        <main>

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

                        $codigo=$_GET["codigo"];
                        // echo $codigo;

                        $sentencia = "insert into asiste values('$_SESSION[dni]',$codigo)";
                        $consulta = $conexion->prepare($sentencia);
                        $consulta->execute();
                        $consulta->store_result();

                        // print_r($consulta);
                        if ($consulta->affected_rows == 0) {
                            echo "<p align='center'>La reserva no se ha podido efectuar</p>";
                        } else {
                            echo "<div class='container'>
                        <div class='row justify-content-center'>
                            <div class='col-sm-8 mensaje_alquilado' style='background-color:#3d3c3c;'>
                                <h4 align='center' style='color:#ff102d; font-size:20px; text-align:left;'>
                                Gracias por apuntarte a este evento!! </h4>";

                               echo" <p align='left' class='color_blanco'> Si quieres cancelar la reserva llámanos <strong>
                               <a style='color:#ff102d !important; text-align:left !important;' href='tel:661478899'>661478899</a> </strong> </p>
                            </div>
            
                        </div>
                    </div>";
                        }
                        $consulta->close();


                    ?>

                    <?php
                    } //FIN DE SESION
                    ?>

            </body>

    </html>