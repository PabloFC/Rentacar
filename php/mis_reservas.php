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
            <?php
                require_once("funciones.php");
                $conexion = conectar_servidor();
                info();
                $rut1 = "../";
                $rut2 = "./";
                if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
                    menu_usu($rut1, $rut2);
                    ?>
                    <!--BANNER-->
                    <section class="banner">
                        <div class="container-fluid">
                            <img class="img-fluid" src="../img/banner.jpg" alt="">
                        </div>
                        <div class="centrado">
                            <h1>Mis Reservas</h1>
                        </div>
                    </section>
                    <?php
                    echo "<h1> Reservas de ".ucfirst($_SESSION["usuario"])."</h1>";
                    $sentencia = "select nombre,foto,modelo,marca,fecha_inicio,fecha_fin
                    from reserva,coche,marca where  coche.marca=marca.codigo and 
                    coche.matricula=reserva.matricula_coche and
                    dni_cliente='$_SESSION[dni]' order by fecha_inicio desc";
                    $consulta = $conexion->query($sentencia);

                    echo "<br>";
                    echo "<div class='table-responsive tamaño_tabla'>";
                    echo '<table class="table table-hover">
                    <thead class="cabecera_tabla">
                    <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Fecha de recogida</th>
                    <th scope="col">Fecha de devolucion</th>
                    <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>';
                    while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {

                        $inicio=strtotime($fila["fecha_inicio"]);
                        $fecha_inicio=date("d/m/Y", $inicio);
                        
                        $fin=strtotime($fila["fecha_fin"]);
                        $fecha_fin=date("d/m/Y", $fin);

                        echo "<tr><td><img class='img-fluid imagen_noticias' src='../img/$fila[foto]'</td>
                        <td>$fila[nombre]</td><td>$fila[modelo]</td><td>$fecha_inicio</td><td>$fecha_fin</td>
                        <td><a class='btn btn-danger' href='#'>Reservado</a></td></tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                    echo "</div>";
                    footer();
                    ?>
                    
                    <?php
                } 
                ?>
        </article>
    </main>
    
</body>
</html>