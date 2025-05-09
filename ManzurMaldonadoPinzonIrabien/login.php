<?php
session_start();
$mensaje = '';
include 'conexionBD.php';

if (!empty($_POST['correo']) && !empty($_POST['contrasenia'])) {
    $correo = mysqli_real_escape_string($conexion, $_POST['correo']);
    $contrasenia = trim($_POST['contrasenia']);


    $stmt = $conexion->prepare("SELECT id, correo, contrasenia, nombre, es_admin FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();



        // Verificación de contraseña
        if (password_verify($contrasenia, $usuario['contrasenia'])) {
            // Contraseña válida
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['nombre_s'] = $usuario['nombre'];
            $_SESSION['admin'] = ($usuario['es_admin'] == '1') ? true : false;

            header("Location: index.php");
            exit();
        } else {
            $mensaje = 'Contraseña incorrecta';
        }
    } else {
        $mensaje = 'Usuario no encontrado';
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="loginEstilos.css" rel="stylesheet">
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
                        <a href="Registro.php"><button class="btn btn-outline-dark text-light mb-3">Registrarse</button></a>
                        <a href="index.php"><button class="btn btn-outline-dark text-light mb-3">Regresar</button></a>
                    </div>
                    <p class="text-muted mb-5">Ingresa la siguiente información.</p>

                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label>Correo electrónico</label>
                            <input name="correo" type="email" class="form-control" placeholder="Ingresa tu correo" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input name="contrasenia" type="password" class="form-control" placeholder="Ingresa tu contraseña" required>
                        </div>

                        <?php if (!empty($mensaje)): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($mensaje) ?></div>
                        <?php endif; ?>

                        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                    </form>

                    <small class="text-muted mt-3">© 2020 La biblioteca del cosmos</small>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
