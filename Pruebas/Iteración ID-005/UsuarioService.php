<?php
function crearUsuario($conexion, $correo, $contrasenia, $nombre, $es_admin) {
    $correo = mysqli_real_escape_string($conexion, $correo);
    $contrasenia = password_hash($contrasenia, PASSWORD_DEFAULT);
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $es_admin = $es_admin ? 1 : 0;
    $sql = "INSERT INTO usuarios (correo, contrasenia, nombre, es_admin)
            VALUES ('$correo', '$contrasenia', '$nombre', $es_admin)";
    return $conexion->query($sql);
}

function autenticarUsuario($conexion, $correo, $contrasenia) {
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($contrasenia, $usuario['contrasenia'])) {
            return $usuario;
        }
    }
    return false;
}
