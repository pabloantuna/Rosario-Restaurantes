<?php

session_start();

if(isset($_SESSION['user'])){
    $sesion_iniciada = TRUE;
    //echo "<script>location.href = '..';</script>";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        $ruta_base = "../../../fotos_perfil/";
        $nombre_dir = $_SESSION['restaurante'];
        $archivo = $ruta_base . $nombre_dir . '/' . "perfil." . pathinfo( (basename($_FILES["FotoPerfil"]["name"])), PATHINFO_EXTENSION );
        $tipo_imagen = pathinfo( $archivo, PATHINFO_EXTENSION );
        $archivo2 = './fotos_perfil/' . $nombre_dir . '/' . "perfil." . $tipo_imagen;
        $archivo2 = test_input($archivo2);
        //echo "<script>alert('$archivo2');</script>";
    
        
        $check = getimagesize( $_FILES["FotoPerfil"]["tmp_name"] );
        if ( $check !== false ) {
            //echo "Es una imagen - " . $check["mime"] . ".";
            $ok = 1;
        }
        else {
            echo "<script>alert('Por favor suba una imagen.');</script>";
            echo "<script>location.href = '../..';</script>";
            $ok = 0;
        }
    
        if ( $tipo_imagen != "jpg" && $tipo_imagen != "png" && $tipo_imagen != "jpeg") {
            echo "<script>alert('Solo aceptamos imagenes de tipo jpg, png o jpeg.');</script>";
            echo "<script>location.href = '../..';</script>";
            $ok = 0;
        }
    
        if($ok){
    
            if(!is_dir($ruta_base . $nombre_dir)){
                mkdir($ruta_base . $nombre_dir, 0700);
    
    
                if ( move_uploaded_file( $_FILES["FotoPerfil"]["tmp_name"], $archivo ) ) {
    
                    $HOST = "localhost";
                    $USER = "pablo";
                    $PASS = "probando";
                    $DB= "restaurantes";
            
                    $con = mysqli_connect($HOST,$USER,$PASS,$DB)  or die ("Se ha producido un error. Intente más tarde o notifique al moderador");
            
                    mysqli_set_charset($con, 'utf8');
                    
                    $ver = "SELECT * FROM usuarios WHERE email='$_SESSION[user]'";
    
                    if($fcheck = mysqli_query($con,$ver)){
    
                        $pcheck = mysqli_fetch_assoc($fcheck);
    
                        if($pcheck['foto'] != $archivo2){
                            // echo "<script>alert('$pcheck[foto]');</script>";
                            //echo "<script>alert('$archivo');</script>";
                            $sql = "UPDATE usuarios SET foto = '$archivo2' WHERE email='$_SESSION[user]'";
                
                            //echo "<script>alert('$pcheck[foto]');</script>";
                            //echo "<script>alert('$archivo');</script>";
                            $checkt = mysqli_query($con, $sql);
    
                        }
    
                        mysqli_free_result($fcheck);
    
                    }
    
                    mysqli_close($con);
    
                    echo "<script>alert('La foto ha sido subida correctamente');</script>";
                }
                else{
                    echo "<script>alert('Ha habido un problema al subir la foto, vuelva a intentarlo más tarde o contacte a un moderador');</script>";
                }
                
                echo "<script>location.href = '../..';</script>";
                
            }
            else{
                
                if(file_exists($archivo)){
                    unlink($archivo);
                }
                
                $carpeta = @scandir($ruta_base . $nombre_dir);
        
                if (count($carpeta) > 2){
        
                    deleteDirectory($ruta_base . $nombre_dir);
                    mkdir($ruta_base . $nombre_dir, 0700);
        
                }        
            
                if ( move_uploaded_file( $_FILES["FotoPerfil"]["tmp_name"], $archivo ) ) {
                    
                    $HOST = "localhost";
                    $USER = "pablo";
                    $PASS = "probando";
                    $DB= "restaurantes";
            
                    $con = mysqli_connect($HOST,$USER,$PASS,$DB)  or die ("Se ha producido un error. Intente más tarde o notifique al moderador");
            
                    mysqli_set_charset($con, 'utf8');
                    
                    $ver = "SELECT * FROM usuarios WHERE email='$_SESSION[user]'";
    
                    if($fcheck = mysqli_query($con,$ver)){
    
                        $pcheck = mysqli_fetch_assoc($fcheck);
    
                        if($pcheck['foto'] != $archivo2){
                            //  echo "<script>alert('$pcheck[foto]');</script>";
                            // echo "<script>alert('$archivo');</script>";
                            $sql = "UPDATE usuarios SET foto = '$archivo2' WHERE email='$_SESSION[user]'";
                
                            //echo "<script>alert('$pcheck[foto]');</script>";
                            //echo "<script>alert('$archivo');</script>";
                            $checkt = mysqli_query($con, $sql);
    
                        }
                        
    
                        mysqli_free_result($fcheck);
                    }
                    mysqli_close($con);
    
                    echo "<script>alert('La foto ha sido subida correctamente');</script>";
                }
                else{
                    echo "<script>alert('Ha habido un problema al subir la foto, vuelva a intentarlo más tarde o contacte a un moderador');</script>";
                }
        
                    // echo "<script>location.href = '../..';</script>";
        
            }
            
        }
        else{
            echo "<script>alert('Ha habido un problema al subir la foto, vuelva a intentarlo más tarde o contacte a un moderador. Asegurese de subir un archivo que sea una imagen y sea formato jpg, png o jpeg');</script>";
        }
    
        echo "<script>location.href = '../..';</script>";
    
    }
}
else{
    $sesion_iniciada = FALSE;
    header("Location: ..");
    exit();
    //session_destroy();
}

function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
   return $data;
}

?>