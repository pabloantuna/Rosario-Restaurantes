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
    
            $ver = "SELECT * FROM usuarios WHERE email='$_SESSION[user]'";
    
            if($fcheck = mysqli_query($con,$ver)){
    
                $pcheck = mysqli_fetch_assoc($fcheck);
    
                if(password_verify($_POST['PassPerfil1'], $pcheck['contraseña'])){
    
                    if($_POST['PassPerfil2'] == $_POST['PassPerfil3']){
                        
                        $passHash = password_hash($_POST['PassPerfil2'], PASSWORD_BCRYPT);
    
                        $sql = "UPDATE usuarios SET contraseña = '$passHash' WHERE email='$_SESSION[user]'";
    
                        $check = mysqli_query($con, $sql);
    
                        echo "<script>alert('La contraseña ha sido cambiada con exito.');</script>";
    
                       // $cambiada = TRUE;
    
                    }
                    else{
    
                        echo "<script>alert('Las contraseñas no coinciden');</script>";
                        echo "<script>location.href = '../..';</script>";
    
                    }
                }
                else{
    
                    echo "<script>alert('La contraseña ingresada no es correcta');</script>";
                    echo "<script>location.href = '../..';</script>";
    
                }
    
                mysqli_free_result($fcheck);
    
            }
            mysqli_close($con);
        }
    
        echo "<script>location.href = '../..';</script>";

    }
    else{
        header("Location: ../..");
    }

    
?>