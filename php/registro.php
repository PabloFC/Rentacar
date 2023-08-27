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
         require_once("funciones.php");
         $conexion=conectar_servidor();
         info();
         $rut1="../";
         $rut2="./";
         main_menu($rut1,$rut2);
        echo "<h1> Registro</h1>";

        ?>

        <section class="insertar_clientes">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-6 caja_formu">
                        <div class="formu_contacta">
                            <form action="#" method="post">
                            <div class="form-group">
                                    <label for="nif"><span class="color_blanco">Dni</span></label>
                                    <input type="text" name="dni" class="form-control" id="nif">
                                </div>
                                <div class="form-group">
                                    <label for="nombre"><span class="color_blanco">Nombre</span></label>
                                    <input type="text" name="nom" class="form-control" id="nombre">
                                </div>
                                <div class="form-group">
                                    <label for="apellidos"><span class="color_blanco">Apellidos</span></label>
                                    <input type="text" name="ape" class="form-control" id="apellidos">
                                </div>
                                <div class="form-group">
                                    <label for="usuario"><span class="color_blanco">Nombre de usuario</span></label>
                                    <input type="text" name="usu" class="form-control" id="usuario">
                                </div>
                                <div class="form-group">
                                    <label for="contraseña"><span class="color_blanco">Contraseña</span></label>
                                    <input type="password" name="contra" class="form-control" id="contraseña">
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
        if(isset($_POST["enviar"])){
            if(!($_POST["dni"] && $_POST["nom"] && $_POST["ape"] && $_POST["usu"] && $_POST["contra"])){
                echo '<script>alert("Introduce todos los campos")</script>';
            }else{
                $dni=$_POST["dni"];
                $nombre=$_POST["nom"];
                $apellidos=$_POST["ape"];
                $usuario=$_POST["usu"];
                $contraseña=$_POST["contra"];

                $sentencia="insert into cliente values(?,?,?,?,?)";
                $consulta=$conexion->prepare($sentencia);
                $consulta->bind_param("sssss",$dni,$nombre,$apellidos,$usuario,$contraseña);
                $consulta->execute();
                $consulta->store_result();

                if($consulta->affected_rows==0){
                    echo "<p align='center'>No se ha podido realizar el registro</p>";
                }else{
                    echo "<p align='center'>Registro realizado con exito</p>";
                    
                }
                $consulta->close();
            }
        }
        $conexion->close();
    
        
    ?>
    </main>
</body>

</html>