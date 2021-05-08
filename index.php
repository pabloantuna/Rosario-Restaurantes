<?php
    session_start();
    //require("./iniciarsesion/verificar.php");
    //var_dump($_SESSION);
    if(isset($_SESSION['user'])){
        $sesion_iniciada = TRUE;
    }
    else{
        $sesion_iniciada = FALSE;
        //session_destroy();
    }
    mb_internal_encoding("UTF-8");
?>

<!DOCTYPE html>
<html>
<head>
    

    <meta charset="utf-8" />
    <title>Rosario Restaurantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen">
    <script src="./js/miscript.js" type="text/javascript"></script>

    <link href="images/favicon.png" rel="icon" type="image/png" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	
</head>
<body>
    <div id="general" class="container clearfix">
        <div id="header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img id="imghome" src="images/logo.png" class="inicio" id="logo" alt="Logo" width="80" height="80" title="Inicio" onclick="location.href = '.';"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div id="formulario">
                        <form name="formularioBusqueda" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = 'quienessomos';">
                                    ¿Quiénes somos?
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = 'faq';">
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
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = './iniciarsesion';">
                                            Iniciar Sesión
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = './formulario';">
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
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = './miperfil';">
                                            Mi Perfil
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = './iniciarsesion/cerrarsesion.php'">
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
        <div class="color">
            <h2><b>Nuestros Restaurantes</b></h2>
            <br>
            <?php
                $HOST = "localhost";
                $USER = "pablo";
                $PASS = "probando";
                $DB= "restaurantes";

                $con = mysqli_connect($HOST,$USER,$PASS,$DB) or die ("Se ha producido un error. Intente más tarde o notifique al moderador");

                mysqli_set_charset($con, 'utf8');
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    $nombre = test_input($_POST['busqueda']);
                    $filtro_precio = $_POST['precioFiltro'];
                    $filtro_zona = $_POST['zonaFiltro'];

                    if($nombre == "" || $nombre == NULL){

                        if($filtro_zona == 0){
    
                            if($filtro_precio == 0){
    
                                $ver = "SELECT * FROM usuarios WHERE 1";
    
                            }
                            else if($filtro_precio == 1){
                            
                                $ver = "SELECT * FROM usuarios WHERE ((precio1='1') OR (sinprecio='1'))";
                                
                            }
                            else if($filtro_precio == 2){
    
                                $ver = "SELECT * FROM usuarios WHERE ((precio2='1') OR (sinprecio='1'))";
    
                            }
                            else if($filtro_precio == 3){
    
                                $ver = "SELECT * FROM usuarios WHERE ((precio3='1') OR (sinprecio='1'))";
    
                            }
                            else{
    
                                $ver = "SELECT * FROM usuarios WHERE ((precio4='1') OR (sinprecio='1'))";
    
                            }
    
                        }
                        else{
                            
                            if($filtro_precio == 0){
    
                                $ver = "SELECT * FROM usuarios WHERE zona='$filtro_zona'";
    
                            }
                            else if($filtro_precio == 1){
                            
                                $ver = "SELECT * FROM usuarios WHERE ((precio1='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
                                
                            }
                            else if($filtro_precio == 2){
    
                                $ver = "SELECT * FROM usuarios WHERE ((precio2='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
    
                            }
                            else if($filtro_precio == 3){
    
                                $ver = "SELECT * FROM usuarios WHERE ((precio3='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
    
                            }
                            else{
    
                                $ver = "SELECT * FROM usuarios WHERE ((precio4='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
    
                            }
    
                        }

                    }

                    else{

                        //echo "<script>alert('entre');</script>";

                        if($filtro_zona == 0){
    
                            if($filtro_precio == 0){

                               // echo "<script>alert('entre 2');</script>";
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre')";
    
                            }
                            else if($filtro_precio == 1){
                            
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio1='1') OR (sinprecio='1'))";
                                
                            }
                            else if($filtro_precio == 2){
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio2='1') OR (sinprecio='1'))";
    
                            }
                            else if($filtro_precio == 3){
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio3='1') OR (sinprecio='1'))";
    
                            }
                            else{
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio4='1') OR (sinprecio='1'))";
    
                            }
    
                        }
                        else{
                            
                            if($filtro_precio == 0){
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND zona='$filtro_zona'";
    
                            }
                            else if($filtro_precio == 1){
                            
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio1='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
                                
                            }
                            else if($filtro_precio == 2){
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio2='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
    
                            }
                            else if($filtro_precio == 3){
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio3='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
    
                            }
                            else{
    
                                $ver = "SELECT * FROM usuarios WHERE (nombre='$nombre') AND ((precio4='1') OR (sinprecio='1')) AND zona='$filtro_zona'";
    
                            }
    
                        }

                    }

                    if ($fcheck = mysqli_query($con,$ver)){
                        $n = mysqli_num_rows($fcheck);
                        if($n == 0){
                            echo "Lamentamos informar que no hay restaurantes que cumplan con los parametros buscados :(.";
                        }
                        while($pcheck = mysqli_fetch_assoc($fcheck)){
                            ?>
                            <div name="palfondo" class="container-fluid clearfix clasenueva" >
                                <div class="row">
                                    <div class="col-md imgcentrada">
                                        <img src="<?php echo $pcheck['foto']; ?>" alt="Foto Restaurante" height="100%" width="100%" onload="cambiarColor('<?php echo $n; ?>');">
                                    </div>
                            <?php
                            $n--;
                            //echo "$pcheck[foto]";
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Nombre:</u></b><br>";
                            echo $pcheck['nombre'];
                                    ?></div><?php
                           // echo "<br>";
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Teléfono:</u></b><br>";
                            echo $pcheck['teléfono'];
                                    ?></div><?php
                            //echo "<br>";
                            ?>
                                    <div class="col-md"><?php  
                            echo "<b><u>Dirección:</u></b><br>";
                            echo $pcheck['dirección'];
                                    ?></div><?php
                            //echo "<br>";
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Zona:</u></b><br>";
                            if($pcheck['zona'] == 1){
                                echo "Centro";
                            }
                            else if($pcheck['zona'] == 2){
                                echo "Norte";
                            }
                            else if($pcheck['zona'] == 3){
                                echo "Sur";
                            }
                            else{
                                echo "Oeste";
                            }
                                    ?></div><?php
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Precios:</u></b><br>";
                            if($pcheck['sinprecio'] == 1){
                                echo "Este restaurante no ha definido sus precios";
                                    ?></div><?php
                              //  echo "<br>";
                            }
                            else{

                                if($pcheck['precio1'] == 1){
                                    echo "$0-$150 ";
                                    echo "<br>";
                                }
                                if($pcheck['precio2'] == 1){
                                    echo "$150-$300 ";
                                    echo "<br>";
                                }
                                if($pcheck['precio3'] == 1){
                                    echo "$300-$450 ";
                                    echo "<br>";
                                }
                                if($pcheck['precio4'] == 1){
                                    echo "Más de $450";
                                    //echo "<br>";
                                }
                                    ?></div><?php

                            }
                            echo "<br>";  
                            ?>
                            </div>
                        </div>
                            <?php  
                        }

                    }

                }
                else{

                    $ver = "SELECT * FROM usuarios WHERE 1";
    
                    if ($fcheck = mysqli_query($con,$ver)){
                        $n = mysqli_num_rows($fcheck);
                        while($pcheck = mysqli_fetch_assoc($fcheck)){
                            //$a = addslashes($pcheck['foto']);
                        
                            ?>
                            <div name="palfondo" class="container-fluid clearfix clasenueva" >
                                <div class="row">
                                    <div class="col-md imgcentrada">
                                        <img src="<?php echo $pcheck['foto']; ?>" alt="Foto Restaurante" height="100%" width="100%" onload="cambiarColor('<?php echo $n; ?>');">
                                    </div>
                            <?php
                            $n--;
                            //echo "$pcheck[foto]";
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Nombre:</u></b><br>";
                            echo $pcheck['nombre'];
                                    ?></div><?php
                           // echo "<br>";
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Teléfono:</u></b><br>";
                            echo $pcheck['teléfono'];
                                    ?></div><?php
                            //echo "<br>";
                            ?>
                                    <div class="col-md"><?php  
                            echo "<b><u>Dirección:</u></b><br>";
                            echo $pcheck['dirección'];
                                    ?></div><?php
                            //echo "<br>";
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Zona:</u></b><br>";
                            if($pcheck['zona'] == 1){
                                echo "Centro";
                            }
                            else if($pcheck['zona'] == 2){
                                echo "Norte";
                            }
                            else if($pcheck['zona'] == 3){
                                echo "Sur";
                            }
                            else{
                                echo "Oeste";
                            }
                                    ?></div><?php
                            ?>
                                    <div class="col-md"><?php
                            echo "<b><u>Precios:</u></b><br>";
                            if($pcheck['sinprecio'] == 1){
                                echo "Este restaurante no ha definido sus precios";
                                    ?></div><?php
                              //  echo "<br>";
                            }
                            else{

                                if($pcheck['precio1'] == 1){
                                    echo "$0-$150 ";
                                    echo "<br>";
                                }
                                if($pcheck['precio2'] == 1){
                                    echo "$150-$300 ";
                                    echo "<br>";
                                }
                                if($pcheck['precio3'] == 1){
                                    echo "$300-$450 ";
                                    echo "<br>";
                                }
                                if($pcheck['precio4'] == 1){
                                    echo "Más de $450";
                                    //echo "<br>";
                                }
                                    ?></div><?php

                            }
                            echo "<br>";  
                            ?>
                            </div>
                        </div>
                            <?php                      
                        }
                    }

                }

                function test_input($data) {
                    $data = trim($data);
                    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    $data = addslashes($data);
                   return $data;
                }
            ?>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript" src="./js/konamicodev3.js"></script>
</body>
</html>