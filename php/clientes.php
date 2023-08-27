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
                <li class="list-group-item boton_submenu"><a href="insertar_clientes.php">Insertar clientes</a></li>
                <li class="list-group-item boton_submenu"><a href="buscar_clientes.php">Buscar clientes</a></li>
            </ul>
        </div>
        <?php
        echo "<h1>Clientes</h1>";
        $sentencia = "select * from cliente order by nombre asc";
        $consulta = $conexion->query($sentencia);

        echo "<br>";
        echo "<div class='table-responsive tamaño_tabla'>";
        echo '<table class="table table-hover">
        <thead class="cabecera_tabla">
        <tr>
        <th scope="col">Dni</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombre usuario</th>
        <th scope="col">Contraseña</th>
        <th scope="col"></th>
        </tr>
        </thead>
        <tbody>';
        while ($fila = $consulta->fetch_array(MYSQLI_ASSOC)) {

            echo "<tr><td>$fila[dni]</td><td>$fila[nombre]</td><td>$fila[apellidos]</td><td>$fila[nombre_usuario]</td>
            <td><a class='btn btn-success' href='modificar_cliente.php?dni=$fila[dni]'>Modificar</a></td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } //FIN DE SESSION
    ?>
    </main>
</body>

</html>