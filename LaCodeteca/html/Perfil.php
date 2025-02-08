<?php
session_start();
include 'conexionDB.php'; // Asegúrate de que este archivo esté bien configurado

// Verifica si el usuario está logueado
if (!isset($_SESSION['correo'])) {
    header("Location: login.php"); // Si no está logueado, redirige a login
    exit();
}

$correo = $_SESSION['correo']; // Obtiene el correo del usuario desde la sesión

// Obtener los datos actuales del usuario
$consulta = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

// Manejar la actualización de los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuevo_nombre = $_POST['nombreu'];
    $nueva_contrasenia = $_POST['contrasenia'];
    $nuevo_sexo = $_POST['sexo'];
    $nueva_edad = $_POST['edad'];
    $nueva_nacionalidad = $_POST['nacionalidad'];

    // Asegurarse de que el correo esté disponible
    if (isset($_SESSION['correo_s'])) {
        $correo = $_SESSION['correo_s'];  // Obtener correo del usuario logueado
    } else {
        $mensaje = 'No se encontró el correo del usuario.';
        exit();
    }

    // Comprobar si la nacionalidad ya existe en la base de datos
    $consulta_nacionalidad = "SELECT * FROM nacionalidades WHERE nacionalidad = '$nueva_nacionalidad'";
    $resultado_nacionalidad = mysqli_query($conexion, $consulta_nacionalidad);

    if (mysqli_num_rows($resultado_nacionalidad) > 0) {
        // Si la nacionalidad existe, obtener su ID
        $nacionalidad = mysqli_fetch_assoc($resultado_nacionalidad);
        $nacionalidad_id = $nacionalidad['id'];
    } else {
        // Si no existe, insertar la nueva nacionalidad
        $insertar_nacionalidad = "INSERT INTO nacionalidades (nacionalidad) VALUES ('$nueva_nacionalidad')";
        if (mysqli_query($conexion, $insertar_nacionalidad)) {
            // Obtener el ID de la nueva nacionalidad insertada
            $nacionalidad_id = mysqli_insert_id($conexion);
        } else {
            $mensaje = 'Error al insertar la nueva nacionalidad.';
            exit();
        }
    }

    // Preparar la consulta para actualizar los datos en la base de datos
    $sql = "UPDATE usuarios SET nombre = ?, contrasenia = ?, sexo = ?, nacionalidad_id = ?, edad = ? WHERE correo = ?";
    
    // Crear una consulta preparada
    $stmt = $conexion->prepare($sql);
    
    // Si no se pudo preparar la consulta, manejar el error
    if ($stmt === false) {
        $mensaje = 'Error al preparar la consulta: ' . $conexion->error;
        exit();
    }
    
    // Encriptar la contraseña antes de almacenarla
    $nueva_contrasenia_encriptada = password_hash($nueva_contrasenia, PASSWORD_DEFAULT);
    
    // Vincular los parámetros a la consulta
    $stmt->bind_param("ssssss", $nuevo_nombre, $nueva_contrasenia_encriptada, $nuevo_sexo, $nacionalidad_id, $nueva_edad, $correo);
    
    // Ejecutar la consulta
    if ($stmt->execute()) {
        $mensaje = 'Datos actualizados correctamente';
    } else {
        $mensaje = 'Hubo un error al actualizar tus datos';
    }

    // Cerrar la consulta preparada
    $stmt->close();
}

mysqli_close($conexion);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Mi Perfil</h2>
        
        <?php if (isset($mensaje)): ?>
            <div class="alert alert-info"><?php echo $mensaje; ?></div>
        <?php endif; ?>

        <form action="Perfil.php" method="POST">
            <!-- Nombre -->
            <div class="form-group">
                <label for="nombreu">Nombre</label>
                <input name="nombreu" id="nombreu" type="text" class="form-control" value="<?php echo $usuario['nombre']; ?>" required>
            </div>

            <!-- Correo (no editable) -->
            <div class="form-group">
                <label for="correoU">Correo electrónico</label>
                <input name="correoU" id="correoU" type="email" class="form-control" value="<?php echo $usuario['correo']; ?>" disabled>
            </div>

            <!-- Contraseña (encriptada, no editable) -->
            <div class="form-group">
                <label for="contrasenia">Contraseña</label>
                <input name="contrasenia" id="contrasenia" type="text" class="form-control" value="<?php echo password_hash($usuario['contrasenia'], PASSWORD_DEFAULT); ?>" disabled>
                <small>La contraseña está encriptada y no puede ser editada directamente</small>
            </div>

            <!-- Edad -->
            <div class="form-group">
                <label for="edad">Edad</label>
                <input name="edad" id="edad" type="number" class="form-control" value="<?php echo $usuario['edad']; ?>">
            </div>

            <!-- Sexo -->
            <div class="form-group">
                <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo" class="form-control">
                    <option value="Masculino" <?php echo ($usuario['sexo'] == 'Masculino') ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Femenino" <?php echo ($usuario['sexo'] == 'Femenino') ? 'selected' : ''; ?>>Femenino</option>
                    <option value="Otro" <?php echo ($usuario['sexo'] == 'Otro') ? 'selected' : ''; ?>>Otro</option>
                </select>
            </div>

            <!-- Nacionalidad -->
            <div class="form-group">
                <label for="nacionalidad">Nacionalidad</label>
                <input name="nacionalidad" id="nacionalidad" type="text" class="form-control" value="<?php echo $usuario['nacionalidad']; ?>">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <!-- Agregar Script para manejar localStorage -->
    <script>
        // Recuperar los datos desde localStorage
        document.addEventListener("DOMContentLoaded", function() {
            const nombre = localStorage.getItem('nombre_s');
            const correo = localStorage.getItem('correo_s');
            const edad = localStorage.getItem('edad_s');
            const sexo = localStorage.getItem('sexo_s');
            const nacionalidad = localStorage.getItem('nacionalidad_s');

            if (nombre) {
                document.getElementById("nombreu").value = nombre;
            }

            if (correo) {
                document.getElementById("correoU").value = correo;
            }

            if (edad) {
                document.getElementById("edad").value = edad;
            }

            if (sexo) {
                document.getElementById("sexo").value = sexo;
            }

            if (nacionalidad) {
                document.getElementById("nacionalidad").value = nacionalidad;
            }
        });

        document.querySelector("form").addEventListener("submit", function() {
                    const nombre = document.getElementById("nombreu").value;
                    const correo = document.getElementById("correoU").value;
                    const edad = document.getElementById("edad").value;
                    const sexo = document.getElementById("sexo").value;
                    const nacionalidad = document.getElementById("nacionalidad").value;

                    // Guardar los nuevos valores en localStorage
                    localStorage.setItem('nombre_s', nombre);
                    localStorage.setItem('correo_s', correo);
                    localStorage.setItem('edad_s', edad);
                    localStorage.setItem('sexo_s', sexo);
                    localStorage.setItem('nacionalidad_s', nacionalidad);

                });
    </script>
</body>
</html>
