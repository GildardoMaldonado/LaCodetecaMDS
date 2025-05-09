Asegurarse de tener PHPUnit instalado

Para las pruebas, se debe modificar el archivo uploadHandler.php y sustituir el módulo 
con el del archivo uploadLogic.php

uploadHandler debe quedar así: 
<?php
session_start();
if (!isset($_SESSION['nombre_s'])) {
    echo json_encode(['success' => false, 'message' => 'No has iniciado sesión.']);
    exit;
}

require 'uploadLogic.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $resultado = procesarSubidaDeImagen($_SESSION['nombre_s'], $_FILES['photo']);
    echo json_encode($resultado);
} else {
    echo json_encode(['success' => false, 'message' => 'No se recibió ningún archivo.']);
}



En terminal de PHPUnit:

./vendor/bin/phpunit tests/UploadTest.php