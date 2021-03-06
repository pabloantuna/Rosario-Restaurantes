<?php
    session_start();
    //require("../iniciarsesion/verificar.php");
    //var_dump($_SESSION);
    if(isset($_SESSION['user'])){
        $sesion_iniciada = TRUE;
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
    <title>Preguntas Frecuentes - Rosario Restaurantes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css" media="screen">
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
                                    <option value="4" class="dropdown-item">M??s de $450</option>
                                </div>
                            </select>
                            <input class="btn btn-default" type="submit" value="Buscar">
                        </form>
                    </div>
                    <div class="centra2">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../quienessomos';">
                                    ??Qui??nes somos?
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="espdemargen btn btn-default" type="button" onclick="location.href = '.';">
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
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../iniciarsesion';">
                                            Iniciar Sesi??n
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
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../miperfil';">
                                            Mi Perfil
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../iniciarsesion/cerrarsesion.php'">
                                            Cerrar Sesi??n
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
            <h2><b>Preguntas Frecuentes</b></h2>
            <div>
                <p>
                    En esta secci??n de la p??gina se encuentran algunas preguntas, que podr??an surgir a la hora de utilizar nuestro servicio, con sus respectivas respuestas.
                </p>
            </div>
            <div>
                <h5>??C??mo se busca un restaurante seg??n nombre/precio/zona?</h5>

                <p>
                    En la parte superior de nuestra p??gina se pueden observar varios botones y un campo de texto. Utilizando este campo puede buscar un restaurante especifico a trav??s de su nombre.
                    Debajo de dicho campo se encuentran 2(dos) opciones de filtrado y un bot??n de busqueda. Dichas opciones de filtrado son de izquierda a derecha "Zona" y "Precio". 
                    Puede elegir utilizar o no dichos filtros.
                </p>

                <h5>??El restaurante que buscas no fue encontrado utilizando el buscador?</h5>

                <p>
                    Estos pueden ser algunos de los motivos por los cuales sucede:
                    <ul>
                        <li>
                            Los datos colocados en el buscador no son correctos.
                        </li>
                        <li>
                            El restaurante a buscar no cumple con las caracter??sticas por las cuales se est??n buscando, es decir que o no se encuentra en la zona buscada o no tiene men??es con el rango de precios buscado.
                        </li>
                        <li>
                            El restaurante no utiliza nuestro servicio y por lo tanto no se encuentra registrado en nuestro sitio.
                        </li>
                    </ul>
                    Si puede confirmar que el restaurante utiliza nuestro servicio y a??n as?? no logra encontrarlo de ninguna forma en nuestro sitio, puede contactarse con nosotros enviando un correo electr??nico a la direcci??n indicada en la ??ltima pregunta de esta p??gina.
                </p>

                <h5>??Qui??n puede registrarse?</h5>

                <p>
                    Cualquier persona o grupo de personas que posean un restaurante puede registrarse para utilizar el servicio que brindamos.
                </p>

                <h5>??Hay alg??n costo por el servicio?</h5>
                    Actualmente este servicio es gratuito, no obstante en el futuro se cobrar?? una leve suma de dinero por utilizar nuestro servicio, ya que, sin la colaboraci??n de los participantes, el servicio no ser?? sustentable.
                <p>

                </p>
                
                <h5>??C??mo me registro?</h5>

                <p>
                    Los pasos a seguir para disponer de nuestro servicio son muy sencillos.<br>
                    En la parte superior de la p??gina se ven varios botones, entre ellos se encuentra uno que dice "Registrar Restaurante", deberemos clickear en ??l.<br>
                    Una vez clickeado el bot??n, veremos que aparece un formulario con distintos datos a completar. Estos datos son:
                    <ul>

                        <li>
                            Nombre Restaurante. En este campo, tal como se indica en su nombre, debe colocar el nombre de su restaurante.
                        </li>

                        <li>
                            Tel??fono. En este campo debe poner el tel??fono del restaurante para consultas y reservas.
                        </li>

                        <li>
                            Direcci??n. En este campo debe poner la direcci??n exacta de su restaurante, nombre y n??mero de la misma, como si quisiera buscar ese lugar en Google Maps.
                        </li>

                        <li>
                            Contrase??a. En este campo debe escribir una contrase??a que utilizar?? para iniciar sesi??n en el sitio por si desea retirar su restaurante de nuestro sitio o cambiar alg??n dato del mismo. Se recomienda utilizar combinaciones de may??sculas y min??sculas, simbolos (tales com @#$% etc), n??meros y en lo posible que no sea referencia a algo personal que sea f??cil de conocer (como direcciones o fechas importantes). El largo m??ximo de la contrase??a es de 25 caracteres y el m??nimo es de 8.
                        </li>

                        <li>
                            Confirmar Contrase??a. En este campo deber?? volver a escribir la contrase??a tal cual como fue escrita en el campo de arriba. Esto es para disminuir las posibilidades de error al escribir la contrase??a y tener realmente la contrase??a deseada.
                        </li>

                        <li>
                            Email. En este campo deber?? colocar el correo electr??nico del restaurante para que tanto clientes como nosotros podamos comunicarnos por esta v??a. Si su restaurante no posee un correo electr??nico, se recomienda que se le cree uno, pero en caso de no querer hacerlo puede utilizar un correo personal.
                        </li>

                        <li>
                            Precios. En este caso se ver??n 4(cuatro) casillas con posibilidad de ser seleccionadas. Puede no seleccionar ninguna si no existe la opci??n buscada o bien no quiere poner precios en la p??gina. Tambi??n puede seleccionar todas si coinciden con sus precios. Considerar precios por plato.
                        </li>

                        <li>
                            Zona de la Ciudad. En este campo se encuentran varias opciones, las cuales corresponden a las distintas zonas de la ciudad, deber?? seleccionar la zona en la que se encuentra su restaurante.
                        </li>

                        <li>
                            Captcha. En este caso ver?? una imagen con algunas letras y numeros en ella. Deber?? completar el campo debajo de la imagen con las letras/n??meros que aparecen en la imagen sin espacios.
                        </li>

                    </ul>
                </p>

                <h5>Ya me registr??. ??Ahora que hago?</h5>

                <p>
                    Una vez que crees tu cuenta, quien acceda a la pagina podr?? ver tu restaurante/bar. No queda nada pendiente por hacer, tu negocio ya se encuentra utilizando nuestro servicio.
                    <br><br>
                </p>
                
                <h5>??Puedo cambiar alg??n dato dado durante el registro?</h5>
                    S??, si en alg??n momento deseas cambiar algo de los valores que registraste (por ejemplo, precios, telefono, etc), ver??s que hay un bot??n arriba a la derecha al lado de "Registrar Restaurante" que dice <b>Iniciar Sesi??n</b>.
                    <br><br>
                    Si clickeas ese bot??n se mostrar?? una nueva p??gina donde deber??s poner el mail con el que te registraste y la contrase??a elegida.
                    <br><br>
                    Si los datos son correctos, automaticamente se mostrar?? una nueva p??gina que contiene los datos de su registro. Si por alguna raz??n sali?? de esa p??gina (para por ejemplo venir a ??sta), mientras tengas inciada tu sesi??n podr??s notar que en el lugar d??nde debia estar "Iniciar Sesi??n" se encunetra un bot??n que dice <b>Mi Perfil</b>. Si haces click all??, ver??s que hay varios datos que coinciden con los que colocaste a la hora del registro. Si deseas cambiarlos simplemente deber??s reemplazarlos y apretar el bot??n <b>Guardar</b>.
                    <br><br>
                    Luego deber??s iniciar sesi??n nuevamente.
                </p>

                <h5>??Qu?? puedo hacer si mi duda no se encuentra entre las preguntas o no pueden ser solucionadas con la informaci??n brindada?</h5>

                <p>
                    Si tiene alguna duda que no se encuentra listada o no puede resolver su problema siguiendo las indicaciones de esta p??gina puede contactarnos a trav??s de correo electr??nico a la direcci??n <strong>CrearUnMailTrucho@gmail.com</strong> y responderemos lo antes posible para prestarle nuestra ayuda.
                </p>
            </div>
        </div>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>