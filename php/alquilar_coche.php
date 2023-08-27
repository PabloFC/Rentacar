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
            $conexion=conectar_servidor();
            info();
            $rut1 = "../";
            $rut2 = "./";
            main_menu($rut1,$rut2);
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
            <article>
                <?php
                $matricula = $_GET["matricula"];
                // echo $matricula;

                $sentencia = "select nombre, modelo, coche.foto, descripcion, asientos, caballos,tipo from coche,marca where 
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
                                    <span><img src='../img/coche.png' alt='icono tipo de coche'><span class='icons_words'> "; echo ucfirst($fila["tipo"]); echo "</span></span>
                            </div>";
                            echo"<div class='alquilar_coche'>
                                <a class='boton_alquilar' width='100%' href='./alquilar_usu.php'>Alquilar</a>
                                </div>"; 
                        echo "</div>";
                        echo "<div class='col-sm-6'>";
                            echo "<p class='descrip'>$fila[descripcion]</p>";
                        echo "</div>";
                    echo "</div>";
                }
                
                echo "</div>";

                ?>
            </article>
        </article>
        <?php
            footer();
        ?>
    </main>
    
</body>

</html>