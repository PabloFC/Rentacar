<?php

function conectar_servidor()
{
    $conexion = new mysqli("localhost", "root", "", "concesionario");
    $conexion->set_charset("utf8");
    return $conexion;
}
function info()
{
    echo '<section class="info">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-sm-4 enlace_hover">
                        <span><i class="far fa-clock"></i> <strong> L-S: 09:00 am a 19:00 pm </strong></span>
                    </div>
                    <div class="col-12 col-sm-4 enlace_hover">
                        <span><i class="far fa-envelope"></i><strong> <a href="mailto:Rluxurycars@info.com">Rluxurycars@info.com</a></strong></span>
                    </div>
                    <div class="col-12 col-sm-2 enlace_hover">
                        <span><i class="fas fa-phone"></i> <strong><a href="tel:661478899">661478899</a> </strong></span>
                    </div>
                    <div class="col-12 col-sm-2 enlace_hover">
                        <span>
                            <a href="https://www.facebook.com/rentcardeluxegr"><i class="fab fa-facebook"></i></a> 
                            <a href="https://www.instagram.com/rentcardeluxe/?hl=es"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </section>';
}

function main_menu($ruta1, $ruta2)
{
    echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">';
            if( strrpos($_SERVER["REQUEST_URI"],"ind")===false && strlen($_SERVER["REQUEST_URI"])>20){
                echo' <a class="navbar-brand logo_principal" href="' . $ruta1 . 'index.php"><img src="../img/logo_principal/logo_color.png" alt=""></a>';
            }else{
                
                    echo' <a class="navbar-brand logo_principal" href="' . $ruta1 . 'index.php"><img src="./img/logo_principal/logo_color.png" alt=""></a>';
            }
               
                echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">';

    if (!isset($_SESSION["usuario"])) {
        echo '  <li class="nav-item">
                            <a class="nav-link" href="' . $ruta1 . 'index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'nosotros.php">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'noticias.php">Noticias</a>
                        </li>
                        <li class="nav-item cuenta">
                            <a class="nav-link cuenta" href="' . $ruta2 . 'cuenta.php">Cuenta</a>
                        </li>';
                        
                    }
                   
                   echo ' </ul>
                </div>
            </div>
        </nav>';
    
}


function menu_usu($ruta1,$ruta2)
{
    echo '
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">';
            if( strrpos($_SERVER["REQUEST_URI"],"ind")===false){
                echo' <a class="navbar-brand logo_principal" href="' . $ruta1 . 'index.php"><img src="../img/logo_principal/logo_color.png" alt=""></a>';
            }else{
                
                    echo' <a class="navbar-brand logo_principal" href="' . $ruta1 . 'index.php"><img src="./img/logo_principal/logo_color.png" alt=""></a>';
            }
               echo' <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta1 . 'index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'nosotros.php">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'eventos.php">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'noticias.php">Noticias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'mis_reservas.php">Mis reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="' . $ruta2 . 'mis_eventos.php">Mis eventos</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link cuenta" href="' . $ruta2 . 'salir.php">Salir</a>
                    </li>
                    </ul>
                </div>
            </div>
        </nav>';
}

function menu_admin()
{
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand logo_principal" href="./clientes.php"><img src="../img/logo_principal/logo_negativo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link menu_admin" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu_admin" href="coches.php">Coches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu_admin" href="eventos_admin.php">Eventos</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link menu_admin" href="noticias_admin.php">Noticias</a>
                    </li>
                    <li class="nav-item salir">
                        <a class="nav-link menu_admin" href="./salir.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>';
}

function footer()
{
    echo '<footer class="container-fluid text-center foot">

            <div class="copyrights">
                <div id="iconos">
                    <a href="https://www.facebook.com/rentcardeluxegr"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/rentcardeluxe/?hl=es"><i class="fab fa-instagram"></i></a>
                </div>

                <p class="white-txt"> ©2022 Rentluxurycars.com 
                    <br><br>
                </p>

                <hr class="dark-line">
                <a class="link" href="https://www.rentcardeluxe.es/es/inicio/privacidad">Politica de privacidad</a>&nbsp
                <a class="link" href="https://www.rentcardeluxe.es/es/inicio/cookies">Cookies</a>&nbsp
                <a class="link" href="https://www.rentcardeluxe.es/es/inicio/legal">Aviso Legal</a>
                <br><br>
            </div>
        </footer>';
}
