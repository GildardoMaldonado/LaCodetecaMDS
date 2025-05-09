<?php
// Verificar si el navegador es Safari
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$is_safari = strpos($user_agent, 'Safari') !== false && strpos($user_agent, 'Chrome') === false;

if (!$is_safari) {
    echo "⚠️ Esta prueba está diseñada para ejecutarse únicamente en Safari.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de Regresión Visual en Safari</title>
    <style>
        .element {
            -webkit-transform: rotate(45deg);
            transform: rotate(45deg);

            -webkit-backdrop-filter: blur(10px);
            backdrop-filter: blur(10px);

            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;

            width: 200px;
            height: 200px;
            background-color: rgba(255, 255, 255, 0.3);
            border: 1px solid #000;
            margin: 50px auto;
            text-align: center;
            padding-top: 80px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="element">Safari OK</div>
</body>
</html>
