<?php
session_start();
error_reporting(0);
$sesion = $_SESSION['nombre_s'] ?? null;  // Usa el operador null coalescing para asegurar que no lance un error si no existe la sesión
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" href="../css/botonStyle.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/print.css">




        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
         <!--<script src="bootstrap.bundle.min.js/ bootstrap.bundle.js"></script> -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

        <!--btn hacia arriba-->

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
        <title>La Codeteca</title>
    </head>
    <body>





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
                            <li><a class="dropdown-item" href="Perfil.php"> <?php echo $sesion; ?></a></li>
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

                    <!--carrusel -->


                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../imagenes/thumb-1920-1218911.jpg" class="d-block w-100" alt="..." >
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>¿Conoces los diferentes lenguajes de programación?<h5>
                                            <p></p>
                                            </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../imagenes/programacion-sintaxis_1920x1080_xtrafondos.com.jpg" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                            <div class="carousel-item">
                                                <img src="../imagenes/comer-dormir-codificar-repetir_2560x1440_5487.webp" class="d-block w-100" alt="...">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <h5></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>

                                            </div>

                                            <!--galeria de imagenes-->
                                            <div  class="text-center text-muted "><h2 style="">Temas</h2></div>
                                            <div class="container">
                                                <div class="row mt-4 justify-content-center">
                                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
                                                        <img src="../imagenes/lenguajes-de-programacion.jpeg" class="img-fluid">
                                                        <div class="info-producto bg-primary text-center text-light">
                                                            <h3 class="text-center mb-2">¿Qué es la Programación Orientada a objetos?</h3>
                                                            <p>La Programación Orientada a Objetos es un paradigma de programación, que se basa en el concepto de clases y objetos.</p>
                                                            <p class="recio font-weight-bold"></p>
                                                            <a href="poo.php" class="btn btn-outline-light mb-2 btn-lg text-uppercase font-weight-bold">Leer más</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
                                                        <img src="../imagenes/lenguaje-programacion-c.jpg" class="img-fluid">
                                                        <div class="info-producto bg-primary text-center text-light">
                                                            <h3 class="text-center mb-2">Lenguaje de programaión C</h3>
                                                            <p> C es un lenguaje de programación con el cual se desarrollan tanto aplicaciones como sistemas operativos.</p>
                                                            <p class="recio font-weight-bold"></p>
                                                            <a href="lenguajeC.php" class="btn btn-outline-light mb-2 btn-lg text-uppercase font-weight-bold">Leer más</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
                                                        <img src="../imagenes/Java.jpg" class="img-fluid">
                                                        <div class="info-producto bg-primary text-center text-light">
                                                            <h3 class="text-center mb-2">Java</h3>
                                                            <p>Java es un lenguaje de programación ampliamente utilizado para codificar aplicaciones web; es un lenguaje multiplataforma, orientado a objetos y centrado en la red que se puede utilizar como una plataforma en sí mismo.</p>
                                                            <p class="recio font-weight-bold"></p>
                                                            <a href="java.php" class="btn btn-outline-light mb-2 btn-lg text-uppercase font-weight-bold">Leer más</a>
                                                        </div>
                                                    </div>

                                                </div>


                                                <div class="row mt-4 justify-content-center">
                                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
                                                        <img src="../imagenes/python.jpeg" class="img-fluid">
                                                        <div class="info-producto bg-primary text-center text-light">
                                                            <h3 class="text-center mb-2">Python</h3>
                                                            <p>Python es un lenguaje de alto nivel de programación interpretado cuya filosofía hace hincapié en la legibilidad de su código, se utiliza para desarrollar aplicaciones de todo tipo.</p>
                                                            <p class="recio font-weight-bold"></p>
                                                            <a href="python.php" class="btn btn-outline-light mb-2 btn-lg text-uppercase font-weight-bold">Leer más</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
                                                        <img src="../imagenes/programacion-estructurada.jpg" class="img-fluid">
                                                        <div class="info-producto bg-primary text-center text-light">
                                                            <h3 class="text-center mb-2">Programación estructurada</h3>
                                                            <p> La programación estructurada es una teoría orientada a mejorar la claridad, calidad y tiempo de desarrollo utilizando únicamente subrutinas o funciones.</p>
                                                            <p class="recio font-weight-bold"></p>
                                                            <a href="estructurada.php" class="btn btn-outline-light mb-2 btn-lg text-uppercase font-weight-bold">Leer más</a>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-lg-4 mb-4 mb-md-4">
                                                        <img src="../imagenes/ide.jpg" class="img-fluid">
                                                        <div class="info-producto bg-primary text-center text-light">
                                                            <h3 class="text-center mb-2">¿Qué es un IDE?</h3>
                                                            <p>Un entorno de desarrollo integrado (IDE) es una aplicación de software que ayuda a los programadores a desarrollar código de software de manera eficiente.</p>
                                                            <p class="recio font-weight-bold"></p>
                                                            <a href="ide.php" class="btn btn-outline-light mb-2 btn-lg text-uppercase font-weight-bold">Leer más</a>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                            <!--Software top 10-->
                                            <div class="testimonials-area section-padding-100 bg-img bg-overlay" style="background-image: url(../imagenes/cientificos.jpg);">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="section-heading text-center mx-auto white wow fadeInUp" data-wow-delay="300ms">
                                                                <span></span>
                                                                <h3 class="tf">Herramientas para programar.</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- Single Testimonials Area -->
                                                        <div class="col-12 col-md-6">
                                                            <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="400ms">
                                                                <div class="testimonial-thumb">
                                                                    <img src="../imagenes/nets.png" alt="">
                                                                </div>
                                                                <div class="testimonial-content">
                                                                    <a href="https://netbeans.apache.org/"><h5>NetBeans IDE</h5></a> 
                                                                    <p>
                                                                        NetBeans IDE es un entorno de desarrollo integrado de código abierto y gratuito para el desarrollo de aplicaciones en los sistemas operativos Windows, Mac, Linux y Solaris. El IDE simplifica el desarrollo de aplicaciones web, empresariales, de escritorio y móviles que utilizan las plataformas Java y HTML5.
                                                                    </p>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Testimonials Area -->
                                                        <div class="col-12 col-md-6">
                                                            <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="500ms">
                                                                <div class="testimonial-thumb">
                                                                    <img src="../imagenes/visual.jpg" alt="">
                                                                </div>
                                                                <div class="testimonial-content">
                                                                    <a href="https://code.visualstudio.com/"> <h5>Visual Studio Code</h5></a>
                                                                    <p>
                                                                        Visual Studio Code es un editor de código fuente desarrollado por Microsoft para Windows, Linux, macOS y Web. Incluye soporte para la depuración, control integrado de Git, resaltado de sintaxis, finalización inteligente de código, fragmentos y refactorización de códigoF
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Testimonials Area -->
                                                        <div class="col-12 col-md-6">
                                                            <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="600ms">
                                                                <div class="testimonial-thumb">
                                                                    <img src="../imagenes/github.png" alt="">
                                                                </div>
                                                                <div class="testimonial-content">
                                                                    <a href="https://github.com/"><h5>Github</h5></a>
                                                                    <p>
                                                                        Github es un repositorio online gratuito que permite gestionar proyectos y controlar versiones de código. Es muy utilizado por desarrolladores para almacenar sus trabajos dando así la oportunidad a millones de personas de todo el mundo a cooperar en ellos.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- Single Testimonials Area -->
                                                        <div class="col-12 col-md-6">
                                                            <div class="single-testimonial-area mb-100 d-flex wow fadeInUp" data-wow-delay="700ms">
                                                                <div class="testimonial-thumb">
                                                                    <img src="../imagenes/git.png" alt="">
                                                                </div>
                                                                <div class="testimonial-content">
                                                                    <a href="https://git-scm.com/"><h5>Git</h5></a>
                                                                    <p>
                                                                        Git es un sistema de control de versiones distribuido, lo que significa que un clon local del proyecto es un repositorio de control de versiones completo. Estos repositorios locales plenamente funcionales permiten trabajar sin conexión o de forma remota con facilidad.
                                                                    </p>
                                                                    <h6><span></span></h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <!--footer-->

                                            <footer>



                                                <div class="row2">
                                                    <img class="icono-footer" src="../icon/contact.png" width="40">
    <!--                                                                                <img src="../imagenes/code-6127616_960_720 (1).webp" class="logo-brand" alt="logo0" width="40"><span> La Codeteca</span>-->
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

                                            <!-- Optional JavaScript; choose one of the two! -->

                                            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



                                            </body>
                                            </html>