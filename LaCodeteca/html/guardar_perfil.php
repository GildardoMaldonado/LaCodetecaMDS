<?php
// Verifica que el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica si los datos han sido recibidos correctamente
    var_dump($_POST); // Ver los datos recibidos por el formulario

    // Luego, puedes continuar con la lógica de actualización en la base de datos
    $correo = $_POST['correo'];  // Este campo lo mantienes deshabilitado, pero si necesitas actualizarlo, no lo debes marcar como disabled.
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $nacionalidad = $_POST['nacionalidad'];
    $sexo = $_POST['sexo'];

    // Aquí puedes añadir la lógica para actualizar los datos en la base de datos
}

// Verifica que el formulario se ha enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo']; // Este es el correo del usuario, se asume que no se va a cambiar
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $nacionalidad = $_POST['nacionalidad'];
    $sexo = $_POST['sexo'];

    // Asegúrate de sanitizar los datos antes de usarlos en la consulta SQL
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $edad = mysqli_real_escape_string($conexion, $edad);
    $nacionalidad = mysqli_real_escape_string($conexion, $nacionalidad);
    $sexo = mysqli_real_escape_string($conexion, $sexo);

    // Suponiendo que ya tienes la variable $sesion o el identificador del usuario
    // Si el usuario está logueado, su correo es único para la actualización
    $query = "UPDATE usuarios SET nombre = '$nombre', edad = '$edad', nacionalidad = '$nacionalidad', sexo = '$sexo' WHERE correo = '$correo'";

    if (mysqli_query($conexion, $query)) {
        echo "Los datos se han actualizado correctamente.";
        // Puedes redirigir a la página del perfil o mostrar un mensaje de éxito
        header("Location: Perfil.php");
    } else {
        echo "Error al actualizar los datos: " . mysqli_error($conexion);
    }
}
?>
