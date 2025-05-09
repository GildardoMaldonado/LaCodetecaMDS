<?php
function procesarSubidaDeImagen($nombreUsuario, $archivo) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . $nombreUsuario . ".jpg";
    $imageFileType = strtolower(pathinfo($archivo['name'], PATHINFO_EXTENSION));

    $check = getimagesize($archivo['tmp_name']);
    if ($check === false) {
        return ['success' => false, 'message' => 'El archivo no es una imagen.'];
    }

    if ($archivo['size'] > 2000000) {
        return ['success' => false, 'message' => 'El archivo es demasiado grande.'];
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png'])) {
        return ['success' => false, 'message' => 'Solo se permiten archivos JPG, JPEG y PNG.'];
    }

    if (move_uploaded_file($archivo['tmp_name'], $targetFile)) {
        return ['success' => true, 'message' => 'La foto de perfil se subió correctamente.'];
    } else {
        return ['success' => false, 'message' => 'Error al subir el archivo.'];
    }
}
