<?php
    session_start();

    mb_internal_encoding("UTF-8");
    if(isset($_SESSION['user'])){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
           // $cambiada = FALSE;
    
            $HOST = "localhost";
            $USER = "pablo";
            $PASS = "probando";
            $DB= "restaurantes";
    
            $con = mysqli_connect($HOST,$USER,$PASS,$DB)  or die ("Se ha producido un error. Intente más tarde o notifique al moderador");
    
            mysqli_set_charset($con, 'utf8');

            if(!(isset($_POST["checkbox1"])) && !(isset($_POST["checkbox2"])) && !(isset($_POST["checkbox3"])) && !(isset($_POST["checkbox4"]))){
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

            $nombre = test_input($_POST['NombrePerfil']);
            $telefono = test_input($_POST['TelPerfil']);
            $direccion = test_input($_POST['DireccionPerfil']);
            $zona = test_input($_POST['ZonaPerfil']);
            $mail = test_input($_POST['EmailPerfil']);

            $sql = "UPDATE usuarios SET nombre = '$nombre', teléfono = '$telefono', dirección = '$direccion', zona = '$zona', email = '$mail', precio1 = '$checkbox1', precio2 = '$checkbox2', precio3 = '$checkbox3', precio4 = '$checkbox4', sinprecio = '$sincheckbox' WHERE email='$_SESSION[user]'";

            $check = mysqli_query($con, $sql);

            // $ver = "SELECT * FROM usuarios WHERE email='$_POST[EmailPerfil]'";
            // if($fcheck = mysqli_query($con,$ver)){
               
            //     $pcheck = mysqli_fetch_assoc($fcheck);

            //     $_SESSION['user'] = $pcheck['email'];
            //     $_SESSION['telefono'] = $pcheck['teléfono'];
            //     $_SESSION['restaurante'] = $pcheck['nombre'];
            //     $_SESSION['contraseña'] = $pcheck['contraseña'];
            //     $_SESSION['zona'] = $pcheck['zona'];
            //     $_SESSION["preciobajo"] = $pcheck["precio1"];
            //     $_SESSION["preciomedio"] = $pcheck["precio2"];
            //     $_SESSION["precioalto"] = $pcheck["precio3"];
            //     $_SESSION["preciomayor"] = $pcheck["precio4"];
            //     $_SESSION["direccion"] = $pcheck["dirección"];

            // }

            $_SESSION['user'] = stripslashes($mail);
            $_SESSION['telefono'] = $telefono;
            $_SESSION['restaurante'] = stripslashes($nombre);
            $_SESSION['zona'] = $zona;
            $_SESSION["preciobajo"] = $checkbox1;
            $_SESSION["preciomedio"] = $checkbox2;
            $_SESSION["precioalto"] = $checkbox3;
            $_SESSION["preciomayor"] = $checkbox4;
            $_SESSION["direccion"] = stripslashes($direccion);

            echo "<script>alert('Los cambios se han efectuado con exito.');</script>";

            mysqli_close($con);
        }
    
        echo "<script>location.href = '../..';</script>";

    }
    else{
        header("Location: ../..");
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = addslashes($data);
       return $data;
    }
?>