<?php
    session_start();
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
    <title>Registrar Restaurante - Rosario Restaurantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen">
    <link href="../images/favicon.png" rel="icon" type="image/png" />
</head>
<body>
    <?php
        mb_internal_encoding("UTF-8");

        //$nombre = $mail = $tel = $dir = $pass = $confirmPass = $zona = $captcha = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $registrado = FALSE;

            $captcha = test_input($_POST["captchaform"]);
            //session_start();
            if($_SESSION['img_number'] != $captcha){
                ?>
                <script>alert("El captcha ingresado no es correcto");</script>
                <?php
            }
            else{
                $nombre = test_input($_POST["NombreReg"]);
                $tel = test_input($_POST["TelReg"]);
                $dir = test_input($_POST["DireccionReg"]);
                $pass = test_input($_POST["PassReg"]);
                $passHash = password_hash($pass, PASSWORD_BCRYPT);
                //$confirmPass = test_input($_POST["ConfirmPassReg"]);
                $mail = test_input($_POST["EmailReg"]);
                $fotodefault = "./images/favicon.png";
                $datos_en_uso = FALSE;

                if(!(isset($_POST["checkbox1"]))&&!(isset($_POST["checkbox2"]))&&!(isset($_POST["checkbox3"]))&&!(isset($_POST["checkbox4"]))){
                    $checkbox1 = 0;
                    $checkbox2 = 0;
                    $checkbox3 = 0;
                    $checkbox4 = 0;
                    $sincheckbox = 1;
                }
                else{
                    $sincheckbox = 0;
                    if(isset($_POST["checkbox1"])){
                        $checkbox1 = 1;
                    }
                    else{
                        $checkbox1 = 0;
                    }
                    if(isset($_POST["checkbox2"])){
                        $checkbox2 = 1;
                    }
                    else{
                        $checkbox2 = 0;
                    }
                    if(isset($_POST["checkbox3"])){
                        $checkbox3 = 1;
                    }
                    else{
                        $checkbox3 = 0;
                    }
                    if(isset($_POST["checkbox4"])){
                        $checkbox4 = 1;
                    }
                    else{
                        $checkbox4 = 0;
                    }
                }

                $zona = test_input($_POST["ZonaReg"]);

                $HOST = "localhost";
                $USER = "pablo";
                $PASS = "probando";
                $DB= "restaurantes";

                $con = mysqli_connect($HOST,$USER,$PASS,$DB) or die ("Se ha producido un error. Intente más tarde o notifique al moderador");

                mysqli_set_charset($con, 'utf8');

                $ver = "SELECT * FROM usuarios WHERE 1";
                if ($fcheck = mysqli_query($con,$ver)){
                
                    while($pcheck = mysqli_fetch_assoc($fcheck)){
                        if(($pcheck['email'] == $mail) || ($pcheck['teléfono'] == $tel) || ($pcheck['dirección'] == $dir)){
                            $datos_en_uso = TRUE;
                            break;
                        }    
                    }

                    if(!$datos_en_uso){
                    
                        $sql = "INSERT INTO usuarios (nombre, teléfono, dirección, zona, contraseña, email, precio1, precio2, precio3, precio4, sinprecio, foto) VALUES ('$nombre','$tel','$dir', '$zona', '$passHash','$mail','$checkbox1','$checkbox2','$checkbox3','$checkbox4','$sincheckbox', '$fotodefault')";

                        $check = mysqli_query($con, $sql);

                        echo "<script>alert('Se ha registrado con exito.');</script>";

                        $registrado = TRUE;

                    }

                    else{
                        echo "<script>alert('Error. El mail, teléfono o dirección ya han sido utilizadas anteriormente');</script>";

                    }

                    mysqli_free_result($fcheck);

                }
                mysqli_close($con);

            }
            $_SESSION = array();
            session_destroy();
            if ($registrado){
                header("Location: ..");
                exit();
            }
            else{
                header("Location: .");
                exit();
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
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../iniciarsesion';">
                                    Iniciar Sesión
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '.';">
                                    Registrar Restaurante
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div id="cuerpo" class="color">
            <div id="titulo" class="text-center titulocss">
                <h3>Registrar Restaurante</h3>
            </div>
            <div id="formReg">
                <form name="formRegistro" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" onsubmit="return rusure();">
                    <div class="form-group row padeo">
                    <label for="inputName3" class="col-sm-2 col-form-label">Nombre Restaurante</label>
                    <div class="col-sm-10">
                        <input name="NombreReg" type="text" class="form-control" id="inputName3" placeholder="Nombre Restaurante" maxlength="50" required>
                    </div>
                    </div>
                    <div class="form-group row padeo">
                    <label for="inputTel3" class="col-sm-2 col-form-label">Teléfono</label>
                    <div class="col-sm-10">
                        <input name="TelReg" type="number" class="form-control" id="inputTel3" placeholder="Número de Telefono" required>
                    </div>
                    </div>
                    <div class="form-group row padeo">
                        <label for="inputAddress3" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                            <input name="DireccionReg" type="text" class="form-control" id="inputAddress3" placeholder="Dirección" maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group row padeo">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input name="PassReg" type="password" class="form-control" id="inputPassword3" placeholder="Contraseña" onkeyup="confirmPass();" minlength="8" maxlength="25" required>
                        </div>
                    </div>
                    <div class="form-group row padeo">
                        <label for="inputPasswordConfirm3" class="col-sm-2 col-form-label">Confirmar Contraseña</label>
                        <div class="col-sm-10">
                            <input name="ConfirmPassReg" type="password" class="form-control" id="inputPasswordConfirm3" placeholder="Repetir Contraseña" onkeyup="confirmPass()" minlength="8" maxlength="25" required>
                        </div>
                    </div>
                    <div id="passmatch" class="form-group row padeo2">

                    </div>
                    <div class="form-group row padeo">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="EmailReg" type="email" class="form-control" id="inputEmail3" placeholder="Correo Electrónico" maxlength="50" required>
                        </div>
                    </div>
                    <fieldset class="form-group padeo">
                        <div class="form-group row">
                            <div class="col-sm-2">
                                Precios
                            </div>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input id="checkboxform1" name="checkbox1" class="form-check-input" type="checkbox" value="1" onclick="resaltarPrecio('checkboxform1');">
                                    <label id="checkboxform11" class="form-check-label" for="gridCheck1">
                                        $0-$150
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="checkboxform2" name="checkbox2" class="form-check-input" type="checkbox" value="2" onclick="resaltarPrecio('checkboxform2');">
                                    <label id="checkboxform22" class="form-check-label" for="gridCheck2">
                                        $150-$300
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="checkboxform3" name="checkbox3" class="form-check-input" type="checkbox" value="3" onclick="resaltarPrecio('checkboxform3');">
                                    <label id="checkboxform33" class="form-check-label" for="gridCheck2">
                                        $300-$450
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input id="checkboxform4" name="checkbox4" class="form-check-input" type="checkbox" value="4" onclick="resaltarPrecio('checkboxform4');" >
                                    <label id="checkboxform44" class="form-check-label" for="gridCheck2">
                                        Más de $450
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group row padeo">
                        <label for="selectZona3" class="col-sm-2 col-form-label">Zona de la Ciudad</label>
                        <div class="col-sm-10">
                            <select name="ZonaReg" class="custom-select mr-sm-2" id="selectZona3" required>
                                <option value="" disabled selected hidden>Elija su zona</option>
                                <option value="1">Centro</option>
                                <option value="2">Norte</option>
                                <option value="3">Sur</option>
                                <option value="4">Oeste</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row desplazamientom">
                        <label for="inputCaptcha3" class="col-sm-2 col-form-label">
                            <img alt="Numeros aleatorios" src="image.php">
                        </label>
                        
                    </div>
                    <div class="form-group row desplazamiento">
                        <div class="col-sm-4">
                            <input name="captchaform" type="text" class="form-control" id="inputCaptcha3" placeholder="Ingrese el texto de la imagen" maxlength="5" required>
                        </div>
                    </div>
                    <div class="bottomcss">
                        <div class="form-group row">
                            <div class="col-sm-12 text-center ">
                                <button id="botonenvio" type="submit" class="btn btn-primary btn-lg" disabled>Crear Cuenta</button>
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