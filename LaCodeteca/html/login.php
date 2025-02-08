<?php
session_start(); // Inicia la sesión
$mensaje = '';  // Variable para almacenar mensajes de error o éxito
include '../DataBasePhp/conexionBD.php';  // Incluir la conexión a la base de datos

// Verificar si se han enviado los datos de formulario
if (!empty($_POST['correo']) && !empty($_POST['contrasenia'])) {

    $correo = $_POST['correo'];  // Obtener el correo del formulario
    $contrasenia = $_POST['contrasenia'];  // Obtener la contraseña del formulario

    // Consulta para verificar si el correo existe en la base de datos (usando consulta preparada)
    $sql = "SELECT id, correo, contrasenia, nombre FROM usuarios WHERE correo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("s", $correo); // "s" para string
    $stmt->execute();
    $resultado = $stmt->get_result();
    $numero = $resultado->num_rows;  // Verificar cuántos usuarios coinciden con el correo

    if ($numero > 0) {
        // Si se encuentra el usuario, proceder a validar la contraseña
        $row = $resultado->fetch_assoc();
        $contra_bd = $row['contrasenia'];  // Contraseña almacenada en la base de datos

        // Verificar si la contraseña es correcta utilizando password_verify
        if (password_verify($contrasenia, $contra_bd)) {

            // Iniciar sesión y guardar datos en la variable de sesión
            $_SESSION['nombre_s'] = $row['nombre'];  // Guardar el nombre del usuario en la sesión
            $_SESSION['correo_s'] = $row['correo'];  // También se puede guardar el correo o cualquier otro dato

            // Agregar el código JavaScript para guardar los datos en localStorage
            echo "<script>
                    localStorage.setItem('nombre_s', '" . $row['nombre'] . "');
                    localStorage.setItem('correo_s', '" . $row['correo'] . "');
                    // Redirigir después de guardar en localStorage
                    setTimeout(function() {
                        window.location.href = 'index.php';
                    }, 500); // Esperar 500 ms para asegurar que se guarden los datos antes de redirigir
                  </script>";
            exit();  // Asegurarse de que no se ejecute más código después de la redirección
        } else {
            // Contraseña incorrecta
            $mensaje = 'Correo o contraseña incorrectos';
        }
    } else {
        // Usuario no encontrado
        $mensaje = 'Correo o contraseña incorrectos';
    }

    // Cerrar la conexión con la base de datos
    $conexion->close();

} else {
    // Si los campos están vacíos
    $mensaje = 'Por favor, ingresa tanto el correo como la contraseña.';
}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="../css/loginEstilos.css" rel="stylesheet">

    <title>Iniciar Sesión</title>
</head>
<body>
    <section class="contact-box">
        <div class="row no-gutters bg-dark">
            <div class="col-xl-5 col-lg-12 register-bg">
                <div class="position-absolute testiomonial p-4">
                    <h3 class="font-weight-bold text-light">Inicia Sesión</h3>
                    <p class="lead text-light">Inicia sesión para obtener acceso a contenido exclusivo</p>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12 d-flex">
                <div class="container align-center p-6">
                    <h1 class="font-weight-bold mb-3">Iniciar Sesión</h1>
                    <div class="form-group">
                        <a href="Registro.php"><button class="btn btn-outline-dark d-inline-block text-light mr-2 mb-3 width-100"><i class="lead align-middle mr-2"></i> Registrarse </button></a>
                        <a href="index.php"><button class="btn btn-outline-dark d-inline-block text-light mr-2 mb-3 width-100"><i class="lead align-middle mr-2"></i> Regresar</button></a> 
                    </div>
                    <p class="text-muted mb-5">Ingresa la siguiente información.</p>

                    <!-- Formulario de login -->
                    <form action="login.php" method="POST" onsubmit="return validarFormulario(event)">
                        <div class="form-group mb-6">
                            <label class="font-weight-bold">Correo electrónico <span class="text-danger">*</span></label>
                            <input name="correo" id="correoU" type="email" class="form-control" placeholder="Ingresa tu correo electrónico">
                        </div>
                        <div class="form-group mb-6">
                            <label class="font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                            <input name="contrasenia" id="contraseniaU" type="password" class="form-control" placeholder="Ingresa una contraseña">
                        </div>

                        <!-- Mostrar mensaje de error si existe -->
                        <?php if (!empty($mensaje)): ?>
                            <p> <?= $mensaje ?></p>
                        <?php endif; ?>

                        <button class="btn btn-primary width-100" type="submit">Iniciar sesión</button>
                    </form>
                    <small class="d-inline-block text-muted mt-5">Todos los derechos reservados | © 2020 La Biblioteca del Cosmos</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../JS/validarLogin.js"></script>
</body>
</html>
