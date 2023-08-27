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
            
            $codigo = $_GET["codigo"];

            $sentencia = " delete from noticia where codigo=?";
            $consulta = $conexion->prepare($sentencia);
            $consulta->bind_param("i", $codigo);
            $consulta->execute();
            $consulta->store_result();

            if ($consulta->affected_rows == 0) {
                echo "<h2 align='center'>La noticia no se ha podido borrar</h2>";
            } else {
                echo "<h2 align='center'>Noticia borrada con exito</h2>";
            }

            $conexion->close();
        }

        ?>
    </main>
</body>

</html>