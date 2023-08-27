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
        if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
            menu_usu($rut1, $rut2);
        } else {
            main_menu($rut1, $rut2);
        }
        ?>
        <!--LOGIN-->
        <section class="vh-100" style="background-color: white;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem; background-color:#3d3c3c;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-login-form/img1.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">

                                        <form action="#" method="post">
                                            <div class="form-outline mb-4">
                                                <label style="font-family: 'Montserrat', sans-serif !important;" class="form-label color_blanco" for="nombre">Nombre</label>
                                                <input type="text" name="usu" id="nombre" class="form-control form-control-lg" />

                                            </div>

                                            <div class="form-outline mb-4">
                                                <label style="font-family: 'Montserrat', sans-serif !important;" class="form-label color_blanco" for="contra">Contraseña</label>
                                                <input type="password" name="pass" id="contra" class="form-control form-control-lg" />

                                            </div>

                                            <div class="pt-1 mb-4">
                                                <input style="font-family: 'Montserrat', sans-serif !important;" class="btn-lg btn-block boton" type="submit" name="enviar" value="Entrar">
                                            </div>

                                        </form>
                                        <?php
                                        if (isset($_POST["enviar"])) {
                                            if (!($_POST["usu"] && $_POST["pass"])) {
                                                echo "<p align='center' style='margin-botton:90% !important; color:red;'>
                                                Tienes que rellenar todos los campos del formulario</p>";
                                            } else {
                                                $usuario = $_POST["usu"];
                                                $contraseña = $_POST["pass"];

                                                $sentencia = "select dni,nombre_usuario,contraseña from cliente where nombre_usuario=? 
                                                and contraseña=?";
                                                $consulta = $conexion->prepare($sentencia);
                                                $consulta->bind_param("ss", $usuario, $contraseña);
                                                $consulta->bind_result($dni, $usu, $contra);
                                                $consulta->execute();
                                                $consulta->store_result();

                                                if ($consulta->num_rows == 0) {
                                                    echo "<p align='center' style='margin-botton:90% !important; color:red;'>
                                                    Usuario o contraseña incorrectos</p>";
                                                } else {

                                                    while ($consulta->fetch()) {

                                                        $_SESSION["dni"] = $dni;
                                                        $_SESSION["usuario"] = $usuario;
                                                        $_SESSION["contraseña"] = $contraseña;
                                                    }

                                                    if (isset($_SESSION["usuario"]) && isset($_SESSION["dni"])) {
                                                        // header("location:./usuario.php");
                                                        echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";
                                                       
                                                    }
                                                }
                                                if ($usuario == "admin" && $contraseña == "admin") {
                                                    $admin = $usuario;
                                                    $_SESSION["admin"] = $admin;
                                                    // header("location:./clientes.php");
                                                    echo "<meta http-equiv='refresh' content='0;URL=./clientes.php'>";
                                                }
                                            }
                                        }

                                        ?>
                                    </div>
        </section>


    </main>

</html>