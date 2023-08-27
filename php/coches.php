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
        if (isset ($_SESSION["admin"])){
            require_once("funciones.php");
            $conexion=conectar_servidor();
            menu_admin();
            
        ?>
        <div>
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item boton_submenu">
                    <a href="insertar_coches.php">Insertar coches</a>
                </li>
                <li class="list-group-item boton_submenu">
                    <a href="buscar_coches.php">Buscar coches</a>
                </li>
            </ul>
        </div>
        <?php
        echo "<h1>Coches</h1>";
        $sentencia = "select nombre,coche.* from coche,marca where 
        coche.marca=marca.codigo order by marca asc";
        $consulta = $conexion->query($sentencia);

        echo "<br>";
        echo "<div class='table-responsive tamaño_tabla'>";
        echo '<table class="table table-hover">
        <thead class="cabecera_tabla">
        <tr>
        <th scope="col">Foto</th>
        <th scope="col">Matrícula</th>
        <th scope="col">Marca</th>
        <th scope="col">Modelo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Fecha de compra</th>
        <th scope="col">Precio día</th>
        <th scope="col">Asientos</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
        </thead>
        <tbody>';
        while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {

            $fec = strtotime($fila["fecha_compra"]);
            $compra = date("d/m/Y", $fec);

            echo "<tr><td><img class='img-fluid' src='../img/$fila[foto]'></td><td>$fila[matricula]</td>
            <td>$fila[nombre]</td><td>$fila[modelo]</td><td>$fila[tipo]</td>
            <td>$compra</td><td>$fila[precio_dia]€</td>
            <td>$fila[asientos]</td>
            <td><a class='btn btn-success' href='modificar_coche.php?matricula=$fila[matricula]'>Modificar</a></td>
            <td><a class='btn btn-danger' href='eliminar_coche.php?matricula=$fila[matricula]'>Borrar</a></td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        
    } //FIN DE SESSION
    ?>
    </main>
</body>

</html>