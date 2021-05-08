<?php
        session_start();
        if(isset($_SESSION['user'])){
            echo "<script>location.href = '..';</script>";
        }
       // if(!(isset($_SESSION['user']))){
            //$sesion_iniciada = FALSE;
            mb_internal_encoding("UTF-8");

            //$nombre = $mail = $tel = $dir = $pass = $confirmPass = $zona = $captcha = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                
                $mail = test_input($_POST["EmailInic"]);
                $pass = test_input($_POST["PassInic"]);
                //$passHash = password_hash($pass, PASSWORD_DEFAULT);

                $HOST = "localhost";
                $USER = "pablo";
                $PASS = "probando";
                $DB= "restaurantes";

                $con = mysqli_connect($HOST,$USER,$PASS,$DB)  or die ("Se ha producido un error. Intente más tarde o notifique al moderador");

                mysqli_set_charset($con, 'utf8');

                $ver = "SELECT * FROM usuarios";

                $mail_coincide = FALSE;
                
                if ($fcheck = mysqli_query($con,$ver)){
                
                    while($pcheck = mysqli_fetch_assoc($fcheck)){
                    // echo "<script>alert('$pcheck[email]')</script>";
                        if($pcheck['email'] == $mail){
                            $mail_coincide = TRUE;
                            break;
                        }
                    }

                    if($mail_coincide){
                        $ver2 = "SELECT * FROM usuarios WHERE email='$mail'";
                        if($fcheck2 = mysqli_query($con,$ver2)){
                            //$x = mysqli_num_rows($fcheck2);
                            //echo "<script>alert('$x')</script>";

                            $pcheck2 = mysqli_fetch_assoc($fcheck2);
                            
                            if(password_verify($pass, $pcheck2['contraseña'])){
                            //if($pass == $pcheck2['contraseña']){
                                //session_start();
                                //echo "<script>alert('CORRECTO')</script>";
                                $_SESSION['user'] = $pcheck2['email'];
                                $_SESSION['telefono'] = $pcheck2['teléfono'];
                                $_SESSION['restaurante'] = $pcheck2['nombre'];
                                $_SESSION['contraseña'] = $pcheck2['contraseña'];
                                $_SESSION['zona'] = $pcheck2['zona'];
                                $_SESSION["preciobajo"] = $pcheck2["precio1"];
                                $_SESSION["preciomedio"] = $pcheck2["precio2"];
                                $_SESSION["precioalto"] = $pcheck2["precio3"];
                                $_SESSION["preciomayor"] = $pcheck2["precio4"];
                                $_SESSION["direccion"] = $pcheck2["dirección"];
                                $sesion_iniciada = TRUE;
                                header ("Location: ../miperfil");
                                exit();
                                //echo "<script>location.href = '..';</script>";
                            }
                            else{
                                echo "<script>alert('La contraseña ingresada no es correcta')</script>";
                                $sesion_iniciada = FALSE;
                                //echo "<script>location.href = '.';</script>";
                            }
                        }
                        
                    }

                    else{
                        echo "<script>alert('El correo electrónico utilizado no se encuentra registrado')</script>";
                        //echo "<script>location.href = '.';</script>";
                        $sesion_iniciada = FALSE;
                    }

                    mysqli_free_result($fcheck);
                }
                mysqli_close($con);
            }
        //}
        //else{
          //  echo "<script>alert('Ya ha ingresado sesión')</script>";
            //session_destroy();
           // $sesion_iniciada = FALSE;
            //echo "<script>location.href = '..';</script>";
        //}
            //if($sesion_iniciada){
               // echo "<script>location.href = '..';</script>";
            //}
            //else{
                echo "<script>location.href = '.';</script>";
            //}
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
           return $data;
        }
    ?>