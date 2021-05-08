<?php
    session_start();
    //require("verificar.php");
    if(isset($_SESSION['user'])){
        $sesion_iniciada = TRUE;
        //echo "<script>location.href = '..';</script>";
    }
    else{
        $sesion_iniciada = FALSE;
        header("Location: ..");
        exit();
        //session_destroy();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mi Perfil - Rosario Restaurantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen">
    <link href="../images/favicon.png" rel="icon" type="image/png" />
</head>
<body onload="estaActivado('checkboxperfil1', 'checkboxperfil2', 'checkboxperfil3', 'checkboxperfil4');">

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
                    <div class="centra22">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '.';">
                                    Mi Perfil
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../iniciarsesion/cerrarsesion.php';">
                                    Cerrar Sesión
                                </button>
                            </li>
                        </ul>
                    </div>                    
                </div>
            </nav>
        </div>

        <div id="cuerpo" class="color">
            <h2><b>Mi Perfil - <?php echo "$_SESSION[restaurante]"; ?></b></h2>
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-personales-tab" data-toggle="pill" href="#v-pills-personales" role="tab" aria-controls="v-pills-personales" aria-selected="true">Configuración General</a>
                <a class="nav-link" id="v-pills-pass-tab" data-toggle="pill" href="#v-pills-pass" role="tab" aria-controls="v-pills-pass" aria-selected="false">Cambiar Contraseña</a>
                <a class="nav-link" id="v-pills-foto-tab" data-toggle="pill" href="#v-pills-foto" role="tab" aria-controls="v-pills-foto" aria-selected="false">Cambiar Foto Restaurante</a>
            </div>
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-personales" role="tabpanel" aria-labelledby="v-pills-personales-tab"> 
                    <br>
                    <form name="formPerfil" class="form-horizontal" action="./efectuarcambios/cambiopersonal/index.php" method="POST" onsubmit="return rusure();">
                        <div class="form-group row padeo">
                            <label for="perfilEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input name="EmailPerfil" type="email" class="form-control" id="perfilEmail" placeholder="Correo Electrónico" maxlength="50" value="<?php echo "$_SESSION[user]"; ?>" onkeyup="activarBotonPersonal();" required>
                            </div>
                        </div>
                        <div class="form-group row padeo">
                            <label for="perfilNombre" class="col-sm-2 col-form-label">Nombre Restaurante</label>
                            <div class="col-sm-10">
                                <input name="NombrePerfil" type="text" class="form-control" id="perfilNombre" placeholder="Nombre" maxlength="50" value="<?php echo "$_SESSION[restaurante]"; ?>" onkeyup="activarBotonPersonal();" required>
                            </div>
                        </div>
                        <div class="form-group row padeo">
                            <label for="perfilTel" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input name="TelPerfil" type="number" class="form-control" id="perfilTel" placeholder="Número de Telefono" value="<?php echo "$_SESSION[telefono]"; ?>" onkeyup="activarBotonPersonal();" required>
                            </div>
                        </div>
                        <div class="form-group row padeo">
                            <label for="perfilDireccion" class="col-sm-2 col-form-label">Dirección</label>
                            <div class="col-sm-10">
                                <input name="DireccionPerfil" type="text" class="form-control" id="perfilDireccion" placeholder="Dirección" maxlength="50" onkeyup="activarBotonPersonal();" required value = "<?php echo "$_SESSION[direccion]" ?>">
                            </div>
                        </div>
                        <fieldset class="form-group padeo">
                            <div class="form-group row">
                                <div class="col-sm-2">
                                    Precios
                                </div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <?php
                                            if($_SESSION["preciobajo"] == 0){
                                                ?>
                                                <input id="checkboxperfil1" name="checkbox1" class="form-check-input" type="checkbox" value="1" onclick="resaltarPrecio('checkboxperfil1'); activarBotonPersonal();">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <input id="checkboxperfil1" name="checkbox1" class="form-check-input" type="checkbox" value="1" onclick="resaltarPrecio('checkboxperfil1'); activarBotonPersonal();" checked >
                                                
                                                <?php
                                            }
                                            ?>
                                        <label id="checkboxperfil11" class="form-check-label" for="gridCheck1">
                                            $0-$150
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <?php
                                            if($_SESSION["preciomedio"] == 0){
                                                ?>
                                                <input id="checkboxperfil2" name="checkbox2" class="form-check-input" type="checkbox" value="2" onclick="resaltarPrecio('checkboxperfil2'); activarBotonPersonal();">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <input id="checkboxperfil2" name="checkbox2" class="form-check-input" type="checkbox" value="2" onclick="resaltarPrecio('checkboxperfil2'); activarBotonPersonal();" checked>
                                                <?php
                                            }
                                            ?>
                                        <label id="checkboxperfil22" class="form-check-label" for="gridCheck2">
                                            $150-$300
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <?php
                                            if($_SESSION["precioalto"] == 0){
                                                ?>
                                                <input id="checkboxperfil3" name="checkbox3" class="form-check-input" type="checkbox" value="3" onclick="resaltarPrecio('checkboxperfil3'); activarBotonPersonal();">
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <input id="checkboxperfil3" name="checkbox3" class="form-check-input" type="checkbox" value="3" onclick="resaltarPrecio('checkboxperfil3'); activarBotonPersonal();" checked>
                                                <?php
                                            }
                                            ?>
                                        <label id="checkboxperfil33" class="form-check-label" for="gridCheck2">
                                            $300-$450
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <?php
                                            if($_SESSION["preciomayor"] == 0){
                                                ?>
                                                <input id="checkboxperfil4" name="checkbox4" class="form-check-input" type="checkbox" value="4" onclick="resaltarPrecio('checkboxperfil4'); activarBotonPersonal();" >
                                                <?php
                                            }
                                            else{
                                                ?>
                                                <input id="checkboxperfil4" name="checkbox4" class="form-check-input" type="checkbox" value="4" onclick="resaltarPrecio('checkboxperfil4'); activarBotonPersonal();" checked>
                                                <?php
                                            }
                                            ?>
                                        <label id="checkboxperfil44" class="form-check-label" for="gridCheck2">
                                            Más de $450
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group row padeo">
                            <label for="perfilZona" class="col-sm-2 col-form-label">Zona de la Ciudad</label>
                            <div class="col-sm-10">
                                <select name="ZonaPerfil" class="custom-select mr-sm-2" id="perfilZona" onchange="activarBotonPersonal();" required>
                                    <?php
                                        if($_SESSION["zona"] == 1){
                                            ?>
                                                <option value="1" slected>Centro</option>
                                                <option value="2">Norte</option>
                                                <option value="3">Sur</option>
                                                <option value="4">Oeste</option>
                                                <?php
                                        }
                                        else{
                                            if($_SESSION["zona"] == 2){
                                                ?>
                                                    <option value="1">Centro</option>
                                                    <option value="2" selected>Norte</option>
                                                    <option value="3">Sur</option>
                                                    <option value="4">Oeste</option>
                                                    <?php
                                            }
                                            else{
                                                if($_SESSION["zona"] == 3){
                                                    ?>
                                                        <option value="1">Centro</option>
                                                        <option value="2">Norte</option>
                                                        <option value="3" selected>Sur</option>
                                                        <option value="4">Oeste</option>
                                                        <?php
                                                }
                                                else{
                                                    ?>
                                                        <option value="1">Centro</option>
                                                        <option value="2">Norte</option>
                                                        <option value="3">Sur</option>
                                                        <option value="4" selected>Oeste</option>
                                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    
                                </select>
                            </div>
                        </div>

                    

                        <div class="bottomcss">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center ">
                                    <button id="botonCambioPersonal" type="submit" class="btn btn-primary btn-lg" disabled>Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-pass" role="tabpanel" aria-labelledby="v-pills-pass-tab">
                    <br>
                    <form name="formCambiarPass" class="form-horizontal" action="./efectuarcambios/cambiopass/index.php" method="POST" onsubmit="return rusure();">
            
                        <div class="form-group row padeo">
                            <label for="perfilPassword1" class="col-sm-2 col-form-label">Contraseña actual</label>
                            <div class="col-sm-10">
                                <input name="PassPerfil1" type="password" class="form-control" id="prefilPassword1" placeholder="Contraseña actual" minlength="8" maxlength="25" required>
                            </div>
                        </div>
            
                        <div class="form-group row padeo">
                            <label for="perfilPassword2" class="col-sm-2 col-form-label">Contraseña nueva</label>
                            <div class="col-sm-10">
                                <input name="PassPerfil2" type="password" class="form-control" id="perfilPassword2" placeholder="Contraseña nueva" onkeyup="confirmPass();" minlength="8" maxlength="25">
                            </div>
                        </div>
                        
                        <div class="form-group row padeo">
                            <label for="perfilPassword3" class="col-sm-2 col-form-label">Confirmar contraseña nueva</label>
                            <div class="col-sm-10">
                                <input name="PassPerfil3" type="password" class="form-control" id="perfilPassword3" placeholder="Confirmar contraseña nueva" onkeyup="confirmPass();" minlength="8" maxlength="25">
                            </div>
                        </div>
                        <div id="passmatch" class="form-group row padeo2">

                        </div>
                        <div class="bottomcss">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center ">
                                    <button id="botonCambioPass" type="submit" class="btn btn-primary btn-lg" disabled>Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="v-pills-foto" role="tabpanel" aria-labelledby="v-pills-foto-tab">
                <br>
                    <form name="formFotoPerfil" class="form-horizontal" action="./efectuarcambios/subirfoto/index.php" method="POST" onsubmit="return rusure();" enctype="multipart/form-data" >
                        <div class="form-group row padeo">
                            <label for="perfilFoto" class="col-sm-2 col-form-label">Foto de Perfil</label>
                            <div class="col-sm-10">
                                <input name="FotoPerfil" type="file" accept=".png, .jpg, .jpeg" class="form-control" id="perfilFoto" required>
                            </div>
                        </div>
                        <div class="bottomcss">
                            <div class="form-group row">
                                <div class="col-sm-12 text-center ">
                                    <button id="botonFoto" type="submit" class="btn btn-primary btn-lg" >Subir Foto</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>            

    <script type="text/javascript" src="js/miscript.js"></script>
    <script type="text/javascript">
        function activarBotonPersonal(){
            var valor_original1 = "<?php echo $_SESSION['user'] ?>";
            var valor_original2 = "<?php echo $_SESSION['restaurante'] ?>";
            var valor_original3 = "<?php echo $_SESSION['telefono'] ?>";
            var valor_original4 = "<?php echo $_SESSION['direccion'] ?>";
            var valor_original5 = "<?php echo $_SESSION['preciobajo'] ?>";
            var valor_original6 = "<?php echo $_SESSION['preciomedio'] ?>";
            var valor_original7 = "<?php echo $_SESSION['precioalto'] ?>";
            var valor_original8 = "<?php echo $_SESSION['preciomayor'] ?>";
            var valor_original9 = "<?php echo $_SESSION['zona'] ?>";
            
            if(document.getElementById("perfilEmail").value == valor_original1 && document.getElementById("perfilNombre").value == valor_original2 && document.getElementById("perfilTel").value == valor_original3 && document.getElementById("perfilDireccion").value == valor_original4 && document.getElementById("checkboxperfil1").checked == valor_original5 && document.getElementById("checkboxperfil2").checked == valor_original6 && document.getElementById("checkboxperfil3").checked == valor_original7 && document.getElementById("checkboxperfil4").checked == valor_original8 && document.getElementById("perfilZona").value == valor_original9){
                document.getElementById("botonCambioPersonal").setAttribute("disabled", true);
            }
            else{
                document.getElementById("botonCambioPersonal").removeAttribute("disabled");
            }   
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>
</html>