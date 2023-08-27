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
            echo "<h1>Buscar eventos</h1>";
        ?>
            <section class="buscar_eventos">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-6 caja_formu">
                            <div class="formu_contacta">
                                <h5 class="color_blanco">Introduce el titulo del evento</h5>
                                <br>
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label for="nom"></label>
                                        <input type="text" name="buscar" class="form-control" id="nom">
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
                if (!$_POST["buscar"]) {
                    echo '<script>alert("Introduce el titulo del evento")</script>';
                } else {

                    $buscar = "%" . $_POST["buscar"] . "%";
                    $sentencia = "select * from evento where titular like ?";
                    $consulta = $conexion->prepare($sentencia);
                    $consulta->bind_param("s", $buscar);
                    $consulta->bind_result($cod,$tit,$con,$fot,$pre,$afo,$fe);
                    $consulta->execute();
                    $consulta->store_result();

                    if ($consulta->affected_rows == 0) {
                        echo "<p align='center'>No existen esos datos</p>";
                    } else {
                        echo "<br>";
                        echo "<div class='table-responsive buscar_tabla'>";
                        echo '<table class="table table-hover">
                                <thead class="cabecera_tabla">
                                <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Titular</th>
                                <th scope="col">Precio del evento</th>
                                <th scope="col">Aforo</th>
                                <th scope="col">Fecha</th>
                                </tr>
                                </thead>
                                <tbody>';
                        
                            while ($consulta->fetch()) {

                            $fec = strtotime($fe);
                            $fecha = date("d/m/Y", $fec);

                            echo "<tr>
                            <td>$cod</td><td><img style='width:70%' src='../img/eventos/$fot'></td>
                            <td>$tit</td><td>$pre €</td><td>$afo</td><td>$fecha</td>
                            </tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";

                        $consulta->close();
                    }
                }
            }
            $conexion->close();
        } //FIN ISSET($_SESSION["admin"]);
        ?>
    </main>
</body>

</html>