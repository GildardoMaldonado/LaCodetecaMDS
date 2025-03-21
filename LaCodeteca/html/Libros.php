<?php
session_start();
error_reporting(0);
$sesion = $_SESSION['nombre_s'];

// Conectar a la base de datos
$host = "localhost"; // Cambia por el host de tu base de datos
$dbname = "registros_php_db";
$username = "root";  // Cambia por el nombre de usuario de tu base de datos
$password = "";      // Cambia por la contraseña de tu base de datos

$conn = new mysqli($host, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>La Codeteca  </title>
        <link rel="stylesheet" href="../css/librosCss.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/botonStyle.css">


        <!-- Favicon -->
        <link rel="icon" href="img/core-img/favicon.ico">
        <link rel="stylesheet" href="../css/style.css">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">

    </head>

    <body>
        <!--función para abrir los libros -->
        <script>
            function popup(url, ancho, alto) {
                var posicion_x;
                var posicion_y;
                posicion_x = (screen.width / 2) - (ancho / 2);
                posicion_y = (screen.height / 2) - (alto / 2);
                window.open(url, "documento", "width=" + ancho + ",height=" + alto + ",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left=" + posicion_x + ",top=" + posicion_y + "");
            }

        </script>


        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <!--contenedor del menú-->
            <div class="container">
                <a class="navbar-brand" href="#">
                    <span>La Codeteca</span></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                        </li>
<!--                        <li class="nav-item">
                            <a class="nav-link" href="comentarios.php">Comentarios</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="Libros.php">Libros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="login.php" >Iniciar Sesión</a>
                        </li>
                    </ul>

                    <div class="dropdown">
                        <a class="btn btn-warning dropdown-toggle" href="login.php" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if (!empty($sesion) == null): ?>
                                Invitado
                            <?php endif; ?>
                            <?php if (empty($sesion) == null): ?>

                                <?php echo $sesion; ?>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                </svg>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#"> <?php echo $sesion; ?></a></li>
                            <li><a class="dropdown-item" href="cerrarSesion.php">Cerrar sesión</a></li>
                            <li><a class="dropdown-item" href="Registro.php">Registrarse</a></li>
                        </ul>
                    </div> 

                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox"  onclick="document.documentElement.classList.toggle('darkMode')" />
                            <div class="slider round">
                                <div class="sun">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sun" viewBox="0 0 16 16">
                                    <path d="M3.5 8a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0z"/>
                                    <path d="M8.202.28a.25.25 0 0 0-.404 0l-.91 1.255a.25.25 0 0 1-.334.067L5.232.79a.25.25 0 0 0-.374.154l-.36 1.51a.25.25 0 0 1-.282.188l-1.532-.244a.25.25 0 0 0-.286.286l.244 1.532a.25.25 0 0 1-.189.282l-1.509.36a.25.25 0 0 0-.154.374l.812 1.322a.25.25 0 0 1-.067.333l-1.256.91a.25.25 0 0 0 0 .405l1.256.91a.25.25 0 0 1 .067.334L.79 10.768a.25.25 0 0 0 .154.374l1.51.36a.25.25 0 0 1 .188.282l-.244 1.532a.25.25 0 0 0 .286.286l1.532-.244a.25.25 0 0 1 .282.189l.36 1.508a.25.25 0 0 0 .374.155l1.322-.812a.25.25 0 0 1 .333.067l.91 1.256a.25.25 0 0 0 .405 0l.91-1.256a.25.25 0 0 1 .334-.067l1.322.812a.25.25 0 0 0 .374-.155l.36-1.508a.25.25 0 0 1 .282-.19l1.532.245a.25.25 0 0 0 .286-.286l-.244-1.532a.25.25 0 0 1 .189-.282l1.508-.36a.25.25 0 0 0 .155-.374l-.812-1.322a.25.25 0 0 1 .067-.333l1.256-.91a.25.25 0 0 0 0-.405l-1.256-.91a.25.25 0 0 1-.067-.334l.812-1.322a.25.25 0 0 0-.155-.374l-1.508-.36a.25.25 0 0 1-.19-.282l.245-1.532a.25.25 0 0 0-.286-.286l-1.532.244a.25.25 0 0 1-.282-.189l-.36-1.509a.25.25 0 0 0-.374-.154l-1.322.812a.25.25 0 0 1-.333-.067L8.203.28zM8 2.5a5.5 5.5 0 1 1 0 11 5.5 5.5 0 0 1 0-11z"/>
                                    </svg>
                                </div>
                                <div class="mon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z"/>
                                    </svg>
                                </div>         
                            </div>
                        </label>
                    </div>
                    </nav>

                    <!--carrusel-->
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="1000">
                                <img src="../imagenes/libros4.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item" data-bs-interval="2000">
                                <img src="../imagenes/libros8.jpg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../imagenes/libros5.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">siguiente</span>
                        </a>
                    </div>

                    <!--contenido de los libros-->
                    <div class="top-popular-courses-area section-padding-100-70">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                                        <span style="color: white">Tus autores favoritos</span>
                                        <h3 class="tl" style="color: white">Los libros más populares</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Aprenda lenguaje ANSI C como si estuviera en primero</h5>
                                            <span href =""><a href="">Universidad de Navarra</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                El siguiente libro gratuito está dirigido para todas aquellas personas interesadas en aprender sobre ANSI C. En estos apuntes se describe de forma abreviada la sintaxis del lenguaje C. No se trata de aprender a programar en C, sino más bien de presentar los recursos o las posibilidades que el C pone a disposición de los programadores.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/C - Aprenda Ansi C.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/C - Aprenda Ansi C.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro1.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Curso de programación C/C++ </h5>
                                            <span href =""><a href="">Francisco Javier Ceballo</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                Este libro es el primero de una colección de tres: C/C++: Curso de programación Programación orientada a objetos con C++ Enciclopedia de C++ que cubren el camino que hay que recorrer para llegar a desarrollar aplicaciones orientadas a objetos. Con ejemplos fáciles de entender, que ilustran los fundamentos dela programación C.
                                                Que le permitirá aprender.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/C-C++ Curso de programación 5a edición.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/C-C++ Curso de programación 5a edición.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro2.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Introducción a la programación con Python</h5>
                                            <span href =""><a href="">Andrés Marzal</a></span>
                                            <img src="../imagenes/Intro python.png" alt="">
                                            <p></p>
                                            <p>
                                                En este libro se pretende enseñar a programar y, a diferencia de lo que es usual en cursos introductorios a la programación, se propone el aprendizaje con dos lenguajes de programacion: Python y C.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/Python - Python para Todos 2.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/Python - Python para Todos 2.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro3.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Python para todos</h5>
                                            <span href =""><a href="">Raul Gonzáles Duque</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                Un libro destinado tanto a estudiantes de programación como a profesionales de diversas disciplinas científicas. El autor recorre el lenguaje desde su concepción hasta su aplicación en disciplinas tan variadas como la administración de sistemas GNU/Linux.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/Python - Python para Todos.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/Python - Python para Todos.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro4.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Programación en Visual Basic .NET</h5>
                                            <span href =""><a href="">Luis Miguel Blanco</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                Texto diseñado para enseñar en profundidad a desarrollar aplicaciones basadas en la plataforma .NET Framework, utilizando Visual Basic.NET como lenguaje.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/Visual Basic - Programación en VB .NET .pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/Visual Basic - Programación en VB .NET .pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro5.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Head First C+</h5>
                                            <span href =""><a href="">Andrew Stellman</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                Este libro es una experiencia de aprendizaje completa para aprender a programar con C#, XAML, . NET Framework y Visual Studio. Esta introducción a C# está diseñada para facilitar el aprendizaje de programación.        
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/Libro de C.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/Libro de C.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro6.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>Introducción a la Programacion Orientada a Objetos</h5>
                                            <span href =""><a href="">Francisco Aragón Mesa</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                En este libro se exponen los principios del paradigma orientado a objetos y se presentan problemas de diseño y construcción de programas bajo este paradigma mediante el uso del lenguaje de POO Java.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/Java - Introducción a la Programación Orientada a Objetos con Java.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/Java - Introducción a la Programación Orientada a Objetos con Java.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro7.jpg);"></div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                                        <div class="popular-course-content">
                                            <h5>JAVA 2.0 "La biblia de JAVA"</h5>
                                            <span href =""><a href="">Steven Holzner</a></span>
                                            <img src="../imagenes/ic.png" alt="">
                                            <p></p>
                                            <p>
                                                Este libro nos presenta una introducción y actualización al lenguaje de programación Java, a través de una serie de ejercicios y aplicaciones a casos reales en los cuales se practican diversos temas de Java y su efoque orientado a objetos.
                                            </p></br>
                                            <?php if (!$sesion == '' || !$sesion == null) { ?>
                                                <a href="" download="../libros/Java -  La Biblia de Java 2.pdf" > <button type="button" class="btn btn-primary">Descargar</button></a>
                                                <a href="javascript:popup('../libros/Java -  La Biblia de Java 2.pdf',1200,700)">  <button type="button" class="btn btn-success">Ver</button></a>
                                            <?php } ?>
                                            <?php if ($sesion == '' || $sesion == null) { ?>
                                                <button type="button" class="btn btn-lg btn-danger" data-toggle="popover" title="¿Comó obtener el libro?" data-content="Para ver o obtener los libros es necesario registrarse o iniciar sesión.">Obtener libro</button>
                                            <?php } ?>  
                                        </div>
                                        <div class="popular-course-thumb bg-img" style="background-image: url(../imagenes/libro8.jpg);"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!--footer-->
                    <footer>
                        <div class="container-footer-all">
                            <div class="container-body">
                                <div class="colum1">
                                    <h1>Mas informacion sobre la página</h1>
                                    <p>El objetivo principal de esta página es brindar 
                                        información acerca de distintos temas relacionados con 
                                        la programación.</p>
                                </div>
                                <div class="colum2">
                                    <h1>Redes Sociales</h1>
                                    <div class="row">
                                        <img class="icono-footer" src="../icon/facebook.png">
                                        <label>Siguenos en Facebook</label>
                                    </div>
                                    <div class="row">
                                        <img class="icono-footer" src="../icon/twitter.png">
                                        <label>Siguenos en Twitter</label>
                                    </div>
                                    <div class="row">
                                        <img class="icono-footer" src="../icon/instagram.png">
                                        <label>Siguenos en Instagram</label>
                                    </div>
                                    <div class="row">
                                        <img class="icono-footer" src="../icon/google-plus.png">
                                        <label>Siguenos en Google Plus</label>
                                    </div>
                                    <div class="row">
                                        <img class="icono-footer" src="../icon/pinterest.png">
                                        <label>Siguenos en Pinteres</label>
                                    </div>
                                </div>

                                <div class="colum3">
                                    <div class="row2">
                                        <img class="icono-footer" src="../icon/contact.png">
                                        <label>LaCodeteca@gmail.com</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="container-footer">
                            <div class="footer">
                                <div class="copyright">
                                    © 2022 Todos los Derechos Reservados | <a href="">La Codeteca</a>
                                </div>
                                <div class="information">
                                    <a href="">Informacion </a> | <a href="">Privacion y Politica</a> | <a href="">Terminos y Condiciones</a>
                                </div>
                            </div>
                        </div>

                    </footer>


                    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
                    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>

                    <script>
                                var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-toggle="popover"]'));
                                var popoverList = popoverTriggerList.map(function (popoverTrigger)
                                {
                                    return new bootstrap.Popover(popoverTrigger);
                                });
                    </script>

                    </body>
                    </html>l