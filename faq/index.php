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
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../miperfil';">
                                            Mi Perfil
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="espdemargen btn btn-default" type="button" onclick="location.href = '../iniciarsesion/cerrarsesion.php'">
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
            <h2><b>Preguntas Frecuentes</b></h2>
            <div>
                <p>
                    En esta sección de la página se encuentran algunas preguntas, que podrían surgir a la hora de utilizar nuestro servicio, con sus respectivas respuestas.
                </p>
            </div>
            <div>
                <h5>¿Cómo se busca un restaurante según nombre/precio/zona?</h5>

                <p>
                    En la parte superior de nuestra página se pueden observar varios botones y un campo de texto. Utilizando este campo puede buscar un restaurante especifico a través de su nombre.
                    Debajo de dicho campo se encuentran 2(dos) opciones de filtrado y un botón de busqueda. Dichas opciones de filtrado son de izquierda a derecha "Zona" y "Precio". 
                    Puede elegir utilizar o no dichos filtros.
                </p>

                <h5>¿El restaurante que buscas no fue encontrado utilizando el buscador?</h5>

                <p>
                    Estos pueden ser algunos de los motivos por los cuales sucede:
                    <ul>
                        <li>
                            Los datos colocados en el buscador no son correctos.
                        </li>
                        <li>
                            El restaurante a buscar no cumple con las características por las cuales se están buscando, es decir que o no se encuentra en la zona buscada o no tiene menúes con el rango de precios buscado.
                        </li>
                        <li>
                            El restaurante no utiliza nuestro servicio y por lo tanto no se encuentra registrado en nuestro sitio.
                        </li>
                    </ul>
                    Si puede confirmar que el restaurante utiliza nuestro servicio y aún así no logra encontrarlo de ninguna forma en nuestro sitio, puede contactarse con nosotros enviando un correo electrónico a la dirección indicada en la última pregunta de esta página.
                </p>

                <h5>¿Quién puede registrarse?</h5>

                <p>
                    Cualquier persona o grupo de personas que posean un restaurante puede registrarse para utilizar el servicio que brindamos.
                </p>

                <h5>¿Hay algún costo por el servicio?</h5>
                    Actualmente este servicio es gratuito, no obstante en el futuro se cobrará una leve suma de dinero por utilizar nuestro servicio, ya que, sin la colaboración de los participantes, el servicio no será sustentable.
                <p>

                </p>
                
                <h5>¿Cómo me registro?</h5>

                <p>
                    Los pasos a seguir para disponer de nuestro servicio son muy sencillos.<br>
                    En la parte superior de la página se ven varios botones, entre ellos se encuentra uno que dice "Registrar Restaurante", deberemos clickear en él.<br>
                    Una vez clickeado el botón, veremos que aparece un formulario con distintos datos a completar. Estos datos son:
                    <ul>

                        <li>
                            Nombre Restaurante. En este campo, tal como se indica en su nombre, debe colocar el nombre de su restaurante.
                        </li>

                        <li>
                            Teléfono. En este campo debe poner el teléfono del restaurante para consultas y reservas.
                        </li>

                        <li>
                            Dirección. En este campo debe poner la dirección exacta de su restaurante, nombre y número de la misma, como si quisiera buscar ese lugar en Google Maps.
                        </li>

                        <li>
                            Contraseña. En este campo debe escribir una contraseña que utilizará para iniciar sesión en el sitio por si desea retirar su restaurante de nuestro sitio o cambiar algún dato del mismo. Se recomienda utilizar combinaciones de mayúsculas y minúsculas, simbolos (tales com @#$% etc), números y en lo posible que no sea referencia a algo personal que sea fácil de conocer (como direcciones o fechas importantes). El largo máximo de la contraseña es de 25 caracteres y el mínimo es de 8.
                        </li>

                        <li>
                            Confirmar Contraseña. En este campo deberá volver a escribir la contraseña tal cual como fue escrita en el campo de arriba. Esto es para disminuir las posibilidades de error al escribir la contraseña y tener realmente la contraseña deseada.
                        </li>

                        <li>
                            Email. En este campo deberá colocar el correo electrónico del restaurante para que tanto clientes como nosotros podamos comunicarnos por esta vía. Si su restaurante no posee un correo electrónico, se recomienda que se le cree uno, pero en caso de no querer hacerlo puede utilizar un correo personal.
                        </li>

                        <li>
                            Precios. En este caso se verán 4(cuatro) casillas con posibilidad de ser seleccionadas. Puede no seleccionar ninguna si no existe la opción buscada o bien no quiere poner precios en la página. También puede seleccionar todas si coinciden con sus precios. Considerar precios por plato.
                        </li>

                        <li>
                            Zona de la Ciudad. En este campo se encuentran varias opciones, las cuales corresponden a las distintas zonas de la ciudad, deberá seleccionar la zona en la que se encuentra su restaurante.
                        </li>

                        <li>
                            Captcha. En este caso verá una imagen con algunas letras y numeros en ella. Deberá completar el campo debajo de la imagen con las letras/números que aparecen en la imagen sin espacios.
                        </li>

                    </ul>
                </p>

                <h5>Ya me registré. ¿Ahora que hago?</h5>

                <p>
                    Una vez que crees tu cuenta, quien acceda a la pagina podrá ver tu restaurante/bar. No queda nada pendiente por hacer, tu negocio ya se encuentra utilizando nuestro servicio.
                    <br><br>
                </p>
                
                <h5>¿Puedo cambiar algún dato dado durante el registro?</h5>
                    Sí, si en algún momento deseas cambiar algo de los valores que registraste (por ejemplo, precios, telefono, etc), verás que hay un botón arriba a la derecha al lado de "Registrar Restaurante" que dice <b>Iniciar Sesión</b>.
                    <br><br>
                    Si clickeas ese botón se mostrará una nueva página donde deberás poner el mail con el que te registraste y la contraseña elegida.
                    <br><br>
                    Si los datos son correctos, automaticamente se mostrará una nueva página que contiene los datos de su registro. Si por alguna razón salió de esa página (para por ejemplo venir a ésta), mientras tengas inciada tu sesión podrás notar que en el lugar dónde debia estar "Iniciar Sesión" se encunetra un botón que dice <b>Mi Perfil</b>. Si haces click allí, verás que hay varios datos que coinciden con los que colocaste a la hora del registro. Si deseas cambiarlos simplemente deberás reemplazarlos y apretar el botón <b>Guardar</b>.
                    <br><br>
                    Luego deberás iniciar sesión nuevamente.
                </p>

                <h5>¿Qué puedo hacer si mi duda no se encuentra entre las preguntas o no pueden ser solucionadas con la información brindada?</h5>

                <p>
                    Si tiene alguna duda que no se encuentra listada o no puede resolver su problema siguiendo las indicaciones de esta página puede contactarnos a través de correo electrónico a la dirección <strong>CrearUnMailTrucho@gmail.com</strong> y responderemos lo antes posible para prestarle nuestra ayuda.
                </p>
            </div>
        </div>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>