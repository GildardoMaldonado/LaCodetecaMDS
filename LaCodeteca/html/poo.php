<?php
session_start();
error_reporting(0);
$sesion = $_SESSION['nombre_s'];
?>
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
        <link rel="stylesheet" href="../css/imprimir.css">
        <link rel="stylesheet" href="../icon/style.css">
        <link rel="stylesheet" href="../icon/theme.css">


        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

        <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
         <!--<script src="bootstrap.bundle.min.js/ bootstrap.bundle.js"></script> -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@600&display=swap" rel="stylesheet">
        <title>Programaciòn Orientada a Objetos</title>
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
                    <div>
                        <div class="content">
                            <section id="contentSection">
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                        <div class="left_content">
                                            <div class="single_page">

                                                <h1>¿Qué es la programaciòn orientada a objetos?</h1>
                                                <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i>Noviembre</a> <span><i class="fa fa-calendar"></i>LaCodeteca</span> <a href="#"><i class="fa fa-tags"></i>2022</a> </div>
                                                <div class="single_page_content"> <img class="img-center" src="../imagenes/poo.jpg" alt="" style="width: 100px">
                                                    <p>La Programación Orientada a Objetos (POO) es un paradigma de programación, es decir, un modelo o un estilo de programación que nos da unas guías sobre cómo trabajar con él. Se basa en el concepto de clases y objetos. Este tipo de programación se utiliza para estructurar un programa de software en piezas simples y reutilizables de planos de código (clases) para crear instancias individuales de objetos</p>

                                                    <p>Una clase es una plantilla. Define de manera genérica cómo van a ser los objetos de un determinado tipo. Por ejemplo, una clase para representar a animales puede llamarse ‘animal’ y tener una serie de atributos, como ‘nombre’ o ‘edad’, y una serie con los comportamientos que estos pueden tener, como caminar o comer, y que a su vez se implementan como métodos de la clase (funciones).</p>

                                                    <p>Un ejemplo sencillo de un objeto, como decíamos antes, podría ser un animal. Un animal tiene una edad, por lo que creamos un nuevo atributo de ‘edad’ y, además, puede envejecer, por lo que definimos un nuevo método..

                                                        Con la clase pueden crearse instancias de un objeto, cada uno de ellos con sus atributos definidos independientemente. Con esto se puede crear un gato llamado Pepe, con 5 años de edad, y otro animal, este tipo perro y llamado Lucho, con una de edad de 3 años. .</p>


                                                </div>

                                                <div class="related_post">
                                                    <h2>Algunos temas similares <i class="fa fa-thumbs-o-up"></i></h2>
                                                    <ul class="spost_nav wow fadeInDown animated">
                                                        <li>
                                                            <div class="media"> <a class="media-left" href=""> <img src="../imagenes/lenguajes.png" alt="" style="width: 100px"> </a>
                                                                <div class="media-body"> <a class="catg_title" href="https://keepcoding.io/blog/5-lenguajes-de-programacion-mas-usados-2022/">Los 5 lenguajes de progrmaciòn màs usados en 2022</a> </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media"> <a class="media-left" href=""> <img src="../imagenes/pro.jpeg" alt="" style="width: 100px"> </a>
                                                                <div class="media-body"> <a class="catg_title" href="https://keepcoding.io/blog/5-ideas-proyectos-para-aprender-a-programar/">Ideas divertidas de proyectos para aprender a programar</a> </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="media"> <a class="media-left" href=""> <img src="../imagenes/economia.jpg" alt="" style="width: 100px"> </a>
                                                                <div class="media-body"> <a class="catg_title" href="https://keepcoding.io/blog-frr/el-software-que-causo-el-colapso-de-la-economia-bondtalk/">El software que causó el colapso de la economía: BondTalk
                                                                    </a> </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <aside class="right_content">
                                            <div class="single_sidebar">
                                                <h2><span class="amarillo">Temas relacionados.</span></h2>
                                                <ul class="spost_nav">
                                                    <li>
                                                        <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../imagenes/programacion-estructurada.jpg"> </a>
                                                            <div class="media-body"> <a href="estructurada.php" class="catg_title">Programación estructurada
                                                                    La programación estructurada es un paradigma de programación orientado a mejorar...</a> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../imagenes/lenguaje-programacion-c.jpg"> </a>
                                                            <div class="media-body"> <a href="lenguajeC.php" class="catg_title">Lenguaje de programación C
                                                                    Es un lenguaje de programación con el cual se desarrollan tanto aplicaciones como sistemas operativos...</a> </div>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="media wow fadeInDown"> <a href="python.php" class="media-left"> <img alt="" src="../imagenes/python.jpeg"> </a>
                                                            <div class="media-body"> <a href="python.php" class="catg_title"> ¿Qué es Python? es un lenguaje de alto nivel de programación interpretado cuya filosofía hace hincapié en la legibilidad de su código...</a> </div>
                                                        </div>
                                                    </li>
                                                    <li>

                                                        <div class="media wow fadeInDown"> <a href="java.php" class="media-left"> <img alt="" src="../imagenes/Java.jpg"> </a>
                                                            <div class="media-body"> <a href="Bigbang.php" class="catg_title">¿Qué es Java? es un lenguaje de programación ampliamente utilizado para codificar aplicaciones web...</a> </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="single_sidebar wow fadeInDown">
                                                <h2><span class="amarillo">Datos para recordar.</span></h2>
                                                <a class="sideAdd" href="#"><img src="../imagenes/curiosidades-computacion-08.png" alt=""></a>
                                            </div></div></div></div>




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
                        © 2021 Todos los Derechos Reservados | <a href="">La Codeteca</a>
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