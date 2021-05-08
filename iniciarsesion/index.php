<?php
    session_start();
    //require("verificar.php");
    if(isset($_SESSION['user'])){
        $sesion_iniciada = TRUE;
        //echo "<script>location.href = '..';</script>";
        header("Location: ..");
        exit();
    }
    else{
        $sesion_iniciada = FALSE;
        //session_destroy();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Iniciar Sesión - Rosario Restaurantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen">
    <link href="../images/favicon.png" rel="icon" type="image/png" />
</head>
<body>

    <div id="general" class="container clearfix">

        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img id="imghome" src="../images/logo.png" class="inicio" id="logo" alt="Logo" width="80" height="80" title="Inicio" onclick="location.href = '..';"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div id="formulario">
                        <form name="formularioBusqueda" method="POST" action="../index.php">
                            <input name="busqueda" class="form-control" type="search" placeholder="Buscar...">
                            <select name="zonaFiltro" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <div class="dropdown-menu">
                                    <option value="0" selected>No filtrar</option>
                                    <option value="1" class="dropdown-item">Centro</option>
                                    <option value="2" class="dropdown-item">Norte</option>
                                    <option value="3" class="dropdown-item">Sur</option>
                                    <option value="4" class="dropdown-item">Oeste</option>
                                </div>
                            </select>

                            <select name="precioFiltro" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <div class="dropdown-menu">
                                    <option value="0" selected>No filtrar</option>
                                    <option value="1" class="dropdown-item">$0-$150</option>
                                    <option value="2" class="dropdown-item">$150-$300</option>
                                    <option value="3" class="dropdown-item">$300-$450</option>
                                    <option value="4" class="dropdown-item">Más de $450</option>
                                </div>
                            </select>
                            <input class="btn btn-default" type="submit" value="Buscar">
                        </form>
                    </div>
                    <div class="centra2">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../quienessomos';">
                                    ¿Quiénes somos?
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../faq';">
                                    Ayuda
                                </button> <span class="sr-only">(current)</span>
                            </li>
                        </ul>
                    </div>
                    <?php
                        if(!$sesion_iniciada){
                            ?>
                            <div class="centra22">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '.';">
                                            Iniciar Sesión
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../formulario';">
                                            Registrar Restaurante
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="centra22">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '#';">
                                            Mi Perfil
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '#';">
                                            Cerrar Sesión
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <?php
                        }
                    ?>
                    
                </div>
            </nav>
        </div>

        <div id="cuerpo" class="color">
            <div id="titulo" class="text-center titulocss">
                <h3>Iniciar Sesión</h3>
            </div>
            <div id="formInic">
                <form name="formInicio" class="form-horizontal" action="verificar.php" method="POST">
                    <div class="form-group row padeo">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="EmailInic" type="email" class="form-control" id="inputEmail" placeholder="Correo Electrónico" onkeyup="botonActivo();" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group row padeo">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input name="PassInic" type="password" class="form-control" id="inputPassword" placeholder="Contraseña" onkeyup="botonActivo();" minlength="8" maxlength="25" required>
                        </div>
                    </div>
                    
                    
                    <div class="bottomcss">
                        <div class="form-group row">
                            <div class="col-sm-12 text-center ">
                                <button id="botonenvio" type="submit" class="btn btn-primary btn-lg" disabled>Iniciar Sesión</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="js/miscript.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    
</body>
</html>