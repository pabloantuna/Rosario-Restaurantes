<?php

$HOST = "localhost";
$USER = "pablo";
$PASS = "probando";
$DB= "restaurantes";

$con = mysqli_connect($HOST,$USER,$PASS,$DB);
mysqli_set_charset($con, 'utf8');
$sql = "CREATE TABLE usuarios (id INT(2) AUTO_INCREMENT PRIMARY KEY, nombre VARCHAR(255) NOT NULL, teléfono VARCHAR(25) NOT NULL UNIQUE, dirección VARCHAR(255) NOT NULL UNIQUE, zona INT(1) NOT NULL, contraseña VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, precio1 INT(1) NOT NULL, precio2 INT(1) NOT NULL, precio3 INT(1) NOT NULL, precio4 INT(1) NOT NULL, sinprecio INT(1) NOT NULL, foto VARCHAR(255))";

$result = mysqli_query($con, $sql);

mysqli_close($con);

?>